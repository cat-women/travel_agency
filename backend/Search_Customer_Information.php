<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);
    include "Database_Configuration.php";
    if($_POST){ 
        $searched_field = $_POST["searched_field"];
        $sql = "SELECT * FROM customers_information WHERE full_name LIKE '%".$searched_field."%';";
        // echo $sql; exit;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($row =mysqli_fetch_assoc($result)){
                $customer=array(
                'id' =>$row['id'] ,
                'full_name' =>$row['full_name'] ,
                'address' =>$row['address'] ,
                'phone' =>$row['phone'] ,
                'email' =>$row['email']  ,
                'user_name' =>$row['user_name'],
                'password' => $row['password']
                );
                  $i++;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Customer Informations</title>
    </head>
    <link rel="stylesheet" type="text/css" href="../css/style_table.css">
    <body>
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
                {?>
                <tr>
                    <td>
                        <?=$customer['id']?>
                    </td>
                    <td>
                        <?=$customer['full_name']?>
                    </td>
                    <td>
                        <?=$customer['address']?>
                    </td>
                    <td>
                        <a href="mailto:<?=$customer['email']?>"><?=$customer['email']?></a>
                    </td>
                    <td>
                        <?=$customer['phone']?>
                    </td>
                    <td>
                        <?=$customer['user_name']?>
                    </td>
                    <td>
                        <?=$customer['password']?>
                    </td>
                    <td>
                        <a href="http://localhost/Travel_Agency/backend/Update_Record.php?id=<?=$customer['id']?>" target="right">Update</a>
                    </td>
                    <td>
                        <a href="http://localhost/Travel_Agency/backend/Delete_Customer_Info.php?id=<?=$customer['id']?>">Delete</a>
                    </td>
                </tr>
                <?php 
		} ?>
        </table>

    </body>
</html> 
