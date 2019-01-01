<?php
session_start();
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        var goToPage = 'main';
        <?php
        $page = $_GET['page'];
        if (isset($page)) {
            echo "goToPage = '$page';";
        }
        ?>
    </script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/join.css">
    <link rel="stylesheet" href="/css/team.css">
    <title>Краски Чувашии</title>
</head>
<body>
<div id='over-top'>
    <h3><span>1</span><span>8</span><span>УЧАСТНИКОВ</span></h3>
    <div name="links">
        <a href="https://vk.com/kraski_chuvashia"><img src="/images/contacts/vk.png" alt="VK"></a>
        <a href="https://www.facebook.com/kraskikonkurs"><img src="/images/contacts/fb.png" alt="FB"></a>
        <a href="https://www.instagram.com/kraski_chuvashia/"><img src="/images/contacts/inst.png" alt="INST"></a>
        <a href="javascript:();" id="ask-a"><img src="/images/contacts/ask.png" alt="ASK">Задать вопрос</a>
    </div>
</div>
<div id='top'>
    <div>
        <div class="double-decor"></div>
        <div class='top-div' id='top-name'>
            <h2>Всероссийский конкурс</h2>
            <h1>«Краски Чувашии»</h1>
        </div>
    </div>
    <div class='top-div switch-box' id='top-switch-box'>
        <img class='switch go-left' src="/images/design/three-left.png" alt="left">
        <div class='switch-div'>
            <img src="/images/competition/feofanova.png" alt="photo">
        </div>
        <img class='switch go-right' src="/images/design/three.png" alt="right">
    </div>
    <div class="simple-decor"></div>
</div>
<div id="main">
    <div id="main-left">
        <ul class="menu" id="ul-left">
            <li id="li-main" onclick="go('main')"><img src="/images/logo-kraski.png" alt="main logo"></li>
            <li id="li-join" onclick="go('join')">Принять участие</li>
            <li id="li-about" onclick="go('about');">О конкурсе</li>
            <li id="li-chuvashia" onclick="go('chuvashia');">О Чувашии</li>
            <li id="li-news" onclick="go('news');">Наши новости</li>
        </ul>
        <div id="left-end"></div>
    </div>
    <div id="main-right">
        <ul class="menu menu-h" id="ul-right">
            <li id="li-gallery" onclick="go('gallery');"><img src="/images/design/three-down.png">Галерея</li>
            <li id="li-team" onclick="go('team');"><img src="/images/design/three-down.png">Команда проекта</li>
            <li id="li-partners" onclick="go('partners');"><img src="/images/design/three-down.png">Партнеры</li>
            <li id="li-contacts" onclick="go('contacts');"><img src="/images/design/three-down.png">Контакты</li>
        </ul>

        <div id="page">

        </div>
    </div>

</div>
<div id="bottom">
    © «Краски Чувашии», 2018—2019<br> Полное или частичное
    копирование материалов запрещено, при согласованном копировании ссылка
    на ресурс обязательна.
</div>
</body>
</html>