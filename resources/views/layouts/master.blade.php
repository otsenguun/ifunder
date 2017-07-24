<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iFund</title>
  <!-- Bootstrap core CSS -->
        <link href="{{asset('css/our_style.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" type="text/css" href="{{asset('assets/theme/css/fonts.css')}}" />
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/theme/css/font-awesome.css')}}" />
        <!-- Style CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/theme/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('admin_assets/css/sweetalert.css')}}">
        <!-- Responsive/Mobile CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/theme/css/responsive.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/swiper.min.css')}}">
    </head>
    <body>

         @yield('content')

    </body>
    <script type='text/javascript' src='{{asset('assets/theme/js/jquery.js')}}'></script>
    <script src="http://23.94.123.238/public/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/piexif.min.js')}}" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
         This must be loaded before fileinput.min.js -->
    <script src="{{asset('assets/js/sortable.min.js')}}" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
         This must be loaded before fileinput.min.js -->
    <script src="{{asset('assets/js/purify.min.js')}}" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <script src="{{asset('assets/js/fileinput.min.js')}}"></script>

    <script type='text/javascript' src='{{asset('assets/theme/js/jquery.sticky.js')}}'></script>
    <!-- Plugins jQuery Library -->
    <script type='text/javascript' src='{{asset('assets/theme/js/jquery.plugins.js')}}'></script>
    <!-- Skrl.Sar jQuery Library -->
    <script type='text/javascript' src='{{asset('assets/theme/js/skrl.Sar.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/theme/js/jquery.custom.js')}}'></script>
<script type="text/javascript" src="{{asset('assets/js/swiper.min.js')}}"></script>
<script type="application/javascript" src="{{asset('admin_assets/css/sweetalert.min.js')}}"></script>
    <script>
        var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
<script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 6,
            paginationClickable: true,
            spaceBetween: 30
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '#delete-btn', function(e) {
            
            e.preventDefault();
            var self = $(this);
            swal({
                    title: "Are you sure?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        swal("Deleted!","Category and all sub categories deleted", "success");
                        setTimeout(function() {
                            self.parents(".delete_form").submit();
                        }, 1000);
                    }
                    else{
                        swal("cancelled","Your categories are safe", "error");
                    }
                });
        });
    </script>
</html>
