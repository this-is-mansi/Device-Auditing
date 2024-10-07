<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Asset Auditing</title>
		  <!-- Bootstrap CSS -->
		  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		  <style>

.content {
  display: flex;
  flex-direction: column;
}
.btn {
  padding: 15px;
  font-weight: 700;
  font-size: 2rem;
  text-decoration: none;
  text-align: center;
  transition: all .5s ease; 
}

.btn--doar {
	
  color: #fff;
  padding-right: 0;
  background-color: #130f40;
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 100% 100%, 0 100%);  

}

.btn--doar:hover { 
	background-color: #130f40;
	color:white;
 
}

.btn--doar:after {
  content: "";
  margin: -5px 15px;
  color: #ffff;
  font-family: FontAwesome;
  display: inline-block;
  position: relative;
  /* right: -55px; */
  right: 0px;
  transition: all 0.2s ease;
}

.btn--doar:hover:after {
  

}


@keyframes circle-anim{
  0% {
    
  }
  
  90%{
    padding: 0.35em;
    margin: -0.35em; 
  }
  
  100%{
    padding: 0.25em;
    margin: -0.25em; 
  }
}
.upload-button {
          
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            border: 1px solid #130f40;
            color: #130f40;
            border-radius: 5px;
            text-decoration: none;
        }
		
		
    /* Style for the input window */
    #inputWindow {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }

    /* Style for the overlay background when input window is open */
    #wrapper {
		position: fixed;
      display: none;
      min-width: 100%;
      height: 100%;
      background-color: #f5f5fa;
     
    }

    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="your-integrity-value-here" crossorigin="anonymous" referrerpolicy="no-referrer" />

	</head>
	<body style="background-color:#f5f5fa">



	<?php
// Assuming this block is before your form
$rows = mysqli_query($conn, "SELECT COUNT(*) as count FROM asset_data");
$resultCount = mysqli_fetch_assoc($rows);
$tableEmpty = $resultCount['count'] == 0;

$rows1 = mysqli_query($conn, "SELECT COUNT(*) as count FROM backup_table");
$resultCount1 = mysqli_fetch_assoc($rows1);
$tableEmpty1 = $resultCount1['count'] == 0;
?>

<!-- Your HTML Form -->
<?php if ($tableEmpty): ?>

		<form style=" padding: 10px;
            font-size: 16px;
			
            cursor: pointer;
            color: #130f40;
            text-decoration: none;" class="" id="fileimp" action="" method="post" enctype="multipart/form-data">
						<?php
	
			$username = isset($_GET['username']) ? urldecode($_GET['username']) : '';
			?>
		<div> Welcome, <?php echo $username; ?></div>

		<input type="file" name="excel" id="excelInput" required value="">
		<button type="submit" name="import" id="importButton" class="upload-button" >
			Import<i class="fas fa-file-import"></i>
		</button>
			</form>
			<form method="post" enctype="multipart/form-data">
		<button type="submit" name="back" id="back" class="upload-button" style="margin-left:2%" >
			back
		</button>
			</form>
			<?php
			if(isset($_POST["back"])){
				$assetDataQuery = "INSERT INTO asset_data (asset_head, asset_tag, description, obt_tag, status, AuditOn, Location, quantity)
				SELECT asset_head, asset_tag, description, obt_tag, status, AuditOn, Location, quantity
				FROM backup_table;";
				$result = mysqli_query($conn, $assetDataQuery);
				echo '<script>'
				   . 'document.location.href = "";'
				   . '</script>';

			}
				?>
		<?php else: ?>
			<?php if (!($tableEmpty1)): ?>
			<form class="loc" style="margin-top:1%" action="" method="post" enctype="multipart/form-data">
			<?php
			$username = isset($_GET['username']) ? urldecode($_GET['username']) : '';
			?>
		<div> Welcome, <?php echo $username; ?></div>
		<select style="margin-top:1%;padding:5px; border:1px solid #130f40;color:#130f40 ;border-radius:5px; background-color:#f5f5fa" name="location" onchange="this.form.submit()" id="location">
            <option value=" ">Choose your location</option>
			<option value="All Locations">All locations</option>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM location_tbl");

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $locationName = $row['location'];
                    echo "<option value='$locationName'>$locationName</option>";
                }
            } else {
                echo "Error fetching locations: " . mysqli_error($conn);
            }
            ?>
        </select>
			<!-- <button type="submit" name="proceed" id="proceed" class="upload-button">>
		Proceed</button> -->
	</form>

			

	<div style="display:flex;flex-direction:row; margin-top:40px;">
		<hr>
		<table 
		id="tbl"
		style="background: #f7fbff;border:none;max-width:80%; margin-left:2%; font-size:15px; 
		box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
		">
			<tr style="background-color:#130f40; color:white">
				<td style="border-bottom:1px solid white; padding:10px">#</td>
				<td style="border-bottom:1px solid white; padding:10px">AssetHead</td>
				<td style="border-bottom:1px solid white; padding:10px">Asset Code</td>
				<td style="border-bottom:1px solid white; padding:10px">Description</td>
				<td  style="border-bottom:1px solid white; padding:10px">Booked Location</td>
				<td  style="border-bottom:1px solid white; padding:10px">Quantity</td>
				<td style="border-bottom:1px solid white; padding:10px">Scanned Asset Tag</td>
				<td style="border-bottom:1px solid white; padding:10px">Status</td>
				<td style="border-bottom:1px solid white; padding:10px">AuditedOn</td>
				
			</tr>

			<?php
			$i = 1;
			$resultValue="";
			$rows = mysqli_query($conn, "SELECT * FROM asset_data");
			foreach($rows as $row) :
				$assetTag = $row["asset_tag"];
				$assetTags[] = $assetTag; 
			?>
   
			<tr id="<?php echo $row["asset_tag"]; ?>">
				<td style="border:1px solid lightgrey; padding:10px; border-right:none; border-left:none"> <?php echo $i++; ?> </td>
				<td style="border:1px solid lightgrey; padding:10px ; border-right:none;"> <?php echo $row["asset_head"]; ?> </td>
				<td style="border:1px solid lightgrey; padding:10px ; border-right:none;"> <?php echo $row["asset_tag"]; ?> </td>
				<td style="border:1px solid lightgrey; padding:10px ; border-right:none;"> <?php echo $row["description"]; ?> </td>
				<td style="border:1px solid lightgrey; padding:5px ; border-right:none;"> <?php echo $row["Location"]; ?> </td>
				<td style="border:1px solid lightgrey; padding:5px ; border-right:none;"> <?php echo $row["quantity"]; ?> </td>
				<td style="border:1px solid lightgrey; padding:5px ; border-right:none;">
    <?php
      if ($row["obt_tag"] === null) {
        echo '<button style="border:none;background-color:transparent;color:grey" onclick="openInputWindow()">Tap to validate manually</button>';
      }
      echo $row["obt_tag"];
    ?>
  </td>
				<td style="border:1px solid lightgrey; padding:5px  ; border-right:none;"> <?php echo $row["status"]; ?> </td>
			    <td  style="border:1px solid lightgrey; padding:5px; border-right:none"> <?php echo $row["AuditOn"]; ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
		<div id="wrapper">
		<div id="inputWindow" style=" padding:30px;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
		
		">
   <center> <h2>Asset code</h2> </center>
   <br>
    <input type="text" id="inputField" placeholder="Enter Asset Code">
    <button style="background-color:#130f40; padding:8px;color:white;border-radius:10px" onclick="submitInput()">Submit</button>
  </div>
  </div>
   <div style=" display:flex; flex-direction:column; min-width:20%; position:fixed; right:10px; top:0%; min-height:300px">
   
   <section class="content">
        <div>
       <button style="background-color:transparent;border:none;" onclick="scanButtonClick(1)" type="scan" name="scan" value="scan">   <a class="btn btn--doar" style=""
	   >Scan qr</a> </button>
        </div>
       
      </section>

			</div>
			</div>
			<div style="display:flex;flex-direction:row;position:relative;margin-top:10%; ">
	
	<button id="extraAssetsButton" style="background-color:transparent;color:#130f40;font-size:14px;border:none;margin:2px;padding:8px; border-radius:5px">
    Extra Assets
</button>

 <button id="auditAssetsButton" style=" background-color:transparent;color:#130f40;font-size:14px;border:none;margin:2px; padding:8px; border-radius:5px">	
    Audited report	</button>

	<button id="notAssetsButton" style=" background-color:transparent;color:#130f40;font-size:14px;border:none;margin:2px; padding:8px; border-radius:5px">	
    Not found report	</button>

	<form method="post">
	<button name="cleartbl" style=" background-color:transparent;color:#130f40;font-size:14px;border:none;margin:2px; padding:8px; border-radius:5px" >	
    Upload new file	</button>
	</form>
	
	</div>

	<?php endif; ?>

	<?php
		// $assetTagArray=[];
		if(isset($_POST["cleartbl"])){

			$query = "truncate table asset_data";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			echo '<script>'
				   . 'document.location.href = "";'
				   . '</script>';
		}
			?>

		<?php
		// $assetTagArray=[];
		if(isset($_POST["import"])){

			// temporary table to hold data as per location selected
			$query = "truncate table asset_data";
			$stmt = $conn->prepare($query);
			$stmt->execute();

			$query = "truncate table backup_table";
			$stmt = $conn->prepare($query);
			$stmt->execute();


			// fetch location from data
			$query = "truncate table location_tbl";
			$stmt = $conn->prepare($query);
			$stmt->execute();
							
			$query = "truncate table not_found_asset";
			$stmt = $conn->prepare($query);
			$stmt->execute();
							
			
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
 		     $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
           
			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
						// Flag to skip the first row while including the excel sheet 
			$skipFirstRow = true;

			foreach ($reader as $key => $row) {
				// Skip the first row
				if ($skipFirstRow) {
					$skipFirstRow = false;
					continue;
				}

				$asset_head = $row[0];
				$asset_tag = $row[1];
				$description = $row[2];
				$loc = $row[3];
				$qua = $row[4];

				$result = mysqli_query($conn, "INSERT INTO asset_data VALUES('', '$asset_head', '$asset_tag', '$description', null, null, null, '$loc', '$qua')");
				$result = mysqli_query($conn, "INSERT INTO backup_table VALUES('', '$asset_head', '$asset_tag', '$description', null, null, null, '$loc', '$qua')");
				$result2 = mysqli_query($conn, "INSERT INTO allsheets VALUES('', '$asset_head', '$asset_tag', '$description', null, null, null, '$loc', '$qua')");
				$result1 = mysqli_query($conn, "INSERT INTO location_tbl VALUES('', '$loc')");
			}
			if ($result) {
				// Display JavaScript alert for successful insertion
				echo '<script>alert("File imported successfully!");'
				   . 'document.location.href = "";'
				   . '</script>';
			}
			 else {
				// Display JavaScript alert for insertion failure
				echo '<script>alert("Error in importing file , please try again!");</script>';
			}
			
			foreach($rows as $row) :
				// ... previous code ...
			 
				// Check if the URL parameter 'row' matches the current row index
				if (isset($_GET['row']) && $_GET['row'] == $i) {
				   echo '<td>' . htmlspecialchars($_GET['start']) . '</td>';
				} else {
				   echo '<td></td>';
				}
			 endforeach;
				
		}
		?>
<?php
		
		if(isset($_POST["location"])){
			$selectedLocation =$_POST["location"] ;
			$query = "truncate table asset_data";
			$stmt = $conn->prepare($query);
			$stmt->execute();

			if($_POST["location"]=='All Locations'){
				$assetDataQuery = "INSERT INTO asset_data (asset_head, asset_tag, description, obt_tag, status, AuditOn, Location, quantity)
				SELECT asset_head, asset_tag, description, obt_tag, status, AuditOn, Location, quantity
				FROM backup_table;";
				$result = mysqli_query($conn, $assetDataQuery);
			}
				
			else{
				$assetDataQuery = "INSERT INTO asset_data (asset_head, asset_tag, description, obt_tag, status, AuditOn, Location, quantity)
				SELECT asset_head, asset_tag, description, obt_tag, status, AuditOn, Location, quantity
				FROM backup_table
				WHERE Location = '$selectedLocation';";
				$result = mysqli_query($conn, $assetDataQuery);
			}
				
			
			
			if ($result) {
				// Display JavaScript alert for successful insertion
				echo '<script>
					var selectedLocation = "' . $selectedLocation . '"; // Use single quotes to wrap the PHP variable
					var newUrl = window.location.origin + window.location.pathname + "?selectedValue=" + encodeURIComponent(selectedLocation);
					window.location.href = newUrl;
				  </script>';
			}
			 else {
				// Display JavaScript alert for insertion failure
				echo '<script>alert("Error in importing file , please try again!");</script>';
			}
			
			foreach($rows as $row) :
				if (isset($_GET['row']) && $_GET['row'] == $i) {
				   echo '<td>' . htmlspecialchars($_GET['start']) . '</td>';
				} else {
				   echo '<td></td>';
				}
			 
			 endforeach;
			}		
		
		?>
		
    </script>
	<audio id="myAudio1">
    <source src="found.wav" type="audio/ogg">
  </audio>
  <audio id="myAudio2">
    <source src="notfound.wav" type="audio/ogg">
  </audio>
  <script>
    // Your location variable
  // Replace with your actual variable
  
    // Function to handle button click
    function GoToExtraPhpFile() {
		var yourLocationVariable = getUrlParameter('selectedValue'); 
        // Redirect to extra.php with the location parameter in a new tab or window
        var newUrl = "extra.php?selectedValue=" + encodeURIComponent(yourLocationVariable);
        window.open(newUrl, '_blank');
    }
	function GoToAuditPhpFile() {
		var yourLocationVariable = getUrlParameter('selectedValue'); 
        // Redirect to extra.php with the location parameter in a new tab or window
        var newUrl = "audited_report.php?selectedValue=" + encodeURIComponent(yourLocationVariable);
        window.open(newUrl, '_blank');
    }
	function GoToNotAuditPhpFile() {
		var yourLocationVariable = getUrlParameter('selectedValue'); 
        // Redirect to extra.php with the location parameter in a new tab or window
        var newUrl = "notAudited_rep.php?selectedValue=" + encodeURIComponent(yourLocationVariable);
        window.open(newUrl, '_blank');
    }


    // Attach the click event to the button
    document.getElementById('extraAssetsButton').addEventListener('click', GoToExtraPhpFile);
	document.getElementById('auditAssetsButton').addEventListener('click', GoToAuditPhpFile);
	document.getElementById('notAssetsButton').addEventListener('click', GoToNotAuditPhpFile);
	console.log(newUrl)
</script>


		  <script>
	
		     function clearTable() {
            // Make an AJAX request to the PHP file for clearing the table
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'clear_table.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    // Reload the page after clearing the table
                    location.reload();	
                }
            };
            xhr.send();
        }
			   function scanButtonClick(i) {
            // Construct the URL with the i value
            var redirectUrl = "http://localhost/audit/qrindex.php?i=";

            // Redirect to the new URL
            window.location.href = redirectUrl;
        }
		
        // Function to get URL parameters by name
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        var startValue = getUrlParameter('start');
		idx = getUrlParameter('i');
        if(idx==23)
		{
			alert("Asset id "+startValue+" not found")
		}
		document.getElementById(startValue).style.backgroundColor = '#23DC3D';
    </script>
	 <script>
    // Function to open the input window
    function openInputWindow() {
      document.getElementById('inputWindow').style.display = 'block';
      document.getElementById('wrapper').style.display = 'block';
    }

   // Function to submit input and close the window
   var x = document.getElementById("myAudio1");
    var x2 = document.getElementById("myAudio2");
function submitInput() {
    var inputValue = document.getElementById('inputField').value;
    var xhttp = new XMLHttpRequest();
    var url = "another.php";
    var params = "start=" + encodeURIComponent(inputValue);
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                if (this.responseText === '1') {
					if (typeof x !== 'undefined' && x instanceof HTMLAudioElement) {
                        x.play();
                    }
                    var dynamicUrl = 'http://localhost/audit/index1.php?start=' + inputValue + '&i=1';
                    window.location.href = dynamicUrl;
                } else if (this.responseText === '2') {
					if (typeof x2 !== 'undefined' && x2 instanceof HTMLAudioElement) {
                        x2.play();
                    }
                    var dynamicUrl = 'http://localhost/audit/index1.php?start=' + inputValue + '&i=23';
                    window.location.href = dynamicUrl;
                }
            } else {
                console.error("Error: " + this.statusText);
            }

            closeInputWindow();
        }
    };

    xhttp.send(params);
}


    // Function to close the input window
    function closeInputWindow() {
      document.getElementById('inputWindow').style.display = 'none';
      document.getElementById('wrapper').style.display = 'none';
    }
  </script>
	</body>
</html>
