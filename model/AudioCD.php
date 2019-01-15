<?php

namespace model;


class AudioCD extends BaseTable
{
    protected $image;
    protected $album;
    protected $artist;
    protected $year;
    protected $duration;
    protected $date;
    protected $cost;
    protected $code;
    protected $tableName = 'audio_cd';

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return AudioCD
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     * @return AudioCD
     */
    public function setAlbum($album)
    {
        $this->album = $album;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist
     * @return AudioCD
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return AudioCD
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     * @return AudioCD
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return AudioCD
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     * @return AudioCD
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return AudioCD
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Add audio
     * @return bool|\mysqli_result
     */
    public function save()
    {
        return $this->db->query("INSERT INTO ".$this->tableName."(image,album,artist,year,duration,date,cost,code)
        VALUES
        ('$this->image','$this->album', '$this->artist', '$this->year', '$this->duration', '$this->date', '$this->cost', '$this->code')");


    }

    /**
     * Edit audio
     * @param $id
     * @return bool|\mysqli_result
     */
    public function update($id)
    {
        $sql = "UPDATE ".$this->tableName." SET album = '".$this->album."', artist = '".$this->artist."',
                                year = '".$this->year."', duration = '".$this->duration."', date = '".$this->date."', 
                                cost = '".$this->cost."', code = '".$this->code."'";

        if($this->image != '') {
            $sql .= ", image = '".$this->image."' ";
        }

        $sql .= "WHERE id =     ".$id."";

        return $this->db->query($sql);

    }

    /**
     * @param $id
     * @return bool|\mysqli_result
     */
    public function delete($id)
    {
        return $this->db->query("DELETE FROM ".$this->tableName." WHERE id = ".$id);
    }

    /**
     * Sort audio
     * @return bool|\mysqli_result
     */
    public function sort()
    {
        $sql = 'SELECT * FROM '.$this->tableName;

        if(isset($_GET['search_field']) && isset($_GET['search_value'])) {
            $sql .= ' WHERE '.$_GET['search_field'].' = "'. $_GET['search_value'].'"';
        }

        if (isset($_GET['sort_type']) && isset($_GET['sort_field'])) {
            $sql .= ' ORDER BY '.$_GET['sort_field']. ' '.$_GET['sort_type'];
        }
        return $this->db->query($sql);
    }

}