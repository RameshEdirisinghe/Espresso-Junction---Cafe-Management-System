  <?php
  require_once("../../include/initialize.php");
   //admin_confirm_logged_in();
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/login.php");
     } 

      $orderno = isset($_GET['orderno']) ? $_GET['orderno'] : '';
      // $printeddate =  date('M-d-Y');

    $query = "SELECT * FROM `tblpayments` WHERE  `ORDERNO` ='".$orderno."'";
    $mydb->setQuery($query);
    $cur = $mydb->loadSingleResult(); 

 
        $customer = $cur->CUSTOMER;
        //$orderno = $cur->ORDERNO;
        $tableno  = $cur->TABLENO;
        $username = $cur->USERSNAME;
        $remarks =  $cur->REMARK;
    
  ?>  
  <style type="text/css">
      @page { size: auto;  margin: 1mm; }
  </style>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>&nbsp;</title>
 

 <!-- Bootstrap Core CSS -->
    <link href="<?php echo web_root; ?>admin/css/bootstrap.min.css" rel="stylesheet">



    <link href="<?php echo web_root; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">


    <!-- Custom Fonts -->
    <link href="<?php echo web_root; ?>admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!--<link rel="icon" href="<?php echo web_root; ?>favicon-1.ico" type="image/x-icon"> -->

</head>
<?php

date_default_timezone_set('Asia/Manila');

?>

<body onload="window.print();" style="width: 100%;padding: 0px;margin: 0px;">
 <style type="text/css">
.tables {
    width: 100%; 
    font-size: 8px;
    padding-bottom: 5px;
}
.tables > tr > td {
    margin-bottom: 25px;

}
 .tables > tr > td {
  border: 0px ;
  padding: 2px; 
}
 </style>
 <center>
<div id="wrapper">
    <div class="container">
        <div style="text-align: center;font-size: 10px;"><?php
                $query = "SELECT * FROM `tbltitle` WHERE TItleID=1";
                $res = mysql_query($query) or die(mysql_error());
                $viewTitle = mysql_fetch_assoc($res);
                echo $viewTitle['Title'];
            ?></title></div>
        <div style="text-align: center;font-size: 8px;">Located at Center Plaza, Rizal Street</div>
        <div style="text-align: center;font-size: 8px;">Kabankalan City, Negros Occidental</div>
        <table>
            <tr>
                <td colspan="3" style="padding-top: 5px;padding-bottom: 5px; font-size: 8px;">TIN No.: 000-123-456-789</td>
            </tr>
        </table>
<!--         <div style="text-align: center;font-size: 8px; margin-bottom: 10px;"><?php echo $remarks; ?></div> -->  
    <table  class="tables">
        <tr style="border-bottom: .5px solid; font-size: 8px;margin-bottom: 5px;">
            <td colspan="3" align="center" style="padding-bottom: 3px;">Table No: <?php echo $tableno; ?> | Order No.: <?php echo $orderno?></td>
        </tr>
        <tr style="margin-bottom:5px;margin-top:5px;">
        <?php 
                        $total = 0;
                        $tableno = 0;
                        $vat=0;
                        $vatable = 0;
                        $regbill = 0;
                        $waiter="";
                        $senior=0;
                        $totdiscount=0;
                            if (isset($_POST['orderno'])) {
                                # code...

                                $orderno = $_POST['orderno'];
                                $query = "SELECT * FROM `tblorders` o , `tblusers` u
                                 WHERE  o.`USERID` = u.`USERID` AND `STATUS`='Paid' AND `ORDERNO` ='".$orderno."'";
                                $mydb->setQuery($query);
                                $cur = $mydb->loadResultList();

                                foreach ($cur as $result) { 
                                echo '<tr>';
                                    echo '<td colspan="3" style="font-size:9px; padding-top:5px;">'.$result->DESCRIPTION.'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td style="padding-bottom:5px;">Qty: '.$result->QUANTITY.'</td>';
                                    //echo '<td style="font-size:10px;"></td>';
                                    echo '<td style="padding-bottom:5px;" colspan="2" align="right">Amount: '.number_format($result->SUBTOTAL,2).'</td>';
                                    //echo '<td style="font-size:10px;" align="right"></td>';
                                    echo '</td>';
                                echo '</tr>';

                                $total += $result->SUBTOTAL; 
                                $tableno = $result->TABLENO;

                               

                                    $waiter = $result->FULLNAME;

                                } 

                                $vatable = $total / 1.12;

                                 $vat = $total - $vatable;

                                $regbill = $vatable + $vat;




                            }
                            
                        ?>  
            </tr>
  <tr>
            <td  colspan="3" style="border-top: .5px solid;padding-bottom:  2px;padding-top: 2px;"></td>
        </tr>
                         <?php  
                            $summary = New Summary();
                            $res     = $summary->single_summary($orderno);
                            $senior =   $res->DISCOUNTSENIOR; 

                            ?> 
                        <!-- summary -->  
                        <tr>
                            <td colspan="2" style="padding-top: 5px;padding-bottom: 2px;">Gross Charge: </td>
                             <td  align="right" style="border-bottom: .5px solid;" ><?php echo number_format($res->TOTALPAYMENT,2); ?></td>
                        </tr>
                         <tr> 
                            <td style="padding-top: 5px;padding-bottom: 5px;" colspan="2">Senior Discount: </td>
                            <td  align="right"><?php echo number_format($senior,2); ?></td>
                        </tr> 
                        <tr>
                            <td></td>
                        </tr>
                         <tr> 
                            <td style="padding-top: 5px;padding-bottom: 5px;" colspan="2">Total Bill: </td>
                            <td  align="right"><?php echo number_format($res->OVERALLTOTAL,2); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr> 
                         <tr style="padding: 5px;"> 
                            <td colspan="2">Vatable: </td>
                            <td  colspan="2" ><?php echo number_format($vatable,2); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr> 
                         <tr style="margin-bottom: 10px; padding: 5px;"> 
                            <td colspan="2">Vat 12%: </td>
                            <td   style="border-bottom:.5px solid;" ><?php echo number_format($vat,2); ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr> 
                        <tr> 
                            <td style="padding-bottom: 2px;padding-top: 2px;" colspan="2">Reg. Bill: </td>
                            <td  colspan="2" ><?php echo number_format($regbill,2); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr> 
                        <tr> 
                            <td colspan="2" style="padding-top: 5px;padding-bottom: 5px;">Tender Amount: </td>
                            <td  align="right"><?php echo number_format($res->TENDEREDAMOUNT,2); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top: 2px;padding-bottom: 5px;">Change: </td>
                            <td  align="right"><?php echo number_format($res->PCHANGE,2); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr> 
                          <tr>
                                <td  colspan="3" style="border-top: .5px solid;padding-bottom:  2px;padding-top: 2px;"></td>
                          </tr>

                           <tr> 
                            <td style="text-align: center; padding-top: 5px;"><?php echo $waiter; ?></td>
                            <td></td>
                            <td style="text-align: center; padding-top: 5px;"><?php echo $_SESSION['ADMIN_FULLNAME']; ?></td> 

                            </tr >
                           <tr style="margin-bottom: 10px;"> 
                            <td style="border-top: .5px solid;text-align: center; padding-bottom: 5px;"><?php echo 'Caterer'; ?></td>
                            <td></td>
                            <td style="border-top: .5px solid;text-align: right;padding-bottom: 5px;text-align: center;"><?php echo 'Cashier'; ?></td> 

                            </tr >
                            <tr><td></td></tr>
                            <tr>
                                <td colspan="3" style="text-align: left; font-size: 8px; padding-top: 5px; border-top: .5px dashed;">
                                    Like & Share our Facebook Page:
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center; font-size: 8px; ">www.facebook.com/meloisplazacafe</td>
                            </tr>
                        <tr>
                            <td style="padding-top: 5px;" colspan="3" align="center">
                                Please ask for your Official Receipt.
                            </td>
                        </tr>
                        <tr>  
                            <td colspan="3" style="padding-top: 5px; padding-bottom: 5px; text-align: center;margin-bottom: 5px;">Thank You for Coming...</td>
                        </tr>
                        <tr style="border-bottom: .5px solid;">
                            <td style="margin-top: 5px; font-size: 8px;">Date: <?php echo date('M-d-Y'); ?></td>
                            <td style="padding-bottom: 4px;" colspan="3" style="font-size: 8px;">Time: <?php echo date('h:i A'); ?></td>
                        </tr>
    </table>
    </div>
            
</div>
    <!-- /#wrapper -->


<!-- jQuery --> 
<script src="<?php echo web_root; ?>admin/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo web_root; ?>admin/js/bootstrap.min.js"></script>

<script src="<?php echo web_root; ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo web_root; ?>admin/js/janobe.js" charset="UTF-8"></script>

    <script type="text/javascript">
    (function() {

    var beforePrint = function() {
        console.log('Functionality to run before printing.');
    };

    var afterPrint = function() {
        // console.log('Functionality to run after printing');
        // window.print();
        // window.close();
        window.location = "index.php";
    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint();
            } else {
                afterPrint();
            }
        });
    }

    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;

}());
</script>
 </center>
</body>
</html>