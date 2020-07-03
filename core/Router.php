<?php
require_once 'View.php';
class Route{
    public static $validrout ;
    private static $y;
    public static function add_api($route,$function){
        self::$validrout[]=" " . $route;
        self::$y=parse_url($_SERVER['REQUEST_URI']);
        if (self::$y["path"] == $route) {
            $function -> __invoke();
          }
    }

    public static function add($route,$function,$meth = null){        
        self::$validrout[]=" " . $route;
        self::$y=parse_url($_SERVER['REQUEST_URI']);
        if (self::$y["path"] == $route) {
            return $function -> __invoke();
            $meth;
          }
    }

    public static function ck(){
    $u = parse_url($_SERVER['REQUEST_URI']);
    $arr =self::$validrout;
    $e = implode(" ",$arr);
    $y = explode(" ",$e);
    $uf = in_array($u["path"],$y);
    if ($uf) {
    } else {
        header( "Location: /404.php" );
    }
    }
    public static function goto($n,$t=null){
        header( "Location: {$n}" );
    }
}
     function req($reg){
         $yg = $_SERVER["REQUEST_METHOD"];
         if ( $yg == $reg) {
         }else{
           Route::goto("/meth.php?err={$yg}&errs={$reg}");
         }
         return ;
     }
?>