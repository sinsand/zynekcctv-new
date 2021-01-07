<div class="row">
  <div class="col-sm-12 col-xs-12">




    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#new_download" data-toggle="tab">เพิ่มรายการดาวโหลด</a></li>
        <li><a href="#view_download" data-toggle="tab">ดูรายการดาวโหลด</a></li>

        <li><a href="#new_type_download" data-toggle="tab">เพิ่มประเภท</a></li>
        <li><a href="#view_type_download" data-toggle="tab">ประเภทการดาวโหลด</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="new_download">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="ชื่อรายการดาวโหลด">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">UploadFile</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="fileupload">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="Y">เปิด</option>
                      <option value="N">ปิด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileSize" class="col-sm-2 control-label">ขนาดไฟล์</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fileSize" placeholder="ขนาดไฟล์ 2.3Mb">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileSize" class="col-sm-2 control-label">ประเภทไฟล์</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fileSize" placeholder="ประเภทไฟล์ pdf | pps | zip | rar">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">เลือกยี่ห้อ</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="">เลือกยี่ห้อ</option>
                      <?
                        $sql = "SELECT * FROM name_brand WHERE (status_brand = 'Y') ORDER BY name_brand ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_brand'];?>"><?=$row['name_brand'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">เลือกประเภท</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="">เลือกประเภท</option>
                      <?
                        $sql = "SELECT * FROM dl_menu WHERE (DL_menu_status = 'Y') ORDER BY DL_menu_name DESC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_DL_menu'];?>"><?=$row['DL_menu_name'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">เพิ่ม</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="view_download">
          <div class="row">
            <div class="col-xs-12">

            </div>
            <div class="col-xs-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ยี่ห้อ</th>
                      <th style="min-width:250px;">ชื่อไฟล์</th>
                      <th style="min-width: 100px;">ลิ้งดาวโหลด</th>
                      <th style="min-width: 80px;">ขนาดไฟล์</th>
                      <th>ประเภทไฟล์</th>
                      <th style="min-width: 100px;">วันที่ลง</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql = "SELECT *
                              FROM dl_status ds
                              INNER JOIN dl_sub_detail  dld ON (ds.ID_DL_status = dld.ID_status)
                              INNER JOIN name_brand nb ON (ds.ID_brand = nb.ID_brand)
                              WHERE ( dld.DL_sub_status = 'Y' )
                              ORDER BY dld.DL_sub_date DESC ";
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$row['name_brand'];?></td>
                              <td><?=$row['DL_sub_detail'];?></td>
                              <td><a href="<?=$row['DL_sub_url'];?>" target="_blank">ดาวโหลด</a></td>
                              <td><?=$row['DL_sub_size'];?></td>
                              <td><?=$row['group_type'];?></td>
                              <td><?=$row['DL_sub_date'];?></td>
                              <td>
                                <div class="btn-group" style="width: 100px;">
                                  <button id="<?=$row['ID_DL_sub'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit"><i class="fa fa-pencil"></i></button>
                                  <button id="<?=$row['ID_DL_sub'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete disabled" disabled><i class="fa fa-trash-o"></i></button>
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

        <div class="tab-pane" id="new_type_download">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">ชื่อประเภท</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="ชื่อประเภทดาวโหลด">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="Y">เปิด</option>
                      <option value="N">ปิด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">ลำดับ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="เรียงลำดับ">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">เพิ่ม</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>




        <div class="tab-pane" id="view_type_download">
          <div class="row">
            <div class="col-xs-12">

            </div>
            <div class="col-xs-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th>ชื่อประเภท</th>
                      <th class="text-center">เรียงลำดับ</th>
                      <th class="text-center">สถานะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql = "SELECT *
                              FROM dl_menu
                              ORDER BY DL_menu_sort ASC ";
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                            <tr>
                              <td class="text-center"><?=$i;?></td>
                              <td><?=$row['DL_menu_name'];?></td>
                              <td class="text-center"><?=$row['DL_menu_sort'];?></td>
                              <td class="text-center"><?=$row['DL_menu_status']=="Y"?"<i class='fa fa-power-off' aria-hidden='true' style='color:#060;'></i>":"<i class='fa fa-power-off' aria-hidden='true' style='color:#f00;'></i>";?></td>
                              <td>
                                <div class="btn-group" style="width: 100px;">
                                  <button id="<?=$row['ID_DL_menu'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit"><i class="fa fa-pencil"></i></button>
                                  <button id="<?=$row['ID_DL_menu'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete disabled" disabled><i class="fa fa-trash-o"></i></button>
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




      </div>
    </div>




  </div>
</div>
