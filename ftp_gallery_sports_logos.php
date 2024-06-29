<?php
// connect to FTP server
$ftp_server = "bskybnowtv.upload.akamai.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

$dir="/172653/email-marketing/2.0/sports_logos";

// login
if (@ftp_login($ftp_conn, "bskybnowtvemail", "!1biceejr"))
  {
  echo "<script>console.log('Connection established: {$dir}')</script>";
  }
else
  {
  echo "<script>console.log('Couldn't establish a connection')</script>";
  }

ftp_pasv($ftp_conn, true);

$membership="cinema";
$imgType="hero";


$dirlist = ftp_mlsd($ftp_conn, $dir);

$myJSON=json_encode($dirlist);

$decodedJSON = json_decode($myJSON);

$i = 0;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Image Gallery</title>

  <link rel="stylesheet" href="css/image_model.css">
  <link rel="stylesheet" href="css/nav_bar.css">
  <script src="js/includeHTML.js"></script>

</head>
<body style="background-color:#001211; color:white;">

<div w3-include-html="html_modules/nav_bar.html"></div>

<?php

echo "<br><br>";

while($i < sizeof($dirlist))
 {
echo("
<!-- Trigger the Modal -->
<img id='myImg{$i}' class='myImg' src='https://web.static.nowtv.com/email-marketing/2.0/sports_logos/{$dirlist[$i]["name"]}' alt='{$dirlist[$i]["name"]}' alt='{$dirlist[$i]["name"]}' style='max-height:100px' onClick='displayModel(`myImg{$i}`,`myModal{$i}`,`img{$i}`, `caption{$i}` )'>

<!-- The Modal -->
<div id='myModal{$i}' class='modal'>

  <!-- The Close Button -->
  <span class='close' onClick='closeModel(`myModal{$i}`)'>&times;</span>

  <!-- Modal Content (The Image) -->
  <img class='modal-content' id='img{$i}'>

  <!-- Modal Caption (Image Text) -->
  <div id='caption{$i}' class='caption'></div>
</div>");
 	$i++;
 }

?>


</body>

<script>


// Get the image and insert it inside the modal - use its "alt" text as a caption
function displayModel(imgid, modelID, modelImageID, captionID){ 

var img = document.getElementById(imgid);

// Get the modal
var modal = document.getElementById(modelID);

  var modalImg = document.getElementById(modelImageID);

  var captionText = document.getElementById(captionID);

    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
function closeModel(modelID) { 
  var modal = document.getElementById(modelID);
  modal.style.display = "none";
}


</script>

<script>
includeHTML();
</script>


</html>

<?php
// close connection
ftp_close($ftp_conn);

?>