<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#view_price" data-toggle="tab"><i class="fa fa-search" aria-hidden="true" style="color:#f00;"></i> ดูรายการสินค้า</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="view_price">
          <div class="row">
            <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
              <div class="col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า" id="SearchView">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default">ค้นหา</button>
                    </span>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <span class="label label-default">เพิ่มรายการสินค้า > แก้ไข > อัพโหลดรูปภาพ และ สเปคสินค้า</span>
              <div class="table-responsive">

                  <table class="table table-striped table-hover TablePrice">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อรุ่น</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>ยี่ห้อ</th>
                        <th class="text-right" style="min-width:80px;">ราคา</th>
                        <th>ประกัน(ปี)</th>
                        <th>สถานะราคา</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM price_products pp
                                INNER JOIN price_product_apdu ppa ON ( pp.pro_id = ppa.pro_id )
                                INNER JOIN price_brand pd ON ( pp.pb_id = pd.pb_id )
                                ORDER BY pp.pro_id DESC";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['model'];?></td>
                                <td><?=$row['description'];?></td>
                                <td><?=$row['pb_name'];?></td>
                                <td class="text-right"><?=number_format($row['price_list']);?></td>
                                <td class="text-center"><?=$row['warranty'];?></td>
                                <td class="text-center"><?=$row['price_stus']=='1'?"แสดง":"ปิด";?></td>






                                <td>
                                  <div class="btn-group" style="width: 117px;">
                                    <button id="<?=$row['pro_id'];?>" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view"><i class="fa fa-search"></i></button>
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
      </div>
    </div>
  </div>
</div>
