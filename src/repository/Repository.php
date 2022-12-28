<?php

require_once __DIR__.'/../../Database.php';


//singleton pattern for database conn

class Repository {
    private static $database = null;

    private function __construtct() {  }

    public static function getInstance() {
        if( self::$database == null) {
            self::$database = new Database();
        }

        return self::$database;
    }
}