<?php
$con=mysqli_connect("localhost","root","","travel");
if(!$con){
    die('Could not Connect My Sql:' .mysql_error());
}
   
$id=$_GET['id'];
$data= mysqli_query($con, "DELETE FROM contacts WHERE id = $id");

?>
<script type="text/javascript" >
    window.location="table.php";

</script>


