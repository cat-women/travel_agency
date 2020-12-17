<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);
    include "Database_Configuration.php";
    if($_POST){ 
        $searched_field = $_POST["searched_field"];
        $sql = "SELECT * FROM packages_information WHERE full_name LIKE '%".$searched_field."%';";
        // echo $sql; exit;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($row =mysqli_fetch_assoc($result)){
                $customer=array(
                'id' =>$row['id'] ,
                'full_name' =>$row['full_name'] ,
                'season' =>$row['season'] ,
                'type'=>$row['type'] ,
                'grade' =>$row['grade'] ,
                'duration' =>$row['duration']  ,
                'image'=>$row['image']
                );
                  $i++;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Package Information</title>
    </head>
    <link rel="stylesheet" type="text/css" href="../css/style_table.css">
    <body>
        <table align="center">
            <caption>Customer Detail</caption>
            <tr>
                <th>S.N.</th>
                <th>Full name</th>
                <th>Season</th>
                <th>Type</th>
                <th>Grade</th>
                <th>Duration</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
                {?>
                <tr>
                    <td>
                        <?=$customer['id']?>
                    </td>
                    <td>
                        <?=$customer['full_name']?>
                    </td>
                    <td>
                        <?=$customer['season']?>
                    </td>
                    <td>
                        <?=$customer['type']?></a>
                    </td>
                    <td>
                        <?=$customer['grade']?>
                    </td>
                    <td>
                        <?=$customer['duration']?>
                    </td>
                    <td>
                        <?=$customer['image']?>
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
