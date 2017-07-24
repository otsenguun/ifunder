<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/skins/_all-skins.min.css') }}">
     <link rel="stylesheet" href="{{asset('admin_assets/css/sweetalert.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/summernote/summernote.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link href="{{ asset('admin_assets/fileinput/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @yield('content')
    </div>

    <script src="{{ asset('admin_assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('admin_assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('admin_assets/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin_assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin_assets/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('admin_assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('admin_assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_assets/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin_assets/summernote/summernote.js') }}" ></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_assets/dist/js/app.min.js') }}"></script>

    <script src="{{ asset('admin_assets/dist/js/demo.js') }}"></script>

    <script src="{{ asset('admin_assets/fileinput/fileinput.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('admin_assets/dropzone/dropzone.js') }}"></script>
      <script type="application/javascript" src="{{asset('admin_assets/css/sweetalert.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:'300px',
                placeholder: 'Энд зураг оруулна уу'
            });
        });
         $(document).ready(function() {
            $('#summernote1').summernote({
                height:'300px',
                placeholder: 'Энд зураг оруулна уу'
            });
        });
        $('#clear').on('click',function () {
            $('#summernote').summernote('code',null);
        });

    </script>
    <script>
        $("#input-ke-1").fileinput({
            theme: "explorer",
            uploadUrl: "/file-upload-batch/2",
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [

            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "/site/file-delete", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "/site/file-delete", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "/site/file-delete", key: 3},
            ]
        });
        $(document).ready(function($){
            $('#category').change(function(){
                $.get($(this).data('url'), {
                        option: $(this).val()
                    },
                    function(data) {
                        var subcat = $('#sub_category');
                        subcat.empty();
                        $.each(data, function(index, element) {
                            subcat.append("<option value='"+ element.id +"'>" + element.category + "</option>");
                        });
                    });
            });
        });
    </script>
    <script>

        Dropzone.options.addProductImages = {
            paramName: 'photo',
            maxFilesize: 2,
            maxFiles: 12,
            acceptedFiles: '.jpg, .jpeg, .png'
        }

    </script>
    <script>
        if(!$('#image_row').length){
            $('#gallery').hide();
        }
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
    
    <script type="text/javascript">
        $(document).on('click', '#delete-btn1', function(e) {
            e.preventDefault();
            var self = $(this);
            swal({
                    title: "Are you sure delete this user?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        swal("Deleted!","this user has deleted", "success");
                        setTimeout(function() {
                            self.parents(".delete_form").submit();
                        }, 1000);
                    }
                    else{
                        swal("cancelled","Your user are safe", "error");
                    }
                });
        });
    </script>
</body>
</html>
