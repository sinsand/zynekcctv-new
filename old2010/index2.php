<? 
include "connect.php";
$i=1;
$sql="SELECT * FROM Product where promotion = '1'" ;
mysql_query("SET CHARACTER SET utf8");   
$result=mysql_db_query($dbname, $sql);
$num_row= mysql_num_rows($result);
while($row=mysql_fetch_array($result)){
$pic_product[$i]=$row['pic_product'];
$name_product[$i]=$row['name_product'];
$short_descrip[$i]=$row['short_descrip'];
$price_product[$i]=$row['price_product'];
$size = GetImageSize($pic_product[$i]);
$sH2[$i]= $size[1]/2;
$sW2[$i] = $size[0]/2;
$i++;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เน็ตบุ๊ก, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV, กล้อวงจรปิด, IP Camera</title>
<meta name="keywords" content="Netbook , Projcector , Computer, PABX ,LCD TV" />
<meta name="description" content="จำหน่าย สินค้าไอที ทุกชนิด ตู้สาขา&โทรศัพท์ โปรเจ็คเตอร์ LCD TV" />
<link rel="stylesheet" href="style.css">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #CCCCCC;
	background-image: url(images/bg.jpg);
}
-->
</style></head>

<body>

<img src="http://www.prosecureshop.com/black_ribbons/black_ribbon_top_left.png" class="black-ribbon stick-top stick-left">

<form id="form1" name="form1" method="post" action="">
 <div align="center">
   <table width="908" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
      <td height="14" colspan="6" bgcolor="#FFFFFF"><? include "head.php" ?></td>
      </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><? include "menu_left.php" ?></td>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><table width="709" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td><div align="left"><a href="http://www.zynekcctv.com/index.php" target="_blank"></a><a href="http://www.zynekcctv.com" target="_blank"><img src="banner/move.gif" width="340" height="130" border="0" /></a></div></td>
          <td>&nbsp;</td>
          <td><a href="http://www.zynekipcamera.com/" target="_blank"><img src="banner/zynekipcam.gif" width="340" height="130" border="0" /></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          </tr>
        <tr>
          <td height="24" colspan="5" background="images/line.jpg"><div align="left" class="style32">&nbsp;&nbsp;สินค้าแนะนำ</div></td>
          </tr>
        <tr>
          <td rowspan="4">&nbsp;</td>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
          <td>&nbsp;</td>
          <td width="7" rowspan="4" >&nbsp;</td>
        </tr>
        <tr>
          <td ><a href="http://www.zynektechnologies.co.th/Templates_list_products.php?type=14" target="_blank"><img src="banner/b_canon.gif" alt="QNAP NVR สำหรับ IP camera" width="340" height="150" border="0" /></a></td>
          <td width="6" >&nbsp;</td>
          <td><a href="Templates_list_products1.php?type=10" target="_blank"><img src="banner/pana_oa150.gif" alt="ตู้สาขา โทรศัพท์ แฟกซ์" width="340" height="150" border="0" /></a></td>
          </tr>
        <tr>
          <td height="6" colspan="3" >&nbsp;</td>
          </tr>
        <tr>
          <td width="345" ><a href="http://www.zynektechnologies.co.th/Templates_list_products.php?type=3" target="_blank"><img src="banner/netbook.gif" alt="Netbook" width="340" height="150" border="0" /></a></td>
          <td width="6"  valign="top">&nbsp;</td>
          <td width="345"><a href="Templates_product.php?type=1" target="_blank"><img src="banner/mini.gif" alt="MIni PC Asus EEE" width="340" height="150" border="0" /></a></td>
          </tr>
        <tr>
          <td colspan="5" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" colspan="5" valign="top" background="images/line.jpg" style="padding-top: 3px"><span class="style32">&nbsp;&nbsp;บทความเกี่ยวกับ IT </span></td>
        </tr>
        <tr>
          <td colspan="5" valign="top"><span class="style10 style33">&nbsp;&nbsp;&nbsp;&nbsp;เทคนิคการเลือกซื้อคอมพิวเตอร์ Desktop</span></td>
        </tr>
        <tr>
          <td colspan="5" valign="top" style="padding-left: 10px"><span class="stylemenu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คอมพิวเตอร์ Desktop  หรือคอมพิวเตอร์แบบตั้งโต๊ะถือว่าเป็นอุปกรณ์ที่สำคัญกับชีวิตการทำงานตั้งแต่สมัยเรียนมัธยมจนถึงชีวิตการทำงานในรูปแบบต่างๆ  ซึ่งการใช้ประโยชน์ของคอมพิวเตอร์จะมากน้อยแค่ไหนขึ้นอยู่กับคุณสมบัติของคอมพิวเตอร์และความรู้ในการใช้งาน ทำให้การที่เราต้องรู้จักหน้าที่ของส่วนประกอบภายในจนถึงวิธีการทำงานของคอมพิวเตอร์เพื่อที่จะดึง ศักยภาพ มาใช้ให้ได้คุ้มค่าเงินจำนวนมากที่ต้องเสียไปกับอุปกรณ์ชนิดนี้  ดังนั้นเราจะมาทำความรู้จักส่วนประกอบคอมพิวเตอร์<a href="article1.php?ID_product=123&amp;&amp;type=13" target="_blank">... <img src="images/more.gif" border="0" /></a></span></td>
        </tr>
        
        <tr>
          <td colspan="5" valign="top">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="5" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" colspan="5" background="images/line.jpg" class="style32">&nbsp;&nbsp;สินค้าโปรโมชั่น</td>
          </tr>
        <tr>
          <td colspan="5"><table width="708" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3"><img src="images/line_introduce_product.gif" width="234" height="16" /></td>
              <td colspan="3"><img src="images/line_introduce_product.gif" width="234" height="16" /></td>
              <td colspan="3"><img src="images/line_introduce_product.gif" width="234" height="16" /></td>
            </tr>
            <tr>
              <td width="10" background="images/Line_menu_right.gif"><img src="images/Line_menu_right.gif" width="10" height="40" /></td>
              <td width="220" valign="top"><table width="219" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="80" valign="top"><div align="center">
                    <? 
				  echo "<img src=\"$pic_product[1]\" width=\"$sW2[1]\" height=\"$sH2[1]\" />"
				  
				  ?>
                  </div></td>
                  <td width="5">&nbsp;</td>
                  <td width="134" valign="top"><? 
				  echo $name_product[1]
				  
				  ?></td>
                </tr>
                
                
                
              </table></td>
              <td width="6" background="images/line_introduce_right.gif">&nbsp;</td>
              <td width="10" background="images/Line_menu_right.gif"><img src="images/Line_menu_right.gif" width="10" height="40" /></td>
              <td width="220" valign="top"><table width="219" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="80" valign="top"><div align="center">
                      <? 
				  echo "<img src=\"$pic_product[2]\" width=\"$sW2[2]\" height=\"$sH2[2]\" />"
				  
				  ?>
                  </div></td>
                  <td width="5">&nbsp;</td>
                  <td width="134" valign="top"><? 
				  echo $name_product[2]
				  
				  ?></td>
                </tr>
                
                
              </table></td>
              <td width="6" background="images/line_introduce_right.gif">&nbsp;</td>
              <td width="10" background="images/Line_menu_right.gif"><img src="images/Line_menu_right.gif" width="10" height="40" /></td>
              <td width="220" valign="top"><table width="219" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="80" valign="top"><div align="center">
                    <? 
				  echo "<img src=\"$pic_product[3]\" width=\"$sW2[3]\" height=\"$sH2[3]\" />"
				  
				  ?>
                  </div></td>
                  <td width="5">&nbsp;</td>
                  <td width="134" valign="top"><? 
				  echo $name_product[3]
				  
				  ?></td>
                </tr>
                
                
              </table></td>
              <td width="6" background="images/line_introduce_right.gif">&nbsp;</td>
            </tr>
            <tr>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><? echo "<span class=\"style4\"><strong>ราคาเพียง :        
				   $price_product[1] </strong></span>";
				  
				  ?></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><? echo "<span class=\"style4\"><strong>ราคาเพียง :        
				   $price_product[2] </strong></span>";
				  
				  ?></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><? echo "<span class=\"style4\"><strong>ราคาเพียง :     $price_product[3] </strong></span>";
				  
				  ?></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
            </tr>
            <tr>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><div align="right"><a href="http://www.zynektechnologies.co.th/Templates_descrip.php?ID_product=57&amp;&amp;type=10" target="_blank"><img src="images/more.gif" border="0" /></a></div></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><div align="right"><a href="http://www.zynektechnologies.co.th/Templates_descrip.php?ID_product=116&amp;&amp;type=13" target="_blank"><img src="images/more.gif" border="0" /></a></div></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><div align="right"><a href="http://www.zynektechnologies.co.th/Templates_descrip.php?ID_product=123&amp;&amp;type=13" target="_blank"><img src="images/more.gif" border="0" /></a></div></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><img src="images/page.gif" width="234" height="15" /></td>
              <td colspan="3"><img src="images/page.gif" width="234" height="15" /></td>
              <td colspan="3"><img src="images/page.gif" width="234" height="15" /></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5"><table width="708" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3"><img src="images/line_introduce_product.gif" width="234" height="16" /></td>
              <td colspan="3"><img src="images/line_introduce_product.gif" width="234" height="16" /></td>
              <td colspan="3"><img src="images/line_introduce_product.gif" width="234" height="16" /></td>
            </tr>
            <tr>
              <td width="10" background="images/Line_menu_right.gif"><img src="images/Line_menu_right.gif" width="10" height="40" /></td>
              <td width="220" valign="top"><table width="219" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="80" valign="top"><div align="center">
                        <? 
				  echo "<img src=\"$pic_product[4]\" width=\"$sW2[4]\" height=\"$sH2[4]\" />"
				  
				  ?>
                    </div></td>
                    <td width="5">&nbsp;</td>
                    <td width="134" valign="top"><? 
				  echo $name_product[4]
				  
				  ?></td>
                  </tr>
                  
              </table></td>
              <td width="6" background="images/line_introduce_right.gif">&nbsp;</td>
              <td width="10" background="images/Line_menu_right.gif"><img src="images/Line_menu_right.gif" width="10" height="40" /></td>
              <td width="220" valign="top"><table width="219" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="80" valign="top"><div align="center">
                        <? 
				  echo "<img src=\"$pic_product[5]\" width=\"$sW2[5]\" height=\"$sH2[5]\" />"
				  
				  ?>
                    </div></td>
                    <td width="5">&nbsp;</td>
                    <td width="134" valign="top"><? 
				  echo $name_product[5]
				  
				  ?></td>
                  </tr>
                  
              </table></td>
              <td width="6" background="images/line_introduce_right.gif">&nbsp;</td>
              <td width="10" background="images/Line_menu_right.gif"><img src="images/Line_menu_right.gif" width="10" height="40" /></td>
              <td width="220" valign="top"><table width="219" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="80" valign="top"><div align="center">
                        <? 
				  echo "<img src=\"$pic_product[6]\" width=\"$sW2[6]\" height=\"$sH2[6]\" />"
				  
				  ?>
                    </div></td>
                    <td width="5">&nbsp;</td>
                    <td width="134" valign="top"><? 
				  echo $name_product[6]
				  
				  ?></td>
                  </tr>
                  
              </table></td>
              <td width="6" background="images/line_introduce_right.gif">&nbsp;</td>
            </tr>
            <tr>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><? echo "<span class=\"style4\"><strong>ราคาเพียง :  $price_product[4] </strong></span>";
				  
				  ?></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><? echo "<span class=\"style4\"><strong>ราคาเพียง :  $price_product[5] </strong></span>";
				  
				  ?></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><?
					if ($price_product[6]!=""){
                   echo "<span class=\"style4\"><strong>ราคาเพียง :        
				   $price_product[6] </strong></span>";
				  }
				  ?></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
            </tr>
            <tr>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><div align="right"><a href="http://www.zynektechnologies.co.th/Templates_product.php?type=1" target="_blank"><img src="images/more.gif" border="0" /> </a></div></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><div align="right"><a href="http://www.zynektechnologies.co.th/Templates_descrip.php?ID_product=146&amp;&amp;type=5" target="_blank"><img src="images/more.gif" border="0" /></a></div></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
              <td background="images/Line_menu_right.gif">&nbsp;</td>
              <td valign="top"><div align="right"><a href="http://www.zynektechnologies.co.th/Templates_descrip.php?ID_product=196&amp;&amp;type=12" target="_blank"><img src="images/more.gif" border="0" /></a></div></td>
              <td background="images/line_introduce_right.gif">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><img src="images/page.gif" width="234" height="15" /></td>
              <td colspan="3"><img src="images/page.gif" width="234" height="15" /></td>
              <td colspan="3"><img src="images/page.gif" width="234" height="15" /></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" >&nbsp;</td>
          <td colspan="2">&nbsp;</td>
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
      </table></td>
      </tr>
    
    <tr>
      <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="165" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="19" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="135" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="199" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="375" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" bgcolor="#FFFFFF"><? include "bottom.php"; ?></td>
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
