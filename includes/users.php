<?php
include_once('class.Connection.inc');
class Registration extends MysqlConnection{
	function __construct(){
	   parent::__construct();
	   session_start();
	}
	
	public function user_registration($data){
	$this->run_query($data);
	}
	public function user_insert($data, $arg){
	$this->run_insert($data, $arg);
	echo "ok";
	}
	public function user_update($data, $tablename, $tuplename, $id){
	$this->run_update($data, $tablename, $tuplename, $id);
	}
	
	public function user_login($tablename, $taplename1,$taplename2, $username,$password){	
     $q=$this->run_login($tablename, $taplename1,$taplename2, $username,$password);	
	 return $q;
}}
$reguser = new Registration();
?>