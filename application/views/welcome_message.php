<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad" id="target-1">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Today's Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats"> What happened today on DB Hotel? </h6>
                  <div id="big_stats" class="cf">
                    <!-- <div class="stat"> <i class="icon-anchor"></i> <span class="value"><?=@$today_stats["roomservice"]?></span> <br>Room Service </div> -->
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-fire"></i> <span class="value"><?=@$today_stats["restaurant"]?></span> <br>Restaurant</div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-trophy"></i> <span class="value"><?=@$today_stats["sport"]?></span> <br>Sport </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-user-md"></i> <span class="value"><?=@$today_stats["medicalservice"]?></span> <br>Medical Service </div>
                    <!-- .stat --> 
                  <!-- </div>
                  <div id="big_stats" class="cf">
                    <div class="stat"> <i class="icon-truck"></i> <span class="value"><?=@$today_stats["laundry"]?></span> <br>Laundry Service </div> -->
                    <!-- .stat --> 

                    <div class="stat"> <i class="icon-retweet"></i> <span class="value"><?=@$today_stats["massage"]?></span> <br>Massage Service </div>
                    <!-- .stat --> 
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <div class="widget widget-table action-table" id="target-3">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Most Favorite Customer</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> TC no </th>
                    <th> Checkin Count </th>
                    <th> Total Paid </th>
                  </tr>
                </thead>
                <tbody>
                  <? foreach ($customer_most_paid as $k => $cust) { ?>
                  <tr>
                    <td> <? echo $cust->customer_firstname." ".$cust->customer_lastname;?> </td>
                    <td> <?=$cust->customer_TCno?> </td>
                    <td> <?=$cust->checkin_count?></td>
                    <td> <?=$cust->total_paid?></td>
                    <!--td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td-->
                  </tr>
                  <? } ?>
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Calendar</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <? /* <div class="widget">
            <div class="widget-header"> <i class="icon-file"></i>
              <h3> Content</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="messages_layout">
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/message_avatar1.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">John Smith</a> <span class="time">1 hour ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> As an interesting side note, as a head without a body, I envy the dead. There's one way and only one way to determine if an animal is intelligent. Dissect its brain! Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. </div>
                  </div>
                </li>
                <li class="by_myself right"> <a href="#" class="avatar"><img src="img/message_avatar2.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Bender (myself) </a> <span class="time">4 hours ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> All I want is to be a monkey of moderate intelligence who wears a suit… that's why I'm transferring to business school! I had more, but you go ahead. Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. File not found. </div>
                  </div>
                </li>
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/message_avatar1.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Celeste Holm </a> <span class="time">1 Day ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> And I'd do it again! And perhaps a third time! But that would be it. Are you crazy? I can't swallow that. And I'm his friend Jesus. No, I'm Santa Claus! And from now on you're all named Bender Jr. </div>
                  </div>
                </li>
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/message_avatar2.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Mark Jobs </a> <span class="time">2 Days ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> That's the ONLY thing about being a slave. Now, now. Perfectly symmetrical violence never solved anything. Uh, is the puppy mechanical in any way? As an interesting side note, as a head without a body, I envy the dead. </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
          */ ?>
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
                <a href="/room" class="shortcut"><i class="shortcut-icon icon-home"></i><span class="shortcut-label">Rooms</span> </a>
                <a href="/employee" class="shortcut"><i class="shortcut-icon icon-user-md"></i><span class="shortcut-label">Employees</span> </a>
                <a href="/login/logout" class="shortcut"><i class="shortcut-icon icon-off"></i><span class="shortcut-label">Logout</span> </a>
                
                <!--<a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a>-->
              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget" id="target-2">
            <div class="widget-header"> <i class="icon-group"></i>
              <h3> Hotel's Next Week Customers</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
              <!-- /area-chart --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget widget-table action-table" id="target-4">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Most Frequent Customers</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> TC no </th>
                    <th> Checkin Count </th>
                    <th> Total Paid </th>
                  </tr>
                </thead>
                <tbody>
                  <? foreach ($customer_pay_list as $k => $cust) { ?>
                  <tr>
                    <td> <? echo $cust->customer_firstname." ".$cust->customer_lastname;?> </td>
                    <td> <?=$cust->customer_TCno?> </td>
                    <td> <?=$cust->checkin_count?></td>
                    <td> <?=$cust->total_paid?></td>
                    <!--td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td-->
                  </tr>
                  <? } ?>
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <? /*
          <!-- /widget --> 
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Recent News</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="news-items">
                <li>
                  
                  <div class="news-item-date"> <span class="news-item-day">29</span> <span class="news-item-month">Aug</span> </div>
                  <div class="news-item-detail"> <a href="http://www.egrappler.com/thursday-roundup-40/" class="news-item-title" target="_blank">Thursday Roundup # 40</a>
                    <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                  </div>
                  
                </li>
                <li>
                  
                  <div class="news-item-date"> <span class="news-item-day">15</span> <span class="news-item-month">Jun</span> </div>
                  <div class="news-item-detail"> <a href="http://www.egrappler.com/retina-ready-responsive-app-landing-page-website-template-app-landing/" class="news-item-title" target="_blank">Retina Ready Responsive App Landing Page Website Template – App Landing</a>
                    <p class="news-item-preview"> App Landing is a retina ready responsive app landing page website template perfect for software and application developers and small business owners looking to promote their iPhone, iPad, Android Apps and software products.</p>
                  </div>
                  
                </li>
                <li>
                  
                  <div class="news-item-date"> <span class="news-item-day">29</span> <span class="news-item-month">Oct</span> </div>
                  <div class="news-item-detail"> <a href="http://www.egrappler.com/open-source-jquery-php-ajax-contact-form-templates-with-captcha-formify/" class="news-item-title" target="_blank">Open Source jQuery PHP Ajax Contact Form Templates With Captcha: Formify</a>
                    <p class="news-item-preview"> Formify is a contribution to lessen the pain of creating contact forms. The collection contains six different forms that are commonly used. These open source contact forms can be customized as well to suit the need for your website/application.</p>
                  </div>
                  
                </li>
              </ul>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          */ ?>
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
