
<!-- jquerybanner S   -->
<script type="text/javascript" src="<?=SITE_URL;?>plugins/jquerybanner/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?=SITE_URL;?>plugins/jquerybanner/js/jssor.slider.mini.js"></script>
<script>

  function centerModal() {
      $(this).css('display', 'block');
      var $dialog = $(this).find(".modal-dialog");
      var offset = ($(window).height() - $dialog.height()) / 2;
      // Center modal vertically in window
      $dialog.css("margin-top", offset);
  }

  $('.modal').on('show.bs.modal', centerModal);
  $(window).on("resize", function () {
      $('.modal:visible').each(centerModal);
  });

  jQuery(document).ready(function ($) {

    var jssor_1_SlideoTransitions = [
      [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],
      [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],
      [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],
      [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],
      [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],
      [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],
      [{b:10000,d:2000,x:-379,e:{x:7}}],
      [{b:10000,d:2000,x:-379,e:{x:7}}],
      [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]
    ];

    var jssor_1_options = {
      $AutoPlay: true,
      $SlideDuration: 800,
      $SlideEasing: $Jease$.$OutQuint,
      $CaptionSliderOptions: {
        $Class: $JssorCaptionSlideo$,
        $Transitions: jssor_1_SlideoTransitions
      },
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$
      }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    function ScaleSlider() {
        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 1920);
            jssor_1_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
    ScaleSlider();
    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);




    var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_1_options);
    function ScaleSlider2() {
        var refSize = jssor_2_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 1920);
            jssor_2_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider2, 30);
        }
    }
    ScaleSlider2();
    $(window).bind("load", ScaleSlider2);
    $(window).bind("resize", ScaleSlider2);
    $(window).bind("orientationchange", ScaleSlider2);
    //responsive code end
});
</script>
<style>
  .jssorb05 {
      position: absolute;
  }
  .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
      position: absolute;
      /* size of bullet elment */
      width: 16px;
      height: 16px;
      background: url('<?php echo SITE_URL;?>jquerybanner/img/b05.png') no-repeat;
      overflow: hidden;
      cursor: pointer;
      display: none;
  }
  .jssorb05 div { background-position: -7px -7px; }
  .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
  .jssorb05 .av { background-position: -67px -7px; }
  .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
  .jssora22l, .jssora22r {
      display: block;
      position: absolute;
      /* size of arrow element */
      width: 40px;
      height: 58px;
      cursor: pointer;
      background: url('<?php echo SITE_URL;?>jquerybanner/img/a22.png') center center no-repeat;
      overflow: hidden;
  }
  .jssora22l { background-position: -10px -31px; }
  .jssora22r { background-position: -70px -31px; }
  .jssora22l:hover { background-position: -130px -31px; }
  .jssora22r:hover { background-position: -190px -31px; }
  .jssora22l.jssora22ldn { background-position: -250px -31px; }
  .jssora22r.jssora22rdn { background-position: -310px -31px; }
</style>
<div class="row" style="margin:0px;background:#fff;">
  <div class="register" style="margin:0px  auto;">
		<div class="row hidden-xs" style="margin:0px;">
	    <div class="col-lg-12 col-md-12" style="padding:0px;">
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1100px; height: 300px; overflow: hidden; visibility: hidden;">
          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
              <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px;  width: 1100px; height: 300px;"></div>
              <div style="position:absolute;display:block;background:url('<?php echo SITE_URL;?>jquerybanner/img/loading.gif') no-repeat center center;top:0px;left:0px; width: 1100px; height: 300px;"></div>
          </div>

  		    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1100px; height: 300px; overflow: hidden;">

            <?
            $sql = "SELECT *
                    FROM z_slide
                    WHERE (
                            ( str_date <= '".date("Y-m-d")."' AND  end_date >= '".date("Y-m-d")."' ) AND
                            status_open ='1'
                          )
                    ORDER BY order_by ASC;";
            //echo $sql;
            if (select_numz($sql)>0) {
                foreach (select_tbz($sql) as $row) {
                  ?><div data-p="225.00" style="display: none;">
                      <a href="<?=!empty($row['link_host'])?$row['link_host']:"#";?>">
                        <img data-u="image" class="lazy" src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL."file/slide/".$row['file_w'];?>" />
                      </a>
                    </div>
                  <?
                }
            }else {
              ?>
                <div data-p="225.00" style="display: none;">
                  <a href="#">
                    <img data-u="image" class="lazy" src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>images/w.jpg" />
                  </a>
                </div>
              <?
            }
            ?>
          </div>

          <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
              <div data-u="prototype" style="width:16px;height:16px;"></div>
          </div>
          <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
          <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>
      </div>
		</div>
		<div class="row hidden-sm hidden-md hidden-lg" style="margin:0px;">
	    <div class="col-lg-12 col-md-12" style="padding:0px;">
        <div id="jssor_2" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1000px; height: 600px; overflow: hidden; visibility: hidden;">
          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
              <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 1000px; height: 600px;"></div>
              <div style="position:absolute;display:block;background:url('<?=SITE_URL;?>plugins/jquerybanner/img/loading.gif') no-repeat center center;top:0px;left:0px; width: 1000px; height: 600px;"></div>
          </div>
          <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1000px; height: 600px; overflow: hidden;">
            <?
            $sql = "SELECT *
                    FROM z_slide
                    WHERE (
                            ( str_date >= '".date("Y-m-d")."' AND  end_date <= '".date("Y-m-d")."' ) AND
                            status_open ='1'
                          )
                    ORDER BY order_by ASC;";
            if (select_numz($sql)>0) {
                foreach (select_tbz($sql) as $row) {
                  ?><div data-p="225.00" style="display: none;">
                      <a href="<?=!empty($row['link_host'])?$row['link_host']:"#";?>">
                        <img data-u="image" class="lazy" src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL."file/slide/".$row['file_s'];?>" />
                      </a>
                    </div>
                  <?
                }
            }else {
              ?>
                <div data-p="225.00" style="display: none;">
                  <a href="#">
                    <img data-u="image" class="lazy" src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>images/s.jpg" />
                  </a>
                </div>
              <?
            }
            ?>
          </div>
          <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
              <div data-u="prototype" style="width:16px;height:16px;"></div>
          </div>
  	      <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
          <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>
      </div>
		</div>
  </div>
</div>
<!-- jquerybanner S -->


<!-- Dealer Login -->
<div class="row" style="background:url('<?=SITE_URL;?>images/bg_zynek.png') no-repeat center center #fff;margin:0px;">
  <div class="container" style="padding:50px 15px 20px 15px;">
    <div class="col-xs-12 col-sm-12" style="padding:0px">

      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="padding: 30px 15px;margin:10px 0px;">
        <div class="panel panel-default" style="padding:15px;border-radius:6px;">
        <p style="line-height: 1.8;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>บริษัท ซายเนค เทคโนโลยี่ จำกัด</b> ผู้นำเข้าจัดจำหน่าย กล้องวงจรปิด CCTV ภายใต้ตราสินค้า AVTECH iNNEKT ที่ได้รับการแต่งตั้งอย่างเป็นทางการ มีตัวแทนจำหน่ายพร้อมให้บริการ ทั่วประเทศ ด้วยเทคโนโลยี กล้องวงจรปิด ที่ทันสมัย  และทีมวิจัยพัฒนาอย่าง ต่อเนื่องของ AVTECH Corp ทำให้มีผู้ใช้มากที่สุดในโลก   หลายท่านจึงไว้วางใจ ที่จะเลือกใช้ ระบบกล้องวงจรปิด CCTV System ภายใต้ การดูแลให้บริการโดย AVTECH by ZYNEK
          บริษัทฯ ได้เป็นตัวแทนจำหน่าย กล้องวงจรปิด Panasonic CCTV ได้คัดเลือก นำเข้าเลนส์  EVETAR เลนส์ที่ใช้สำหรับกล้องวงจรปิดโดยเฉพาะ และอุปกรณ์เสริมต่างๆ ของ กล้องวงจรปิด CCTV เพื่อให้ครอบคลุม สมบูรณ์ ตามความต้องการใช้งานด้านระบบรักษาความปลอดภัย กล้องวงจรปิด CCTV ของลูกค้าเป็นสำคัญ</p>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 30px 0px;margin:10px 0px;">
          <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0 col-lg-12 col-lgoffset-0">
              <div class="modal-content" style="padding:15px;border-radius:6px;">
                <h2 style="color:#16994e;margin:25px 0;" class="text-center">Dealer Login</h2>


                <? if( $_COOKIE[$CookieID]=="" && $_SESSION[$SessionID]=="" ){ ?>
                    <!--- Form Login -->
                    <form autocomplete="off">
                      <div class="input-group" style="margin: 0px 0px 15px 0;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" id="log_username" placeholder="Username" autocomplete="off">
                      </div>
                      <div class="input-group" style="margin: 0px 0px 15px 0;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="log_password" placeholder="Password" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <button type="button" class="btn btn-lg" id="login_submit" style="width:100%;background:#16994e;color:#fff;padding: 8px;">Login</button>
                      </div>
                      <div class="form-group show_popup" id="show_login"> </div>
                    </form>
                    <!-- Script Login -->
                    <script>
                      $(document).ready(function(e) {
                          $("#log_username").focus();
                          $("#log_username").keypress(function(e) {
                              if(e.which==13){
                                  $("#log_password").focus();
                                  return false;
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
                                        window.location.href = '<?=SITE_URL;?>sys';
                                      },2000);

                                    }else {
                                      $(".show_popup").html(b[1]);
                                    }
                                  });
                                }
                                return false;
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
                                    window.location.href = '<?=SITE_URL;?>sys';
                                    //window.location.reload();
                                  },2000);

                                }else {
                                  $(".show_popup").html(b[1]);
                                }
                              });
                            }else {
                              $(".show_popup").html("<div class='alert alert-danger alert-dismissible' role='alert' style='margin:10px 0;'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> ข้อมูลระบบไม่ถูกต้อง </div>");
                            }
                          });
                      });
                    </script>
                    <!--- Form Login -->
                <? }elseif( $_COOKIE[$CookieID]!="" && $_SESSION[$SessionID]=="" ){ ?>
                  <div class="lockscreen ">
                    <div class="lockscreen-wrapper">

                      <div class="lockscreen-name text-center">สวัสดีคุณ <?=base64url_decode($_COOKIE[$CookieName]);?></div>

                      <!-- START LOCK SCREEN ITEM -->
                      <div class="lockscreen-item" style="border-radius: 4px;padding: 0;background: #fff;position: relative;margin: 10px auto 10px auto;width: 290px;">
                        <!-- lockscreen image -->
                        <div class="lockscreen-image" style="border-radius: 50%;position: absolute;left: -10px;top: -25px;background: #fff;padding: 5px;z-index: 10;display:none;">
                          <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=<?=base64url_decode($_COOKIE[$CookieName]);?>&w=200&h=200" alt="User Image" style="    border-radius: 50%;width: 70px;height: 70px;">
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
                                        window.location.href = "<?=SITE_URL."sys";?>";
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
                                            window.location.href = "<?=SITE_URL."sys";?>";
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
                        ป้อนรหัสผ่านเพื่อใช้งานระบบของคุณต่อไป
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
                  </div>
                <? }else { ?>
                  <div class="help-block text-center" style="margin:20px 0;">
                    <div class="lockscreen-name text-center">กำลังอยู่ในระบบของ <b>คุณ <?=base64url_decode($_COOKIE[$CookieName]);?></b></div>
                    <a href="<?=SITE_URL;?>sys" class="text-center btn btn-warning btn-active" style="margin:5px 0;" target="_parent">เข้าใช้งานในระบบต่อไป</a>
                  </div>
                  <div class="text-center">
                    <a style="cursor:pointer;" class="logout_system">ออกจากระบบ</a>
                    <script>
                      $(document).ready(function() {
                        $(".logout_system").click(function(e) {
                          $.post("../../new/jquery/others.php", { post :"clear_system" }, function(d){  window.location.reload(); });
                        });
                      });
                    </script>
                  </div>
                <? } ?>


              </div>
          </div>
      </div>


    </div>
  </div>
</div>
<!-- Dealer Login -->


<!-- Promotion -->
<div class="row" style="background:#fff;margin:50px 0 80px 0;">
  <div class="container" style="padding:0px;">
    <div class="col-xs-12" style="padding:0px">


        <h3 class="col-xs-12 text-center" ><a href="<?=SITE_URL;?>promotion">View Promotion</a></h3>

        <div class="col-xs-12" style="padding: 20px 15px;">
          <div class="col-xs-12" style="padding:0px">

            <?
              $sql = "SELECT *
                      FROM z_promotion
                      WHERE (
                              pro_status = '1' AND pro_group = 'U' AND
                              ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                            )
                      ORDER BY promotion_id DESC
                      LIMIT 4 ";
              if (select_numz($sql)>0) {
                foreach (select_tbz($sql) as $row) {
                  ?>
                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3"  style="padding:15px;">
                    <a class="link LinkPromotion col-sm-12" style="padding:0px;cursor:pointer;"  id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>"  data-toggle="modal" data-target="#modal-promotion" >
                      <img src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="lazy col-xs-12"  style="padding:0px"  />
                    </a>
                  </div>
                  <?
                }
              }else {
                ?>
                <a href="#" class="link hidden-xs col-sm-12 col-md-12 col-lg-12" style="padding:0px">
                  <img src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>images/promotion_coming_w.jpg" class="lazy col-xs-12"  style="padding:0px"  />
                </a>
                <a href="#" class="link col-xs-12 hidden-sm hidden-md hidden-lg" style="padding:0px">
                  <img src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>images/promotion_coming_s.jpg" class="lazy col-xs-12"  style="padding:0px"  />
                </a>
                <?
              }
            ?>

          </div>
        </div>

    </div>
  </div>
</div>

<!-- popup promotion -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".LinkPromotion").click(function(event) {
      $(".ViewLinkPromotion").attr("src",$(this).attr("id"));
    });
  });
</script>
<div class="modal fade" id="modal-promotion" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-search"></i> รายละเอียด โปรโมชั่น</h4>
      </div>

      <div class="modal-body" style="padding:0px;">
        <div class="row" style="margin:0px;">
          <div class="col-xs-12" style="padding:0px;">
            <img src="" class="col-xs-12 ViewLinkPromotion" style="padding:0px;">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- popup promotion -->

<!-- Promotion -->


<!-- Category -->
<div class="row animated fadeIn go slower " style="margin:0px;background:#16994e;color:#fff;">
  <div class="container" style="margin:0px  auto;padding:0px;">
    <div class="col-sm-12" style="padding:50px 0px;">

      <h3 class="col-xs-12 text-center" >Category</h3>


      <div class="col-xs-12 text-center" style="padding: 20px 15px;font-family: 'rsu_textregular';">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="col-xs-12 abcd animated-hover">
            <a href="<?=SITE_URL;?>regisdealer" class="col-sm-12 col-xs-12" style="background:#0c7b3c;font-size:16px;line-height: 1.9;padding:20px 0;">
              <i class="fa fa-user-plus fa-4x faa-tada" aria-hidden="true"></i><br>สมัครตัวแทน
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="col-xs-12 abcd animated-hover">
            <a href="<?=SITE_URL;?>seminar" class="col-sm-12 col-xs-12" style="background:#0c7b3c;font-size:16px;line-height: 1.9;padding:20px 0;">
              <i class="fas fa-chalkboard-teacher fa-4x faa-tada"></i><br>ตารางสัมมนา
            </a>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-6 col-md-3">
          <div class="col-xs-12 abcd animated-hover">
            <a href="<?=SITE_URL;?>technicial" class="col-sm-12 col-xs-12" style="background:#0c7b3c;font-size:16px;line-height: 1.9;padding:20px 0;">
              <i class="fas fa-user-cog fa-4x faa-tada" aria-hidden="true"></i><br>ช่วยเหลือ
            </a>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-6 col-md-3">
          <div class="col-xs-12 abcd animated-hover">
            <a href="<?=SITE_URL;?>jobs" class="col-sm-12 col-xs-12" style="background:#0c7b3c;font-size:16px;line-height: 1.9;padding:20px 0;">
              <i class="fas fa-hands-helping fa-4x faa-tada" aria-hidden="true"></i><br>ร่วมงานกับเรา
            </a>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>
<!-- Category -->



<!-- Blog & Review  -->
<div class="row animated fadeIn go slower " style="margin:0px;background:#fff;">
  <div class="container" style="margin:0px  auto;padding:0px;">
    <div class="col-sm-12" style="padding:0px 0px 50px 0px;">
        <div class="row" style="margin:0px;">

            <div class="col-xs-12 col-sm-12" style="padding:50px 0 0 0;">
              <h3 class="col-xs-12 text-center" >Review & Blog</h3>
            </div>
            <div class="col-xs-12 col-sm-12" style="padding:10px 0;">
              <?

              $sqll = "SELECT video_id,name_video,thumbnail_img FROM ps_video WHERE status_video = '1' ORDER BY create_date DESC LIMIT 6 ";
        			$sum = select_nump($sqll);
      				if($sum>0){ $i=0;
      					foreach(select_tbp($sqll) as $row){
              ?>
              <div class="col-lg-2 <?=$i>='8'?"hidden-md":"col-md-3";?> <?=$i>='4'?"hidden-sm":"col-sm-6";?> <?=$i>='4'?"hidden-xs":"col-xs-6";?> "  style="padding:0px;">
                <div class="col-xs-12"  style="padding:5px;">
                  <a href="<?=SITE_URL;?>review/<?=$row["video_id"];?>" class="col-xs-12 mouse_on2"> <!--  <?=$i=='0'?"mouse_on":"mouse_on2"?> -->
                    <div class="col-xs-12 photo_img" style="border-radius: 5px;  background-position: center;border-radius: 5px;background-size: cover;width: 100%;background-color: black;height: auto;background-image: url('http://www.prosecureshop.com/ma/path/video/<?=$row['thumbnail_img'];?>');">
                      <img src="<?=SITE_URL;?>images/loading.gif" style="display:none;" data-src="http://www.prosecureshop.com/ma/path/video/<?=$row['thumbnail_img'];?>" class="lazy photo_in" />
                      <div class="text-center hover_onmouse"><?=delete_char($row['name_video']);?></div>
                    </div>
                  </a>
                </div>
              </div>
              <? $i++;
                }
              }
              ?>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- End Blog & Review  -->



<!-- Category -->
<div class="row animated fadeIn go slower " style="margin:0px;background:#f3f3f3;color:#16994e;">
  <div class="container" style="margin:0px  auto;padding:0px;">
    <div class="col-sm-12" style="padding:10px 0px;">

      <h3 class="col-xs-12 text-left" >Weblink</h3>
      <div class="col-xs-12" style="margin:15px 0;">
        <div class="weblink_text">
          <a href="http://www.zynek.com/" target="_blank">Zynek</a>
          <a href="http://www.innekt.com/" target="_blank">iNNEKT</a>
          <a href="http://www.prosecureshop.com/" target="_blank">ProSecureShop</a>
          <a href="http://www.zynektechnologies.co.th/" target="_blank">Zynektechnologies.co.th</a>
        </div>
      </div>

      <style>
        div.weblink_text{
          line-height: 1.7; float: left;
        }
        div.weblink_text a{
          padding: 5px 15px;
          background: #636363;
          margin:4px 4px;
          display: inline-block;
          border-radius: 6px;
          color: #fff;
        }
        div.weblink_text a:hover{
          color: #e1e1e1;
          background: #929292;
          text-decoration: none;
        }
        a.link_button{
          font-weight: 400;
          float: left;
          font-size: 20px;
          display: block;
          padding: 20px 30px;
          border: 1px solid #929292;
          border-radius: 5px;
          text-align: center;
          color: #0e0e0e;
          box-shadow: 0 1px 3px #ccc;
          background: #bfbfbf;
        }
      </style>
      <div class="col-xs-12" style="margin:15px 0;display:none;">
          <a href="#" class="btn link_button">ติดต่อฝ่ายเคลม</a>
      </div>



    </div>
  </div>
</div>
<!-- Category -->
