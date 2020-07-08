<?php

class DB{
    public $table;
    public static function conect(){
        require_once '../App/config.php';
        $ty = new PDO("mysql:host=". 'localhost' .';port='. '3306' .';dbname='.'cf','root','');
        $ty->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $ty->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $ty;
    }
    public static function query($query,$params = array()){
        $t = self::conect()->prepare($query);
        $t->execute($params);
        if (strpos('SELECT', $query) !== true) {
           $es= $t->fetchAll(PDO::FETCH_ASSOC);
            return $es;
        }else{
            return  $t;
        }
       
    }

}                     
?>      