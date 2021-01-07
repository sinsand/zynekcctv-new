<script type="text/javascript" src="<?=SITE_URL;?>plugins/jasonday-printThis-edc43df/printThis.js"></script>
<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<div class="row">
  <div class="col-xs-12">


    <!--- Admin Task Report Product --->
    <div class="col-xs-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Report Product</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!--- table -->
          <div class="row">
            <div class="col-xs-12">
              <h3 class="text-center">Product Forecasting Summary Detail <a id="PrintShowPrintProduct-Form" style="cursor:pointer;"><i class="fa fa-print fa-1x" style="" aria-hidden="true"></i></a></h3>
              <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for=""class="control-label col-sm-3">Product :</label>
                    <div class="col-sm-5 col-xs-12" style="margin-bottom:20px;">
                      <select class="select2 form-control" id="ValueViewCode"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <?
                          $sql = "SELECT fs.stock_id,fs.pro_id,pp.model,fs.amount_last
                                  FROM  for_stock fs
                                  LEFT OUTER JOIN price_products pp ON ( fs.pro_id = pp.pro_id )
                                  WHERE ( fs.stock_id IN (  SELECT stock_id
                                                            FROM for_taskdetail
                                                         )
                                        )";
                          echo $sql;
                          if (select_numz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>  <option value="<?=$row['stock_id'];?>"><?=empty($row['model'])?$row['pro_id']:$row['model'];?> - คงเหลือ <?=$row['amount_last'];?></option> <?
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-4 col-xs-12" style="margin-bottom:20px;">
                        <button type="button" class="btn btn-primary" id="BtnViewCode">View Report</button>
                    </div>
                    <div class="text-center" id="ViewErrorCode"></div>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-xs-12" id="ShowPrintProduct-Form">
              <div class="table-responsive">
                  <table class="table table-striped table-hover ShowProductReport">
                  </table>
              </div>
            </div>
          </div>
          <!--- table -->
        </div>
      </div>
    </div>
    <!--- Admin Task Report Product --->



    <!--- Admin Task Report Schedule --->
    <div class="col-xs-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Report Schedule</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!--- table -->
          <div class="row">
            <div class="col-xs-12">
              <h3 class="text-center">Schedule Forecasting Summary Detail  <a id="PrintShowPrintSchedule-Form" style="cursor:pointer;"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a></h3>
              <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for=""class="control-label col-sm-3">รอบ :</label>
                    <div class="col-sm-5" style="margin-bottom:20px;">
                      <select class="form-control select2 select2-hidden-accessible" id="ViewSchedule" style="width: 100%;" tabindex="-1" aria-hidden="true" name="scheduleid">
                        <?
                        $sql = "SELECT *
                                FROM for_schedule
                                WHERE (
                                        schedule_status = '1'
                                      )
                                ORDER BY end_date DESC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            $Disabled = "";
                            $date1 = date_create($row['str_date']);
                            $date2 = date_create(date("Y-m-d"));
                            $diff = date_diff($date1,$date2);
                            $result = $diff->format("%R%a");
                            echo $result;
                            if ($result<=0) {
                              //$Disabled = " disabled='disabled' ";
                            }
                            ?><option value="<?=$row['schedule_id'];?>" <?=$Disabled;?>><?=$row['title_schedule']." (".date_($row['str_date'])." ".date_($row['end_date']).")";?></option><?
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-4" style="margin-bottom:20px;">
                      <button type="button" class="btn btn-primary" id="BtnViewCodeSchedule">View Report</button>
                    </div>
                    <div class="text-center" id="ViewErrorCodeSchedule"></div>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-xs-12" id="ShowPrintSchedule-Form">
              <div class="table-responsive">
                  <table class="table table-striped table-hover table_schedule_print ShowScheduleReport">

                  </table>
              </div>
            </div>
          </div>
          <!--- table -->
        </div>
      </div>
    </div>
    <!--- Admin Task Report Schedule --->


  </div>
</div>



<script>
  $(document).ready(function() {


    //// Code Product
    $("#BtnViewCode").click(function(event) {
      if ($("#ValueViewCode").val()!="") {
        $(".ShowProductReport").html("<tr><td colspan='<?=$TrCode;?>' class='text-center'>Waiting....<i class='fa fa-spinner faa-spin animated' aria-hidden='true'></i></td></tr>");
        $.post("../../../jquery/view_forecasting_report.php",
        {
          code    : $("#ValueViewCode").val(),
          post    : "ViewProductReport"
        },
        function(d) {
          setTimeout(function(){
            $(".ShowProductReport").html(d);
            $("#viewCode-print").html($("#ValueViewCode").val());
            $(".ShowProductReport-print").html(d);
          },2000);
        });
      }else {
        $("#ViewErrorCode").html("Please select Product!");
      }
    });


    ///// Schedule Product
    $("#BtnViewCodeSchedule").click(function(event) {
      if ($("#ViewSchedule").val()!="") {
        $(".ShowScheduleReport").html("<tr><td colspan='<?=$TrSchedule;?>' class='text-center'>Waiting....<i class='fa fa-spinner faa-spin animated' aria-hidden='true'></i></td></tr>");
        $.post("../../../jquery/view_forecasting_report.php",
        {
          schedule : $("#ViewSchedule").val(),
          post     : "ViewScheduleReport"
        },
        function(d) {
          setTimeout(function(){
            $(".ShowScheduleReport").html(d);
          },2000);
        });
      }else {
        $("#ViewErrorCodeSchedule").html("Please select Schedule!");
      }
    });


  });
</script>
<script>
  $(document).ready(function() {
    $("#PrintShowPrintProduct-Form").click(function(event) {
      $("#ShowPrintProduct-Form").printThis();
    });
    $("#PrintShowPrintSchedule-Form").click(function(event) {
      $("#ShowPrintSchedule-Form").printThis();
    });
  });
</script>
