<?php
    class Manager
    {
        protected $connection;

        public function __construct() {
            $this->connection = new PDO('mysql:host=localhost;dbname=db_ocp5;charset=utf8', 'root', '');
        }
    }