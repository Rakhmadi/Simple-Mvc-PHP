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

    public static function add($route,$function){
        self::$validrout[]=" " . $route;
        self::$y=parse_url($_SERVER['REQUEST_URI']);
        if (self::$y["path"] == $route) {
            $function -> __invoke();
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
    public static function goto($n){
        header( "Location: {$n}" );
    }
}

?>