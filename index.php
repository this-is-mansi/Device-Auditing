<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-size:12px;
            font-family: Arial, sans-serif;
            background-image:radial-gradient(ellipse at top left,rgba(1, 1, 20,0.6), rgba(1, 1, 20, 0.9),rgba(1, 1, 20,0.6)),url('https://metrorailtoday.com/assets/uploads/gallary/20220221140010.jpg');
         background-size:cover;background-repeat:no-repeat;
         width:100vw;
         height:100vh;
         overflow:hidden;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
        }

        label {
            color:white;
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            background-color: rgba(255,255,255,0.07);
        border-radius: 3px; color:white;
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
           border:1px solid white;
        }

        button {
            background-color: white;
            color: black;
    
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body style="" >
   

<?php


if(isset($_POST["submit"])){
  

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
  
    $query = "INSERT INTO login_table (name, mobile, designation, department) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }
    
    $stmt->bind_param("ssss", $name, $mobile, $designation, $department);
    
    if ($stmt->execute()) {
        echo '<script>
            alert("Logged in successfully");
            var username = encodeURIComponent("' . $name . '"); // Encode the username
            window.location.href = "index1.php?username=" + username;
          
            </script>';
    } else {
        echo '<script>
            alert("Error in login, try again");
            </script>';
    }
    
    $stmt->close();  // Close the statement
   
    
}
?>
<br>
<br><br>
<br>
<br>
<center>
<h1 style="color:white;"> Asset Auditing </h1> </center>
    <form 
    style=" border-radius: 10px;
  border: 1px solid rgba(255, 255, 255, 0.5);
  padding:40px; 
  box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
  backdrop-filter: blur(9px);
  -webkit-backdrop-filter: blur(9px);   background-color: rgba(255,255,255,0.13);"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="mobile">Mobile No</label>
        <input type="number" id="mobile" name="mobile"  required>

        <label for="designation">Designation</label>
        <input type="text" id="designation" name="designation" required>

        <label for="department">Department</label>
        <input type="text" id="department" name="department" required>

  <center>      <button  type="submit" name="submit">Sign in</button></center>
    </form>
</body>
</html>
