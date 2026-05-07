<!DOCTYPE html>
<?= $this->Html->css('bootstrap-5.1.1/bootstrap') ?>
<?= $this->Html->css('bootstrap-5.1.1/bootstrap-icons') ?>
<?= $this->Html->css(['app', 'main', 'mainmenu', 'form']) ?>
<?= $this->Html->script('bootstrap-5.1.1/bootstrap') ?>

<?php
$cakeDescription = 'Ваш личный тренер';
?>

<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <? if (isset($title)) echo $title; else echo __($this->fetch('title')); ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="/img/logo_header.png" alt="Ваш личный тренер"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="/programs"><?= __("Programs")?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/diary"><?= __("Diary")?></a>
                    </li>

                </ul>
                <?= $user['username'] ?>,
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="users/logout">
                            Выход
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>
<main>
    <?= $this->fetch('content') ?>
</main>
<footer>
    <div class="container">
        <div class="copyright"><?= __('Company')?> &copy; 2017 - <?= date('Y')?></div>
        <div class="contacts">
            <p><span class="title"><?= __('Contacts')?></span></p>
            <!--<span class="glyphicon glyphicon-earphone"></span><a href="tel:+7(4862)42-36-12"> +7 (4862) 42-36-12</a><br>-->
            <p><i class="bi bi-envelope"></i><a href="mailto:support@coach-me.ru"> support@coach-me.ru </a></p>
        </div>
    </div>
</footer>
</body>
</html>
