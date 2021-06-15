<?php
include('include/config.php');
  ob_start();
  include('includes/config.php');
  require_once 'dompdf/autoload.inc.php';
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

 session_start();
  // if(isset($_POST['create']))
  // {
    $date = date('m/d/Y');
    $output ='<h3 align="center">Product List</h3><br />';
    $output ='<p align="left">'.$roC['sd_name'] .'</p><p align="left">'.$date.'</p>
    <h3 align="center"><u>4 U GROCERY SHOPPING </u></h3><h4>Product List</h4><br />';
    

    //output -> html design

    $output .="
      <table fontsize= '10' width ='100%' border='1' cellpadding='5' cellspacing='0'>
      <tbody>
      <tr>
        <th width='10px'>No</th>
        <th width='80px'>Product Name</th>
        <th width='100px'>Product Price</th>
        <th width='100px'>Product Availability</th>
        <th width='80px'>Shipping Charge</th>
        
        <th width='70px'>Quantinty</th>
          
      </tr>
      ";

    $query="select * from products";
    $result =mysqli_query($con,$query);
    $counter = 0;
    while($row=mysqli_fetch_array($result))  
    {	
      
        

        $output .='

        <tr>
          <td>'.++$counter .'</td>
          <td>'.$row['productName'] .'</td>
          <td>'.$row['productPrice'] .'</td>
          <td>'.$row['productAvailability'] .'</td>
          <td>'.$row['shippingCharge'] .'</td>
          <td>'.$row['quantity'] .'</td>
        </tr>';
    }
    $output .="</table> <br />";
    echo $output;
    
      $file_name='product List.pdf';
      $dompdf->loadHtml($output); //load the html;
      $dompdf->render(); //html to pdf
      ob_end_clean();
      $dompdf->stream($file_name, array("Attachment" => false)); //Attachment false -> present report in a new tab
      exit(0);
  // }
?>
