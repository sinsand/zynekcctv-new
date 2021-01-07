

<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#search_claim" data-toggle="tab">รายงานการซ่อม</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="search_claim">
          <div class="row">
            <div class="col-xs-12">
              <div class="col-xs-12" style="margin:15px 0;">
                <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                  <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">เลขที่ใบรับซ่อม :</label>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="Rxxxxxxx"/>
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default">ค้นหา</button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">เลขที่ส่งงานซ่อม :</label>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="SERVxxxxxxx"/>
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default">ค้นหา</button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">รหัสลูกค้า :</label>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="PROxxxxx"/>
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default">ค้นหา</button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">ชื่อบริษัท :</label>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="ซายเนค"/>
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default">ค้นหา</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="" class="control-label">รุ่นสินค้า :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Modelxxx"/>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">ค้นหา</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="" class="control-label">หมายเลขสินค้า :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="SNxxxxxxxx">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">ค้นหา</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;display:none;">
                    <div class="col-xs-12">
                      <label for="" class="control-label">รุ่นสินค้า :</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า">
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default">ค้นหา</button>
                          </span>
                      </div>
                    </div>
                  </div>
              </div>


              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-left">บริษัท</th>
                        <th class="text-left">รหัสสินค้า</th>
                        <th class="text-left">หมายเลขสินค้า</th>
                        <th class="text-left">เลขที่ใบรับซ่อม</th>
                        <th class="text-left">อาการเสียที่รับมา</th>
                        <th class="text-left">เลขที่รับซ่อม</th>
                        <th class="text-left">อาการเสียที่พบ</th>
                        <th class="text-left">หมายเหตุ</th>
                        <th class="text-center">การแก้ไข</th>
                        <th class="text-center">(วันที่รับซ่อม)<br>(วันที่ส่งคืน)</th>
                        <th class="text-center">สถานะการซ่อม</th>
                        <th class="text-center">ใบเสนอราคา</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?
                          $sql = "";
                          $i=1;
                        ?>
                        <tr>
                          <td class="text-center"><?=($i++);?></td>
                          <td class="text-left">โปรซีเคียวเซ็นเตอร์<br>(PR019000)</td>
                          <td class="text-left">ZKTI2023B</td>
                          <td class="text-left">652007958</td>
                          <td class="text-left" style="background:rgba(255,0,0,0.1);">
                            <div style="width:120px;">R1811110</div>
                          </td>
                          <td class="text-left" style="background:rgba(255,0,0,0.1);">ไม่ติด *อยู่ในเงื่อนไขเปลี่ยนตัวใหม่ วันที่ 16/11/2017 วันที่หมดประกัน 15/11/2020* (SO:16440/PINO-5189-2017)</td>
                          <td class="text-left" style="background:rgba(0,200,0,0.1);">
                            <div style="width:120px;">SERV1811222</div>
                          </td>
                          <td class="text-left" style="background:rgba(0,200,0,0.1);">เทส22/11/61-26/11/61กล้องใช้งานได้ปกติส่งคืนลูกค้า(แนะนำลูกค้าเช็คสายสัญญานและadapter)(หากมีข้อสงสัยติดต่อฝ่ายเทคนิค)</td>
                          <td class="text-left">-</td>
                          <td class="text-center">คืน</td>
                          <td class="text-center">
                            <div style="width:120px;color:#f00;">( <?=datetime("2018-11-13");?>)</div>
                            <div style="width:120px;color:#060;">( <?=datetime("2018-11-30");?>)</div>
                          </td>
                          <td class="text-center">
                            <div style="width:100px;">ซ่อมเสร็จแล้ว</div>
                          </td>
                          <td class="text-center">
                            <div style="width:100px;">-</div>
                          </td>
                          <td class="text-center">
                            <div class="btn-group" style="width: 200px;">
                              <button id="" data-toggle="modal" data-target="#modal-view" class="btn btn-default"><i class="fa fa-search"></i></button>
                              <button id="" data-toggle="modal" data-target="#modal-info" class="btn btn-default "><i class="fa fa-bullhorn"></i></button>
                              <button id="" data-toggle="modal" data-target="#modal-sign" class="btn btn-warning "><i class="fa fa-check-square-o"></i></button>
                              <button id="" data-toggle="modal" data-target="#modal-delete" class="btn btn-success"><i class="fa fa-sign-out"></i></button>
                              <button id="" data-toggle="modal" data-target="#modal-sign" class="btn btn-default "><i class="fa fa-print"></i></button>
                            </div>
                          </td>
                        </tr>
                        <?


                        ?>
                        <tr>
                          <td colspan="15" class="text-center">กรุณาค้นหาข้อมูล</td>
                        </tr>
                        <?



                        ?>
                    </tbody>
                  </table>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
