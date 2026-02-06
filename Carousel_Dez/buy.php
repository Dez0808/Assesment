<?php
include "db.php";

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Fetch the first (and in this case, only) row
    $row = $result->fetch_assoc();
    echo $row["product_id"]; // Get the value from the 'email' column
} else {
    echo "0 results found";
}
