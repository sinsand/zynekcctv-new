 <?
 @session_start();
 function search($xxx) {
	include "connect.php";
	$num='1';
    $text_search=$_POST['text_search'];
	$Id_text =$_POST['Id_text'];
    $sql= "SELECT ID_product, code_product, name_product,ID_type, price_product  FROM Product where name_product like '%".$text_search."%' && code_product like '%".$Id_text."%' order by ID_type ";
	mysql_query("SET CHARACTER SET utf8"); 
    $result=mysql_db_query($dbname, $sql);
	$numrow=mysql_num_rows($result);
	if ($xxx == 1){
    while($rows=mysql_fetch_array($result)){
    $ID_product=$rows['ID_product'];
	$code_product=$rows['code_product'];
    $name_product=$rows['name_product'];
 	$ID_type=$rows['ID_type'];
	$price_product=$rows['price_product'];
	switch($ID_type)
{
case "1":
$Name_type = "คอมพิวเตอร์";
break;
case "2":
$Name_type = "โน้ตบุ๊ค";
break;
case "3":
$Name_type = "เน็ตบุ๊ค";
break;
case "4":
$Name_type = "เซิร์ฟเวอร์";
break;
case "5":
$Name_type = "ปริ้นเตอร์";
break;
case "6":
$Name_type = "อุปกรณ์เน็ตเวิร์ค";
break;
case "7":
$Name_type = "ซอฟต์แวร์";
break;
case "8":
$Name_type = "อื่นๆ";
break;
case "9":
$Name_type = "แฟ็กซ์";
break;
case "10":
$Name_type = "ตู้สาขาโทรศัพท์";
break;
case "11":
$Name_type = "พานาบอร์ด";
break;
case "12":
$Name_type = "โปรเจ็คเตอร์";
break;
case "13":
$Name_type = "แอลซีดี ทีวี";
break;
case "14":
$Name_type = "กล้องดิจิตอล";
break;
case "15":
$Name_type = "ระบบเสียงห้องประชุม";
break;
case "16":
$Name_type = "IP Camera & NVR";
break;
}
   	echo "<tr>";
					echo "<td height=\"20\" bgcolor=\"#FFFF99\" ><div align=\"center\"> <span class=\"style3\">$num</span></div></td>";
					echo "<td height=\"20\" bgcolor=\"#FFFF99\" ><div align=\"left\"> <a href=\"delete_products2.php?ID_Product=$ID_product&&num=$ID_type\" target=\"_parent\" ><span class=\"style3\">$code_product</span></a></div></td>";
					echo "<td height=\"20\" bgcolor=\"#FFFF99\" ><div align=\"center\"><a href=\"delete_products2.php?ID_Product=$ID_product&&num=$ID_type \" target=\"_parent\" > <span class=\"style3\">$Name_type</span></a></div></td>";
					echo "<td height=\"20\" bgcolor=\"#FFFF99\" align=\"left\"><a href=\"delete_products2.php?ID_Product=$ID_product&&num=$ID_type \" target=\"_parent\" ><span class=\"style3\">$name_product</span></a></td>";
					echo "<td height=\"20\" bgcolor=\"#FFFF99\" align=\"left\"><div align=\"right\"><a href=\"delete_products2.php?ID_Product=$ID_product&&num=$ID_type \" target=\"_parent\" ><span class=\"style3\">$price_product</span></a></div></td>";
					echo "</tr>\n"; 
                 $num++;	
	}	
		}
		
	if ($xxx == 2){
	echo $numrow;
}	
		
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการเว็บ Zynektechnologies : Delete Products</title>
<link rel="stylesheet" href="style.css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style7 {font-family: Tahoma; font-size: 13px; color: #000000}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
<center>
  <table width="920" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="3"><? include "head_admin.php" ?></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center"></div></td>
      </tr>
    <tr>
      <td width="11">&nbsp;</td>
      <td width="898"><table width="895" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25" colspan="2" class="style7"><div align="center">
              <table width="650" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="57" class="style11">&nbsp;</td>
                  <td width="114" class="style11">ค้นหารหัสสินค้า : </td>
                  <td width="479"><input name="Id_text" type="text" id="Id_text" size="40" /></td>
                </tr>
                <tr>
                  <td class="style11">&nbsp;</td>
                  <td class="style11">ค้นหาชื่อสินค้า : </td>
                  <td><div align="left">
                    <input name="text_search" type="text" id="text_search" size="40" />
                      <input type="submit" name="button" id="button" value="ค้นหา" onclick="submitform()" />
                  </div></td>
                </tr>
              </table>
          </div></td>
        </tr>
        <tr>
          <td width="45" height="25" class="style7">&nbsp;</td>
          <td width="850" height="25" class="style7">แสดงรายชื่อทั้งหมดที่หาเจอ
            <? search(2); ?></td>
        </tr>
        <tr>
          <td height="25" colspan="2"><div align="center">
              <table width="850" border="0" cellpadding="4" cellspacing="1">
                <tr>
                  <td width="52" height="23" bgcolor="#FEEC6B" align="center"><div align="center"><span class="style7">ลำดับที่</span></div></td>
                  <td width="95" bgcolor="#FEEC6B" align="center"><div align="center"><span class="style7">รหัสสินค้า</span></div></td>
                  <td width="117" align="center" bgcolor="#FEEC6B" class="style7"><div align="center">ประเภทสินค้า</div></td>
                  <td width="460" align="center" bgcolor="#FEEC6B" class="style7"><div align="center">ชื่อสินค้า</div></td>
                  <td width="80" align="center" bgcolor="#FEEC6B"><div align="center" class="style7">ราคา</div></td>
                </tr>
                <?
	  search(1);
	  ?>
              </table>
          </div></td>
        </tr>
        <tr>
          <td height="25" colspan="2"></td>
        </tr>
      </table></td>
      <td width="11">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</center>
</form>

</body>
</html>
