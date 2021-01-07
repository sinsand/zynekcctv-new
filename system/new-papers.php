<div class="row" style="margin:0px;">
  <div class="container" style="padding:0px;">
    <div class="col-lg-12 col-md-12" style="padding:20px 15px;">

      <h3 class="text-center" style="margin: 50px 0 20px 0;">News</h3>

      <?
      if (empty($UrlId)) {
        ?>
        <div class="col-xs-12 col-sm-12 col-md-3"style="margin-top:20px;padding:0px;">

          <div class="panel-group" id="accordion">
            <?
            $sql = "SELECT DATE_FORMAT(gal_date,'%Y')
                    FROM news_gallery_all
                    GROUP BY DATE_FORMAT(gal_date,'%Y')
                    ORDER BY gal_date DESC ";
            if(select_numz($sql)>0){   $i=0;
              foreach(select_tbz($sql) as $row){

                  $sqll = "SELECT *
                       FROM news_gallery_all
                       WHERE (gal_status='1' AND DATE_FORMAT(gal_date,'%Y') = '".$row[0]."')
                       ORDER BY gal_date DESC;";
                  $sum = select_numz($sqll);
                  if($sum>0){

                    ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$row[0];?>">
                          กิจกรรมปี <b><?=$row[0];?></b> (<?=$sum;?>)
                        </h3>
                      </div>
                      <div id="collapse_<?=$row[0];?>" class="panel-collapse collapse <?=$i=='0'?"in":"";?>">
                        <div class="panel-body">
                            <ul class="ul_link">
                            <?
                              $sql_inQ = "SELECT DATE_FORMAT(gal_date,'%m') as month
                                          FROM news_gallery_all
                                          WHERE DATE_FORMAT(gal_date,'%Y') = '".$row[0]."'
                                          GROUP BY DATE_FORMAT(gal_date,'%m')
                                          ORDER BY DATE_FORMAT(gal_date,'%m') DESC ";
                              if (select_numz($sql_inQ)>0) { $a=1;
                                foreach(select_tbz($sql_inQ) as $rowq){
                                  ?><li><a href="#" class="_click" id="_<?=$rowq['month']."-".$row[0];?>">เดือน <?=date_thai_ch_normal($rowq['month']-0);?> (<?
                                  $sqlQ = "SELECT *
                                           FROM news_gallery_all
                                           WHERE (gal_status='1' AND DATE_FORMAT(gal_date,'%Y') = '".$row[0]."' AND DATE_FORMAT(gal_date,'%m') = '".$rowq[0]."')
                                           ORDER BY gal_date DESC;";
                                  echo select_numz($sqlQ);
                                  ?>)</a></li><? $a++;
                                }
                              }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?
                } $i++;
                }
              }

            ?>
          </div>
          <style>
            .panel-title{
              cursor: pointer;
            }
            ul.ul_link{
              padding-left: 0px;
            }
            ul.ul_link li{
              list-style: none;
              padding: 0px;
            }
            ul.ul_link li a{
              display: block;
              padding: 7px 10px;
              margin: 4px 0 0 0;
              text-decoration: none;
              border-bottom: 1px solid #e1e1e1;
              border-radius: 5px;
              color: #000;
            }
            ul.ul_link li a:hover{
              background: #e1e1e1;
              border-radius: 5px;
            }
          </style>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9" style="margin-top:20px;padding:0px;">
          <div class="col-xs-12">
                <?
                  $sql = "SELECT DATE_FORMAT(gal_date,'%Y-%m'),DATE_FORMAT(gal_date,'%m'),DATE_FORMAT(gal_date,'%Y')
                          FROM news_gallery_all
                          GROUP BY DATE_FORMAT(gal_date,'%Y-%m')
                          ORDER BY gal_date DESC ";
                  if(select_numz($sql)>0){ $b=0;
                    foreach(select_tbz($sql) as $row){

                        $sqll = "SELECT *
                             FROM news_gallery_all
                             WHERE (gal_status='1' AND DATE_FORMAT(gal_date,'%Y-%m') = '".$row[0]."')
                             ORDER BY gal_date DESC;";
                        $sum = select_numz($sqll);
                        if($sum>0){  $i=0; $value ="";

                          ?>
                          <div class="panel panel-default tab_show" id="show_<?=$row[1]."-".$row[2];?>" style="padding:10px 15px;<?=$b==0?"display:block;":"display:none;";?>">
                            <div class="panel-body">
                              <div class="col-xs-12">
                                <h4>ประจำเดือน <?=date_thai_ch_normal($row[1]-0);?> <b><?=$row[2];?></b> (<?=$sum;?>)</h4>
                              </div>
                              <div class="col-xs-12">
                                <?
                                foreach(select_tbz($sqll) as $rowq){
                                  ?>

                                    <!--- Box Review -->
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 "  style="padding:0px;">
                                      <div class="col-xs-12"  style="padding:5px;">
                                        <a href="<?=SITE_URL;?><?=$UrlPage;?>/<?=$rowq['gal_id'];?>" class="col-xs-12 mouse_on2"> <!--  <?=$i=='0'?"mouse_on":"mouse_on2"?> -->
                                          <div class="col-xs-12 photo_img" style="border-radius: 5px;  background-position: center;border-radius: 5px;background-size: cover;width: 100%;background-color: black;height: auto;background-image: url('http://www.zynekcctv.com/web_admin/photogallery/gal_id_<?=$rowq['gal_id'];?>/thumb/thumb.jpg');">
                                            <img src="<?=SITE_URL;?>images/loading.gif" style="opacity:0;" data-src="http://www.zynekcctv.com/web_admin/photogallery/gal_id_<?=$rowq['gal_id'];?>/thumb/thumb.jpg" class="lazy photo_in" />
                                            <div class="text-center hover_onmouse"><?=delete_char($rowq['gal_name']);?></div>
                                          </div>
                                        </a>
                                      </div>
                                    </div>
                                    <!--- Box Review -->


                                    <?
                                  $i++;
                                }
                                ?>
                              </div>
                            </div>
                          </div>
                          <?
                           $b++;
                        }
                      //echo $value;
                    }
                  }
                ?>
          </div>
        </div>
        <script>
          $(document).ready(function() {
            $("._click").click(function(e) {
              $(".tab_show").attr('style', 'display:none;');
              $("#show" + $(this).attr("id")).attr('style', 'display:block;');
            });
          });
        </script>
        <?
      }else if(!empty($UrlId)){
        ?>
        <div class="col-xs-12" style="padding:0px;">
          <?
          $sql = "UPDATE news_gallery_all  SET gal_amount = gal_amount+1  WHERE gal_id='".$UrlId."'  ";
          update_tbz($sql);
          $sql = "SELECT * FROM news_gallery_all WHERE gal_id='".$UrlId."' and gal_status='1'; ";
          if(select_numz($sql)>0){
            foreach(select_tbz($sql) as $ri){
              ?><div class="col-xs-12" style="margin:20px 0;padding:0px;">
                    <div class="col-xs-12" style="margin:0 0 20px 0;padding:30px 0 0 0;min-height:350px;max-height:350px;
                                    background:url('http://www.zynekcctv.com/web_admin/photogallery/gal_id_<?=$UrlId;?>/thumb/thumb.jpg') center center no-repeat; background-size: 100% auto;">
                      <h2 Class="font_xs_sm_header" style=" font-weight: 900;position: absolute;line-height: normal;bottom: 0;width: 100%;background: rgba(0,0,0,0.8);margin: 0px;padding: 10px;color: #fff;"><?=delete_char(replace_char($ri['gal_name']));?></h2>
                    </div>
                    <div class="col-xs-12">
                      <p class="font_xs_sm" style="margin:0px;font-size:20px;line-height:1;"><?=$ri['gal_description'];?></p>
                    </div>

                    <div class="col-xs-8 col-sm-8" style="padding:0px;">
                        <div class="col-xs-6 col-sm-4">
                          <i class="fa fa-clock fa-1x" aria-hidden="true" style="color:#a2a2a2;min-width:10px;"></i> <b><?=$ri['gal_date'];?></b>
                        </div>
                        <div class="col-xs-6  col-sm-4">
                          <i class="fa fa-eye fa-1x" aria-hidden="true" style="color:#a2a2a2;min-width:10px;"></i> เปิดอ่านแล้ว : <b><?=$ri['gal_amount'];?></b>
                        </div>
                    </div>
                </div><?
            }
          }
         ?>
        </div>
        <div class="demo-gallery" id="demo-test-gallery" style="padding:15px;">
          <?
          $sql = "SELECT *
                  FROM news_gallery_all na
                  INNER JOIN news_gallery_pic np ON na.gal_id = np.gal_id
                  WHERE np.gal_id='".$UrlId."' AND gal_type = '3'
                  ORDER BY np.pic_sort ASC ";
          if(select_numz($sql)>0){ $i=0;
            foreach(select_tbz($sql) as $row){
              ?>
              <a href='http://www.zynekcctv.com/web_admin/<?=$row['pic_urls'];?>' style="padding:0px;display: block;"
                class="col-sm-4 col-xs-6  demo-gallery__img--main "
                <? $sum = getimagesize("http://www.zynekcctv.com/web_admin/".$row['pic_urls']); ?>
                  data-size="<?=$sum[0]."x".$sum[1];?>"   data-med="http://www.zynekcctv.com/web_admin/<?=$row['pic_urls'];?>"
                  data-med-size="<?=$sum[0]."x".$sum[1];?>" data-author="INNEKT">
                <div class="row" style="margin:2px;">
                  <div class="col-xs-12 photo_img" style="border-radius: 5px;  background-position: center;border-radius: 5px;background-size: cover;width: 100%;background-color: black;height: auto;background-image: url('http://www.zynekcctv.com/web_admin/<?=$row['pic_urls'];?>');">
                      <img src="<?=SITE_URL;?>images/loading.gif" style="Opacity:0;" data-src='http://www.zynekcctv.com/web_admin/<?=$row['pic_urls'];?>' class="lazy photo_in" />
                      <figure><?=delete_char($row['gal_name']);?></figure>
                  </div>
                </div>
              </a>
              <?
              $i++;
            }
          }
          ?>
        </div>
        <div class="col-xs-12"  style="padding:20px 15px;">
            <h3><a href="<?=SITE_URL;?><?=$UrlPage;?>" style="color:#000;text-decoration:none;"> <i class="fas fa-long-arrow-alt-left"></i> ดูผลงานทั้งหมด</a></h3>
        </div>
        <?
      }
      ?>
    </div>
  </div>
</div>




<!-- Photo Viewer -->
<link rel="stylesheet" type="text/css" href="<?=SITE_URL;?>plugins/photoswipe/photoswipe.css">
<link rel="stylesheet" type="text/css" href="<?=SITE_URL;?>plugins/photoswipe/default-skin/default-skin.css">
<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                  </div>
                </div>
            </div>
        </div>


        <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip">
                <!-- <a href="#" class="pswp__share--facebook"></a>
                <a href="#" class="pswp__share--twitter"></a>
                <a href="#" class="pswp__share--pinterest"></a>
                <a href="#" download class="pswp__share--download"></a> -->
            </div>
        </div>

        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center">
          </div>
        </div>
      </div>
    </div>
</div>
<script src="<?=SITE_URL;?>plugins/photoswipe/photoswipe.js"></script>
<script src="<?=SITE_URL;?>plugins/photoswipe/photoswipe-ui-default.js"></script>
<!-- Script View Photo -->
<script type="text/javascript">
    (function() {

    var initPhotoSwipeFromDOM = function(gallerySelector) {

      var parseThumbnailElements = function(el) {
          var thumbElements = el.childNodes,
              numNodes = thumbElements.length,
              items = [],
              el,
              childElements,
              thumbnailEl,
              size,
              item;

          for(var i = 0; i < numNodes; i++) {
              el = thumbElements[i];

              // require  only element nodes
              if(el.nodeType !== 1) {
                continue;
              }

              childElements = el.children;

              size = el.getAttribute('data-size').split('x');

              // create slide object
              item = {
            src: el.getAttribute('href'),
            w: parseInt(size[0], 10),
            h: parseInt(size[1], 10),
            author: el.getAttribute('data-author')
              };

              item.el = el; // save link to element for getThumbBoundsFn

              if(childElements.length > 0) {
                item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                if(childElements.length > 1) {
                    item.title = childElements[1].innerHTML; // caption (contents of figure)
                }
              }


          var mediumSrc = el.getAttribute('data-med');
                if(mediumSrc) {
                  size = el.getAttribute('data-med-size').split('x');
                  // "medium-sized" image
                  item.m = {
                      src: mediumSrc,
                      w: parseInt(size[0], 10),
                      h: parseInt(size[1], 10)
                  };
                }
                // original image
                item.o = {
                  src: item.src,
                  w: item.w,
                  h: item.h
                };

              items.push(item);
          }

          return items;
      };

      // find nearest parent element
      var closest = function closest(el, fn) {
          return el && ( fn(el) ? el : closest(el.parentNode, fn) );
      };

      var onThumbnailsClick = function(e) {
          e = e || window.event;
          e.preventDefault ? e.preventDefault() : e.returnValue = false;

          var eTarget = e.target || e.srcElement;

          var clickedListItem = closest(eTarget, function(el) {
              return el.tagName === 'A';
          });

          if(!clickedListItem) {
              return;
          }

          var clickedGallery = clickedListItem.parentNode;

          var childNodes = clickedListItem.parentNode.childNodes,
              numChildNodes = childNodes.length,
              nodeIndex = 0,
              index;

          for (var i = 0; i < numChildNodes; i++) {
              if(childNodes[i].nodeType !== 1) {
                  continue;
              }

              if(childNodes[i] === clickedListItem) {
                  index = nodeIndex;
                  break;
              }
              nodeIndex++;
          }

          if(index >= 0) {
              openPhotoSwipe( index, clickedGallery );
          }
          return false;
      };

      var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
          params = {};

          if(hash.length < 5) { // pid=1
              return params;
          }

          var vars = hash.split('&');
          for (var i = 0; i < vars.length; i++) {
              if(!vars[i]) {
                  continue;
              }
              var pair = vars[i].split('=');
              if(pair.length < 2) {
                  continue;
              }
              params[pair[0]] = pair[1];
          }

          if(params.gid) {
            params.gid = parseInt(params.gid, 10);
          }

          return params;
      };

      var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
          var pswpElement = document.querySelectorAll('.pswp')[0],
              gallery,
              options,
              items;

        items = parseThumbnailElements(galleryElement);

          // define options (if needed)
          options = {

              galleryUID: galleryElement.getAttribute('data-pswp-uid'),

              getThumbBoundsFn: function(index) {
                  // See Options->getThumbBoundsFn section of docs for more info
                  var thumbnail = items[index].el.children[0],
                      pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                      rect = thumbnail.getBoundingClientRect();

                  return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
              },

              addCaptionHTMLFn: function(item, captionEl, isFake) {
            if(!item.title) {
              captionEl.children[0].innerText = '';
              return false;
            }
            captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
            return true;
              }

          };


          if(fromURL) {
            if(options.galleryPIDs) {
              // parse real index when custom PIDs are used
              // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
              for(var j = 0; j < items.length; j++) {
                if(items[j].pid == index) {
                  options.index = j;
                  break;
                }
              }
            } else {
              options.index = parseInt(index, 10) - 1;
            }
          } else {
            options.index = parseInt(index, 10);
          }

          // exit if index not found
          if( isNaN(options.index) ) {
            return;
          }



        var radios = document.getElementsByName('gallery-style');
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                if(radios[i].id == 'radio-all-controls') {

                } else if(radios[i].id == 'radio-minimal-black') {
                  options.mainClass = 'pswp--minimal--dark';
                  options.barsSize = {top:0,bottom:0};
              options.captionEl = false;
              options.fullscreenEl = false;
              options.shareEl = false;
              options.bgOpacity = 0.85;
              options.tapToClose = true;
              options.tapToToggleControls = false;
                }
                break;
            }
        }

          if(disableAnimation) {
              options.showAnimationDuration = 0;
          }

          // Pass data to PhotoSwipe and initialize it
          gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

          // see: http://photoswipe.com/documentation/responsive-images.html
        var realViewportWidth,
            useLargeImages = false,
            firstResize = true,
            imageSrcWillChange;

        gallery.listen('beforeResize', function() {

          var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
          dpiRatio = Math.min(dpiRatio, 2.5);
            realViewportWidth = gallery.viewportSize.x * dpiRatio;


            if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
              if(!useLargeImages) {
                useLargeImages = true;
                  imageSrcWillChange = true;
              }

            } else {
              if(useLargeImages) {
                useLargeImages = false;
                  imageSrcWillChange = true;
              }
            }

            if(imageSrcWillChange && !firstResize) {
                gallery.invalidateCurrItems();
            }

            if(firstResize) {
                firstResize = false;
            }

            imageSrcWillChange = false;

        });

        gallery.listen('gettingData', function(index, item) {
            if( useLargeImages ) {
                item.src = item.o.src;
                item.w = item.o.w;
                item.h = item.o.h;
            } else {
                item.src = item.m.src;
                item.w = item.m.w;
                item.h = item.m.h;
            }
        });

          gallery.init();
      };

      // select all gallery elements
      var galleryElements = document.querySelectorAll( gallerySelector );
      for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
      }

      // Parse URL and open gallery if it contains #&pid=3&gid=1
      var hashData = photoswipeParseHash();
      if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
      }
    };

    initPhotoSwipeFromDOM('.demo-gallery');

  })();

  </script>
<!-- Script View Photo -->
