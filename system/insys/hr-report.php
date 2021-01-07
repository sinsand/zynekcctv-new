<?
if (isset($_POST['SubmitAddPermission'])) { $a=0;
  for ($i=0; $i < COUNT($_POST['LeavePermission']); $i++) {
    $sql = "INSERT INTO z_hr_permission_prove VALUES(0,'".$_POST['ap_approve']."','".$_POST['LeavePermission'][$i]."',now());";
    if (insert_tbz($sql)==true) {
      $a = $a + 1;
    }
  }
  if ($a > 0) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เพิ่มข้อมูล <?=$a;?> รายการสำเร็จ.
    </div>
    <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถเพิ่มข้อมูลได้.
    </div>
    <?
  }
}
?>

<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#new_permission_approve" data-toggle="tab">เพิ่มสิทธ์การอนุมัติ</a></li>
        <li class="active"><a href="#view_permission_approve" data-toggle="tab">ดูสิทธ์การอนุมัติ</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="new_permission_approve">


          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">ผู้อนุมัติ</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="ap_approve" id="ap_approve">
                      <option value="">เลือกผู้อนุมัติ</option>
                      <?
                        $sql = "SELECT *
                                FROM admin
                                WHERE (login_status = '1')
                                ORDER BY name_admin ASC;";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_admin'];?>"><?=$row['name_admin']." (".$row['nickname'].")";?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">พนักงาน</label>
                  <div class="col-sm-9">
                    <?
                      $sql = "SELECT *
                              FROM admin
                              WHERE (login_status = '1')
                              ORDER BY name_admin ASC";
                      if (select_numz($sql)>0) {
                        foreach (select_tbz($sql) as $row) {
                          ?>
                          <div class="checkbox">
                            <label> <input type="checkbox" name="LeavePermission[]" id="" value="<?=$row['ID_admin'];?>" class="ap_permission"> <?=$row['name_admin']." (".$row['nickname'].")";?></label>
                          </div>
                          <?
                        }
                      }
                    ?>

                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="SubmitAddPermission" id="SubmitAddPermission" class="btn btn-danger">เพิ่มสิทธิ์การอนุมัติ</button>
                  </div>
                </div>
              </form>
            </div>
          </div>



        </div>
        <div class="tab-pane active" id="view_permission_approve">

          <div class="row">
            <div class="col-xs-12">
              <div class="col-xs-12">

              </div>
              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th>ผู้อนุมัติ</th>
                        <th>ผู้ถูกอนุมัติ (วันที่เพิ่ม)</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT MIN(ahpp.z_permission_id) as z_permission_id,a.name_admin,ahpp.approve_id,ag.name_status
                                FROM z_hr_permission_prove ahpp
                                INNER JOIN admin a ON (ahpp.approve_id = a.ID_admin)
                                INNER JOIN admin_group ag ON (a.admin_status = ag.ID_admin_group)
                                GROUP BY a.name_admin
                                ORDER BY ahpp.create_date DESC;";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                            <tr>
                              <td class="text-center"><?=($i++);?></td>
                              <td><?=$row['name_admin'];?><br>(<?=$row['name_status'];?>)</td>
                              <td>
                                <?
                                    $sqlin = "SELECT a.name_admin,ahpp.create_date,a.nickname
                                              FROM z_hr_permission_prove ahpp
                                              INNER JOIN admin a ON (ahpp.admin_id = a.ID_admin)
                                              WHERE ahpp.approve_id = '".$row['approve_id']."' ;";
                                    if (select_numz($sqlin)>0) {
                                      ?><ul class="list-group"><?
                                      foreach (select_tbz($sqlin) as $rowin) {
                                        ?>
                                          <li class="list-group-item">
                                            <div class="row">
                                              <div class="col-xs-12 col-sm-6"><?=$rowin['name_admin']." (".$rowin['nickname'].")";?></div>
                                              <div class="col-xs-12 col-sm-6"><span class="label" style="float: right;background-color: #aeb7ca;color: #fff;"><?=$rowin['create_date'];?></span></div>
                                            </div>
                                          </li>
                                        <?
                                      }
                                      ?></ul><?
                                    }
                                ?>
                              </td>
                              <td class="text-center">
                                <div class="btn-group" style="width:80px;">
                                  <button id="<?=$row['approve_id'];?>" data-toggle="modal" data-target="#modal-change" class="btn btn-info click_change"><i class="fa fa-cogs"></i></button>
                                  <button id="<?=$row['approve_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default click_delete"><i class="fa fa-trash"></i></button>
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
</div>






<!-- edit Member Prove -->

<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover({
      container: 'body',
      trigger: 'focus'
    })
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_change").click(function(e) {
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "HRProveViewChange"
      },
      function(d) {
        $("#view_hrprove_").html(d);
      });
    });
  });

</script>
<div class="modal fade" id="modal-change" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> ลบข้อมูลในกลุ่ม</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12" id="view_hrprove_">


          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_change_member_prove">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-default">ปิด</button>
      </div>

    </div>
  </div>
</div>
<!-- edit Member Prove -->







<!-- delete permissionprove -->
<script>
  $(document).ready(function() {

      $(".click_delete").click(function(e) {
        $(".dHR_DeleteProve").attr("id", $(this).attr("id"));
      });
      //// check delete
      $(".dHR_DeleteProve").click(function(e) {
        if ( $("#dHR_Pass_re").val() == "Admin" ) {
          $.post("../../new/jquery/others.php",
          {
            value : $(this).attr("id"),
            post : "HRProveDelete"
          },
          function(data) {
              $("#View_data_delete").html(data);
              setTimeout(function(){
                window.location.href = "<?=$HostLinkAndPath;?>";
              },2000);
          });
        }else {

        }
      });

  });
</script>
<div class="modal fade" id="modal-delete" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #f00;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash-o" style=" color: #FFF"></i> ลบข้อมูล</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="col-md-12" id="View_data_delete" style="margin:15px 0;padding:15px;">ยืนยัน การลบข้อมูล</div>
            <div class="col-md-12" style="padding:15px;">
              <input type="password" class="form-control text-center" placeholder="กรอกรหัสผ่าน เพื่อยืนยัน" id="dHR_Pass_re" name="dHR_Pass_re"  />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger dHR_DeleteProve">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete permissionprove -->
