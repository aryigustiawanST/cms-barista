<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>CMS Barista</title>
    <meta name="keywords" content="Bootstrap 3 Admin Dashboard Template Theme" />
    <meta name="description" content="CMS Barista">
    <meta name="author" content="Aryi Gustiawan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/plugins/dropzone/css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/magnific/magnific-popup.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
</head>

    @yield('content')     
    
    <script src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>

    <!-- Datatables ColReorder addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>

    <script src="{{ asset('vendor/plugins/mixitup/jquery.mixitup.min.js') }}"></script>

    <script src="{{ asset('vendor/plugins/magnific/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('vendor/plugins/fileupload/fileupload.js') }}"></script>
    <script src="{{ asset('vendor/plugins/holder/holder.min.js') }}"></script>

    <script src="{{ asset('vendor/plugins/dropzone/dropzone.min.js') }}"></script>

    <!-- CanvasBG Plugin(creates mousehover effect) -->
    <script src="{{ asset('vendor/plugins/canvasbg/canvasbg.js') }}"></script>

    <!-- Theme Javascript -->
    <script src="{{ asset('assets/js/utility/utility.js') }}"></script>
    <script src="{{ asset('assets/js/demo/demo.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/demo/widgets.js') }}"></script>
  
    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core
            Core.init();

            // Init Demo JS
            Demo.init();           

            // Init DataTables
            $('#datatable').dataTable({
                "sDom": 't<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "<?php echo asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?>"
                }
            });
            $('#datatable2').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "<?php echo asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?>"
                }
            });

            // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Enter Terms...");

            var dropdownFilter = {

                // Declare any variables we will need as properties of the object
                $filters: null,
                $reset: null,
                groups: [],
                outputArray: [],
                outputString: '',

                // The "init" method will run on document ready and cache any jQuery objects we will need.
                init: function() {
                    var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "dropdownFilter" object so that we can share methods and properties between all parts of the object.

                    self.$filters = $('#select-filters');
                    self.$reset = $('#mix-reset');
                    self.$container = $('#mix-container');

                    self.$filters.find('fieldset').each(function() {
                        self.groups.push({
                        $dropdown: $(this).find('select'),
                        active: ''
                        });
                    });

                    self.bindHandlers();
                },

                // The "bindHandlers" method will listen for whenever a select is changed.
                bindHandlers: function() {
                    var self = this;

                    // Handle select change
                    self.$filters.on('change', 'select', function(e) {
                        e.preventDefault();

                        self.parseFilters();
                    });

                    // Handle reset click
                    self.$reset.on('click', function(e) {
                        e.preventDefault();

                        self.$filters.find('select').val('');

                        self.parseFilters();
                    });
                },

                // The parseFilters method pulls the value of each active select option
                parseFilters: function() {
                var self = this;

                // loop through each filter group and grap the value from each one.
                for (var i = 0, group; group = self.groups[i]; i++) {
                    group.active = group.$dropdown.val();
                }

                self.concatenate();
                },

                // The "concatenate" method will crawl through each group, concatenating filters as desired:
                concatenate: function() {
                    var self = this;

                    self.outputString = ''; // Reset output string

                    for (var i = 0, group; group = self.groups[i]; i++) {
                        self.outputString += group.active;
                    }

                    // If the output string is empty, show all rather than none:
                    !self.outputString.length && (self.outputString = 'all');

                    //console.log(self.outputString);
                    // ^ we can check the console here to take a look at the filter string that is produced

                    // Send the output string to MixItUp via the 'filter' method:
                    if (self.$container.mixItUp('isLoaded')) {
                        self.$container.mixItUp('filter', self.outputString);
                    }
                }
            };

                // To keep our code clean and modular, all custom functionality will be contained inside a single object literal called "checkboxFilter".
            var checkboxFilter = {

                // Declare any variables we will need as properties of the object
                $filters: null,
                $reset: null,
                groups: [],
                outputArray: [],
                outputString: '',

                // The "init" method will run on document ready and cache any jQuery objects we will need.
                init: function() {
                    var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "checkboxFilter" object so that we can share methods and properties between all parts of the object.

                    self.$filters = $('#checkbox-filters');
                    self.$reset = $('#mix-reset2');
                    self.$container = $('#mix-container');

                    self.$filters.find('fieldset').each(function() {
                        self.groups.push({
                        $inputs: $(this).find('input'),
                        active: [],
                        tracker: false
                        });
                    });

                    self.bindHandlers();
                },

                // The "bindHandlers" method will listen for whenever a form value changes.
                bindHandlers: function() {
                    var self = this;

                    self.$filters.on('change', function() {
                        self.parseFilters();
                    });

                    self.$reset.on('click', function(e) {
                        e.preventDefault();
                        self.$filters[0].reset();
                        self.parseFilters();
                    });
                },

                // The parseFilters method checks which filters are active in each group:
                parseFilters: function() {
                    var self = this;

                    // loop through each filter group and add active filters to arrays
                    for (var i = 0, group; group = self.groups[i]; i++) {
                        group.active = []; // reset arrays
                        group.$inputs.each(function() {
                        $(this).is(':checked') && group.active.push(this.value);
                        });
                        group.active.length && (group.tracker = 0);
                    }

                    self.concatenate();
                },

                // The "concatenate" method will crawl through each group, concatenating filters as desired:
                concatenate: function() {
                    var self = this,
                        cache = '',
                        crawled = false,
                        checkTrackers = function() {
                        var done = 0;

                        for (var i = 0, group; group = self.groups[i]; i++) {
                            (group.tracker === false) && done++;
                        }

                        return (done < self.groups.length);
                        },
                        crawl = function() {
                        for (var i = 0, group; group = self.groups[i]; i++) {
                            group.active[group.tracker] && (cache += group.active[group.tracker]);

                            if (i === self.groups.length - 1) {
                            self.outputArray.push(cache);
                            cache = '';
                            updateTrackers();
                            }
                        }
                        },
                        updateTrackers = function() {
                        for (var i = self.groups.length - 1; i > -1; i--) {
                            var group = self.groups[i];

                            if (group.active[group.tracker + 1]) {
                            group.tracker++;
                            break;
                            } else if (i > 0) {
                            group.tracker && (group.tracker = 0);
                            } else {
                            crawled = true;
                            }
                        }
                        };

                    self.outputArray = []; // reset output array

                    do {
                        crawl();
                    }
                    while (!crawled && checkTrackers());

                    self.outputString = self.outputArray.join();

                    // If the output string is empty, show all rather than none:
                    !self.outputString.length && (self.outputString = 'all');

                    //console.log(self.outputString);
                    // ^ we can check the console here to take a look at the filter string that is produced

                    // Send the output string to MixItUp via the 'filter' method:
                    if (self.$container.mixItUp('isLoaded')) {
                        self.$container.mixItUp('filter', self.outputString);
                    }
                }
            };

            // Init multiselect plugin on filter dropdowns
            $('#filter1').multiselect({
                buttonClass: 'btn btn-default',
            });
            $('#filter2').multiselect({
                buttonClass: 'btn btn-default',
            });

            // Init checkboxFilter code
            checkboxFilter.init();

            // Init dropdownFilter code
            dropdownFilter.init();

            var $container = $('#mix-container'), // mixitup container
            $toList = $('.to-list'), // list view button
            $toGrid = $('.to-grid'); // list view button

            // Instantiate MixItUp
            $container.mixItUp({
                controls: {
                    enable: false // we won't be needing these
                },
                animation: {
                    duration: 400,
                    effects: 'fade translateZ(-360px) stagger(45ms)',
                    easing: 'ease'
                },
                callbacks: {
                    onMixFail: function() {}
                }
            });

            $toList.on('click', function() {
                if ($container.hasClass('list')) {
                    return
                }
                $container.mixItUp('changeLayout', {
                    display: 'block',
                    containerClass: 'list'
                }, function(state) {
                    // callback function
                });
            });
            $toGrid.on('click', function() {
                if ($container.hasClass('grid')) {
                    return
                }
                $container.mixItUp('changeLayout', {
                    display: 'inline-block',
                    containerClass: 'grid'
                }, function(state) {
                    // callback function
                });
            });

            // Add Gallery Item to Lightbox
            $('.mix img').magnificPopup({
                type: 'image',
                callbacks: {
                    beforeOpen: function(e) {
                    // we add a class to body to indicate overlay is active
                    // We can use this to alter any elements such as form popups
                    // that need a higher z-index to properly display in overlays
                    $('body').addClass('mfp-bg-open');

                    // Set Magnific Animation
                    this.st.mainClass = 'mfp-zoomIn';

                    // Inform content container there is an animation
                    this.contentContainer.addClass('mfp-with-anim');
                    },
                    afterClose: function(e) {

                    setTimeout(function() {
                        $('body').removeClass('mfp-bg-open');
                        $(window).trigger('resize');
                    }, 1000)

                    },
                    elementParse: function(item) {
                    // Function will fire for each target element
                    // "item.el" is a target DOM element (if present)
                    // "item.src" is a source that you may modify
                    item.src = item.el.attr('src');
                    },
                },
                overflowY: 'scroll',
                removalDelay: 200, //delay removal by X to allow out-animation
                prependTo: $('#content_wrapper')
            });

        });
    </script>
</body>
</html>
