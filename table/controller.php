<?php
require_once ("../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'reserve' :
	doReserve();
	break;
	
	case 'delete' :
	doDelete();
	break;

 
	}
   
	function doInsert(){
		global $mydb;
		$tableno = 0;

		$sql = "SELECT MAX(`TABLENO`) as 'TABLENO' FROM `tbltable`";
		$mydb->setQuery($sql);
		$row = $mydb->loadSingleResult();

		$tableno = $row->TABLENO  + 1;

		// if(isset($_POST['save'])){


		// if ( $_POST['TABLENO'] == "" ) {
		// 	$messageStats = false;
		// 	message("All field is required!","error");
		// 	redirect('index.php?view=add');
		// }else{	


			$table = New Tables();
			$table->TABLENO	= $tableno;
			$table->create();

			message("New table number created successfully!", "success");
			redirect("index.php");
			
		// }
		// }

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$table = New Tables();
			$table->TABLENO	= $_POST['TABLENO'];
			$table->update($_POST['TABLEID']);

			message("Table number has been updated!", "success");
			redirect("index.php");
		}

	}
	function doReserve(){ 

		// date_default_timezone_set("ASIA/MANILA");
		if (isset($_POST['save'])) {
			# code...
			$table = New Tables(); 
			$table->STATUS	= 'Reserved';
			$table->RESERVEDTIME = $_POST['RESERVEDTIME'];
			$table->CUSTOMER = $_POST['CUSTOMER'];
			$table->update($_POST['TABLEID']); 
			message("Table number has been reserved!", "success");
		}else{
			$table = New Tables(); 
			$table->STATUS	= 'Available';
			$table->RESERVEDTIME = "";
			$table->update($_GET['id']);

			message("Table number has been Available!", "success");

		}
 			

			
			// 	$table = New Tables();
			// // $cur = $table->single_table($_GET['id']);
			// if ($cur->STATUS=='Reserved') {
			// 	# code...
			// 	$table->STATUS	= 'Available';
			// 	$table->RESERVEDTIME = date('h:i:s A');
			// 	$table->update($_GET['id']);

			// 	message("Table number has been Available!", "success");

			// }else{
			// 	$table->STATUS	= 'Reserved';
			// 	$table->RESERVEDTIME = date('h:i:s A');
			// 	$table->update($_GET['id']); 
			// 	message("Table number has been reserved!", "success");
			// }
 
		  redirect("index.php"); 

	}

	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$table = New Tables(); 
			$table->delete($id);

			message("Table number Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>