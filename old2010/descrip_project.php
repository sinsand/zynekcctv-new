<?
@session_start();
include "connect.php";
$sql="SELECT * FROM descrip_projector where ID_product = '$ID_product1' " ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$Brightness=$row['Brightness'];
$Dimensions=$row['Dimensions'];
$Resolution=$row['Resolution'];
$Projection_Lens=$row['Projection_Lens'];
$Zoom_Ratio=$row['Zoom_Ratio'];
$Projector_Technology=$row['Projector_Technology'];
$Panel_Display=$row['Panel_Display'];
$Aspect_Ratio=$row['Aspect_Ratio'];
$Throw_Distance=$row['Throw_Distance'];
$Display_size=$row['Display_size'];
$Keystone_Correction=$row['Keystone_Correction'];
$Contrast_Ratio=$row['Contrast_Ratio'];
$In_Out=$row['In_Out'];
$LightSource=$row['LightSource'];
$Lamp_Life=$row['Lamp_Life'];
$Color_System=$row['Color_System'];
$Display_Compatibility=$row['Display_Compatibility'];
$Speakers=$row['Speakers'];
$Audible_Noise=$row['Audible_Noise'];
$Power_source=$row['Power_source'];
$Power_Consumption=$row['Power_Consumption'];
$Digital_In_Out=$row['Digital_In_Out'];
$Special_Features=$row['Special_Features'];
$Launch=$row['Launch'];
$Warranty=$row['Warranty'];
$Weight=$row['Weight'];
$Wireless_Network_Support=$row['Wireless_Network_Support'];

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
      <td bgcolor="#FFFFFF" class="style1">Brightness</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Brightness ;?></td>
    </tr>
    <tr>
      <td width="214" bgcolor="#FFFFFF" class="style1">Dimensions</td>
      <td width="458" bgcolor="#FFFFFF" class="style3"><? echo $Dimensions ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Resolution</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Resolution ;?></td>
    </tr>
    
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Projection Lens</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Projection_Lens ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Zoom Ratio</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Zoom_Ratio ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Projector Technology</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Projector_Technology ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Panel Display</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Panel_Display ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Aspect Ratio</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Aspect_Ratio ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Throw Distance(m)</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Throw_Distance ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Display size (Inch)</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Display_size ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Keystone Correction</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Keystone_Correction ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Contrast Ratio</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Contrast_Ratio ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">I/O</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $In_Out ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Light Source (Lamp)</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $LightSource ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Lamp Life(STD/ECO)(hr)</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Lamp_Life ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Color System</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Color_System ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Display Compatibility</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Display_Compatibility ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Speakers</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Speakers ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Audible Noise</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Audible_Noise ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Power source</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Power_source ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Power Consumption</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Power_Consumption ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Digital I/O</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Digital_In_Out ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Special Features</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Special_Features ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Launch</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Launch ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Warranty</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Warranty ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Weight </td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Weight ;?></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="style1">Wireless / Network Support</td>
      <td bgcolor="#FFFFFF" class="style3"><? echo $Wireless_Network_Support ;?></td>
    </tr>
  </table>
</form>
</body>
</html>
