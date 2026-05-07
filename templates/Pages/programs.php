<?php echo $this->AssetMix->script('app'); ?>
<div id="app">
    <router-link to="/pages/programs/">Go to Foo</router-link>
    <router-link to="/pages/programs/second">Go to Bar</router-link>
    <router-view></router-view>
</div>
