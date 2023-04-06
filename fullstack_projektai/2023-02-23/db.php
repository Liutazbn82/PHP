<?php

// ************************************** 
// duomenys skirti prisijungti prie hostingo duomenu bazes, 
// juos duoda serverio valdytojas

class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'spotify';
// **************************************

    public static $database;
    public $users; // reiksme kolkas nepriskirta

    public function __construct() { 
        try {
            $database = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
            echo 'Prisijungimas sekmingas';
        } catch (Exception $e) {
            echo 'Nepavyko prisjungti prie duomenu bazes';
        }
    }

    public function getUsers() {
        $this-> users = self::$database ->query('SELECT * FROM users') ->fetch_all();

        return $this;
    }

    public function changeUserPerm() {
        foreach($this->users as $key => $user) {
            $this -> users[$key]['role']=1;
        }
    }
}

$db = new Database(); // aktyvuojamas konstructorius

echo'<pre>';
$db->getUsers();
$db->changeUserPerm();

print_r($db->getUsers());
