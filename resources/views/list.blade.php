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
                        <a href="/content/UCOyIbnXLNQqiBj/list">Content</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="/content/dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="/content/dashboard">Home</a>
                    </li>
                    <li class="crumb-trail">Content</li>
                </ol>
                </div>            
            </header>
            
            <div id="content" class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check pr10"></i>
                            <strong>Well done!</strong> {{ session('message') }}.
                        </div>
                        @endif                       

                        <div class="panel">
                            <div class="panel-heading">
                            <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                                <li class="active">
                                    <a href="#tab2_2" data-toggle="tab">Video</a>
                                </li>
                                <li>
                                    <a href="#tab2_1" data-toggle="tab">Images</a>
                                </li>
                            </ul>
                            </div>
                            <div class="panel-body">
                            <div class="tab-content pn br-n">
                                <div id="tab2_1" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <section id="content" class="table-layout animated fadeIn">                
                                                <div class="tray tray-center">                                
                                                    <div class="mh15 pv15 br-b br-light">
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <div class="mix-controls ib">
                                                                    <form class="controls" id="select-filters">
                                                                    <!-- We can add an unlimited number of "filter groups" using the following format: -->
                                                                    <div class="btn-group ib mr10">
                                                                        <button type="button" class="btn btn-default hidden-xs">
                                                                        <span class="fa fa-folder"></span>
                                                                        </button>
                                                                        <div class="btn-group">
                                                                        <fieldset>
                                                                            <select id="filter1">
                                                                            <option value="">All Folders</option>
                                                                            <option value=".folder1">Publicity</option>
                                                                            <option value=".folder2">Spain Vacation</option>
                                                                            <option value=".folder3">Sony Demo</option>
                                                                            </select>
                                                                        </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="btn-group ib mr10">
                                                                        <button type="button" class="btn btn-default hidden-xs">
                                                                        <span class="fa fa-tag"></span>
                                                                        </button>
                                                                        <div class="btn-group">
                                                                        <fieldset>
                                                                            <select id="filter2">
                                                                            <option value="">All Labels</option>
                                                                            <option value=".label1">Work</option>
                                                                            <option value=".label3">Clients</option>
                                                                            <option value=".label2">Family</option>
                                                                            </select>
                                                                        </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>                                            
                                                            </div>
                                                            <div class="col-xs-5 text-right">
                                                            <button type="button" id="mix-reset" class="btn btn-default mr5">Clear Filters</button>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default to-grid">
                                                                <span class="fa fa-th"></span>
                                                                </button>
                                                                <button type="button" class="btn btn-default to-list">
                                                                <span class="fa fa-navicon"></span>
                                                                </button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="mix-controls hidden">
                                                            <form class="controls admin-form" id="checkbox-filters">
                                                            <!-- We can add an unlimited number of "filter groups" using the following format: -->
                                            
                                                            <fieldset class="">
                                                                <h4>Cars</h4>
                                            
                                                                <label class="option block mt10">
                                                                <input type="checkbox" value=".circle">
                                                                <span class="checkbox"></span>Circle
                                                                </label>
                                            
                                                            </fieldset>
                                            
                                                            <button id="mix-reset2">Clear All</button>
                                                            </form>
                                            
                                                        </div>
                                                    </div>                                          
                                                    <div id="mix-container">                                          
                                                        <div class="mix label1 folder1">
                                                            <div class="panel p6 pbn">
                                                            <div class="of-h">
                                                                <img src="{{ asset('assets/img/stock/1.jpg') }}" class="img-responsive" title="lost_typewritter.jpg') }}">
                                                                <div class="row table-layout">
                                                                <div class="col-xs-4 va-m pln">
                                                                    <h6>typewritter.jpg</h6>
                                                                </div>
                                                                <div class="col-xs-4 text-right va-m prn">
                                                                    <span class="fa fa-eye-slash fs12 text-muted"></span>
                                                                    <span class="fa fa-circle fs10 text-info ml10"></span>
                                                                </div>
                                                                </div>
                                                            </div>
                                            
                                                            </div>
                                                        </div>
                                            
                                                        <div class="mix label2 folder2">
                                                            <div class="panel p6 pbn">
                                                            <div class="of-h">
                                                                <img src="{{ asset('assets/img/stock/2.jpg') }}" class="img-responsive" title="stairs-to_soul.jpg') }}">
                                                                <div class="row table-layout">
                                                                <div class="col-xs-8 va-m pln">
                                                                    <h6>stairs-to_soul.jpg</h6>
                                                                </div>
                                                                <div class="col-xs-4 text-right va-m prn">
                                                                    <span class="fa fa-eye-slash fs12 text-muted"></span>
                                                                    <span class="fa fa-circle fs10 text-alert ml10"></span>
                                                                </div>
                                                                </div>
                                                            </div>
                                            
                                                            </div>
                                                        </div>
                                            
                                                        <div class="mix label3 folder3">
                                                            <div class="panel p6 pbn">
                                                            <div class="of-h">
                                                                <img src="{{ asset('assets/img/stock/3.jpg') }}" class="img-responsive" title="why_are_locks.jpg') }}">
                                                                <div class="row table-layout">
                                                                <div class="col-xs-8 va-m pln">
                                                                    <h6>why_are_locks.jpg</h6>
                                                                </div>
                                                                <div class="col-xs-4 text-right va-m prn">
                                                                    <span class="fa fa-eye-slash fs12 text-muted"></span>
                                                                    <span class="fa fa-circle fs10 text-danger ml10"></span>
                                                                </div>
                                                                </div>
                                                            </div>
                                            
                                                            </div>
                                                        </div>
                                            
                                                        <div class="mix label1 folder1">
                                                            <div class="panel p6 pbn">
                                                            <div class="of-h">
                                                                <img src="{{ asset('assets/img/stock/4.jpg') }}" class="img-responsive" title="cool_cup.jpg') }}">
                                                                <div class="row table-layout">
                                                                <div class="col-xs-8 va-m pln">
                                                                    <h6>cool_cup.jpg</h6>
                                                                </div>
                                                                <div class="col-xs-4 text-right va-m prn">
                                                                    <span class="fa fa-eye-slash fs12 text-muted"></span>
                                                                    <span class="fa fa-circle fs10 text-primary ml10"></span>
                                                                </div>
                                                                </div>
                                                            </div>
                                            
                                                            </div>
                                                        </div>                                 
                                            
                                                        <div class="gap"></div>
                                                        <div class="gap"></div>
                                                        <div class="gap"></div>
                                                        <div class="gap"></div>
                                          
                                                    </div>                                          
                                                </div>
                                          
                                                <aside class="tray tray-right tray320" data-tray-height="match">
                                        
                                                    <h4 class="tray-title"> Upload New Image </h4>
                                        
                                                    <!-- Image Upload Field -->
                                                    <div class="fileupload fileupload-new admin-form mt20" data-provides="fileupload">
                                                    <div class="section mb10">
                                                        <label for="name2" class="field prepend-icon">
                                                        <input type="text" name="name2" id="name2" class="event-name gui-input br-light light" placeholder="Title">
                                                        <label for="name2" class="field-icon">
                                                            <i class="fa fa-pencil"></i>
                                                        </label>
                                                        </label>
                                                    </div>
                                                    <div class="section mb10">
                                                        <label class="field prepend-icon">
                                                        <textarea class="gui-textarea br-light h-80 bg-light" id="comment" name="comment" placeholder="Description"></textarea>
                                                        <label for="comment" class="field-icon">
                                                            <i class="fa fa-comments"></i>
                                                        </label>
                                                        <span class="input-footer hidden">
                                                            <strong>Hint:</strong>Don't be negative or off topic! just be awesome...</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                        <span class="button btn-system btn-file btn-block ph5">
                                                            <span class="fileupload-new">Select image</span>
                                                            <span class="fileupload-exists">Change File</span>
                                                            <input type="file">
                                                        </span>
                                                        </div>
                                                        <div class="col-xs-8 pln">
                                                        <label for="name2" class="field prepend-icon">
                                                            <input type="text" name="name2" id="name2" class="event-name gui-input br-light bg-light" placeholder="Tags">
                                                            <label for="name2" class="field-icon">
                                                            <i class="fa fa-pencil"></i>
                                                            </label>
                                                        </label>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="fileupload-preview thumbnail m5 mt20 mb30">
                                                        <img data-src="holder.js/100%x140" alt="holder">
                                                    </div>
                                        
                                                    </div>
                                        
                                                    <!-- Labels Menu -->
                                                    <div class="list-group list-group-links">
                                                    <div class="list-group-header"> Labels </div>
                                                    <a href="#" class="list-group-item">
                                                        Clients
                                                        <span class="badge badge-info">6</span>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        Contractors
                                                        <span class="badge badge-success">8</span>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        Employees
                                                        <span class="badge badge-primary">11</span>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        Suppliers
                                                        <span class="badge badge-system">13</span>
                                                    </a>
                                                    </div>
                                        
                                                </aside>                                                
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab2_2" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <section id="content" class="table-layout animated fadeIn">
                
                                                <div id="content" class="animated fadeIn">
                                                    <div class="row">            
                                                        <div class="col-md-12">             
                                                            <div class="panel">
                                                                <div class="panel-heading">
                                                                    <span class="panel-title">Add Video URL</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <form action="/content/p_video" method="POST" class="form-horizontal" role="form">
                                                                    @csrf
                                                                        <div class="form-group has-system">
                                                                            <label class="col-lg-2 control-label" for="inputSystem">URL ID</label>
                                                                            <div class="col-lg-6">
                                                                                <span class="append-icon right">
                                                                                <i class="fa fa-video-camera"></i>
                                                                                </span>
                                                                                <input name="publish_url" type="text" class="form-control" id="inputSystem">
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <select name="content_type" class="form-control" id="inputSystem">
                                                                                    <option value="#">- Select -</option>
                                                                                    <option value="2">Private</option>
                                                                                    <option value="3">Personal</option>
                                                                                </select>
                                                                            </div>
                                                                            <input type="hidden" name="vendor_number" value="{{ Request::segment(2) }}">
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
                                                                        <span class="glyphicon glyphicon-tasks"></span>List Video</div>
                                                                </div>
                                                                <div class="panel-body pn">
                                                                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No.</th>
                                                                                <th>Video</th>
                                                                                <th></th>
                                                                                <th>Visibility</th>
                                                                                <th>Publish Date</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $no = 1; ?>
                                                                            @foreach($video as $key => $v)
                                                                            <?php $date = date_create($v->publish_date); ?>
                                                                            <tr>
                                                                                <td>{{ $no++ }}</td>
                                                                                <td>
                                                                                    <iframe width="150" height="100" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $v->publish_url }}" frameborder="0" allowfullscreen=""></iframe>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="btn-group" align="center">
                                                                                        <button type="button" class="btn btn-system light">
                                                                                            <i class="fa fa-pencil"></i>
                                                                                        </button>
                                                                                        <a href="/content/{{ Request::segment(2) }}/{{ $v->content_id }}/d_video" class="btn btn-system">
                                                                                            <i class="fa fa-trash-o"></i>
                                                                                        </a>
                                                                                        <button type="button" class="btn btn-system dark">
                                                                                            <i class="fa fa-share"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    @if($v->type == "Private")
                                                                                        <span class="fa fa-eye-slash"></span>&nbsp;Private
                                                                                    @else
                                                                                        <span class="fa fa-eye" style="color:blue"></span>&nbsp;Personal
                                                                                    @endif
                                                                                    
                                                                                </td>
                                                                                <td>{{ date_format($date, 'd M Y') }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>           
                                                    </div>  
                                                </div>                
                                                
                                            </section>

                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>            
            
            {{-- footer --}}
            @include('layouts.footer')
        </section>        
    
    </div>  
@endsection