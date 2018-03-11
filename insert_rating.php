<?php

//fetch.php
//http://www.webslesson.info/2017/11/dynamic-star-rating-system-by-using-php-script-with-ajax-jquery.html
//https://www.youtube.com/watch?v=Xhc_hFpQ58o&t=157s

$connect = new PDO('mysql:host=localhost;dbname=map', 'root', '');

if(isset($_POST["index"], $_POST["business_id"]))
{
 $query = "
 INSERT INTO rating(business_id, rating) 
 VALUES (:business_id, :rating)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':business_id'  => $_POST["business_id"],
   ':rating'   => $_POST["index"]
  )
 );
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'done';
 }
}


?>
