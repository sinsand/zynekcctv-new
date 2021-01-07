<?
include "connect.php";
$type =$_GET['type'];
$class =$_GET['class'];
if (($type>=1)&&($type<=8)){
$group = "IT Products";
}if (($type>=9)&&($type<=11)||($type==16)){
$group = "OA & Communication";
}if (($type>=12)&&($type<=15)){
$group = "AV Product";
}
switch($type)
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

function show_product($num1){
include "connect.php";
$type =$_GET['type'];
$i=1;
$sql="SELECT * FROM Product where ID_type = '$type' order by order_product " ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$ID_product[$i]=$row['ID_product'];
$ID_type[$i]=$row['ID_type'];
$ID_brand[$i]=$row['ID_brand'];
$name_product[$i]=$row['name_product'];
$pic_product[$i]=$row['pic_product'];
$price_product[$i]=$row['price_product'];
$descrip_product[$i]=$row['descrip_product'];
$link_pdf[$i]=$row['link_pdf'];
$timestamp_log[$i]=$row['timestamp_log'];
$ID_group[$i]=$row['ID_group'];
$pic_L[$i]=$row['big_pic'];
$descrip_price[$i]=$row['descrip_price'];
$i=$i+1;
} 
switch($ID_group[i])
{
case "1":
$group = "IT Products";
break;
case "2":
$group = "OA & Communication";
break;
case "3":
$group = "AV Product";
break;
}

$sql_type="SELECT * FROM type_product where ID_type = '$ID_type[i]' " ;
mysql_query("SET CHARACTER SET utf8");  
$result1=mysql_db_query($dbname, $sql_type);
$num_row1= mysql_num_rows($result);
while($row1=mysql_fetch_array($result1)){
$Name_type=$row1['Name_type'];
$pic_type=$row1['pic_type'];
}

if ($num_row >= $num1){
echo "<table width=\"678\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr>";
echo "<td width=\"206\" valign=\"top\" ><table width=\"250\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr>";
echo "<td width=\"205\"><div align=\"center\"><br><a href=\"$pic_L[$num1]\" target=\"_blank\" ><img src=\"$pic_product[$num1]\" border=\"0\"/></a></div></td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td ><span class=\"style30\"><div align=\"center\">ราคาพิเศษ : $price_product[$num1]</div></span></td>";
echo "</tr>";
echo "<tr>";
echo "<td ><div align=\"center\"><span class=\"style2\">$descrip_price[$num1]</span></div></td>";
echo "</tr>";
echo "<tr>";
echo "<td ><div align=\"center\"><span class=\"style4\">";
if ($link_pdf[$num1]==""){
echo "</div></span></td>";
}else{
echo "<strong>***</span><a href=\"$link_pdf[$num1]\" target=\"_blank\" >รายละเอียดเพิ่มเติม</a><span class=\"style4\"><strong>***</span></strong></div></td>";
}
echo "</tr>";
echo "</table></td>";
echo "<td><table width=\"412\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td><span class=\"style3\"><strong> $name_product[$num1]</strong></span></td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td> $descrip_product[$num1]</td>";
echo "</tr>";
echo "</table></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=\"2\" ><div align=\"center\">";

if ($num_row > $num1){
echo "<br><img src=\"images/dot_line_horizonatal.gif\" width=\"684\" height=\"5\" /></div></td>";
}else{
echo " </div></td>";
}
echo "</tr>";
echo "</table>";

}


}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สินค้าหมวด <? echo $Name_type ;?> : ขายเน็ตบุ๊ค, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<link rel="stylesheet" href="style1.css">

</head>

<body>
<form id="form1" name="form1" method="post" action="">
 <div align="center">
   <table width="901" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
      <td height="14" colspan="6" bgcolor="#FFFFFF"><? include "head.php" ?></td>
      </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><? include "menu_left.php" ?></td>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><table width="711" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="5"><span class="style16">สินค้า &gt;&gt; หมวด <? echo $group ?> &gt;&gt;
              <? echo $Name_type ?> 
              </span></td>
            </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
            </tr>
          
          <tr>
            <td colspan="5"><img src="images/line_newproduct.gif" width="711" height="13" /></td>
            </tr>
          
          <tr>
            <td width="10" rowspan="6" background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top" ><div align="center"><?  show_product(1); ?></div></td>
            <td width="11" rowspan="6" background="images/line_newproduct_rigth.gif" ><img src="images/line_newproduct_rigth.gif" width="11" height="25" /></td>
          </tr>
          <tr>
            <td colspan="3"  align="center"><div align="center"><?  show_product(2); ?></div></td>
          </tr>
          <tr>
            <td colspan="3"  align="center"><div align="center"><?  show_product(3); ?></div></td>
          </tr>
          <tr>
            <td colspan="3"  align="center"><div align="center"><?  show_product(4); ?></div></td>
            </tr>
          <tr>
            <td colspan="3" valign="top" ><div align="center"><?  show_product(5); ?></div></td>
            </tr>
          <tr>
            <td colspan="3" valign="top"><div align="center"><?  show_product(6); ?></div></td>
            </tr>
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td colspan="3" valign="top"><div align="center"><?  show_product(7); ?></div></td>
              <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
            </tr>
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top"><div align="center">
              <?  show_product(8); ?>
            </div></td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top"><div align="center">
              <?  show_product(9); ?>
            </div></td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top"><div align="center">
              <?  show_product(10); ?>
            </div></td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
                  
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td width="207" valign="top">&nbsp;</td>
              <td width="6"  valign="top"></td>
              <td width="477"><div align="right" class="style16"></div></td>
              <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
            </tr>
          
          <tr>
            <td colspan="5"><img src="images/line_bottom_new.gif" width="711" height="15" /></td>
            </tr>
        </table></td></tr>
    
    <tr>
      <td width="17" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="182" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
      <td colspan="3" bgcolor="#FFFFFF"><span class="style4">**</span>บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงราคา และของแถมโดยมิต้องแจ้งให้ทราบล่วงหน้า และสงวนสิทธิ์ในความรับผิดชอบใดๆ อันเนื่องจากข้อผิดพลาดในการพิมพ์ (ผิด/ตก) ไม่ว่ากรณีใดๆ ก็ตาม </td>
      </tr>
    <tr>
      <td colspan="6" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" bgcolor="#FFFFFF"><div align="center">
        <? include "bottom.php"; ?>
      </div></td>
      </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td width="141" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="195" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="374" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
