<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}


$id = "";
$name = "";
$birthdate = "";
$gender = "";
$address = "";
$contact = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
  // get method
  
  if (!isset($_GET['id']) ) {
    header("Location:index.php");
    exit;

  }

  $id = $_GET["id"];

  $sql = "SELECT * FROM tb_residents WHERE id=$id";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("Location:index.php");
    exit;
  }

  $name = $row["name"];
  $birthdate = $row["birthdate"];
  $gender = $row["gender"];
  $address = $row["address"];
  $contact = $row["contact"];


}
else {
  // update data

    $id = $_POST["id"];
    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];

    $sql = "UPDATE tb_residents " .
    "SET name = '$name', birthdate = '$birthdate', gender = '$gender', address = '$address', contact = '$contact' " .
    "WHERE id = $id";
  
    $result = $connection->query($sql);
    if (!$result) {
    die("Query failed: " . $connection->error);
}
    header("Location:index.php");
    exit;

}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container my-5">
    <h2>New Resident</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Birthdate</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Contact</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a class="btn btn-outline-primary" href="/register/index.php" role="button">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</body>
</html>