<?php

namespace model;


class UploadFile
{
    /**
     * Upload image
     * @return mixed
     * @throws \Exception
     */
    public static function upload()
    {
        if(!is_uploaded_file($_FILES["image"]["tmp_name"]) && $_FILES["image"]["size"] != 0) {
            throw new \Exception('Error upload file');
        }
        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/img/".$_FILES["image"]["name"]);
        return $_FILES["image"]["name"];
    }

}