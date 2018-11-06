<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Internsvalley's Tasks - PHP Backend Developer Application </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/stylish-portfolio.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a class="js-scroll-trigger" href="#task">The Task</a>
        </li>

        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#notes">Further Notes</a>
        </li>

    </ul>
</nav>

<!-- Header -->
<header class="masthead d-flex" id="task">
    <div class="container text-center my-auto">
        <h1 class="mb-1">Internsvalley's Task </h1>
        <h3 class="mb-4">
            <em>PHP Backend Developer Application</em>
        </h3>
        <hr/>
        <h3 class="mb-5">
            <em>The Simple Task</em>
        </h3>
        <a class="btn  btn-xl border border-primary rounded-circle js-scroll-trigger" href="{{route('simple-task.dom.a')}}">(#A) Using DOMDocument</a>
        <a class="btn btn-xl border border-primary rounded-circle js-scroll-trigger" href="{{route('simple-task.dom.b')}}">(#B) Using DOMDocument</a>
        <a class="btn btn-xl border border-primary rounded-circle js-scroll-trigger" href="{{route('simple-task.dom.c')}}">(#C) Using DOMDocument</a>
        <br/>

        <a class="btn btn-xl border border-primary rounded-circle js-scroll-trigger" href="{{route('simple-task.curl.a')}}">(#A) Using CURL</a>
        <a class="btn btn-xl border border-primary rounded-circle js-scroll-trigger" href="{{route('simple-task.curl.b')}}">(#B) Using CURL</a>
        <a class="btn btn-xl border border-primary rounded-circle js-scroll-trigger" href="{{route('simple-task.curl.c')}}">(#C) Using CURL</a>
        <br/><hr/><br/>
        </div>
    <div class="overlay"></div>
</header>

<!-- Services -->
<section class="content-section bg-primary text-white text-center" id="notes">
    <div class="container">
        <div class="content-section-heading">
            <h3 class="text-secondary mb-0">Further</h3>
            <h2 class="mb-5">Notes</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-12 mb-lg-0">
                <h3>The Task</h3><br/>
                <p>Each Action, Controller, ..etc has its specified inline documentation.<br/>
                    Regular Expressions has been tested manually using <a href="https://regexr.com/" style="color: #ec971f">https://regexr.com</a><br/>
                </p>

                <p>By Following The SOLID Principles as well as I could, I manged the flow of the process as follow:</p>
                <br/>
                <img src="{{asset('images/chart.png')}}">
                <hr/>
                <br/><hr/><br/>
                <h3>The Advanced Task</h3><br/>
                I managed to solve both task A and B, but I didn't manage to exceed the bot protection thing, although I tried to install free proxy library to bypass the protection, but I didn'tuse it properly I believe.
                So I stucked on this stage, to run the code of this task,<br/>
                following urls doesn't work properly
                <br/><hr/><br/>
                <a class="btn btn-warning btn-xl border border-warning rounded-circle js-scroll-trigger" href="{{route('advanced-task.dom.a')}}">(#A) Using DOMDocument</a>
                <a class="btn btn-warning btn-xl border border-warning rounded-circle js-scroll-trigger" href="{{route('advanced-task.dom.b')}}">(#B) Using DOMDocument</a>
                <br/>

                <a class="btn btn-warning btn-xl border border-warning rounded-circle js-scroll-trigger" href="{{route('advanced-task.curl.a')}}">(#A) Using CURL</a>
                <a class="btn btn-warning btn-xl border border-warning rounded-circle js-scroll-trigger" href="{{route('advanced-task.curl.b')}}">(#B) Using CURL</a>

            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <b>GitHub Task Repository<br/></b>
        <ul class="list-inline mb-5">
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white" href="#">
                    <i class="icon-social-github"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('assets/js/stylish-portfolio.min.js')}}"></script>

</body>

</html>