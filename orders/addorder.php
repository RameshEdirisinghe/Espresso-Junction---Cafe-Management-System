<?php
require_once("../include/initialize.php");
   if (!isset($_SESSION['ADMIN_ROLE'])=='Cashier'){
      redirect(web_root."index.php");
     }

?>   
<?php 
    $cart_value =0;
    if (isset($_SESSION['admin_gcCart'])) { 
        if (!empty($_SESSION['admin_gcCart'])){  

            $count_cart = count($_SESSION['admin_gcCart']);

            for ($i=0; $i < $count_cart  ; $i++) {  
                   $cart_value  +=  $_SESSION['admin_gcCart'][$i]['qty'];
            } 
        }
       } 

?>

<style type="text/css">
  .form-control:focus{
    width: 100%;
  }
  input[type=search] {
    width: 200px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    font-size: 15px;
}
</style>
<!-- Nav tabs --> 
<ul style="margin-bottom: 10px;" class="nav nav-pills">
    <li class="active"><a href="#home" data-toggle="tab">List of Meals</a>
    </li>
    <li>
      <a href="#profile" data-toggle="tab">
       <span class="fa fa-shopping-cart fw-fa fa-lg"> 
          <div style="font-size: 15px;" id="cartvalue" class="label label-danger"><?php echo $cart_value; ?> </div>
       </span>
       <b id="addnotif"></b>
       </a>
    </li>
</ul>
<!-- Tab panes  login panel-->
<div class="tab-content">
  <div class="tab-pane fade in active" id="home"> 
<!--     <form action="#">
      <fieldset>
        <input type="text" name="search" value="" id="id_search" placeholder="Search for Meals" autofocus />
      </fieldset>
    </form>
      <BR/> -->
      <div  id="resulttable">

      <input class="form-control" id="myInput" placeholder="Search here..." style="font-size: 20px; margin-bottom: 10px;" type="search" name="SearchMe" onkeyup="SearchTable()">

      <table id="dashtable" class="table table-striped table-bordered table-hover " cellspacing="0" >
           <thead style="font-size: 15px;">
            <tr>   
              <th>Meals</th>  
              <th width="200">Categories</th>  
              <th width="80">Price</th> 
              <th width="20">Action</th> 
            </tr> 
          </thead>  

        <tbody>
            <?php 
              $query = "SELECT * FROM `tblmeals` m , `tblcategory` c
                     WHERE  m.`CATEGORYID` = c.`CATEGORYID` ";
              $mydb->setQuery($query);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) { 
              echo '<tr>';   
              echo '<td style="font-size:15px;">'.$result->MEALS.'</a></td>';
              
              echo '<td>'. $result->CATEGORY.'</td>'; 
              echo '<td> &#8360 '.  number_format($result->PRICE,2).'</td>';   
              echo '<td align="center">
                   <a  title="Add to Cart" class="btn btn-primary btn-sm addcartadmin" data-id="'.$result->MEALID.'">  <span class="fa fa-shopping-cart fw-fa"></a> </a></td>'; 
              echo '</tr>';
            } 
            ?>
          </tbody>
          
          
        </table>
        </div>  
  </div>
  <!-- end login panel --> 
  <!-- sign in panel -->
  <div class="tab-pane fade" id="profile">
<style type="text/css"> 
  #table{
    font-size: 14px;
    padding: 0px;
  }

  #placeorder{
    width: 600px;
    font-size: 18px;
  }
  #placeorder label {
    margin-top: 5px;
  }
  #tableno { 
  height: 30px;
  width:100px;
  font-size: 12px;
  }
    #REMARKS { 
  height: 30px;
  width:100px;
  font-size: 12px;
  }
  .stot{
    text-align: right;
    font-size: 18px;
    font-weight: bold;
  } 
 </style>
 <br/>
<form id="contact-us" method="post" action="controller.php?action=addorder">  
<div id="cart">
<table id="table" class="table table-responsive">
<thead>
  <tr>
  <th>Meal</th>
  <th width="80">Price</th>
  <th width="80">Qty</th>
  <th width="80">Sub-total</th>
  <th width="20">Action</th>
  </tr>
</thead>
<tbody>
   <?php
          $cart = 0;
          $subtotal = 0; 
          if (!empty($_SESSION['admin_gcCart'])){   
            $count_cart = count($_SESSION['admin_gcCart']); 
              for ($i=0; $i < $count_cart  ; $i++) { 

                    echo  '<tr>'; 
                    echo  '<td>'.$_SESSION['admin_gcCart'][$i]['meals'].'</td>';
                    echo  '<td style="font-size:15px;"><input style="height:20px" type="hidden" name="price" id="'.$_SESSION['admin_gcCart'][$i]['mealid'].'price"  value="'.$_SESSION['admin_gcCart'][$i]['price'].'"/> '.$_SESSION['admin_gcCart'][$i]['price'].'</td>';
                    echo  '<td><input style="height:25px;width:50px" type="number" name="qty" id="'.$_SESSION['admin_gcCart'][$i]['mealid'].'qty" required class=" admincartqty" data-id="'.$_SESSION['admin_gcCart'][$i]['mealid'].'"   value="'.$_SESSION['admin_gcCart'][$i]['qty'].'" autocomplete="false"/> </td>';
                    // echo '<td>'.$_SESSION['admin_gcCart'][$i]['qty'].'</td>';
                    echo  '<td align="center"> <output style="font-size:15px;" id="Osubtot'.$_SESSION['admin_gcCart'][$i]['mealid'].'">'.$_SESSION['admin_gcCart'][$i]['subtotal'].'</output></td>';
                    echo '<td><a class="btn btn-sm btn-danger removecartadmin" style="text-decoration:none; font-size:15px;" data-id='.$_SESSION['admin_gcCart'][$i]['mealid'].' ><i class="fa fa-shopping-cart"></i></a></td>';
                    echo  '</tr>';   

                        $cart += $_SESSION['admin_gcCart'][$i]['qty'];
                        $subtotal += $_SESSION['admin_gcCart'][$i]['subtotal'];
             } 


          }  
                // echo  '<tr>
                //             <td colspan="3" ><p class="stot">Total</p></td>
                //             <td> &#8369 <span id="sum" class="stot">'. $subtotal.'</span></td>
                //             <td>
                //           </tr>';


                          ?>  
   
  </tbody>
</table>
            <?php 
              if ($subtotal > 0) { 
             ?>

             <div id="placeorder">
              <div class="row" >
                <label class="col-xs-2"  style="height: 30px;text-align:  center; font-size: 13px">Table No.</label>
                <div class="col-xs-2"> 
                  <select style="font-size: 15px; font-weight: bold;" name="tableno" id="tableno">  

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
                                    $mydb->setQuery("SELECT * FROM `tbltable` WHERE STATUS='Available'   order by TABLENO asc");
                                    $cur = $mydb->loadResultList();

                                  foreach ($cur as $result) {
                                    echo  '<option style="font-size:15px;" value='.$result->TABLENO.' >'.$result->TABLENO.'</option>';
                                    }
                                    ?> 
                                       </select>
                </div> 

                   <div class="col-xs-2"> 
                  <select  style="font-size: 15px;" name="REMARKS" id="REMARKS">  
                    <option value="DineIn">Dine In</option>
                    <option value="TakeOut">Take Out</option>
                  </select>
                </div> 
                <div class="col-xs-2">
                   <button  style="height: 30px;text-align:  center; font-size: 12px;"  type="submit" id="submit" name="submit" class="text-center btn btn-primary  btn-sm">Place Order</button> 
                </div>
              </div>
             </div> 
          <div class="clear"></div>
          <?php } ?>
           
</div> 
          </form>  


  </div> 
<!-- end panel sign up -->
</div>    
   <script type="text/javascript">  
    $(document).ready(function() {
    $('#dash-table2').DataTable({
                responsive: true ,
                  "sort": false,
                  "lengthChange" : false;
        });
 
    });
   </script>

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