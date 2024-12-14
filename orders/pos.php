	<?php
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

		// check_message();
			
    ?>
 <style type="text/css">
 .scrolly {
   /*width: auto;*/
    height:268px;
    /*border: thin solid black;*/
    overflow-x: hidden; 
    background-color: #eee;
    /*overflow-y: hidden;*/
} 
 .scrollorder {
   /*width: auto;*/
    height:450px;
    /*border: thin solid black;*/
    overflow-x: hidden; 
    /*overflow-y: hidden;*/
    padding: 0px;
} 
.page-header{
    font-size: 25px;
    font-weight: bold;
    margin-left: 0;
}

.form-control{
    width: 59%;
}

input[type="checkbox"]{
    width: 30px;
    height: 30px;
    margin-left: 80px;
}
/* #admin_from{
    background: #DCDDDF url(assets/1.png);
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center; 
    width: 100%; 
    height: 300px; 
} */

 </style>
<form class="form" action="controller.php?action=add" method="POST" target="_blank" id="admin_form" > 
<!-- orders -->
    <div class="col-lg-5 ">
    	<div class="col-lg-12">
    		<div class="row">
    			<div class="page-header">
    				List of Orders <a href="addorder.php" class="btn-primary btn btn-s" data-toggle="lightbox" data-title="New Order"><i class="fa fa-plus-circle"></i> New Order</a>
    			</div> 
                    <div id="reload" class="scrollorder">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr> 
                                    <th>Order No.</th> 
                                    <th>Table No.</th>
                                    <th>Caterer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                   $remarks = isset($_GET['rem']) ? $_GET['rem'] : "" ;
                                    $query = "SELECT * FROM `tblorders` o , `tblusers` u
                                         WHERE  o.`USERID` = u.`USERID` AND STATUS='Pending' GROUP BY ORDERNO ORDER BY ORDERID ASC ";
                                    $mydb->setQuery($query);
                                    $cur = $mydb->loadResultList();

                                    foreach ($cur as $result) { 
                                    echo '<tr>'; 
                                    echo '<td><a style="font-size:15px; font-weight:bold;" href="index.php?view=POS&orderno='.$result->ORDERNO.'&tableno='.$result->TABLENO.'&rem='.$result->REMARKS.'" >'.$result->ORDERNO.'</a></td>'; 
                                    echo '<td align="center">'.$result->TABLENO.'</td>';
                                    echo '<td>'.$result->FULLNAME.'</td>';
                                    echo '<td>'.$result->REMARKS.'</td>';
                                    echo '</tr>';
                                 
                                    } 
                                ?> 
                            </tbody>
                        </table>
                </div>
            </div> 
    	</div> 
    </div>
<!-- end orders -->
 	<!-- SUMARRY -->
 	<div class="col-lg-7" style="border-left: 1px solid #ddd;">
    	<div class="col-lg-12">
    	<!-- order details -->
    		<div class="row">
    			<div   style="font-size: 24px;font-weight: bold;margin-top: 10px;">
    				Order Details 
    				<small><?php echo isset($_GET['tableno']) ? " for Table Number: ". $_GET['tableno'] : "" ?> <?php echo isset($_GET['rem']) ? "| ". $_GET['rem'] : "" ?></small>
                    <span><?php echo isset($_GET['orderno']) ?  '<a href="addmeal.php?view=addmeal&orderno='.$_GET['orderno'].'&tableno='.$_GET['tableno'].'&rem='.$remarks.'" data-toggle="lightbox" class="btn btn-s btn-primary " data-title="<b>Add Meal</b>"><i class="fa fa-plus-circle"> Add Meal</i></a>' : ''; ?></span>
    				<p style="text-align: right;font-size: 20px;">Order Number:<b style="text-decoration: underline;"> <?php echo isset($_GET['orderno']) ?  $_GET['orderno'] : "NONE" ?></b>
    					<input type="hidden" name="ORDERNO" id="ORDERNO"   value="<?php echo isset($_GET['orderno']) ?  $_GET['orderno'] : "NONE" ?>">
                        <input type="hidden" name="tableno" id="tableno"   value="<?php echo isset($_GET['tableno']) ?  $_GET['tableno'] : "NONE" ?>">
                         <input type="hidden" name="REMARKS" id="REMARKS"   value="<?php echo isset($_GET['rem']) ?  $_GET['rem'] : "" ?>">
    				</p>
    			</div>
                <div id="showmeal">
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
						  		echo '<td style="font-size:15px;">&#8360; <input type="hidden" id="'.$result->ORDERID.'orderprice" value="'.$result->PRICE.'" >'.$result->PRICE.'</td>';
						  		echo '<td style="font-size:15px;"><input type="number" min="1" class="orderqty" data-id="'.$result->ORDERID.'" id="'.$result->ORDERID.'orderqty" value="'.$result->QUANTITY.'" style="width:50px"></td>';
						  		echo '<td style="text-align:center;"><output style="font-size:15px;" id="Osubtot'.$result->ORDERID.'">'.$result->SUBTOTAL.'</output></td>';
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
                                     <input class="form-control" placeholder="Senior Id" type="text" id="SENIORID" name="SENIORID" style="width: 200px;margin-top: 5px" disabled="true">
                                </td>
                            </tr>
                        </tr>

                        <tr>
                            <th width="250">Total</th>
                            <th><input class="form-control" type="text" id="overalltot" readonly="true" value="<?php echo number_format($total,2); ?>">
                            <input type="hidden" name="overalltotal" id="overalltotal"   value="<?php echo number_format($total,2); ?>"></th>
                        </tr>
    					<tr>
    						<th width="250">Recieved Amount</th>
    						<th><input type="text" class="form-control"  name="tenderamount" id="tenderamount"  placeholder="&#8360 0.00" autocomplete="off"> <span id="errortrap"></span></th>
    					</tr>
    					<tr>
    						<th width="250">Change</th>
    						<th><input class="form-control" type="" class="sukli" readonly="true" name="sukli" id="sukli" value="" placeholder="&#8360 0.00"></th>
    					</tr>
    				</thead>
    			</table>
    			<div>
    				<button target="_blank" type="submit" name="save" class="btn btn-primary btn-lg fa fa-save" id="save"> Save & Print</button>
                    <a target="_blank" href="tempreceipt.php?orderno=<?php echo isset($_GET['orderno']) ?  $_GET['orderno'] : "NONE" ?>&tableno=<?php echo isset($_GET['tableno']) ?  $_GET['tableno'] : "NONE" ?>" class="btn btn-default btn-lg fa fa-print"> <b>Print for Cook</b></a>
    			</div>
    		</div> 
    		<!-- end summary -->
     	</div> 
    </div>
    </form>

  <script>
function SearchTable() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dashtable");
  tr = table.getElementsByTagName("tr");
  td = table.getElementsByTagName("td");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>