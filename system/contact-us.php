<div class="row" style="background:#fff;margin:0px 0;">
  <div class="container" style="padding:30px 0;">
    <div class="col-xs-12" style="padding:0px">

      <h3 class="text-center" style="margin: 50px 0 20px 0;">Contact Us</h3>


      <div class="col-xs-12 col-sm-9 col-md-7">
        <p style="margin-bottom: 20px;"><b>บริษัท ซายเนค เทคโนโลยี่ จำกัด</b><br>238/14 ซอยรัชดาภิเษก 18 ถนนรัชดาภิเษก แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10310</p>
        <p><b>Zynek Technologies Co.,Ltd.</b><br>238/14 Soi Ratchadapisek 18,Ratchadapisek Road, Huaykwang, Bangkok 10310</p>
        <hr style="margin:25px 0;">
        <p style="margin-bottom: 20px;">Mobile : 086-330-7062 (ต่างจังหวัด)</p>
        <p style="margin-bottom: 20px;"><b>E-mail สำหรับลูกค้าในกรุงเทพ :</b><br>cs.bkk1@prosecure.co.th<br>cs.bkk2@prosecure.co.th</p>
        <p style="margin-bottom: 20px;"><b>E-mail สำหรับลูกค้าต่างจังหวัด :</b><br>ภาคเหนือ: cs.n@prosecure.co.th<br>ภาคกลาง: cs.c@prosecure.co.th<br>ภาคอีสาน: cs.e@prosecure.co.th<br>ภาคใต้: cs.s@prosecure.co.th</p>
        </p>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-5">
        <img src="<?=SITE_URL;?>images/map_zynek.jpg" class="col-xs-12" style="width:100%;height:auto;" border="0">
      </div>

    </div>
  </div>
</div>




<div class="row animated fadeIn go slower " style="margin:0px;background:#f7f7f7;">
  <div class="container" style="margin:0px auto;">
    <div class="col-sm-12" style="padding:0px 0px 50px 0px;">

        <h3 class="text-center" style="margin: 50px 0 20px 0;">Map</h3>
        <div class="row" style="margin:0px;">
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLFEr_uF6vUmJtjZtHpuQzhPokwEeUf2I&callback=initWithMapStart"  async defer></script>
          <div class="row" style="margin:10px 0;">
              <div class="col-xs-12">
              	<div class="row" style="padding:0px -10px;">
                  	<div class="col-xs-12"><h3 class="h3"></h3></div>
                </div>

          				<!-- map -->
          				<style>
            				#map-canvas {
            					display: block;
            					width: 100%;
            					height: 300px;
            					background-color: #ccc;
            				}
            				.h3{
            				    font-weight: 600;
            				    font-size: 26px;
            				    color: #000;
            				}
            				.space_400{
            					white-space: nowrap;
            				    text-overflow: ellipsis;
            				    overflow: hidden;
            				    max-width: 400px;
            				}
            				.font-top{font-weight:900; font-size:14px;}
            				.font-w{	font-weight:600;}
            				.item-site{ border:2px solid #fff; margin:1px;padding:0px; }
            				.item-site:hover{ border:2px solid #ddd; }
          				</style>


          				<script>
            				initWithMapStart();
            				function initWithMapStart() {



          			<?
              			/*$sql_map = "SELECT position_x,position_y,company,website,membershop_id 	FROM ps_member_shop 	WHERE position_x > '0' AND position_y > '0' AND  membershop_id = '".$_GET[value]."'  ";
              			if(select_num($sql_map)>0){
              				foreach(select_tb($sql_map) as $row){
              					$pox = $row['position_x'];
              					$poy = $row['position_y'];*/
                        $pox = $row['position_x'] = 13.7846106;
              					$poy = $row['position_y'] = 100.5762962;
              					?>
              					var myIcon = new google.maps.MarkerImage("<?=SITE_URL;?>images/pin.png", null, null, null, new google.maps.Size(59,51));
              					//var myIcon_zynek = new google.maps.MarkerImage("http://www.prosecureshop.com/img/google_map_pin/zynek_pin.png", null, null, null, new google.maps.Size(38,51));
              					var latlng = new google.maps.LatLng(13.7846106,100.5762962);
              					var mapOptions = {zoom: 16,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
              					var maps = new google.maps.Map(  document.getElementById('map-canvas'),  mapOptions  );
              					var marker = new google.maps.Marker({position: latlng,map: maps,animation: google.maps.Animation.DROP,
              												title: "Welcome to Prosecure Shop",icon: myIcon});
              					var info = new google.maps.InfoWindow({
              											content: '<img width="85" height="15" src="<?=SITE_URL;?>images/logo_zynek.png"/><br/><a href="https://goo.gl/maps/BLzzH1Nvfwr" target="_blank">เปิดใน Google</a>'
              										});
              					google.maps.event.addListener(marker, 'click', function(){
              						info.open(maps, marker);

              					});
          			<?
          				//}
          			//} ?>

          				}
          				</script>
              </div>
          </div>





          					<!--<div class="col-sm-6 col-xs-12" style="" id="map-canvas"></div>-->

          <div class="col-xs-12" style="padding:0px;" id="map-canvas"></div>
        </div>
    </div>
  </div>
</div>
