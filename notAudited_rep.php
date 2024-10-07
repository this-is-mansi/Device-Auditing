<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Mahametro Not audited report</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="your-integrity-value-here" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color:#f5f5fa">
    <br>
   
    <div style="display:flex;flex-direction:row;align-items:center; justify-content: center;">
        <img src="logo.png" style="max-width:50px">
        <h3 style="color:#130f40;">
            <u>MAHARASHTRA METRO RAIL CORPORATION LTD </u>
        </h3>
    </div>


    <center>
   
        <h4 style="color:#130f40;">
            Not found Assets Report
        </h4>
    </center>
    <div style="display:flex;flex-direction:column; margin-top: 0px;">
        <hr>
        <center>
            <div>
                <br>
                This certification affirms that the listed assets have been determined to be absent and untraceable during the audit process.
            </div>
            <br>

            <table id="tbl" style="background: #f7fbff;border:none;max-width:90%; margin-left:1%; font-size:15px;">
                <tr style="background-color:lightgrey; color:black">
                    <td style="border:1px solid grey; padding:10px">#</td>
                    <td style="border:1px solid grey; padding:10px">AssetHead</td>
                    <td style="border:1px solid grey; padding:10px">Asset Code</td>
                    <td style="border:1px solid grey; padding:10px">Description</td>
                    <td style="border:1px solid grey; padding:10px">Booked Location</td>
                    <td style="border:1px solid grey; padding:10px">Quantity</td>
                </tr>

                <?php
                $i = 1;
                $resultValue = "";
                $rows = mysqli_query($conn, "SELECT * FROM backup_table WHERE status IS NULL OR TRIM(status) = ''; ");
                foreach ($rows as $row) :
                    $assetTag = $row["asset_tag"];
                    $assetTags[] = $assetTag;
                ?>
                    <tr id="<?php echo $row["asset_tag"]; ?>">
                        <td style="border:1px solid lightgrey; padding:10px;"> <?php echo $i++; ?> </td>
                        <td style="border:1px solid lightgrey; padding:10px;"> <?php echo $row["asset_head"]; ?> </td>
                        <td style="border:1px solid lightgrey; padding:10px;"> <?php echo $row["asset_tag"]; ?> </td>
                        <td style="border:1px solid lightgrey; padding:10px;"> <?php echo $row["description"]; ?> </td>
                        <td style="border:1px solid lightgrey; padding:10px;"> <?php echo $row["Location"]; ?> </td>
                        <td style="border:1px solid lightgrey; padding:10px;"> <?php echo $row["quantity"]; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </center>

        <div style="display:flex;flex-direction:row; margin-top:10%; margin-left:25%">
            <div>
                IT Auditor
                <br> Sign details
                <p style="text-align: center; margin-top: 10px;">
            <?php echo date("F j, Y"); ?>
			<br> 
			(<?php echo date("H:i:s"); ?> )
				
        </p>
        <p id="location">    </p>
            </div>
            <div style=" margin-left:45%">
                Auditor's
                <br> Sign details
                <p style="text-align: center; margin-top: 10px;">
            <?php echo date("F j, Y"); ?>
			<br> 
			(<?php echo date("H:i:s"); ?> )
				
        </p>
        <p id="location2">    </p>
            </div>
        </div>
    </div>

    <!-- <button id="downloadButton">Download as PDF</button> -->

 <!-- Add these scripts at the bottom of your HTML, just before the closing </body> tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    

    function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

var selectedValue = getUrlParameter('selectedValue');
document.getElementById('location').innerHTML = selectedValue;
document.getElementById('location2').innerHTML = selectedValue;

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('downloadButton').addEventListener('click', function () {
            // Create a new jsPDF instance
            const pdf = new jsPDF();

            // Add content to the PDF using jsPDF methods
            pdf.text("Not Found Report", 105, 10, { align: 'center' });

            // Additional content
            pdf.text("Additional content goes here.", 20, 20);

            // Table content
            pdf.autoTable({
                html: '#tbl',
                startY: 30,
            });

            // Save the PDF
            pdf.save('report.pdf');
        });

        // Enable the download button
        document.getElementById('downloadButton').disabled = false;
    });
</script>



</body>

</html>
