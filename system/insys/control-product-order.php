<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>

<?
if (isset($_POST['SubmitInProduct'])) {
  /*$sql = "INSERT INTO for_productview
            VALUES(0,
              '".$_POST['pn_model']."',
              '".$_POST['pn_order_run']."',
              '".$_POST['pn_schedule']."',
              now(),
              '".base64url_decode($_COOKIE[$CookieID])."'
            );";*/

  $sql = "UPDATE for_stock
            SET order_run = '".$_POST['pn_order_run']."'
          WHERE ( stock_id = '".$_POST['pn_stock']."' ); ";
  //echo $sql;
  if (update_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4> เพิ่มข้อมูลสำเร็จ.
    </div>
    <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4> ไม่สามารถเพิ่มข้อมูลได้.
    </div>
    <?
  }
}
?>

<div class="row">
  <div class="col-xs-12">


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
                  <?
                    $sql = "SELECT fs.pro_id,pp.model,fs.stock_id,fs.amount_last
                            FROM for_stock fs
                            LEFT OUTER JOIN price_products pp ON ( fs.pro_id = pp.pro_id )
                            WHERE ( fs.order_run = '' OR fs.order_run IS NULL )
                            ORDER BY fs.pro_id  ASC ";
                    if (select_numz($sql)>0) {
                      ?> <option value="">เลือกรุ่นสินค้า</option> <?
                      foreach (select_tbz($sql) as $row) {
                        ?> <option value="<?=$row['stock_id'];?>"><?=!empty($row[1])?$row[1]:$row[0];?> - คงเหลือ <?=$row['amount_last'];?></option> <?
                      }
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




    <!--- View Product Show --->
    <div class="col-xs-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">สินค้าสำหรับทำ  Forecasting</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <!-- view product show -->
              <div class="table-responsive">
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th>รูปสินค้า</th>
                      <th>รุ่นสินค้า</th>
                      <th>รายละเอียด</th>
                      <th class="text-center">ลำดับการแสดงสินค้า</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql = "SELECT fs.pro_id,pp.model,fs.*
                              FROM for_stock fs
                              LEFT OUTER JOIN  price_products pp ON ( fs.pro_id = pp.pro_id )
                              WHERE ( fs.order_run != '' )
                              ORDER BY fs.order_run ASC";
                      if (select_numz($sql)>0) {
                        $a=1;
                        $i=1;
                        $sum=0;
                        $category_i = 0;
                        $pre='';
                        $model = "";
                        $str_date = "";
                        foreach (select_tbz($sql) as $row) {

                          ?>
                          <tr>
                            <td class="text-center"><?=($i++);?></td>
                            <td><?=!empty($row['model'])?"<img class='lazy' src='".SITE_URL."images/loading.gif"."' data-src='http://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png' alt='' style='width:60px;height:auto;'>":"-";?> </td>
                            <td><?=!empty($row['model'])?$row['model']:$row['pro_id'];?></td>
                            <td><?=$row['description'];?></td>
                            <td class="text-center"><?=$row['order_run'];?></td>
                            <td class="text-center">
                              <div class="btn-group" style="width: 80px;">
                                <button id="<?=$row['stock_id'];?>" data-run="<?=$row['order_run'];?>" data-model="<?=!empty($row[1])?$row[1]:$row[0];?>" data-toggle="modal" data-target="#modal-edit"   class="btn btn-default modal-edit"><i class="fa fa-pencil"></i></button>
                                <button id="<?=$row['stock_id'];?>" data-run="<?=$row['order_run'];?>" data-model="<?=!empty($row[1])?$row[1]:$row[0];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default modal-delete"><i class="fa fa-trash-o"></i></button>
                              </div>
                            </td>
                          </tr>
                          <?
                        }
                      }else {
                        ?>
                          <tr>
                            <td class="text-center" colspan="6">ไม่มีข้อมูล</td>
                          </tr>
                        <?
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- view product show -->
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>




<!-- edit product -->
<script>
  $(document).ready(function() {

    $(".modal-edit").click(function(event) {
      $(".SubmitUpdateProduct").attr("id",$(this).attr("id"));

      $("#en_model").val($(this).attr("data-model"));
      $("#ep_run").val($(this).attr("data-run"));

    });


    $(".SubmitUpdateProduct").click(function(event) {
      if ($("#ep_run").val()!="") {
        $.post("../../new/jquery/others.php",
        {
          value : $(this).attr("id"),
          _order_run : $("#ep_run").val(),
          post  : "ForecastUpdateProductView"
        },
        function(d) {
          var i = d.split("|||");
          if (i[0]!=1) {
            $(".alert_update_edit").html(i[1]);
          }else {
            $(".alert_update_edit").html(i[1]);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },2000);
          }
        });
      }else {
        $(".alert_update_edit").html("กรุณากรอกตัวเลข");
      }
    });

  });
</script>
<div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขลำดับ <label class="eddddd"></label></h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">รุ่นสินค้า  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="en_model" readonly autocomplete="off"  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ลำดับ  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="ep_run" placeholder="ลำดับ" autocomplete="off"  />
                  </div>
                </div>
              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_edit">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateProduct">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit product -->


<!-- delete product  -->
<script>
  $(document).ready(function() {

    $(".modal-delete").click(function(e) {
      $(".BtnDeleteProduct").attr("id",$(this).attr("id"));
    });


    $(".BtnDeleteProduct").click(function(e) {
      $.post("../../new/jquery/others.php",
      {
        value  : $(this).attr("id"),
        post  : "ForecastDeleteProductView"
      },
      function(d) {
        var i = d.split("|||");
        if (i[0]!=1) {
          $(".show_delete_productview").html(i[1]);
        }else {
          $(".show_delete_productview").html(i[1]);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },2000);
        }
      });
    });


  });
</script>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #f00;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon glyphicon-trash" style=" color: #FFF"></span> ลบข้อมูล</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="text-align: center; margin: 0;">
            <div class="control-label" id="show_delete_productview" style="padding:25px 0;">ยืนยันลบข้อมูล</div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default " data-dismiss="modal" id="">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger BtnDeleteProduct">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete product -->
