<!-- Report -->
<?
  if (base64url_decode($_SESSION[$SessionType])=="Customer") {
    ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
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
              </h3>
              <p>ได้รับสินค้าแล้ว รอตรวจสอบ</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-round"></i>
            </div>
            <a href="<?=SITE_URL_ADMIN;?>" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
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
              </h3>
              <p>ดำเนินการซ่อม</p>
            </div>
            <div class="icon">
              <i class="ion ion-loop"></i>
            </div>
            <a href="<?=SITE_URL_ADMIN;?>" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
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
              </h3>
              <p>ซ่อมเสร็จและรอสินค้านำส่งคืน</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?=SITE_URL_ADMIN;?>" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?
                  $sql_4 = "SELECT pc.*
                            FROM product_claim pc
                            INNER JOIN member m ON ( m.username = pc.username AND m.user_new = pc.username )
                            WHERE (  m.member_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                     pc.num_job != '' AND
                                     pc.date_complete != '0000-00-00' AND
                                     pc.dateprint != '0000-00-00' AND
                                     pc.date_sand_product != '0000-00-00'
                                  ) ";
                  echo select_numz($sql_4);
                ?>
              </h3>
              <p>เสร็จสมบูรณ์</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
            <a href="<?=SITE_URL_ADMIN;?>" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    <?
  }
?>
<!-- End Report -->




<!--- Check Claim -->
<div class="row">
    <div class="col-lg-6 col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#checkclaim" data-toggle="tab">ตรวจสอบรายการงานซ่อมทั้งหมด</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="checkclaim">
            <div class="active tab-pane" id="settings">
              <div style="padding:0 0 20px 0;">
                  <div class="input-group input-group-md">
                    <input type="text" class="form-control"  id="sn_check" placeholder="Serial Number">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" id="btn_sn_check">ค้นหา!</button>
                        </span>
                  </div>
              </div>
              <ul class="timeline timeline-inverse" style="display:none;">
                    <li class="time-label">
                      <span class="bg-red"> 10 Feb. 2014 </span>
                    </li>
                    <li>
                      <i class="fa fa-envelope bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">Read more</a>
                          <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user bg-aqua"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-comments bg-yellow"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-green">
                            3 Jan. 2014
                          </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
              <div id="view_sn_check">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<style>
  .table-responsive{
    border: none !important;
  }
  .wrapper_in {
    width: 100%;
    font-size: 16px;
    padding: 20px 0;
  }
  .StepProgress {
    position: relative;
    padding-left: 45px;
    list-style: none;
  }
  .StepProgress::before {
    display: inline-block;
    content: '';
    position: absolute;
    top: 0;
    left: 15px;
    width: 10px;
    height: 100%;
    border-left: 2px solid #CCC;
  }
  .StepProgress-item {
    position: relative;
    counter-increment: list;
  }
  .StepProgress-item:not(:last-child) {
    padding-bottom: 20px;
  }
  .StepProgress-item::before {
    display: inline-block;
    content: '';
    position: absolute;
    left: -30px;
    height: 100%;
    width: 10px;
  }
  .StepProgress-item::after {
    content: '';
    display: inline-block;
    position: absolute;
    top: 0;
    left: -37px;
    width: 17px;
    height: 17px;
    border: 2px solid #CCC;
    border-radius: 50%;
    background-color: #FFF;
  }
  .StepProgress-item.is-done::before {
    border-left: 2px solid green;
  }
  .StepProgress-item.is-done::after {
    content: "✔";
    font-size: 11px;
    color: #fff !important;
    text-align: center;
    border: 2px solid green;
    background-color: green;
  }
  .StepProgress-item.current::before {
    border-left: 2px solid #f00;
  }
  .StepProgress-item.current::after {
    content: counter(list);
    padding-top: 0px;
    width: 19px;
    height: 19px;
    top: 0px;
    left: -38px;
    font-size: 12px;
    text-align: center;
    color: #f00;
    border: 2px solid #f00;
    background-color: white;
  }
  .StepProgress strong {
    display: block;
  }


  .StepProgress-item{
    color:#000;
  }
  .StepProgress-item strong{
    color:#e1e1e1;font-weight: 100;
    font-family: 'db_helvethaicaais_x45_light';
  }
  .StepProgress-item.current strong{
    color:#f00;font-weight: bold;
    font-family: 'db_helvethaicaais_x75_bd';
  }
  .StepProgress-item.is-done strong{
    color:#099a0b;font-weight: bold;
    font-family: 'db_helvethaicaais_x55_regular';
  }
</style>
<script>
  $(document).ready(function() {

    $("#sn_check").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });


    $("#sn_check").bind('keypress', function(e) {
      if (e.keyCode ==13 || e.which ==13) {
        if ($(this).val() =="") {
          $("#view_sn_check").html("<div class='alert alert-warning alert-dismissible' style='margin:5px 0 0 0;'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <strong>ผิดพลาด</strong> กรุณากรอกรหัสสินค้าให้ถูกต้อง </div>");
        }else {
          $("#view_sn_check").html("กำลังทำการตวจสอบ กรุณารอสักครู่...");
          $.post("../../../jquery/check-claim.php",
          {
            _sn  : $(this).val(),
            post : "sn_check_claim"
          },
          function(d){
              $("#view_sn_check").html(d);
          });
        }
      }
    });
    $("#btn_sn_check").click(function(e) {
      if ($("#sn_check").val() =="") {
        $("#view_sn_check").html("<div class='alert alert-warning alert-dismissible' style='margin:5px 0 0 0;'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <strong>ผิดพลาด</strong> กรุณากรอกรหัสสินค้าให้ถูกต้อง </div>");
      }else {
        $("#view_sn_check").html("กำลังทำการตวจสอบ กรุณารอสักครู่...");
        $.post("../../../jquery/check-claim.php",
        {
          _sn  : $("#sn_check").val(),
          post : "sn_check_claim"
        },
        function(d){
            $("#view_sn_check").html(d);
        });
      }
    });
  });
</script>
<!--- Check Claim -->


<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">รายการงานซ่อม</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <!-- Table claim history -->
          <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
            <div class="col-xs-12" style="padding:0px;">
              <div class="input-group">
                  <input type="search" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า,หมายเลขสินค้า,เลขที่งานซ่อม" id="SearchView" name="SearchView"  autocomplete="off">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default">ค้นหา</button>
                  </span>
              </div>
            </div>
          </div>
          <div class="col-xs-12" style="padding:0px;">
            <div class="table-responsive">
              <table class="table no-margin TableCheckClaim">
                <thead>
                <tr>
                  <th style="width:120px;">เลขที่งานซ่อม</th>
                  <th>รุ่นสินค้า</th>
                  <th>หมายเลขสินค้า</th>
                  <th>สถานะ</th>
                  <th style="width:120px;">วันที่รับซ่อม</th>
                  <th>รายละเอียด</th>
                </tr>
                </thead>
                <tbody>
                  <?
                    $sql = "SELECT pc.*
                            FROM product_claim pc
                            INNER JOIN member m ON ( m.username = pc.username AND m.user_new = pc.username )
                            WHERE (  m.member_id = '".base64url_decode($_COOKIE[$CookieID])."' )
                            ORDER BY pc.timestamp DESC";
                    $Per_Page = 50;   // Per Page
                    $Page = $UrlIdSub;
                    if(!$UrlIdSub){
                      $Page=1;
                    }

                    $Prev_Page = $Page-1;
                    $Next_Page = $Page+1;

                    $Page_Start = (($Per_Page*$Page)-$Per_Page);
                    if(select_numz($sql)<=$Per_Page){
                      $Num_Pages =1;
                    }
                    else if((select_numz($sql) % $Per_Page)==0){
                      $Num_Pages =(select_numz($sql)/$Per_Page) ;
                    }else{
                      $Num_Pages =(select_numz($sql)/$Per_Page)+1;
                      $Num_Pages = (int)$Num_Pages;
                    }
                    $id_run = $Page_Start+1;

                    $sql .= " LIMIT $Page_Start , $Per_Page; ";
                    if (select_numz($sql)>0) {
                      foreach (select_tbz($sql) as $row) {
                        ?>
                        <tr>
                          <td><a href="#"><?=$row['ID_job'];?></a></td>
                          <td><?=$row['model'];?></td>
                          <td><?=$row['serial_number'];?></td>
                          <td>
                            <?
                              if ($row[repair]=="0" && $row[processing]!="1") {
                                ?><span class="label label-danger">ได้รับสินค้าแล้ว รอตรวจสอบ</span><?
                              }elseif ($row[repair]=="0" && $row[processing]=="1") {
                                ?><span class="label label-warning">ดำเนินการซ่อม*</span><?
                              }elseif (( $row[repair]=="1" || $row[repair]=="2" || $row[repair]=="3" ) && substr($row[date_complete],0,4)=="0000") {
                                ?><span class="label label-warning">ดำเนินการซ่อม</span><?
                              }elseif ($row[num_job]=="" &&
                                       substr($row[date_complete],0,4)!="0000" &&
                                       substr($row[dateprint],0,4)=="0000"  &&
                                       substr($row[date_sand_product],0,4)=="0000") {
                                ?><span class="label label-info">ซ่อมเสร็จรอนำส่งคืน</span><?
                              }elseif ($row[num_job]!="" &&
                                       substr($row[date_complete],0,4)!="0000" &&
                                       substr($row[dateprint],0,4)!="0000"  &&
                                       substr($row[date_sand_product],0,4)=="0000") {
                                ?><span class="label label-info">รอสินค้านำส่งคืน</span><?
                              }elseif ($row[num_job]!="" &&
                                       substr($row[date_complete],0,4)!="0000" &&
                                       substr($row[dateprint],0,4)!="0000"  &&
                                       substr($row[date_sand_product],0,4)!="0000") {
                                ?><span class="label label-success">เสร็จสมบูรณ์</span><?
                              }
                            ?>
                          </td>
                          <td><?=date_($row['date_claim']);?></td>
                          <td><?=$row['problem_description'];?></td>
                        </tr>
                        <?
                      }
                    }else {
                      ?>
                      <tr>
                        <td colspan="5" class="text-center">ไม่มีข้อมูลงานซ่อม</td>
                      </tr>
                      <?
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-xs-12">
            <nav>
              <ul class="pagination">
               <?
                  if($Prev_Page){
                    ?><li><a href="<?=SITE_URL_ADMIN;?>view-check-claim/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                  }
                  for($i=1; $i<=$Num_Pages; $i++){
                    $Page1 = $Page-2;
                    $Page2 = $Page+2;
                    if($i != $Page && $i >= $Page1 && $i <= $Page2){
                      ?><li><a href="<?=SITE_URL_ADMIN;?>view-check-claim/<?=$i;?>"><?=$i;?></a></li><?
                    }else if($i==$Page){
                      ?><li class="active"><a href="#"><?=$i;?></a></li><?
                    }
                  }
                  if($Page!=$Num_Pages){
                    ?><li><a href="<?=SITE_URL_ADMIN;?>view-check-claim/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                  }
              ?>
              </ul>
            </nav>
          </div>
        <!-- Table claim history -->
      </div>
    </div>
  </div>
</div>

<!-- Search Table -->
<script>
  $(document).ready(function() {
    ////// Search For Table
      $("#SearchView").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".TableCheckClaim tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();
        });
      });
  });
</script>
