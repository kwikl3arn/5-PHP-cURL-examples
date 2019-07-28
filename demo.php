<?php
// $handle = curl_init();
 
// $url = "https://phpenthusiast.com/blog/five-php-curl-examples";
 
// // // Set the url
// // curl_setopt($handle, CURLOPT_URL, $url);
// // // Set the result output to be a string.
// // curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

// curl_setopt_array($handle,
  // array(
      // CURLOPT_URL            => $url,
      // CURLOPT_RETURNTRANSFER => true
  // )
// );
 
// $output = curl_exec($handle);
 
// curl_close($handle);
 
// echo $output;



$url = "https://www.bookrix.com/book.html?bookID=aditidasbhowmik_1265307098.2268860340#0,486,5472";
 
$file = __DIR__ . DIRECTORY_SEPARATOR . "the_divine_comedy.html";
 
$handle = curl_init();
 
$fileHandle = fopen($file, "w");
 
curl_setopt_array($handle,
  array(
    CURLOPT_URL    => $url,
    CURLOPT_FILE   => $fileHandle,
    CURLOPT_HEADER => true
  )
);
 
$data = curl_exec($handle);
 
$responseCode   = curl_getinfo($handle, CURLINFO_HTTP_CODE);
 
$downloadLength = curl_getinfo($handle, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
 
if(curl_errno($handle))
{
  print curl_error($handle);
}
else
{
  if($responseCode == "200") echo "successful request";
    
  echo " # download length : " . $downloadLength;
 
  curl_close($handle);
 
  fclose($fileHandle);
}