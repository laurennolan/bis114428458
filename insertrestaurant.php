<?php
//Code used: https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "map");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$lat = mysqli_real_escape_string($link, $_REQUEST['lat']);
$lng = mysqli_real_escape_string($link, $_REQUEST['lng']);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);
$url = mysqli_real_escape_string($link, $_REQUEST['url']);
 
// attempt insert query execution
$sql = "INSERT INTO markers (name, address, lat, lng, type, url) VALUES ('$name', '$address','$lat','$lng','$type','$url')";
if(mysqli_query($link, $sql)){
    echo "Restaurant added successfully. Thank you for your cooperation!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>