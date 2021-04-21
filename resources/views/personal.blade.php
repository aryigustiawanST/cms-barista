@extends('layouts.app')

@section('content')
<body class="gallery-page">
    
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
                        <a href="/content/video/share">Video</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="/content/dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="/content/dashboard">Home</a>
                    </li>
                    <li class="crumb-trail">Video</li>
                </ol>
                </div>            
            </header>
         
            <section id="content" class="table-layout animated fadeIn">
                
                <div id="content" class="animated fadeIn">
                    <div class="row">            
                        <div class="col-md-12">             
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Form Add URL</span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group has-system">
                                            <label class="col-lg-2 control-label" for="inputSystem">URL ID</label>
                                            <div class="col-lg-8">
                                                <span class="append-icon right">
                                                <i class="fa fa-video-camera"></i>
                                                </span>
                                                <input type="text" class="form-control" id="inputSystem">
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-system btn-block">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-visible" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-tasks"></span>Video Premium</div>
                                </div>
                                <div class="panel-body pn">
                                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>URL</th>
                                                <th>Publish Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            {{-- @foreach($premium as $key => $p)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $p->publish_url }}</td>
                                                <td>{{ $p->publish_date }}</td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            @endforeach  --}}
                                        </tbody>
                                    </table>
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