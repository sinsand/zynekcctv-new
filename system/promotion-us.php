<div class="row" style="background:#fff;margin:0px 0;">
  <div class="container" style="padding:30px 0;">
    <div class="col-xs-12" style="padding:0px">

      <h3 class="text-center" style="margin: 50px 0 20px 0;">Promotion</h3>
      <div class="col-xs-12">
        <?
          $sql = "SELECT *
                  FROM z_promotion
                  WHERE (
                          pro_status = '1' AND pro_group = 'U' AND
                          ( str_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."' )
                        )
                  ORDER BY promotion_id DESC";
          if (select_numz($sql)>0) {
            foreach (select_tbz($sql) as $row) {
              ?>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3" style="padding:15px;">
                <a class="link LinkPromotion col-sm-12" style="padding:0px;cursor:pointer;"  id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>"  data-toggle="modal" data-target="#modal-promotion" >
                  <img src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="lazy col-xs-12"  style="padding:0px;"  />
                </a>
              </div>
              <?
            }
          }else {
            ?>
            <a href="#" class="link hidden-xs col-sm-12 col-md-12 col-lg-12" style="padding:0px">
              <img src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>images/promotion_coming_w.jpg" class="lazy col-xs-12"  style="padding:0px"  />
            </a>
            <a href="#" class="link col-xs-12 hidden-sm hidden-md hidden-lg" style="padding:0px">
              <img src="<?=SITE_URL;?>images/loading.gif" data-src="<?=SITE_URL;?>images/promotion_coming_s.jpg" class="lazy col-xs-12"  style="padding:0px"  />
            </a>
            <?
          }
        ?>
      </div>

    </div>
  </div>
</div>



<!-- popup promotion -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".LinkPromotion").click(function(event) {
      $(".ViewLinkPromotion").attr("src",$(this).attr("id"));
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
            <img src="" class="col-xs-12 ViewLinkPromotion" style="padding:0px;">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- popup promotion -->
