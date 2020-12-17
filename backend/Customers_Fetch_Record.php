<?php

  include 'Database_Configuration.php';
  $sql="SELECT * FROM customers_information";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
	$i = 0 ;
	while($row =mysqli_fetch_assoc($result)){
		$customer[$i]=array(
			'id' =>$row['id'] ,
			'full_name' =>$row['full_name'] ,
			'address' =>$row['address'] ,
			'phone' =>$row['phone'] ,
			'email' =>$row['email']  ,
            'user_name' =>$row['user_name'] ,
            'password'=>$row['password']
			 );
		$i++;
	}
}
mysqli_close($conn);
?>

    <html>
    <head>
        <title>Customer Informations</title>
        <link rel="stylesheet" type="text/css" href="../css/style_table.css">
    </head>
    <body>
        <form method="POST" action="http://localhost/Travel_Agency/backend/Search_Customer_Information.php">
                        <input type="text" placeholder="Enter name to search" name="searched_field" required/> 
                
                        <input type="submit" value="Search Person" formtarget="bottomleft"/> 
        </form>
        <table align="center">
            <caption>Customer Detail</caption>
            
              
                   
                
            <tr>
                <th>S.N.</th>
                <th>Full name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>User Name</th>
                <th>Password</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            foreach ($customer as $index => $person) {?>
                <tr>
                    <td>
                        <?=$index+1?>
                    </td>
                    <td>
                        <?=$person['full_name']?>
                    </td>
                    <td>
                        <?=$person['address']?>
                    </td>
                    <td>
                        <a href="mailto:<?=$person['email']?>"><?=$person['email']?></a>
                    </td>
                    <td>
                        <?=$person['phone']?>
                    </td>
                    <td>
                        <?=$person['user_name']?>
                    </td>
                    <td>
                        <?=$person['password']?>
                    </td>
                    <td>
                        <a href="http://localhost/Travel_Agency/backend/Update_Record.php?id=<?=$person['id']?>" target="right">Update</a>
                    </td>
                    <td>
                        <a href="http://localhost/Travel_Agency/backend/Delete_Customer_Info.php?id=<?=$person['id']?>">Delete</a>
                    </td>
                </tr>
                <?php 
		} ?>
        </table>

    </body>
    </html>