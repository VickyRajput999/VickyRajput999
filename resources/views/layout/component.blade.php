<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrative Panel</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href='{{ asset('admin-assets/css/Inter-Font.css') }}'>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body class="hold-transition login-page bg-white sidebar-mini">

        @include('layout.header')
        @include('layout.sidebar')
        @yield('content')
        @include('layout.footer')





        <!-- jQuery -->
        <script src='{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}'></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
        <script src="{{ asset('admin-assets/js/demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <!-- Add these lines to include FullCalendar CSS and JS files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

        @yield('customJs')
        @yield('app.js')



        <script>
            var a = document.getElementById("blah");
            var photo = document.getElementById("photo3");

            function readUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = (e) => {
                        a.src = e.target.result;
                    };
                }
            }

            function removeImg() {
                a.src = "http://placehold.it/180";
                photo.value = "";
            }
        </script>
       <script>
        var resumePreview = document.getElementById("resumePreview");
        var resumePdfPreview = document.getElementById("resumePdfPreview");
        var resumeFileInput = document.getElementById("resumeFile");

        function readResume(input) {
            var file = input.files[0];

            if (file) {
                if (file.type.startsWith('image/')) {
                    // Display image preview
                    resumePreview.style.display = 'block';
                    resumePdfPreview.style.display = 'none';

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function (e) {
                        resumePreview.src = e.target.result;
                    };
                } else if (file.type === 'application/pdf') {
                    // Display PDF preview
                    resumePreview.style.display = 'none';
                    resumePdfPreview.style.display = 'block';
                    resumePdfPreview.src = URL.createObjectURL(file);
                } else {
                    // Unsupported file type
                    alert("Unsupported file type");
                    removeResume();
                }
            }
        }

        function removeResume() {
            resumePreview.src = "http://placehold.it/180";
            resumePdfPreview.src = "";
            resumeFileInput.value = "";
        }
    </script>
    <script>
        var c = document.getElementById("upload3");
        var photoc = document.getElementById("photoo");

        function readUrl3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = (e) => {
                    c.src = e.target.result;
                };
            }
        }

        function removeImg3() {
            c.src = "http://placehold.it/180";
            photoc.value = "";
        }
    </script>
    <script>
        var d = document.getElementById("upload4");
        var photoc = document.getElementById("photo4");

        function readUrl4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    d.src = e.target.result;
                };
            }
        }

        function removeImg4() {
            d.src = "http://placehold.it/180";
            document.getElementById("photo4").value = "";
        }
    </script>

        {{-- {!! Toastr::message() !!} --}}
    </body>
</html>
