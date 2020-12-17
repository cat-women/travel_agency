<?php

include 'Database_Configuration.php';
if($_POST){
    $full_name = $_POST['full_name'] ;
    $address = $_POST['address'] ;
    $email =$_POST['email']  ;
    $phone=$_POST['phone'] ;
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $id=$_POST['id'];
    $sql = " UPDATE customers_information SET 
        full_name = '$full_name',  
        address = '$address', 
        email = '$email',
        phone = '$phone', 
        user_name = '$user_name',
        password = '$password'
        WHERE id = $id ";
     if(mysqli_query($conn ,$sql)){
         echo "record updated ";
         mysqli_close($conn);
         header("Location: http://localhost/Travel_Agency/backend/Customers_Fetch_Record.php");
     }
     else{
         echo"error:".$sql."<br/>".mysqli_error($conn);
     }
}
if($_GET){

    $id = $_GET['id'];
    $sql = "SELECT * FROM customers_information WHERE id = $id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
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
            }
     }
        else{
            echo "record not found";
            exit;
        }
}
mysqli_close($conn);
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Update Record</title>
        <script>
        function reload() {
            parent.location = '../frame.html';
            // newtab.document.location.reload(true);
            parent.loaction.reload(true);
            parent.loaction.reload(true);
        }
        </script>
    </head>

    <body>
        <form method="POST">
            <fieldset>
                <legend>Customer Information</legend>
                <table align="center">
                    <tr>
                        <td>Full Name</td>
                        <td>:</td>
                        <td>
                            <input 
                                type="hidden" 
                                name="id" 
                                value="<?php echo $customer['id']?>" 
                                required />
                            <input 
                                type="text" 
                                placeholder="full name" 
                                name="full_name"    
                                id="full_name" 
                                value="<?=$customer['full_name']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>Address </td>
                        <td>:</td>
                        <td>
                            <input 
                                type="text" 
                                placeholder="address" 
                                name="address" 
                                id="address" 
                                value="<?=$customer['address']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>:</td>
                        <td>
                            <input 
                                type="tel" 
                                placeholder="Contact" 
                                name="phone" 
                                id="phone" 
                                value="<?=$customer['phone']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>:</td>
                        <td>
                            <input 
                                type="email" 
                                placeholder="Email" 
                                name="email" 
                                id="email" 
                                value="<?=$customer['email']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>User Name </td>
                        <td>:</td>
                        <td>

                            <input 
                                type="text" 
                                placeholder="User Name " 
                                name="user_name" 
                                id="user_name" 
                                value="<?=$customer['user_name']?>"
                                minlength="6" 
                                maxlength="18"  
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>password </td>
                        <td>:</td>
                        <td>
                            <input type='Password' 
                                placeholder="password" 
                                name="password" 
                                id="password" 
                                value="<?=$customer['password']?>"
                                minlength="8" 
                                maxlength="10"
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="center">
                            <button name="submit" type="submit" value="submit" onclick="reload()">Submit</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>

    </body>
    <style>
        button {
            width: 100px;
            height: 25px;
            text-align: center;
            color: white;
            font-size: 15px;
            background-color: green;
        }
        
        .center {
            text-align: center;
        }
        
        legend {
            font-weight: bold;
            font-size: 20px;
            color: black;
        }
        
        body {
            background-image: url(2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: black;
            font-weight: bold;
        }
    </style>

    </html>