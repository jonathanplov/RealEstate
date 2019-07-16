<?php
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

if(isset($_GET['code'])){
    $code = $_GET['code'];
}

$query = "SELECT * FROM estates WHERE locationCode = '$code'";

if ($result = mysqli_query($conn,$query)) {

    if($result->num_rows == 0){
        ?>
        <h5 style="text-align: center;">No estates found from postcode: <?php echo $code;?></h5>
        <?php
    }

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $type = $row['typeOfEstate'];
        $address = $row['address'];
        $address = strlen(strval($address)) > 23 ? substr(strval($address),0,23)."" : strval($address);
        $address = explode(",",$address);
        $location = $row['location'];
        $price = $row['price'];
        $price = explode(" ",$price);
        $priceSQM = $row['priceSQM'];
        $priceSQM = explode(" ",$priceSQM);
        $imgURL = $row['imgURL'];

        ?>

    <div class="estateCard purpleBorder" style="width: calc(25% - 10px);">
        
        <div class="estateType" style="background: #11204C;"><?php

        if($type == "villa"){
            echo "V";
        }else if($type == 'raekkehus'){
            echo "R";
        }else if($type == 'ejerlejlighed'){
            echo "E";
        }
        
        
        ?></div>
        <div class="thumbnailImg" style='background-image: url("<?php echo $imgURL ?>");'></div>
        <div class="card-body">
        <h5 class="card-title" style="text-align: center; text-overflow: ellipsis;"><?php echo $address[0]; ?></h5>
        <ul class="list-group list-group-flush">

            <li class="list-group-item">

            <div class="input-group mb-3">
                <input type="text" class="form-control" style="text-align: center;" placeholder="<?php echo $price[0]; ?>" aria-label="---" aria-describedby="basic-addon2" readonly>
                <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">DKK</span>
                </div>
            </div>
            


            </li>

            <li class="list-group-item">

            <div class="input-group mb-3">
            <input type="text" class="form-control" style="text-align: center;" placeholder="<?php echo $priceSQM[0]; ?>" aria-label="---" aria-describedby="basic-addon2" readonly>
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">DKK / m²</span>
            </div>
            </div>



            </li>
    
        </ul>

        <div class="card-footer" style="margin: 0px -20px -20px -20px; text-align: center;">
            <small class="text-muted">Id #<?php echo $id ?></small>
        </div>
        </div>


        
    </div>
<?php
    }

    /* free result set */
    mysqli_free_result($result);
}

?>
