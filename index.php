<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'autoload.php';
$run = new \controller\AudioController(substr($_SERVER['REQUEST_URI'], 1)==''?'index':substr($_SERVER['REQUEST_URI'], 1));