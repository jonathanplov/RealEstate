<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <title>Real Estate management</title>

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
        <a class="nav-link active" href="">Show estates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">Add estate</a>
      </li>
    </ul>
</div>
    <br>

  <div class="showEstates">
    <h4>Show estates from certain postcode</h4>

    <form>
      <div class="form-row">
        <div class="col">
          <input type="text" id="postcode" class="form-control" placeholder="Postcode">
        </div>
        <div class="col">
          <input type="text" id="cityPlaceholder" class="form-control" placeholder="City" readonly>
        </div>

        <button type="reset" id="citySearch" class="btn btn-primary mb-2" style="background-color: #11204C; border-color: #11204C;" onclick="getEstates()">Search</button>

      </div>
    </form>


  </div>

  <script>

    function getEstates() {

      var code = document.getElementById("postcode").value;

        window.location.href = '/realestate/index.php?code='+code;

    }

  </script>

  <div class="estateCardBox">
      
  <?php

    if(isset($_GET['code'])){
      $code = $_GET['code'];

      require_once('/getEstates.php');
      

    }else{
      echo '<h5 style="text-align: center;">Please select a postcode to show estates</h5>';
    }

  ?>


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
        document.getElementById("cityPlaceholder").value = result.childNodes[0].nodeValue;
    }
    }

    function setCode(){
      var code = '<?php
      if(isset($_GET['code'])){
      $code = $_GET['code'];

      echo $code;

    }?>'

    document.getElementById("postcode").value = code;

    xmlLoad()


    }
    
    window.onload = setCode;

</script>

  </div>


  </body>

</html>