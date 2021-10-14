<?php

class User{

    public $id;
    public $username;
    public $password;

    public function __construct ($id=null, $username=null, $password=null) {
        //kako pravim kostruktor u php-u
        //destruktor se automatski poziva, ako nemam vise ni jedne reference na taj objekat
        //vrednosti ovih parametara, podrazumevano su null
        $this->id=$id;
        $this->username=$username;
        $this->passwor=$password;
    }

    public static function logInUser($usr, mysqli $conn){

        //mysqli oznacava konekciju izmedju php a i mysql baze
        $query="SELECT * FROM user WHERE username=$usr->username AND password=$usr->password"; //ovako moze, ispisivace mi raylicite vrednosti promenljivih

        //uspostavljam konekciju
        return true ;//$conn->query($query); 
        //ovde mi se u returnu vraca result set, tj mogu da vidim sta je postavljeno, nacin na koji je hendlovano
    }
}
?>