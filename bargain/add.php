<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$position = "";
$birthdate = "";
$gender = "";
$address = "";
$contact = "";

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST["name"];
  $position = $_POST["position"];
  $birthdate = $_POST["birthdate"];
  $gender = $_POST["gender"];
  $address = $_POST["address"];
  $contact = $_POST["contact"];

  // Insert data into the database
  $insert_query = "INSERT INTO brgy_official (name, position, birthdate, gender, address, contact) 
                   VALUES ('$name', '$position', '$birthdate', '$gender', '$address', '$contact')";

  if ($connection->query($insert_query) === TRUE) {
    $successMessage = "New official added successfully";
    header("Location: brgy.php");
    exit();
  } else {
    $errorMessage = "Error: " . $insert_query . "<br>" . $connection->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container my-5">
    <h2>New Resident</h2>
    <form method="post">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Position</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="position" value="<?php echo $position; ?>">
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
          <a class="btn btn-outline-primary" href="/register/brgy.php" role="button">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
