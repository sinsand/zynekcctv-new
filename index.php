<?php
//require_once ('config/config.php');
require_once ('config/function.php');

if ($UrlPage!="" && $UrlPage!="sys" ) {
  /*echo "index<br>Path :".$Path."
        <br>Url :".$Url."
        <br>UrlPage :".$UrlPage."
        <br>UrlId :".$UrlId."
        <br>UrlIdSub :".$UrlIdSub."
        <br>UrlOther :".$UrlOther;*/
  //require_once ("system/index.php");
  require_once ("system/index.php");
}else if ($UrlPage=="sys") {
  require_once ("system/insys/index.php");
}else {
  //require_once ("under.php");
  require_once ("system/index.php");
} 
?>
