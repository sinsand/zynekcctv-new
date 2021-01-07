<?
include "connect.php";

   $ID_product=$_GET['ID_product'];
   $ID_type=$_POST['select'];
   $ID_brand=$_POST['select2'];
   $code_product=$_POST['code_product'];
   $name_product=$_POST['name_product'];
   $pic_product=$_POST['pic_product'];
   $price_product=$_POST['price_product'];
   $short_descrip1=$_POST['short_descrip'];
   $descrip_product=$_POST['descrip_product'];
   $pdf_file=$_POST['pdf_file'];
   $link_pdf=$_POST['link_pdf'];
   $size_pdf=$_POST['size_pdf'];
   $ID_group=$_POST['select3'];
   $big_pic=$_POST['big_pic'];
   $class=$_POST['select4'];
   $order_product=$_POST['order_product'];
   $promotion=$_POST['promotion'];
   $log_time=$_POST['log_time'];
   $descrip_price=$_POST['descrip_price'];	
   $new_product =$_POST['new_product'];	

$sql = "update zynektec_zynek.Product set ID_type='$ID_type', ID_brand='$ID_brand',code_product='$code_product', name_product='$name_product', pic_product='$pic_product', price_product='$price_product', short_descrip1='$short_descrip1', descrip_product='$descrip_product',pdf_file='$pdf_file',link_pdf='$link_pdf',size_pdf='$size_pdf',ID_group='$ID_group',big_pic='$big_pic',class='$class', order_product='$order_product', promotion='$promotion', log_time=NOW(), descrip_price='$descrip_price', new_product='$new_product' where ID_product='$ID_product'"; 
echo $sql;
mysql_query("SET CHARACTER SET utf8"); 	 
	 //echo  $sql;
//$result=mysql_db_query($dbname,$sql);
   
   
   

$ID_Product =$_GET['ID_Product'];
$sql="select * from Product where ID_product ='$ID_Product' ";
mysql_query("SET CHARACTER SET utf8"); 
$result=mysql_db_query($dbname,$sql);
while($rows=mysql_fetch_array($result)){
$code_product=$rows['code_product'];
$name_product=$rows['name_product'];
$price_product=$rows['price_product'];
$descrip_price = $rows['descrip_price'];
	 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QNAP NVR, IP Camera, เน็ตบุ๊ก, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<meta name="keywords" content="QNAP NVR , IP Camera , Netbook , Projcector , Computer, PABX ,LCD TV" />
<meta name="description" content="จำหน่ายเครื่องบันทึก QNAP NVR สำหรับ IP Camera สินค้าไอทีทุกชนิด ตู้สาขา&โทรศัพท์ โปรเจ็คเตอร์ LCD TV" />
<link rel="stylesheet" href="style.css">
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="920" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td colspan="4"><div align="center">
          <? include "head_admin.php" ?>
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="43" valign="top">&nbsp;</td>
        <td width="857" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="10">&nbsp;</td>
        <td colspan="2" valign="top">&nbsp;</td>
        <td width="10">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><div align="center">
          <? include "bottom.php"; ?>
        </div></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>
