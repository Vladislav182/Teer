<?php include("./connection.php") ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.</title>
  </head>

  <body>
  <table class="table">
  <thead>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">E-mail</th>
    </tr>

  </thead>
  <tbody>
    
  <?php $users = Connection::getUsers(); 
      foreach($users as $user){
   ?>
    <tr> 
      <th scope="row"><?php echo $user['id'] ?></th>
      <td><?php echo $user['firstname'] ?></td>
      <td><?php echo $user['lastname'] ?></td>
      <td><?php echo $user['email'] ?></td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>

  </body>
</html>
<?php 
Connection::close_connection();
?>
