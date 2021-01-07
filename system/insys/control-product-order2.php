
    <!--- Creat Product Show --->
    <div class="col-xs-12 col-sm-8 col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">สร้างสินค้ารอทำ forecast</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- Creat Product show -->
        <div class="box-body">
          <div class="col-xs-12">
            <form role="form" class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" >
              <div class="form-group">
                <label>รุ่นสินค้า</label>
                <select class="form-control select2" name="pn_stock"  style="width: 100%;">
                  <option value="">เลือกรุ่นสินค้า</option>
                  <?
                    $sqll = " SELECT fs.pro_id,pp.model,fs.stock_id,fs.amount_last
                              FROM for_stock fs
                              LEFT OUTER JOIN price_products pp ON ( fs.pro_id = pp.pro_id )
                              WHERE ( fs.order_run = '' )
                              ORDER BY fs.pro_id  ASC ;";
                    if (select_numz($sqll)>0) {
                      foreach (select_tbz($sqll) as $row) {
                        ?> <option value="<?=$row['stock_id'];?>"><?=$row['pro_id'];?> - คงเหลือ <?=$row['amount_last'];?></option> <?
                      }
                    }else {
                      ?><option value="">ไม่มีรุ่นสินค้า</option><?
                    }
                  ?>
                </select>
              </div>
              <div class="form-group" >
                <label>ลำดับ</label>
                <input class="form-control" type="text" name="pn_order_run" value="" placeholder="01001" required autocomplete="off">
              </div>
              <div class="form-group" >
                <input type="checkbox" id="check_request" required> <label style="font-weight:normal;" for="check_request">ยืนยันการบันทึก</label>
              </div>
              <div class="form-group" >
                <label></label>
                <button type="submit" class="btn btn-primary" name="SubmitInProduct">บันทึก</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Creat Product show -->
      </div>
    </div>
