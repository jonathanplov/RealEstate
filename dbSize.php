<?php
  $dbserver ="localhost";
  $dbusername ="root";
  $dbpassword ="";
  $db ="realestate";

  //Establish database connection
  $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);

  //Check for connection

  if ($conn->connect_error){
    echo "error";
    die("Connection to database failed : " .$conn->connect_error);
   }

$conn->set_charset('utf8');

$query = "SELECT * FROM estates";

if ($result = mysqli_query($conn,$query)) {
    echo number_format(intval($result->num_rows), 0, ',', '.');
}

    /* free result set */
    mysqli_free_result($result);

?>
