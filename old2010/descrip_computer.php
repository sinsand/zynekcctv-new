<?
@session_start();
include "connect.php";
$sql="SELECT * FROM descrip_computer where ID_product = '$ID_product1' " ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$CPU=$row['CPU'];
$chipset=$row['chipset'];
$memory=$row['memory'];
$harddisk=$row['harddisk'];
$display=$row['display'];
$graphic=$row['graphic'];
$camera=$row['camera'];
$opticaldisc =$row['opticaldisc'];
$wireless_lan=$row['wireless_lan'];
$ethernet=$row['ethernet'];
$bluetooth=$row['bluetooth'];
$modem=$row['modem'];
$card_reader=$row['card_reader'];
$USB=$row['USB'];
$port=$row['port'];
$port_other=$row['port_other'];
$weight=$row['weight'];
$warranty=$row['warranty'];
$battery=$row['battery'];

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
      <td bgcolor="#FFFFFF" class="style1">ซีพียู</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $CPU ;?></td>
    </tr>
    <tr>
      <td width="214" bgcolor="#FFFFFF" class="style1">ชิพเซต </td>
      <td width="458" bgcolor="#FFFFFF" class="style3"><? echo $chipset ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">หน่วยความจำ </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $memory ;?></td>
    </tr>
    
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ฮาร์ดดิสก์</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $harddisk ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ขนาดหน้าจอ</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $display ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">การ์ดแสดงผล</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $graphic ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">กล้องเว็บแคม</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $camera ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">ออปติคอลไดรว์ </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $opticaldisc ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Wireless Lan</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $wireless_lan ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">พอร์ต Ethernet (Lan)</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $ethernet ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Bluetooth</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $bluetooth ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Modem</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $modem ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">เครื่องอ่านการ์ดหน่อยความจำ</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $card_reader ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">พอร์ต USB</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $USB ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">พอร์ตอื่น</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $port ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">หัวต่อเสียบ</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $port_other ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">น้ำหนัก</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $weight ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Warranty</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $warranty ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Battery</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $battery ;?></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF" class="style4">**หมายเหตุ n/a คือ ไม่มีข้อมูล </td>
    </tr>
  </table>
</form>
</body>
</html>
