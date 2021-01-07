
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="YhiSkFpqiRG1bg47XUim75_Xv2lbPt59fw2rYD8zhfA" />
  <link rel="shortcut icon" href="<?=SITE_URL;?>images/favicon.ico" type="image/x-icon">
  <title>Zynek Service System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/adminLTE/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/adminLTE/css/skins/_all-skins.min.css">



  <script src="<?=SITE_URL;?>plugins/jquery/dist/jquery.min.js"></script>
  <!--<script src="<?=SITE_URL;?>js/css3-animate-it.js"></script>-->
  <script src="<?=SITE_URL;?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/fastclick/lib/fastclick.js"></script>
  <script src="<?=SITE_URL;?>plugins/select2/dist/js/select2.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/adminLTE/js/adminlte.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/adminLTE/js/demo.js"></script>
  <script src="<?=SITE_URL;?>js/LazyLoad.js"></script>
  <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>
<body class=" <?if( $_COOKIE[$CookieID]=="" && $_SESSION[$SessionID]=="" ) { echo "hold-transition login-page"; }elseif( $_COOKIE[$CookieID]!="" && $_SESSION[$SessionID]=="" ) {   echo "hold-transition lockscreen";   }elseif( $_COOKIE[$CookieID]!="" && $_SESSION[$SessionID]!="" ){ echo "hold-transition skin-blue sidebar-mini"; } ?>">
<? if( $_COOKIE[$CookieID]=="" && $_SESSION[$SessionID]=="" ){ ?>
      <div class="login-box">
        <div class="login-logo">
          <a href="#"><b>Zynek</b> Service</a>
        </div>
        <div class="login-box-body">
          <p class="login-box-msg">เข้าสู่ระบบ เพื่อใช้งาน</p>


            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username" id="log_username" autocomplete="off">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" id="log_password" autocomplete="off">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">

                </div>
              </div>
              <div class="col-xs-4">
                <button type="button" class="btn btn-primary btn-block btn-flat" id="login_submit">Sign In</button>
              </div>
              <div class="col-xs-12 show_popup"></div>
            </div>


          <script>
            $(document).ready(function(e) {
                $("#log_username").focus();
                $("#log_username").keypress(function(e) {
                    if(e.which==13){
                        $("#log_password").focus();
                    }
                });
                $("#log_password").keypress(function(e) {
                    if(e.which==13){
                      if ($("#log_username").val() !="" && $("#log_password").val() !="") {
                        $.post("../../new/jquery/others.php",
                        {
                            _username :$("#log_username").val(),
                            _password :$("#log_password").val(),
                            post :"login"
                        },
                        function(data){
                          //alert(data);
                          var b = data.split("|||");
                          if (b[0]==1) {

                            $(".show_popup").html(b[1]);
                            setTimeout(function(data){
                              window.location.reload();
                            },2000);

                          }else {
                            $(".show_popup").html(b[1]);
                          }
                        });
                      }
                    }
                });
                $("#login_submit").click(function(e) {
                  if ($("#log_username").val() !="" && $("#log_password").val() !="") {
                    $.post("../../new/jquery/others.php",
                    {
                        _username :$("#log_username").val(),
                        _password :$("#log_password").val(),
                        post :"login"
                    },
                    function(data){
                      //alert(data);
                      var b = data.split("|||");
                      if (b[0]==1) {

                        $(".show_popup").html(b[1]);
                        setTimeout(function(data){
                          window.location.reload();
                        },2000);

                      }else {
                        $(".show_popup").html(b[1]);
                      }
                    });
                  }
                });
            });
          </script>




        </div>
      </div>
<? }elseif( $_COOKIE[$CookieID]!="" && $_SESSION[$SessionID]=="" ){ ?>
      <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
          <a><b>ZYNEK</b> Service</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"><?=base64url_decode($_COOKIE[$CookieName]);?></div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
          <!-- lockscreen image -->
          <div class="lockscreen-image">
            <img src="<?=SITE_URL;?>images/user_200x200.png" alt="User Image">
          </div>
          <!-- /.lockscreen-image -->

          <!-- lockscreen credentials (contains the form) -->
          <form class="lockscreen-credentials" name="pForm">
            <div class="input-group">
              <input type="password" class="form-control" id="log_password" placeholder="password">
              <div class="input-group-btn">
                <button type="button" class="btn click_check"><i class="fa fa-arrow-right text-muted"></i></button>
              </div>
            </div>
          </form>
          <script>
            $(document).ready(function(e) {
                $('form[name=pForm]').submit(function(){
                  return false;
                });
                $("#log_password").focus();
                $(".click_check").click(function(e) {
                  if ( $("#log_password").val() !="") {
                    $.post("../../new/jquery/others.php",
                    {
                        _password :$("#log_password").val(),
                        post :"check_login"
                    },
                    function(data){
                      var b = data.split("|||");
                      if (b[0]==1) {

                        $(".show_popup").html(b[1]);
                        setTimeout(function(data){
                          window.location.reload();
                        },2000);

                      }else {
                        $(".show_popup").html(b[1]);
                        return false;
                      }
                    });
                  }
                });
                $("#log_password").keypress(function(e) {
                    if(e.which==13){
                      if ( $("#log_password").val() !="") {
                        $.post("../../new/jquery/others.php",
                        {
                            _password :$("#log_password").val(),
                            post :"check_login"
                        },
                        function(data){
                          var b = data.split("|||");
                          if (b[0]==1) {

                            $(".show_popup").html(b[1]);
                            setTimeout(function(data){
                              window.location.reload();
                            },2000);

                          }else {
                            $(".show_popup").html(b[1]);
                            return false;
                          }
                        });
                      }
                    }
                });
            });
          </script>
          <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
          ป้อนรหัสผ่านเพื่อใช้งานระบบของคุณ
        </div>
        <div class="text-center">
          <a style="cursor:pointer;" class="logout_system">หรือ ลงชื่อเข้าใช้งานใหม่</a>
          <script>
            $(document).ready(function() {
              $(".logout_system").click(function(e) {
                $.post("../../new/jquery/others.php", { post :"clear_system" }, function(d){  window.location.reload(); });
              });
            });
          </script>
        </div>
        <div class="show_popup" style="margin:10px 0;"> </div>
      </div>
<? }elseif( $_COOKIE[$CookieID]!="" && $_SESSION[$SessionID]!="" ){ ?>
      <div class="wrapper">

        <header class="main-header">
          <a href="<?=SITE_URL;?>home" target="_blank" class="logo">
            <span class="logo-mini"><b>Z</b>YN</span>
            <span class="logo-lg"><b>Z</b>YNEK</span>
          </a>
          <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu" style="display:none;">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">คุณมีแจ้งเตือน 10 รายการ</li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                            page and may cause design problems
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-red"></i> 5 new members joined
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-user text-red"></i> You changed your username
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="footer"><a href="#">ดูทั้งหมด</a></li>
                  </ul>
                </li>
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=SITE_URL;?>images/user_200x200.png" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?=base64url_decode($_COOKIE[$CookieName]);?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="<?=SITE_URL;?>images/user_200x200.png" class="img-circle" alt="User Image">
                      <p> <?=base64url_decode($_COOKIE[$CookieName]);?>
                        <small><?=base64url_decode($_COOKIE[$CookieGroup]);?></small>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?=SITE_URL_ADMIN;?>profile" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                      </div>
                      <div class="pull-right">
                        <button data-toggle="modal" data-target="#modal-signout"  class="btn btn-warning btn-flat">ออกจากระบบ</button>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <aside class="main-sidebar">
          <section class="sidebar">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="<?=SITE_URL;?>images/user_200x200.png" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p style="white-space: initial; text-overflow: ellipsis; max-width: 140px;"><?=base64url_decode($_COOKIE[$CookieGroup]);?></p>
                <a href="<?=SITE_URL_ADMIN;?>#"><i class="fa fa-user text-success"></i> <?=base64url_decode($_COOKIE[$CookieName]);?></a>
              </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MENU SYSTEM</li>

              <? if (base64url_decode($_COOKIE[$CookieType])=="Admin") { ?>
                <? if (base64url_decode($_COOKIE[$CookieGroup])=="Webmaster" ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Claim"  ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Claim_admin" ) { ?>
                    <li class="treeview <?=$UrlId=="dashboard-claim"||$UrlId=="manage-claim"||$UrlId=="manage-claim-search"||$UrlId=="manage-claim-send"||$UrlId=="manage-claim-reportday"||$UrlId=="manage-claim-report"?" menu-open active":"";?>">
                      <a href="#">
                        <i class="fa fa-cogs"></i> <span>ฝ่ายเคลม</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li class="<?=$UrlId=="dashboard-claim"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>dashboard-claim"><i class="fa fa-caret-right"></i> สรุปงานเคลม</a></li>
                        <li class="<?=$UrlId=="manage-claim"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-claim"><i class="fa fa-caret-right"></i> งานเคลมสินค้า</a></li>
                        <li class="<?=$UrlId=="manage-claim-search"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-claim-search"><i class="fa fa-caret-right"></i> ค้นหางานซ่อม</a></li>
                        <li class="<?=$UrlId=="manage-claim-send"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-claim-send"><i class="fa fa-caret-right"></i> ยืนยันงานซ่อม</a></li>

                        <li class="<?=$UrlId=="manage-claim-reportday"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-claim-reportday"><i class="fa fa-caret-right"></i> รายงานซ่อมรายวัน</a></li>
                        <li class="<?=$UrlId=="manage-claim-report"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-claim-report"><i class="fa fa-caret-right"></i> รายงานซ่อมทั้งหมด</a></li>

                        <!--<li><a href="<?=SITE_URL_ADMIN;?>sys#"><i class="fa fa-check-circle"></i> ตรวจสอบ คืนสินค้า</a></li>
                        <li><a href="<?=SITE_URL_ADMIN;?>sys#"><i class="fa fa-check"></i> ตรวจสอบประกัน</a></li>-->
                      </ul>
                    </li>
                <? } ?>
                <? if (base64url_decode($_COOKIE[$CookieGroup])=="Webmaster" ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Support"  ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Support Manager"  ||
                       base64url_decode($_COOKIE[$CookieGroup])=="R&D" ) { ?>
                   <li class="treeview <?=$UrlId=="support-dashboard"||$UrlId=="call-service"||$UrlId=="onsite-service"||$UrlId=="support-problem"?" menu-open active":"";?>">
                     <a href="#">
                       <i class="fa fa-user-md"></i> <span>ฝ่ายเทคนิค</span>
                       <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                       </span>
                     </a>
                     <ul class="treeview-menu">
                       <li class="<?=$UrlId=="support-dashboard"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>support-dashboard"><i class="fa fa-caret-right"></i> สรุปงานเทคนิค</a></li>
                       <li class="<?=$UrlId=="call-service"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>call-service"><i class="fa fa-caret-right"></i> Call Service</a></li>
                       <li class="<?=$UrlId=="onsite-service"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>onsite-service"><i class="fa fa-caret-right"></i> Onsite Service</a></li>
                       <li class="<?=$UrlId=="support-problem"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>support-problem"><i class="fa fa-caret-right"></i> ข้อมูลปัญหา</a></li>
                     </ul>
                   </li>
                <? } ?>
                <? if (base64url_decode($_COOKIE[$CookieGroup])=="Webmaster") { ?>
                  <li class="treeview <?=$UrlId=="manage-member"||$UrlId=="manage-users"||$UrlId=="manage-promotion"||$UrlId=="manage-download"||$UrlId=="manage-seminar"||$UrlId=="manage-slide"?" menu-open active":"";?>">
                    <a href="#">
                      <i class="fa fa-user"></i> <span>จัดการข้อมูลระบบ</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="<?=$UrlId=="manage-member"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-member"><i class="fa fa-users"></i> ข้อมูลลูกค้า</a></li>
                      <li class="<?=$UrlId=="manage-users"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-users"><i class="fa fa-user"></i> ข้อมูลพนักงาน</a></li>
                      <li class="<?=$UrlId=="manage-promotion"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-promotion"><i class="fa fa-tag"></i> โปรโมชั่น</a></li>
                      <li class="<?=$UrlId=="manage-download"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-download"><i class="fa fa-download"></i> ดาวโหลด</a></li>
                      <li class="<?=$UrlId=="manage-seminar"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-seminar"><i class="fa fa-address-card"></i> งานสัมมนา</a></li>
                      <li class="<?=$UrlId=="manage-slide"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-slide"><i class="fa fa-picture-o"></i> แบนเนอร์สไลด์</a></li>
                    </ul>
                  </li>

                  <li class="treeview <?=$UrlId=="manage-users"||$UrlId=="manage-view-holiday"||$UrlId=="manage-permission-approve"||$UrlId=="manage-jobs"?" menu-open active":"";?>">
                    <a href="#">
                      <i class="fa fa-user"></i> <span>ฝ่ายบุคคล</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="<?=$UrlId=="manage-users"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-users"><i class="fa fa-caret-right"></i> ข้อมูลพนักงาน</a></li>
                      <li class="<?=$UrlId=="manage-view-holiday"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday"><i class="fa fa-caret-right"></i> ข้อมูลลางาน</a></li>
                      <li class="<?=$UrlId=="manage-permission-approve"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-permission-approve"><i class="fa fa-caret-right"></i> จัดการสิทธิ์การลา</a></li>
                      <li class="<?=$UrlId=="manage-jobs"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-jobs"><i class="fa fa-caret-right"></i> ข้อมูลสมัครงาน</a></li>
                    </ul>
                  </li>
                <? } ?>
                <?
                  if (base64url_decode($_COOKIE[$CookieGroup])=="Webmaster") {
                    ?>
                    <li class="treeview <?=$UrlId=="manage-new-price"||$UrlId=="manage-view-price"||$UrlId=="manage-show-price"||$UrlId=="manage-structure-price"||$UrlId=="manage-category"?" menu-open active":"";?>">
                      <a href="#">
                        <i class="fa fa-tags"></i> <span>ฝ่ายสินค้า</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li class="<?=$UrlId=="manage-new-price"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-new-price"><i class="fa fa-caret-right"></i> เพิ่มสินค้า</a></li>
                        <li class="<?=$UrlId=="manage-view-price"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-view-price"><i class="fa fa-caret-right"></i> ราคาสินค้า</a></li>
                        <li class="<?=$UrlId=="manage-show-price"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-show-price"><i class="fa fa-caret-right"></i> การแสดงราคาสินค้า</a></li>
                        <li class="<?=$UrlId=="manage-category"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-category"><i class="fa fa-caret-right"></i> หมวดสินค้า</a></li>
                        <li class="<?=$UrlId=="manage-structure-price"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-structure-price"><i class="fa fa-caret-right"></i> โครงสร้างราคา</a></li>
                      </ul>
                    </li>
                    <?
                  }
                ?>

                <?
                  if (base64url_decode($_COOKIE[$CookieGroup])=="HR") {
                    ?>
                    <li class="treeview <?=$UrlId=="manage-users"||$UrlId=="manage-view-holiday"||$UrlId=="manage-permission-approve"||$UrlId=="manage-jobs"?" menu-open active":"";?>">
                      <a href="#">
                        <i class="fa fa-user"></i> <span>ฝ่ายบุคคล</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li class="<?=$UrlId=="manage-users"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-users"><i class="fa fa-caret-right"></i> ข้อมูลพนักงาน</a></li>
                        <li class="<?=$UrlId=="manage-view-holiday"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday"><i class="fa fa-caret-right"></i> ข้อมูลลางาน</a></li>
                        <li class="<?=$UrlId=="manage-permission-approve"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-permission-approve"><i class="fa fa-caret-right"></i> จัดการสิทธิ์การลา</a></li>
                        <li class="<?=$UrlId=="manage-jobs"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>manage-jobs"><i class="fa fa-caret-right"></i> ข้อมูลสมัครงาน</a></li>
                      </ul>
                    </li>
                    <?
                  }
                ?>


                <? if (base64url_decode($_COOKIE[$CookieGroup])=="Webmaster" ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Sale" ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Talasale" ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Talasale Manager" ||
                       base64url_decode($_COOKIE[$CookieGroup])=="Sale Manager") { ?>
                  <li class="<?=$UrlId=="sale-onsite"?"active":"";?>">
                    <a href="<?=SITE_URL_ADMIN;?>sale-onsite">
                      <i class="fa fa-handshake-o"></i> <span>ฝ่ายขาย</span>
                    </a>
                  </li>
                  <li class="<?=$UrlId=="feedback"?"active":"";?>">
                    <a href="<?=SITE_URL_ADMIN;?>feedback">
                      <i class="fa fa-question-circle"></i> <span>Feedback</span>
                      <span class="pull-right-container">
                        <?
                          $sql_status = " SELECT fb_comment
                                          FROM pr_feedback
                                          WHERE ( fb_status = '0' );";
                          if (select_numz($sql_status)>0) {
                            ?><small class="label pull-right bg-red"><?=select_numz($sql_status);?></small><?
                          }
                        ?>
                      </span>
                    </a>
                  </li>
                <? } ?>
                  <li class="<?=$UrlId=="search-customer"?"active":"";?>">
                    <a href="<?=SITE_URL_ADMIN;?>search-customer">
                      <i class="fa fa-users"></i> <span>ข้อมูลลูกค้า</span>
                    </a>
                  </li>
                  <li class="<?=$UrlId=="holiday"?"active":"";?>">
                    <a href="<?=SITE_URL_ADMIN;?>holiday">
                      <i class="fa fa-user"></i> <span>ระบบลางาน</span>
                    </a>
                  </li>
                  <li class="<?=$UrlId=="borrow-product"?"active":"";?>">
                    <a href="<?=SITE_URL_ADMIN;?>borrow-product">
                      <i class="fa fa-product-hunt"></i> <span>สินค้ายืมคืน</span>
                    </a>
                  </li>

                  <li class="treeview <?=$UrlId=="control-forecasting-task"||$UrlId=="control-schedule"||$UrlId=="control-product-order"||$UrlId=="control-forecasting-report"||$UrlId=="control-stock"?" menu-open active":"";?>">
                    <a href="#">
                      <i class="fa fa-car"></i> <span>forecasting</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="<?=$UrlId=="control-stock"?"active":"";?>">
                        <a href="<?=SITE_URL_ADMIN;?>control-stock"><i class="fa fa-caret-right"></i> Stock
                          <span class="pull-right-container">
                            <span class="label label-danger pull-right"><?=select_numz("SELECT pro_id FROM for_stock");?></span>
                          </span>
                        </a>
                      </li>
                      <li class="<?=$UrlId=="control-schedule"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>control-schedule"><i class="fa fa-caret-right"></i> Schedule</a></li>
                      <li class="<?=$UrlId=="control-product-order"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>control-product-order"><i class="fa fa-caret-right"></i> Productview</a></li>
                      <li class="<?=$UrlId=="control-forecasting-task"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>control-forecasting-task"><i class="fa fa-caret-right"></i> Forecasting</a></li>
                      <li class="<?=$UrlId=="control-forecasting-report"?"active":"";?>"><a href="<?=SITE_URL_ADMIN;?>control-forecasting-report"><i class="fa fa-caret-right"></i> Report</a></li>
                    </ul>
                  </li>


                  <li class="header">MENU OTHERS</li>
              <? } ?>











              <li class="<?=$UrlId=="dashboard"||$UrlId==""?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>dashboard">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="<?=$UrlId=="policy"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>policy">
                  <i class="fa fa-info-circle"></i> <span>นโยบาย</span>
                </a>
              </li>
              <li class="<?=$UrlId=="profile"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>profile">
                  <i class="fa fa-vcard-o"></i> <span>ข้อมูลส่วนตัว</span>
                </a>
              </li>
              <li class="<?=$UrlId=="promotion"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>promotion">
                  <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>โปรโมชั่น</span>
                </a>
              </li>
              <li class="<?=$UrlId=="price"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>price">
                  <i class="fa fa-tags"></i> <span>ราคาสินค้า</span>
                </a>
              </li>
              <li class="<?=$UrlId=="check-warranty"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>check-warranty">
                  <i class="fa fa-check-square-o"></i> <span>ตรวจสอบประกัน</span>
                </a>
              </li>
              <li class="<?=$UrlId=="structure-price"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>structure-price">
                  <i class="fa fa-tag"></i> <span>โครงสร้างราคา</span>
                </a>
              </li>
              <li class="<?=$UrlId=="view-check-claim"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>view-check-claim">
                  <i class="fa fa-search"></i> <span>ค้นหางานซ่อม</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-primary">
                      <?
                        $sql_3 = "SELECT pc.*
                                  FROM product_claim pc
                                  INNER JOIN member m ON ( m.username = pc.username AND m.user_new = pc.username )
                                  WHERE (  m.member_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                          ( pc.dateprint = '0000-00-00' OR pc.dateprint != '0000-00-00' ) AND
                                           pc.date_complete != '0000-00-00 00:00:00' AND
                                           pc.date_sand_product = '0000-00-00'
                                        ) ";
                        echo select_numz($sql_3);
                      ?>
                    </small>
                    <small class="label pull-right bg-yellow">
                      <?
                        $sql_2 = "SELECT pc.*
                                  FROM product_claim pc
                                  INNER JOIN member m ON ( m.username = pc.username AND m.user_new = pc.username )
                                  WHERE (  m.member_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                           pc.repair='0' AND
                                           pc.processing = '1' AND
                                           pc.num_job = '' AND
                                           pc.date_complete = '0000-00-00' AND
                                           pc.dateprint = '0000-00-00' AND
                                           pc.date_sand_product = '0000-00-00'
                                        ) ";
                        echo select_numz($sql_2);
                      ?>
                    </small>
                    <small class="label pull-right bg-red">
                      <?
                        $sql_1 = "SELECT pc.*
                                  FROM product_claim pc
                                  INNER JOIN member m ON ( m.username = pc.username AND m.user_new = pc.username )
                                  WHERE (  m.member_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                           pc.repair='0' AND
                                           pc.processing != '1' AND
                                           pc.num_job = '' AND
                                           pc.date_complete = '0000-00-00' AND
                                           pc.dateprint = '0000-00-00' AND
                                           pc.date_sand_product = '0000-00-00'
                                        ) ";
                        echo select_numz($sql_1);
                      ?>
                    </small>
                  </span>
                </a>
              </li>
              <li class="<?=$UrlId=="download"?"active":"";?>">
                <a href="<?=SITE_URL_ADMIN;?>download">
                  <i class="fa fa-download"></i> <span>ดาวโหลด</span>
                </a>
              </li>


            </ul>
          </section>
        </aside>
        <div class="content-wrapper">
          <section class="content-header">
            <h1><small><?=!empty($UrlId)?ucwords(str_replace("-"," ",$UrlId)):"Dashboard";?></small></h1>
            <ol class="breadcrumb">
              <li><a href="<?=SITE_URL_ADMIN.$UrlId;?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
          </section>
          <section class="content">
            <?
              switch (trim($UrlId)) {

                /// Admin
                case 'holiday'            :   include("view-holiday.php");  break;
                case 'search-customer'    :   include("view-customer-data.php");  break;
                case 'feedback'           :   include("view-feedback.php");  break;


                /// all user
                case 'dashboard'          :   include("main-dashboard.php");  break;
                case 'profile'            :   include("view-profile.php");  break;
                case 'price'              :   include("view-list-price.php");  break;
                case 'download'           :   include("view-download-data.php");  break;
                case 'policy'             :   include("view-policy.php");  break;
                case 'view-check-claim'   :   include("view-check-claim.php");  break;
                case 'promotion'          :   include("view-promotion.php");  break;
                case 'structure-price'    :   include("view-structure-price.php");  break;
                case 'check-warranty'     :   include("view-warranty.php");  break;





                /// manage HR
                case 'manage-view-holiday'     :   include("hr-managment.php");  break;
                case 'manage-permission-approve'     :   include("hr-report.php");  break;


                case 'manage-member'      :   include("m-member.php");  break;
                case 'manage-users'       :   include("m-users.php");  break;
                case 'manage-promotion'   :   include("m-promotion.php");  break;
                case 'manage-download'    :   include("m-download.php");  break;
                case 'manage-seminar'     :   include("m-seminar.php");  break;
                case 'manage-jobs'        :   include("m-jobs.php");  break;
                case 'manage-slide'       :   include("m-slide.php");  break;


                /// Product
                case 'manage-new-price'   :   include("m-price.php");  break;
                case 'manage-view-price'  :   include("m-view-price.php");  break;
                case 'manage-show-price'  :   include("m-show-price.php");  break;
                case 'manage-category'    :   include("m-category.php");  break;
                case 'manage-structure-price'  :   include("m-structure-price.php");  break;


                /// sale
                case 'sale-onsite'        :   include("sl-sale.php");  break;
                case 'borrow-product'     :   include("sl-borow.php");  break;



                /// claim
                case 'manage-claim'       :   include("c-main-claim.php");  break;
                case 'dashboard-claim'    :   include("c-claim-dashboard.php");  break;
                case 'manage-claim-send'  :   include("c-claim-send.php");  break;
                case 'manage-claim-search':   include("c-main-claim-search.php");  break;

                case 'manage-claim-reportday':   include("c-main-claim-reportday.php");  break;
                case 'manage-claim-report':   include("c-main-claim-report.php");  break;

                /// support
                case 'call-service'       :   include("s-call-service.php");  break;
                case 'onsite-service'     :   include("s-onsite.php");  break;
                case 'support-problem'    :   include("s-problem.php");  break;
                case 'support-dashboard'  :   include("s-dashboard.php");  break;



                /// Forecasting
                case 'control-schedule'             :   include("control-schedule-task.php");  break;
                case 'control-stock'                :   include("control-stock.php");  break;
                case 'control-stock-copy'                :   include("control-stock-copy.php");  break;
                case 'control-product-order'        :   include("control-product-order.php");  break;
                case 'control-forecasting-task'     :   include("control-forecast-task.php");  break;
                case 'control-forecasting-report'   :   include("control-forecasting-report.php");  break;




                default                     :  include("main-dashboard.php"); break;
              }
            ?>
          </section>
        </div>

        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
          </div>
          <strong><a href="#"></a>ติดต่อ สำนักงานใหญ่. 02 274 1389 </strong>
        </footer>
        <div class="control-sidebar-bg"></div>
      </div>
      <!-- SignOut   -->
      <div class="modal fade" id="modal-signout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="color: white;background-color: #f00;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon glyphicon-lock" style=" color: #FFF"></span> ออกจากระบบ</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group" style="text-align: center; margin: 0;">
                  <div class="control-label" id="show_log_approve" style="padding:25px 0;">ยืนยัน ออกจากระบบ</div>
                </div>
              </form>
            </div>
            <div class="modal-footer" style="background-color: white; text-align: center;">
              <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal" id="">ยกเลิก</button>
              <button type="button" style="width: 48%;float:right;" class="btn btn-danger logout_system" id="">ตกลง</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $(".logout_system").click(function(e) {
            $.post("../../new/jquery/others.php", { post :"clear_system" }, function(d){  window.location.reload(); });
          });
        });
      </script>
      <!-- end  SignOut  -->
<? } ?>
</body>
</html>
