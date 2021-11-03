<?php
	
	session_start();
	$connect  = mysqli_connect('localhost','root','','login') or die('connection error');
	
	if(isset($_POST['registerbtn'])){
		
		$username = $_POST['username'];
		
		$mobile = $_POST['mobile'];
		
		$password = $_POST['password'];
		
		
		$insert = mysqli_query($connect,"INSERT INTO user VALUES('$username','$mobile','$password')");
		
		if($insert){
				
				echo '<script> 
				alert("Registration Successful!");
				window.location = "../";
				</script>';
				
		}
		else{
				echo '<script> alert("Registration failed!") </script>';
		}
	}
	
		if(isset($_POST['loginbtn'])){
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			
			$check = mysqli_query($connect,"SELECT username FROM user WHERE mobile='$mobile' AND password='$password'");
			
			if(mysqli_num_rows($check)>0){
				$fetch = mysqli_fetch_array($check);
				$username = $fetch['username'];
				$_SESSION['username'] = $username;
				header("location:../homepage.html");
			}
			else{
				echo '<center><h1>Login failed</h1></center>';
			}
		}
		
		if(isset($_POST['logoutbtn'])){
			session_destroy();
			header("location:../webpage/homepage.html");
		}
			
	
	?>