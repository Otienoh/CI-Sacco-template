<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


         
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-sm-7">
              <div class="row space12">
                <ul class="mini-stats col-sm-12">
                  <li class="col-sm-4">
                    <div class="sparkline_bar_good">
                      <span>3,5,9,8,13,11,14</span>+10%
                    </div>
                    <div class="values">
                      <strong>18304</strong>
                      Visits
                    </div>
                  </li>
                  <li class="col-sm-4">
                    <div class="sparkline_bar_neutral">
                      <span>20,15,18,14,10,12,15,20</span>0%
                    </div>
                    <div class="values">
                      <strong>3833</strong>
                      Unique Visitors
                    </div>
                  </li>
                  <li class="col-sm-4">
                    <div class="sparkline_bar_bad">
                      <span>4,6,10,8,12,21,11</span>+50%
                    </div>
                    <div class="values">
                      <strong>18304</strong>
                      Pageviews
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="row space12">
                <div class="col-sm-6">
                  <div class="easy-pie-chart">
                    <span class="bounce number" data-percent="44"> <span class="percent">44</span> </span>
                    <div class="label-chart">
                      Bounce Rate
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="easy-pie-chart">
                    <span class="cpu number" data-percent="82"> <span class="percent">82</span> </span>
                    <div class="label-chart">
                      New Visits
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-7">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="clip-stats"></i>
                  Site Visits
                  <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                      <i class="fa fa-wrench"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                      <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="flot-medium-container">
                    <div id="placeholder-h1" class="flot-placeholder"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="clip-pie"></i>
                      Acquisition
                      <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                          <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                          <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="flot-mini-container">
                        <div id="placeholder-h2" class="flot-placeholder"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="clip-bars"></i>
                      Pageviews real-time
                      <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                          <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                          <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="flot-mini-container">
                        <div id="placeholder-h3" class="flot-placeholder"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="clip-calendar"></i>
                  Calendar
                  <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                      <i class="fa fa-wrench"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                      <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                      <i class="fa fa-resize-full"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                </div>
                <div class="panel-body">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- end: PAGE CONTENT-->
        <script src="<?php echo base_url();?>assets/admin/js/index.js"></script>
       <script>
      jQuery(document).ready(function() {
        Main.init();
        Index.init();
      });
    </script>