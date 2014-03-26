<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
	        rel="stylesheet">
	<link href="/css/font-awesome.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/pages/dashboard.css" rel="stylesheet">
	<link href="/css/pages/signin.css" rel="stylesheet" type="text/css">
  <link href="/js/guidely/guidely.css" rel="stylesheet"> 


	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
  </head>
  <body style="margin-bottom: 50px;">
  <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="/"><i class="icon-home"></i> <?=HOTEL_NAME?></a>
      <?
        if(UID){?>
          <div class="nav-collapse">
            <ul class="nav pull-right">
              <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog"></i> Account <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="javascript:;">Settings</a></li>
                  <li><a href="javascript:;">Help</a></li>
                </ul>
              </li> -->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                  class="icon-user"></i> <?=FULLNAME?> (<?=USERNAME?>) <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/login/logout">Logout</a></li>
                  </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=DEPARTMENT_NAME?></a>
                </li>
              </ul>
              <form class="navbar-search pull-right" action="/search" method="POST">
                <input type="text" name="customer" class="search-query" placeholder="Search Customer">
              </form>
          </div>
          <!--/.nav-collapse --> 
      <? } ?>
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<?
  if(UID)
{?>
      <div class="subnavbar">
        <div class="subnavbar-inner">
          <div class="container">
            <ul class="mainnav">
              <li <? if($page == "dashboard"){ echo 'class="active"'; } ?>><a href="/"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
              <li <? if($page == "employee"){ echo 'class="active"'; } ?>><a href="/employee"><i class="icon-user"></i><span>Employees</span> </a> </li>
              <li <? if($page == "reservation"){ echo 'class="active"'; } ?>><a href="/reservation"><i class="icon-list-alt"></i><span>Reservation</span> </a> </li>
              <li class="dropdown <? if($page == "room" || $page == "room_type"){ echo 'active'; } ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-home"></i><span>Rooms</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/room">Rooms</a></li>
                  <li><a href="/room-type">Room Types</a></li>
                </ul>
              </li>
              <li <? if($page == "departments"){ echo 'class="active"'; } ?>><a href="/departments"><i class="icon-file"></i><span>Depatments</span> </a> </li>
              <li <? if($page == "restaurant"){ echo 'class="active"'; } ?>><a href="/restaurant"><i class="icon-fire"></i><span>Restaurants</span> </a> </li>
              <li <? if($page == "medical_service"){ echo 'class="active"'; } ?>><a href="/medical_service"><i class="icon-user-md"></i><span>Medical Service</span> </a> </li>
              <li <? if($page == "sport_facility"){ echo 'class="active"'; } ?>><a href="/sport_facility"><i class="icon-trophy "></i><span>Sport Facility</span> </a> </li>
              <li <? if($page == "massage_room"){ echo 'class="active"'; } ?>><a href="/massage_room"><i class="icon-retweet "></i><span>Massage Room</span> </a> </li>
            </ul>
          </div>
          <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
      </div>
<? } ?>
<!-- /subnavbar -->