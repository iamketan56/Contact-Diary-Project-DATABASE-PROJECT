<?php
include('Connection.php');
$id = $_GET['q'];

$query = "SELECT id,name,email,phone FROM contacts WHERE id = '$id'";

$run_query = mysqli_query($conn,$query);
$connect = mysqli_fetch_object($run_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Diary</title>
</head>
<body>
   <h1>Contacts</h1>
   <hr>
   <fieldset>
   <legend>
   Contacts
   </legend>
   <form method="POST" action="update.php?q=<?=$connect->id;?>">
   <table width="50%">
   <tr>
   <td>Name:</td>
   <td><input type="text" name="name"  value="<?= $connect->name;?>" required></td>
   </tr>
   <tr>
   <td>Email:</td>
   <td><input type="email" name="email" value="<?= $connect->email;?>" required></td>
   </tr>
   <tr>
   <td>Phone:</td>
   <td><input type="text" name="phone" value="<?= $connect->phone;?>" required></td>
   </tr>
   <tr>
   <td colspan="2">
   <button type="submit" name="submit">Update Contact</button></td>  
    </tr>
   </table>
   </form>
   </body>
   </html>