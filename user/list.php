<?php
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?>

<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Users  <a href="index.php?view=add" class="btn btn-primary btn-s">  <i class="fa fa-plus-circle fw-fa"></i> Add User</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th width="12%" style="font-size: 15px; text-align: center;">Account ID</th>
				  		<th style="font-size: 15px;">
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		Account Name</th>
				  		<th style="font-size: 15px;">Username</th>
				  		<th style="font-size: 15px;">Role</th>
				  		<th style="font-size: 15px; text-align: center;" width="20%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * FROM  `tblusers` ORDER BY ROLE ASC");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td style="font-size:20px; text-align:center; font-weight:bold;">' . $result->USERID.'</a></td>';
				  		echo '<td style="font-size:20px;">' . $result->FULLNAME.'</a></td>';
				  		echo '<td style="font-size:20px;">'. $result->USERNAME.'</td>';
				  		echo '<td style="font-size:20px;">'. $result->ROLE.'</td>';
				  		If($result->USERID==$_SESSION['ADMIN_USERID'] || $result->ROLE=='MainAdministrator' || $result->ROLE=='Administrator') {
				  			$active = "Disabled";

				  		}else{
				  			$active = "";

				  		}

				  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->USERID.'"  class="btn btn-primary btn-s  ">  <span class="fa fa-pencil fw-fa"></span> Edit</a>
				  					 <a title="Remove" href="controller.php?action=delete&id='.$result->USERID.'" class="btn btn-danger btn-s" '.$active.'><span class="fa fa-trash-o fw-fa"> Remove</span> </a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 
				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
			</div>
				</form>
	

</div> <!---End of container-->