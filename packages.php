<?php

  include 'backend/Database_Configuration.php';
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

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Packages</title>
        <link rel="stylesheet" type="text/css" href="css/topup.css">
    </head>

    <body>
        <table style="border: 2px solid green;">
            <tr>
                <Td width="1200px" style="background-color: green;">
                    <div class="top-left" style="width: 500px;">
                        <img src="images/airborne.png" width="40%" height="150px">
                    </div>
                </Td>
                <Td width="300px" style="background-color: green;">
                    <div>
                        <button onclick="window.open('form.html','_self');">Sign Up</button>
                        <button onclick="window.open('login.html','self');">Login</button>
                    </div>
                </Td>
            </Tr>
        </table>
        <div class="content1">
            <img src="images/hiking.jpg" alt="hiking" class="img" onclick="window.open('index.html', '_self');">
            <div class="label2">
                Home
            </div>

            <img src="images/supboard.jpg" class="img" onclick="window.open('http://localhost/Travel_Agency/packages.php', '_self');">
            <div class="label3">Packages
            </div>

            <img src="images/rafting.jpg" class="img" onclick="window.open('activities.html', '_self');">
            <div class="label4">
                Activities
            </div>

            <img src="images/everest.jpg" class="img" onclick="window.open('vlog.html', '_self');">
            <div class="label5">
                Vlogs
            </div>

            <img src="images/annapurna.webp" class="img" onclick="window.open('aboutus.html', '_self');">
            <div class="label6">
                About Us
            </div>
        </div>

        <?php
            $count=0;
            if($count<=2){
            foreach ($packages as $index => $package) {?>

            <div class="package" style="background-color: lightblue; text-align: center;">
                <table align="center">
                    <caption>
                        <?=$package['full_name']?>
                    </caption>
                    <tr>
                        <Td rowspan="5">
                            <div name="package_photo">
                                <img src="<?=$package['image']?>">
                            </div>
                        </Td>
                        <td>Name : </td>
                        <td>
                            <?=$package['full_name']?>
                        </td>
                    </tr>
                    <tr>
                        <td>Season : </td>
                        <td>
                            <?=$package['season']?>
                        </td>
                    </tr>
                    <tr>
                        <td>Type : </td>
                        <Td>
                            <?=$package['type']?>
                        </Td>
                    </tr>
                    <Tr>
                        <Td>Grade : </Td>
                        <td>
                            <?=$package['grade']?>
                        </td>
                    </Tr>
                    <Tr>
                        <td>Duration : </td>
                        <td>
                            <?=$package['duration']?> Days</td>
                    </Tr>
                    <tr>
                        <td class="button">
                            <button>BOOK NOW</button>
                        </td>
                        <td colspan="3" class="button">
                            <button>MORE INFO</button>
                        </td>
                    </tr>
                </table>
            </div>
            <?php 
                $count++;
            }
        }?>

                <div class="footermodel">
                    <div class="footer1">
                        <img src="images/airborne.png" class="footer_img">
                        <br>
                        <label>Lets feel adventure with Airborne Adventure Nepal. Many exciting and amazing adventurous spots are included in the packages. We are here to get you there. Just give us an opportunity to serve you.</label>
                    </div>

                    <div class="footer2">
                        <span><b> <h2>CONTACT US</h2></b></span>
                        <br>
                        <br>
                        <br>
                        <label>
                            Address : Paknajol Marg,
                            <br>Banasthali, Kathmandu Phone : +977-01-4350597
                            <br>
                            <br> info@airbornenepal.com
                        </label>
                        <br />
                        <br />
                        <br />

                        <a href=""><img src="images/fb.png" class="footerlogo"></a>
                        <img src="images/skype.png" class="footerlogo">
                        <img src="images/twitter2.png" class="footerlogo">
                        <img src="images/insta.png" class="footerlogo">
                    </div>

                    <div class="closer">
                        <label>
                            Copyright 2019 Airborne Adventure Nepal, All Rights Reserved.
                        </label>
                    </div>

                </div>

    </body>
    <style>
        table,
        tr,
        td {
            border: 2px solid black;
            padding: 1px;
        }
        
        .button {
            background-color: blue;
            color: white;
        }
        
        body {
            color: white;
        }
        
        table {
            font-size: 30px;
        }
        
        caption {
            font-size: 40px;
        }
        
        button {
            display: inline-block;
            background-color: #7b38d8;
            border-radius: 10px;
            border: 4px double green;
            color: white;
            text-align: center;
            font-size: 20px;
            padding: 20px;
            width: 150px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }
    </style>

    </html>