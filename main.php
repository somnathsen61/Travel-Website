<?php
$insert=false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $passward = "";
    $con= mysqli_connect($server,$username,$passward);

    if(!$con){
        die("connection to this database failed due to ". mysqli_connect_error());
    }
    //echo "success connect to the db";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name=test_input($_POST['name']);
        $email=test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $city =test_input($_POST['city']);
        $destination =test_input($_POST['destination']);
        $travelers = test_input($_POST['travelers']);
    }
   
    $sql="INSERT INTO `travel`.`contacts` (`name`, `email`, `phone`, `city`, `destination`, `travelers`, `date`) VALUES ('$name', '$email', '$phone', '$city', '$destination', '$travelers', current_timestamp());";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "<h3>Thank You for connect with us.</h3>";
        echo "The record has been inserted successfully!<br><br>";
        echo "<a href='index.html'>Go Back</a>";
        $insert=true;
    }
    else{
        echo "The record was not inserted successfully because of this error ---> ". mysqli_error($con);
    }
}

?>
