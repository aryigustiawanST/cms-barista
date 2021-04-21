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
                        <a href="/content/images">Images</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="/content/dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="/content/dashboard">Home</a>
                    </li>
                    <li class="crumb-trail">Images</li>
                </ol>
                </div>            
            </header>
         
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
          
                        <div class="fail-message">
                            <span>No items were found matching the selected filters</span>
                        </div>
            
                        <div class="mix label1 folder1">
                            <div class="panel p6 pbn">
                            <div class="of-h">
                                <img src="{{ asset('assets/img/stock/1.jpg') }}" class="img-responsive" title="lost_typewritter.jpg') }}">
                                <div class="row table-layout">
                                <div class="col-xs-8 va-m pln">
                                    <h6>lost_typewritter.jpg</h6>
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
            
            
            {{-- footer --}}
            @include('layouts.footer')
        </section>        
    
    </div>
@endsection