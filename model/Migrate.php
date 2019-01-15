<?php
namespace model;


class Migrate
{

    protected $db;

    /**
     * Migrate constructor.
     */
    public function __construct()
    {
        $connect = Connect::getInstance();
        $this->db = $connect->getConnection();
    }


    /**
     * Run migration
     */
    public function run()
    {
        return $this->db->query('CREATE TABLE IF NOT EXISTS `audio_cd` (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `image` varchar(250) NOT NULL,
        `album` varchar(250) NOT NULL,
        `artist` varchar(250) NOT NULL,
        `year` int(11) NOT NULL,
        `duration` int(11) NOT NULL,
        `date` varchar(250) NOT NULL,
        `cost` int(11) NOT NULL,
        `code` varchar(250) NOT NULL
        ) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8');


    }
}