<?php
  if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "register";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM tb_residents WHERE id=$id";
    $result = $connection->query($sql);
  
    }
    
    header("Location: /bargain/index.php");
    exit;
?>