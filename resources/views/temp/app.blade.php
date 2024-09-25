<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-scheme="navy" style="font-size: 17px;">
<head>
    @include('temp.css')
</head>

<body class="out-quart">

    <div id="root" class="root mn--max tm--expanded-hd">
        @yield('contents')
        @include('temp.sidebar')
    </div>

    <div class="scroll-container">
        <a href="#root" class="scroll-page ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>
    @include('temp.js')
</body>
</html>
