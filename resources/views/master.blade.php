<!DOCTYPE html>
<html lang='en'>

<head>
    <title>2019 Wishes</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="/css/WeldStyles.css"/>
    <link rel="stylesheet" href="/css/Styles.css">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    @stack('head')
</head>

<body>
<header>

    <span tabindex="0" class="hamburger"> <img src="/images/menu.svg" alt="menu"></span>

    <nav class="move">

        <a name="menuham">
            <ul>
                <li>wishes!</li>
            </ul>
        </a>

        <a href='/'><img src="/images/2019.png" alt="19"></a>
    </nav>

</header>

<div id="content">

    <main>

        <div class="bandeau" style="background-image:url(/images/cover19.jpg)">
            <h1 class="white">Wishes 2019</h1>
            <p class="white">Every year we make new resolutions - to be fitter, better, kinder - what about making
                resolutions for the world? From the serious to the ludicrous, we invite you to imagine 2019's
                resolutions.</p>
        </div>


        <div class="row">
            <div class="card-dark col-span-2-6 no-shadow no-margin">
                @yield('form')
            </div>


            <div class="card-primary col-span-4-6 no-shadow no-margin">
                @yield('wishes')
            </div>

    </main>

</div>

<footer>
    Copyright &copy; {{ date('Y') }} by 2019 Wishes
    All Rights Reserved
</footer>

</body>

</html>