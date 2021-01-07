<SCRIPT language="JavaScript">
function submitform()
{
  document.form1.submit();
}
</SCRIPT> 


<?
  function search_dealer1(){ 
   @session_start();
   include "connect.php";
   $num=1;
   $i=1;
$sql = "SELECT * FROM temp_dealer  " ;
mysql_query("SET CHARACTER SET utf8");
$result=mysql_db_query($dbname, $sql);	
while($rows=mysql_fetch_array($result)){
$ID_temp_dealer = $rows['ID_temp_dealer'];
$username = $rows['username'];
$company = $rows['company'];
$province= $rows['province'];
$name_sales = $rows['name_sales'];
$pana = $rows['pana'];
$delear_QNAP = $rows['delear_QNAP'];
$group_member = $rows['group_member'];



 //-------------------------------------------


       echo "<tr bgcolor=\"#FFFF99\">";
       echo "<td><span class=\"style77\"><div align=\"center\">$num</div></span></td>";
       echo "<td height=\"30\"><span class=\"style77\">$username</span></td>";
       echo "<td><span class=\"style77\">$company</span></td>";
       echo "<td height=\"30\"><span class=\"style77\">$province</span></td>";
       echo "<td class=\"style80\">";
       echo "<select name=\"name_sales".$i."\">";
       echo "<option value=\"1\"";
	   if ($name_sales=='1'){echo "selected=\"selected\"";}
	   echo ">Sale โก้</option>";
	   
	   echo "<option value=\"2\"";
	   if ($name_sales=='2'){echo "selected=\"selected\"";}
	   echo ">Sale ตี่</option>";
	   
	   echo "<option value=\"3\"";
	   if ($name_sales=='3'){echo "selected=\"selected\"";}
	   echo ">Sale บอย</option>";
	   
	   echo "<option value=\"6\"";
	   if ($name_sales=='6'){ echo "selected=\"selected\"";}
	   echo ">Sale หนุ่ม</option>";
	   
	   echo "<option value=\"4\"";
	   if ($name_sales=='4'){ echo "selected=\"selected\"";}
	   echo ">Sale นุช</option>";
	   
	   echo "<option value=\"5\"";
	   if ($name_sales=='5'){echo "selected=\"selected\""; }
	   echo ">Sale ส่วนกลาง</option>";
	   echo "</select>";
	   
       echo "</td>";
       echo "<td height=\"30\">";
       echo "<select name=\"group_member".$i."\">";
	   echo "<option value=\"1\"";
	   if ($group_member=='A'){echo "selected=\"selected\"";}
	   echo ">กลุ่ม Platinum</option>";
	   
	   echo "<option value=\"2\"";
	   if ($group_member=='B'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Gold</option>";
	   
	   echo "<option value=\"3\"";
	   if ($group_member=='C'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Silver</option>";
	
	   echo "<option value=\"4\"";
	   if ($group_member=='D'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Basic</option>";
	   	   
	   echo "<option value=\"5\"";
	   if ($group_member=='N'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Newdealer</option>";
	   
	   echo "<option value=\"6\"";
	   if ($group_member=='T'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Temp</option>";
	
	   echo "<option value=\"7\"";
	   if ($group_member=='F'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Non Active</option>";

	   echo "<option value=\"8\"";
	   if ($group_member=='R'){ echo "selected=\"selected\"";}
	   echo ">กลุ่ม Delete</option>";
	   	      	   
       echo "</select>";
       echo "</td>";
       echo "<td height=\"30\">";
       echo "<div align=\"center\">";
       echo "<input type=\"checkbox\" name=\"pana".$i."\" value=\"1\" ";
	   if ($pana=='1'){ echo "checked=\"checked\" ";}
	   echo "/> ";                 
       echo "</div></td>";
       echo "<td height=\"30\">";
       echo "<div align=\"center\">";
       echo "<input type=\"checkbox\" name=\"delear_QNAP".$i."\" value=\"1\" ";
	   if ($delear_QNAP =='1'){ echo "checked=\"checked\" "	   ;}
	   echo "/> ";   
       echo "</div>";
       echo "</td>";
       echo "</tr>";
	   
 $i++;	

 $num++;
}

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCTV , กล้องวงจรปิด , ระบบกล้องวงจรปิด , โทรทัศน์กล้องวงจรปิด , ทีวีกล้องวงจรปิด  ,  สินค้าและอุปกรณ์ไอทีครบวงจร</title>
<meta name="description" content="Zynek ตัวแทนจำหน่าย CCTV กล้องวงจรปิด avtech โทรทัศน์กล้องวงจรปิด ทีวีกล้องวงจรปิ ระบบกล้องวงจรปิด และอุปกรณ์ไอทีครบวงจร">
<meta name="keywords" content="กล้องวงจรปิด,cctv,avtech,โทรทัศน์กล้องวงจรปิด,ทีวีกล้องวงจรปิด,ระบบกล้องวงจรปิด,กล้องวงจรปิด,cctv system">
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
  
   <div align="center"><form id="form2" name="form2" method="post" action="update_group2.php?num=<? echo $num ?>  ">
          <table width="908" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="25" colspan="8" align="right"><table width="908" border="0" cellpadding="4" cellspacing="1">
                  <tr bgcolor="#FFFF99">
                    <td width="34" class="style10"><div align="center" class="style10">ลำดับ</div></td>
                    <td width="54" height="30" class="style10"><div align="center" class="style10">รหัส</div></td>
                    <td width="322" class="style10"><div align="center" class="style10" >ชื่อ</div></td>
                    <td width="92" height="30" class="style10"><div align="center" class="style10">จังหวัด</div></td>
                    <td width="99" class="style10"><div align="center" class="style10">sales</div></td>
                    <td width="119" height="30" class="style10"><div align="center" class="style10">ประเภท</div></td>
                    <td width="69" height="30" class="style10"><div align="center" class="style10" >ตัวแทน Panasonic </div></td>
                    <td width="46" height="30" class="style10"><div align="center" class="style80" >
                        <div align="center" class="style10"> ตัวแทน QNAP </div>
                    </div></td>
                  </tr>
                  <?		 
				  search_dealer1() ;
				  ?>
                </table></td>
              </tr>
              <tr>
                <td width="325" height="25" align="right">&nbsp;</td>
                <td width="18" height="25"><div align="right"></div></td>
                <td height="25" colspan="5" align="left"><div align="right"></div></td>
                <td width="560" align="left"><div align="right">
                  <input type="submit" name="Submit2" value="Submit" />
&nbsp;                </div></td>
              </tr>
            </table> 
        </form>
       
  </div>

</body>
</html>
