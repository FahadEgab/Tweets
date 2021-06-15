<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">

    <title>الشكل الخارجي</title>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-lg-top navbar-light bg-light">
    <div class="container-fluid sticky-lg-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1>
            <a class="navbar-brand text-primary" href="#">تويتز</a>
            </h1>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03" dir="rtl">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('Tweets.index')}}">الصفحة الرئيسية</a>
                    </li>
                    @if(session()->exists('Id'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('User.edit',(session()->get('Id')))}}">صفحتي</a>
                    </li>
                   @endif
                </ul>
                <form class="d-flex" style="margin-right:20%; width: 30%;">
                    <input class="form-control me-2" type="search" placeholder="اكتب الهاشتاق" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">بحث</button>
                </form>
                <form class="d-flex me-auto">
                    @if(session()->exists('Id'))
                        <a href="{{route('User.signOut')}}" class="btn btn-outline-primary" >تسجيل الخروج</a>
                     @else
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#signUp">تسجيل
                            جديد</a>
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#signIn" style="margin-right: 10px;">تسجيل الدخول</a>

                    @endif
                </form>
            </div>

    </div>
</nav>

@yield('contents')




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script></body>
</html>
