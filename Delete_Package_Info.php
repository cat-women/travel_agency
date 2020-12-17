<?php
	include 'Database_Configuration.php';
    if($_GET)
		{
			$id=$_GET['id'];
			$sql="DELETE FROM packages_information WHERE id=$id";
			if(mysqli_query($conn,$sql))
			{
			    echo"Record deleted Successfully.";
		    	mysqli_close($conn);
			    header("Location: http://localhost/Travel_Agency/backend/Packages_Fetch_Info.php");	
			}
			else
    		{
    			echo"No Record Found !!";
	    		mysqli_error($conn);
		    }
		}
		mysqli_close($conn);
?>
