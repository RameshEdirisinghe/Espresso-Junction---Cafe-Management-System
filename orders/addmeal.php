 <div>
<?php
require_once("../include/initialize.php");
//checkAdmin();
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$orderno = "";
$tableno = "";
	if (isset($_GET['orderno'])) {
		# code...
		$orderno = $_GET['orderno'];
	}
	if (isset($_GET['tableno'])) {
		# code...
		$tableno = $_GET['tableno'];
	}
   if (isset($_GET['rem'])) {
		# code...
		$remarks = $_GET['rem'];
	}


?> 
<style type="text/css">
	.form-control:focus{
		width: 50%;
	}
	input[type=search] {
    width: 160px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
</style>
	<input type="hidden" name="orderno" id="orderno" value="<?php echo $orderno; ?>">
	<input type="hidden" name="tableno" id="tableno" value="<?php echo $tableno; ?>">
	<input type="hidden" name="rem" id="rem" value="<?php echo $remarks; ?>">  	
	<input class="form-control" id="myInput" placeholder="Search here..." style="font-size: 20px; margin-bottom: 10px;" type="search" name="SearchMe" onkeyup="SearchTable()">
		 <table id="dashtable" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0" >
					
				  <thead style="font-size: 15px;">
				  	<tr>  
						<th>Meals</th>  
						<th width="100">Categories</th>  
						<th width="50">Price</th> 
						<th width="20">Action</th> 
				  	</tr>	
				  </thead> 	

			  <tbody style="font-size: 13px;">
				  	<?php 
				  		$query = "SELECT * FROM `tblmeals` m , `tblcategory` c
           					 WHERE  m.`CATEGORYID` = c.`CATEGORYID` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>';  
				  		echo '<td id="meals">'.$result->MEALS.'</a></td>';
				  		
				  		echo '<td id="meals" style="width:200px;">'. $result->CATEGORY.'</td>'; 
				  		echo '<td style="width:80px;">&#8360 '.number_format($result->PRICE,2).'</td>';  

				  	 	echo '<td align="center" > 
				  	 	     <a title="Add Meal"  data-id="'.$result->MEALID.'" class="btn btn-primary btn-sm addmeal"><span class="fa fa-plus fw-fa"></a></td>';
				  	 	 echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

	</div>
</div> 
 <script type="text/javascript">
  $(document).ready(function() {
    $('#dash-table').DataTable({
                responsive: true ,
                  "sort": false,
                  "lengthChange" : false
        });
 
	});

  $(document).ready(function(){
  	$(".addmeal").click(function(){
  		var id = $(this).data("id");
  		var orderno = $("#orderno").val();
  		var tableno = $("#tableno").val();
  		var remarks = $("#rem").val();
  		// alert(id);
  		$.ajax({
  			type : "POST",
  			url : "showmeals.php?orderno="+orderno+"&tableno="+tableno+"&rem="+remarks,
  			dataType : "text",
  			data :{mealid:id,ORDERNO:orderno,TABLENO:tableno},
  			success : function(data){
  				// alert(data);
  				$("#showmeal").html(data);
  			}

  		});
  	});
  });

 // function SearchTable(){
 //    var input,filter,table,tr,td,i;
 //    input=document.getElementById('SearchMe');
 //    filter = input.value.toUpperCase();
 //    table = document.getElementsByTagName('table');
 //  tr=table.getElementsByTagName('tr');


 //  for (var i = 0.length; i < tr.length; i++) {
 //    td = tr[i].getElementsByTagName('td')[0];
 //    if (td) {
 //      if (td.innerHTML.toUpperCase().indexof(filter)>-1) {
 //        tr[i].style.display="";
 //      }else{
 //        tr[i].style.display="none";
 //      }
 //    }
 //  }
 //  }
 
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