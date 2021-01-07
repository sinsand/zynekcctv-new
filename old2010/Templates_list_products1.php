<?
include "connect.php";
$type =$_GET['type'];
$i=1;
$n=1;
//-----------------------------------------------------------------------------
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
//-----------------------------จบ---------------------------------------------
$sql="SELECT DISTINCT ID_brand FROM Product where ID_type = '$type' order by order_product" ;

mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$ID_brand[$i] =$row['ID_brand'];


//---------------------------เริ่ม select brand ในตาราง brand_product---------------------------------------

$sql1="SELECT DISTINCT name_brand FROM brand_product where ID_brand = '$ID_brand[$i]' " ;

mysql_query("SET CHARACTER SET utf8");   
$result1=mysql_db_query($dbname, $sql1);
$num_row1= mysql_num_rows($result1);
while($row1=mysql_fetch_array($result1)){
$name_brand[$n] = $row1['name_brand'];
$n++;
}

}
//-------------------------------------เริ่มหา class ----------------

$sql="SELECT DISTINCT class FROM Product where ID_type = '$type'  order by class " ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$class[$i] =$row['class'];
//---------------------------เริ่ม select brand ในตาราง brand_product---------------------------------------

$sql1="SELECT name_class FROM class_product where ID_class = '$class[$i]'" ;
mysql_query("SET CHARACTER SET utf8");   
$result1=mysql_db_query($dbname, $sql1);
$num_row1= mysql_num_rows($result1);
while($row1=mysql_fetch_array($result1)){
$name_class[$i] = $row1['name_class'];
}
//---------------------------จบ select brand ในตาราง brand_product--------------------------------------
$i++;
}
//---------------------จบ select brand ในตาราง Product -----------------------


function show_product($num1){
include "connect.php";
$type =$_GET['type'];
$ID_brand =$num1;
$n=1;
$sql2="SELECT * FROM Product where ID_type = '$type'and class='$num1' order by order_product " ;

mysql_query("SET CHARACTER SET utf8");   
$result2=mysql_db_query($dbname, $sql2);
$num_row1= mysql_num_rows($result2);
while($row2=mysql_fetch_array($result2)){
$ID_product[$n]=$row2['ID_product'];
$code_product[$n]=$row2['code_product'];
$short_descrip[$n] =$row2['short_descrip'];
$price_product[$n] =$row2['price_product'];
$class[$n] =$row2['class'];
$new_product[$n]=$row2['new_product'];
$n++;
}

	for ($num=1;$num<=$num_row1;$num++){ 
               echo "<tr>";
                 if($new_product[$num]==1){
                  echo "<td bgcolor=\"#E7FFCE\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" >$code_product[$num]</a> <img src=\"images/icon_newblue.gif\"  border=\"0\" /></td>";
				  }else{
				   echo "<td bgcolor=\"#E7FFCE\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" >$code_product[$num]</a></td>";
				  }
                  echo "<td bgcolor=\"#E7FFCE\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" >$short_descrip[$num]</a></td>";
                  echo "<td bgcolor=\"#E7FFCE\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" ><div align=\"right\">$price_product[$num]</div></a></td>";
               echo "</tr>";
			   $num++;
			   if($num<=$num_row1){
			   
			  
			        echo "<tr>";
               if($new_product[$num]==1){
                  echo "<td bgcolor=\"#FFFFDF\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" >$code_product[$num]</a> <img src=\"images/icon_newblue.gif\"  border=\"0\" /></td>";
				  }else{
				   echo "<td bgcolor=\"#FFFFDF\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" >$code_product[$num]</a></td>";
				  }
					
                  echo "<td bgcolor=\"#FFFFDF\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" >$short_descrip[$num]</a></td>";
                  echo "<td bgcolor=\"#FFFFDF\" class=\"style3\"><a href=\"Templates_descrip.php?ID_product=$ID_product[$num]&&type=$type\" target=\"_blank\" ><div align=\"right\">$price_product[$num]</div></a></td>";
               echo "</tr>";
				} 
 }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สินค้าหมวด <? echo $Name_type ;?> : ขายเน็ตบุ๊ค, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<form name="form1" method="post" action="">
<div align="center">
  <table width="901" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="14" colspan="6" bgcolor="#FFFFFF"><? include "head.php" ?></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><? include "menu_left.php" ?></td>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><table width="708" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="5"><span class="style16">สินค้า &gt;&gt; หมวด <? echo $group ?> &gt;&gt; <? echo $Name_type ?> </span></td>
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
            <td width="10" rowspan="3" background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top" >
              <table width="690" border="0" cellpadding="0" cellspacing="0" >
              <tr valign="top">
                <td width="671" bgcolor="#FFFFFF" valign="top"><table width="690" border="0" cellpadding="3" cellspacing="1" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
                  <tr valign="top">
                    <td width="92" bgcolor="#D3FFA8" class="style10"><div align="center">Stock Code</div></td>
                    <td width="494" bgcolor="#D3FFA8" class="style10"><div align="center"><span class="style10">DESCRIPTION</span></div></td>
                    <td width="76" bgcolor="#D3FFA8" class="style10"><div align="center">Price</div></td>
                  </tr>
				     <tr>
                    <td colspan="3" bgcolor="#F2FFE6" class="style5"><strong>
                      <? 
					   echo $name_brand[1] ; ?>
                    </strong></td>
                    </tr>
                 <?  if($name_class[1] != ""){ 
				  echo "<tr>";
                    echo " <td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      
					
					   echo $name_class[1] ;
					 
                     
                    echo " </strong></td>";
                   echo "  </tr>";  
				    }?>
					     <? 
				show_product($class[1]);
				if($num_row >= '2'){
                echo "<tr>";
                  echo "<td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      echo $name_class[2];
                  echo "</strong></td>";
                echo "</tr>";
				
				show_product($class[2]);
					}if($num_row >= '3'){
                echo "<tr>";
                  echo "<td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      echo $name_class[3] ;
                  echo "</strong></td>";
                echo "</tr>";
				show_product($class[3]);
					}if($num_row >= '4'){
                echo "<tr>";
                  echo "<td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      echo $name_class[4] ;
                  echo "</strong></td>";
                echo "</tr>";
				show_product($class[4]);
			       }if($num_row >= '5'){
                echo "<tr>";
                  echo "<td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      echo $name_class[5] ;
                  echo "</strong></td>";
                echo "</tr>";
				show_product($class[5]);
					}if($num_row >= '6'){
                echo "<tr>";
                  echo "<td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      echo $name_class[6] ;
                  echo "</strong></td>";
                echo "</tr>";
				show_product($class[6]);
					}if($num_row >= '7'){
                echo "<tr>";
                  echo "<td colspan=\"3\" bgcolor=\"#F2FFE6\" class=\"style5\"><strong>";
                      echo $name_class[7] ;
                  echo "</strong></td>";
                echo "</tr>";
				show_product($class[7]);
				}
				 ?>
                </table></td>
              </tr>
            </table></td>
            <td width="11" rowspan="3" background="images/line_newproduct_rigth.gif" ><img src="images/line_newproduct_rigth.gif" width="11" height="25" /></td>
          </tr>
          
          <tr>
            <td colspan="3" >&nbsp;</td>
          </tr>
          
          <tr>
            <td width="207" valign="top"><div align="center"></div></td>
            <td width="6"  valign="top">&nbsp;</td>
            <td width="477"><div align="center"></div></td>
          </tr>
          
          <tr>
            <td colspan="5" valign="top"><img src="images/line_bottom_new.gif" width="711" height="15" /></td>
          </tr>
          <tr>
            <td colspan="5" valign="top"><span class="style4">**</span>บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงราคา และของแถมโดยมิต้องแจ้งให้ทราบล่วงหน้า และสงวนสิทธิ์ในความรับผิดชอบใดๆ อันเนื่องจากข้อผิดพลาดในการพิมพ์ (ผิด/ตก) ไม่ว่ากรณีใดๆ ก็ตาม </td>
          </tr>
          
      </table></td>
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
      <td width="17" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="182" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="141" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="195" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="374" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
