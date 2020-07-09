<?php

class Model{
    protected $id='null';
    protected $table='null';
    protected $requirefield=[];
    protected static $idstatic=null;
    public $shows ='';
    public $wheres = '';
    public $or = '';
    public $cou='';
    public $lim='';
    public $min='';
    public $max='';
    public $avr='';
    public $sum='';
    
    public function __construct()
    {
      self::$idstatic=$this->id;
    }
    public function s(){
      echo $this->id;
    }
    public function g(){
      echo $this->id;
    }
    public static function d(){
      echo self::$idstatic;
    }
    public function show($field='*'){
        $this->shows= " $field FROM  ".$this->table.""; 
        return $this;      
    }
    public function where($t,$f='',$like=''){
        $this->wheres = " WHERE $t = '$f' $like"; 
        return $this;
    }
    public function OrderBy($ex,$sh=''){
        $this->or = " ORDER BY $ex $sh"; 
        return $this;
    }
    public function Count($r='*'){
      $this->cou = " COUNT($r)"; 
      $this->show($field='');
      return $this;
    }
    public function Min($val=''){
      $this->min =" MIN($val) as MIN ";
      $this->show($field='');
      return $this;
    } 
    public function Max($val=''){
      $this->max =" MAX($val) as MAX ";
      $this->show($field='');
      return $this;
    } 
    public function Average($val=''){
      $this->avr =" AVG($val) as AVG ";
      $this->show($field='');
      return $this;
    } 
    public function Sum($val=''){
      $this->sum =" SUM($val) as SUM ";
      $this->show($field='');
      return $this;
    } 
    public function limit($val=''){
      $this->lim =" LIMIT $val  ";
      return $this;
    }
    public function insert($s=[]){
      function sd($t){
        return "`$t` ";
      }
      $n=array_map('sd',$this->requirefield);
      $tables = implode(', ',$n);

      function dv($num){
          return(" :" . $num);
        }
       
       $h =array_map("dv",$this->requirefield);
       $vals =  implode(",",$h);

       $this->inserts="INSERT INTO `".$this->table ."` ($tables) VALUES($vals)  $this->wheres";
       DB::query($this->inserts,$s);
    
    }
    public function save(){

    }
    public function do(){
       if ($this->cou == '') {
        
       } else {
          $this->show($field='');
       }
        $r="SELECT" .
        $this->min .
        $this->max .
        $this->avr .
        $this->sum .
        $this->cou .
        $this->shows.
        "".$this->wheres.""
        .$this->or.""
        .$this->lim."";
       // echo " $r ";
       return DB::query($r);
    }
  }
 
?>