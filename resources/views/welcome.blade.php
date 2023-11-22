<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Сервис для составление Родового древо и для генерации книги rodovayakniga.ru</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('web/css/citata.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
</head>

<body id="body">

<div id="preloader">
    <div class="book">
        <div class="book__page"></div>
        <div class="book__page"></div>
        <div class="book__page"></div>
    </div>
</div>

<div class="navbar-default navbar-fixed-top" id="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img
                    class="logo-1"
                    src="{{ asset('web/images/logo/vector/default-monochrome.svg') }}"
                    alt="LOGO"
                    height="87px"
                    width="100px" />
                <img
                    class="logo-2"
                    src="{{ asset('web/images/logo/vector/default-monochrome.svg') }}"
                    alt="LOGO"
                    height="87px"
                    width="100px" />
            </a>
        </div>

        <nav class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right" id="top-nav">
                <li class="current"><a href="#body">Главное</a></li>
                <li><a href="#about">О сервисе</a></li>
                <li><a href="#command">Команда</a></li>
                <li><a href="#">Блог</a></li>
{{--                @if (Route::has('login'))--}}
{{--                    @auth--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/home') }}">Приложение</a>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                |--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('login') }}">Вход</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('register') }}">Регистрация</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                @endif--}}
            </ul>
        </nav>
    </div>
</div>

<section id="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <h1 class="wow fadeInDown">Онлайн сервис для составления Родового древа</h1>
                    <p class="wow fadeInDown" data-wow-delay="0.3s">
                        <span class="q">Народ, не знающий своего прошлого, не имеет будущего.</span>
                        <br />
                        М.В.Ломоносов
                    </p>
                    <div class="wow fadeInDown" data-wow-delay="0.3s">
{{--                        <a class="btn btn-default btn-home" href="{{ route('home') }}">--}}
{{--                            Начать--}}
{{--                        </a>--}}
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>rodovayakniga.ru</strong> Онлайн-сервис для составления РОДового Древа в разработке и скоро будет доступно :)
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow zoomIn">
                <div class="block">
                    <div class="counter">
                        <img src="{{ asset('web/images/family.jpg') }}" alt="" class="img-thumbnail">
{{--                        <p>--}}
{{--                            Изображение от <a href="https://ru.freepik.com/free-photo/close-up-smiley-people-posing-together_16688975.htm#query=family&from_query=famaly&position=20&from_view=search&track=sph">Freepik</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 wow fadeInLeft">
                <div class="sub-heading">
                    <h3>
                        О сервисе
                    </h3>
                </div>
                <div class="block">
                    <p>Наверное многим было интересно прошлое своего рода, история собственной семьи. Нам
                        рассказывали истории о наших предках, мы слушали их и восхищались. Каждого из нас посещала
                        мысль о том, кем же являлись наши предки, к какому сословию они относились, может, они были
                        крестьянами, или же дворянами. Что ж, наш сайт поможет вам узнать что то новое о вашем роде,
                        может, даже найти кого-нибудь из ваших дальних родственников. Наш сайт также поможет вам
                        составить Родовое древо.
                    </p>
                    <div class="sub-heading">
                        <h3>
                            Зачем нужно Родовое древо?
                        </h3>
                    </div>
                    <p>
                        Создание семейного дерева трудоёмкий и увлекательный процесс, который поддерживает
                        интерес людей к истории своего рода, ведь семья - основа в жизни человека. Изучая своё Родовое
                        древо человек духовно развивается, укрепляет семью, с уважением относится к своим родным и к
                        своей родословной. «Неуважение к предкам есть первый признак дикости и безнравственности»,
                        — писал Александр Сергеевич Пушкин. Изучая историю своего рода, человек ощущает себя частью
                        чего то большого и важного.
                    </p>
                    <br />
                    <p>
                        Ваши данные не будут доступны другим пользователям. Если вы подходите под описание
                        людей, которых ищут другие пользователи, вам придет запрос об этом. Вы можете принять или
                        отклонить этот запрос. Приняв запрос, этот пользователь сможет просмотреть ваши данные.
                    </p>

                    <div class="sub-heading">
                        <h3>
                            Как возникла это идея?
                        </h3>

                        <p>
                            ...
                        </p>
                    </div>


                </div>
            </div>
            <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="sub-heading">
                    <h3>
                        С помощью нашего веб-приложения вы можете:
                    </h3>
                </div>
                <div class="function_info">
                    <ul>
                        <li>
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Создать родовое древо
                        </li>
                        <li>
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Пригласить родственников
                        </li>
                        <li>
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Резервное копирование.
                        </li>
                        <li>
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Создать PDF (книги) из составленных данных
                        </li>
                        <li>
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Глобальный поиск
                        </li>
                        <li>
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Получить советы по составлению Родового древа
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="command" class="pb-5 section">

    <div class="container">
        <div class="justify-center row">
            <div class="heading wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <h2>Команда</h2>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                <div class="service">
                    <div class="command">
                        <img
                            class="img-circle"
                            src="{{ asset('web/images/user.png') }}"
                            alt="user"
                            height="124px"
                            width="124px">
                    </div>
                    <div class="caption">
                        <h3>Сайдум Халибеков</h3>
                        <small>Основатель сервиса rodovayakniga.ru</small>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                <div class="service">
                    <div class="command">
                        <img
                            class="img-circle"
                            src="{{ asset('web/images/no_image_female.png') }}"
                            alt="user"
                            height="124px"
                            width="124px">
                    </div>
                    <div class="caption">
                        <h3>Джамиля Агамирзоева</h3>
                        <small>Над текстом трудилась</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="wow fadeInUp">
    <div class="map-wrapper">
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <p>&copy;
                        <a href="#">rodovayakniga.ru
                            <br />
                        </a>
                    </p>
{{--                        <a href="https://www.Themefisher.com">Themefisher</a>| Шаблон сайта</p>--}}
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Js -->
<script src="{{ asset('web/js/vendor/modernizr-2.6.2.min.js') }}"></script>
<script src="{{ asset('web/js/vendor/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('web/js/jquery.lwtCountdown-1.0.js') }}"></script>
<script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('web/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('web/js/jquery.form.js') }}"></script>
<script src="{{ asset('web/js/jquery.nav.js') }}"></script>
<script src="{{ asset('web/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('web/js/plugins.js') }}"></script>
<script src="{{ asset('web/js/wow.min.js') }}"></script>
<script src="{{ asset('web/js/main.js') }}"></script>

</body>

</html>

