<?php
$con=mysqli_connect("","root","","map");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM markers");

echo "<table border='1'>
<tr>
<th>name</th>
<th>address</th>
<th>Favourite</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td><button type='submit' name='submit' value='submit'>Click Me!</button></td>";
echo "</tr>";
}
echo "</table>";


include('db-const.php');
if(isset($_POST['submit']))
{
     $SQL = "INSERT INTO joinfavourites (id, userid, markerid, name) VALUES ('2', '3', '4', 'kieran')";
     $result = mysql_query($SQL);
}

mysqli_close($con);

?>