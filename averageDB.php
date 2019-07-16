<?php

function avgPriceInCode($code){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates WHERE locationCode = '$code'";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
            $price = str_replace(".","",strval($price));
            $price = explode(" ",$price);
            $totalprice += $price[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}

function avgPriceInCodeOfType($code, $type){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates WHERE locationCode = '$code' AND typeOfEstate = '$type'";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
            $price = str_replace(".","",strval($price));
            $price = explode(" ",$price);
            $totalprice += $price[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}

function avgPriceInCodeOfTypeSQM($code, $type){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates WHERE locationCode = '$code' AND typeOfEstate = '$type'";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $priceSQM = $row['priceSQM'];
            $priceSQM = str_replace(".","",strval($priceSQM));
            $priceSQM = explode(" ",$priceSQM);
            $totalprice += $priceSQM[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}

function avgPriceInCodeSQM($code){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates WHERE locationCode = '$code'";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $priceSQM = $row['priceSQM'];
            $priceSQM = str_replace(".","",strval($priceSQM));
            $priceSQM = explode(" ",$priceSQM);
            $totalprice += $priceSQM[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}


/* Find national averages */

function avgPrice(){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
            $price = str_replace(".","",strval($price));
            $price = explode(" ",$price);
            $totalprice += $price[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}

function avgPriceOfType($type){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates WHERE typeOfEstate = '$type'";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
            $price = str_replace(".","",strval($price));
            $price = explode(" ",$price);
            $totalprice += $price[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}

function avgPriceOfTypeSQM($type){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates WHERE typeOfEstate = '$type'";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $priceSQM = $row['priceSQM'];
            $priceSQM = str_replace(".","",strval($priceSQM));
            $priceSQM = explode(" ",$priceSQM);
            $totalprice += $priceSQM[0];
            
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}

function avgPriceSQM(){
    $dbserver ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $db ="realestate";
  
    //Establish database connection
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
  
    //Check for connection
  
    if ($conn->connect_error){
      die("Connection to database failed : " .$conn->connect_error);
     }
  
    $conn->set_charset('utf8');

    $query = "SELECT * FROM estates";
    $totalprice = 0;
    if ($result = mysqli_query($conn,$query)) {

        while ($row = mysqli_fetch_assoc($result)) {
            $priceSQM = $row['priceSQM'];
            $priceSQM = str_replace(".","",strval($priceSQM));
            $priceSQM = explode(" ",$priceSQM);
            $totalprice += $priceSQM[0];
        }
        return $totalprice / $result->num_rows;
        /* free result set */
        mysqli_free_result($result);

    }
}


?>
