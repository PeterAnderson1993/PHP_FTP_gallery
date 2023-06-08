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

$dir="/172653/email-marketing/3.0/{$membership}/{$imgType}";


$dirlist = ftp_mlsd($ftp_conn, $dir);

$myJSON=json_encode($dirlist);



while($i < sizeof($myJSON))
{
	echo("<img src='https://web.static.nowtv.com/email-marketing/3.0/{$membership}/{$imgType}/ {$dirlist[$i]["name"]}' width='200'>");
	$i++;
}

echo($myJSON);



// close connection
ftp_close($ftp_conn);
?>

<br>
<img src="https://web.static.nowtv.com/email-marketing/3.0/<?=$membership?>/<?=$imgType?>/<?= $dirlist[0]["name"] ?>" alt="" width="200">