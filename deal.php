<?php
print_r($_POST);
print_r($_FILES);
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
?>
<?php
 $storage = new SaeStorage();
 $domain = 'img';
 $destFileName = $_FILES["file"]["name"];
 $srcFileName = $_FILES["file"]['tmp_name'];
 $attr = array('encoding'=>'gzip');
 $result = $storage->upload($domain,$destFileName, $srcFileName);
?>
<?php
	$url=$storage->geturl("img",$_FILES["file"]["name"]);
print("<img src='$url' alt='hh'/>");
?>