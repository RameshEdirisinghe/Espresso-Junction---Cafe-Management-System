<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $tableid = $_GET['id'];
  $tables = New Tables();
  $stables = $tables->single_table($tableid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
        <fieldset>
            <h1 class="page-header">Update Table Number</h1>
                      

                  <div class="form-group">
                    <div class="col-md-8">
                      <label style="font-size: 20px;" class="col-md-4 control-label" for="TABLENO">Table No.:</label>

                      <div class="col-md-2">
                       <input  id="TABLEID" name="TABLEID"   type="HIDDEN" value="<?php echo $stables->TABLEID; ?>">
                         <input style="font-size: 20px;" class="form-control input-lg" id="TABLENO" name="TABLENO" type="text" value="<?php echo $stables->TABLENO; ?>" required>
                      </div>
                      <div><button class="btn btn-primary btn-lg" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button></div>
                    </div>
                  </div>

                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->
  