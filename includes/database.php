<?php
require("functions.php"); 
class database{
	public $connection;
	private $host="localhost";
	private $user="root";
	private $pwd="";
	private $db="cms";
	public function __construct(){
		$this->connect();
	}
	public function connect(){
		$this->connection=mysqli_connect($this->host,$this->user,$this->pwd,$this->db);
		if(!$this->connection){ echo "Error ,Failed to Connect to Database <font color='red'>".mysqli_connect_errno()."</font>"; }
	}
	/**
	method to execute querys
	*/
	public function query($sql=""){
		$query=mysqli_query($this->connection,$sql);
		if($query){return $query; }else{return false;}
	}
	public function fetch($query){
		$fetch=mysqli_fetch_array($query);
		return $fetch;
	}
	public function login($username,$password){
		$string=explode("|",clean($username,$password));
		$name=$string[0];//username
		$pwd=$string[1];//password
$search="SELECT * FROM staff WHERE username='$name' AND password='$pwd' ";
		$query=$this->query($search);
		$fetch=$this->fetch($query);
		
		if($fetch['role']=='staff'){
			$id=$fetch['sid'];
			$uname=$fetch['username'];
			header("location: staff.php?sid=$id&uname=$uname");		
		}else{
$search_admin="SELECT * FROM staff WHERE username='$name' AND password='$pwd'  AND role='admin' ";
		$q=$this->query($search_admin);
		$f=$this->fetch($q);
		if($f['role']=='admin'){
			$id=$f['sid'];
			$uname=$fetch['username'];
			header("location: admin-view.php?sid=$id&uname=$uname");
		}else{
			return "<h4 class='alert alert-danger'>Incorrect Username or Password</h4>";	
		}

		}
	}

	}
	$db=new database();	
?>