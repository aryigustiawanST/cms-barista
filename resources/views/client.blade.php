@extends('layouts.app')

@section('content')
<body class="external-page external-alt sb-l-c sb-r-c">

    <div id="main" class="animated fadeIn" align="center">
        <section id="content_wrapper">

            <section id="content">
    
                <div class="theme-primary mw600" style="margin-top: 3%;text-align: center">
    
                    <div class="row table-layout">
                    <a href="#" title="Return to Dashboard">
                        <img src="{{ asset('assets/img/logos/logo_white_barista.png') }}" title="AdminDesigns Logo" class="center-block img-responsive" style="max-width: 275px;">
                    </a>
                    </div>
        
                    <div class="panel mt40">   
                        
                        @if (session('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check pr10"></i>
                            {{ session('message') }}.
                        </div>
                        @endif   

                        <form action="/register/p_client" method="POST">
                        @csrf
                            <div class="panel-body bg-light p25 pb15">                            
                                <div class="section row">
                                    <div class="col-md-12">
                                        <label for="costumer_name" class="field prepend-icon">
                                            <input type="text" name="costumer_name" id="costumer_name" class="gui-input" placeholder="Nama Lengkap" required>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12">
                                        <label for="costumer_phone" class="field prepend-icon">
                                            <input type="text" name="costumer_phone" id="costumer_phone" class="gui-input" placeholder="Ex: 6281122233344" required>
                                        </label>
                                    </div>
                                </div>

                                <input type="hidden" name="vendorid" value="{{ Request::segment(2) }}">
                                <button class="button btn-primary" type="submit">Daftar</button>
                            </div>            
                        </form>
                    </div>
        
                </div>
    
            </section>
            <!-- End: Content -->
    
        </section>
    </div>
   
@endsection