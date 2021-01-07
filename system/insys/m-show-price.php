<?
  if (isset($_POST['SubmitNewPrice'])) {
    $sql = "INSERT INTO price_product_apdu
              VALUES(0,'".$_POST['nModel']."',
                  '".$_POST['nEmployee']."',
                  '".$_POST['nProsecure']."',
                  '".$_POST['nDealer']."',
                  '".$_POST['nUser']."'
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
        <li class="active"><a href="#new_structure" data-toggle="tab"><i class="fa fa-plus" aria-hidden="true" style="color:#060;"></i> เพิ่มโครงสร้าง ราคาสินค้า</a></li>
        <li><a href="#manage_structure" data-toggle="tab"> จัดการแสดงราคาสินค้า</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="manage_structure">
          <div class="row">
            <div class="col-xs-12">
              <div class="table-responsive">

                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อรุ่น</th>
                        <th class="text-center">พนักงาน</th>
                        <th class="text-center">โปรซีเคียว</th>
                        <th class="text-center">ตัวแทน</th>
                        <th class="text-center">ลูกค้าทั่วไป</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM price_product_apdu ppa
                                INNER JOIN price_products pp ON (ppa.pro_id = pp.pro_id)
                                ORDER BY ppa.id_apdu DESC";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['model'];?></td>
                                <td class="text-center"><?
                                    if ($row['admin']=='1') {
                                      ?><i class="fas fa-toggle-on fa-2x" style="color:#16994e;"></i><?
                                    }else {
                                      ?><i class="fas fa-toggle-off fa-2x" style="color:#f00;"></i><?
                                    }
                                  ?></td>
                                <td class="text-center"><?
                                    if ($row['prosecure']=='1') {
                                      ?><i class="fas fa-toggle-on fa-2x" style="color:#16994e;"></i><?
                                    }else {
                                      ?><i class="fas fa-toggle-off fa-2x" style="color:#f00;"></i><?
                                    }
                                  ?></td>
                                <td class="text-center"><?
                                    if ($row['dealer']=='1') {
                                      ?><i class="fas fa-toggle-on fa-2x" style="color:#16994e;"></i><?
                                    }else {
                                      ?><i class="fas fa-toggle-off fa-2x" style="color:#f00;"></i><?
                                    }
                                  ?></td>
                                <td class="text-center"><?
                                    if ($row['user']=='1') {
                                      ?><i class="fas fa-toggle-on fa-2x" style="color:#16994e;"></i><?
                                    }else {
                                      ?><i class="fas fa-toggle-off fa-2x" style="color:#f00;"></i><?
                                    }
                                  ?></td>
                                <td>
                                  <div class="btn-group" style="width: 100px;">
                                    <button id="<?=$row['pro_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit"><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['pro_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete disabled" disabled><i class="fa fa-trash-o"></i></button>
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
        <div class="tab-pane active" id="new_structure">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">รุ่นสินค้า</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="" name="nModel">
                      <option value="">เลือกรุ่นสินค้า</option>
                      <?
                        $sql = "SELECT pro_id,model
                                FROM price_products
                                WHERE pro_id NOT IN ( SELECT pro_id FROM price_product_apdu )
                                ORDER BY model ASC ";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['pro_id'];?>"><?=$row['model'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">พนักงาน</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="" name="nEmployee">
                      <option value="">เลือกการแสดงราคา</option>
                      <option value="1">เปิด</option>
                      <option value="2">-กรุณาสอบถาม-</option>
                      <option value="3">-Comming Soon-</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">โปรซีเคียว</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="" name="nProsecure">
                      <option value="">เลือกการแสดงราคา</option>
                      <option value="1">เปิด</option>
                      <option value="2">-กรุณาสอบถาม-</option>
                      <option value="3">-Comming Soon-</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ตัวแทน</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="" name="nDealer">
                      <option value="">เลือกการแสดงราคา</option>
                      <option value="1">เปิด</option>
                      <option value="2">-กรุณาสอบถาม-</option>
                      <option value="3">-Comming Soon-</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ลูกค้าทั่วไป</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="" name="nUser">
                      <option value="">เลือกการแสดงราคา</option>
                      <option value="1">เปิด</option>
                      <option value="2">-กรุณาสอบถาม-</option>
                      <option value="3">-Comming Soon-</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="SubmitNewPrice">เพิ่ม</button>
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
