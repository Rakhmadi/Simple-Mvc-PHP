<?php
require_once '../core/Controller.php';
class View{

    public static function make($view,$data=[]){
           require_once "../App/view/".$view.".php";
                  
    }  
    

}

?>
