<?php
require 'config.php';


if (isset($_POST['start']) && $_POST['start']!='') {
    $startValue = $_POST['start'];

    $checkExistenceQuery = "SELECT COUNT(*) AS count FROM `backup_table` WHERE `asset_tag` = '$startValue'";
    $existenceResult = mysqli_query($conn, $checkExistenceQuery);

    if ($existenceResult) {
        $row = mysqli_fetch_assoc($existenceResult);
        $count = $row['count'];
      
        if ($count > 0) {
            // $startValue exists, proceed with the update
            $updateQuery = "UPDATE `asset_data` SET `obt_tag` = '$startValue', `status` = 'Audited', `AuditOn` = NOW() WHERE `asset_tag` = '$startValue'";
            $updateResult = mysqli_query($conn, $updateQuery);
            $update = "UPDATE `backup_table` SET `obt_tag` = '$startValue', `status` = 'Audited', `AuditOn` = NOW() WHERE `asset_tag` = '$startValue'";
            $updateResult = mysqli_query($conn, $update);
            $update = "UPDATE `allsheets` SET `obt_tag` = '$startValue', `status` = 'Audited', `AuditOn` = NOW() WHERE `status` IS NULL OR TRIM(`status`) = ''";
            $updateResult = mysqli_query($conn, $update);

                echo '1';

        } else {
            // $startValue does not exist in the table
               if($startValue!='')
            {

                $insertQuery = "INSERT INTO `not_found_asset` (`asset_tag`, `ScannedOn`) VALUES ('$startValue', NOW())";
                $insertResult = mysqli_query($conn, $insertQuery);
            
            }   
          
            echo '2';
        }
    } else {
        // Error in the existence check query
        // echo '0';
    }
}
?>
