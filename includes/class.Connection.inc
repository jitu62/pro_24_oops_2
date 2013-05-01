<?php
class MysqlConnection{
		private $_connection;
		private $_db;
		public $last_query;
		
		public function __construct(){
			$this->open_connection();
		}
		// Connection stablish with server
		
		
		
		
		private function open_connection(){
		 $this->_connection = mysql_connect("localhost","root","");
			   if(!$this->_connection){
			   die("Error connection with server");
			   }else{
			   $this->_db = mysql_select_db("healthtopic", $this->_connection);
			   if(!$this->_db){
				die("Error connecction with Database" . mysql_error());
			   }else{
			   return true;
			   }
			   }
		}//open connection	
		
		
		
		
		
		
		protected function run_insert($data, $arg)
		{			
			$keys= implode(',',array_keys($data));
			$values= "'" . implode("','",array_values($data)) . "'";
			$query= mysql_query("insert into $arg ($keys) values($values)",$this->_connection);	
echo "inserted"	;		
		}//to insert data
		
		
		
		
		
		
		protected function run_update($data, $tablename, $tuplename){
		       if(isset($_GET['id'])){
			    $id= $_GET['id'];
				foreach($data as $key => $value){
				$value = "'$value'";
				$updates[] = "$key = $value";
				}
				$implodeArray = implode(', ', $updates);
				$sql = "UPDATE $tablename SET $implodeArray where $tuplename=$id";
				$query= $this->run_query($sql);
				return true;
			}}//to update data
			
			
			
			
			
		protected function run_read($tablename){
			$q = $this->run_read_query("select * from $tablename", $this->_connection);
			return $q;
			}//to read data from table//eg. generate sidebar
			
			
			
			
			
			
			
			
		protected function run_read_by_username($tablename, $taplename, $username){
			$query = $this->run_read_query("select * from $tablename where $taplename=$username", $this->_connection);
			}//to read individual data by name//eg. edit page
			
			
			
		protected function run_login($tablename, $taplename1,$taplename2, $username,$password){
			$query = $this->run_read_query("select * from $tablename where $taplename1='$username' and $taplename2='$password'", $this->_connection);
			return $query;
			}//login 
		
		
		
		protected function run_read_by_id($tablename, $taplename){
			if(isset($_GET['id'])){
	           $id = $_GET['id'];
			   $query = $this->run_read_query("select * from $tablename where $taplename=$id", $this->_connection);
			   return $query;
			}
			
			}//to read individual data by id
              			
			
			
			
			
		protected function run_delete($tablename, $taplename, $id){
			$query = $this->run_query("delete from $tablename where $taplename=$id", $this->_connection);
			}//delete individual data 
			
			
			
			
			
			
		protected function run_query($data){
		$this->last_query = $data;
		$query = mysql_query($data, $this->_connection);
		}
		
		
		protected function run_read_query($data){
		$this->last_query = $data;
		$query = mysql_query($data, $this->_connection);	
		$this->query_test($query);
		return $query;//return
		}
		private function query_test($data){
			if(mysql_num_rows($data)>0){
			return true;
			}else{
			return false;
			}	
		}			
		public function close_connection(){
			mysql_close($this->_connection);
		}
		
		//-----------------------------------
		//my function
		public function sidebar($bar,$page){
				
				while($row = mysql_fetch_assoc($bar)){			
				echo "<li><a href=\"$page?id={$row['id']}\">{$row['title']}</a></li>";
				}
				}
      public function show($q){
      while($row = mysql_fetch_assoc($q)){
			echo "<h1>{$row['title']}</h1>";
			echo "<img src=\"../upload/{$row['image_health']}\" height=\"120px\" width=\"80px\" />";		
			echo "<br /><br /><br /><a href=\"buynow.php?id={$row['id']}\"><img src=\"../images/add_to_cart.gif\" /></a><br /><br /><br />";
			echo "<br />Posted By: <b>{$row['postedby']}<br>";
			echo "Batch No: <b>{$row['batchno']}<br>";
			echo "Date Of Manufacturer: <b>{$row['dateof_manu']}<br>";
			echo "Date Of Expire: <b>{$row['dateof_expire']}<br>";
			echo "Cost: <b>{$row['costrs']} /-RS<br><br>";
			echo "<b>Description:</b> <p>{$row['description']}</p><br>";
			}
			}
			
		public function	show_update($q){
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];			
		while($row = mysql_fetch_assoc($q)){
		
		echo "<form action=\"edit_page.php?id={$row['id']}\" method=\"post\">";	
				echo "<label>Title Name:</label>";
				echo "<input name=\"dtitle\" type=\"text\" value=\"{$row['title']}\" size=\"40\" /><br><br>";
				echo "<label>Batch No:</label>";
				echo "<input name=\"dbatch\" type=\"text\" value=\"{$row['batchno']}\" size=\"40\" /><br><br>";
				echo "<label>Cost:</label>";
				echo "<input name=\"costrs\" type=\"text\" value=\"{$row['costrs']}\" size=\"40\" /><br><br>";
				echo "<label>Ten Digit Code No:</label>";
				echo "<input name=\"dcode\" type=\"text\" value=\"{$row['tencode']}\" size=\"40\" /><br><br>";
				echo "<label>Choose Category</label>";
				echo "<select name=\"category\">";
				echo "<option value=\"1\">Food Products</option>";
				echo "<option value=\"2\">Cosmetic Products</option>";
				echo "<option value=\"3\">Medicine Products</option>";
				echo "<option value=\"4\">Herbal Products</option>";
				echo "<option value=\"5\">Hair Products</option>";				
				echo "</select>";
				echo "<br><br>";
				
				echo "<label>Description of the Product:</label>";
				echo "<textarea rows=\"8\" cols=\"55\" name=\"ddescription\">{$row['description']}</textarea><br><br>";			
				
				echo "<input  class=\"button\" type=\"submit\" name=\"update\" value=\"Update\" />";			
		echo "	</form>	";
			echo "<br /><br /><br />";
			echo "<a href=\"delete.php?id={$row['id']}\">Delete</a>";
			echo "<br /><br /><br />";
			}	
        }
		}	
 //-----------------------------------
	}
	
?>