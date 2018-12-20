<!DOCTYPE html>
<html lang='en'>

<head>
    <title>2019 Wishes</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/WeldStyles.css"/>
    <link rel="stylesheet" href="css/Styles.css">
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
                <li>world wishes</li>
                <li>my wishes</li>
            </ul>
        </a>

        <img src="/images/2019.png" alt="19">
    </nav>

</header>

<div id="content">

    <main>

        @yield('content')

    </main>

</div>

<footer>
    Copyright &copy; {{ date('Y') }} by 2019 Wishes
    All Rights Reserved
</footer>

</body>

</html>