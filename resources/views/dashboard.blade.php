@extends('layouts.app')

@section('content')
<body class="dashboard-page sb-l-o sb-r-c onload-check">
    
    {{-- skin toolbox --}}
    @include('layouts.skin')

    <div id="main">
        {{-- header and menu --}}
        @include('layouts.header_menu')

        <section id="content_wrapper">   
           
            <header id="topbar" class="alt">
                <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                    <a href="/content/dashboard">Dashboard</a>
                    </li>
                    <li class="crumb-icon">
                    <a href="/content/dashboard">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                    </li>
                    <li class="crumb-link">
                    <a href="/content/dashboard">Home</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                </ol>
                </div>            
            </header>
         
            <section id="content" class="table-layout animated fadeIn">
                <div class="tray tray-center">
                    <div class="row">
                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                <h1 class="fs30 mt5 mbn">1,426</h1>
                                <h6 class="text-system">IMAGES</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                <span class="fs11">
                                    <i class="fa fa-arrow-up pr5"></i> 3% INCREASE
                                    <b>1W AGO</b>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                <h1 class="fs30 mt5 mbn">662</h1>
                                <h6 class="text-success">VIDEO PRIVATE</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                <span class="fs11">
                                    <i class="fa fa-arrow-up pr5"></i> 2.7% INCREASE
                                    <b>1W AGO</b>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xl-3">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                <h1 class="fs30 mt5 mbn">62,248</h1>
                                <h6 class="text-warning">VIDEO PERSONAL</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                <span class="fs11">
                                    <i class="fa fa-arrow-up pr5 text-success"></i> 1% INCREASE
                                    <b>1W AGO</b>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xl-3 visible-xl">
                            <div class="panel panel-tile text-center br-a br-grey">
                                <div class="panel-body">
                                <h1 class="fs30 mt5 mbn">6,718</h1>
                                <h6 class="text-danger">CLIENT</h6>
                                </div>
                                <div class="panel-footer br-t p12">
                                <span class="fs11">
                                    <i class="fa fa-arrow-down pr5 text-danger"></i> 6% DECREASE
                                    <b>1W AGO</b>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>                
            </section>
          
            {{-- footer --}}
            @include('layouts.footer')
        </section>        
    
      </div>
@endsection