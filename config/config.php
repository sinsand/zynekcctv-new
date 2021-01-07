<?
ob_start() ;
session_start();
header("content-type: text/html; charset=utf-8");
date_default_timezone_set("utc");


global $Link, $Host, $User, $Pass, $DBname;
global $CookieID,$CookieUserID,$CookieName,$CookieGroup,$CookieType;
global $SessionID,$SessionUserID,$SessionName,$SessionGroup,$SessionType;

$LinkWeb 		= "https://".$_SERVER['HTTP_HOST']."/new/";
//$LinkLocal 	= "https://localhost/";
$LinkPath 		  = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$LinkHostWeb 		= "https://".$_SERVER['HTTP_HOST']."/";
//$LinkHostLocal 	= "https://".$_SERVER['HTTP_HOST']."/job-serivce/";
$LinkHostAdmin  = "e-sys";



/// type status
$TypeStatus[1] = "1"; ///
$TypeStatus[2] = "2"; ///
$TypeStatus[3] = "3"; ///
$TypeStatus[4] = "4"; ///
$TypeStatus[5] = "5"; ///




if( $_SERVER["HTTP_HOST"] == $LinkWeb ||
    $_SERVER["HTTP_HOST"] ==  "https://www.zynekcctv.com" ||
    $_SERVER["HTTP_HOST"] ==  "www.zynekcctv.com"  ||
    $_SERVER["HTTP_HOST"] ==  "zynekcctv.com"
  ){
  define(SITE_URL,$LinkHostWeb);
  define(SITE_URL_ADMIN,$LinkHostWeb.$LinkHostAdmin);
}

if( $_SERVER["HTTP_HOST"] == $LinkLocal ||
    $_SERVER["HTTP_HOST"] == "localhost" ){
	define(SITE_URL,$LinkHostLocal);
  define(SITE_URL_ADMIN,$LinkHostLocal.$LinkHostAdmin);
}


/// Session and Cookie Admin
$CookieID = 'C_UID'; //ID_admin
$CookieUserID = 'C_USERID';
$CookieName = 'C_UNAME'; //name_admin
$CookieGroup = 'C_UGROUP'; //mem_group_name
$CookieType = 'C_UTYPE'; //Admin - Customer

$SessionID = 'S_UID'; // Member_id
$SessionUserID = 'S_USERID';
$SessionName = 'S_UNAME'; //Company
$SessionGroup = 'S_UGROUP'; //member_group
$SessionType = 'S_UTYPE'; //Admin - Customer


global $CookieID,$CookieUserID,$CookieName,$CookieGroup,$CookieType;
global $SessionID,$SessionUserID,$SessionName,$SessionGroup,$SessionType;


function ConnectToDB() {
	global $Link, $Host, $User, $Pass, $DBname;
	if(   $_SERVER["HTTP_HOST"] == "https://www.zynekcctv.com" ||
		  	$_SERVER["HTTP_HOST"] == "zynekcctv.com"  ||
		  	$_SERVER["HTTP_HOST"] == "www.zynekcctv.com" ){
		//server
		$Host = "localhost";
		$User = "itcctvpr_itpro2";
		$Pass = "yimm2527";
		$DBname = "itcctvpr_itpro2";

	}

	$Link = mysql_connect($Host,$User,$Pass) or die(mysql_error());
	mysql_select_db($DBname,$Link) or die(mysql_error());
	mysql_query("SET NAMES UTF8");
}

function insert_tb($query){
	ConnectToDB();
	global $Link;
	$objQuery = mysql_query($query,$Link)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}

function delete_tb($query){
	ConnectToDB();
	global $Link;
	$objQuery = mysql_query($query,$Link)or die(mysql_error());
	if($objQuery){
		return true;
	}else{
		return false;
	}
}

function select_tb($query){
	ConnectToDB();
	global $Link;
	$obj = mysql_query($query,$Link)or die(mysql_error());
	while($ro = mysql_fetch_array($obj)){
		$rows[] = $ro;
	}
	return $rows;
}

function select_num($query){
	ConnectToDB();
	global $Link;
	$obj = mysql_query($query,$Link)or die(mysql_error());
	$numrow = mysql_num_rows($obj);
	return $numrow;
}

function update_tb($query){
	ConnectToDB();
	global $Link;
	$objQuery = mysql_query($query,$Link);
	if($objQuery){
		return true;
	}else{
		return false;
	}
}

function base64url_encode($data) { return base64_encode($data); }

function base64url_decode($data) { return base64_decode($data); }






?>
