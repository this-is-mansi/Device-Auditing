<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// Array with names

$a[] = range(32000001, 32000999);
$a[] = "32000999";

// get the q parameter from URL
$q = $_REQUEST["q"];

//$hint = "";
$con = mysqli_connect('localhost','root','','qrs');
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// lookup all hints from array if $q is different from ""
if ($q !="") {
  /*$q = strtolower($q);
  $len=strlen($q);
  foreach($a as $asset_tag) {
    if (stristr($q, substr($asset_tag, 0, $len))) {
      if ($hint === "") {
        $hint = $asset_tag;
      } else {
        $hint .= ", $asset_tag";
      }
    }
  }*/
$result=mysqli_query($con,"SELECT * FROM logs WHERE asset_tag='$q'");
$rowcount=mysqli_num_rows($result);
if($rowcount==0){
$ret=mysqli_query($con,"INSERT INTO `logs`(asset_tag,Time) VALUES ('$q',NOW())");
if($ret)
{
echo '<div class="alert alert-success"><strong>Asset Tag Found</strong> </div>'+date('l jS \of F Y h:i:s A');
?>
<?php }
else
{
  echo '<div class="alert alert-fail"><strong> Asset Not Found</strong></div>';
}
}
echo '<div class="alert alert-fail-success"><strong> Asset Found</strong></div>';
echo date('l jS \of F Y h:i:s A');

  

}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>