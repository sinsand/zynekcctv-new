
<script>
  $(document).ready(function() {
    ////// Search For Table
      $("#SearchView").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".TablePrice tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();
        });
      });
  });
</script>

<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#new_price" data-toggle="tab"><i class="fa fa-plus" aria-hidden="true" style="color:#f00;"></i> เพิ่มรายการสินค้า</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="new_price">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <div class="col-xs-12" style="padding:15px;">
                <h4>ลำดับการเพิ่มรายการสินค้า</h4>
                <ul>
                  <li> เพิ่มรายการสินค้าเสร็จสิ้น</li>
                  <li> คลิกแก้ไข เพื่อเพิ่มรูปสินค้า และเปคสินค้า</li>
                  <li> เพิ่มโครงสร้างราคาสินค้า โปรซีเคียว และตัวแทนจำหน่าย</li>
                </ul>
              </div>
              <hr class="col-xs-12" style="padding:25px 0;" />

              <form class="form-horizontal">
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
                  <label for="inputEmail" class="col-sm-2 control-label">เลือกประเภท</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="">เลือกประเภท</option>
                      <?
                        $sql = "SELECT * FROM price_brand_sub WHERE (pbs_status = '1') ORDER BY pbs_sort ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['pbs_id'];?>"><?=$row['pbs_name'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อรุ่นสินค้า</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="ชื่อรุ่นสินค้า">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">รายละเอียดสินค้า</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" rows="8" cols="80" placeholder="รายละเอียดสินค้า"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ราคาสินค้า</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="5000">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ประกัน (ปี)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">จำหน่ายโดย</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="">เลือกจำหน่าย</option>
                      <option value="1">โปรซีเคียว</option>
                      <option value="2">ซายเนค</option>
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
      </div>
    </div>
  </div>
</div>
