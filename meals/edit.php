<?php  
 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
if(!$_SESSION['ADMIN_ROLE']=='Administrator'){
  redirect(web_root."admin/index.php");
}
  



  $MEALID = $_GET['id'];
  $menus = New Meal();
  $singlemeal = $menus->single_meal($MEALID);

?>
  
        
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Meal</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div>
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
 
             <div class="form-group">
                    <div class="col-md-8">
                      <label style="font-size: 20px;" class="col-md-4 control-label" for=
                      "MEALS">Meal:</label>

                      <div class="col-md-8">
                            <input type="hidden" name="MEALID" value="<?php echo $singlemeal->MEALID;  ?>">
                            <input class="form-control input-lg" id="MEALS" name="MEALS" placeholder=
                            "Meal" type="text" value="<?php echo $singlemeal->MEALS ?>" required>
                      </div>
                    </div>
                  </div> 
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label style="font-size: 20px;" class="col-md-4 control-label" for=
                      "CATEGORYID">Category:</label>

                      <div class="col-md-8">
                       <select class="form-control input-lg" name="CATEGORYID" id="CATEGORYID">
                          <option value="None">Select Category</option>
                          <?php
                            //Statement

                         $category = New Category();
                          $singlecategory = $category->single_category($singlemeal->CATEGORYID);
                          echo  '<option SELECTED  value='.$singlecategory->CATEGORYID.' >'.$singlecategory->CATEGORY.'</option>';


                          $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGORYID <> '".$singlecategory->CATEGORYID."'");
                          $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo  '<option  value='.$result->CATEGORYID.' >'.$result->CATEGORY.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-8"> 
                       <label style="font-size: 20px;" class="col-md-4 control-label" for=
                      "PRICE">Price:</label>

                      <div class="col-md-8">
                         <input class="form-control input-lg" id="PRICE"  step="any" name="PRICE" placeholder=
                            "&#8369 Price " type="text" value="<?php echo $singlemeal->PRICE?>" required>
                      </div>
                    </div>
                  </div>

                 
                   
                  
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="idno"></label>

                      <div class="col-md-8">
                               <button style="width: 100%;" class="btn  btn-primary btn-lg" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                  </div>
                    </div>
                  </div> 
            
 
            </div>
 
  
      
<!--/.fluid-container--> 
 </form>