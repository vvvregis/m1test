<?php
namespace controller;

use model\AudioCD;
use model\Migrate;
use model\Render;
use model\Router;
use model\UploadFile;

class AudioController
{
    /**
     * AudioController constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $router = new Router();
        try{
            $router->getMethod($url, $this);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * Render index page
     */
    public function index()
    {
        $dataArray = [];
        $allAudio = (new AudioCD())->getAll();
        while($data=$allAudio->fetch_object()) {
            $dataArray[] = $data;
        }

        Render::view('index', ['audioList' => $dataArray]);
    }

    /**
     * Start migration
     */
    public function migrate()
    {
        $migrate = new Migrate();
        $result = $migrate->run();

        if ($result) {
           Render::view('migrate-success');
        } else {
            Render::view('migrate-error');
        }
    }

    /**
     * Render add audio form
     */
    public function add()
    {
        Render::view('audio-form');
    }

    /**
     * Load data from form to object
     * @throws \Exception
     */
    public function load()
    {
        $imageName = UploadFile::upload();
        $audioCD = new AudioCD();
        $audioCD->setAlbum(isset($_POST['album'])?$_POST['album']:'');
        $audioCD->setArtist(isset($_POST['artist'])?$_POST['artist']:'');
        $audioCD->setYear(isset($_POST['year'])?$_POST['year']:'');
        $audioCD->setImage($imageName);
        $audioCD->setDuration(isset($_POST['duration'])?$_POST['duration']:'');
        $audioCD->setDate(isset($_POST['date'])?$_POST['date']:'');
        $audioCD->setCode(isset($_POST['code'])?$_POST['code']:'');
        $audioCD->setCost(isset($_POST['cost'])?$_POST['cost']:'');
        if(isset($_POST['id']) && $_POST['id']) {
            $result = $audioCD->update($_POST['id']);
        } else {
            $result = $audioCD->save();
        }

        if(!$result) {
            throw new \Exception('DB Error');
        }

        header('Location: /');
        die();
    }

    /**
     * Render edit audio form
     * @throws \Exception
     */
    public function edit()
    {
        if(!isset($_GET['id'])) {
            throw new \Exception('Page not found');
        }
        $audio = (new AudioCD())->getOne($_GET['id']);
        Render::view('audio-form', ['audio' => $audio->fetch_object()]);
    }

    /**
     * Delete audio
     * @throws \Exception
     */
    public function delete()
    {
        if(!isset($_GET['id'])) {
            throw new \Exception('Audio not found');
        }
        $result = (new AudioCD())->delete($_GET['id']);
        if(!$result) {
            throw new \Exception('DB Error');
        }
        header('Location: /');
        die();
    }

    /**
     * Sort audio
     */
    public function sort()
    {
        $allAudio = (new AudioCD())->sort();
        while($data=$allAudio->fetch_object()) {
            $dataArray[] = $data;
        }

        Render::view('index', ['audioList' => $dataArray]);
    }
}