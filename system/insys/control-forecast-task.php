
<?
if (isset($_POST['SubmitInTaskJob'])) {

  ///// function jobrunid
  $sql = "SELECT job_order
          FROM for_task
          ORDER BY job_order DESC
          LIMIT 0,1;";
  $JobNo =""; $MonthNew=""; $IdRun="";
  $IdJob=""; $MonthNow=""; $MonthNew="";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      $IdJob= $row['job_order'];
    }
    $MonthSub= substr($IdJob,5,2);
    $MonthNow = date("m");
    $IdRun = substr($IdJob,7,4);


    if ( $MonthSub == $MonthNow ){
      $IdRun     = substr($IdJob,7,4);
      $MonthNew  = $MonthNow;
      $IdRun     = $IdRun + 1;
      $len       = strlen($IdRun);
      if ($len==1){
        $IdRun  =  "000".$IdRun;
      }
      if ($len==2){
        $IdRun  =  "00".$IdRun;
      }
      if ($len==3){
        $IdRun  =  "0".$IdRun;
      }
    }else if ( $MonthNow > $MonthSub || $MonthNow = "01" ){
      $MonthNew  = $MonthNow;
      $IdRun     = "0001";
    }
    $JobNo  = date("y");
    $JobNo  = "ORD".$JobNo."".$MonthNew."".$IdRun;
  }else {
    $JobNo  = "ORD".date("ym")."0001";
  }


  $sql = "INSERT INTO for_task
            VALUES(0,
              '".$JobNo."',
              '".base64url_decode($_COOKIE[$CookieID])."',
              now(),
              '".htmlspecialchars($_POST['pn_remark'],ENT_QUOTES)."',
              '".$_POST['schedule']."'
            );";

  if (insert_tbz($sql)==true) {
    $sql = "SELECT task_id
            FROM for_task
            WHERE ( member_id = '".base64url_decode($_COOKIE[$CookieID])."' )
            ORDER BY task_id DESC
            LIMIT 1;";
    $sumadd=0;
    foreach (select_tbz($sql) as $row) {

      $sqlin = "SELECT product_id
                FROM for_productview
                WHERE (
                        schedule_id IN (  SELECT schedule_id
                                          FROM for_schedule
                                          WHERE (
                                                  ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' ) AND
                                                  schedule_status = '1'
                                                )
                                        )
                      )
                ORDER BY order_run ASC  ";
      $i=0;
      foreach (select_tbz($sqlin) as $value) {
        if (!empty($_POST['task_product'][$i])) {

          $sqldetail = "INSERT INTO for_taskdetail
                          VALUES(0,
                            '".$row['task_id']."',
                            '".base64url_decode($_COOKIE[$CookieID])."',
                            '".$value['product_id']."',
                            now(),
                            '".$_POST['task_product'][$i]."'
                          );";
          //echo $sqldetail."<br>";
          if (insert_tbz($sqldetail)==true) {
            $sumadd = $sumadd+1;
          }
        }
        $i++;
      }
    }
    if ($sumadd>0) {
      ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        เพิ่มงาน Forecast สำเร็จ.
      </div>
      <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
      <?
    }else {
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไม่สามารถเพิ่มงาน Forecast ได้.
      </div>
      <?
    }
  }


}
?>





<div class="row">
  <div class="col-xs-12">
    <?
      if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
        ?>
          <!--- Admin Task View --->
          <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Forecasting Task All</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <!--- table -->
                <div class="row">
                  <form role="form" action="<?=$HostLinkAndPath;?>" method="post" >
                    <div class="col-xs-12 col-sm-8 col-md-9">
                      <div class="form-group">
                        <label>รอบ</label>
                        <select class="form-control select2" name="ValueViewTask"  style="width: 100%;">
                          <?
                          $sqlschedule = "SELECT *
                                          FROM for_schedule
                                          WHERE ( schedule_status = '1' )
                                          ORDER BY str_date DESC;";
                          if (select_numz($sqlschedule)) {
                            foreach (select_tbz($sqlschedule) as $value) {
                              ?> <option value="<?=$value['schedule_id'];?>" <?=$_POST['ValueViewTask']==$value['schedule_id']?"selected":"";?>><?=$value['title_schedule']." (".date_($value['str_date'])." - ".date_($value['end_date']).")";?></option> <?
                            }
                          }else {
                            ?> <option value="">ไม่มีข้อมูล</option> <?
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                      <div class="form-group">
                        <label style="opacity:0;">เลือกรายการ</label>
                        <button type="submit" class="btn btn-success col-xs-12" name="BtnViewTask">ดูรายการ</button>
                      </div>
                    </div>
                  </form>
                  <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover ">
                          <thead>
                            <tr>
                              <th class="text-center">ลำดับ</th>
                              <th>โปรซีเคียวสาขา</th>
                              <th>รูปสินค้า</th>
                              <th>รุ่นสินค้า</th>
                              <th>รายละเอียด</th>
                              <th class="text-center">จำนวน</th>
                              <th class="text-center">ปรับปรุงล่าสุด</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?
                            $WHERE ="";
                            if (!empty($_POST['ValueViewTask'])) {
                              $WHERE = "  WHERE ( ft.schedule_id = '".$_POST['ValueViewTask']."' )";
                            }
                            $sql = "SELECT fss.pro_id,pp.model,ft.*,ftd.*,m.company,fss.description
                                    FROM for_task ft
                                    INNER JOIN  for_taskdetail ftd ON ( ft.task_id = ftd.task_id )
                                    INNER JOIN  for_stock fss ON ( ftd.stock_id = fss.stock_id )
                                    LEFT OUTER JOIN  price_products pp ON ( fss.pro_id = pp.pro_id )
                                    INNER JOIN member m ON (ft.member_id = m.member_id)
                                    $WHERE
                                    ORDER BY ft.job_order DESC,fss.order_run ASC ";
                              if (select_numz($sql)>0) {
                                $a=1;
                                $i=1;
                                $sum=0;
                                $category_i = 0;
                                $pre='';
                                foreach (select_tbz($sql) as $row) {
                                $amount = 0;
                                $model = "";

                                //// แสดงหมวดรายการคิวงาน
                                if($pre==''){
                                  $pre = $row['task_id'];
                                  if($pre==$row['task_id']){
                                    $sum++;
                                    $i=1;
                                    $category_i++;
                                    ?>
                                    <tr>
                                      <th style="font-size: smaller;color: #444;padding: 8px;background-color: #fffca8;" colspan="8">
                                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                        <?=$row['job_order'];?> <span class="label label-default">(<?=datetime($row['create_date']);?>)</span><br>
                                        <?
                                          $sqlschedule = "SELECT *
                                                          FROM for_schedule
                                                          WHERE (schedule_id = '".$row['schedule_id']."')";
                                          foreach (select_tbz($sqlschedule) as $ro) {
                                            ?>รอบ <?=$ro['title_schedule'];?> (<?=datetime($ro['str_date'])." - ".datetime($ro['end_date']);?>)<br><?
                                          }
                                        ?>
                                        รายละเอียด : <?=$row['remark'];?>
                                      </th>
                                    </tr>
                                    <?
                                  }
                                }else{
                                  if ($pre==$row['task_id']) {
                                    $i++;
                                  }else {
                                    $pre = $row['task_id'];
                                    $sum++;
                                    $i=1;
                                    $category_i++;
                                    ?>
                                    <tr>
                                      <th style="font-size: smaller;color: #444;padding: 8px;background-color: #fffca8;" colspan="8">
                                       <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                       <?=$row['job_order'];?> <span class="label label-default">(<?=datetime($row['create_date']);?>)</span><br>
                                       <?
                                         $sqlschedule = "SELECT *
                                                         FROM for_schedule
                                                         WHERE (schedule_id = '".$row['schedule_id']."')";
                                         foreach (select_tbz($sqlschedule) as $ro) {
                                           ?>รอบ <?=$ro['title_schedule'];?> (<?=datetime($ro['str_date'])." - ".datetime($ro['end_date']);?>)<br><?
                                         }
                                       ?>
                                       รายละเอียด : <?=$row['remark'];?>
                                      </th>
                                    </tr>
                                    <?
                                  }
                                }
                                //// แสดงหมวดรายการคิวงาน

                                  ?>
                                    <tr>
                                      <td class="text-center"><?=$i;?></td>
                                      <td><?=$row['company'];?></td>
                                      <td><?=!empty($row['model'])?"<img class='lazy' src='".SITE_URL."images/loading.gif"."' data-src='http://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png' alt='' style='width:60px;height:auto;'>":"-";?> </td>
                                      <td><?=$row['model']==""?$row['pro_id']:$row['model'];?></td>
                                      <td><?=$row['description'];?></td>
                                      <td class="text-center"><?="<label>".$row['amount_first']." รายการ</label><br><span class='label label-default'>".datetime($row['create_first'])."</span>";?></td>
                                      <td class="text-center"><?="<label>".$row['amount_last']." รายการ</label><br><span class='label label-default'>".datetime($row['update_last'])."</span>";?></td>
                                      <td class="text-center" style="display:none;">
                                        <div class="btn-group" style="width: 80px;">
                                          <button id="<?=$row['taskdetail_id'];?>" data-toggle="modal" data-target="#modal-save"  class="btn btn-success modal-save disabled" disabled data-value="<?=$row['job_order'];?> - <?=$row['model']==""?$row['pro_id']:$row['model'];?>" data-amount="<?=$row['amount_last'];?>" data-model="<?=$row['model']==""?$row['pro_id']:$row['model'];?>"><i class="fa fa-floppy-o"></i></button>
                                          <button id="<?=$row['taskdetail_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default modal-delete " data-value="<?=$row['job_order'];?> - <?=$row['model']==""?$row['pro_id']:$row['model'];?>" data-amount="<?=$row['amount_last'];?>" data-model="<?=$row['model']==""?$row['pro_id']:$row['model'];?>"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                      </td>
                                    </tr>
                                  <? $a++;
                                }
                              }else {
                                ?>
                                <tr>
                                  <td class="text-center" colspan="8">ไม่พบข้อมูล</td>
                                </tr>
                                <?
                              }
                            ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <!--- table -->
              </div>
            </div>
          </div>
        <?
      }else {
        $sqlsch = "SELECT *
                FROM for_schedule
                WHERE (( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' ) AND schedule_status = '1')";
        if (select_numz($sqlsch)) { $schedule = "";
          ?>
          <!--- Member Creat Task Order --->
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-7">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">สร้างสินค้า forecast รอบ
                  <?
                    foreach (select_tbz($sqlsch) as $key) {
                      $schedule = $key['schedule_id'];
                      echo "<label> (".date_($key['str_date'])." - ".date_($key['end_date']).") </label>";
                    }
                  ?>
                </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
                  <!-- Creat Task Order -->
                  <div class="box-body">
                      <div class="col-xs-12">
                        <form role="form" class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" >
                          <table class="table">
                            <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>รูปสินค้า</th>
                                <th>รุุ่นสินค้า</th>
                                <th>กรอกจำนวน</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?
                                $sql = "SELECT fs.pro_id,pp.model,pp.pro_id,fpv.*
                                        FROM for_productview fpv
                                        LEFT OUTER JOIN for_stock fs ON (fpv.stock_id = fs.stock_id)
                                        LEFT OUTER JOIN price_products pp ON (fs.pro_id = pp.pro_id)
                                        WHERE ( fpv.schedule_id IN ( SELECT schedule_id
                                                                FROM for_schedule
                                                                WHERE (( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' ) AND schedule_status = '1') ))
                                        ORDER BY fpv.order_run ASC";
                                $sql = "SELECT fs.pro_id,pp.model,pp.pro_id
                                        FROM for_stock fs
                                        LEFT OUTER JOIN price_products pp ON (fs.pro_id = pp.pro_id)
                                        WHERE ( fs.order_run != '')
                                        ORDER BY fs.order_run ASC ";
                                if (select_numz($sql)>0) { $i=1;
                                  foreach (select_tbz($sql) as $row) {
                                    ?>
                                      <tr>
                                        <td><?=($i++);?></td>
                                        <td><?=!empty($row['model'])?"<img class='lazy' src='".SITE_URL."images/loading.gif"."' data-src='http://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png' alt='' style='width:60px;height:auto;'>":"-";?> </td>
                                        <td><?=!empty($row['model'])?$row['model']:$row['pro_id'];?></td>
                                        <td class="text-center"> <input class="form-control" type="text" data-id="<?=$row['pro_id'];?>" fata-value="<?=$row['model'];?>" name="task_product[]" placeholder="กรอกจำนวนที่ต้องการ" autocomplete="off" /> </td>
                                      </tr>
                                    <?
                                  }
                                }
                              ?>


                            </tbody>
                          </table>
                          <div class="form-group">
                            <label>รายละเอียดเพิ่มเติม</label>
                            <textarea class="form-control"  name="pn_remark" rows="2" placeholder="ข้อมุลเพิ่มเติม"></textarea>
                          </div>
                          <input type="hidden" name="schedule" value="<?=$schedule;?>">
                          <button type="submit" class="btn btn-success" name="SubmitInTaskJob">บันทึกการทำ Forecast</button>
                        </form>
                      </div>
                  </div>
                  <!-- Creat Task Order -->
            </div>
          </div>
          <?
        }
        ?>
          <!--- Calendar Schedule--->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">ตารางเปิดทำ Forecasting</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">

                <!--- Calebdar -->
                <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.print.min.css" media='print'>
                <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.css">
                <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/moment.min.js"></script>
                <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.js"></script>

                <div id="ViewCalendar_forcasting"></div>
                <style media="screen">
                  .fc-time{display: none;}
                  .fc-day-grid-event{cursor: pointer;}
                </style>
                <script>
                  $(document).ready(function() {

                    $('#ViewCalendar_forcasting').fullCalendar({
                      header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'//,agendaWeek',agendaDay,listWeek'
                      },
                      defaultDate: '<?=date("Y-m-d");?>',
                      navLinks: false, // can click day/week names to navigate views
                      editable: false,
                      eventLimit: true, // allow "more" link when too many events
                      events: [
                        <?

                          $sql = "SELECT *
                                  FROM for_schedule
                                  WHERE ( schedule_status = '1' )
                                  ORDER BY str_date ASC";


                          if (select_numz($sql)>0) { $i=0;
                            foreach (select_tbz($sql) as $row) {
                              $background = "";

                              if ($row['schedule_status']==1) {
                                $background = " backgroundColor: '#00a65a',borderColor    : '#00a65a' "; /// green
                              }else{
                                $background = " backgroundColor: '#afafaf',borderColor    : '#9c9c9c' "; /// yellow
                              }


                              if ($i==0) {
                                echo "{
                                        scheduleid: '".$row['schedule_id']."',
                                        title: '".$row['title_schedule']."',
                                        start: '".$row['str_date']."T00:00:00',
                                        end: '".$row['end_date']."T23:59:59',
                                        $background
                                      }";
                              }else {
                                echo ",{
                                        scheduleid: '".$row['schedule_id']."',
                                        title: '".$row['title_schedule']."',
                                        start: '".$row['str_date']."T00:00:00',
                                        end: '".$row['end_date']."T23:59:59',
                                        $background
                                      }";
                              }
                              $i++;
                            }
                          }
                        ?>
                      ],
                      eventClick: function(calEvent, jsEvent, view) {

                        /*$(".SubmitUpdateSchedule").attr("id",calEvent.scheduleid);

                        $.post("../../new/jquery/others.php",
                        {
                          value  : calEvent.scheduleid,
                          post  : "ForecastViewSchedule"
                        },
                        function(d) {
                          var i = d.split("|||");
                          $("#ed_title").val(i[0]);
                          $("#ed_str_date").val(i[1]);
                          $("#ed_end_date").val(i[2]);
                          $("#ed_status").val(i[3]);
                        });
                        $('#modal-edit').modal();*/

                      }
                    });

                  });
                </script>
                <!--- Calendar -->

              </div>
            </div>
          </div>


          <!--- Member Task View --->
          <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Forecasting Task</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <!--- table -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover ">
                        <thead>
                          <tr>
                            <th class="text-center">ลำดับ</th>
                            <th>โปรซีเคียวสาขา</th>
                            <th>รูปสินค้า</th>
                            <th>รุ่นสินค้า</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-center">ปรับปรุงล่าสุด</th>
                            <th class="text-center">จำนวนใหม่</th>
                            <th class="text-center">จัดการข้อมูล</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                          $sqlin = "SELECT schedule_id
                                  FROM for_schedule
                                  WHERE (
                                          ( DATE_FORMAT(str_date, '%Y-%m')  BETWEEN  '".date("Y-m")."' AND '".date("Y-m")."' ) AND
                                          ( DATE_FORMAT(end_date, '%Y-%m')  BETWEEN  '".date("Y-m")."' AND '".date("Y-m")."' )
                                        );";
                          $WHERE = "";
                          if (select_numz($sqlin)>0) { $i=0;
                            foreach (select_tbz($sqlin) as $value) {
                              if ($i==0) {
                                $WHERE = "  ft.schedule_id = '".$value['schedule_id']."'  ";
                              }else {
                                $WHERE .= "  OR  ft.schedule_id = '".$value['schedule_id']."'  ";
                              } $i++;
                            }
                          }

                          $sql = "SELECT fss.pro_id,pp.model,ft.*,ftd.*,m.company
                                  FROM for_task ft
                                  INNER JOIN  for_taskdetail ftd ON ( ft.task_id = ftd.task_id )
                                  INNER JOIN  for_stock fss ON ( ftd.stock_id = fss.stock_id )
                                  LEFT OUTER JOIN  price_products pp ON ( fss.pro_id = pp.pro_id )
                                  INNER JOIN member m ON (ft.member_id = m.member_id)
                                  WHERE ( ft.member_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                          ( $WHERE )
                                        )
                                  ORDER BY ft.job_order DESC,fss.order_run ASC";
                            //echo $sql;
                                  /* AND
                                          ft.schedule_id IN (
                                                              SELECT schedule_id
                                                              FROM for_schedule
                                                              WHERE (
                                                                      schedule_status = '1' AND
                                                                      ( end_date <= '".date("Y-m-d")."' )
                                                                    )
                                                            )*/
                            if (select_numz($sql)>0) {
                              $a=1;
                              $i=1;
                              $sum=0;
                              $category_i = 0;
                              $pre='';
                              foreach (select_tbz($sql) as $row) {
                              $amount = 0;
                              $model = "";

                                //// แสดงหมวดรายการคิวงาน
                                if($pre==''){
                                  $pre = $row['task_id'];
                                  if($pre==$row['task_id']){
                                    $sum++;
                                    $i=1;
                                    $category_i++;
                                    ?>
                                    <tr>
                                      <th style="font-size: smaller;color: #444;padding: 8px;background-color: #fffca8;" colspan="8">
                                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                        <?=$row['job_order'];?> <span class="label label-default">(<?=datetime($row['create_date']);?>)</span><br>
                                        <?
                                          $sqlschedule = "SELECT *
                                                          FROM for_schedule
                                                          WHERE (schedule_id = '".$row['schedule_id']."')";
                                          foreach (select_tbz($sqlschedule) as $ro) {
                                            ?>รอบ <?=$ro['title_schedule'];?> (<?=datetime($ro['str_date'])." - ".datetime($ro['end_date']);?>)<br><?
                                          }
                                        ?>
                                        รายละเอียด : <?=$row['remark'];?>
                                      </th>
                                    </tr>
                                    <?
                                  }
                                }else{
                                  if ($pre==$row['task_id']) {
                                    $i++;
                                  }else {
                                    $pre = $row['task_id'];
                                    $sum++;
                                    $i=1;
                                    $category_i++;
                                    ?>
                                    <tr>
                                      <th style="font-size: smaller;color: #444;padding: 8px;background-color: #fffca8;" colspan="8">
                                       <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                       <?=$row['job_order'];?> <span class="label label-default">(<?=datetime($row['create_date']);?>)</span><br>
                                       <?
                                         $sqlschedule = "SELECT *
                                                         FROM for_schedule
                                                         WHERE (schedule_id = '".$row['schedule_id']."')";
                                         foreach (select_tbz($sqlschedule) as $ro) {
                                           ?>รอบ <?=$ro['title_schedule'];?> (<?=datetime($ro['str_date'])." - ".datetime($ro['end_date']);?>)<br><?
                                         }
                                       ?>
                                       รายละเอียด : <?=$row['remark'];?>
                                      </th>
                                    </tr>
                                    <?
                                  }
                                }
                                //// แสดงหมวดรายการคิวงาน

                                ?>
                                  <tr>
                                    <td class="text-center"><?=$i;?></td>
                                    <td><?=$row['company'];?></td>
                                    <td><?=!empty($row['model'])?"<img class='lazy' src='".SITE_URL."images/loading.gif"."' data-src='http://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png' alt='' style='width:60px;height:auto;'>":"-";?> </td>
                                    <td><?=$row['model']==""?$row['pro_id']:$row['model'];?></td>
                                    <td class="text-center"><?="<label>".$row['amount_first']." รายการ</label><br><span class='label label-default'>".datetime($row['create_first'])."</span>";?></td>
                                    <td class="text-center"><?="<label>".$row['amount_last']." รายการ</label><br><span class='label label-default'>".datetime($row['update_last'])."</span>";?></td>
                                    <td class="text-center"> <input type="number" class="form-control text-center confirm_value" id="<?=$row['taskdetail_id'];?>" placeholder="กรอกจำนวนใหม่" <?=ch_etaskr($row['taskdetail_id']);?> autocomplete="off"></td>
                                    <td class="text-center">
                                      <div class="btn-group" style="width: 80px;">
                                        <button id="<?=$row['taskdetail_id'];?>" data-toggle="modal" data-target="#modal-save"  class="btn btn-success modal-save <?=ch_etask($row['taskdetail_id']);?>" <?=ch_etask($row['taskdetail_id']);?> data-value="<?=$row['job_order'];?> - <?=$row['model']==""?$row['pro_id']:$row['model'];?>" data-amount="<?=$row['amount_last'];?>" data-model="<?=$row['model']==""?$row['pro_id']:$row['model'];?>"><i class="fa fa-floppy-o"></i></button>
                                        <button id="<?=$row['taskdetail_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default modal-delete <?=ch_etask($row['taskdetail_id']);?>" <?=ch_etask($row['taskdetail_id']);?> data-value="<?=$row['job_order'];?> - <?=$row['model']==""?$row['pro_id']:$row['model'];?>" data-amount="<?=$row['amount_last'];?>" data-model="<?=$row['model']==""?$row['pro_id']:$row['model'];?>"><i class="fa fa-trash-o"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                <? $a++;
                              }
                            }else {
                              ?>
                              <tr>
                                <td class="text-center" colspan="8">ไม่พบข้อมูล</td>
                              </tr>
                              <?
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!--- table -->
              </div>
            </div>
          </div>
        <?
      }
    ?>
  </div>
</div>





<?

function ch_etaskr($value){
  $sqlsch = "SELECT *
          FROM for_schedule
          WHERE (( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' ) AND schedule_status = '1')";
  if (select_numz($sqlsch)>0) {
    return null;
  }else {
    return "readonly";
  }
}
function ch_etask($value){
  $sqlsch = "SELECT *
          FROM for_schedule
          WHERE (( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' ) AND schedule_status = '1')";
  if (select_numz($sqlsch)>0) {
    return null;
  }else {
    return "disabled";
  }
}
?>


<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>



<!-- save task -->
<script>
  $(document).ready(function() {

    $(".modal-save").click(function(e) {
      if ($("#"+$(this).attr("id")+".confirm_value").val()!="") {
        $(".sddddd").html($(this).attr("data-value"));
        $(".btn_update_task").removeClass('disabled');
        $(".btn_update_task").removeAttr('disabled');
        $(".btn_update_task").attr("id",$(this).attr("id"));
      }else {
        $(".sddddd").html("กรุณากรอกตัวเลข");
        $(".btn_update_task").addClass('disabled');
        $(".btn_update_task").attr('disabled','disabled');

      }
    });


    $(".btn_update_task").click(function(event) {



        $.post("../../new/jquery/others.php",
        {
          value   : $(this).attr("id"),
          _amount : $("#"+$(this).attr("id")+".confirm_value").val(),
          post    : "ForecastUpdateAmount"
        },
        function(d) {
          var i = d.split("|||");
          if (i[0]!=1) {
            $(".show_update_task").html(i[1]);
          }else {
            $(".show_update_task").html(i[1]);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },2000);
          }
        });

    });

  });
</script>
<div class="modal fade" id="modal-save" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #4caf50;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon glyphicon-trash" style=" color: #FFF"></span> ยืนยันบันทึก</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="text-align: center; margin: 0;">
            <div class="control-label show_update_task" style="padding:25px 0;">เลขที่งาน <label class="sddddd">MAXXXXXX</label></div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default " data-dismiss="modal" id="">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-success btn_update_task">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- save task -->



<!-- edit task -
<script>
  $(document).ready(function() {

    $(".modal-edit").click(function(event) {
      $(".eddddd").html($(this).attr("data-value"));
      $("#ep_Model").val($(this).attr("data-model"));
      $("#ep_NewAmount").val($(this).attr("data-amount"));
      $(".SubmitUpdateSetPrice").attr("id",$(this).attr("id"));


    });


    $(".SubmitUpdateSetPrice").click(function(event) {
      if ($("#ep_NewAmount").val()!="") {
        $.post("../../new/jquery/others.php",
        {
          value   : $(this).attr("id"),
          _amount : $("#ep_NewAmount").val(),
          post    : "ForecastUpdateAmount"
        },
        function(d) {
          var i = d.split("|||");
          if (i[0]!=1) {
            $(".alert_update_edit").html(i[1]);
          }else {
            $(".alert_update_edit").html(i[1]);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },2000);
          }
        });
      }else {
        $(".alert_update_edit").html("กรุณากรอกตัวเลข");
      }
    });

  });
</script>
<div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขจำนวนสินค้า <label class="eddddd"></label></h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">


            <form class="form-horizontal">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">รุ่นสินค้า  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  value="" id="ep_Model"  readonly  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">จำนวน  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  value="" id="ep_NewAmount" placeholder="กรอกจำนวนสินค้าที่ต้องการ" autocomplete="off"  />
                  </div>
                </div>
              </div>
            </form>


          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_edit">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateSetPrice">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit task -->


<!-- delete task  -->
<script>
  $(document).ready(function() {

    $(".modal-delete").click(function(event) {
      $(".iddddd").html($(this).attr("data-value"));
      $(".btn_delete_task").attr("id",$(this).attr("id"));
    });

    $(".btn_delete_task").click(function(event) {
      $.post("../../new/jquery/others.php",
      {
        value   : $(this).attr("id"),
        post    : "ForecastDeleteTask"
      },
      function(d) {
        var i = d.split("|||");
        if (i[0]!=1) {
          $(".show_delete_task").html(i[1]);
        }else {
          $(".show_delete_task").html(i[1]);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },2000);
        }
      });
    });




  });
</script>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #f00;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon glyphicon-trash" style=" color: #FFF"></span> ลบข้อมูล</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="text-align: center; margin: 0;">
            <div class="control-label show_delete_task" style="padding:25px 0;">เลขที่งาน <label class="iddddd">MAXXXXXX</label></div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default " data-dismiss="modal" id="">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger btn_delete_task">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete task -->
