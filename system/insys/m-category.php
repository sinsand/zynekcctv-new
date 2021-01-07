<?
  if (isset($_POST['SubmitNewPrice'])) {
    $sql = "INSERT INTO price_brand_sub
              VALUES(0,'".$_POST['nNameCategory']."',
                  '".$_POST['nStatus']."',
                  now(),0
              );";
    if (insert_tbz($sql)==true) {
      ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="fa fa fa-success"></i> Alert!</h4>
          เพิ่มรายการเสร็จสิ้น.
        </div>
      <?
    }else {
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa fa-warning"></i> Alert!</h4>
        ไม่สามารถเพิ่มได้ โปรดตรวจสอบข้อมูลให้ถูกต้อง.
      </div>
      <?
    }
  }

?>


<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#new_cateogry" data-toggle="tab"><i class="fa fa-plus" aria-hidden="true" style="color:#060;"></i> เพิ่มหมวดหมู่</a></li>
        <li><a href="#manage_cateogry" data-toggle="tab"> แสดงหมวดหมู่</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="manage_cateogry">
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="table-responsive">

                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อหมวดหมู่</th>
                        <th>สถานะ</th>
                        <th>วันที่ลงข้อมูล</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM price_brand_sub
                                ORDER BY pbs_id DESC";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['pbs_name'];?></td>
                                <td><?=$row['pbs_status']=="1"?"<span class='label label-success'>ออนไลน์</span>":"<span class='label label-danger'>ปิด</span>"?></td>
                                <td><?=$row['pbs_timestmp']?></td>
                                <td>
                                  <div class="btn-group" style="width: 100px;">
                                    <button id="<?=$row['pbs_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit"><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['pbs_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default click_delete disabled" disabled><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </td>
                              </tr>
                            <? $i++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>

              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane active" id="new_cateogry">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">พนักงาน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nNameCategory" value="" placeholder="ชื่อหมวดหมู่" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="nStatus">
                      <option value="">เลือกสถานะ</option>
                      <option value="1">เปิด</option>
                      <option value="0">ปิด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="SubmitNewCategory">เพิ่ม</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
