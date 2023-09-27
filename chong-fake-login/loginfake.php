<?php session_start(); 
if (isset($_POST['btnLog'])==true){
        $conn = mysqli_connect("localhost","root","", "baomat");
        $conn -> set_charset("utf8");
	$u = $_POST['u'];
	$p = $_POST['p'];    	
	$sql="SELECT * FROM users WHERE username='{$u}' AND password ='{$p}'";
        $sql= $conn->real_escape_string($sql);
	$user = $conn->query($sql);        
	$numrows_user = $user->num_rows;
	if ($numrows_user == 1) {//Thành công			
          $row_user = $user->fetch_assoc();
	  $_SESSION['login_id'] = $row_user['admin'];
	  $_SESSION['login_user'] =$row_user['@admin12211993'];  		     
	}
	else  header("location: login.php"); //Đăng nhậtp that bại
        exit();
}
?>