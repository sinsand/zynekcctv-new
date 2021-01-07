<?
@session_start();
include "connect.php";
$sql="SELECT * FROM descrip_camera where ID_product = '$ID_product1' " ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$processor=$row['processor'];
$lens=$row['lens'];
$shutter=$row['shutter'];
$focus=$row['focus'];
$light=$row['light'];
$lcd=$row['lcd'];
$flash=$row['flash'];
$animation=$row['animation'];
$memory=$row['memory'];
$file_connect=$row['file_connect'];
$other=$row['other'];


}





?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ขายเน็ตบุ๊ค, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="691" border="0" cellpadding="4" cellspacing="1">
    <tr>
      <td bgcolor="#FFFFFF" class="style1">หน่วยประมวณผล</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $processor ;?></td>
    </tr>
    <tr>
      <td width="214" bgcolor="#FFFFFF" class="style1">เลนส์ </td>
      <td width="458" bgcolor="#FFFFFF" class="style3"><? echo $lens ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ชัตเตอร์ </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $shutter ;?></td>
    </tr>
    
    <tr>
      <td bgcolor="#FFFFFF" class="style1">การโฟกัส</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $focus ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ระบบเกี่ยวกับแสง</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $light ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ช่องมองภาพและ LCD </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $lcd ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">แฟลช</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $flash ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ภาพเคลื่อนไหว </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $animation ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">หน่วยความจำ</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $memory ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ไฟล์และการเชื่อมต่อ</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $file_connect ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">อื่นๆ </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $other ;?></td>
    </tr>
  </table>
</form>
</body>
</html>
