 <?php 
    require_once ("../include/initialize.php");   
    if (isset($_POST['MEALID'])){//add to cart
      $subtotal = 0;
      $mealid = $_POST['MEALID']; 
      $query = "SELECT * FROM `tblmeals` WHERE  MEALID='".$mealid."'";
      $mydb->setQuery($query);
      $cur = $mydb->loadSingleResult();  


      $id = $cur->MEALID;
      $meals = $cur->MEALS;
      $price = $cur->PRICE;
      $qty = 1;
      $subtotal = $cur->PRICE * 1;

      admin_addtocart($id,$meals,$price,$qty,$subtotal); 
    }
?> 
<table id="table" class="table table-responsive">
  <th>Meal</th>
  <th width="80">Price</th>
  <th width="80">Qty</th>
  <th width="80">Sub-total</th>
  <th width="20"></th>
   <?php
          $cart = 0;
          $subtotal = 0; 
          if (!empty($_SESSION['admin_gcCart'])){   
            $count_cart = count($_SESSION['admin_gcCart']); 
              for ($i=0; $i < $count_cart  ; $i++) { 

                    echo  '<tr> 
                          <td>'.$_SESSION['admin_gcCart'][$i]['meals'].'</td>
                          <td><input style="height:20px" type="hidden" name="price" id="'.$_SESSION['admin_gcCart'][$i]['mealid'].'price"  value="'.$_SESSION['admin_gcCart'][$i]['price'].'"/> '.$_SESSION['admin_gcCart'][$i]['price'].'</td>
                          <td><input style="height:25px;width:50px" type="number" name="qty" id="'.$_SESSION['admin_gcCart'][$i]['mealid'].'qty" required class=" admincartqty" data-id="'.$_SESSION['admin_gcCart'][$i]['mealid'].'"   value="'.$_SESSION['admin_gcCart'][$i]['qty'].'" autocomplete="false"/> </td>
                          <td> <output id="Osubtot'.$_SESSION['admin_gcCart'][$i]['mealid'].'">'.$_SESSION['admin_gcCart'][$i]['subtotal'].'</output></td>
                           <td><a class="btn btn-xs btn-danger removecartadmin" style="text-decoration:none;" data-id='.$_SESSION['admin_gcCart'][$i]['mealid'].' ><i class="fa fa-trash-o"></i></a></td>
                        </tr>';   

                        $cart += $_SESSION['admin_gcCart'][$i]['qty'];
                        $subtotal += $_SESSION['admin_gcCart'][$i]['subtotal'];
                     
             } 


          }  
                // echo  '<tfoot>
                //           <tr>
                //             <td colspan="3" ><p class="stot">Total</p></td>
                //             <td> &#8369 <span id="sum" class="stot">'. $subtotal.'</span></td>
                //             <td>
                //           </tr>
                //           </tfoot>';


                          ?>  
   
  
</table>  
            <?php 
              if ($subtotal > 0) { 
             ?>

               <div id="placeorder">
              <div class="row" >
                <label class="col-xs-2"  style="height: 30px;text-align:  center; font-size: 12px" >Table No.</label>
                <div class="col-xs-2"> 
                  <select  name="tableno" id="tableno"   >  

                                  <?php 
                            //Statement

                        // $mydb->setQuery("SELECT * FROM `tbltable` where STATUS = 'Occupied' AND `RESERVEDDATE`='".date_create('Y-m-d')."' order by asc");
                        // $cur = $mydb->loadResultList();
                        //  foreach ($cur as $result) {
                 //                        echo  '<option value='.$result->TABLENO.' >'.$result->TABLENO.'</option>';
                        // }                            
                                      ?>
                                    <?php
                                      //Statement
                                    $mydb->setQuery("SELECT * FROM `tbltable`  WHERE STATUS='Available'  order by TABLENO asc");
                                    $cur = $mydb->loadResultList();

                                  foreach ($cur as $result) {
                                    echo  '<option value='.$result->TABLENO.' >'.$result->TABLENO.'</option>';
                                    }
                                    ?> 
                                       </select>
                </div> 

                   <div class="col-xs-2"> 
                  <select   name="REMARKS" id="REMARKS"   >  
                    <option value="Dine-In">Dine In</option>
                    <option value="Take-Out">Take Out</option>
                  </select>
                </div> 
                <div class="col-xs-2">
                   <button  style="height: 30px;text-align:  center; font-size: 12px"  type="submit" id="submit" name="submit" class="text-center btn btn-primary  btn-xs">Place Order</button> 
                </div>
              </div>
             </div> 
          <div class="clear"></div>
          <?php } ?>
  