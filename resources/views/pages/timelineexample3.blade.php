<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Robin Foldnes">
    <link rel="shortcut icon" href="themes/coreui/img/favicon.png">
    <title>ProjectPro</title>

    <!-- Icons -->
    <link href="themes/coreui/css/font-awesome.min.css" rel="stylesheet">
    <link href="themes/coreui/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="themes/coreui/css/style.css" rel="stylesheet">
</head>
    <script src="/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/dhtmlxGantt/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">

    <script type="text/javascript" src="/dhtmlxGantt//common/testdata.js"></script>
    <style type="text/css">
        html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
    </style>
<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'          - Fixed Header

// Sidebar options
1. '.sidebar-fixed'         - Fixed Sidebar
2. '.sidebar-hidden'        - Hidden Sidebar
3. '.sidebar-off-canvas'    - Off Canvas Sidebar
4. '.sidebar-minimized'     - Minimized Sidebar (Only icons)
5. '.sidebar-compact'       - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'      - Fixed Aside Menu
2. '.aside-menu-hidden'     - Hidden Aside Menu
3. '.aside-menu-off-canvas' - Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'      - Fixed Breadcrumb

// Footer options
1. '.footer-fixed'          - Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed breadcrumb-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">&#9776;</button>

    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
                    </li>
                    <li class="nav-title">
                        Tasks
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tasks"><i class="icon-speedometer"></i> Tasks </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mytasks"><i class="icon-speedometer"></i> My Tasks </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tasks"><i class="icon-speedometer"></i> New Task </a>
                    </li>
                    <li class="nav-title">
                        Calenders
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/calendar"><i class="icon-speedometer"></i> Calender </a>
                    </li>
                    <li class="nav-title">
                        Timeline
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tidslinje"><i class="icon-speedometer"></i> Calender </a>
                    </li>
                    <li class="nav-title">
                        Timeline Example
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tidslinjeex"><i class="icon-speedometer"></i> Timeline Ex 1 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tidslinjeex2"><i class="icon-speedometer"></i> Timeline Ex 2 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tidslinjeex3"><i class="icon-speedometer"></i> Timeline Ex 3 </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="main">


    <div id="gantt_here" style='width:100%; height:100%;'></div>
    <script type="text/javascript">
        var tasks =  {
            data:[
                {id:1, text:"Project #2", start_date:"01-04-2013", duration:18,order:10,
                    progress:0.4, open: true},
                {id:2, text:"Task #1",    start_date:"02-04-2013", duration:8, order:10,
                    progress:0.6, parent:1},
                {id:3, text:"Task #2",    start_date:"11-04-2013", duration:8, order:20,
                    progress:0.6, parent:1}
            ],
                    links:[
            { id:1, source:1, target:2, type:"1"},
            { id:2, source:2, target:3, type:"0"},
            { id:3, source:3, target:4, type:"0"},
            { id:4, source:2, target:5, type:"2"},
        ]
        };

        gantt.init("gantt_here");


        gantt.parse(tasks);

    </script>
            <!-- /.conainer-fluid -->
        </main>


    </div>

    <footer class="app-footer">
        <a href="http://coreui.io">CoreUI</a> &copy; 2017 creativeLabs.
        <span class="float-right">Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="themes/coreui/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="themes/coreui/bower_components/popper.js/index.js"></script>
    <script src="themes/coreui/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="themes/coreui/bower_components/pace/pace.min.js"></script>



    <!-- GenesisUI main scripts -->

    <script src="themes/coreui/js/app.js"></script>

</body>

</html>