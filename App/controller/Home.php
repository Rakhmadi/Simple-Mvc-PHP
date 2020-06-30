<?php
require_once '../core/View.php';
class Home{
    public static function show(){
        $y= DB::query("SELECT * FROM siswa ");
        View::make('Home',$y);
    }
    public static function add(){
        $now=date("Y-m-d H:i:s"); 
        $name =$_POST['name'];
        $class =$_POST['class'];     
        DB::query("INSERT INTO `siswa` (`id`, `name`, `class`, `created`) 
        VALUES (NULL, '{$name}', '{$class}', '{$now}')");
        Route::goto('/');       
    }
    public static function delete(){
        $id=$_GET['id'];
         DB::query("DELETE FROM siswa WHERE id=:id",[
             ':id'=>$id
             ]);
         Route::goto('/'); 
    }
    public static function editshow(){
        $id=$_GET['id'];
        $e = DB::query("SELECT * FROM siswa WHERE id=:id",[
            ':id'=>$id
        ]);
        View::make('Edit',$e);
    }
    public static function saveedit(){
        $now=date("Y-m-d H:i:s"); 
        $name =$_POST['name'];
        $class =$_POST['class']; 
        $id=$_GET['id'];
        DB::query("UPDATE  `siswa` set `name`=:name,`class`=:class,`created`=:created WHERE `id`=:id",[
        ':id'=>$id,
        ':name'=>$name,
        ':class'=>$class,
        ':created'=>$now
        ]);
        Route::goto('/');   
    }
}
?>