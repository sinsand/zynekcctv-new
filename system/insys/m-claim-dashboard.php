<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          <?
            $sql = "SELECT ID_PRODUCT FROM product_claim WHERE (date_claim = '".date("Y-m-d")."' )";
            echo number_format(select_numz($sql));
          ?>
        </h3>
        <p>งานใหม่วันนี้</p>
      </div>
      <div class="icon">
        <i class="fa fa-cog"></i>
      </div>
      <a href="#" class="small-box-footer">This Day <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>
          <?
            $sql = "SELECT ID_PRODUCT FROM product_claim WHERE ( repair = '0' )";
            echo number_format(select_numz($sql));
          ?>
        </h3>
        <p>งานค้างซ่อม</p>
      </div>
      <div class="icon">
        <i class="fa fa-cogs"></i>
      </div>
      <a href="#" class="small-box-footer">This Month <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
          <?
            $sql = "SELECT ID_PRODUCT FROM product_claim WHERE ( DATE_FORMAT(date_claim,'%Y-%m') = '".date("Y-m")."' AND repair = '0' )";
            echo number_format(select_numz($sql));
          ?>
        </h3>

        <p>งานซ่อมใหม่เดือนนี้</p>
      </div>
      <div class="icon">
        <i class="fa fa-file"></i>
      </div>
      <a href="#" class="small-box-footer">This Month <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
