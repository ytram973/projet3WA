<?php

namespace Projet;

abstract class Manager {

    protected \PDO $connection;

    public function __construct() {
        $dbConfig = require './config/database.php';

        $db = new \PDO(
            "mysql:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['dbname']}",
            $dbConfig['username'],
            $dbConfig['password']
        );
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
				$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
        $db->exec('SET NAMES utf8');
        $this->connection = $db;
    }

}