<div class="row">
	<div class="col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active "><a data-toggle="tab" href="#download">ดาวโหลด</a></li>
      </ul>
      <div class="tab-content">
        <div id="download" class="tab-pane fade in active" style="padding:5px 0;">





  				<div class="row">
  						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
  						 <h3 class="text-center">เลือกตามยี่ห้อ</h3>
  					 </div>
  					 <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
  						 <h3>
  						 <?
  							 $sql ="SELECT DISTINCT  dl_status.ID_brand,  name_brand.name_brand
  								 			FROM  dl_status , name_brand
  								 			WHERE  dl_status.ID_brand = name_brand.ID_brand
  											ORDER BY  name_brand.name_brand ASC";
  							$i=1;
  							if (select_numz($sql)>0) {
  								?>
  								<select class="form-control" id="brand-select-download">
  									<option value>เลือกยี่ห้อสินค้า</option>
  									<?
  										foreach (select_tbz($sql) as $row) {
  											$vale = sprintf("%02s", $i++);
  					 					 ?>
  										 <option value="<?=$row[ID_brand];?>"><?=($vale);?> - <?=strtoupper($row[name_brand]);?></option>
  					 					 <?
  					 				  }
  									?>
  								</select>
  							 <?
  						  }
  						  ?>
  							</h3>
  						</div>
  				</div>
  				<div class="row">
  					<script type="text/javascript">
  						$(document).ready(function() {
  							$("#brand-select-download").change(function(event) {
  								$("#show_data_download").html("กรุณารอสักครู่...");
  									$.post("../../../jquery/download-file.php",
  									{
  										value : $(this).val(),
  										post : "download-software"
  									},
  									function (data){
  										$("#show_data_download").html(data);
  									});
  							});
  						});
  					</script>
  					<div class="col-xs-12" id="show_data_download">

  					</div>
  				</div>






        </div>
      </div>
    </div>
  </div>
</div>
