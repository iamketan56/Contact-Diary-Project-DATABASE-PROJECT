<?php
include('Connection.php');
$id = $_GET['q'];


$query = "DELETE FROM contacts WHERE id = '$id'";

if(mysqli_query($conn,$query))
{
    header("location: index.php");
   
}
else
{
    echo 'Can not Delete';
}
?>