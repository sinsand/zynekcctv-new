<?
@session_start();
		include "connect.php";
		$ID_Product = $_SESSION["ID_Product1"];
	 $num =$_SESSION["num1"];
	$sql ="DELETE FROM `Product` WHERE `Product`.`ID_product` = '$ID_Product'";
	mysql_query("SET CHARACTER SET utf8");
	$result = mysql_db_query($dbname, $sql);
			switch($num){
			case 1 : $location= "descrip_computer";
			break;
			case 11 : $location= "descrip_panaboard";
			break;
			case 12 : $location= "descrip_projector";
			break;
			case 14 : $location= "descrip_camera";
			break;
		}
		
	$sql1 ="DELETE FROM `$location` WHERE `$location`.`ID_product` = '$ID_Product'";
	mysql_query("SET CHARACTER SET utf8");
	$result = mysql_db_query($dbname, $sql1);
	
	
	session_unregister($ID_Product1);
unset($_SESSION['ID_Product1']);
session_destroy();
	
		
		$sql2="SELECT * FROM Product where `Product`.`ID_product` = '$ID_Product'";
	    mysql_query("SET CHARACTER SET utf8");
	    $result=mysql_db_query($dbname, $sql2);	  
        $numrow=mysql_num_rows($result);
			if   (($numrow<=0)){
	?>
				<script type="text/javascript">
					alert('ลบข้อมูลแล้ว')
					
	           </script> 
	<? 
	
    echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=delete_products1.php \">";
	}else{
		?>
				<script type="text/javascript">
					alert('ไม่สามารถลบข้อมูลได้กรุณาติดต่อ Web Master')				 
				</script> 
				
	<?
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL= delete_products1.php\">";
	}
?>