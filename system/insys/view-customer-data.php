<div class="row">
  <div class="col-lg-4 col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#checkclaim" data-toggle="tab">ค้นหาข้อมูลลูกค้า</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="">
            <div class="active tab-pane" id="settings">
              <div class="typeahead__container">
                  <div class="typeahead__field">

                      <span class="typeahead__query">
                          <input class="js-typeahead-user_v1 form-control" id="focus_search" name="user_v1[query]" type="search" placeholder="ค้นหาชื่อบริษัท" autocomplete="off">
                      </span>
                      <span class="typeahead__button">
                          <button type="submit">
                              <i class="typeahead__search-icon"></i>
                          </button>
                      </span>

                  </div>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>
<script src="<?=SITE_URL;?>plugins/typehead/jquery.typeahead.min.js"></script>
<link rel="stylesheet" href="<?=SITE_URL;?>plugins/typehead/jquery.typeahead.min.css">
<script>
  $(document).ready(function() {
    $("#click_show,#close_search").click(function(event) {
      $("#focus_search").val("");
      $("#focus_search").focus();
    });
  });

  $.typeahead({
      input: '.js-typeahead-user_v1',
      minLength: 1,
      order: "asc",
      dynamic: true,
      delay: 500,
      backdrop: {
          "background-color": "#fff"
      },
      template: function (query, item) {

      },
      emptyTemplate: "ไม่มีข้อมูล '{{query}}'",
      source: {
          project: {
              display: "company",
              href: function (item) {
                  //return '?page=<?=$_GET[page];?>&productid=' + item.productid + ''
              },
              ajax: [{
                  type: "GET",
                  url: "../../../jquery/json_customer_member.php",
                  //url: "../../../jquery/json_product_and_price.php",
                  data: {
                      keyword: "{{query}}"
                  }
              }, "data.company"],
              template: '<span class="row" style="margin:0px;">' +
                            '<span class="col-xs-12" style="padding:0px;">' +
                                '<span class="col-xs-12"><label>บริษัท :</label> {{company}}</span>' +
                            '</span>' +
                        '</span>'
          }
      },
      callback: {
          onClick: function (node, a, item, event) {
              $("#myModal_customer").modal();
              $(".modal_member_id").html(item.member_id);
              $(".modal_username").html(item.username);
              $(".modal_acronym").html(item.acronym);
              $(".modal_company").html(item.company);
              $(".modal_address").html(item.address);
              $(".modal_phone").html(item.phone);
              $(".modal_telephone").html(item.telephone);
              $(".modal_fax").html(item.fax);
              $(".modal_email").html(item.email);
              $(".modal_contact").html(item.contact);
              $(".modal_time_member").html(item.time_member);
              $(".modal_group_member").html(item.group_member);
          },
          onSendRequest: function (node, query) {
              console.log('request is sent' + query)
          },
          onReceiveRequest: function (node, query) {
              console.log('request is received' + query)
          }
      },
      debug: true
  });
</script>
<div class="modal fade" id="myModal_customer" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background: #1cab4d;color: #fff;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ข้อมูลลูกค้า</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12">
              <form class="form-horizontal">
                <div class="form-group">
                      <label class="col-sm-4 control-label">รหัสลูกค้า :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_username" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">กลุ่มลูกค้า :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_group_member" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">ผู้ติดต่อ :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_contact" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">ประเภท :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_acronym" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">บริษัท :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_company" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">ที่อยู่ :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_address" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">อีเมล :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_email" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">เบอร์ติดต่อ:</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_phone" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">เบอร์โทรศัพท์ :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_telephone" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">แฟ็ก :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_fax" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-4 control-label">วันที่ลงข้อมูล :</label>
                    <div class="col-sm-8">
                      <span class="col-xs-12 text-left modal_time_member" style="padding-top: 7px;margin-bottom: 0;"></span>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close_search">ปิด</button>
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <?
      $sql = "SELECT mem_group,mem_group_name
              FROM  member_group
              WHERE mem_group IN ( SELECT group_member FROM member WHERE (status_member = 'Y') )";
      if (select_numz($sql)>0) {
        foreach (select_tbz($sql) as $row) {
          ?>
          <div class="col-lg-3 col-xs-4">
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                  <?
                    $sql = "SELECT member_id FROM member WHERE ( status_member = 'Y' AND group_member = '".$row['mem_group']."' )";
                    echo number_format(select_numz($sql));
                  ?>
                </h3>
                <p>ลูกค้ากลุ่ม <?=$row['mem_group_name'];?></p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <?
        }
      }
    ?>
    <div class="col-lg-3 col-xs-12">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>
            <?
              $sql = "SELECT member_id FROM member WHERE (status_member = 'Y' )";
              echo number_format(select_numz($sql));
            ?>
          </h3>
          <p>ลูกค้าทั้งหมด</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
  </div>
</div>
