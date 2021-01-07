<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<?
if (isset($_POST['SubmitUpload'])) {
  // code...


    require ("plugins/PHPExcel-1.8/Classes/PHPExcel.php");
		$tmpfname = $_FILES['xlsxupload']['tmp_name'];
    //$tmpfname = ('file/stock report.xlsx');
		$excel = PHPExcel_IOFactory::load($tmpfname);
    ////  read active sheet
    $excel ->setActiveSheetIndex(0);
    //// SumTrue
    $suminsert_true = 0;
    $suminsert_error = 0;
    /// SumError
    $sumupdate_true = 0;
    $sumupdate_error = 0;
    /// Run Table
    $i=2;




    $sqlupdate = "UPDATE for_stock
                    SET amount_last = 0,
                        update_last = now(),
                        amount_update = 0,
                        create_update = now()
                  WHERE 1";
    if (update_tbz($sqlupdate)==true) {
      // code..update
      while ($excel->getActiveSheet()->getcell('B'.$i)->getValue()!="") {
        $brand  = $excel->getActiveSheet()->getcell('A'.$i)->getValue();
        $model  = $excel->getActiveSheet()->getcell('B'.$i)->getValue();
        $detail = $excel->getActiveSheet()->getcell('C'.$i)->getValue();
        $amount = $excel->getActiveSheet()->getcell('D'.$i)->getValue();
        $sql = "SELECT pp.model,pp.pro_id,pp.pb_id
                FROM price_products pp
                INNER JOIN price_brand pb ON (pp.pb_id = pb.pb_id)
                WHERE ( pp.model = '".$model."' ) ";
        if (select_numz($sql)>0) {
          foreach (select_tbz($sql) as $value) {

            /// check if have data on table
            $sqlcheck = "SELECT pro_id
                         FROM for_stock
                         WHERE ( pro_id = '".$value['pro_id']."' )";
            if (select_numz($sqlcheck)>0) {
              $sqlupdate = "UPDATE for_stock
                              SET amount_last = '".$amount."',
                                  update_last = now(),
                                  amount_update = '".$amount."',
                                  create_update = now(),
                                  description = '".htmlspecialchars($detail)."'
                            WHERE ( pro_id = '".$value['pro_id']."' )";
              if (update_tbz($sqlupdate)==true) {
                $sumupdate_true = $sumupdate_true +1;
              }else {
                $sumupdate_error = $sumupdate_error +1;
              }
            }else {
              $sqlinsert = "INSERT INTO for_stock
                              VALUES(0,
                                '".$value['pb_id']."',
                                '".$value['pro_id']."',
                                '".$detail."',
                                '$amount',
                                now(),
                                '$amount',
                                now(),
                                null)";
              if (insert_tbz($sqlinsert)==true) {
                $suminsert_true = $suminsert_true +1;
              }else {
                $suminsert_error = $suminsert_error +1;
              }
            }


          }
        }else {
          /// check if have data on table
          $sqlcheck = "SELECT pro_id FROM for_stock WHERE ( pro_id = '".$model."' )";
          if (select_numz($sqlcheck)>0) {
            $sqlupdate = "UPDATE for_stock
                              SET amount_last = '".$amount."',
                                  update_last = now(),
                                  amount_update = '".$amount."',
                                  create_update = now(),
                                  description = '".htmlspecialchars($detail)."'
                          WHERE ( pro_id = '".$model."' )";
            if (update_tbz($sqlupdate)==true) {
              $sumupdate_true = $sumupdate_true +1;
            }else {
              $sumupdate_error = $sumupdate_error +1;
            }
          }else {
            $sqlinsert = "INSERT INTO for_stock
                            VALUES(0,
                              '".$brand."',
                              '".$model."',
                              '".$detail."',
                              '$amount',
                              now(),
                              '$amount',
                              now(),
                              null
                            )";
            if (insert_tbz($sqlinsert)==true) {
              $suminsert_true = $suminsert_true +1;
            }else {
              $suminsert_error = $suminsert_error +1;
            }
          }
        }
        $i++;
      }

      if ($sumupdate_error ==0 && $suminsert_error ==0) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          สำเร็จ.<br>เพิ่มข้อมูล : <?=$suminsert_true;?> รายการ<br>เปลี่ยนแปลงข้อมูล : <?=$sumupdate_true;?> รายการ
        </div>
        <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
        <?
      }else {
        ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ไม่สามารถเพิ่มหรือเปลี่ยนแปลงข้อมูลได้.<br>
          การเพิ่มข้อมูลได้ : <?=$suminsert_true;?> รายการ<br>
          การเพิ่มข้อมูลผิดพลาด : <?=$suminsert_true;?> รายการ<br><br>
          การเปลี่ยนแปลงข้อมูลได้ : <?=$sumupdate_true;?> รายการ<br>
          การเปลี่ยนแปลงข้อมูลผิดหลาด : <?=$sumupdate_true;?> รายการ
        </div>
        <?
      }

      /// end code update
    }


}

?>



<div class="row">
  <div class="col-xs-12">

    <!--- Stock upload --->
    <div class="col-xs-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Upload CSV Stock</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <!--- อัพโหลดไฟล์ -->
            <div class="col-xs-12 col-sm-12 col-md-6">

              <form role="form" class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputFile">File .xlsx</label>
                      <input type="file" id="exampleInputFile" name="xlsxupload" required>
                      <p class="help-block">ตัวอย่างไฟล์ <a href="<?=SITE_URL;?>download/20032019stock____.xlsx">(ดาวโหลด)</a></p>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" required> ยืนยันการอัพโหลดไฟล์
                      </label>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="SubmitUpload">อัพโหลด</button>
                </div>
              </form>


            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <form role="form" class="form-horizontal" >
                <div class="box-body">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label >Search Stock :</label>
                      <select class="select2 form-control" id="SearchSelect">
                        <option value="">ค้นหาสินค้า</option>
                        <?
                          $sql = "SELECT fs.stock_id,fs.pro_id,pp.model,fs.amount_last
                                  FROM  for_stock fs
                                  LEFT OUTER JOIN price_products pp ON ( fs.pro_id = pp.pro_id )
                                  ORDER BY fs.pro_id ASC";
                          if (select_numz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>  <option value="<?=$row['stock_id'];?>"><?=empty($row['model'])?$row['pro_id']:$row['model'];?> - คงเหลือ <?=$row['amount_last'];?></option> <?
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--- Stock view --->
    <div class="col-xs-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Stock View</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">


              <!-- stock view -->
              <div class="table-responsive">
                <div class="col-xs-12">
                  <div class="input-group" style="display:none;">
                      <input type="search" class="form-control SearchView" placeholder="กรอกข้อมูลค้นหา " autocomplete="off">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default _ClickCheck" >ค้นหา</button>
                      </span>
                  </div>
                  <div class="col-xs-12">หมายเหตุ * สินค้าไม่มีในฐานข้อมูลเว็บไซต์</div>
                  <div class="col-xs-12">หมายเหตุ ** แบรนด์ไม่มีในฐานข้อมูลเว็บไซต์</div>
                  <?
                    $sql = "SELECT fs.pro_id,pp.model,pp.pro_id,fs.*,pb.*,fs.pb_id
                            FROM for_stock fs
                            LEFT OUTER JOIN price_products pp ON ( fs.pro_id = pp.pro_id )
                            LEFT OUTER JOIN price_brand pb ON ( pp.pb_id = pb.pb_id )
                            LEFT OUTER JOIN price_brand_sub pbs ON ( pp.pbs_id = pbs.pbs_id )
                            ORDER BY pb.pb_name,pbs.pbs_sort ASC,pp.model ASC";

                    $Per_Page = 75;   // Per Page
                    $Page = $UrlIdSub;
                    if(!$UrlIdSub){
                      $Page=1;
                    }

                    $Prev_Page = $Page-1;
                    $Next_Page = $Page+1;

                    $Page_Start = (($Per_Page*$Page)-$Per_Page);
                    if(select_numz($sql)<=$Per_Page){
                      $Num_Pages =1;
                    }
                    else if((select_numz($sql) % $Per_Page)==0){
                      $Num_Pages =(select_numz($sql)/$Per_Page) ;
                    }else{
                      $Num_Pages =(select_numz($sql)/$Per_Page)+1;
                      $Num_Pages = (int)$Num_Pages;
                    }
                    $id_run = $Page_Start+1;

                    $sql .= " LIMIT $Page_Start , $Per_Page; ";
                    //echo $sql;
                  ?>

                  <nav>
                    <ul class="pagination">
                     <?
                        if($Prev_Page){
                          ?><li><a href="<?=SITE_URL_ADMIN.$UrlId;?>/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                        }
                        for($i=1; $i<=$Num_Pages; $i++){
                          $Page1 = $Page-2;
                          $Page2 = $Page+2;
                          if($i != $Page && $i >= $Page1 && $i <= $Page2){
                            ?><li><a href="<?=SITE_URL_ADMIN.$UrlId;?>/<?=$i;?>"><?=$i;?></a></li><?
                          }else if($i==$Page){
                            ?><li class="active"><a href="#"><?=$i;?></a></li><?
                          }
                        }
                        if($Page!=$Num_Pages){
                          ?><li><a href="<?=SITE_URL_ADMIN.$UrlId;?>/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                        }
                    ?>
                    </ul>
                  </nav>
                </div>
                <table class="table table-striped table-hover TablePrice">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th class="text-left">แบรนด์</th>
                      <th class="text-left">รุ่นสินค้า</th>
                      <th class="text-center">รูป</th>
                      <th class="text-left">รายละเอียด</th>
                      <th class="text-center">จำนวนคงเหลือ</th>
                      <th class="text-center">วันที่ลงข้อมูล</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      if (select_numz($sql)>0) {
                        foreach (select_tbz($sql) as $row) {
                          ?>
                          <tr>
                            <td class="text-center"><?=($id_run++);?></td>
                            <td class="text-left"><?=$row['pb_name']==""?$row['pb_id']."**":$row['pb_name'];?></td>
                            <td class="text-left"><?=$row[1]==""?$row[0]."*":$row[1];?></td>
                            <td class="text-center"><?=empty($row[1])?"-":"<img class='lazy' src='".SITE_URL."images/loading.gif"."' data-src='http://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png' alt='' style='width:60px;height:auto;'>";?> </td>
                            <td class="text-left"><?=$row['description'];?></td>
                            <td class="text-center"><?=$row['amount_last'];?></td>
                            <td class="text-center"><span class="label label-default">จำนวนล่าสุด : <?=$row['amount_last'];?></span><br><?=datetime($row['update_last']);?></td>
                            <td class="text-center">
                              <div class="btn-group" style="width: 80px;">
                                <button id="<?=$row['stock_id'];?>" data-model="<?=$row[1]==""?$row[0]:$row[1];?>" data-value="<?=$row['amount_last'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default modal-edit " ><i class="fa fa-pencil"></i></button>
                                <button id="<?=$row['stock_id'];?>" data-value="<?=$row[1]==""?$row[0]:$row[1];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger modal-delete <?=ch_forstock($row['stock_id']);?>" <?=ch_forstock($row['stock_id']);?> ><i class="fa fa-trash-o"></i></button>
                              </div>
                            </td>
                          </tr>
                          <?
                        }
                      }else {
                        ?>
                          <tr>
                            <td class="text-center" colspan="8">ไม่มีข้อมูล</td>
                          </tr>
                        <?
                      }
                    ?>
                  </tbody>
                </table>
                <div class="col-xs-12">
                  <nav>
                    <ul class="pagination">
                     <?
                        if($Prev_Page){
                          ?><li><a href="<?=SITE_URL_ADMIN.$UrlId;?>/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                        }
                        for($i=1; $i<=$Num_Pages; $i++){
                          $Page1 = $Page-2;
                          $Page2 = $Page+2;
                          if($i != $Page && $i >= $Page1 && $i <= $Page2){
                            ?><li><a href="<?=SITE_URL_ADMIN.$UrlId;?>/<?=$i;?>"><?=$i;?></a></li><?
                          }else if($i==$Page){
                            ?><li class="active"><a href="#"><?=$i;?></a></li><?
                          }
                        }
                        if($Page!=$Num_Pages){
                          ?><li><a href="<?=SITE_URL_ADMIN.$UrlId;?>/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                        }
                    ?>
                    </ul>
                </div>
              </div>
              <!-- stock view -->





            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>



<?
function ch_forstock($value){
  $sql = "SELECT stock_id
          FROM  for_taskdetail
          WHERE ( stock_id = '$value' );";
  if (select_numz($sql)>0) {
    return "disabled";
  }else {
    return null;
  }
}
?>


<!-- edit task -->
<script>
  $(document).ready(function() {

    $(".modal-edit").click(function(event) {
      $("#ep_Model").val($(this).attr("data-model"));
      $("#ep_NewAmount").val($(this).attr("data-value"));
      $(".SubmitUpdateSetPrice").attr("id",$(this).attr("id"));


    });


    $(".SubmitUpdateSetPrice").click(function(event) {
      if ($("#ep_NewAmount").val()!="") {
        $.post("../../query/others.php",
        {
          value   : $(this).attr("id"),
          _amount : $("#ep_NewAmount").val(),
          post    : "ForecastUpdateStock"
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
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขจำนวนสินค้า</h4>
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
                    <input type="text" class="form-control"  value="" id="ep_Model"  readonly  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">จำนวนสินค้า  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  value="" id="ep_NewAmount" placeholder="จำนวนสินค้า" autocomplete="off"  />
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
        <button type="button" class="btn btn-info SubmitUpdateSetPrice">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit task -->





<!-- delete stock  -->
<script>
  $(document).ready(function() {

    $(".modal-delete").click(function(event) {
      $(".show_data_value").html($(this).attr("data-value"));
      $(".btn_delete_stock").attr($(this).attr("id"));
    });

    $(".btn_delete_stock").click(function(event) {
      $.post("../../query/others.php",
      {
        value   : $(this).attr("id"),
        post    : "ForecastDeleteStock"
      },
      function(d) {
        var i = d.split("|||");
        if (i[0]!=1) {
          $(".show_delete_stock").html(i[1]);
        }else {
          $(".show_delete_stock").html(i[1]);
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
            <div class="control-label" id="show_delete_stock" style="padding:25px 0;">สินค้า <label class="show_data_value">MAXXXXXX</label></div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default " data-dismiss="modal" id="">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger btn_delete_stock">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete stock -->
