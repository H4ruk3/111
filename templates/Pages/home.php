<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();


$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'frontpage', 'bootstrap-5.1.1/bootstrap', 'bootstrap-5.1.1/bootstrap-icons']) ?>
    <?= $this->Html->script(['bootstrap-5.1.1/bootstrap']); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div id="page">
    <div class="bg">
        <div id="header">
            <img alt="coachme" id="header-logo" src="/img/logo_header.png">
            <div id="header-contacts">
                <div class="header-contact-record">
                    <i class="fa fa-phone fa-2x color-blue" aria-hidden="true"></i>
                    <div class="header-contacts color-blue">+7 (4862) 42-36-12</div>
                </div>
                <div class="header-contact-record">
                    <i class="fa fa-envelope-o fa-2x color-blue" aria-hidden="true"></i>
                    <div class="header-contacts color-blue">support@coach-me.ru</div>
                </div>
                <div style="width:100%">
                    <a href="https://play.google.com/store/apps/details?id=ru.itconcept.mpt" target="_blank" style="float:right">
                        <img alt="googleplay" class="gp" src = "/img/gp.png">
                        <div class="mobile">
                            <img alt="googleplay" src="/img/googleplay.png" style="Height: 20px;">
                            <div class="header-contacts color-blue" style="display: inline-block; padding-top: 2px;">Мобильное приложение</div>
                        </div>
                    </a>
                </div>
            </div>
            <div id="navigation">
                <? if(isset($user)) {?>
                    <div class="current-navigation-page">
                        <a href="/programs">
                            <i class="fa fa-user fa-2x navigation-icon" aria-hidden="true"></i>
                            <div class="navigation-text">Здравствуйте, <?= $user['username'] ?></div>
                        </a>
                    </div>
                    <div class="current-navigation-page">
                        <a href="/users/logout">
                            <div class="navigation-text">Выход</div>
                        </a>
                    </div>
                <? } else { ?>
                    <div class="current-navigation-page">
                        <a href="/users/login">
                            <i class="bi bi-box-arrow-in-left navigation-icon"></i>
                            <div class="navigation-text">Войдите на сайт</div>
                        </a>
                    </div>
                    <div class="current-navigation-page">
                        <a href="/users/register">
                            <div class="navigation-text">Зарегистрируйтесь</div>
                        </a>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>

    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div id="slider1" class="carousel-item active slide1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 slidecontainer">
                            <img src="/img/slide1-1.png" alt="...">
                            <div class="frame">
                                <H2>Не знаете с чего начать тренировки?</H2>
                                <div class="rightblock">
                                    <ul>
                                        <li>Боитесь идти в зал?</li>
                                        <li>Хотите добиться поставленных целей?</li>
                                    </ul>
                                    <b>Тогда</b>
                                    <ul>
                                        <li>Регистрируйтесь!</li>
                                        <li>Создавайте тренировочные планы и <b>занимайтесь с ВЛТ!</b></li>
                                        <li>Добивайтесь поставленных целей сами или с тренером!</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slider2" class="carousel-item slide2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 slidecontainer">
                            <img src="/img/slide2-1.png" alt="...">
                            <div class="frame">
                                <H2>Знаете как создать тренировочный план?</H2>
                                <div class="rightblock">
                                    <ul>
                                        <li>Любите и умеете тренировать?</li>
                                        <li>Хотите увеличить клиентскую базу?</li>
                                    </ul>
                                    <b>Тогда</b>
                                    <ul>
                                        <li>Содавайте учётную запись тренера!</li>
                                        <li>Находите и добавляйте клиентов!</b></li>
                                        <li>Создавайте для них тренировочные планы!</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slider3" class="carousel-item slide3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 slidecontainer">
                            <img src="/img/slide3-1.png" alt="...">
                            <div class="frame">
                                <H2>Дорожите репутацией клуба?</H2>
                                <div class="rightblock">
                                    <ul>
                                        <li>Хотите чтобы Ваши клиенты добивались поставленных целей?</li>
                                        <li>Желаете привлечь клиентов новой услугой?</li>
                                    </ul>
                                    <b>Тогда</b>
                                    <ul>
                                        <li>Регистрируйте фитнес-центр!</li>
                                        <li>Добавляйте тренеров и клиентов в систему!</b></li>
                                        <li>Отслеживайте работу тренеров и отзывы клиентов!</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Элементы управления -->
        <a class="left carousel-control-prev" href="" data-bs-target="#carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </a>
        <a class="right carousel-control-next" href="" data-bs-target="#carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </a>
    </div>

    <!--<div id="authorization">
        <div id="auth-content">
            <h1 id="auth-first-string">Ваш личный тренер -</h1>
            <h2 id="auth-second-string">сервис для достижения успеха!</h2>
        </div>

    </div>-->
    <div class="bg">

        <?= $this->fetch('content') ?>
    </div>
    <div class="footer1">
        <div id="footer">
            <img id="footer-logo" src="/img/logo_footer.png">
            <div class="footer-text">
                <h3 class="footer-text-h">
                    Ваш личный тренер
                </h3>
                <div class="footer-text-content">
                    Это сервис, позволяющий выяснить индивидуальные особенности строения тела пользователя
                    и составить для него распорядок дня, подходящий рацион питания, программу тренировок,
                    учитывая предпочтения и пожелания. Для удобства пользователей взаимодействие с сервисом
                    реализовано не только с помощью веб-сайта, но и с помощью мобильного приложения.
                </div>
            </div>
            <h3 class="footer-text-h">
                Наши тарифы
            </h3>
            <div class="row tarifs">
                <div class="col-lg-4 tarif">
                    <h4>Индивидуальный</h4>
                    <div class="price"><span class="currency">₽</span>0</div>
                    <hr>
                    <div class="description"><ul class="pricing-content">
                            <li>создание распорядков дня</li>
                            <li>создание программ питания</li>
                            <li>создание программтренировок</li>
                            <li>ведение дневника</li>
                            <li>просмотр и ведение справочников продуктов и упражнений</li>
                        </ul></div>
                    <div class="submit"><a href="/users/register/1" class="btn btn-danger btn-lg">Зарегистрироваться</a></div>                </div>
                <div class="col-lg-4 tarif">
                    <h4>Тренерский</h4>
                    <div class="price"><span class="currency">₽</span>500</div>
                    <hr>
                    <div class="description"><ul class="pricing-content">
                            <li>добавление подопечных</li>
                            <li>создание шаблонов тренировок и питания</li>
                            <li>просмотр и назначение программ подопечным</li>
                            <li>кронтроль прогресса подопечных в дневниках</li>
                            <li>управление тренировочным процессом посредством комментариев</li>
                        </ul></div>
                    <div class="submit">
                        <a href="/users/register/2" class="btn btn-danger btn-lg">Зарегистрироваться</a>
                        <!--<input type="submit" onclick="document.getElementById('role').value = 'trainer'" value="Зарегистрироваться">--></div>                </div>
                <div class="col-lg-4 tarif">
                    <h4>Корпоративный</h4>
                    <div class="price"><span class="currency">₽</span>1000</div>
                    <hr>
                    <div class="description">описание</div>
                    <div class="submit"><a href="/users/register/3" class="btn btn-danger btn-lg">Зарегистрироваться</a></div>                </div>
            </div>
        </div>
    </div>
    <div class="footer3">
        <div id="footertext" class="desctop">
            <img src="/img/desctop.png" id="desctop">
            <h3>При работе с веб-сервисом у Вас есть возможность:</H3>
            <ul>
                <li>зарегистрироваться как корпоративный пользователь, тренер или клиент; </li>
                <li>создавать шаблоны программ тренировок, питания, распорядка дня;</li>
                <li>создавать программы тренировок, питания и распорядок дня; </li>
                <li>редактировать шаблоны и изменять готовые программы; </li>
                <li>заполнять и просматривать дневники тренировок и питания; </li>
                <li>общаться со своим тренером или клиентом; </li>
                <li>комментировать программы тренировок и питания; </li>
                <li>просматривать справочники упражнений и продуктов; </li>
                <li>воспользоваться калькуляторами. </li>
            </ul>
        </div>

        <div class="footer3">
            <div id="footertext">
                <img src="/img/phone1.png" id="phone">
                <h3>С помощью мобильного приложения Вы сможете:</H3>
                <ul>
                    <li>зарегистрироваться; </li>
                    <li>просмотреть созданные программы тренировок, питания и распорядок дня;</li>
                    <li>вести дневники тренировок и питания; </li>
                    <li>просмотреть справочники; </li>
                    <li>пользоваться калькуляторами.</li>
                </ul>
                <div class="header-contact-record" id="googleplaybutton">
                    <a href="https://play.google.com/store/apps/details?id=ru.itconcept.mypersonaltrainer" target="_blank"><img class="gp" src = "/img/gp.png"></img></a>
                </div>
            </div>
        </div>
        <div class="footer2">
            <div id="supported-by">
                <img id="supported-by-logo" src="/img/innovation_promotion_fund.png">
                <h3 class="supported-by-text">
                    Проект разрабатывается при поддержке Фонда содействия развитию малых форм предприятий в
                    научно-технической сфере.
                    <a class="supported-by-links" target="_blank" href="http://fasie.ru">fasie.ru</a>
                </h3>
            </div>
            <a target="_blank" rel="noopener noreferrer" href="/files/politics.pdf" class="politic">Политика конфиденциальности</a>
        </div>
    </div>
</body>
</html>
