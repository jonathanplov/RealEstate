<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title>Real Estate management: Add</title>

    <!-- Image and text -->
    <nav class="navbar navbar-light themeColor">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" width="50%" height="50%" class="d-inline-block align-top" alt="">
        </a>
        <button type="button" class="btn btn-light">
      Total estates in database:  <span class="badge badge-theme"><?php require_once("dbSize.php")?></span>
    </button>
    </nav>
  </head>

  <br>

  <div class="navBarCenter">

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Show estates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Add estate</a>
      </li>
    </ul>

  </div>

  <br>
  
  <div class="estateCardBox">
    <h4>Add estate</h4>

    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Select type</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" required>
    <option selected>Choose...</option>
    <option value="villa">Villa</option>
    <option value="Raekkehus">Raekkehus</option>
    <option value="Ejerlejlighed">Ejerlejlighed</option>
  </select>
</div>

<form>
      <div class="form-row">
        <div class="col">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Postcode</span>
            </div>
            <input type="text" class="form-control" id="postcode" aria-describedby="basic-addon3" required>
          </div>
        </div>
        <div class="col">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">City</span>
            </div>
            <input type="text" class="form-control" id="city" aria-describedby="basic-addon3" readonly>
          </div>
        </div>
        </div>
        </form>

        <div class="input-group mb-3">
      <div class="custom-file">
        <input type="file" class="custom-file-input is-invalid" id="inputGroupFile02">
        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose image</label>
      </div>
      <div class="invalid-feedback" style="display: inline;">
        Functionality not yet implemented
        </div>
    </div>


    <form>
      <div class="form-row">
        <div class="col">
          <input class="form-control" id="address"  placeholder="Address" required>
        </div>
        <div class="col">
            <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Size of estate</span>
          </div>
          <input type="text" class="form-control" id="size" required>
          <div class="input-group-append">
            <span class="input-group-text">m²</span>
          </div>
        </div>
        </div>
        </form>

        <br>
        <div class="alert alert-danger" role="alert" id="missingValues" style="width: 100%; display: none;">
          Missing values
        </div>

    <button type="button" id="recommendedPrice" class="btn btn-primary btn-lg btn-block" style="background-color: #11204C; border-color: #11204C;" onclick="getRommendedPrice()">Get recommended price</button>
    
    <script>

    function getRommendedPrice() {

      var code = document.getElementById("postcode").value;
      var type = document.getElementById('inputGroupSelect01').value;
      var address = document.getElementById('address').value;
      var sizeSQM = document.getElementById('size').value;

      if((code !== '') && (type !== 'Choose...') && (address !== '') && (sizeSQM !== '')){
        window.location.href = '/realestate/add.php?code='+code+'&type='+type+'&sizeSQM='+sizeSQM+'&address='+address;
      }else{
        var alert = document.getElementById('missingValues');
        alert.style.display = 'inline';
      }
      

    }

    function onPageLoad(){
      var code = <?php
        if(isset($_GET['code'])){
          $code = $_GET['code'];
          echo $code;
        }else{
          echo 'false';
        }?>;
      var type = '<?php
        if(isset($_GET['type'])){
          $type = $_GET['type'];
          echo $type;
        }else{
          echo 'false';
        }?>';
      var sizeSQM = <?php
        if(isset($_GET['sizeSQM'])){
          $sizeSQM = $_GET['sizeSQM'];
          echo $sizeSQM;
        }else{
          echo 'false';
        }?>;
      var address = '<?php
        if(isset($_GET['address'])){
          $address = $_GET['address'];
          echo $address;
        }else{
          echo 'false';
        }?>';


        if((code !== 'false') && (type !== 'false') && (address !== 'false') && (sizeSQM !== 'false')){

        document.getElementById("postcode").value = code;
        document.getElementById("inputGroupSelect01").value = type;
        document.getElementById("size").value = sizeSQM;
        document.getElementById("address").value = address;

        xmlLoad()

        document.getElementById('hide1').style.display = 'inline';
        document.getElementById('hide2').style.display = 'inline';
        document.getElementById('hide3').style.display = 'flex';

        }
    }

    

    window.onload = onPageLoad;
  </script>

      </div>
    
      <br>
      <br>

      <form id="hide1" style="display: none;">
      <div class="form-row">

        <div class="col">
            <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Avg. in <?php echo $code;?></span>
          </div>
          <input type="text" class="form-control" style="text-align: center;" value="<?php 
          
          include 'averageDB.php';
          $avgPriceInCode = avgPriceInCode($code);
          echo number_format(intval($avgPriceInCode), 0, ',', '.');

          ?>" readonly>
          <div class="input-group-append">
            <span class="input-group-text">DKK</span>
          </div>
          <div class="input-group-append">
            <?php 
            
            $avgPrice = avgPrice();

            ?>
          <span class="input-group-text <?php if($avgPriceInCode < $avgPrice){echo 'border-danger text-danger';}else{echo 'border-success text-success';}?>"><?php if($avgPriceInCode < $avgPrice){echo '';}else{echo '+';} echo intval((($avgPriceInCode-$avgPrice)/$avgPrice)*100);?>% comp. to nat. avg.</span>
          </div>
        </div>

        </div>
        <div class="col">
            <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Avg. in <?php echo $code;?> of type</span>
          </div>
          <input type="text" class="form-control" style="text-align: center;" value="<?php 
          
          $avgPriceInCodeOfType = avgPriceInCodeOfType($code, $type);
          echo number_format(intval($avgPriceInCodeOfType), 0, ',', '.');

          ?>" readonly>
          <div class="input-group-append">
            <span class="input-group-text">DKK</span>
          </div>
          <div class="input-group-append">
          <?php 
            
            $avgPriceOfType = avgPriceOfType($type);

            ?>
            <span class="input-group-text <?php if($avgPriceInCodeOfType < $avgPriceOfType){echo 'border-danger text-danger';}else{echo 'border-success text-success';}?>"><?php if($avgPriceInCodeOfType < $avgPriceOfType){echo '';}else{echo '+';} echo intval((($avgPriceInCodeOfType-$avgPriceOfType)/$avgPriceOfType)*100);?>% comp. to nat. avg.</span>
          </div>
        </div>
        </div>
        </form>

</div>

<form id="hide2" style="display: none;">
      <div class="form-row">

        <div class="col">
            <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Avg. in <?php echo $code;?></span>
          </div>
          <input type="text" class="form-control" style="text-align: center;" value="<?php 
          
          $avgPriceInCodeSQM = avgPriceInCodeSQM($code);
          echo number_format(intval($avgPriceInCodeSQM), 0, ',', '.');

          ?>" readonly>
          <div class="input-group-append">
            <span class="input-group-text">DKK / m²</span>
          </div>
          <div class="input-group-append">
          <?php 
            
            $avgPriceSQM = avgPriceSQM();

            ?>
            <span class="input-group-text <?php if($avgPriceInCodeSQM < $avgPriceSQM){echo 'border-danger text-danger';}else{echo 'border-success text-success';}?>"><?php if($avgPriceInCodeSQM < $avgPriceSQM){echo '';}else{echo '+';} echo intval((($avgPriceInCodeSQM-$avgPriceSQM)/$avgPriceSQM)*100);?>% comp. to nat. avg.</span>
          </div>
        </div>

        </div>
        <div class="col">
            <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Avg. in <?php echo $code;?> of type</span>
          </div>
          <input type="text" class="form-control" style="text-align: center;" value="<?php 
          
          $avgPriceInCodeOfTypeSQM = avgPriceInCodeOfTypeSQM($code,$type);
          echo number_format(intval($avgPriceInCodeOfTypeSQM), 0, ',', '.');

          ?>" readonly>
          <div class="input-group-append">
            <span class="input-group-text">DKK / m²</span>
          </div>
          <div class="input-group-append">
          <?php 
            
            $avgPriceOfTypeSQM = avgPriceOfTypeSQM($type);

            ?>
            
            <span class="input-group-text <?php if($avgPriceInCodeOfTypeSQM < $avgPriceOfTypeSQM){echo 'border-danger text-danger';}else{echo 'border-success text-success';}?>"><?php if($avgPriceInCodeOfTypeSQM < $avgPriceOfTypeSQM){echo '';}else{echo '+';} echo intval((($avgPriceInCodeOfTypeSQM-$avgPriceOfTypeSQM)/$avgPriceOfTypeSQM)*100);?>% comp. to nat. avg.</span>
          </div>
        </div>
        </div>
        </form>

  </div>

      <div class="input-group" style="display: none;" id="hide3">
      <div class="input-group-prepend">
        <span class="input-group-text">Recommended price:</span>
      </div>
      <input type="text" class="form-control" style="text-align: center;" value="
      <?php
        echo number_format(intval($avgPriceInCodeOfTypeSQM*$sizeSQM), 0, ',', '.');
      ?>
      " readonly>
      <div class="input-group-append">
        <span class="input-group-text">DKK</span>
      </div>
    </div>


  <script>
    
       
    document.getElementById("postcode").addEventListener("change", xmlLoad);

    function xmlLoad() {
      
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'pythonScripts/postcodeData.xml', true);

      xhr.timeout = 2000;

      xhr.onload = function () {

        var xmlDoc = this.responseXML;
        searchCity(xmlDoc)
      };

      xhr.ontimeout = function (e) {
        // XMLHttpRequest timed out. Do something here.
      };

      xhr.send(null);


    }

    function searchCity(xml){

      var x = document.getElementById("postcode")
      var txt = "";
      path = "/postcodeData/locationRecord[code ="+x.value+"]/desc";
      if (xml.evaluate) {
        var nodes = xml.evaluate(path, xml, null, XPathResult.ANY_TYPE, null);
        var result = nodes.iterateNext();
        document.getElementById("city").value = result.childNodes[0].nodeValue;
    }
    }


</script>
    
  </body>
</html>