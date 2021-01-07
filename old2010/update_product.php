
<? 
    include "connect.php";
   $ID_Product= $_GET['ID_Product'];
	
	session_register("ID_Product1");
    $_SESSION["ID_Product1"]=$ID_Product ;
	$num= $_GET['num'];
	session_register("num1");
	
    $_SESSION["num1"]= $num ;
		$sql="SELECT * FROM Product where `Product`.`ID_product` = '$ID_Product'";
	    mysql_query("SET CHARACTER SET utf8");
	    $result=mysql_db_query($dbname, $sql);	  
        $numrow=mysql_num_rows($result);
		while($rows=mysql_fetch_array($result)){		  
   $ID_product=$rows['ID_product'];
   $ID_type=$rows['ID_type'];
   $ID_brand=$rows['ID_brand'];
   $code_product=$rows['code_product'];
   $name_product=$rows['name_product'];
   $pic_product=$rows['pic_product'];
   $price_product=$rows['price_product'];
   $short_descrip1=$rows['short_descrip'];
   $descrip_product=$rows['descrip_product'];
   $pdf_file=$rows['pdf_file'];
   $link_pdf=$rows['link_pdf'];
   $size_pdf=$rows['size_pdf'];
   $ID_group=$rows['ID_group'];
   $big_pic=$rows['big_pic'];
   $class=$rows['class'];
   $order_product=$rows['order_product'];
   $promotion=$rows['promotion'];
   $log_time=$rows['log_time'];
   $descrip_price=$rows['descrip_price'];	
   $new_product =$rows['new_product'];	
	}
	

	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการเว็บ Zynektechnologies </title>
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
<form id="form1" name="form1" method="post" action="update_product1.php">
<center>
  <table width="920" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#FFFFFF"><div align="center">
        <? include "head_admin.php" ?>
      </div></td>
      </tr>
    <tr>
      <td width="12" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="897" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><table width="894" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="54" height="20" class="style3">&nbsp;</td>
          <td width="173" class="style11">ประเภทสินค้า : </td>
          <td width="667" height="20"><label>
            <select name="select">
              <option value="1"<? if ($ID_type=='1'){echo "selected=\"selected\""; } ?>>คอมพิวเตอร์</option>
              <option value="2"<? if ($ID_type=='2'){echo "selected=\"selected\""; } ?>>โน้ตบุ๊ค</option>
              <option value="3"<? if ($ID_type=='3'){echo "selected=\"selected\""; } ?>>เน็ตบุ๊ค</option>
              <option value="4"<? if ($ID_type=='4'){echo "selected=\"selected\""; } ?>>เซิร์ฟเวอร์</option>
              <option value="5"<? if ($ID_type=='5'){echo "selected=\"selected\""; } ?>>ปริ้นเตอร์</option>
              <option value="6"<? if ($ID_type=='6'){echo "selected=\"selected\""; } ?>>อุปกรณ์เน็ตเวิร์ค</option>
              <option value="7"<? if ($ID_type=='7'){echo "selected=\"selected\""; } ?>>ซอฟต์แวร์</option>
              <option value="8"<? if ($ID_type=='8'){echo "selected=\"selected\""; } ?>>อื่นๆ</option>
              <option value="16"<? if ($ID_type=='16'){echo "selected=\"selected\""; } ?>>IP Camera && NVR </option>
              <option value="9"<? if ($ID_type=='9'){echo "selected=\"selected\""; } ?>>แฟ็กซ์</option>
              <option value="10"<? if ($ID_type=='10'){echo "selected=\"selected\""; } ?>>ตู้สาขาโทรศัพท์</option>
              <option value="11"<? if ($ID_type=='11'){echo "selected=\"selected\""; } ?>>พานาบอร์ด</option>
              <option value="12"<? if ($ID_type=='12'){echo "selected=\"selected\""; } ?>>โปรเจ็คเตอร์</option>
              <option value="13"<? if ($ID_type=='13'){echo "selected=\"selected\""; } ?>>แอลซีดี ทีวี</option>
              <option value="14"<? if ($ID_type=='14'){echo "selected=\"selected\""; } ?>>กล้องดิจิตอล</option>
              <option value="15"<? if ($ID_type=='15'){echo "selected=\"selected\""; } ?>>ระบบเสียงห้องประชุม</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11"> brand สินค้า : </td>
          <td height="20"><label>
            <select name="select2">
              <option value="1"<? if ($ID_brand=='1'){echo "selected=\"selected\""; } ?>>Lenovo</option>
              <option value="2"<? if ($ID_brand=='2'){echo "selected=\"selected\""; } ?>>Panasonic</option>
              <option value="3"<? if ($ID_brand=='3'){echo "selected=\"selected\""; } ?>>Acer</option>
              <option value="4"<? if ($ID_brand=='4'){echo "selected=\"selected\""; } ?>>Sony</option>
              <option value="5"<? if ($ID_brand=='5'){echo "selected=\"selected\""; } ?>>QNAP</option>
              <option value="6"<? if ($ID_brand=='6'){echo "selected=\"selected\""; } ?>>Canon</option>
              <option value="8"<? if ($ID_brand=='8'){echo "selected=\"selected\""; } ?>>Samsung</option>
              <option value="9"<? if ($ID_brand=='9'){echo "selected=\"selected\""; } ?>>LG</option>
              <option value="10"<? if ($ID_brand=='10'){echo "selected=\"selected\""; } ?>>Asus</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">รหัสสินค้า : </td>
          <td height="20"> <input type="text" name="code_product" value="<? echo $code_product?>"/>
            (เช่น L5K-59022036 , LXN440C010 , LXN440C010)</td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">ชื่อสินค้่่่า : </td>
          <td height="20"><input type="text" name="name_product" value="<? echo $name_product?>"/>          
            (เช่น กล้องดิจิตอล Canon PowerShot รุ่น PWS A470 , Lenovo PC A600 All-in-1)</td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">คำอธิบายราคา : </td>
          <td height="20"><input type="text" name="price_product" value="<? echo $price_product?>"/>
          (เช่น ราคานี้ยังไม่รวม VAT, ค่าขนส่ง, และบริการ)</td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">รายละเอียดย่อ : </td>
          <td height="20">
            <textarea name="short_descrip1" cols="90" rows="5" id="short_descrip1"><? echo $short_descrip1?></textarea>        </td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">รายละเอียดหลัก : </td>
          <td height="20"><textarea name="descrip_product" cols="90" rows="5" id="descrip_product" ><? echo $descrip_product?></textarea></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">รูปสินค้า : </td>
          <td height="20"><input name="pic_product" type="text" id="pic_product" value="<? echo $pic_product ?>" /></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">รูปสินค้าขนาดใหญ่ : </td>
          <td height="20"><input type="text" name="big_pic" value="<? echo $big_pic?>" /></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">ลิงค์ไฟล์ PDF  : </td>
          <td height="20"><input type="text" name="size_pdf" value="<? echo $size_pdf?>" /></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">หัวข้อสินค้า : </td>
          <td height="20"><label>
            <select name="select3">
              <option value="1"<? if ($ID_group=='1'){echo "selected=\"selected\""; } ?>>IT Products</option>
              <option value="2"<? if ($ID_group=='2'){echo "selected=\"selected\""; } ?>>OA&&Communication</option>
              <option value="3"<? if ($ID_group=='3'){echo "selected=\"selected\""; } ?>>AV Products</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">กลุ่มสินค้า : </td>
          <td height="20"><label>
            <select name="select4">
              <option value="1"<? if ($class=='1'){echo "selected=\"selected\""; } ?>>ตู้สาขา Panasonic Hybrid PBX</option>
              <option value="2"<? if ($class=='2'){echo "selected=\"selected\""; } ?>>ตู้สาขา Panasonic Hybrid IP-PBX</option>
              <option value="3"<? if ($class=='3'){echo "selected=\"selected\""; } ?>>โทรศัพท์ Panasonic Integrated Telephone Systems</option>
              <option value="4"<? if ($class=='4'){echo "selected=\"selected\""; } ?>>โทรศัพท์ Panasonic Digital Cordless for 2.4 GHz</option>
              <option value="5"<? if ($class=='5'){echo "selected=\"selected\""; } ?>>Panasonic Thermal Fax</option>
              <option value="6"<? if ($class=='6'){echo "selected=\"selected\""; } ?>>Panasonic Thermal Transfer Fax Film</option>
              <option value="7"<? if ($class=='7'){echo "selected=\"selected\""; } ?>>Panasonic Laser Fax</option>
              <option value="8"<? if ($class=='8'){echo "selected=\"selected\""; } ?>>Panasonic Laser Fax Multifunction</option>
              <option value="9"<? if ($class=='9'){echo "selected=\"selected\""; } ?>>Panasonic Laser MultiFunction 3 in 1</option>
              <option value="10"<? if ($class=='10'){echo "selected=\"selected\""; } ?>>Samsung Mono Laser Printer</option>
              <option value="11"<? if ($class=='11'){echo "selected=\"selected\""; } ?>>Samsung Mono Multifunction Laser Printer</option>
              <option value="12"<? if ($class=='12'){echo "selected=\"selected\""; } ?>>Samsung Color Laser Printer</option>
              <option value="13"<? if ($class=='13'){echo "selected=\"selected\""; } ?>>Lenovo Y450</option>
              <option value="14"<? if ($class=='14'){echo "selected=\"selected\""; } ?>>Lenovo Y550</option>
              <option value="15"<? if ($class=='15'){echo "selected=\"selected\""; } ?>>Lenovo G230</option>
              <option value="16"<? if ($class=='16'){echo "selected=\"selected\""; } ?>>Lenovo G430</option>
            </select>
            </label></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">การจัดเรียง : </td>
          <td height="20"><input type="text" name="order_product" value="<? echo $order_product?>"/></td>
        </tr>
        <tr>
          <td height="20" class="style3">&nbsp;</td>
          <td class="style11">การแสดงสินค้าหน้าแรก : </td>
          <td height="20"><label>
            <select name="promotion">
              <option value="0"<? if ($promotion=='0'){echo "selected=\"selected\""; } ?>>0</option>
              <option value="1"<? if ($promotion=='1'){echo "selected=\"selected\""; } ?>>1</option>
            </select>
          (0 คือ ไม่แสดงแรก , 1 คือ แสดงหน้าแรก)</label></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td class="style11">สินค้าใหม่ : </td>
          <td height="20"><select name="new_product">
            <option value="0"<? if ($new_product=='0'){echo "selected=\"selected\""; } ?>>0</option>
            <option value="1"<? if ($new_product=='1'){echo "selected=\"selected\""; } ?>>1</option>
          </select>
(0 คือ ไม่แสดงไอคอลสินค้าใหม่ , 1 คือ แสดงไอคอลสินค้าใหม่)</td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td height="20" colspan="2" class="style3">*** รายละเอียดสินค้าเพิ่มเติม *** </td>
          </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td height="20" colspan="2" class="style3">*** รายละเอียดโปรโมชั่น *** </td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td height="20"><label>
            <input type="submit" name="Submit" value="ตกลง" />
          </label>
            <label>
            <input type="submit" name="Submit2" value="ยกเลิก" />
            </label></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
  </center>
</form>
</body>
</html>
