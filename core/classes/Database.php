<?php

namespace core\classes;

class Database {

    private $gestor;

    public function __construct() {
        $this->gestor = new \PDO("mysql:host=" . 'localhost' . ";dbname=" . 'automind' . ";charset=utf8", 'root', '');
    }
}
