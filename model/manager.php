<?php


class Manager
{
    protected function dbConnect()
    {
        $json = file_get_contents('config.json');
        $parsed_json = json_decode($json);
        $db_host = $parsed_json->{'db_host'};
        $db_name = $parsed_json->{'db_name'};
        $db_user = $parsed_json->{'db_user'};
        $db_password = $parsed_json->{'db_password'};
        $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'', $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        error_reporting(E_ALL ^ E_NOTICE);  
        ini_set('display_errors',1);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $db;
    }
}