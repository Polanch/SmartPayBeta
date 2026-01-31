<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMARTPAY</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/main_style.css')
</head>
<body>
    <div class="logo-container">
        <img src="/images/smartpay_logo.png" alt="logo" id="logo-image">
        <h1>SMARTPAY</h1>
        <button class="menu-btn">&#9776;</button>
        <a href="/student/logout">Log out</a>
    </div>
    <div class="top-nav">
        <img src="/images/smartpay_logo.png" alt="" id="biglogo">
        <ul class="menu">
            <li><button><img src="/images/menu1.png" class="menu-icn">HOME</button></li>
            <li><button><img src="/images/menu3.png" class="menu-icn">CREDIT</button></li>
            <li><button><img src="/images/menu2.png" class="menu-icn">TRANSACTIONS</button></li>
            <li><button><img src="/images/menu5.png" class="menu-icn">SETTINGS</button></li>
            <li><button><img src="/images/logout.png" class="menu-icn">LOG OUT</button></li>
        </ul>
        <p class="hidden-when-mobile">All Rights Reserved &#xA9;</p>
    </div>
    @yield('content')

    @vite('resources/js/main_script.js')
</body>
</html>