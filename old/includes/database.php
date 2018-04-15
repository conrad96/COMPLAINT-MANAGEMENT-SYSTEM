<?php 
include("functions.php");
class database{
	private $host="localhost";
	private $db="cms";
	private $pwd="";
	private $user="root";
	private $connection;
	public function __construct(){
		$this->connection();
	}
	public function connection(){
		$this->connection=mysqli_connect($this->host,$this->user,$this->pwd,$this->db);
		($this->connection)? "":die("Failed to Connect to Database<p>Please Try Again");
	}
	public function login($id,$password){
		$cleaned=clean($id,$password);
		$id=$cleaned[0];
		$pwd=$cleaned[1];
		$authenticate="SELECT * FROM staff WHERE staff_ID='$id' AND password='$pwd' ";
		$query=$this->query($authenticate);
		$fetch=$this->fetch($query);
		if($fetch){
			$sid=$fetch['staff_ID'];
			//redirect("staff_view_2.php?sid=$sid");
			header("location: staff_view_2.php?sid=$sid");
		}else{
			
			$admin_id=$id;
		$authenticate_admin="SELECT * FROM sys_admin WHERE sys_ID='$admin_id' AND password='$pwd' ";
		$query=$this->query($authenticate_admin);
		$fetch=$this->fetch($query);
		if($fetch){
			$id=$fetch['sys_ID'];
			redirect("admin-view.php?aid=$id");
		}else{ echo "<script>alert('Username or Password is Incorrect');</script>"; }

		}
	
	}//login
	public function query($sql=""){
		$query=mysqli_query($this->connection,$sql);
		return $query;
	}
	public function fetch($query){
		$fetch=mysqli_fetch_array($query);
		return $fetch;
	}
}
$db=new database();
?>