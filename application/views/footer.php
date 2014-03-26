<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2013 <a href="http://hotel.cihadoge.com/">DB Hotel Management System</a>. <span class="pull-right">Fadime Tugba DOGAN - Cihad OGE - Furkan Mustafa AKDEMIR</span> </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="/js/jquery-1.7.2.min.js"></script> 
<script src="/js/excanvas.min.js"></script> 
<script src="/js/chart.min.js" type="text/javascript"></script> 
<script src="/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="/js/base.js"></script> 

<?
if($page == "reservation" ) {
?>
<script type="text/javascript">
  function date2str(date) {
    var d = date.getDate(); 
    var m = date.getMonth()+1;
    var y = date.getFullYear();
    if(d<10)d='0'+d;
    if(m<10)m='0'+m;
    return y+'-'+m+'-'+d;
  }
  $(document).ready(function() {
    var d = new Date();
    if($("#calendar").length>0) {
      $("#checkin_date").val(date2str(d));
      $('#checkout_date').val(date2str(d));
    }
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        console.log(typeof start);
        var d = new Date(start);
        console.log(d.getDate());
        console.log(date2str(start));console.log(date2str(end));
        $('#checkin_date').val(date2str(start));
        $('#checkout_date').val(date2str(end));
//        window.location.href="/reservation/make/" + year + "/" + month + "/" + day;
        return;
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
            {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
            true // make the event "stick"
          );
        }
        calendar.fullCalendar('unselect');
      },
      editable: false,
      events: [
      ]
    });
    /*$('#calendar').find('.fc-widget-content').css('background-color','rgb(198, 247, 198)');
    $('#calendar').find('.fc-other-month').css('background-color','transparent');*/
  });

</script>
<? } else if($page == "dashboard") { ?>

<script>     
  // init calendar
  $(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        return;
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
            {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
            true // make the event "stick"
          );
        }
        calendar.fullCalendar('unselect');
      },
      editable: true,
      events: [
        {
          title: 'New Year',
          start: new Date(y, m, 1)
        },
        {
          title: 'Project Demo',
          start: new Date(y, m, 2)
        },
        {
          title: 'CS353 Final',
          start: new Date(y, m, 8)
        }
      ]
    });
    /*$('#calendar').find('.fc-widget-content').css('background-color','rgb(198, 247, 198)');
    $('#calendar').find('.fc-other-month').css('background-color','transparent');*/
  });

        var lineChartData = {
            labels: <? echo json_encode($next_week_freq['dates']);?>,
            datasets: [
        /*{
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: [65, 59, 90, 81, 56, 55, 40]
        },*/
        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: <? echo json_encode($next_week_freq['freq_counts']);?>
        }
      ]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
        {
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]

        }    

    </script><!-- /Calendar -->
    <!-- Welcome Guide -->
    <?
    if(SHOW_GUIDE) {
    ?>
    <script src="js/guidely/guidely.min.js"></script>

    <script>
    $(function () {
      
      guidely.add ({
        attachTo: '#target-1'
        , anchor: 'top-left'
        , title: 'Today \'s Stats'
        , text: 'You can see how many services are registered today. We used stored procedure here.'
      });
      
      guidely.add ({
        attachTo: '#target-2'
        , anchor: 'top-left'
        , title: 'Next Week Reservations Chart'
        , text: 'You can see next week\'s hotel situation. It shows how many customers will be hosted next week.'
      });

      guidely.add ({
        attachTo: '#target-3'
        , anchor: 'top-left'
        , title: 'Most Favorite Customer'
        , text: 'Here, you can see the customer who spend most money to our hotel. We used MAX, SUM, GROUP BY functions on our database.'
      });
      
      
      guidely.add ({
        attachTo: '#target-4'
        , anchor: 'top-left'
        , title: 'Most Frequent Customers'
        , text: 'Here, you can see most visited customers. We used GROUP BY, ORDER functions here.'
      });
      
      guidely.init ({ welcome: true, startTrigger: true });


    });

    </script>
    <? } ?>
    <!--/Welcome Guide-->
<? } ?>
    <style type="text/css">
    .calendar{-webkit-user-select: none; -moz-user-select: none;}
    </style>
<script type="text/javascript">
  function open_form()
  {
    console.log("Opening Form...");
    $('#form').fadeIn();
  }

</script>
</body>
</html>
