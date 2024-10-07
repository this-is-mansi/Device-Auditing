<?php
$i = 1;
$resultValue = "";
if (isset($_POST["clear"])) {
    // Clear the table by truncating it
    mysqli_query($conn, "TRUNCATE TABLE asset_data");
    echo 'Table cleared successfully!';
}
?>