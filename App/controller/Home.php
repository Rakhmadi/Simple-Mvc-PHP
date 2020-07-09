<?php
require_once '../core/View.php';
require_once '../App/Model/siswa.php';
class Home{
    public static function show(){
        $n=new siswa();
        $y=$n->show()->OrderBy('id','DESC')->do();
       // $y= DB::query("SELECT * FROM siswa ");
      
        View::make('Home',$y);
    }
    public static function add(){
        $now=date("Y-m-d H:i:s"); 
        $name =$_POST['name'];
        $class =$_POST['class'];     
        $ns=new siswa();
        $ns->Insert([
            'id'=>NULL,
            'name'=>$name,
            'class'=>$class,
            'created'=>$now
        ]);
        
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
        $d=new siswa();
        $d->where('id',$id)->Update([
            
            'name'=>$name,
            'class'=>$class,
            
        ]);
        Route::goto('/');   
    }
}
?>