<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Uncle - Equipments Selling</title>
    @include('layouts.css-new')
</head>
<body>
    <div class="cv-main-wrapper">
        @include('layouts.top-header')
        @include('layouts.main-header')
            @yield('content')
        @include('layouts.footer')
        @include('index.login')
	@include('index.sign-up')
        @include('layouts.js-new')
    </div>
</body>
</html>
