  <?php
  require_once("../include/initialize.php");
   //admin_confirm_logged_in();
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/login.php");
     } 

      $orderno = isset($_GET['orderno']) ? $_GET['orderno'] : '';
      $printeddate =  date('M-d-Y');

    $query = "SELECT * FROM `tblpayments` WHERE  `ORDERNO` ='".$orderno."'";
    $mydb->setQuery($query);
    $cur = $mydb->loadSingleResult(); 

    $customer = $cur->CUSTOMER;
    $tableno  = $cur->TABLENO;
    $username = $cur->USERSNAME;
    $remarks =  $cur->REMARK;
  ?>  
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



      
<body onload="window.print();" style="width: 100%;padding: 0px;margin: 0px;">
 <style type="text/css">
.tables {
    width: 100%; 
    font-size: 9px;
}
     .tables > tr > td {
  border: 0px ;
  padding: 2px;
}
 </style>
 <center>
<div id="wrapper">
    <div class="container">
        <div style="text-align: center;font-size: 25px;"> <?php
      $sql = "SELECT * FROM `tbltitle` WHERE TItleID=1";
                 $mydb->setQuery($sql);
                $viewTitle = $mydb->loadSingleResult();
                echo $viewTitle->Title;
    ?></title></div>
        <div style="text-align: center;">Customer Receipt</div>
        <div style="text-align: center;font-size: 13px; margin-bottom: 10px;"><?php echo $remarks; ?></div>
        <table class="tables" style="border: 0; width: 550px;">
            <tr>
                <td>Order No.: <?php echo $orderno; ?></td>
                <td>Printed Date: <?php echo $printeddate; ?></td>
            </tr>
            <tr>
                <td>Customer No.: <?php echo $customer; ?></td>
                <td>Table No.: <?php echo $tableno; ?></td>
            </tr>
            <tr>
                <td>Cashier: <?php echo $username; ?></td>
            </tr>
        </table>
       <table id="table" class="table" style="font-size: 6px; border:0; padding: 0; width: 550px;" >
                    <thead>
                        <tr> 
                            <th>Meal</th>
                            <th width="60">Price</th>
                            <th width="50">Qty</th>
                            <th width="100">Sub-total</th> 
                        </tr> 
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        $tableno = 0;
                        $vat=0;
                            if (isset($_GET['orderno'])) {
                                # code...

                                $orderno = $_GET['orderno'];
                                $query = "SELECT * FROM `tblorders` o , `tblusers` u
                                 WHERE  o.`USERID` = u.`USERID` AND `STATUS`='Paid' AND `ORDERNO` ='".$orderno."'";
                                $mydb->setQuery($query);
                                $cur = $mydb->loadResultList();

                                foreach ($cur as $result) { 
                                echo '<tr>'; 
                                echo '<td>'.$result->DESCRIPTION.'</td>';
                                echo '<td>'.$result->PRICE.'</td>';
                                echo '<td>'.$result->QUANTITY.'</td>';
                                echo '<td>'.$result->SUBTOTAL.'</td>'; 
                                echo '</tr>';

                                $total += $result->SUBTOTAL; 
                                $tableno = $result->TABLENO;

                                $vat = $total * 0.12;

                                } 
                            }
                            
                        ?>  

                        <?php  
                            $summary = New Summary();
                            $res     = $summary->single_summary($orderno);?> 
                        <!-- summary -->  
                         <tr> 
                            <th colspan="3" style="text-align:right;">Vat 12%</th>
                            <th  width="100"><?php echo number_format($vat,2); ?></th>
                        </tr>
               
                        <tr> 
                            <th colspan="3" style="text-align:right;">Total</th>
                            <th  width="100"><?php echo number_format($total,2); ?></th>
                        </tr>
                        <tr> 
                            <th colspan="3" style="text-align:right;">Giving Price</th>
                            <th  width="100"><?php echo number_format($res->TENDEREDAMOUNT,2); ?></th>
                        </tr>
                        <tr>
                            <th>Thank You for Coming... |</th>
                            <th colspan="2" style="text-align:right;">Balance</th>
                            <th  width="100"><?php echo number_format($res->PCHANGE,2); ?></th>
                        </tr>
                       
                 </tbody>
                 <tfoot>
                <!--       <tr> 
                            <td><?php echo $orderno; ?></td>
                            <td><?php echo $_SESSION['ADMIN_FULLNAME']; ?></td>
                            <td><?php echo date('m/d/Y'); ?></td>
                            <td><?php echo $tableno; ?></td>
                        </tr> -->
                 </tfoot>
                </table>  
            <!-- end summary -->
        
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