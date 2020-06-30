<?php
require_once '../core/Router.php';
require_once '../core/View.php';
require_once '../core/Controller.php';
Route::add('/',function(){
    Controller::add('Home','show');
});
Route::add('/node',function(){
   View::make('lok');
});
Route::add('/helo',function(){
   
});
Route::add('/add',function(){
    Controller::add('Home','add');
});
Route::add('/delete',function(){
    Controller::add('Home','delete');
});
Route::add('/edit',function(){
    Controller::add('Home','editshow');
});
Route::add('/saveedit',function(){
    Controller::add('Home','saveedit');
    
});
Route::ck();
