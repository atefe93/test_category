<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>داشبورد</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/panel/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/panel/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/panel/css/style.min.css" rel="stylesheet">
    <link href="/panel/css/style.css" rel="stylesheet">

    @yield('extraCSS')
    <style>
        .dropdown-menu {
            background-color: #39539c;
        }

        .list-group a:hover {
            color: white !important;
        }

        .list-group-item-action:focus, .list-group-item-action:hover {
            background-color: #ffffff2e !important;
        }

        .list-group-item * {
            color: white !important;
        }

    </style>
</head>
<body class="grey lighten-3">
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h6 class="col-md-7 text-secondary">داشبورد </h6>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link waves-effect" href="/">صفحه اصلی
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="sidebar-fixed position-fixed rgba-stylish-strong ">
        <div class="mask rgba-stylish-strong-red ">
            <a class="logo-wrapper waves-effect logo" href="#" target="_blank" style="padding: 10px;">

            </a>
            <a href="/" class="list-group-item list-group-item-action waves-effect  ">
                صفحه اصلی
            </a>

            <li class="dropdown list-group-item list-group-item-action ">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="true"> <span class="nav-label">دسته بندی</span> <span
                        class="caret"></span></a>
                <ul class="dropdown-menu ">

                    <li><a href="{{ route('admin.categories.create') }}"
                           class="list-group-item list-group-item-action waves-effect  ">
                            ثبت دسته بندی </a></li>

                    <li><a href="{{ route('admin.categories.index') }}"
                           class="list-group-item list-group-item-action waves-effect  ">
                            مشاهده دسته بندی ها</a></li>

                </ul>
            </li>


            <a href="{{url('logout')}}" class="list-group-item list-group-item-action waves-effect">
                خروج
            </a>
        </div>
    </div>
</header>
<main class="pt-5 mx-lg-5">
    <br/>
    @yield('content')
</main>


<!-- JQuery -->
<script src="/panel/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/panel/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/panel/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/panel/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

</script>

@yield('extraJS')
</body>
</html>
