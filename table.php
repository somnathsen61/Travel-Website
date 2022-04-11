<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table with DataBase</title>
    <style>
        table{
            border:2px solid black;
            border-collapse:collapse;
            width:100%;
            font-family: 'Ubuntu', sans-serif;
            font-size: 25px;
            text-align:left;
        }
        th{
            background-color: lightblue;
            border:2px solid black;
        }
        td{
            border:2px solid black;
        }
        tr:nth-child(odd){
            background-color: lightblue;
        }
        .button{
            position: relative;
            left:20px;
            background-color:red;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius:15px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Departure City</th>
        <th>Destination</th>
        <th>Travelers</th>
        <th>Operation</th>
    </tr> 

<?php

    $server = "localhost";
    $username = "root";
    $passward = "";
    $dbname = "travel";

    $con= mysqli_connect($server,$username,$passward,$dbname);

    if(!$con){
        die("connection to this database failed due to ". mysqli_connect_error());
    }
    //echo "success connect to the db<br>";

    $sql = "SELECT * FROM `travel`.`contacts`";
    $result = mysqli_query($con, $sql) or die( mysqli_error($con));

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row['id']. "</td><td>". $row['name']."</td><td>". $row['email']. "</td><td>". $row['phone']. "</td><td>". $row['city'].  "</td><td>". $row['destination']. "</td><td>". $row['travelers']. "</td><td><a class='button' href='delete1.php?id=$row[id]'>Delete</td></tr>";
    }
    echo "</table>";

    $num = mysqli_num_rows($result);
    echo"<h3>". $num;
    echo " records found in the DataBase</h3><br>";  
?>

</table>   
</body>
</html>