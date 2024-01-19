<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Residents Information</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<style>
 .table {
 border-collapse: collapse;
 width: 100%;
 font-size: 14px;
}

.table th, .table td {
 border: 1px solid #ddd;
 padding: 8px;
 text-align: left;
}

.table th {
 background-color: #f2f2f2;
 font-weight: bold;
}

.table tr:hover {
 background-color: #ddd;
}
</style>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="create.php">Add Resident</a>
          </li>
        </ul>
      </div>
    </div>
 </nav>

 <div class="container my-5">
    <h2>Residents Information</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th> 
          <th>Name</th> 
          <th>Birthdate</th> 
          <th>Gender</th> 
          <th>Address</th> 
          <th>Contact</th> 
          <th>Action</th> 
        </tr>
      </thead>
      <tbody>
        <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $database = "register";
 
         // create connection
         $connection = new mysqli($servername, $username, $password, $database);
 
         // check connection
         if ($connection->connect_error) {
           die("Connection failed: " . $connection->connect_error);
         }
 
         // read the row database  
         $sql =  "SELECT * FROM tb_residents";
         $result = $connection->query($sql);
 
         if (!$result) {
           die("Invalid query: ". $connection->error);
         }
 
         // read data each row
         while($row = $result->fetch_assoc()) {  
           echo "
            <tr>
           <td>$row[id]</td>
           <td>$row[name]</td>
           <td>$row[birthdate]</td>
           <td>$row[gender]</td>
           <td>$row[address]</td>
           <td>$row[contact]</td>
           <td>
           <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
           <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
 
           </td>
         </tr>
           ";
         }
         ?>
       
      </tbody>
    </table>
 </div>
</body>
</html>