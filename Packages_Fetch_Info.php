<?php

  include 'configuration.php';
  $sql="SELECT * FROM packages_information";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
	$i = 0 ;
	while($row =mysqli_fetch_assoc($result)){
		$packages[$i]=array(
			'id' =>$row['id'] ,
			'full_name' =>$row['full_name'] ,
			'season' =>$row['season'] ,
			'type' =>$row['type'] ,
			'grade' =>$row['grade']  ,
            'duration' =>$row['duration'] ,
            'image'=>$row['image']
			 );
		$i++;
	}
}
mysqli_close($conn);
?>

    <html>
    <head>
        <title>Package Informations</title>
        <link rel="stylesheet" type="text/css" href="../css/style_table.css">
    </head>
    <body>
        <form method="POST" action="http://localhost/Travel_Agency/backend/Search_Package.php">
                        <input type="text" placeholder="Enter name to search" name="searched_field" required/> 
                
                        <input type="submit" value="Search" formtarget="bottomleft"/> 
        </form>
        <table align="center">
            <caption>Package Detail</caption>
            
              
                   
                
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Season</th>
                <th>Type</th>
                <th>Grade</th>
                <th>Duration</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            foreach ($packages as $index => $package) {?>
                <tr>
                    <td>
                        <?=$index+1?>
                    </td>
                    <td>
                        <?=$package['full_name']?>
                    </td>
                    <td>
                        <?=$package['season']?>
                    </td>
                    <td>
                        <?=$package['type']?>
                    </td>
                    <td>
                        <?=$package['grade']?>
                    </td>
                    <td>
                        <?=$package['duration']?>
                    </td>
                    <td>
                        <?=$package['image']?>
                    </td>
                    <td>
                        <a href="http://localhost/Travel_Agency/backend/Package_Update_Record.php?id=<?=$package['id']?>" target="right">Update</a>
                    </td>
                    <td>
                        <a href="http://localhost/Travel_Agency/backend/Delete_Package_Info.php?id=<?=$package['id']?>">Delete</a>
                    </td>
                </tr>
                <?php 
		} ?>
        </table>

    </body>
    </html>