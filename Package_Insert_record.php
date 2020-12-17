<?php
	 include 'Database_Configuration.php';
	 if($_POST)
	 {
	 	$full_name=$_POST['full_name'];
        $season=$_POST['season'];
        $type=$_POST['type'];
        $grade=$_POST['grade'];
        $duration=$_POST['duration'];
        $image="";
        $target_dir="C:\\xampp\htdocs\Travel_Agency\uploads\\";
		$target_file=$target_dir.basename($_FILES["image"]["name"]);
		// echo $target_file; exit;
		echo"<br/>".$target_file."<br/>";
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		{
			$image = basename($_FILES["image"]["tmp_name"]);
			echo"the file".basename($_FILES["image"]["tmp_name"])."has ben uploaded.";
        }
        
		else
		{
			echo"Sorry,there was an error uploading.";
		}
        
	 	$sql="INSERT into packages_information(
				 full_name, 
				 season, 
				 type,
				 grade, 
				 duration,
                 image 
				 ) 
			 values (
				 '$full_name', 
				 '$season',
				 '$type',
				 '$grade', 
				 '$duration',
                 '$image'
				 )";


	 	if(mysqli_query($conn,$sql)){
             
	 	}	
	 	else{
			echo "Error".$sql."<br>".mysqli_error($conn);
			echo "<a href='package_form.html'>Click Here</a> To Try Again";
			}
	}
	 mysqli_close($conn);
?>


