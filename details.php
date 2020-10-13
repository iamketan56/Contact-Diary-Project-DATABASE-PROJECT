<?php
include('Connection.php');

$id = $_GET['q'];
$query = "SELECT id,name,phone,email FROM contacts WHERE id='$id'";
$run_query = mysqli_query($conn, $query);
$contact = mysqli_fetch_object($run_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Contact Details</h2>
    <hr>
    <a href="index.php"><button>Back</button></a>
    <fieldset>
    <legend>List</legend>
    <table border="1" cellspacing="3" cellpading="3" width="50%">
    <tr>
    <th>#ID</th>
    <td><?= $contact->id ?> </td>
    </tr>
    <tr>
    <th>NAME</th>
    <td><?= $contact->name ?> </td>
    </tr>
    <tr>
    <th>EMAIL</th>
    <td><?= $contact->email ?> </td>
    </tr>
    <tr>
    <th>PHONE</th>
    <td><?= $contact->phone ?> </td>
    </tr>
    <tr>
    
    <td colspan="2" align="right">
    <a href="delete.php?q=<?=$contact->id;?>"  onclick="return confirm('Are you sure to delete this?')"><button>Delete</button></a> </td>
    </tr>
    

    </table>
    </fieldset>
</body>
</html>
