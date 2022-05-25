<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Центр управления компетенциями</title>
    <style>
        body {
            min-width: 100vw;
            min-height: 100vh;
            overflow-x: hidden;
            font-family: "Inter", Arial, Helvetica, sans-serif;
            background-image: url("./images/bgobl.png"), linear-gradient(91.42deg, #00397B -28%, #390096 139.34%);
            background-size: cover;
            background-repeat: repeat-y;
        }

        .container {
            max-width: 1170px;
            width: 100%;
            margin: 0 auto;
        }

        .header-line {
            display: flex;
            align-items: center;
        }

        .menu ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        .menu ul a {
            color: #fff;
            text-decoration: none;
            padding: 10px
        }

        .logo-text {
            font-style: normal;
            font-weight: 900;
            font-size: 36px;
            line-height: 122.02%;
            color: #FFFFFF;
            flex: none;
            order: 0;
            flex-grow: 0;
            margin-right: 35px;
        }

        .btn-yellow {
            min-width: 130px;
            min-height: 45px;
            left: calc(50% - 199px/2 - 402px);
            top: 0px;
            background: #FFE040;
            border-radius: 54px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 128.02%;
            text-align: center;
            letter-spacing: 0.045em;
            text-transform: uppercase;
            color: #000000;
        }

        .btn-login {
            min-width: 130px;
            min-height: 45px;
            left: calc(50% - 199px/2 - 402px);
            top: 0px;
            background: transparent;
            border: 1px solid #FFE040;
            border-radius: 54px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 128.02%;
            text-align: center;
            letter-spacing: 0.045em;
            text-transform: uppercase;
            color: #FFE040;
            margin: 0 15px;
        }

        .buttons {
            display: flex;
            align-items: center;
        }

        main h1 {
            font-style: normal;
            font-weight: 900;
            font-size: 72px;
            line-height: 88px;
            color: #FFFFFF;
            margin-bottom: 10px;
        }

        main h1 .border {
            color: transparent;
            -webkit-text-stroke: 2px #FFFFFF;
            -moz-text-stroke: 2px #FFFFFF
        }

        main .under-h1 {
            font-style: normal;
            font-weight: 500;
            font-size: 34px;
            line-height: 122.02%;
            color: #FFD600
        }

        .two-columns {
            display: flex;
            position: relative;
        }

        .shrink-none {
            flex-shrink: 0;
        }

        .slider .content {
            background: #FFE040;
            border-radius: 16px;
            padding: 30px;
            max-width: 300px;
        }

        .slider .content h3 {
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            line-height: 128.02%;
            text-transform: uppercase;
            color: #000000;
            margin-bottom: 10px;
        }

        .slider .content p {
            margin-bottom: 25px;
            font-style: normal;
            font-weight: 300;
            font-size: 17px;
            line-height: 128.02%;
            color: #000000;
        }

        .img-stud {
            position: absolute;
            top: -90px;
            right: -130px;
        }

        .white-btn {
            padding: 20px;
            background: #FFFFFF;
            border-radius: 8px;
            color: #000;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            letter-spacing: 0.045em;
            text-transform: uppercase;
            color: #000000;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;

        }

        .line-slider-and-button {
            margin-top: 100px;
            display: flex;
            grid-gap: 130px;
            color: #fff;
            align-items: flex-end;
        }

        .class_about_platform {
            background: rgba(90, 37, 177, 0.8);
            border-radius: 17px;
            background-image: url('./images/rocket-bg.png');
            background-size: contain;
            background-position-x: left;
            background-position-y: center;
            background-repeat: no-repeat;
            padding: 30px;
            padding-left: 300px;
            color: #fff;
            margin-top: 60px;
            backdrop-filter: blur(100px);

        }

        .services-item {
            padding: 25px;
            position: relative;

        }

        .services-item.yellow {
            background-color: #FFE040;
            border-radius: 16px;
            color: #000000;
        }

        .services-item.violet {
            background: rgba(90, 37, 177, 0.8);
            backdrop-filter: blur(100px);
            border-radius: 16px;
            color: #FFFFFF !important;
        }

        .services-title {
            font-style: normal;
            font-weight: 800;
            font-size: 36px;
            line-height: 122.02%;

        }

        .services-item p {
            font-style: normal;
            font-weight: 300;
            font-size: 24px;
            line-height: 128.02%;
        }

        .services-item img {
            position: absolute;
        }

        .services-item.item-1, .services-item.item-4 {
            min-height: 300px;
            max-width: 800px;
            padding-right: 320px;
            box-sizing: border-box;
        }

        .services-item.item-2, .services-item.item-3 {
            max-width: 310px;
            margin-left: 10px;
        }

        .services-item.item-3 {
            margin-top: 20px;
            margin-left: 0;
        }

        .services-item.item-4 {
            margin-top: 20px;
            margin-left: 10px;
        }

        .services-item.item-1 img, .services-item.item-4 img {
            top: 50%;
            right: -20px;
            transform: translateY(-50%);
        }

        .services h2.section_title {
            font-style: normal;
            font-weight: 900;
            font-size: 48px;
            line-height: 122.02%;
            color: #FFFFFF;
            margin-bottom: 5px;
        }

        .services .undertitle {
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 128.02%;
            color: #FFFFFF;
            margin-top: 0px;
        }

        .services-list {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <div class="header-line">
            <div class="logo-text">
                ЦУК
            </div>
            <div class="buttons">
                <a href="#" class="btn btn-yellow">Регистрация</a>
                <a href="#" class="btn btn-login">Вход в ЛК</a>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">Каталог компетенций</a>   </li>
                    <li><a href="#">Каталог программ</a></li>
                    <li><a href="#">Резюме</a></li>
                    <li><a href="#">ВУЗы</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="two-columns">
            <div class="shrink-none">
                <h1>
                    Цифровая <br>
                    <span class="border">платформа</span> ЦУК
                </h1>
                <div class="under-h1">
                    центр управления компетенциями студентов
                </div>
            </div>
            <div class="img-stud">
                <img src="./images/stud.png" alt="Шапка студента">
            </div>
        </div>

        <div class="line-slider-and-button">
            <div class="slider">
                <div class="content">
                    <div class="content-list">
                        <div class="content-item">
                            <h3>
                                Меры поддержки студентов
                            </h3>
                            <p>
                                Жизненный цикл студента: от абитуриента до трудоустройства
                            </p>
                            <a href="#" class="white-btn">УЗНАТЬ БОЛЬШЕ</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p>
                    Узнай, как именно тебе <br> может помочь Платформа!
                </p>
                <a href="#" class="btn btn-yellow">Регистрация</a>

            </div>
        </div>
        <div class="class_about_platform">
            <h2 class="section_title">
                О платформе
            </h2>
            <div class="content">
                <h3>
                    Региональная платформа поддержки талантливых студентов
                </h3>
                <ul>
                    <li>Разработка и реализация программ дополнительного образования по передовым направлениям подготовки</li>
                    <li>Интерактивный помощник в составлении резюме</li>
                    <li>Каталог инновационных компетенций и полезные советы</li>
                    <li>ВУЗы Самары, реализующие подготовку по инновационным компетенциям</li>
                </ul>
                <a href="#" class="white-btn">УЗНАТЬ БОЛЬШЕ</a>
            </div>
        </div>
        <div class="services">
            <h2 class="section_title">
                Онлайн-сервисы
            </h2>
            <p class="undertitle">
                Стань участником программы, не выходя из дома
            </p>

            <div class="services-list">
                <div class="services-item item-1 yellow">
                    <h3 class="services-title">
                        Навигатор образовательных программ
                    </h3>
                    <p>
                        Подбери необходимый курс, чтобы прокачать нужные тебе компетенции
                    </p>

                    <img src="./images/compass.png" alt="compass">
                </div>
                <div class="services-item item-2 violet">
                    <h3 class="services-title">
                        Конструктор резюме
                    </h3>
                    <p>
                        Составь такое резюме, от которого все HR придут в восторг! С помощью интеллектуального помощника
                    </p>
                </div>

                <div class="services-item item-3 violet">
                    <h3 class="services-title">
                        Каталог ВУЗов
                    </h3>
                    <p>
                        Задумался о получении образования после колледжа? Переходи в наш каталог и ищи ВУЗ по компетенции
                    </p>
                </div>

                <div class="services-item item-4 yellow">
                    <h3 class="services-title">
                        Твой #цифровой след!
                    </h3>
                    <p>
                        Собери данные об участии во всех конкурсах, хакатонах, чемпионатах и конференциях. Это поможет тебе в дальнейшем, благодаря простой выгрузке с платформы
                    </p>

                    <img src="./images/shield.png" alt="shield">
                </div>
            </div>
        </div>

    </main>
</div>

</body>
</html>
