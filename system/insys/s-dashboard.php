<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
    <div class="small-box bg-yellow">
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
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
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
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
    <div class="small-box bg-aqua">
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
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>
          <?
            $sql = "SELECT ID_PRODUCT FROM product_claim WHERE ( DATE_FORMAT(date_claim,'%Y-%m') = '".date("Y-m")."' AND dateprint != '0000-00-00' )";
            echo number_format(select_numz($sql));
          ?>
        </h3>

        <p>งานเสร็จสิ้นเดือนนี้</p>
      </div>
      <div class="icon">
        <i class="fa fa-check-square-o"></i>
      </div>
      <a href="#" class="small-box-footer">This Month <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>


  <div class="col-lg-6 col-md-6 col-sm-12 -col-xs-12">
   <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">สถิติงานซ่อมประจำเดือน</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
      </div>
    </div>
    <div class="box-body chart-responsive">
      <div class="chart" id="bar-chart" style="height: 300px;"></div>
    </div>
   </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 -col-xs-12">
   <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">สถิติงานซ่อมประจำเดือน</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
      </div>
    </div>
    <div class="box-body chart-responsive">
      <div class="chart" id="line-chart" style="height: 300px;"></div>
    </div>
   </div>
  </div>


</div>

<!-- Morris charts -->
<link rel="stylesheet" href="<?=SITE_URL;?>plugins/morris.js/morris.css">
<!-- Morris.js charts -->
<script src="<?=SITE_URL;?>plugins/raphael/raphael.min.js"></script>
<script src="<?=SITE_URL;?>plugins/morris.js/morris.min.js"></script>
<!-- FastClick -->
<script src="<?=SITE_URL;?>plugins/fastclick/lib/fastclick.js"></script>

<script type="text/javascript">
  $(function(){

    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });


    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

  })
</script>
