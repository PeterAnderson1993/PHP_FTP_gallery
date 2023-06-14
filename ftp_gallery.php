<?php
// connect to FTP server
$ftp_server = "bskybnowtv.upload.akamai.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

// login
if (@ftp_login($ftp_conn, "bskybnowtvemail", "!1biceejr"))
  {
  echo "Connection established.<br><br>";
  }
else
  {
  echo "Couldn't establish a connection.<br><br>";
  }

ftp_pasv($ftp_conn, true);

$membership="cinema";
$imgType="hero";

$dir="/172653/email-marketing/3.0/ents/content";

echo "$dir<br><br>";


$dirlist = ftp_mlsd($ftp_conn, $dir);

$myJSON=json_encode($dirlist);

$decodedJSON = json_decode($myJSON);

$i = 0;

while($i < sizeof($dirlist))
 {
echo("
<!-- Trigger the Modal -->
<img id='myImg{$i}' class='myImg' src='https://web.static.nowtv.com/email-marketing/3.0/ents/content/{$dirlist[$i]["name"]}' alt='{$dirlist[$i]["name"]}' alt='{$dirlist[$i]["name"]}' style='max-height:100px' onClick='displayModel(`myImg{$i}`,`myModal{$i}`,`img{$i}`, `caption{$i}` )'>

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

// close connection
ftp_close($ftp_conn);
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
/* Style the Image Used to Trigger the Modal */
.myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 50px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  /*overflow: auto;  Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: auto;
  max-height: 500px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
.caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
  color:white;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
</head>
<body style="background-color:#001211; color:white;">

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>

</body>

<script>

var modal = "";

// Get the image and insert it inside the modal - use its "alt" text as a caption
function displayModel(imgid, modelID, modelImageID, captionID){ 

// Get the modal
var modal = document.getElementById(modelID);

  var img = document.getElementById(imgid);

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


</html>