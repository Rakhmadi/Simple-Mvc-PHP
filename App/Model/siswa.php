<?php
require_once '../core/Model.php';
class siswa extends Model{
    protected $table='siswa';
    protected $requirefield=[
        'id',
        'name',
        'class',
        'created'
    ];
}
?>