<div class="row">
  <div class="col-xs-12">
  	<div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active "><a data-toggle="tab" href="#brand">เลือกตามยี่ห้อ</a></li>
    	  <li ><a data-toggle="tab" href="#search" id="click_show">ค้นหาสินค้า</a></li>
      </ul>
      <div class="tab-content">
        <div id="brand" class="tab-pane fade in active" style="padding:5px 0;">
          <div class="row">
            <div class="col-xs-12">
      				<div class='alert alert-warning'>  <strong>ขออภัย!</strong> ข้อมูลบางอย่างอาจไม่ถูกต้อง โปรดสอบถามฝ่ายบริการลูกค้า</div>
              <?
              if (!empty($UrlIdSub)) {
                $sql ="SELECT pb_name FROM price_brand WHERE pb_status = '1' AND  pb_id ='".$UrlIdSub."' GROUP BY pb_name ";
                if (select_numz($sql)>0) {
                  foreach (select_tbz($sql) as $value) {
                    ?><h4 style="padding: 5px 15px;"><a href="<?=SITE_URL_ADMIN;?>price">ยี่ห้อสินค้า</a> > <?=$value[0];?></h4><?

                    $sql_sub = "SELECT DISTINCT pbs.pbs_id,pbs.pbs_name,pb.pb_name
                                FROM price_products pp
                                LEFT OUTER JOIN price_brand pb ON (pp.pb_id = pb.pb_id)
                                LEFT OUTER JOIN price_brand_sub pbs ON (pp.pbs_id = pbs.pbs_id)
                                WHERE (
                                        pp.pb_id = '".$UrlIdSub."'
                                      )
                                ORDER BY pbs.pbs_sort ASC;";
                    foreach (select_tbz($sql_sub) as $rowsub) {
                      # code...submenu

      								$price_st_pro = price_structure(1,$UrlIdSub,$rowsub['pbs_id']);
      								$price_st_ban = price_structure(8,$UrlIdSub,$rowsub['pbs_id']);
      								$price_s_partner = price_structure(2,$UrlIdSub,$rowsub['pbs_id']);

                      ?>
                      <h3 class="col-xs-12" style="background:#f1f1f1;border-radius:5px;color:#000; padding:15px;margin:20px 0px 5px 0px;"> <?=$rowsub['pbs_name'];?></h3>
                        <div class="col-xs-12 table-responsive " style="padding:0px;">
                          <table class="sticky-enabled">
      												<thead>
      													<tr style="background: #e2e2e2;">
      					                  <th class="text-center" style="max-width:120px;">รุ่น <?=$rowsub['pbs_name'];?></th>
      					                  <th class="text-center">รูปสินค้า</th>
      					                  <th class="text-center">รายละเอียด</th>
      					              		<th class="text-center" style="min-width:120px;">ราคาตั้ง<br>(บาท)</th>
      														<? if (base64url_decode($_COOKIE[$CookieType])=="Admin") { ?>
                                      <th class="text-center">โปรซีเคียว<br/><div style="color:#ff1d1d;"><?=number_format(price_structure(1,$UrlIdSub,$rowsub['pbs_id']), 2, '.', '');?>%</div></th>
                                      <th class="text-center">ตัวแทนจำหน่าย<br/><?=number_format(price_structure(2,$UrlIdSub,$rowsub['pbs_id']), 2, '.', '');?>%</th>
                                  <? }else { ?>
                                    <? if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") { ?>
                                      <th class="text-center">โปรซีเคียว<br/><div style="color:#ff1d1d;"><?=number_format(price_structure(1,$UrlIdSub,$rowsub['pbs_id']), 2, '.', '');?>%</div></th>
                                      <!--<th class="text-center" scope="col">ตัวแทนจำหน่าย<br/><?=number_format(price_structure(2,$UrlIdSub,$rowsub['pbs_id']), 2, '.', '');?>%</th>-->
                                    <? }else { ?>
                                      <th class="text-center">ตัวแทนจำหน่าย<br/><?=number_format(price_structure(2,$UrlIdSub,$rowsub['pbs_id']), 2, '.', '');?>%</th>
                                    <? } ?>
                                  <? } ?>
                                  <th class="text-center">สินค้า<br>คงเหลือ</th>
      					                  <th class="text-center">ประกัน<br>(ปี)</th>
      														<th class="text-center">จำหน่ายโดย<br>(บริษัท)</th>
                                  <th class="text-center">ดาวน์โหลด<br>สเปค</th>
                                  <th class="text-center">พร้อมจำหน่าย<br>(<i class="fa fa-check-square-o" aria-hidden="true"></i>)</th>
      					                </tr>
      												</thead>
      												<tbody>
      			                    <?
                                $sql_data =  "SELECT pp.*,
                                                     pb.pb_id,pb.pb_name,
                                                     pbs.pbs_id,pbs.pbs_name,
                                                     ppa.admin,ppa.prosecure,ppa.dealer,ppa.user
                                              FROM price_products pp
                                              INNER JOIN price_brand pb ON (pp.pb_id = pb.pb_id)
                                              INNER JOIN price_brand_sub pbs ON (pp.pbs_id = pbs.pbs_id)
                                              INNER JOIN price_product_apdu ppa ON (pp.pro_id = ppa.pro_id)
                                              WHERE (
                                                      pp.pbs_id = '".$rowsub['pbs_id']."' AND
                                                      pp.pb_id = '".$UrlIdSub."'
                                                    )
                                              ORDER BY pp.pd_sort ASC;";

      			                    foreach (select_tbz($sql_data) as $rowdata) {
      			                      # code...ข้อมูล
      			                      ?>
      														<tr>
      															<th class="text-center" valign="middle"  style="max-width:120px;white-space: normal;word-wrap: break-word;"><div><?=$rowdata['model'];?></div></th>
      															<td class="text-center" valign="middle" ><? $url_pic ="http://www.zynekcctv.com/product/pid_".$rowdata['pro_id']."/thumb/"; CHECK_THUMB($url_pic); ?></td>
      															<td class="text-left">
                                      <div class="show_detail_box" id="box_<?=$rowdata['pro_id'];?>" style="min-height: 60px;max-height: 60px;overflow: hidden;display:block;">
                                        <?=$rowdata['description'];?>
                                      </div>
                                      <div class="show_box text-center">
                                        <div class="show_detail_inbox" id="show_<?=$rowdata['pro_id'];?>">
                                          <a class="text-center click_show_product" id="<?=$rowdata['pro_id'];?>">แสดงมากขึ้น <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                        </div>
                                      </div>
                                      <div style="clear:both;"></div>
                                    </td>
      																<?
      																if(base64url_decode($_COOKIE[$CookieType])=="Admin") {
      																	if($rowdata['admin']=='2') {
      																		$rowdata['price_list'] = 0; $showadmin = "-สอบถามฝ่ายProduct-";
      																	}else if($rowdata['admin']=='3') {
      																		$rowdata['price_list'] = 0; $showadmin = "-กำลังดำเนินการ-";
      																	}else{
      																		$rowdata['price_list'] = $rowdata['price_list']; $showadmin = "";
      																	}
      																}else {
                                        if($rowdata['dealer']=='2') {
      																		$rowdata['price_list'] = 0; $showadmin = "-สอบถามฝ่ายProduct-";
      																	}else if($rowdata['dealer']=='3') {
      																		$rowdata['price_list'] = 0; $showadmin = "-กำลังดำเนินการ-";
      																	}else{
      																		$rowdata['price_list'] = $rowdata['price_list']; $showadmin = "";
      																	}
                                      }  ?>
      															<td class="text-center"> <?=$showadmin==""?number_format($rowdata['price_list']):$showadmin;?></td>
      															<? if (base64url_decode($_COOKIE[$CookieType])=="Admin") { ?>
                                          <td class="text-center">
                                            <div style="color:#ff1d1d;">
                																<?
                    																if($brand==31){
                    																	echo "0";
                    																}else{
                    																	$price_show_pro = CAL_PRICE($rowdata['price_list'],price_structure(1,$UrlIdSub,$rowsub['pbs_id'])); echo number_format($price_show_pro);
                                                    }
                																?>
      											                </div>
                                          </td>
            															<td class="text-center">
            																<?
            																	$price_show_pa = CAL_PRICE($rowdata['price_list'],price_structure(2,$UrlIdSub,$rowsub['pbs_id'])); echo number_format($price_show_pa);
            																?>
            															</td>
      															<? }else { ?>
                                      <? if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") { ?>
                                        <td class="text-center">
                                          <div style="color:#ff1d1d;">
                                              <?
                                                  if($brand==31){
                                                    echo "0";
                                                  }else{
                                                    $price_show_pro = CAL_PRICE($rowdata['price_list'],price_structure(1,$UrlIdSub,$rowsub['pbs_id'])); echo number_format($price_show_pro);
                                                  }
                                              ?>
                                          </div>
                                        </td>
                                        <!--<td class="text-center">
                                          <?
                                            $price_show_pa = CAL_PRICE($rowdata['price_list'],price_structure(2,$UrlIdSub,$rowsub['pbs_id'])); echo number_format($price_show_pa);
                                          ?>
                                        </td>-->
                                      <? }else{ ?>
                                        <td class="text-center">
                                          <div style="color:#ff1d1d;">
                                          <?
                                            $price_show_pa = CAL_PRICE($rowdata['price_list'],price_structure(2,$UrlIdSub,$rowsub['pbs_id'])); echo number_format($price_show_pa);
                                          ?>
                                          </div>
                                        </td>
                                      <? } ?>
                                    <? } ?>
                                    <td class="text-center"><?=ViewStock($rowdata['pro_id'])==""?"0":number_format(ViewStock($rowdata['pro_id']));?></td>
      															<td class="text-center"><?=$rowdata['warranty'];?></td>
      																<?  $sellby=$rowdata['sellby'];
      																		if($sellby=='1') {
      																			$sellbypic = "<img src='http://www.zynekcctv.com/logooffice/zynek.png' >";
      																		}else if($sellby=='2'){
      																			$sellbypic = "<img src='http://www.zynekcctv.com/logooffice/prosecure.png'>";
      																		}else{
      																			$sellbypic = "กรุณาสอบถาม";
      																		}
      																?>
                                    <td class="text-center"><?=$sellbypic;?></td>
      															<td class="text-center">
                                      <a href="http://www.zynekcctv.com/search/dl.php?id=<?=$rowdata['pro_id'];?>" target="_blank" class='btn btn-danger btn-sm'>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td class="text-center"><?=$rowdata['check_product']=='1'?"<i class='fa fa-check-square-o' aria-hidden='true'></i>":"-";?></td>
      													  </tr>
      			                      <?
      			                    }
      			                    ?>
      												</tbody>
                          </table>
                        </div>
                    <?
                    }
                  }
                }else {
                  ?>ข้อมูลไม่ถูกต้อง<?
                }
              }else {
                ?>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-4">
                    <h3>โครงสร้างราคาสินค้า <a href="<?=SITE_URL_ADMIN;?>structure-price" class="label label-default" style="font-size:11px;">ดูรายการทั้งหมด</a></h3>

                      <ul class="timeline timeline-inverse">
                        <?
                          if (  base64url_decode($_COOKIE[$CookieType])=="Admin"  ) {
                            $WHERE = "  ";
                          }else {
                            if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") {
                              $WHERE = " AND  type_group = '1' ";
                            }else {
                              $WHERE = "  AND  type_group = '2' ";
                            }
                          }
                          $sql = "SELECT *
                                  FROM z_structure_price
                                  WHERE ( file_status = '1' $WHERE )
                                  ORDER BY create_date DESC
                                  LIMIT 4;";
                          if (select_numz($sql)>0) { $new="";$old=""; $i=1;
                            foreach (select_tbz($sql) as $row) {
                              $new = substr($row['create_date'],0,10);
            									if($old==''){
            								 		?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
            										$old = $new;
            										$i=1;
            									}else{
            										if($old==$new){

            										}else{
            											?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
            											$i=1;
            										}
            										$old = $new;
            									}
                              ?>
                              <li><i class="fa fa-newspaper-o bg-blue"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fa fa-clock-o"></i> <?=substr($row['create_date'],11);?></span>
                                  <h3 class="timeline-header"><?=$row['price_name'];?></h3>
                                  <div class="timeline-body">
                                    <?=$row['price_detail'];?>
                                  </div>
                                  <div class="timeline-footer">
                                    <a href="<?=SITE_URL;?>jquery/file.php?file=<?=$row['link_file'];?>" target="_blank" class=" btn <?=$row['type_group']=="1"?"btn-success":"btn-info";?> btn-sm" id="<?=$row['file_id'];?>" >
                                        <i class="fa fa-download" aria-hidden="true"></i> ดาวโหลด
                                        <?
                                          if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
                                            echo $row['type_group']=="1"?"(โปรซีเคียว)":"(ตัวแทน)";
                                          }
                                        ?>
                                    </a>
                                  </div>
                                </div>
                              </li>
                              <?
                            }
                          }else {
                            ?>
                            <li class="time-label"> <span class="bg-red"> <?=datetime_th(date("Y-m-d"));?> </span> </li>
                            <li><i class="fa fa-newspaper-o bg-blue"></i>
                              <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?=substr(date("Y-m-d H:i:s"),11);?></span>
                                <h3 class="timeline-header">ไม่มีข้อมูล</h3>
                                <div class="timeline-body">
                                  ยังไม่มีข้อมูล โครงสร้างราคาสินค้าใหม่
                                </div>
                              </div>
                            </li>
                            <?
                          }
                        ?>
                      </ul>

                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-8">
                    <h3>เลือกตามยี่ห้อ</h3>
                    <div class="nav nav-tabs nav_tab_link" style=" border-bottom: none !important;">
                      <?
                      $sql ="SELECT pb_id,pb_name FROM price_brand WHERE pb_status='1' ORDER BY pb_name ASC"; $i=1;
                      foreach (select_tbz($sql) as $row) {
                        ?>
                        <li class="col-xs-6 col-sm-3 col-md-2 col-lg-2 menu_link">
                          <a class="" href="<?=SITE_URL_ADMIN;?>price/<?=$row[pb_id]?>"><?=$row[pb_name]?>
                            <div style="position: absolute;  bottom: 0;  right: 5px;  font-size: 20px;  color: #8bdaa3;">
                              <div style=""><?=($i++);?></div>
                            </div>
                          </a>
                        </li>
                        <?
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <?
              }
              ?>
            </div>
          </div>
        </div>
    		<div id="search" class="tab-pane fade" style="padding:5px 0;">
  				<div class='alert alert-warning'>  <strong>ขออภัย!</strong> ข้อมูลบางอย่างอาจไม่ถูกต้อง โปรดสอบถามฝ่ายบริการลูกค้า</div>
  				<h3>ค้นหาสินค้า</h3>
          <!-- Search -->
    			<div class="row">
    				<div class="col-xs-12" style="padding:5px 15px;">
    					<div>
  							<!--<form id="form-user_v1" name="form-user_v1">-->
  						    <div class="typeahead__container">
  						        <div class="typeahead__field">

  						            <span class="typeahead__query">
  						                <input class="js-typeahead-user_v1 form-control" id="focus_search" name="user_v1[query]" type="search" placeholder="ค้นหาสินค้าจาก ชื่อรุ่น  สามารถพิมพ์ย่อๆได้ เช่น '404' " autocomplete="off">
  						            </span>
  						            <span class="typeahead__button">
  						                <button type="submit">
  						                    <i class="typeahead__search-icon"></i>
  						                </button>
  						            </span>

  						        </div>
  						    </div>
  						  <!--</form>-->
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
                  /*
                    var color = "#777";
                    if (item.status === "owner") {
                        color = "#ff1493";
                    }

                   return '<span class="row">' +
                              '<span class="avatar">' +
                                  '<img src="{{avatar}}">' +
                              "</span>" +
                              '<span class="username">{{username}} <small style="color: ' + color + ';">({{status}})</small></span>' +
                              '<span class="id">({{id}})</span>' +
                          "</span>"*/
                },
                emptyTemplate: "No result for {{query}}",
                source: {
                    project: {
                        display: "model",
                        href: function (item) {
                           // return '?page=<?=$_GET[page];?>&productid=' + item.productid + ''
                        },
                        ajax: [{
                            type: "GET",
                            url: "../../../jquery/json_product_and_price.php",
                            data: {
                                que: "{{query}}"
                            }
                        }, "data.model"],
                        template: '<span class="row" style="margin:0px;">' +
                                      '<span class="project-logo col-xs-3 col-sm-2 col-md-2 col-lg-1" style="padding:0px;">' +
                                          '<img src="{{image}}" class=" col-xs-12" style="padding:0px;">' +
                                      '</span>' +
                                      '<span class="project-information col-xs-9 col-sm-10 col-md-10 col-lg-11">' +
                                          '<span class="project col-xs-12" style="padding:0px;"><label>รุ่น :</label> {{model}}</span>' +
                                          '<span class="project col-xs-12" style="padding:0px;"><label>ยี่ห้อ :</label> {{brand}}</span>' +
                                          '<span class="project col-xs-12" style="padding:0px;"><label>หมวดสินค้า :</label> {{pbs_name}}</span>' +
                                          '<span class="project col-xs-12" style="padding:0px;"><label>ราคาตั้ง :</label> {{price}}</span>' +
                                      '</span>' +
                                  '</span>'
                    }
                },
                callback: {
                    onClick: function (node, a, item, event) {

                        $("#myModal").modal();
                        $(".image-product").attr("src",item.image);
                        $(".model-product").html(item.model);
                        $(".brand-product").html(item.brand);
                        $(".cate-product").html(item.pbs_name);
                        $(".price-product").html(item.price);

                        $(".price-price_pro").html(item.price_pro);
                        $(".price-price_par").html(item.price_par);
                        $(".price-qty").html(item.qty);
                        $(".price-stock").html(item.stock);
                        $(".price-warranty").html(item.warranty);
                        $(".price-sell_by").html(item.sell_by);

                        $(".price-stc_pro").html(item.stc_pro);
                        $(".price-stc_par").html(item.stc_par);


                        // You can do a simple window.location of the item.href
                        //alert(JSON.stringify(item));

                    },
                    onSendRequest: function (node, query) {
                        console.log('request is sent')
                    },
                    onReceiveRequest: function (node, query) {
                        console.log('request is received')
                    }
                },
                debug: true
            });

          </script>
          <style>
            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .row {
              display: table-row;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .row  > * {
              display: table-cell;
              vertical-align: middle;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .username {
              padding: 0 10px;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .id {
              font-size: 12px;
              color: #777;
              font-variant: small-caps;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .avatar img {
              height: 26px;
              width: 26px;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .project-logo {
              display: inline-block;
              height: 100px;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .project-logo img {
              height: 100%;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .project-information {
              display: inline-block;
              vertical-align: top;
              padding: 20px 0 0 20px;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .project-information > span {
              display: block;
              margin-bottom: 5px;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result > ul > li > a small {
              padding-left: 0px;
              color: #999;
            }

            .project-jquerytypeahead.page-demo #form-user_v1 .typeahead__result .project-information li {
              font-size: 12px;
            }
          </style>

          <!-- End Search -->
    		</div>
      </div>

    </div>
  </div>
</div>



<style media="screen">

  /* tabe bar */
  .nav_tab_link{
    border-bottom: 2px solid #1daa4c;
  }
  .nav_tab_link li{
    padding: 0px;
    border: 0px;
  }
  .nav_tab_link li a{
    margin: 0px;
    border-radius: 0px;
    text-align: center;
    color: #000;
  }
  .nav_tab_link li.active a{
    background: #1daa4c !important;
    color:#fff !important;
  }
  .nav_tab_link li a:hover,
  .nav_tab_link li.active a:hover{
    background: #1daa4c !important;
    color:#fff !important;
  }

  @media (max-width:767px) {
    .nav_tab_link > .menu_link{
      margin: 0px !important;
    }
    .nav_tab_link > .menu_link > a{
      background: #222d32 !important;
        color:#fff !important;
      height: 120px !important;
      margin: 0px !important;
      display: block !important;
      margin: 1px !important;
      font-size: 18px ;
    }
  }
	@media (min-width:767px) {
    .nav_tab_link > .menu_link{
      margin: 0px !important;
    }
    .nav_tab_link > .menu_link > a{
      background: #222d32 !important;
      color:#fff !important;
      height: 120px !important;
      margin: 0px !important;
      display: block !important;
      margin: 1px !important;
      font-size: 18px ;
    }
  }
  .nav_tab_link > .menu_link > a:hover{
    background: #63e48e !important;
    color:#00671f !important;
  }
</style>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รุ่นสินค้า : <label class="model-product"></label></h4>
        </div>
        <div class="modal-body">
          <span class="row" style="margin:0px;">
              <span class="project-logo col-xs-12 col-sm-4 col-md-4 col-lg-6" style="padding:0px;">
                  <img src="" class="image-product col-xs-12" style="padding:0px;">
              </span>
              <span class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                  <span class=" col-xs-12" style="padding:0px;"><label>รุ่น :</label> <bb class="model-product"></bb></span>
                  <span class=" col-xs-12" style="padding:0px;"><label>ยี่ห้อ :</label> <bb class="brand-product"></bb></span>
                  <span class=" col-xs-12" style="padding:0px;"><label>หมวดสินค้า :</label> <bb class="cate-product"></bb></span>
              </span>
							<span class="col-xs-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="text-center" scope="col">ราคาตั้ง<br>(บาท)</th>
                        <? if (base64url_decode($_COOKIE[$CookieType])=="Admin") { ?>
												<th class="text-center" scope="col">โปรซีเคียว<br/><div style="color:#ff1d1d;"><bb class="price-stc_pro"></bb>%</div></th>
												<th class="text-center" scope="col">ตัวแทนจำหน่าย<br/><bb class="price-stc_par"></bb>%</th>
                        <? }elseif (base64url_decode($_COOKIE[$CookieType])=="Customer") { ?>
                            <? if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") { ?>
                              <th class="text-center" scope="col">โปรซีเคียว<br/><div style="color:#ff1d1d;"><bb class="price-stc_pro"></bb>%</div></th>
                              <!--<th class="text-center" scope="col">ตัวแทนจำหน่าย<br/><bb class="price-stc_par"></bb>%</th>-->
                            <? }else{ ?>
                              <th class="text-center" scope="col">ตัวแทนจำหน่าย<br/><bb class="price-stc_par"></bb>%</th>
                            <? } ?>
                        <? } ?>
                        <th class="text-center" scope="col">สินค้า<br>คงเหลือ</th>
												<th class="text-center" scope="col">ประกัน<br>(ปี)</th>
												<th class="text-center" scope="col">จำหน่ายโดย</th>
											</tr>
										</thead>
										<tbody>
												<tr>
													<td class="text-center"><bb class="price-product"></bb></td>
                          <? if (base64url_decode($_COOKIE[$CookieType])=="Admin") { ?>
  													<td class="text-center"><bb class="price-price_pro"></bb></td>
  													<td class="text-center"><bb class="price-price_par"></bb></td>
                          <? }elseif (base64url_decode($_COOKIE[$CookieType])=="Customer") { ?>
                              <? if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") { ?>
                                <td class="text-center"><bb class="price-price_pro"></bb></td>
      													<!--<td class="text-center"><bb class="price-price_par"></bb></td>-->
                              <? }else{ ?>
      													<td class="text-center"><bb class="price-price_par"></bb></td>
                              <? } ?>
                          <? } ?>
                          <td class="text-center"><bb class="price-stock"></bb></td>
													<td class="text-center"><bb class="price-warranty"></bb></td>
													<td class="text-center"><bb class="price-sell_by"></bb></td>
												</tr>
										</tbody>
									</table>
								</div>
							</span>
          </span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close_search">ปิด</button>
        </div>
      </div>

    </div>
</div>





<!--- Table ---->
<link rel="stylesheet" type="text/css" href="<?=SITE_URL;?>plugins/StickyTableHeaders/css/component.css" />
<!--<script src="<?=SITE_URL;?>plugins/StickyTableHeaders/js/jquery.min.v1.11.1.js"></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
<script src="<?=SITE_URL;?>plugins/StickyTableHeaders/js/jquery.stickyheader.js"></script>

<!-- click table --->
<script>
  $(document).ready(function() {
    $(".click_show_product").click(function(event) {
      $("#show_"+$(this).attr("id")).attr('style', 'display:none;');
      $("#box_"+$(this).attr("id")).attr('style', 'height:100%;');

    });
  });
</script>
<style>
  .show_box{
    /*position: absolute;*/
  }
  .show_detail_box{
    font-size: 13px;
  }
  .show_detail_inbox{
    position: relative;
    top: 0px;
    width: 100%;
  }
  .show_detail_inbox a{
    cursor: pointer;
    width: 100%;
    /*background-image: linear-gradient(transparent, #fbfbfb);
    max-height: 42px;
    min-height: 46px;*/
    text-align: center;
    z-index: 9999;
    color: #888888;
    /*padding-top: 27px;*/
    display: inline-block;
    line-height: 0.8;
  }
</style>
