<?php
print_r($_POST);
print_r($_FILES);
if ($_FILES["myfile"]["error"] > 0) {
    echo "Error: " . $_FILES["myfile"]["error"] . "<br />";
} else {
    echo "Upload: " . $_FILES["myfile"]["name"] . "<br />";
    echo "Type: " . $_FILES["myfile"]["type"] . "<br />";
    echo "Size: " . ($_FILES["myfile"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["myfile"]["tmp_name"];
}
?>
<?php
$uploadDir = "../unloadimg";
$fileTypes = array('jpg', 'png', 'gif', 'bmp');
$result = null;
$maxSize = 1 * pow(2, 20);

$myfile = $_FILES['myfile'];
$myfileType = substr($myfile['name'], strrpos($myfile['name'], ".") + 1);

if ($myfile['size'] > $maxSize) {
    $result = 1;
} else if (!in_array($myfileType, $fileTypes)) {
    $result = 2;
} elseif (is_uploaded_file($myfile['tmp_name'])) {
    $toFile = $uploadDir . '/' . $myfile['name'];
    if (@move_uploaded_file($myfile['tmp_name'], $toFile)) {
        $result = 0;
    } else {
        $result = -1;
    }
} else {
    $result = 1;
}
if ($result != 0) {
    $toFile = "";
}
?>
<script type="text/javascript">
    window.top.window.stopUpload(<?php echo "\"$toFile\""; ?>);
</script>