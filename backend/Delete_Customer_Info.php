<?php
	include 'Database_Configuration.php';
    if($_GET)
		{
			$id=$_GET['id'];
			$sql="DELETE FROM customers_information WHERE id=$id";
			if(mysqli_query($conn,$sql))
			{
			    echo"Record deleted Successfully.";
		    	mysqli_close($conn);
			    header("Location: http://localhost/Travel_Agency/backend/Customers_Fetch_Record.php");	
			}
			else
    		{
    			echo"No Record Found !!";
	    		mysqli_error($conn);
		    }
		}
		mysqli_close($conn);
?>
