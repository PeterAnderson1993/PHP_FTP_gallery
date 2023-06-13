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

  /*
  $filelist = ftp_rawlist($ftp_conn, "/172653/email-marketing/2.0/sports_banners/bridging");

foreach ($filelist as $value) {
  echo "$value <br>";
}
*/

$membership="cinema";
$imgType="hero";

$dir="/172653/email-marketing/2.0/ents_content_standard";


$dirlist = ftp_mlsd($ftp_conn, $dir);

$myJSON=json_encode($dirlist);

$decodedJSON = json_decode($myJSON);

$i = 0;

while($i < sizeof($dirlist))
 {
echo("<img src='https://web.static.nowtv.com/email-marketing/2.0/ents_content_standard/{$dirlist[$i]["name"]}' width='200'><br><span style='font-size:12px'>{$dir}/{$dirlist[$i]["name"]}</span><br><br>");
 	$i++;
 }

// close connection
ftp_close($ftp_conn);
?>