<?
@session_start();
include "connect.php";
$type =$_GET['type'];
$ID_product =$_GET['ID_product'];

session_register('ID_product1');
$_SESSION["ID_product1"] = $ID_product;
$aaa=$_SESSION["ID_product1"] ;

$sql="SELECT * FROM Product where ID_product = '$ID_product'" ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$ID_product=$row['ID_product'];
$ID_type=$row['ID_type'];
$ID_brand=$row['ID_brand'];
$name_product=$row['name_product'];
$pic_product=$row['pic_product'];
$price_product=$row['price_product'];
$descrip_product=$row['descrip_product'];
$link_pdf=$row['link_pdf'];
$timestamp_log=$row['timestamp_log'];
$ID_group=$row['ID_group'];
$pic_L=$row['big_pic'];
$i=$i+1;
} 
switch($ID_group)
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

$sql_type="SELECT * FROM type_product where ID_type = '$ID_type'" ;
mysql_query("SET CHARACTER SET utf8");  
$result1=mysql_db_query($dbname, $sql_type);
$num_row1= mysql_num_rows($result);
while($row1=mysql_fetch_array($result1)){
$Name_type=$row1['Name_type'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สินค้าหมวด <? echo $name_product; ?> : ขายเน็ตบุ๊ค, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<link rel="stylesheet" href="style.css">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
 <div align="center">
   <table width="901" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
      <td height="14" colspan="6" bgcolor="#FFFFFF"><? include "head.php" ?></td>
      </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><? include "menu_left.php" ?></td>
      <td colspan="3" valign="top" bgcolor="#FFFFFF">
        <table width="708" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="5"><span class="style16">สินค้า &gt;&gt; หมวด <? echo $group ?> &gt;&gt;
  <? echo "<a href=\"Templates_list_products.php?type=$type\" >$Name_type</a>" ?>  &gt;&gt; <? echo "<a href=\"#\" >$name_product</a>"; ?></span></td>
            </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5"><img src="images/line_newproduct.gif" width="711" height="13" /></td>
            </tr>
          
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td width="265" valign="top"><div align="center">
              <table width="225" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="center"><? echo "<a href=\"$pic_L\" target=\"_blank\" ><img src=\"$pic_product\" border=\"0\"/></a>" ?></div></td>
                </tr>
                <tr>
                  <td class="style30"><div align="center">ราคาพิเศษ : <? echo $price_product; ?></div></td>
                </tr>
                <tr>
                  <td><div align="center" >ราคานี้ยังไม่รวม VAT, ค่าขนส่ง, และบริการ</div></td>
                </tr>
                <tr>
                  <td class="style3">
				 <? if ($link_pdf==''){
				 echo "";
				 }else{ 
				  echo "<div align=\"center\"><strong><span class=\"style4\">***</span><a href=\"$link_pdf\" target=\"_blank\" >รายละเอียดเพิ่มเติม</a><span class=\"style4\">***</span></strong></div>";
				  }
				  
				  ?>				  </td>
                </tr>
              </table>
            </div></td>
            <td width="18"  valign="top">&nbsp;</td>
            <td width="407"><div align="center">
              <table width="407" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong><? echo $name_product; ?></strong></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><? echo $descrip_product?></td>
                </tr>
                <tr>
                  <td><? 
				  $sql="SELECT * FROM promotion where ID_product = '$ID_product'" ;
					mysql_query("SET CHARACTER SET utf8");   
					$result=mysql_db_query($dbname, $sql);
					$num_row= mysql_num_rows($result);
					while($row=mysql_fetch_array($result)){
					$descrip_promotion=$row['descrip_promotion'];
				  }
				  if ($num_row >=1){
				  echo "<span class=\"style10\">โปรโมชั่น</span><span class=\"style3\"> แถมฟรี</span><br>";
				  echo "<span class=\"style2\">$descrip_promotion</span>";
				  
				  }
				  ?></td>
                </tr>
              </table>
            </div></td>
            <td width="11" background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
     
        
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td  valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#CCCCCC"><span class="style32">&nbsp;Specifications</span>              <?
			if ($type==12){
			 include "descrip_project.php"; 
			}if ($type==14){
			 include "descrip_camera.php"; 
			}if ($type==11){
			 include "descrip_panaboard.php"; 
			}if (($type==2)||($type==3)){
			 include "descrip_computer.php"; 
			}
			 
			 
			 
			 ?></td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top"><span class="style3">
			 <?
			if (($type==14)||($type==12)||($type==11)||($type==2)||($type==3)){
			 echo "";

			}else echo " &nbsp;ไม่มีข้อมูล"; 
			?></span>			</td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          


          
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td  valign="top">&nbsp;</td>
            <td><div align="right" class="style16"></div></td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" valign="top"><img src="images/line_bottom_new.gif" width="711" height="15" /></td>
            </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td colspan="4" ><span class="style4">**</span>บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงราคา และของแถมโดยมิต้องแจ้งให้ทราบล่วงหน้า และสงวนสิทธิ์ในความรับผิดชอบใดๆ อันเนื่องจากข้อผิดพลาดในการพิมพ์ (ผิด/ตก) ไม่ว่ากรณีใดๆ ก็ตาม </td>
            </tr>
          <tr>
            <td width="10">&nbsp;</td>
            <td colspan="2" >&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table></td></tr>
    
    <tr>
      <td width="17" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="182" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="141" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="195" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="374" bgcolor="#FFFFFF">&nbsp;</td>
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
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
