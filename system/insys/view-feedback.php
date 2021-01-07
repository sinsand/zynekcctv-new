<div class="row">
  <div class="col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#feedback_view" data-toggle="tab">ข้อมูลฟีตแบ็ค</a></li>
          <!--<li><a href="#feedback_view" data-toggle="tab">ข้อมูลฟีตแบ็ค</a></li>-->
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="feedback_view">
            <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;display:none;">
                  <div class="col-xs-12" style="padding:0px;">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า" id="SearchView" name="SearchView"  autocomplete="off">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">ค้นหา</button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="table-responsive col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">โปรซีเคียวสาขา</th>
                        <th class="text-center">จากคุณ</th>
                        <th class="text-center">ประเภท</th>
                        <th class="text-center">แจ้งแผนก</th>
                        <th>รายละเอียด</th>
                        <th class="text-center">วันที่ลง</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      $sql = "SELECT pfb.*,m.company
                              FROM pr_feedback pfb
                              LEFT OUTER JOIN member m ON ( pfb.member_id = m.member_id)
                              ORDER BY pfb.create_date DESC";
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                          <tr>
                            <td class="text-center"><?=($i++);?></td>
                            <td class="text-center"><?=$row['company'];?></td>
                            <td class="text-center"><?=!empty($row['fb_name'])||!empty($row['fb_name'])?$row['fb_name']."<br>(".$row['fb_telephone'].")":"-";?></td>
                            <td class="text-center">
                              <?
                                if ($row['fb_typelist']=='1') {
                                  echo "แนะนำคำติชม";
                                }else {
                                  echo "แจ้งปัญหา";
                                }
                              ?>
                            </td>
                            <td class="text-center">
                              <?
                                if ($row['fb_dapartment']=='1') {
                                  echo "ฝ่ายขาย";
                                }else if ($row['fb_dapartment']=='2') {
                                  echo "ฝ่ายซัพพอร์ต";
                                }else if ($row['fb_dapartment']=='3') {
                                  echo "ฝ่ายเคลมสินค้า";
                                }else if ($row['fb_dapartment']=='4') {
                                  echo "ฝ่ายจัดส่งสินค้า";
                                }else if ($row['fb_dapartment']=='5') {
                                  echo "ฝ่ายการตลาด";
                                }else {
                                  echo "อื่นๆ";
                                }
                              ?>
                            </td>
                            <td class="text-left"><?=$row['fb_detail'];?></td>
                            <td class="text-center"><?=datetime($row['create_date']);?></td>
                            <td class="text-center"><?=$row['fb_status']=='0'?"<span class='label label-warning'>รอตรวจสอบ</span>":"<span class='label label-success'>ตรวจสอบแล้ว</span><br>".$row['fb_comment'];?></td>
                            <td class="text-center">
                              <div class="btn-group" style="width: 98px;">
                                <button id="<?=$row['feedback_id'];?>" data-toggle="modal" data-target="#modal-set-status" data-company="<?=$row['company'];?>" class="btn btn-default click_set_status <?=$row['fb_status']=='1'?"disabled":"";?> " <?=$row['fb_status']=='1'?"disabled":"";?> ><i class="fa fa-cogs"></i></button>
                                <button id="<?=$row['feedback_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete disabled" disabled><i class="fa fa-trash-o"></i></button>
                              </div>

                            </td>
                          </tr>
                          <?
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>


              </div>
            </div>




          </div>
       </div>
  </div>
</div>

<!-- edit set -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_set_status").click(function(e) {
      $(".SubmitUpdateSetStatus").attr("id",$(this).attr("id"));
      $(".titleview").html("-" + $(this).attr("data-company"));
    });

    $(".SubmitUpdateSetStatus").click(function(e) {
      if ( $("#txt_detail").val() != "" ) {
        $(".alert_update_set_status").html("");
        $.post('../../new/jquery/others.php',
        {
          feedbackid   : $(this).attr("id"),
          txt_detail   : $("#txt_detail").val(),
          post         : "feedback-setStatus"
        },
        function(d) {
          var i = d.split("|||");
          if (i[0]=='C') {
            $(".alert_update_set_status").html(i[1]);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },2000);
          }else {
            $(".alert_update_set_status").html(i[1]);
          }
        });
      }else {
        $(".alert_update_set_status").html("กรุณากรอกข้อมูลการตรวจสอบด้วยค่ะ");
      }
    });

  });
</script>
<div class="modal fade" id="modal-set-status" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> ตรวจสอบข้อมูล <span class="titleview"></span></h4>
      </div>
      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">
            <!-- Form -->
            <form class="form-horizontal">
              <div class="col-sm-12">
                <div class="form-group">
                  <div class="col-xs-12">
                    <textarea class="form-control" id="txt_detail" name="txt_detail" rows="8" placeholder="กรอกรายละเอียด การตรวจสอบ"></textarea>
                  </div>
                </div>

              </div>
            </form>
            <!-- Form -->
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_set_status">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateSetStatus">บันทึก</button>
      </div>
    </div>
  </div>
</div>
<!-- edit set -->
