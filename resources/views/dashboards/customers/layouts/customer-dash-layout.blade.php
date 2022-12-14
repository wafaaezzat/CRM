<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/ijaboCropTool/ijaboCropTool.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/customerlte.min.css')}}">
    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    {{--full calender--}}
    <link href="{{asset('assets/plugins/fullcalendar/main.css')}}" rel='stylesheet' />
    <script src="{{asset('assets/plugins/fullcalendar/main.js')}}"></script>


</head>
<body class="sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Leave') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('public/Image/'.Auth::user()->picture) }}" class="img-circle elevation-2 customer_picture" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('customer.profile')}}" class="d-block customer_name h4">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('customer.dashboard')}}" class="nav-link {{ (request()->is('customer/dashboard*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('customer.profile')}}" class="nav-link {{ (request()->is('customer/profile*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                   Profile Settings
                  </p>
                  </p>
                </a>
              </li>

            <li class="nav-item">
                <a href="{{ route('users')}}" class="nav-link {{ (request()->is('customer/users')) ? 'active' : '' }}">
                  <i class="nav-icon fa-solid fa-users"></i>
                  <p>
                  Users
                  </p>
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{ route('company.clients')}}" class="nav-link {{ (request()->is('customer/clients*')) ? 'active' : '' }}">
                    <i class=" nav-icon  fa-solid fa-people-line"></i>
                    <p>
                        Clients
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('company.projects')}}" class="nav-link {{ (request()->is('customer/projects')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Projects
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('customer.roles')}}" class="nav-link {{ (request()->is('customer/roles')) ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-pen"></i>
                    <p>
                        Roles
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('teams')}}" class="nav-link {{ (request()->is('customer/teams')) ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-people-group"></i>
                    <p>
                        Teams
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('customer.exports')}}" class="nav-link {{ (request()->is('customer/exports')) ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-download"></i>
                    <p>
                        Exports
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('projects.attendance')}}" class="nav-link {{ (request()->is('customer/projects/attendance*')) ? 'active' : '' }}">
                    <i class="nav-icon  fa-solid fa-clipboard-user"></i>
                    <p>
                        Project Attendance
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('customer.attendance')}}" class="nav-link {{ (request()->is('customer/attendance*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        My Attendance
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.attendance')}}" class="nav-link {{ (request()->is('customer/usersAttendance*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        Users Attendance
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.berDAY')}}" class="nav-link {{ (request()->is('customer/usersBerDAY*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        Users Attendance Ber Day
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('customer.reports')}}" class="nav-link {{ (request()->is('customer/reports*')) ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-bars"></i>
                    <p>
                        Reports
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:  #e0ccff">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/plugins/ijaboCropTool/ijaboCropTool.min.js')}}"></script>

<!-- FLOT CHARTS -->
<script src="{{asset('assets/plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('assets/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('assets/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>


<!-- CustomerLTE App -->
<script src="{{asset('assets/js/customerlte.min.js')}}"></script>

{{-- CUSTOM JS CODES --}}
<script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });

  $(function(){

    /* UPDATE Customer PERSONAL INFO */

    $('#CustomerInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.customer_name').each(function(){
                     $(this).html( $('#CustomerInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });


    $(document).on('click','#change_picture_btn', function(){
      $('#customer_image').click();
    });


    $('#customer_image').ijaboCropTool({
          preview : '.customer_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("customerPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });


    $('#changePasswordCustomerForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordCustomerForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });


  });
</script>


<script>
    $(function () {
        /*
         * Flot Interactive Chart
         * -----------------------
         */
        // We use an inline data source in the example, usually data would
        // be fetched from a server
        var data        = [],
            totalPoints = 100

        function getRandomData() {

            if (data.length > 0) {
                data = data.slice(1)
            }

            // Do a random walk
            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y    = prev + Math.random() * 10 - 5

                if (y < 0) {
                    y = 0
                } else if (y > 100) {
                    y = 100
                }

                data.push(y)
            }

            // Zip the generated y values with the x values
            var res = []
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res
        }

        var interactive_plot = $.plot('#interactive', [
                {
                    data: getRandomData(),
                }
            ],
            {
                grid: {
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor: '#f3f3f3'
                },
                series: {
                    color: '#3c8dbc',
                    lines: {
                        lineWidth: 2,
                        show: true,
                        fill: true,
                    },
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    show: true
                },
                xaxis: {
                    show: true
                }
            }
        )

        var updateInterval = 500 //Fetch data ever x milliseconds
        var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
        function update() {

            interactive_plot.setData([getRandomData()])

            // Since the axes don't change, we don't need to call plot.setupGrid()
            interactive_plot.draw()
            if (realtime === 'on') {
                setTimeout(update, updateInterval)
            }
        }

        //INITIALIZE REALTIME DATA FETCHING
        if (realtime === 'on') {
            update()
        }
        //REALTIME TOGGLE
        $('#realtime .btn').click(function () {
            if ($(this).data('toggle') === 'on') {
                realtime = 'on'
            }
            else {
                realtime = 'off'
            }
            update()
        })
        /*
         * END INTERACTIVE CHART
         */


        /*
         * LINE CHART
         * ----------
         */
        //LINE randomly generated data

        var sin = [],
            cos = []
        for (var i = 0; i < 14; i += 0.5) {
            sin.push([i, Math.sin(i)])
            cos.push([i, Math.cos(i)])
        }
        var line_data1 = {
            data : sin,
            color: '#3c8dbc'
        }
        var line_data2 = {
            data : cos,
            color: '#00c0ef'
        }
        $.plot('#line-chart', [line_data1, line_data2], {
            grid  : {
                hoverable  : true,
                borderColor: '#f3f3f3',
                borderWidth: 1,
                tickColor  : '#f3f3f3'
            },
            series: {
                shadowSize: 0,
                lines     : {
                    show: true
                },
                points    : {
                    show: true
                }
            },
            lines : {
                fill : false,
                color: ['#3c8dbc', '#f56954']
            },
            yaxis : {
                show: true
            },
            xaxis : {
                show: true
            }
        })
        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display : 'none',
            opacity : 0.8
        }).appendTo('body')
        $('#line-chart').bind('plothover', function (event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2)

                $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
                    .css({
                        top : item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#line-chart-tooltip').hide()
            }

        })
        /* END LINE CHART */

        /*
         * FULL WIDTH STATIC AREA CHART
         * -----------------
         */
        var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
            [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
            [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
        $.plot('#area-chart', [areaData], {
            grid  : {
                borderWidth: 0
            },
            series: {
                shadowSize: 0, // Drawing is faster without shadows
                color     : '#00c0ef',
                lines : {
                    fill: true //Converts the line chart to area chart
                },
            },
            yaxis : {
                show: false
            },
            xaxis : {
                show: false
            }
        })

        /* END AREA CHART */

        /*
         * BAR CHART
         * ---------
         */

        var bar_data = {
            data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
            bars: { show: true }
        }
        $.plot('#bar-chart', [bar_data], {
            grid  : {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor  : '#f3f3f3'
            },
            series: {
                bars: {
                    show: true, barWidth: 0.5, align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis : {
                ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
            }
        })
        /* END BAR CHART */

        /*
         * DONUT CHART
         * -----------
         */

        var donutData = [
            {
                label: 'Series2',
                data : 30,
                color: '#3c8dbc'
            },
            {
                label: 'Series3',
                data : 20,
                color: '#0073b7'
            },
            {
                label: 'Series4',
                data : 50,
                color: '#00c0ef'
            }
        ]
        $.plot('#donut-chart', donutData, {
            series: {
                pie: {
                    show       : true,
                    radius     : 1,
                    innerRadius: 0.5,
                    label      : {
                        show     : true,
                        radius   : 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        })
        /*
         * END DONUT CHART
         */

    })

    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
            + label
            + '<br>'
            + Math.round(series.percent) + '%</div>'
    }
</script>
<script src="https://kit.fontawesome.com/f933b20416.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
