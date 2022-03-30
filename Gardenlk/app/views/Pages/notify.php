
<?php
/*  require_once '../app/models/Page.php'; 
 */ 
$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = '4KAWC5Ycbt04TvOGWKxpD84a9tJN0Vffw4Z8ym7vNCLe'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
 
/* $db = new Page();
 
$data = $db->paymentProceed($merchant_id,$order_id,$payhere_amount,$payhere_currency,$status_code,$md5sig,$merchant_secret,$local_md5sig);

 */

/* if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
 */
$link = mysqli_connect("localhost","root","","garden_lk");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
/* // Escape user inputs for security
$order_id = mysqli_real_escape_string($link, $_REQUEST['order_id']);
$payhere_currency = mysqli_real_escape_string($link, $_REQUEST['payhere_currency']);
$payhere_amount = mysqli_real_escape_string($link, $_REQUEST['payhere_amount']); */
 

// Attempt insert query execution
$sql = "INSERT INTO checkorders (order_id,name,amount,status) VALUES ('$order_id', '$payhere_currency', '$payhere_amount','$status_code')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


/* }
 */
?>
    
<!--     $mysqli = new mysqli("localhost","root","","garden_lk");
    
    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    
    // Perform query
    if ($result = $mysqli -> query("INSERT INTO checkorders"."(order_id,name,amount) "."VALUES "."('$order_id','$payhere_currency','$payhere_amount')")) {
      echo "Returned rows are: " . $result -> num_rows;
      // Free result set
      $result -> free_result();
    }
    
    $mysqli -> close();
    
   


?> -->