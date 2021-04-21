<header class="navbar navbar-fixed-top navbar-shadow bg-danger">
    <div class="navbar-branding">
        <a class="navbar-brand" href="/content/dashboard">
        <b>CMS</b>BARISTA
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>

    <ul class="nav navbar-nav navbar-right">                
        <li class="dropdown menu-merge">
            <div class="navbar-btn btn-group">
                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                    <span class="fa fa-bell-o fs14 va-m"></span>
                    <span class="badge badge-danger">1</span>
                </button>
                <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
                    <div class="panel mbn">
                        <div class="panel-menu">
                            <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                            <span class="panel-title fw600"> Recent Activity</span>
                            <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                        </div>
                        <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                            <ol class="timeline-list">
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-dark light">
                                        <span class="fa fa-tags"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Michael</b> Added to his store:
                                        <a href="#">Ipod</a>
                                    </div>
                                    <div class="timeline-date">1:25am</div>
                                </li>                                
                            </ol>
        
                        </div>
                        <div class="panel-footer text-center p7">
                            <a href="#" class="link-unstyled"> View All </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>                
            
        <li class="menu-divider hidden-xs">
            <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown menu-merge">
            <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                <img src="{{ asset('assets/img/avatars/1.jpg') }}" alt="avatar" class="mw30 br64">
                <span class="hidden-xs pl15"> Michael .R </span>
                <span class="caret caret-tp hidden-xs"></span>
            </a>
       
            <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">           
                <li class="list-group-item">
                <a href="#" class="animated animated-short fadeInUp">
                    <span class="fa fa-gear"></span> Settings </a>
                </li>
                <li class="dropdown-footer">
                <a href="#" class="">
                <span class="fa fa-power-off pr5"></span> Logout </a>
                </li>
            </ul>
        </li>
    </ul>
</header>

<aside id="sidebar_left" class="nano nano-light affix sidebar-light has-scrollbar">
    <div class="sidebar-left-content nano-content">
        <header class="sidebar-header">    
            <div class="sidebar-widget author-widget">
                <div class="media">
                <a class="media-left" href="#">
                    <img src="{{ asset('assets/img/avatars/3.jpg') }}" class="img-responsive">
                </a>
                <div class="media-body">
                    <div class="media-links">
                    <a href="pages_login(alt).html">Logout</a>
                    </div>
                    <div class="media-author">Michael Richards</div>
                </div>
                </div>
            </div>

            <div class="sidebar-widget menu-widget">
                <div class="row text-center mbn">
                <div class="col-xs-4">
                    <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <span class="glyphicon glyphicon-home"></span>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                    <span class="glyphicon glyphicon-inbox"></span>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                    <span class="glyphicon glyphicon-bell"></span>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                    <span class="fa fa-desktop"></span>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="fa fa-gears"></span>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                    <span class="fa fa-flask"></span>
                    </a>
                </div>
                </div>
            </div>
    
            <div class="sidebar-widget search-widget hidden">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                </div>
            </div>        
        </header>               

        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>                
            <li class="active">
                <a href="/content/6282114552152">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-label pt15">Content</li>
            <li>
                <a href="/content/6282114552152/list">
                    <span class="glyphicon glyphicon-play-circle"></span>
                    <span class="sidebar-title">Content</span>
                </a>
            </li>
            {{-- 
            <li>
                <a href="/content/6282114552152/images">
                    <span class="glyphicon glyphicon-picture"></span>
                    <span class="sidebar-title">Images</span>
                </a>
            </li>
            <li>
                <a href="/content/6282114552152/video/private">
                    <span class="glyphicon glyphicon-facetime-video"></span>
                    <span class="sidebar-title">Video Private</span>
                </a>
            </li>
            <li>
                <a href="/content/6282114552152/video/personal">
                    <span class="glyphicon glyphicon-facetime-video"></span>
                    <span class="sidebar-title">Video Personal</span>
                </a>
            </li>                
            --}}
        </ul>
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>    
    </div>
</aside>