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
</head>

<body class="hold-transition login-page bg-white sidebar-mini">
   
    
    @yield('content')
   

    

    
    <!-- jQuery -->
    <script src='{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}'></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script>
        function validatePhoneNumber() {
            // Get the input element
            var phoneInput = document.getElementById('phone');

            // Remove non-numeric characters
            var phoneNumber = phoneInput.value.replace(/\D/g, '');

            // Set the minimum and maximum length
            var minLength = 10;
            var maxLength = 12;

            // Check if the phone number is within the allowed range
            if (phoneNumber.length < minLength) {
                // If it's less than the minimum length, trim to the minimum length
                phoneInput.value = phoneNumber.slice(0, minLength);
            } else if (phoneNumber.length > maxLength) {
                // If it's more than the maximum length, trim to the maximum length
                phoneInput.value = phoneNumber.slice(0, maxLength);
            } else {
                // If it's within the allowed range, update the input value
                phoneInput.value = phoneNumber;
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('admin-assets/js/demo.js') }}"></script>
</body>

</html>
