<?php
/**
 * Created by PhpStorm.
 * User: 94010-06-10
 * Date: 09/01/2019
 * Time: 09:19
 */


class DatabaseConnexion
{
    public static $db;

    public static function getDatatabaseConnect()
    {
        $params = [
            'hostname'=>'localhost;',
            'dbName'=>'test',
            'username'=>'root',
            'password'=>''
        ];

        if(self::$db === null)
        {
            $db = new PDO('mysql:host='.$params['hostname'].'dbname='.$params['dbName'],
                $params['username'],$params['password']
            );


            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;



    }
}

