<?
include "connect.php";
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
        <td width="857" valign="top"><img src="images/admin_price.jpg" width="209" height="30" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="10">&nbsp;</td>
        <td colspan="2" valign="top"><div align="center">
          <table width="753" border="0" cellpadding="0" cellspacing=" ">
              <tr>
                <td>&nbsp;</td>
                <td class="style3">&nbsp;</td>
                <td class="style3">&nbsp;</td>
              </tr>
            <tr>
                <td width="122" height="23">&nbsp;</td>
                <td width="139" height="23" class="style3"><label>ID สินค้า : </label></td>
                <td width="634" height="23" class="style3"><input type="text" name="ID_Product"  value="<? echo $ID_Product ?>" disabled="disabled"/></td>
              </tr>
              <tr>
                <td height="23">&nbsp;</td>
                <td height="23" class="style3">รหัสสินค้า : </td>
                <td height="23" class="style3"><input type="text" name="code_product"  value="<? echo $code_product ?>" disabled="disabled"/></td>
              </tr>
            <tr>
                <td height="23">&nbsp;</td>
                <td height="23" class="style3">ชื่อสินค้า : </label></td>
                <td height="23" class="style3"><input name="name_product" type="text" value="<? echo $name_product ?>" disabled="disabled" size="60" /></td>
              </tr>
              <tr>
                <td height="23">&nbsp;</td>
                <td height="23" class="style3"><label>ราคาสินค้า : </label></td>
                <td height="23" class="style3"><input type="text" name="price_product" value="<? echo $price_product ?>"/> 
                <span class="style2">( เช่น 32,568.-  หรือ 102,012.50 ) </span></td>
              </tr>
              <tr>
                <td height="23">&nbsp;</td>
                <td height="23">รายละเอียดราคา : </td>
                <td height="23"><label>
                  <input name="textfield" type="text" value="<? echo $descrip_price ?>" size="60" />
                </label></td>
              </tr>
              <tr>
                <td height="13">&nbsp;</td>
                <td height="13">&nbsp;</td>
                <td height="13"> (เช่น ราคานี้ยังไม่รวม VAT, ค่าขนส่ง, และบริการ )</td>
              </tr>
              <tr>
                <td height="23">&nbsp;</td>
                <td height="23">&nbsp;</td>
                <td height="23"><label>
                  <input type="submit" name="Submit" value="ตกลง" />
                  </label>
                  <label>
                  <input type="submit" name="Submit2" value="ยกเลิก" />
                </label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
                  </table>
        </div></td>
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
