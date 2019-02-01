<?php
 $find = $_POST['find'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2> 
    <?php
    echo '<p>Order processed.</p>';
	switch($find) {
  case "a" :
    echo "<p>Regular customer.</p>";
    break;
  case "b" :
    echo "<p>Customer referred by TV advert.</p>";
    break;
  case "c" :
    echo "<p>Customer referred by phone directory.</p>";
    break;
  case "d" :
    echo "<p>Customer referred by word of mouth.</p>";
    break;
  default :
    echo "<p>We do not know how this customer found us.</p>";
    break;
}
date_default_timezone_set('America/Phoenix');
echo "<p>Order processed at ";
    echo date('m/d/Y h:i:s a');
    echo "</p>";
$a = 20;
$b = 12;
$result = $a%$b;
echo "<p>result is: </p>";
echo $result;
    ?>    
  </body>
</html>

