<?php 
include "db.php";

if (!isset($_GET["id"])) die("No ID Specified");

$id = intval($_GET["id"]);

$sql = "SELECT picture FROM products WHERE product_id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) die("No image found.");

$row = $result->fetch_assoc();
$finfo = finfo_open();
$type = finfo_buffer($finfo, $row["picture"], FILEINFO_MIME_TYPE);
finfo_close($finfo);

header("Content-Type: $type");
echo $row["picture"];
