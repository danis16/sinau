<?php
class Siswa extends Model {
protected $table="siswa";
protected $primaryKey="id";
protected $fillable=['nama','umur','alamat','no_hp'];
}
?>