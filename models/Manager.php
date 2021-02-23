<?php
    class Manager
    {
        protected function dbConnect()
        {
            $db = new PDO('mysql:host=localhost;dbname=db_ocp5;charset=utf8', 'root', '');
            return $db;
        }
    }
