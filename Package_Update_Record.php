<?php

include 'Database_Configuration.php';
if($_POST){
        $full_name=$_POST['full_name'];
        $season=$_POST['season'];
        $type=$_POST['type'];
        $grade=$_POST['grade'];
        $duration=$_POST['duration'];
        $id=$_POST['id'];
        
        $sql = " UPDATE packages_information SET 
            full_name = '$full_name',  
            season = '$season', 
            type = '$type',
            grade = '$grade', 
            duration = '$duration'
            WHERE id = $id ";

         if(mysqli_query($conn ,$sql)){
             echo "record updated ";
             mysqli_close($conn);
             header("Location: http://localhost/Travel_Agency/backend/Packages_Fetch_Info.php");
         }
         else{
             echo"error:".$sql."<br/>".mysqli_error($conn);
         }
    }
if($_GET){

    $id = $_GET['id'];
    $sql = "SELECT * FROM packages_information WHERE id = $id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
            while($row =mysqli_fetch_assoc($result)){
                $customer=array(
                'id' =>$row['id'] ,
                'full_name' =>$row['full_name'] ,
                'season' =>$row['season'] ,
                'type' =>$row['type'] ,
                'grade' =>$row['grade']  ,
                'duration' =>$row['duration']
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
            parent.location.reload();
        }
        </script>
    </head>

    <body>
        <form method="POST">
            <fieldset>
                <legend>Package Information</legend>
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
                        <td>Season</td>
                        <td>:</td>
                        <td>
                            <input 
                                type="text" 
                                placeholder="Season" 
                                name="season" 
                                value="<?=$customer['season']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>:</td>
                        <td>
                            <input 
                                type="text" 
                                placeholder="Type" 
                                name="type" 
                                value="<?=$customer['type']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>Grade</td>
                        <td>:</td>
                        <td>
                            <input 
                                type="grade" 
                                placeholder="grade" 
                                name="grade"
                                value="<?=$customer['grade']?>" 
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td>:</td>
                        <td>

                            <input 
                                type="number" 
                                placeholder="duration" 
                                name="duration" 
                                value="<?=$customer['duration']?>"
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