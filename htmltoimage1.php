<?php
print_r($_POST['imgData']);
if (isset($_POST['imgData'])) {
	echo 'sss';
  $imageData = $_POST['imgData'];
  $filteredData = substr($imageData, strpos($imageData, ",") + 1);
  $unencodedData = base64_decode($filteredData);
  $fp = fopen('file.png', 'wb');

  fwrite($fp, $unencodedData);
  fclose($fp);
}
?>