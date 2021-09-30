<?php
require 'top.php';
$email ="";
if (!isset($_SESSION['email'])){
    header('location:cart.php');
}
else{
    $email = $_SESSION['email'];
}
if(isset($_GET['oid']) && isset($_GET['amt']) && isset($_GET['refId'])){
    function get_xml_node_value($node, $xml){
        if($xml == false){
            return false;
        }
        $found = preg_match('#<' .$node.'(?:\s+[^>]+)?>(.*?)' . '</'. $node. '>#s', $xml, $matches);
        if($found != false){
            return $matches[1];
        }
        return false;
    }
    $oid = $_GET['oid'];
    $query = "select * from orders where uniqueId = '$oid'";
    $IsSelect = mysqli_query($con, $query);
    
    if($IsSelect){
       if(mysqli_num_rows($IsSelect) == 1){
           
            $result = mysqli_fetch_assoc($IsSelect);
            $url = "https://uat.esewa.com.np/epay/transrec";
            $data =[
                'amt'=> $result['total'],
                'rid'=> $_GET['refId'],
                'pid'=> $result['uniqueId'],
                'scd'=> 'EPAYTEST'
            ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
               
               $response_code =  get_xml_node_value('response_code', $response);
               var_dump($response_code);
               if(trim($response_code) == 'Success'){
                   echo "<h1> payment successful </h1>";
                   $updateQuery = " update orders set status = 1 where uniqueId = '$oid'; ";
                   mysqli_query($con, $updateQuery);
                   $cartQuery = "update cart, orders set cart.status = 0 where orders.uniqueId = '$oid' and cart.uid = orders.uid and cart.status = 1;";
                   mysqli_query($con, $cartQuery);
                   mysqli_query($con, "update delivery set uniqueId='$oid' where ispaid=0 "); // not use for realworld purpose
                   mysqli_query($con, "update delivery set ispaid=1 where  ispaid=0 "); // only use for college project

                     //mail function
                   $subject = "Payment successful";
                   $body = " Thank You for purchasing product from koshisale, Your order has been conform we will delever your product with in 2 to 3 days ";
           
                   $sender_email = "From: udemyc011@gmail.com";
           
                   if (mail($email, $subject, $body, $sender_email)) {
                   $_SESSION['emailSent'] = "Please check your email. product have been Order with this $email email ID: ";
                    
                   } else {
                     echo "sending failed ";
                   }
                   header('location:thank.php');
                  
               }
               else{
                echo "<h1> failed to pay </h1>";
               }
                curl_close($curl);
                
         }
    }
    else{
        echo "query not selected";
    }
}
else{
    header('location:http://localhost/php/ecom/pFail.php');
}

?>
<h1>Payment success</h1>
<?php
require 'footer.php';
?>