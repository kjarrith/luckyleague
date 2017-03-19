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
          <div id="addtoDiv">
          <div class="btn-group btn-group-justified">
            <div class="btn-group">
            <form action="deleteEvent" method="post">
              <input type="hidden" name="eventID" value="{{$eventID}}">
              <button type="submit" class="btn btn-default">
                <span class="p-t-5 p-b-5">
                                      <i class="fa fa-trash fs-15"></i>
                                  </span>
                <br>
                <span class="fs-11 font-montserrat text-uppercase">Hide & Close {{$eventling->event_name}}</span>
              </button>
            </form>
            </div>
            <div class="btn-group">
            <form action="closeBetting" method="post">
              <input type="hidden" name="eventID" value="{{$eventID}}">
              <button type="submit" class="btn btn-default">
                <span class="p-t-5 p-b-5">
                                      <i class="fa fa-pause fs-15"></i>
                                  </span>
                <br>
                <span class="fs-11 font-montserrat text-uppercase">Close Betting</span>
              </button>
            </form>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default">
                <span class="p-t-5 p-b-5">
                                      <i class="fa fa-user fs-15"></i>
                                  </span>
                <br>
                <span class="fs-11 font-montserrat text-uppercase">Contacts</span>
              </button>
            </div>
          </div>
          <br/>
          <div class="container-fluid container-fixed-lg bg-white">
            <div class="row">
              <div class="col-sm-5">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Create a new bet for the event {{$eventling->event_name}}
                    </div>
                  </div>
                  <div class="panel-body">
                    <h3 class="bet-name">Add a New Bet</h3>
                    <p>{{$eventling->open_date}}</p>
                    <br>

                  </div>
                </div>
                <!-- END PANEL -->
              </div>
              <div class="col-sm-7">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-body">
                  <div class="currentBetlings"></div>
                    <form id="form-project" role="form" method="POST" autocomplete="off" action="createNewBet" name="new_bet" data-newBet="data-newBet">
                      <p>Bet Information</p>
                      <div class="form-group-attached">
                        <div class="form-group form-group-default required">
                          <label>Description (100 letters max)</label>
                          <input type="text" class="form-control" name="betName" required>
                        </div>
                      </div>
                      <br>
                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Type</label>
                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="betType">
                          <optgroup label="All Categories">
                            <option value="1">Bet has 1 option</option>
                            <option value="2">Bet has 2 options</option>
                            <option value="3">Bet has 3 options</option>
                            <option value="4">Bet has 3+ options</option>
                            <option value="5">Bet has 8+ options</option>
                          </optgroup>
                        </select>
                      </div>
                      <br>
                      <input type="hidden" name="eventID" value="{{$eventID}}">
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
          <br>

        @foreach($bets as $bet)

                    <!-- START CONTAINER FLUID -->
          <div id="addtoDiv">
          <div class="container-fluid container-fixed-lg bg-white">
            <div class="row">
              <div class="col-sm-5">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">{{$eventling->event_name}}
                    </div>
                  </div>
                  <div class="panel-body">
                    <h3 class="bet-name">{{$bet->description}}</h3>
                    <br>
                  <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                    <form action="deleteBet" method="post">
                      <input type="hidden" name="betID" value="{{$bet->id}}">
                      <button type="submit" class="btn btn-default">
                        <span class="p-t-5 p-b-5">
                                              <i class="fa fa-trash fs-15"></i>
                                          </span>
                        <br>
                        <span class="fs-11 font-montserrat text-uppercase">Delete</span>
                      </button>
                    </form>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">
                        <span class="p-t-5 p-b-5">
                                              <i class="fa fa-user fs-15"></i>
                                          </span>
                        <br>
                        <span class="fs-11 font-montserrat text-uppercase">Another button</span>
                      </button>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>
              <div class="col-sm-7">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-body">
                  <div class="currentBetlings">
                      @foreach($bet->betlings as $betling)
                      <div class="btn-group sm-m-t-10">
                          <a href="/editBetling/{{{$betling->id}}}">
                                                        <button type="button" class="btn btn-default click-editBet" data-betlingID="{{{$betling->id}}}" data-betID="{{{$betling->bet_id}}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                          </a>

                          </div>
                      <?php
                        $winner = "";
                        if($betling->status == 1 ){
                          $winner = 'winner';
                        }
                      ?>
                      <div class="btn betlingbutton {{{$winner}}}" data-betlingID="{{{$betling->id}}}" data-betID="{{{$betling->bet_id}}}">{{$betling->title}} @ {{$betling->odds}}</div>
                      @endforeach
                  </div>
                  <br/>
                    <form id="form-project" role="form" method="POST" autocomplete="off" action="createNewBetling" name="new_event" data-newBetling="data-newBetling">
                        <p>Add a bet option</p>
                        <div class="form-group-attached">
                            <div class="form-group form-group-default required">
                            <label>Title (60 letters max)</label>
                            <input type="text" class="form-control" name="betlingTitle" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group-attached">
                            <div class="form-group form-group-default required">
                            <label>Odds (numerical)</label>
                            <input type="text" class="form-control" name="betlingOdds" required>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="eventID" value="{{$eventling->id}}">
                        <input type="hidden" name="betID" value="{{$bet->id}}">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button>
                        <br/><br/>
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>
            </div>
          </div>
          <!-- END CONTAINER FLUID -->
          <br>

        @endforeach

          </div>
          <!-- END addto div -->
          <button class="btn btn-complete btn-cons col-md-2 col-md-offset-5 addBet">+ Add Bet</button>
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
/admin/
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
    <script src="/js/admin.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="/admin/assets/js/form_layouts.js" type="text/javascript"></script>
    <script src="/admin/assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <!-- CLOCKPICKER -->
</body>
</html>