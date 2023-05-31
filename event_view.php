<?php include('session.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <?php include('head.php'); ?>
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
<body>
    <?php include("nav.php");?>

    <?php if(!$user){
        $_SESSION['message']="You need to login first";
        header("location:index.php");
    } ?>
    <?php if($user->type==="admin"){ 
        echo "<h1>All Events</h1>";
        $query="select `id`, `userid`, `name`, `type`, `date`, `city`, `members` from events;";
        $result=$conn->query($query);
        $entries=$result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        echo "<h1>My Events</h1>";
        $user_id=$_SESSION['login_user'];
        $query="select `id`, `userid`, `name`, `type`, `date`, `city`, `members` from events where userid='$user_id';";
        $result=$conn->query($query);
        $entries=$result->fetch_all(MYSQLI_ASSOC);
    }
    ?>


    
  <table>
    <thead>
      <tr>
        <?php if($user->type==="admin"){ ?>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Mobile</th>
        <?php } ?>
        <th>Event Name</th>
        <th>Event Type</th>
        <th>Event Date</th>
        <th>Event City</th>
        <th>Event Members</th>
      </tr>
    </thead>
    <tbody>
      <!-- Assuming you have data from the database in an array called 'entries' -->
      <?php foreach ($entries as $entry) { ?>
        <tr data-eve-id="<?php echo $entry['id'];?>" >
        <?php if($user->type==="admin"){ ?>
        <?php $user_id=$entry['userid'];
        $query="select `name`, `email`, `mobile` from users where id='$user_id';";
        $result=$conn->query($query);
        $user_data=$result->fetch_assoc();
        ?>
            <td><?php echo $user_data['name']; ?></td>
            <td><?php echo $user_data['email']; ?></td>
            <td><?php echo $user_data['mobile']; ?></td>
        <?php } ?>

          <td><?php echo $entry['name']; ?></td>
          <td><?php echo $entry['type']; ?></td>
          <td><?php echo $entry['date']; ?></td>
          <td><?php echo $entry['city']; ?></td>
         <td><?php echo $entry['members']; ?></td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
