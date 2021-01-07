<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#view_promotion" data-toggle="tab">รายการโปรโมชั่น</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="view_promotion">
          <div class="row">

            <?
            if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
              ?>
                <!-- User -->
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 style="margin:0px;">กลุ่มลูกค้าทั่วไป</h4>
                        <hr class="col-xs-12 hr" />
                        <?
                          $sql = "SELECT *
                                  FROM z_promotion
                                  WHERE ( pro_group = 'U' AND pro_status = '1' ) AND
                                        ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                  ORDER BY create_date DESC";
                          if (select_tbz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                  <a class="_ClickView col-xs-12">
                                      <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                  </a>
                                </div>
                              <?
                            }
                          }else {
                            ?>ไม่มีข้อมูล<?
                          }
                        ?>

                    </div>
                  </div>
                </div>
                <!-- Dealer -->
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 style="margin:0px;">กลุ่มตัวแทนจำหน่าย</h4>
                        <hr class="col-xs-12 hr" />
                        <?
                          $sql = "SELECT *
                                  FROM z_promotion
                                  WHERE ( pro_group = 'D' AND pro_status = '1' ) AND
                                        ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                  ORDER BY create_date DESC";
                          if (select_tbz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>"  data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                  <a class="_ClickView col-xs-12">
                                      <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                  </a>
                                </div>
                              <?
                            }
                          }else {
                            ?>ไม่มีข้อมูล<?
                          }
                        ?>


                    </div>
                  </div>
                </div>
                <!-- Prosecure -->
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 style="margin:0px;">กลุ่มโปรซีเคียว</h4>
                        <hr class="col-xs-12 hr" />
                        <?
                          $sql = "SELECT *
                                  FROM z_promotion
                                  WHERE ( pro_group = 'P' AND pro_status = '1' ) AND
                                        ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                  ORDER BY create_date DESC";
                          if (select_tbz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_ " id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                  <a class="_ClickView col-xs-12">
                                      <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                  </a>
                                </div>
                              <?
                            }
                          }else {
                            ?>ไม่มีข้อมูล<?
                          }
                        ?>


                    </div>
                  </div>
                </div>
              <?
            }else {
              if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") {
                ?>
                <!-- Prosecure -->
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 style="margin:0px;">กลุ่มโปรซีเคียว</h4>
                        <hr class="col-xs-12 hr" />
                        <?
                          $sql = "SELECT *
                                  FROM z_promotion
                                  WHERE ( pro_group = 'P' AND pro_status = '1' ) AND
                                        ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                  ORDER BY create_date DESC";
                          if (select_tbz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_ " id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                  <a class="_ClickView col-xs-12">
                                      <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                  </a>
                                </div>
                              <?
                            }
                          }else {
                            ?>ไม่มีข้อมูล<?
                          }
                        ?>


                    </div>
                  </div>
                </div>
                <!-- User -->
                <div class="col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <h4 style="margin:0px;">กลุ่มลูกค้าทั่วไป</h4>
                          <hr class="col-xs-12 hr" />
                          <?
                            $sql = "SELECT *
                                    FROM z_promotion
                                    WHERE ( pro_group = 'U' AND pro_status = '1' ) AND
                                          ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                    ORDER BY create_date DESC";
                            if (select_tbz($sql)>0) {
                              foreach (select_tbz($sql) as $row) {
                                ?>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                    <a class="_ClickView col-xs-12">
                                        <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                    </a>
                                  </div>
                                <?
                              }
                            }else {
                              ?>ไม่มีข้อมูล<?
                            }
                          ?>

                      </div>
                    </div>
                  </div>
                <?
              }else {
                ?>
                <!-- Dealer -->
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 style="margin:0px;">กลุ่มตัวแทนจำหน่าย</h4>
                        <hr class="col-xs-12 hr" />
                        <?
                          $sql = "SELECT *
                                  FROM z_promotion
                                  WHERE ( pro_group = 'D' AND pro_status = '1' ) AND
                                        ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                  ORDER BY create_date DESC";
                          if (select_tbz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>"  data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                  <a class="_ClickView col-xs-12">
                                      <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                  </a>
                                </div>
                              <?
                            }
                          }else {
                            ?>ไม่มีข้อมูล<?
                          }
                        ?>


                    </div>
                  </div>
                </div>
                <!-- User -->
                <div class="col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <h4 style="margin:0px;">กลุ่มลูกค้าทั่วไป</h4>
                          <hr class="col-xs-12 hr" />
                          <?
                            $sql = "SELECT *
                                    FROM z_promotion
                                    WHERE ( pro_group = 'U' AND pro_status = '1' ) AND
                                          ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                                    ORDER BY create_date DESC";
                            if (select_tbz($sql)>0) {
                              foreach (select_tbz($sql) as $row) {
                                ?>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                    <a class="_ClickView col-xs-12">
                                        <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                    </a>
                                  </div>
                                <?
                              }
                            }else {
                              ?>ไม่มีข้อมูล<?
                            }
                          ?>

                      </div>
                    </div>
                  </div>
                <?
              }
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<style media="screen">
  ._Click_{
      cursor: pointer;
      padding:0px;
  }
  ._Click_ a{
    display:block;
    padding:0px;
  }
  ._Click_ a img{
    padding:2px;
  }
  .hr{
    margin: 15px 0 15px 0;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $("._Click_").click(function(event) {
      $("._clickview_").attr("src",$(this).attr("id"));
    });
  });
</script>
<div class="modal fade" id="modal-promotion" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-search"></i> รายละเอียด โปรโมชั่น</h4>
      </div>

      <div class="modal-body" style="padding:0px;">
        <div class="row" style="margin:0px;">
          <div class="col-xs-12" style="padding:0px;">
            <img src="" class="col-xs-12 _clickview_" style="padding:0px;">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
