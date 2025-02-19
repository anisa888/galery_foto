<?php
$host="localhost";
$user="root";
$password="";
$db="db_gallery_anisa";
$koneksi = mysqli_connect($host,$user,$password,$db);
if (!$koneksi)
{
	die("koneksi gagal:".mysqli_connect_error());
}