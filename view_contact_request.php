<?php include 'session.php'; ?>
<?php if(!$user && $user->type!="admin"){ 
    $_SESSION['message']="You are not authorized to view this page";
    header("location:index.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
    
    <?php include 'head.php'; ?>    
  <style>
    body{
        margin-top: 5em;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      font-family: Arial, sans-serif;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
      color: #333;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>
<?php
$query = "select firstname, lastname, email, mobile, message,datetime from contactus;"; 
$result = $conn->query($query);
$entries = $result->fetch_all(MYSQLI_ASSOC);
?>
<body>
    <?php include 'nav.php'; ?>
    <h1>Contact Requests</h1>
  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
          <th>Mobile</th>
          <th>Message</th>
          <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <!-- Assuming you have data from the database in an array called 'entries' -->
      <?php foreach ($entries as $entry) { ?>
        <tr>
          <td><?php echo $entry['firstname']; ?></td>
          <td><?php echo $entry['lastname']; ?></td>
          <td><?php echo $entry['email']; ?></td>
            <td><?php echo $entry['mobile']; ?></td>
            <td><?php echo $entry['message']; ?></td>
            <td><?php echo $entry['datetime']; ?></td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
