<?php
include_once('class.Connection.inc');
class content extends MysqlConnection{
	function __construct(){
	   parent::__construct();
	   session_start();
	}
	
	public function content_insert($data,$arg){
	$this->run_insert($data, $arg);
	}
	//public function content_edit($data, $arg){
	//$this->run_insert($data, $arg);
	//echo "ok";
	//}
	
    public function content_delete($tablename, $taplename,$id){
	$this->run_delete($tablename, $taplename,$id);
	
	}
	
	
    public function content_read($tablename,$page){
	$q=$this->run_read($tablename);
	$this->sidebar($q,$page);
	echo "ok";
	}//content read
	
	
	public function content_read_by_id($tablename, $taplename){
	$q=$this->run_read_by_id($tablename, $taplename);
	return $q;
    }


    public function content_update($data, $tablename, $tuplename){
          $this->run_update($data, $tablename, $tuplename);
}


	
}
$content = new content();
?>