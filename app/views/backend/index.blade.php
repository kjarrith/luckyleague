<?php 
require_once 'admin/assets/initiate/connect.php';
require_once 'admin/assets/initiate/sqli.php';

if (isset($_POST['eventName'])) {

    $eventName = $mysqli->real_escape_string($_POST['eventName']);
    $openDate = $mysqli->real_escape_string($_POST['openDate']);
    $closeDate = $mysqli->real_escape_string($_POST['closeDate']);

      $query = query("INSERT INTO events (event_name, open_date, close_date)
                        VALUES('$eventName','$openDate','$closeDate')");

      header("location:/admin");
      exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="/admin/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/admin/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/admin/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/admin/pages/ico/152.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!-- BEGIN Vendor CSS-->
    <link href="/admin/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/admin/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/admin/dist/bootstrap-clockpicker.css">

     <!-- BEGIN Pages CSS-->
    <link href="/admin/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="/admin/pages/css/pages.css" rel="stylesheet" type="text/css" />

    <!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <script type="text/javascript">
    window.onload = function() {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/admin/pages/css/windows.chrome.fix.css" />'
    }
    </script>
</head>

<body class="fixed-header menu-pin">

    <!-- INCLUDE SIDEBAR -->
    @include('layouts.partials.admin.sidebar')
    
    <!-- START PAGE-CONTAINER -->
    <div class="page-container">
        <!-- INCLUDE HEADER -->
        @include('layouts.partials.admin.header')

        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper">
            <!-- START PAGE CONTENT -->
            <div class="content">
                <!-- START JUMBOTRON -->
                <div class="jumbotron" data-pages="parallax">
                    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                        <div class="inner">
                            <!-- START BREADCRUMB -->
                            <ul class="breadcrumb">
                                <li>
                                    <p>Pages</p>
                                </li>
                                <li><a href="#" class="active">Barebone template</a>
                                </li>
                            </ul>
                            <!-- END BREADCRUMB -->
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->

                <!-- START CONTAINER FLUID -->
                         <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <div class="row">
              <div class="col-sm-5">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Create new event
                    </div>
                  </div>
                  <div class="panel-body">
                    <h3>Create new event</h3>
                    <p>Remember to never skip any details.</p>
                    <br>

                  </div>
                </div>
                <!-- END PANEL -->
              </div>
              <div class="col-sm-7">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-body">
                    <form id="form-project" role="form" method="POST" autocomplete="off" action="" name="new_event">
                      <p>Basic Information</p>
                      <div class="form-group-attached">
                        <div class="form-group form-group-default required">
                          <label>Event name (100 letters max)</label>
                          <input type="text" class="form-control" name="eventName" required>
                        </div>
                      </div>
                      <p class="m-t-10">Advanced Information</p>
                      <div class="form-group-attached">
                        <div class="row clearfix">
                          <div class="col-sm-6">
                            <div class="form-group form-group-default required">
                              <label>Betting opens</label>
                              <input id="start-date" type="text" class="form-control" name="openDate" required>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group form-group-default">
                              <label>Betting closes</label>
                              <input id="end-date" type="text" class="form-control" name="closeDate">
                            </div>
                          </div>
                          <br>
                        <div class="col-sm-3">
                            <div class="form-group form-group-default clockpicker">
                            <label>Betting closes @</label>
                                <input type="text" class="form-control" value="09:30" style="width:150px;" name="closeTime">
                            </div>
                        </div>
                        <br/>

                        </div>
                      </div>
                      <br>
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Category</label>
                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="category">
                          <optgroup label="All Categories">
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                          </optgroup>
                        </select>
                      </div>
                      <br>
                      <button class="btn btn-success" type="submit">Submit</button>
                      <button class="btn btn-default"><i class="pg-close"></i> Clear</button>
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>
            </div>
          </div>
          <!-- END CONTAINER FLUID -->
                <!-- END CONTAINER FLUID -->
                
            </div>
            <!-- END PAGE CONTENT -->
            <!-- INCLUDE FOOTEr -->
            @include('layouts.partials.admin.footer')
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    
    <!-- INCLUDE QUICKVIEW -->
    @include('layouts.partials.admin.quickview')
    
    <!-- INCLUDE OVERLAY -->
    @include('layouts.partials.admin.overlay')

       <!-- BEGIN VENDOR JS -->
    <script src="/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="/admin/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="/admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="/admin/assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="/admin/assets/plugins/classie/classie.js"></script>
    <script src="/admin/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="/admin/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="/admin/assets/js/form_layouts.js" type="text/javascript"></script>
    <script src="/admin/assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <!-- CLOCKPICKER -->
    <script type="text/javascript" src="/admin/dist/bootstrap-clockpicker.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
    .find('input').change(function(){
        console.log(this.value);
    });
var input = $('#single-input').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});

$('.clockpicker-with-callbacks').clockpicker({
        donetext: 'Done',
        init: function() { 
            console.log("colorpicker initiated");
        },
        beforeShow: function() {
            console.log("before show");
        },
        afterShow: function() {
            console.log("after show");
        },
        beforeHide: function() {
            console.log("before hide");
        },
        afterHide: function() {
            console.log("after hide");
        },
        beforeHourSelect: function() {
            console.log("before hour selected");
        },
        afterHourSelect: function() {
            console.log("after hour selected");
        },
        beforeDone: function() {
            console.log("before done");
        },
        afterDone: function() {
            console.log("after done");
        }
    })
    .find('input').change(function(){
        console.log(this.value);
    });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e){
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
                .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
<script type="text/javascript" src="/admin/assets/js/highlight.min.js"></script>
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>
</body>
</html>