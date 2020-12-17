<?php
	 include 'Database_Configuration.php';
	 if($_POST)
	 {
	 	$full_name=$_POST['full_name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];

	 	$sql="INSERT into customers_information(
				 full_name, 
				 address, 
				 phone,
				 email, 
				 user_name, 
				 password 
				 ) 
			 values (
				 '$full_name', 
				 '$address',
				 '$phone',
				 '$email', 
				 '$user_name',
				 '$password'
				 )";


	 	if(mysqli_query($conn,$sql)){
	 	}	
	 	else{
			echo "Error".$sql."<br>".mysqli_error($conn);
			echo "<a href='form.html'>Click Here</a> To Try Again";
			}
	}
	 mysqli_close($conn);
?>


