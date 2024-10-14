<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDAM Tirta Raharja</title>
    <link rel="icon" href="/img/tirta.png">

    <!-- import css custome file -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/home.css">


</head>

<body>

    <!-- header section starts -->
    <header class="header">

        <div id="menu-btn" class="fa-solid fa-bars"></div>

        <a href="/home" class="logo"><img style="width: 45px;" src="<?php echo url('/');?>/img/tirta.png" alt=""><span>PDAM</span></a>

        <!-- login button -->
        <div id="login-btn">
            {{-- <button type="button" class="btn">login</button> --}}
            <i class="fa-regular fa-user"></i>
        </div>

    </header>
        @yield('content')
    <!-- font awsome link -->
    <script src="https://kit.fontawesome.com/ca9a6c5a17.js" crossorigin="anonymous"></script>

</body>

</html>