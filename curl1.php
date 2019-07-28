<?php 

?><?php
$curl = curl_init('https://www.w3schools.com/sql/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
 
$page = curl_exec($curl);
 
if(curl_errno($curl)) // check for execution errors
{
	echo 'Scraper error: ' . curl_error($curl);
	exit;
}
 
curl_close($curl);
// $regex = '/<div id="case_textlist">(.*?)<\/div>/s'; 
//$regex = '/<div id="owl-demo">(.*?)<\/div>/s';
$regex='/<div class="w3-panel w3-info intro">(.*?)<\/div>/s';
if ( preg_match($regex, $page, $list) )
    echo $list[0];
else 
    print "Not found"; 
?>