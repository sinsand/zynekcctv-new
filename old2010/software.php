<?
include "connect.php";
$type =$_GET['type'];
$i=1;
$sql="SELECT * FROM Product where ID_type = '$type'" ;
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
$pic_L[$i]=$row['pic_L'];
$i=$i+1;
} 
switch($ID_group[1])
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

$sql_type="SELECT * FROM type_product where ID_type = '$ID_type[1]'" ;
mysql_query("SET CHARACTER SET utf8");  
$result1=mysql_db_query($dbname, $sql_type);
$num_row1= mysql_num_rows($result);
while($row1=mysql_fetch_array($result1)){
$Name_type=$row1['Name_type'];
$pic_type=$row1['pic_type'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สินค้าหมวด ซอฟต์แวร์คอมพิวเตอร์ : ขายเน็ตบุ๊ค, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<link rel="stylesheet" href="style.css">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style20 {
	color: #000066;
	font-weight: bold;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
 <div align="center">
   <table width="871" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
      <td height="14" colspan="6" bgcolor="#FFFFFF"><? include "head.php" ?></td>
      </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><? include "menu_left.php" ?></td>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><table width="708" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="5"><span class="style16">สินค้า &gt;&gt; หมวด IT Products &gt;&gt; ซอฟต์แวร์</span></td>
            </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
          
          <tr>
            <td colspan="5"><img src="images/line_newproduct.gif" width="711" height="13" /></td>
            </tr>
          
          <tr>
            <td rowspan="8" background="images/Line_menu_right.gif">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF" >&nbsp; </td>
            <td width="11" rowspan="8" background="images/line_newproduct_rigth.gif" ><img src="images/line_newproduct_rigth.gif" width="11" height="25" /></td>
          </tr>
          <tr>
            <td height="16" colspan="3" valign="top" ><div align="center" class="style4">
              <div align="left"><strong>สินค้าทุกชนิดเปิดกล่อง,เปิดซอง หรือ แกะสติกเกอร์แล้ว ไม่รับเปลี่ยนคืน</strong></div>
            </div></td>
            </tr>
          <tr>
            <td colspan="3" valign="top" >&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" valign="top" bgcolor="#CCCCCC" ><table width="690" border="0" cellpadding="4" cellspacing="1">
              <tr>
                <td width="68" rowspan="2" bgcolor="#D3FFA8" class="style2"><div align="center" class="style20">Stock Code</div></td>
                <td width="396" rowspan="2" bgcolor="#D3FFA8" class="style2"><div align="center" class="style20">DESCRIPTION</div></td>
                <td colspan="3" bgcolor="#D3FFA8" class="style2"><div align="center" class="style20">Regular L1-L3</div></td>
                </tr>
              <tr>
                <td width="60" bgcolor="#D3FFA8" class="style2"><div align="center" class="style20">1-2 user</div></td>
                <td width="60" bgcolor="#D3FFA8" class="style2"><div align="center" class="style20">3-5 user</div></td>
                <td width="60" bgcolor="#D3FFA8" class="style2"><div align="center" class="style20">6-10 user</div></td>
              </tr>
              
              <tr>
                <td colspan="5" bgcolor="#E7FFCE" class="style5"><strong>Windows Vista ที่ไม่มี Offer Form ไม่ได้รับสิทธิ์ในการ Upgrade เป็น Windows 7</strong></td>
                </tr>
              <tr>
                <td  bgcolor="#E7FFCE" class="style2">4CP-00771</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows  Vista Starter SP1 32-bit <span class="style4">English</span>    1pk DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2"> 1,900 </td>
                <td bgcolor="#E7FFCE" class="style2"> 1,850 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2"> 1,800 </td>
              </tr>
              <tr >
                <td bgcolor="#E7FFCE" class="style2">4CP-00747</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Starter SP1 32-bit <span class="style4">Thai</span> 1pk    DSP OEI DVD     </td>
                <td bgcolor="#E7FFCE" class="style2">1,900 </td>
                <td bgcolor="#E7FFCE" class="style2">1,850 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">1,800 </td>
              </tr>
              <tr>
                <td bgcolor="#E7FFCE" class="style2">66G-02082</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Home  Basic SP1 32-bit <span class="style4">English</span> 1pk  DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2">4,200 </td>
                <td bgcolor="#E7FFCE" class="style2">4,150 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">4,100 </td>
              </tr>
              <tr >
                <td  bgcolor="#FFFF99" class="style2">66G-02141</td>
                <td bgcolor="#FFFF99" class="style2">Windows Vista Home Basic SP1 64-bit <span class="style4">English</span> 1pk DSP OEI DVD</td>
                <td bgcolor="#FFFF99" class="style2">4,200 </td>
                <td bgcolor="#FFFF99" class="style2">4,150 </td>
                <td align="left" bgcolor="#FFFF99" class="style2">4,100 </td>
              </tr>
              <tr >
                <td bgcolor="#E7FFCE" class="style2">66G-03147</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Home Basic SP1 32-bit <span class="style4">Thai</span> SEA 1pk    DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2">3,850 </td>
                <td bgcolor="#E7FFCE" class="style2">3,750 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2"> 3,700 </td>
              </tr>
              <tr>
                <td bgcolor="#E7FFCE" class="style2">66I-02059</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Home Prem SP1 32-bit <span class="style4">English</span> 1pk    DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2">5,200 </td>
                <td bgcolor="#E7FFCE" class="style2">5,150 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">5,100 </td>
              </tr>
              <tr >
                <td bgcolor="#FFFF99" class="style2">66I-01939</td>
                <td bgcolor="#FFFF99" class="style2">Windows Vista Home Prem SP1 64-bit <span class="style4">English</span> 1pk DSP OEI DVD</td>
                <td bgcolor="#FFFF99" class="style2">5,200 </td>
                <td bgcolor="#FFFF99" class="style2">5,150 </td>
                <td align="left" bgcolor="#FFFF99" class="style2">5,100 </td>
              </tr>
              <tr height="19">
                <td bgcolor="#E7FFCE" class="style2">66I-02838</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Home Prem SP1 32-bit <span class="style4">Thai</span> SEA 1pk    DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2">4,900 </td>
                <td bgcolor="#E7FFCE" class="style2"> 4,850 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">4,750 </td>
              </tr>
              <tr>
                <td bgcolor="#E7FFCE" class="style2">66J-05542</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Business SP1 32-bit <span class="style4">English</span> 1pk DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2"> 6,350 </td>
                <td bgcolor="#E7FFCE" class="style2"> 6,300 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">6,250 </td>
              </tr>
              <tr>
                <td bgcolor="#FFFF99" class="style2">66J-05523</td>
                <td bgcolor="#FFFF99" class="style2">Windows Vista  Business SP1 64-bit <span class="style4">English</span>    1pk DSP OEI DVD</td>
                <td bgcolor="#FFFF99" class="style2">6,350 </td>
                <td bgcolor="#FFFF99" class="style2">6,300 </td>
                <td align="left" bgcolor="#FFFF99" class="style2">6,250 </td>
              </tr>
              <tr >
                <td  bgcolor="#E7FFCE" class="style2">66R-02031</td>
                <td bgcolor="#E7FFCE" class="style2">Windows Vista Ultimate SP1 32-bit <span class="style4">English</span>  1pk DSP OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2">9,000 </td>
                <td bgcolor="#E7FFCE" class="style2">8,550 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">8,500 </td>
              </tr>
              <tr >
                <td  bgcolor="#FFFF99" class="style2">66R-02034</td>
                <td bgcolor="#FFFF99" class="style2">Windows Vista Ultimate SP1 64-bit <span class="style4">English</span>    1pk DSP OEI DVD</td>
                <td bgcolor="#FFFF99" class="style2">9,000 </td>
                <td bgcolor="#FFFF99" class="style2">8,550 </td>
                <td align="left" bgcolor="#FFFF99" class="style2">8,500 </td>
              </tr>
              <tr >
                <td bgcolor="#E7FFCE" class="style2">QRC-00001</td>
                <td bgcolor="#E7FFCE" class="style2">GGK-Win <span class="style4">Vista Business</span> SP1 32-bit    English Legalization DSP ORT OEI DVD</td>
                <td bgcolor="#E7FFCE" class="style2">7,950 </td>
                <td bgcolor="#E7FFCE" class="style2">7,900 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">7,850 </td>
              </tr>
              
              <tr>
                <td height="19" colspan="5" bgcolor="#E7FFCE" class="style4">** GGK ย่อมาจาก Get Genuine Kit เป็นสินค้าที่เหมาะสำหรับลูกค้าที่มีเครื่องเก่าอยู่แล้ว 
ในปัจจุบัน GGK มีขายแต่ XP PRO เท่านั้น! และต้องสั่งสินค้าเป็น By Orde</td>
                </tr>
              <tr>
                <td height="19" colspan="5" bgcolor="#E7FFCE" class="style5"><strong>Windows Vista + Offer Form (คือ สามารถ Upgrade เป็น Windows 7 ได้ เมื่อ Windows 7 วางจำหน่ายแล้ว)</strong></td>
                </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66I-03510</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Home Prem SP1 32-bit English 1pk DSP OEI DVD <span class="style4">w/    Offer Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">5,500 </td>
                <td bgcolor="#E7FFCE" class="style2">5,450 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">5,400 </td>
              </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66I-03525</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Home Prem SP1 64-bit English 1pk DSP OEI DVD  <span class="style4">w/ Offer Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">5,500 </td>
                <td bgcolor="#E7FFCE" class="style2">,450 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">5,400 </td>
              </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66I-03676</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Home Prem SP1 x32 Thai SEA 1pk DSP OEI DVD <span class="style4">w/Offer    Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">5,400 </td>
                <td bgcolor="#E7FFCE" class="style2">5,350 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">5,300 </td>
              </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66J-08306</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Business SP1 32-bit English 1pk DSP OEI DVD <span class="style4">w/ Offer Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">6,850 </td>
                <td bgcolor="#E7FFCE" class="style2">6,800 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">6,750 </td>
              </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66J-08311</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Business SP1 64-bit English 1pk DSP OEI DVD<span class="style4"> w/    Offer Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">6,850 </td>
                <td bgcolor="#E7FFCE" class="style2">6,800 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">6,750 </td>
              </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66R-03056</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Ultimate SP1 32-bit English 1pk DSP OEI DVD <span class="style4">w/ Offer Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">9,500 </td>
                <td bgcolor="#E7FFCE" class="style2">9,450 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">9,400 </td>
              </tr>
              <tr height="18">
                <td height="18" align="left" bgcolor="#E7FFCE" class="style2">66R-03061</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Vista Ultimate SP1 64-bit English 1pk DSP OEI DVD<span class="style4"> w/    Offer Form</span></td>
                <td bgcolor="#E7FFCE" class="style2">9,500 </td>
                <td bgcolor="#E7FFCE" class="style2">9,450 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">9,400 </td>
              </tr>
              
              <tr>
                <td height="19" colspan="5" bgcolor="#E7FFCE"><span class="style5"><strong>Office 2007 (No Media) =&gt; ต้องใช้แผ่น OPK ในการ Install เท่านั้น!</strong></span></td>
              </tr>
              <tr height="19">
                <td height="19" bgcolor="#E7FFCE" class="style2">S55-02515</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Office Basic 2007 <span class="style4">English</span> Intl 1pk    DSP OEI V2 w/OfcPro2007Trial MLK</td>
                <td bgcolor="#E7FFCE" class="style2">7,650 </td>
                <td bgcolor="#E7FFCE" class="style2">7,600 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">7,550 </td>
              </tr>
              <tr height="19">
                <td height="19" bgcolor="#E7FFCE" class="style2">S55-02286</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Office  Basic 2007 Win32 <span class="style4">Thai</span> 1pk DSP    OEI V2 w/OfcPro2007Trial MLK</td>
                <td bgcolor="#E7FFCE" class="style2">7,650 </td>
                <td bgcolor="#E7FFCE" class="style2">7,600 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">7,550 </td>
              </tr>
              <tr height="19">
                <td height="19" bgcolor="#E7FFCE" class="style2">9QA-01757</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Office SB 2007 <span class="style4">English</span> Intl 1pk DSP OEI    V2 w/OfcPro2007Trial MLK</td>
                <td bgcolor="#E7FFCE" class="style2">10,400 </td>
                <td bgcolor="#E7FFCE" class="style2">10,350 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">10,300 </td>
              </tr>
              <tr height="19">
                <td height="19" bgcolor="#E7FFCE" class="style2">9QA-01547</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Office SB 2007 Win32 <span class="style4">Thai</span> 1pk DSP OEI V2 w/OfcPro2007Trial MLK</td>
                <td bgcolor="#E7FFCE" class="style2">10,400 </td>
                <td bgcolor="#E7FFCE" class="style2">10,350 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">10,300 </td>
              </tr>
              <tr height="19">
                <td height="19" bgcolor="#E7FFCE" class="style2">269-14071</td>
                <td bgcolor="#E7FFCE" class="style2">Office Pro 2007 W32 <span class="style4">English</span> 1pk DSP OEI (MLK)</td>
                <td bgcolor="#E7FFCE" class="style2">14,200 </td>
                <td bgcolor="#E7FFCE" class="style2">14,150 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,100 </td>
              </tr>
              <tr height="19">
                <td height="19" bgcolor="#E7FFCE" class="style2">269-13754</td>
                <td bgcolor="#E7FFCE" class="style2">Office Pro 2007 Win32 <span class="style4">Thai</span> 1pk DSP OEI V2 MLK</td>
                <td bgcolor="#E7FFCE" class="style2">14,200 </td>
                <td bgcolor="#E7FFCE" class="style2">14,150 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,100 </td>
              </tr>
              
              <tr>
                <td height="19" colspan="5" bgcolor="#E7FFCE"><span class="style4" ><strong>หมายเหตุ :</strong><br />                  
                  1. Highlight สีเหลือง คือ 64-bit<br />
                  2. Vista Ultimate และ Windows 64-bit ทุกตัว ต้องสั่งเป็น by order ประมาณ 1-2 week</span></td>
                </tr>
              <tr>
                <td height="19" colspan="5" bgcolor="#E7FFCE" class="style5"><strong>Windows Server + CAL</strong></td>
                </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">P73-02766</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Server Standard <span class="style4">2003</span> R2 w/SP2 32Bit English 1pk DSP OEI CD 1-4CPU 5 Clt</td>
                <td bgcolor="#E7FFCE" class="style2">33,500 </td>
                <td bgcolor="#E7FFCE" class="style2">33,000 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">32,500 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">P73-04001</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows  Server Standard <span class="style4">2008</span> 32Bit/x64 English 1pk DSP OEI DVD 1-4CPU 5 Clt</td>
                <td bgcolor="#E7FFCE" class="style2">33,500 </td>
                <td bgcolor="#E7FFCE" class="style2">33,000 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">32,500 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">R18-02869</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows Server CAL <span class="style4">2008</span> English 1pk DSP OEI 5 Clt<span class="style4"> Device CAL</span></td>
                <td bgcolor="#E7FFCE" class="style2">6,350 </td>
                <td bgcolor="#E7FFCE" class="style2">6,300 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">6,250 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">R18-02907</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Windows  Server CAL <span class="style4">2008</span> English 1pk DSP OEI 5 Clt <span class="style4">User CAL</span></td>
                <td bgcolor="#E7FFCE" class="style2">6,350 </td>
                <td bgcolor="#E7FFCE" class="style2">6,300 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">6,250 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">T75-02475</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Win<span class="style4"> SBS Premium 2008</span> English 1pk DSP OEI DVD 1-4CPU 5 Clt</td>
                <td bgcolor="#E7FFCE" class="style2">64,500 </td>
                <td bgcolor="#E7FFCE" class="style2">64,000 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">63,500 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">6VA-00563</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Win<span class="style4"> SBS Premium CAL</span> Ste <span class="style4">2008</span> English 1pk DSP OEI 5 Clt<span class="style4"> Device CAL</span></td>
                <td bgcolor="#E7FFCE" class="style2">36,500 </td>
                <td bgcolor="#E7FFCE" class="style2">28,000 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">27,500 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">6VA-00544</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Win<span class="style4"> SBS Premium CAL</span> Ste <span class="style4">2008</span> English 1pk DSP OEI 5 Clt <span class="style4">User CAL</span></td>
                <td bgcolor="#E7FFCE" class="style2">36,500 </td>
                <td bgcolor="#E7FFCE" class="style2">28,000 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">27,500 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">T72-02453</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Win<span class="style4"> SBS Standard 2008</span> English 1pk DSP OEI DVD 1-4CPU 5 Clt</td>
                <td bgcolor="#E7FFCE" class="style2">37,500 </td>
                <td bgcolor="#E7FFCE" class="style2">37,000 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">36,500 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">6UA-00563</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Win<span class="style4"> SBS Standard CAL 2008</span> English 1pk DSP OEI 5 Clt <span class="style4">Device CAL</span></td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,200 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,100 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,000 </td>
              </tr>
              <tr height="20">
                <td height="20" align="left" bgcolor="#E7FFCE" class="style2">6UA-00544</td>
                <td align="left" bgcolor="#E7FFCE" class="style2">Win<span class="style4"> SBS Standard CAL 2008</span> English 1pk DSP OEI 5 Clt <span class="style4">User CAL</span></td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,200 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,100 </td>
                <td align="left" bgcolor="#E7FFCE" class="style2">14,000 </td>
              </tr>
              
            </table></td>
            </tr>
          <tr>
            <td width="207" valign="top" ><div align="center"></div></td>
            <td width="6">&nbsp;</td>
            <td width="477" valign="top"><div align="center"></div></td>
            </tr>
          <tr>
            <td colspan="3" bgcolor="#CCCCCC" ><table width="690" border="0" cellpadding="4" cellspacing="1">
              <tr height="16">
                <td height="16" bgcolor="#FFD784">Product</td>
                <td bgcolor="#FFD784">Description</td>
              </tr>
              <tr height="16">
                <td height="16" bgcolor="#FFECC4">Office    Basic </td>
                <td align="left" bgcolor="#FFECC4">Word, Excel, Outlook</td>
              </tr>
              <tr height="16">
                <td height="16" bgcolor="#FFECC4">Office    Small Business </td>
                <td align="left" bgcolor="#FFECC4">Word, Excel, Outlook with Business Contact Manager,    PowerPoint, Publisher</td>
              </tr>
              <tr height="16">
                <td height="16" bgcolor="#FFECC4">Office    Pro </td>
                <td align="left" bgcolor="#FFECC4">Word, Excel, Outlook with Business Contact Manager,    PowerPoint, Publisher, Access, OneNote</td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td  valign="top">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" valign="top" bgcolor="#CCCCCC"><table width="690" border="0" cellpadding="4" cellspacing="1">
              <tr>
                <td width="123" bgcolor="#FFFF99" class="style2">Product</td>
                <td width="548" bgcolor="#FFFF99" class="style2">DESCRIPTION</td>
              </tr>
              <tr>
                <td align="left" bgcolor="#FFFFCC" class="style2">Win SBS Premium 2008</td>
                <td bgcolor="#FFFFCC" class="style2">Windows Server 2008, SharePoint 3.0, Exchange Svr Std 2007, MS Office Live Small Business, Forefront Security for Exchange Svr, Server Update Service 3.0, Win Live One Care for Svr, SQL Svr 2008 Std.</td>
              </tr>
              
            </table></td>
            </tr>
          <? if ($num_row >= 3) {
          echo "<tr>";
          echo "  <td colspan=\"5\" background=\"images/Line_menu_right.gif\"><div align=\"center\"><img src=\"images/dot_line_horizonatal.gif\" width=\"684\" height=\"5\" /></div></td>";
           echo " </tr>";
          }
		  ?>
          
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td  valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
		
		
          
          
          
          <tr>
            <td background="images/Line_menu_right.gif">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td  valign="top"></td>
            <td><div align="right" class="style16">แก้ไขข้อมูลวันที่ 7 ตุลาคม 2552 </div></td>
            <td background="images/line_newproduct_rigth.gif" >&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" valign="top"><img src="images/line_bottom_new.gif" width="711" height="15" /></td>
            </tr>
          

          <tr>
            <td>&nbsp;</td>
            <td colspan="2" >&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td width="10">&nbsp;</td>
            <td colspan="2" >&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
        </td>
    </tr>
    
    <tr>
      <td width="13" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="135" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="9" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="147" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="204" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="363" bgcolor="#FFFFFF">&nbsp;</td>
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
