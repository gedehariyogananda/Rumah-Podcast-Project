<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authenticate Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @stack('styling')
    <link href="https://th.bing.com/th/id/OIP.0dOQEbSazsRb9W_AdJuV6gHaFT?rs=1&pid=ImgDetMain" rel="icon"
        type="image/png">
</head>

<body>

    @yield('content')

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            showConfirmButton: true,
            timer: 2000
        });
    </script>
    @endif
</body>

</html>