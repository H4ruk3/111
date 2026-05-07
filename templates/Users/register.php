<!-- in /templates/Users/login.php -->
<div class=dialog>
    <p class="logo">
        <a href="/"><img src="/img/logo_header.png" /></a>
    </p>
    <div id="login" class="regblock" style="<?= isset($isreg)?"display: none":""?>">
        <?php if ($user->role == 'trainer')
            echo "<H1>Регистрация тренера</H1>";
        else if ($user->role == 'corp')
            echo "<H1>Регистрация корпоративного аккаунат</H1>";
        else
            echo "<H1>Регистрация</H1>"; ?>
        <!--<form id="loginform" method="post" action="" onsubmit="return login()">-->
        <? $this->loadHelper('Form', [
            'templates' => 'app_form',
        ]) ?>
        <?= $this->Form->create(null, ['id' => "regform", "method" => "post"]) ?>
        <? $this->Form->unlockField('role'); ?>
        <?= $this->Form->hidden('role', ['id' => 'role', 'value' => $user->role]) ?>
        <?= $this->Form->control('username', ['required' => true, 'id' => 'loginfield', 'class' => "form-control", 'type'=>'email',
            'onkeyup' => "this.setAttribute('value', this.value);", 'label' => false, 'templateVars' => ['text' => 'E-mail адрес (логин)']
        ]) ?>
        <?= $this->Form->control('password', ['required' => true, 'id' => 'loginpassword', 'class' => "form-control", 'type'=>'password',
            'onkeyup' => "this.setAttribute('value', this.value);", 'label' => false, 'templateVars' => ['text' => 'Пароль']
        ]) ?>
        <?= $this->Form->control('accept', ["id" => "accept", "style" =>"margin-right: 5px", "type" => "checkbox", "value" => "accept",  "label" => "Согласен с использованием моих персональных данных"]) ?>
        <!--<div class="row tarifs">
            <? foreach($tarifs as $tarif) { ?>
                <div class="col-lg-4 tarif">
                    <H4><?= $tarif->name ?></H4>
                    <div class="price"><span class="currency">₽</span><?= $tarif->price ?></div>
                    <hr>
                    <div class="description"><?= $tarif->description ?></div>
                    <?= $this->Form->submit(__('Register'), ["onclick" => "document.getElementById('role').value = '$tarif->role'"]); ?>
                </div>
            <? } ?>
        </div>-->
        <?= $this->Form->submit(__('Register')); ?>
        <?= $this->Form->end() ?>
        <p class="center or">или</p>
        <div class="row">
            <div class="col-lg-12 hrefs"><a href="users/login">Войти</a></div>
        </div>
        <!--Сообщение об ошибке авторизации -->
        <?= $this->Flash->render() ?>
    </div>
</div>








<!--
<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Add User", ['action' => 'add']) ?>
</div>
-->
