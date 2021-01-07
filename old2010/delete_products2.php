<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<? 
    include "connect.php";
   $ID_Product= $_GET['ID_Product'];
	
	session_register("ID_Product1");
    $_SESSION["ID_Product1"]=$ID_Product ;
	$num= $_GET['num'];
	session_register("num1");
	
    $_SESSION["num1"]= $num ;


	?>
<script>
var x=window.confirm("คุณต้องการลบข้อมูลใช่หรือไม่")
if (x)
    window.location="delete_products3.php"
</script>
<?
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL= update_products.php\">";
?>