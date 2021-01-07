<?
require_once("../config/function.php");
if ( $_COOKIE[$CookieID]!="" && $_SESSION[$SessionID]!="" ) {
  
  $file = SITE_URL."file/price/".$_GET['file'];
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.basename($file).'"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file));
  readfile($file);
  exit();
}else {
  echo "ไม่สามารถดาวโหลดข้อมูลได้";
}


?>
