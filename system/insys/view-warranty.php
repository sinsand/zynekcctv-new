<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ตรวจสอบระยะการรับประกัน</h3>

        <div class="box-tools pull-right" style="display:none;">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <!-- Table claim history -->
          <div class="col-xs-12">
            <div class="col-xs-12" style="padding:0px;">
              <div class="input-group">
                  <input type="search" class="form-control SearchView" placeholder="กรอกข้อมูลค้นหา หมายเลขสินค้า (Serial Number)" autocomplete="off">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default _ClickCheck" >ค้นหา</button>
                  </span>
              </div>
            </div>
          </div>
          <div class="col-xs-12 _ViewWarranty" style="padding:25px 15px;"></div>
        <!-- Table claim history -->
      </div>
    </div>

  </div>
</div>



<!--- Check warranty -->
<script>
  $(document).ready(function() {

    //// Click Check
    $("._ClickCheck").click(function(e) {
      if ($(".SearchView").val().length > 3 ) {
        $("._ViewWarranty").html("กำลังค้นหาข้อมูล.. <i class='fa fa-refresh faa-spin animated' aria-hidden='true'></i>");
        $.post('../../jquery/check_warranty.php',
        {
          value : $(".SearchView").val(),
          post  : "CheckWarranty"
        },
        function(d) {
          $("._ViewWarranty").html(d);
        });
      }else {
        $("._ViewWarranty").html("! กรุณากรอกข้อมูลให้มากกว่า 3 ตัวอักษรขึ้นไป");
      }
    });

    //// keyup Check
    $(".SearchView").keyup(function(e) {
      if ($(".SearchView").val().length > 3 ) {
        if (e.which=='13') {
          $("._ViewWarranty").html("กำลังค้นหาข้อมูล.. <i class='fa fa-refresh faa-spin animated' aria-hidden='true'></i>");
          $.post('../../jquery/check_warranty.php',
          {
            value : $(".SearchView").val(),
            post  : "CheckWarranty"
          },
          function(d) {
            $("._ViewWarranty").html(d);
          });
        }
      }else {
        $("._ViewWarranty").html("! กรุณากรอกข้อมูลให้มากกว่า 3 ตัวอักษรขึ้นไป");
      }
    });



  });
</script>
<!--- Check warranty -->
