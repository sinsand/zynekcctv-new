<?
@session_start();
include "connect.php";
$sql="SELECT * FROM descrip_panaboard where ID_product = '$ID_product1' " ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$ID_panaboard=$row['ID_panaboard'];
$ID_product=$row['ID_product'];
$data_pana=$row['data_pana'];
$visual_literacy=$row['visual_literacy'];
$memory=$row['memory'];
$printer=$row['printer'];
$information=$row['information'];
$implement=$row['implement'];
$install_base=$row['install_base'];
$implement_add=$row['implement_add'];
$timestamp_log=$row['timestamp_log'];
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
      <td bgcolor="#FFFFFF" class="style1">ข้อมูลทั่วไป</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $data_pana ;?></td>
    </tr>
    <tr>
      <td width="214" bgcolor="#FFFFFF" class="style1">การอ่านภาพ</td>
      <td width="458" bgcolor="#FFFFFF" class="style3"><? echo $visual_literacy ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">รองรับหน่วยความจำนอก</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $memory ;?></td>
    </tr>
    
    <tr>
      <td bgcolor="#FFFFFF" class="style1">การพิมพ์งาน</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $printer ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ข้อมูลเกี่ยวกับระบบ</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $information ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">อุปกรณ์มาตรฐาน</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $implement ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ชุดติดตั้งมาตรฐาน</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $install_base ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">อุปกรณ์เสริม</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $implement_add ;?></td>
    </tr>
  </table>
</form>
</body>
</html>
