<?php
require_once(ROOT.'/application/model/exception/ServerException.php');

class Db
{
    const LOGIN = 'root';
    const PASSWORD = 'root';
    const DATABASE = 'restDb';
    const HOST = 'localhost';

    public static function getConnection() {
        try {
            $dsn = "mysql:host=".Db::HOST.";dbname=".Db::DATABASE;
            $db = new PDO($dsn, Db::LOGIN, Db::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $exception) {
            throw new ServerException(500, 'DB EXCEPTION', 'No connect with DB');
        }
    }
}