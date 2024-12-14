<?php
require_once("../include/initialize.php"); 
	// if (isset($_POST['mealid'])) {
		# code...
	    $orderno = $_POST['ORDERNO'];
	    $tableno = $_POST['TABLENO'];
	    $mealid  = $_POST['mealid'];
	    $remarks = $_GET['rem'];
		$subtotal = 0;
		$qty =0;

			 $query = "SELECT * FROM `tblorders` 
	          		   WHERE `ORDERNO`= '".$orderno."' AND MEALID= '".$mealid."' AND STATUS='Pending'"; 
				  	 $mydb->setQuery($query);
				  	 $row = $mydb->executeQuery(); 
				     $maxrow = $mydb->num_rows($row);

				  	if ($maxrow > 0) {
				  		# code...
				  		$res = $mydb->loadSingleResult(); 

				  		$qty = intval($res->QUANTITY) + 1;
					  	$subtotal = $res->PRICE * $qty; 

				  		$order = new Order(); 
						$order->QUANTITY 			= $qty;	
						$order->SUBTOTAL 			= $subtotal;	 
						$order->pupdate($orderno,$mealid); 


				  	}else{
				  		$query = "SELECT * FROM `tblmeals` WHERE MEALID='".$mealid."'";
				  	    $mydb->setQuery($query);
				  		$cur = $mydb->loadSingleResult(); 

					  	$subtotal = $cur->PRICE * 1;

						$order = new Order();
						$order->DATEORDERED 		= date('Y-m-d H:i');	
						$order->ORDERNO 			= $orderno;
						$order->DESCRIPTION 		= $cur->MEALS;	
						$order->PRICE 				= $cur->PRICE;	
						$order->QUANTITY 			= 1;	
						$order->SUBTOTAL 			= $subtotal;	
						$order->TABLENO 			= $tableno;
						$order->MEALID 				= $mealid;
						$order->USERID 				= $_SESSION['ADMIN_USERID'];
						$order->STATUS 				= 'Pending';
						$order->REMARKS				= $remarks;
						$order->create(); 
				  	}


				   

					 // $tableno = new Tables();
					 // $tableno->STATUS       = 'Occupied';
					 // $tableno->RESERVEDDATE = date('Y-m-d');
					 // $tableno->updatestats($tablenumber);
	// }
?> 
<div class="scrolly">
<table id="table" class="table table-hover" style="font-size: 12px" >
    				<thead>
    					<tr style="font-size: 15px;"> 
    					    <th>Meal</th>
							<th width="60">Price</th>
							<th width="50" style="text-align: center;">Qty</th>
							<th width="90">Amount</th>
							<th width="30">Action</th>
    					</tr> 
    				</thead>
    				<tbody>
    					<?php 
    					$total = 0;
    						if (isset($_GET['orderno'])) {
    							# code...
    							$orderno = $_GET['orderno'];
    							$query = "SELECT * FROM `tblorders` o , `tblusers` u
	           					 WHERE  o.`USERID` = u.`USERID` AND `STATUS`='Pending' AND `ORDERNO` ='".$orderno."'";
						  		$mydb->setQuery($query);
						  		$cur = $mydb->loadResultList();

								foreach ($cur as $result) { 
						  		echo '<tr>'; 
						  		echo '<td style="font-size:15px;">'.$result->DESCRIPTION.'</td>';
						  		echo '<td style="font-size:15px;"><input type="hidden" id="'.$result->ORDERID.'orderprice" value="'.$result->PRICE.'" >&#8369; '.$result->PRICE.'</td>';
						  		echo '<td style="font-size:15px;"><input type="number" style="width:50px" class="orderqty" data-id="'.$result->ORDERID.'" id="'.$result->ORDERID.'orderqty" value="'.$result->QUANTITY.'" style="width:50px"></td>';
						  		echo '<td style="text-align:center;font-size:15px;"> <output id="Osubtot'.$result->ORDERID.'">'.$result->SUBTOTAL.'</output></td>';
						  		// echo '<td></td>';
                  echo '<td style="text-align:center;"><a title="Cancel Order" class="btn btn-xs btn-danger" style="text-decoration:none;" href="controller.php?action=delete&id='.$result->ORDERID.'&rem='.$result->REMARKS.'"><i style="font-size:15px; padding:2px;" class="fa fa-trash-o"></i></a></td>';
						  		echo '</tr>';

						  		$total += $result->SUBTOTAL; 

						  	 
						  		} 
    						}
					  		
				  		?> 
				  		<!-- <tr>
				  			<td colspan="4"></td>
				  		</tr> -->
    				</tbody>
    			</table>
    		 </div> 
    		<!-- <hr/> -->
    		<!-- end order details -->
    		<!-- summary --> 
    			<div style="font-size: 19px;font-weight: bold;margin-top:20px;margin-bottom: 3px">
            Summary
          </div>
                
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="250">Sub-Total</th>
                <th><input class="form-control" type="text" id="totamnt"  readonly="true" value="<?php echo number_format($total,2); ?>">
                <input type="hidden" name="totalamount" id="totalamount"   value="<?php echo $total; ?>"></th>
              </tr>
                        <tr>
                            <tr>
                                <td>
                                    <b style="font-size: 13px;">Discount Person(s)</b> <input type="checkbox" id="SENIORCITIZEN" name="SENIORCITIZEN" class="seniorcitizen" value="20">
                                </td>
                                <td>
                                    <input class="form-control" placeholder="How many persons?" type="number" id="SENIORADDNO" name="SENIORADDNO" style="width: 200px;" disabled="true">
                                </td>
                            </tr>
                        </tr>
                        <tr>
                            <th width="250">Total</th>
                            <th><input class="form-control" type="text" id="overalltot"  readonly="true" value="<?php echo number_format($total,2); ?>">
                            <input type="hidden" name="overalltotal" id="overalltotal"   value="<?php echo number_format($total,2); ?>"></th>
                        </tr>
              <tr>
                <th width="250">Tender Amount</th>
                <th><input type="text" class="form-control"  name="tenderamount" id="tenderamount"  placeholder="&#8369 0.00" autocomplete="off"> <span id="errortrap"></span></th>
              </tr>
              <tr>
                <th width="250">Change</th>
                <th><input class="form-control" type="" class="sukli" readonly="true" name="sukli" id="sukli" value="" placeholder="&#8369 0.00"></th>
              </tr>
            </thead>
          </table>
          <div>
            <button target="_blank" type="submit" name="save" class="btn btn-primary btn-lg fa fa-save" id="save"> Save & Print</button>
                    <a target="_blank" href="tempreceipt.php?orderno=<?php echo isset($_GET['orderno']) ?  $_GET['orderno'] : "NONE" ?>&tableno=<?php echo isset($_GET['tableno']) ?  $_GET['tableno'] : "NONE" ?>" class="btn btn-default btn-lg fa fa-print"> <b>Print for Cook</b></a>
          </div>
        </div> 





 <script type="text/javascript">
 	$("#SENIORADDNO").change(function(){
  var subtot = document.getElementById("totalamount").value;
  var seniorpercent = document.getElementById("SENIORCITIZEN");
  var overalltot=0;
  var convertval =0;
  var seniorval=0;
  var vat=0;
  var vatable = 0;
  var senioraddno = document.getElementById("SENIORADDNO").value;
  var totsenioraddno=0;


  if (senioraddno=="") {
    var totsub=0;
        totsub = parseFloat(subtot) + parseFloat(0);

        // alert(totsub)
        document.getElementById("overalltotal").value =totsub;
        $("#overalltot").val(totsub.toFixed(2));
      }else{
         vat = subtot / 1.12;

      // alert(vat)

      // vatable = subtot - vat;

      // alert(vatable); 

      $totsenioraddno = .20 * senioraddno;

      seniorval =vat * $totsenioraddno;

      // alert(seniorval);

      overalltot = vat - seniorval;

      document.getElementById("overalltotal").value = overalltot;

      document.getElementById("overalltot").value = overalltot.toFixed(2);
      }

     
    });
  
    $("#SENIORADDNO").keyup(function(){
  var subtot = document.getElementById("totalamount").value;
  var seniorpercent = document.getElementById("SENIORCITIZEN");
  var overalltot=0;
  var convertval =0;
  var seniorval=0;
  var vat=0;
  var vatable = 0;
  var senioraddno = document.getElementById("SENIORADDNO").value;
  var totsenioraddno=0;


  if (senioraddno=="") {
    var totsub=0;
        totsub = parseFloat(subtot) + parseFloat(0);

        // alert(totsub)
        document.getElementById("overalltotal").value =totsub;
        $("#overalltot").val(totsub.toFixed(2));
      }else{
         vat = subtot / 1.12;

      // alert(vat)

      // vatable = subtot - vat;

      // alert(vatable); 

      $totsenioraddno = .20 * senioraddno;

      seniorval =vat * $totsenioraddno;

      // alert(seniorval);

      overalltot = vat - seniorval;

      document.getElementById("overalltotal").value = overalltot;

      document.getElementById("overalltot").value = overalltot.toFixed(2);
      }

     
    });

 </script>