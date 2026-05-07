<?php echo $this->AssetMix->script('app'); ?>
<?= $this->Html->css(['trainingcard']) ?>
<div id="app">
    <userprograms :userid="0" :user="null"></userprograms>
</div>
