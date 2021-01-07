<?
ob_start() ;
session_start();
header("content-type: text/html; charset=utf-8");
date_default_timezone_set("utc");
global $link, $host, $user, $pass, $dbname;
global $linkz, $hostz, $userz, $passz, $dbnamez;
global $linkp, $hostp, $userp, $passp, $dbnamep;

global $CookieID,$CookieName,$CookieGroup,$CookieType;
global $SessionID,$SessionName,$SessionGroup,$SessionType;


define(SITE_URL,"https://".$_SERVER['HTTP_HOST']."/new/");
define(SITE_URL_ADMIN,"https://".$_SERVER['HTTP_HOST']."/new/sys/");


$HostLinkAndPath = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$Path         = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$PathExplode  = explode("/",$Path);

/*
$Url          = $PathExplode[0];
$UrlPage      = $PathExplode[1];
$UrlId        = $PathExplode[2];
$UrlIdSub     = $PathExplode[3]; /// หน้า/1 /2 /3
$UrlOther     = $PathExplode[4];
*/
if (!empty($PathExplode[2])) {
  $UrlPage = $PathExplode[2];
}
if (!empty($PathExplode[3])) {
  $UrlId = $PathExplode[3];
}
if (!empty($PathExplode[4])) {
  $UrlIdSub = $PathExplode[4];
}
if (!empty($PathExplode[5])) {
  $UrlOther = $PathExplode[5];
}
if (!empty($PathExplode[6])) {
  $UrlOther2 = $PathExplode[6];
}





/// Session and Cookie Admin
$CookieID = 'C_UID'; //ID_admin
$CookieName = 'C_UNAME'; //name_admin
$CookieGroup = 'C_UGROUP'; //mem_group_name
$CookieType = 'C_UTYPE'; //Admin - Customer

$SessionID = 'S_UID'; // Member_id
$SessionName = 'S_UNAME'; //Company
$SessionGroup = 'S_UGROUP'; //member_group
$SessionType = 'S_UTYPE'; //Admin - Customer



function ConnectToDB_prosecure() {
	global $linkp, $hostp, $userp, $passp, $dbnamep;

	//server zynek
	$hostp 	= "localhost";
	$userp 	= "prosec";
	$passp 	= "Zynek2541";
	$dbnamep  = "prosec_shop";

	$linkp = mysql_connect("$hostp", "$userp", "$passp") or die(mysql_error());
	mysql_select_db("$dbnamep",$linkp) or die(mysql_error());
	mysql_query("SET NAMES UTF8");
}
function insert_tbp($query){
	ConnectToDB_prosecure();
	global $linkp;
	$objQuery = mysql_query($query,$linkp)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}
function delete_tbp($query){
	ConnectToDB_prosecure();
	global $linkp;
	$objQuery = mysql_query($query,$linkp)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}
function select_tbp($query){
	ConnectToDB_prosecure();
	global $linkp;
	$obj = mysql_query($query,$linkp)or die(mysql_error());
	while($ro = mysql_fetch_array($obj)){
		$rows[] = $ro;
	}
	return $rows;
}
function select_nump($query){
	ConnectToDB_prosecure();
	global $linkp;
	$obj = mysql_query($query,$linkp)or die(mysql_error());
	$numrow = mysql_num_rows($obj);
	return $numrow;
}
function update_tbp($query){
	ConnectToDB_prosecure();
	global $linkp;
	$objQuery = mysql_query($query,$linkp);
	if($objQuery){
		return true;
	}else{
		return false;
	}
}


function ConnectToDB_zynek() {
	global $linkz, $hostz, $userz, $passz, $dbnamez;

	//server zynek
	$hostz="localhost";
	$userz="zynekcc";
	$passz="PD846&wiC0dvx";
	$dbnamez="zynekcc_cctv";

	$linkz = mysql_connect("$hostz", "$userz", "$passz") or die(mysql_error());
	mysql_select_db("$dbnamez",$linkz) or die(mysql_error());
	mysql_query("SET NAMES UTF8");
}
function insert_tbz($query){
	ConnectToDB_zynek();
	global $linkz;
	$objQuery = mysql_query($query,$linkz)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}
function delete_tbz($query){
	ConnectToDB_zynek();
	global $linkz;
	$objQuery = mysql_query($query,$linkz)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}
function select_tbz($query){
	ConnectToDB_zynek();
	global $linkz;
	$obj = mysql_query($query,$linkz)or die(mysql_error());
	while($ro = mysql_fetch_array($obj)){
		$rows[] = $ro;
	}
	return $rows;
}
function select_numz($query){
	ConnectToDB_zynek();
	global $linkz;
	$obj = mysql_query($query,$linkz)or die(mysql_error());
	$numrow = mysql_num_rows($obj);
	return $numrow;
}
function update_tbz($query){
	ConnectToDB_zynek();
	global $linkz;
	$objQuery = mysql_query($query,$linkz);
	if($objQuery){
		return true;
	}else{
		return false;
	}
}


function ConnectToDB_innekt() {
	global $linki, $hosti, $useri, $passi, $dbnamei;

	//server zynek
	$hosti="localhost";
	$useri="innekt";
	$passi="innovative";
	$dbnamei="innekt_content";

	$linki = mysql_connect("$hosti", "$useri", "$passi") or die(mysql_error());
	mysql_select_db("$dbnamei",$linki) or die(mysql_error());
	mysql_query("SET NAMES UTF8");
}
function insert_tbi($query){
	ConnectToDB_innekt();
	global $linki;
	$objQuery = mysql_query($query,$linki)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}
function delete_tbi($query){
	ConnectToDB_innekt();
	global $linki;
	$objQuery = mysql_query($query,$linki)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}
function select_tbi($query){
	ConnectToDB_innekt();
	global $linki;
	$obj = mysql_query($query,$linki)or die(mysql_error());
	while($ro = mysql_fetch_array($obj)){
		$rows[] = $ro;
	}
	return $rows;
}
function select_numi($query){
	ConnectToDB_innekt();
	global $linki;
	$obj = mysql_query($query,$linki)or die(mysql_error());
	$numrow = mysql_num_rows($obj);
	return $numrow;
}
function update_tbi($query){
	ConnectToDB_innekt();
	global $linki;
	$objQuery = mysql_query($query,$linki);
	if($objQuery){
		return true;
	}else{
		return false;
	}
}

//// check hr-managment.php
function check_user($value,$colum){
	$sql = "SELECT *
					FROM admin
					WHERE ( ID_admin = '$value' ) ;";
	if (select_numz($sql)>0) {
		foreach (select_tbz($sql) as $row) {
			return $row[$colum];
		}
	}else {
		return "-";
	}
}
//// check  hr-managment.php
function check_hr_leave_disable($approve){
	$sql = "SELECT *
					FROM z_hr_leave
					WHERE ( (status_leave = '1' OR status_leave = '2' ) AND leave_id = '".$approve."' ) ;";
	if (select_numz($sql)>0) {
		return "disabled";
	}else {
		return "";
	}
}

















//// Support
function diff2time($time_a,$time_b){
    $now_time1		=	strtotime(date($time_a));
    $now_time2		=	strtotime(date($time_b));
    $time_diff		=	abs($now_time2-$now_time1);
    $time_diff_h	=	floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m	=	floor(($time_diff%3600)/60); // จำนวนนาทีที่ต่างกัน
    $time_diff_s	=	($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน
    return $time_diff_h.":".$time_diff_m.":".$time_diff_s;
}
//// Support
function detail_query($value,$value_id){

	if($value_id == 1){
		$value_data = " stss.name_type_sub_service ";
	}else{
		$value_data = " ssd.detail ";
	}
	$sql = "SELECT ".$value_data.",ssd.id_sup_service_detail,ssd.detail,ssdc.id
			FROM sup_service_detail ssd
			LEFT OUTER JOIN sup_type_sub_service stss  ON stss.id_sup_type_sup_service = ssd.id_sup_type_sub_service
			LEFT OUTER JOIN sup_service_detail_config ssdc  ON ssd.id_sup_service_detail = ssdc.id
			WHERE ssd.id_sup_service = '".$value."' GROUP BY ssdc.id ";
	$sat = "";
	if(select_numz($sql) > 0){
		$i=0;
		foreach(select_tbz($sql) as $ro){
			if(!empty($ro[3]) || $ro[2]!="-" ){
					if($i==0){
						if(empty($ro[0]) && $value_id == 1){
							$sat .= "<span class='dropt'>Other
									   <span>".$ro[2]."</span>
									 </span>";
						}else{
							$sat .= $ro[0];
						}
					}else{
						$sat .= ",<br />".$ro[0];
					}
					$i++;
			}
		}
	}
	return $sat;
}

// Support and Marketing view
function check_status_onsite_view($value){
	$da_1 = "";
	$sql_s = "SELECT app_status FROM sup_approve Where id_sup_onsite = '".$value."' ";
	if(select_numz($sql_s) > 0){
		foreach(select_tbz($sql_s) as $ro_s){
			if($ro_s[0] == "1"){
				$da_1 =  "1";
			}else if($ro_s[0] == "2"){
				$da_1 =  "2";
			}
		}
	}else{
		$da_1 =  "0";
	}
	return $da_1;
	// 0 รอการอนุมัติ
	// 1 อนุมันติแล้ว
	// 2 ไม่อนุมัติ
}




















//// product check string empty
function check_empty_space($str){
	if (empty($str)) {
		return "-";
	}else {
	 	$var = array(" ");
	  return str_replace($var,"-",$str);
	}
}

///// SEO Title Desctiption Page
function check_img_and_page($page,$value,$UrlIdSub){

  if ($page=="Main" || empty($page)  || $page=="AboutUs" || $page=="ContactUs" ) {
    return SITE_URL.'images/prosecure_960x560.jpg';
  }

  if ($page=="Product") {
		if (!empty($UrlIdSub)) {
			$json_string = "https://www.zynekcctv.com/json/json.php?op=product&pro_id=".$UrlIdSub;
	    $jsondata = file_get_contents($json_string);
	    $sql = json_decode($jsondata, true);
	    if (count($sql)>0) {
	      foreach ($sql  as $row) {
	        if ($row['pro_id']==$UrlIdSub) {
	          return "https://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png";
	        }
	      }
	    }
		}else {
			return SITE_URL.'images/prosecure_products_960x560.jpg';
		}
  }

  if ($page=="Download") {
    return SITE_URL.'images/prosecure_download_960x560.jpg';
  }

  if ($page=="Review") {
    if (empty($value)|| $value=="") {
      return SITE_URL.'images/prosecure_review_960x560.jpg';
    }else {
       $sqll = "SELECT *
             FROM news_gallery_all
             WHERE gal_status='1' AND gal_type_new = '1'AND  gal_id='".$value."'  AND gal_type = '3'
             ORDER BY gal_date DESC;";
        if(select_numz($sqll)>0){
          foreach(select_tbz($sqll) as $row){
            return "https://www.zynekcctv.com/web_admin/photogallery/gal_id_".$row['gal_id']."/thumb/thumb.jpg";
          }
        }
      }
    }


}
function check_title_and_page($page,$value,$UrlIdSub){

  if ($page=="Main" || empty($page)  || $page=="AboutUs" || $page=="ContactUs") {
    return "ProSecure ศูนย์รวมอุปกรณ์ความปลอดภัย จำหน่ายกล้องวงจรปิด ควบคุมประตู ระบบสแกนลายนิ้วมือ แบรนด์ชั่นนำระดับโลก เน้นบริการหลังการขาย";
  }

	if ($page=="book") {
    return "Brochure and CompanyProfile";
  }

	if ($page=="Product") {
    if (!empty($UrlIdSub)) {
      $json_string = "https://www.zynekcctv.com/json/json.php?op=product&pro_id=".$UrlIdSub;
      $jsondata = file_get_contents($json_string);
      $sql = json_decode($jsondata, true);
      if (count($sql)>0) {
        foreach ($sql  as $row) {
          if ($row['pro_id']==$UrlIdSub) {
						return "รุ่น ".$row['model']." | ".$row['pb_name']." | Price ".number_format($row['price_list'],0)." ฿";
						//return htmlspecialchars($row['model'], ENT_QUOTES);
          }
        }
      }else{
      		return "จัดจำหน่าย สินค้ากล้องวงจรปิด แบรนด์ innekt ของเราเอง มีพร้อมระบบควบคุมประตูและระบบสแกนลายนิ้วมือ เราเน้นบริการหลังการขาย";
			}
    }else {
			if ($value != "") {
			 $sqll = "SELECT pb_name,pb_id FROM price_brand WHERE pb_id ='".$value."' LIMIT 1 ;";
			 if (select_numz($sqll)>0) {
					foreach (select_tbz($sqll) as $row) {
						if ($value==$row['pb_id']) {
							 return $row['pb_name']." แบรนด์สินค้า และจัดจำหน่าย สินค้าอุปกรณ์ความปลอดภัย";
						}
					}
			 }
		 }else {
      	return "จัดจำหน่าย สินค้ากล้องวงจรปิด แบรนด์ innekt ของเราเอง มีพร้อมระบบควบคุมประตูและระบบสแกนลายนิ้วมือ เราเน้นบริการหลังการขาย";
		 }
    }
  }

	if ($page=="ContactUs") {
		    return "โทร.02-513-4330 Fax.02-513-4426 Email. info@prosecure.co.th บริษัท โปรซีเคียว จำกัด (สำนักงานใหญ่) 444 อาคารโอลิมเปียไทย พลาซ่า ชั้น 4 ถนนรัชดาภิเษก แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10310";
	}

  if ($page=="Download") {
    return "Download Firmware | Software | Manual | Present";
  }

  if ($page=="Review") {
			$sqll = "SELECT *
						FROM news_gallery_all
						WHERE gal_status='1' AND gal_type_new = '1' AND  gal_id='".$value."' AND gal_type = '3'
						ORDER BY gal_date DESC;";
			 if(select_numz($sqll)>0){
				 foreach(select_tbz($sqll) as $row){
					 return delete_char($row['gal_name']);
				 }
			 }else {
			 	return "วีดีโอสาธิตการใช้งาน";
			 }

  }

  if ($page=="Claim") {
    return "การแจ้งซ่อมสินค้า ProSecure ,iNNEKT ,Zynek";
  }

  if ($page=="Technicial") {
    return "การช่วยเหลือด้านเทคนิค ติดต่อฝ่ายเทคนิค ProSecure ,iNNEKT ,Zynek";
  }

  if ($page=="Seminar") {
		    return "งานสัมมนาต่างๆ";
	}
	if ($page=="News") {
		    return "ข่าวสารประชาสัมพันธ์งานต่างๆ";
	}
	if ($page=="Marketing") {
		    return "การประชาสัมพันธ์งานการตลาดต่างๆ";
	}
	if ($page=="Installer") {
		    return "ผลงานการติดตั้งแต่ละสาขา";
	}

  if ($page=="Branch") {
		    return "สาขาให้บริการ";
	}

	if ($page=="ShowRoom") {
		    return "โชว์รูม ภายใน zynekcctv";
	}

	if ($page=="PressRelease") {
		    return "ประกาศพร้อมเต็มสูบขึ้นแท่นผู้นำตลาด";
	}

	if ($page=="Search") {
		    return "ค้นหาสินค้า และคู่มือการใช้งานต่างๆ";
	}




}
function check_content_and_page($page,$value,$UrlIdSub){

  if ($page=="Main" || empty($page) || $page=="AboutUs") {
    return "ProSecure ศูนย์รวมอุปกรณ์ความปลอดภัย จำหน่ายกล้องวงจรปิด ควบคุมประตู ระบบสแกนลายนิ้วมือ กล้องวงจรปิดชัดที่สุด ต้อง iNNEKT แบรนด์ชั่นนำระดับโลก  iNNEKT Bio , iNNEKT Gate Barrier ";
  }

	if ($page=="Product") {
		if (!empty($UrlIdSub)) {
      $json_string = "https://www.zynekcctv.com/json/json.php?op=product&pro_id=".$UrlIdSub;
      $jsondata = file_get_contents($json_string);
      $sql = json_decode($jsondata, true);
      if (count($sql)>0) {
        foreach ($sql  as $row) {
          if ($row['pro_id']==$UrlIdSub) {
            //return htmlspecialchars($row['description'], ENT_QUOTES);
						return htmlspecialchars(strip_tags($row['description']), ENT_QUOTES);
          }
        }
      }else{
      	return "จัดจำหน่าย สินค้ากล้องวงจรปิด แบรนด์ innekt ของเราเอง มีพร้อมระบบควบคุมประตูและระบบสแกนลายนิ้วมือ เราเน้นบริการหลังการขาย";
      }
    }else {
			if (!empty($value)) {
      	$sql = "SELECT pb_name FROM price_brand WHERE pb_id='".$value."' ";
				if (select_numz($sql)>0) {
					 foreach (select_tbz($sql) as $row) {
					 	return $row['pb_name']." จัดจำหน่าย สินค้าอุปกรณ์ความปลอดภัย";
					 }
				}
      }else {
      return "จัดจำหน่าย สินค้ากล้องวงจรปิด แบรนด์ innekt ของเราเอง มีพร้อมระบบควบคุมประตูและระบบสแกนลายนิ้วมือ เราเน้นบริการหลังการขาย";
      }
    }
  }

  if ($page=="Download") {
    return "ดาวโหลดคู่มือการใช้งาน ,เฟิร์มแวร์และโปรแกรมต่างๆ หลากหลายรุ่น ";
  }

	if ($page=="ContactUs") {
		    return "โทร.02-513-4330 Fax.02-513-4426 Email. info@prosecure.co.th บริษัท โปรซีเคียว จำกัด (สำนักงานใหญ่) 444 อาคารโอลิมเปียไทย พลาซ่า ชั้น 4 ถนนรัชดาภิเษก แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10310";
	}

  if ($page=="Review") {
		 $sqll = "SELECT *
					FROM news_gallery_all
					WHERE ( gal_status='1' AND gal_type_new = '1' AND  gal_id='".$value."'  AND gal_type = '3')
					ORDER BY gal_date DESC;";
		 if(select_numz($sqll)>0){
			 foreach(select_tbz($sqll) as $row){
				 return delete_char(replace_char($row['gal_description']));
			 }
		 }
  }

  if ($page=="Seminar") {
		    return "งานงานสังานสัมมนาต่างๆ ทั่วประเทศ";
	}
	if ($page=="News") {
		    return "ข่าวสารต่างๆ";
	}
	if ($page=="Marketing") {
		    return "กิจกรรมทางการตลาด";
	}
	if ($page=="Installer") {
		    return "ผลงานการติดตั้งของสาขาทั้งหมด";
	}

	if ($page=="PressRelease") {
		    return "บริษัท โปรซีเคียว จำกัด ผู้นำเข้าและจัดจำหน่ายอุปกรณ์ความปลอดภัย ภายใต้แบรนด์ “โปรซีเคียว” (Prosecure) ประกาศพร้อมเต็มสูบเปิดตัว “ศูนย์รวมอุปกรณ์ความปลอดภัย : โปรซีเคียวช็อป” กว่า 47 สาขาทั่วประเทศ";
	}

	if ($page=="Search") {
		    return "ค้นหาสินค้า และสินค้าต่างๆในระบบ";
	}

	if ($page=="Claim") {
		    return "การแจ้งซ่อมสินค้าต่างๆ";
	}

	if ($page=="Technical") {
		    return "ความช่วยเหลือทางทีมงานเทคนิค";
	}

	if ($page=="Branch") {
		    return "สาขาพร้อมให้บริการทั่วประเทศ";
	}

	if ($page=="ShowRoom") {
		    return "โชว์รูม สาขาให้บริการ แสดงสินค้าต่างๆ ภายในร้าน";
	}

}

function datetime($value){
	$year = substr($value,0,4);
	$month = substr($value,5,2);
	$date = substr($value,8,2);

	$time = substr($value,11,8);
	$array_month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	return $date."-".$array_month[$month-1]."-".$year." ".$time;
}
function date_($value){
	$year = substr($value,0,4);
	$month = substr($value,5,2);
	$date = substr($value,8,2);
	$array_month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	return $date."-".$array_month[$month-1]."-".$year;
}
function date_thai_ch_normal($month){
	$array_month=array(
      "0"=>"",
      "1"=>"มกราคม",
      "2"=>"กุมภาพันธ์",
      "3"=>"มีนาคม",
      "4"=>"เมษายน",
      "5"=>"พฤษภาคม",
      "6"=>"มิถุนายน",
      "7"=>"กรกฎาคม",
      "8"=>"สิงหาคม",
      "9"=>"กันยายน",
      "10"=>"ตุลาคม",
      "11"=>"พฤศจิกายน",
      "12"=>"ธันวาคม"
  );
	return $array_month[$month];
}
function datetime_th($value){
	$year = substr($value,0,4);
	$month = substr($value,5,2);
	$date = substr($value,8,2);
	$time = substr($value,11,8);
	return $date." ".date_thai_ch_normal($month-0)." ".$year;
}
function class_app($val){
	if(strpos($val,"www.")==true || strpos($val,"https://")==true){
		return "<a href='".$val."' target='_blank' ";
	}else{
		return NULL;
	}
}
////view picture
function CHECK_THUMB($url_pic){
	echo "<img src='".$url_pic."thumb.png"."' class='hover_click' width='80' height='auto'>";
}
////view picture2
function CHECK_THUMB2($url_pic){

	echo "<img src='".$url_pic."thumb.png"."' class='col-xs-4 hover_click' width='80' height='auto' >";
}
/// Delete ASCII
function replace_char($txt){
	$find = array("amp;", "quot;", "amp;rdquo;", "amp;#39;", "amp;quot;", "amp;nbsp;", "nbsp;");
	return str_replace($find," ",$txt);
}
/// Delete br
function delete_char($txt){
	$find = array("<br>", "<br />", "<br/>");
	return str_replace($find," ",$txt);
}
function file_download_products_test($folder,$download_name){
	echo  "<a href='$folder' target='_blank'>$download_name</a><br/>";
	/*if(!file_exists($folder)){
		echo "-กำลังดำเนินการ-";
	}else{
		$objScan = scandir($folder);
		$i=0;
		foreach($objScan as $value){
			$file_name = $value ;
			$file_type = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
			$dir_files=$folder."/".$file_name;
			if(is_dir($dir_files)){

			}else{
				$file_urls="<a href='$dir_files' target='_blank'>$download_name</a><br/>";
				echo $file_urls;
			}
			$i++;
		}
	}*/
}
function getsize_image($value){
	list($width, $height) = getimagesize('$value');
	return $width."x".$height;
}
function file_export_zip($folder,$q){
	/*$folder = chmod($folder,777);
	if(!file_exists($folder)){
		echo "-";
	}else{
		$objScan = scandir($folder);
		$i=0;
		foreach($objScan as $value){
			$file_name = $value ;
			$file_type = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
			$dir_files=$folder."/".$file_name;
			if(is_dir($dir_files)){

			}else{
				echo "<input type='checkbox' name='files[]' value='".$dir_files."'  class='checkBoxClass_$q ck_test' /><br/>";
			}
			$i++;
		}
	}*/
}









//// title
function query_($page,$value){
	if(empty($value)){
		if($page=="product"){ return "รายการสินค้า";}
		if($page=="review"){ return "รีวิวใหม่";}
		if($page=="branch"){ return "สาขาใกล้บ้าน";}
		if($page=="about"){ return "เกี่ยวกับ โปรซีเคียว";}
		if($page=="contact"){ return "ติดต่อโปรซีเคียว ได้ที่";}
		if($page=="news"){ return "ข่าวสาร ประชาสัมพันธ์";}
		if($page=="download"){ return "รายการดาวโหลด ซอร์ฟแวร์ ต่างๆ";}
		if($page=="video"){ return "วีดีโอทั้งหมด";}
	}else{
		if($page=="review"){
			$SQL = "SELECT name_full FROM ps_eventnews WHERE event_id = '$value';";
			if(select_num($SQL)>0){
				foreach(select_tb($SQL) as $row){
					return $row[0];
				}
			}
		}if($page=="video"){
			$SQL = "SELECT name_video FROM ps_video WHERE video_id = '$value';";
			if(select_num($SQL)>0){
				foreach(select_tb($SQL) as $row){
					return $row[0];
				}
			}
		}if($page=="product"){
			$SQL = "SELECT * FROM price_brand WHERE pb_status='1' AND pb_id='$value' ORDER BY pb_name ASC";
			if(select_numz($SQL)>0){
				foreach(select_tbz($SQL) as $row){
					return $row['pb_name']." รายการสินค้า ";
				}
			}
		}if($page=="productdetail"){
			$SQL = "SELECT *
					FROM price_products,price_brand,price_brand_sub
					WHERE price_products.pb_id = price_brand.pb_id AND
						price_products.pbs_id = price_brand_sub.pbs_id AND
						price_products.pro_id = '$value' AND
						price_products.price_stus = '1' AND
						price_brand_sub.pbs_id != '4' AND
						price_brand_sub.pbs_status = '1'
					ORDER BY price_products.pd_sort ASC ;";
			if(select_numz($SQL)>0){
				foreach(select_tbz($SQL) as $row){
					return $row['model']." ยี่ห้อ : ".$row['pb_name'];
				}
			}
		}if($page=="news"){
			$SQL = "SELECT * FROM news_gallery_all WHERE gal_id='$value' and gal_status='1'; ";
			if(select_numz($SQL)>0){
				foreach(select_tbz($SQL) as $row){
					return delete_char(replace_char($row['gal_name']));
				}
			}
		}if($page=="download"){
			$SQL = "SELECT name_brand FROM name_brand WHERE ID_brand = '$value' ;";
			if(select_numz($SQL)>0){
				foreach(select_tbz($SQL) as $row){
					return $row['name_brand'];
				}
			}
		}
	}
}
///////
function update_view($amount,$id,$page){
	if($page=="article" ||$page=="review"){
		$update = "UPDATE ps_eventnews
			SET amount = amount+1
		   WHERE event_id = '$id' ";
		if(update_tb($update)==true){
			return ($amount+1);
		}else{
			return 0;
		}
	}
	if($page=="video"){
		$update = "UPDATE ps_video
			SET amount = amount+1
		   WHERE video_id = '$id' ";
		if(update_tb($update)==true){
			return ($amount+1);
		}else{
			return 0;
		}
	}
	if($page=="productdetail"){
		$update = "UPDATE ps_product
			SET view_amount = view_amount+1
		   WHERE product_id = '$id' ";
		if(update_tb($update)==true){
			return ($amount+1);
		}else{
			return 0;
		}
	}

}
function update_productview(){}



function check_member($value){
	$sql = "SELECT pm.fname,pm.lname FROM ps_member pm
			INNER JOIN ps_login pl ON pm.login_id = pl.login_id  WHERE pl.login_id = '$value'; ";
	if(select_num($sql)>0){
		foreach(select_tb($sql) as $row){
			return $row[0]." ".$row[1];
		}
	}
}

function sd($va,$page){
	if($va==$page){ return " active ";}
}

function base64url_encode($data) { return base64_encode($data); }

function base64url_decode($data) { return base64_decode($data); }

function check_on_off($value){
	if($value==1){
		return "<span style='font-size: 20px;color:#060;' class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span>";
	}else{
		return "<span style='font-size: 20px;color:#f00;' class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>";
	}
}
function if_on_off($value){
	if($value==1){
		return "glyphicon glyphicon-ok-circle";
	}else{
		return "glyphicon glyphicon-remove-circle";
	}
}

function name_cate($value){
	$sql = "SELECT name_cat FROM ps_category_product WHERE category_id = '$value'";
	if(select_num($sql)>0){
		foreach(select_tb($sql) as $row){
			return $row[0];
		}
	}
}
function type_select($value){
	$sql = "SELECT names_type FROM ps_type_product WHERE type_product_id = '$value'";
	if(select_num($sql)>0){
		foreach(select_tb($sql) as $row){
			return $row[0];
		}
	}
}
function ck_color($value){
	if($value==1){
		return "color:#060;";
	}else{
		return "color:#f00;";
	}
}
function chk_empty($value){
	return 	$value == "" ? "-" : $value;
}


//// Type Event
function chk_arct($value){
	$sql = "SELECT name_type FROM ps_type_event WHERE type_event_id = '$value' ";
	if(select_num($sql)>0){
		foreach(select_tb($sql) as $row){
			$data .= "<div class='a-a'>".substr($row[0],0,1)."</div><div class='a-b'>".$row[0]."</div>";
		}
		return $data;
	}
}

function bg_mini($value){

	if($value=='1'){
		return "style='background:#06c;'";
	}else if($value=='2'){
		return "style='background:#1CB67A;'";
	}else if($value=='3'){
		return "style='background:#AC63F7;'";
	}else if($value=='4'){
		return "style='background:;#089'";
	}else if($value=='5'){
		return "style='background:;#089'";
	}
}

function ckempty($value){
	if(empty($value) || $value=='0' || $value == ""){
		return "-";
	}else{
		return $value;
	}
}

function check_empty($value){
  if (empty($value) || $value=="-") {
    return "-";
  }else {
    return $value;
  }
}
function check_regular($value){
  $var = str_replace(',', '<br>', $value);
  return $var;
}




//// check data on cookie
function check_admin($id,$colum){
	$sql = "SELECT *
					FROM admin a
					INNER JOIN admin_group ag ON ( a.admin_status = ag.ID_admin_group )
					WHERE ( a.ID_admin = '".base64url_decode($id)."' ) ;";
	if (select_numz($sql)>0) {
		foreach (select_tbz($sql) as $row) {
			return $row[$colum];
		}
	}else {
		return "-";
	}
}
//// check data on cookie
function check_customer($id,$colum){
	$sql = "SELECT *
					FROM member m
					INNER JOIN member_group mg ON ( m.ID_mem_group = mg.ID_mem_group )
					WHERE ( m.member_id = '".base64url_decode($id)."' ) ;";
	if (select_numz($sql)>0) {
		foreach (select_tbz($sql) as $row) {
			return $row[$colum];
		}
	}else {
		return "-";
	}
}


//// Check Login SESSION ----> For SUN
function check_login_session_user(){
	if( empty($_SESSION["prosec_user_edit_privacy"]) &&
		empty($_SESSION["prosec_user_login_id"]) and
		empty($_SESSION["prosec_user_purchance"]) and
		empty($_SESSION["prosec_user_login_account"]) and
		empty($_SESSION["prosec_user_login_name_user"])and
		empty($_SESSION["prosec_user_login_title"]) ){
		return false;
	}else{
		return true;
	}
}
function check_login_session_admin(){
	if( empty($_SESSION["prosec_edit_privacy"]) and
		empty($_SESSION["prosec_login_id"]) and
		empty($_SESSION["prosec_user_login_name_admin"])and
		empty($_SESSION["prosec_title"]) ){
		return false;
	}else{
		return true;
	}
}
function chklink($value){
	if(strpos( $value, "www." )){
		return $value;
	}else{
		return $value==null?"#":SITE_URL.$value;
	}
}



//// list-price.php
function price_structure($cumtomer_type,$brand,$brand_sub){
	switch($cumtomer_type){

		case 8: /* บ้านปลอดภัย */

									$sql_structure ="SELECT pts_id,banplodpai FROM price_structure WHERE pb_id='$brand' AND pbs_id='$brand_sub'";
									$result_structure = mysql_query($sql_structure);
									$row_structure = mysql_fetch_array($result_structure);
									if($row_structure['pts_id']){
										$customer_sale = $row_structure['banplodpai'];
									}

									break;


		case 1: /* โปรซีเคียว */

									$sql_structure="SELECT pts_id,prosecure FROM price_structure WHERE pb_id='$brand' AND pbs_id='$brand_sub'";
									$result_structure = mysql_query($sql_structure);
									$row_structure = mysql_fetch_array($result_structure);
									if($row_structure['pts_id']){
										$customer_sale=$row_structure['prosecure'];
									}

									break;

		case 2: /* partner*/

									$sql_structure="SELECT pts_id,partner FROM price_structure WHERE pb_id='$brand' AND pbs_id='$brand_sub'";
									$result_structure = mysql_query($sql_structure);
									$row_structure = mysql_fetch_array($result_structure);
									if($row_structure['pts_id']){
										$customer_sale=$row_structure['partner'];
									}

									break;

		case 3: /* dealer*/

									$sql_structure="SELECT pts_id,partner FROM price_structure WHERE pb_id='$brand' AND pbs_id='$brand_sub'";
									$result_structure = mysql_query($sql_structure);
									$row_structure = mysql_fetch_array($result_structure);
									if($row_structure['pts_id']){
										$customer_sale=$row_structure['partner'];
									}

									break;

		case 4: /* reseller */

									$sql_structure="SELECT pts_id,partner FROM price_structure WHERE pb_id='$brand' AND pbs_id='$brand_sub'";
									$result_structure = mysql_query($sql_structure);
									$row_structure = mysql_fetch_array($result_structure);
									if($row_structure['pts_id']){
										$customer_sale=$row_structure['partner'];
									}

									break;

			case 7: /* new dealer */

									$sql_structure="SELECT pts_id,partner FROM price_structure WHERE pb_id='$brand' AND pbs_id='$brand_sub'";
									$result_structure = mysql_query($sql_structure);
									$row_structure = mysql_fetch_array($result_structure);
									if($row_structure['pts_id']){
										$customer_sale=$row_structure['partner'];
									}

									break;

			default :  $customer_sale=0;
	}
	return $customer_sale;
}
//// list-price.php
function CAL_PRICE_2($price_list,$percent){
	if($price_list<=0){
		return 0;
	}else{
		$price_sell=$price_list-($price_list*($percent/100));
		$price_sell=round($price_sell,2); // ทศนิยม 2 ตำแหน่ง
		$price_sell=number_format($price_sell, 2, '.', ',');
		return $price_sell;
	}
}
//// list-price.php
function CAL_PRICE($price_list,$percent){
	if($price_list<=0){
		return 0;
	}else{
			$price_sell=$price_list-($price_list*($percent/100));
			//$price_sell=round($price_sell); // ปัดเศษขึ้น 2 ตำแหน่ง
			//$price_sell=number_format($price_sell);
			//มีเศษปัดขึ้นทั้งหมด
			$price_sell=ceil($price_sell);
			return $price_sell;
	}
}




////// view stock  on forecast stock
function ViewStock($proid){
		$sql = "SELECT amount_last
						FROM for_stock
						WHERE ( pro_id = '$proid' )";
		if (select_numz($sql)>0) {
			foreach (select_tbz($sql) as $row) {
				return $row['amount_last'];
			}
		}else {
			return "-";
		}
}



?>
