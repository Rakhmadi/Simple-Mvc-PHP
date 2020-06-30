<?php
require_once  'Database.php';
class Controller {
    public static function add($f,$fn){
        require_once "../App/controller/".$f.".php";
         $g=$f;
         $g::$fn();
        
    }
}
?>