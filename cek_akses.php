<?php
if(!defined('__NOT_DIRECT')){
	//mencegah akses langsung ke file ini
	die('Akses langsung tidak diizinkan!');
}
 
session_start();
 
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'koneksi.php';
 
if(!isset($_SESSION['my_user_agent']) || ($_SESSION['my_user_agent']!=md5($_SERVER['HTTP_USER_AGENT']))){
	//user belum login
	$__tipe_user = 'guest';
}else{
	$__tipe_user = $_SESSION['tipe_user'];
}
 
$aksesFilename = dirname(__FILE__).DIRECTORY_SEPARATOR.'akses'.DIRECTORY_SEPARATOR.$__tipe_user.'.php';
if(!file_exists($aksesFilename)){
	die('Terjadi kesalahan sistem');
}
include $aksesFilename;
 
$arrayCurrentPath = explode('?',$_SERVER['REQUEST_URI']);
$currentPath = substr($arrayCurrentPath[0], strlen(BASE_URL));
 
$allow = in_array($currentPath, $__akses_config);
 
if(!$allow){
	if($__tipe_user == 'guest' && $currentPath != 'login.php'){
		header("Location: ".BASE_URL.'login.php');
	}else{
		echo "Anda tidak diizinkan mengakses halaman ini!";
	}
	exit;
}
?>