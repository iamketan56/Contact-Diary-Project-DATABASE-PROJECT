<?php
 include('Connection.php');
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
   
    $query = "INSERT INTO contacts (name,email,phone) VALUES ('$name','$email','$phone')";
   if(mysqli_query($conn, $query))
   {
       echo '<strong style="color:green">Contact has been added</strong>';
   }
  
}

//show the data
$showdata = "SELECT * FROM contacts ";
  $run = mysqli_query($conn, $showdata);
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
   <form method="POST" action="index.php">
   <table width="50%">
   <tr>
   <td>Name:</td>
   <td><input type="text" name="name" required></td>
   </tr>
   <tr>
   <td>Email:</td>
   <td><input type="email" name="email" required></td>
   </tr>
   <tr>
   <td>Phone:</td>
   <td><input type="text" name="phone" required></td>
   </tr>
   <tr>
   <td colspan="2">
   <button type="submit" name="submit">Create Account</button></td>  
    </tr>
   </table>
   </form>
   </fieldset>
    <h3>Contact List</h3>
    <hr>
    <?php
    if($run->num_rows == 0 )
   {
       echo "<strong style='color:red'>No Data Found</strong>";
   }
   ?>
    <fieldset>
    <legend>Contact List</legend>
   <table width="50%" cellpadding="5" cellspacing="5" border="1">
   <tr>
   <th>#ID</th>
   <th>Name</th>
   <th>Email</th>
   <th>Phone</th>
   <th>Action</th>
   </tr>
   <?php while( $contact = mysqli_fetch_object($run)):?>
   <tr>
        <td><?= $contact->id ?></td>
        <td><?= $contact->name ?></td>
        <td><?= $contact->email ?></td>
        <td><?= $contact->phone ?></td>
        <td><a href="delete.php?q=<?= $contact->id;?>" onclick="return confirm('Are you sure to delete this?')"><button>Delete</button></a>
        <a href="details.php?q=<?= $contact->id;?>"><button>Details</button></a>
        <a href="edit.php?q=<?= $contact->id;?>"><button>Update</button></a></td>
     </tr>
<?php endwhile; ?>
   </table>
   </fieldset>
</body>
</html>