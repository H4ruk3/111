<template>
    <div class="row flex-nowrap base toptabs mx-0">
        <div :data-num = "userid" v-on:click="curmenu == 'training'?$router.push('/programs'):$router.push('/programs/trainingprogram')" data-type = "training" class="col-md-4 col-lg-4 bg-training caption">
            <div class="bg-training" v-bind:class="{'active' : curmenu == 'training'}">Тренировка</div>
        </div>
        <div :data-num = "userid" v-on:click="$router.push('/programs/eating'), curmenu='eating'" data-type = "eating" class="col-md-4 col-lg-4 bg-eating caption">
            <div class="bg-eating" v-bind:class="{'active' : curmenu == 'eating'}">Питание</div>
        </div>
        <div :data-num = "userid" v-on:click="$router.push('/programs/routine'), curmenu='routine'" data-type = "routine" class="col-md-4 col-lg-4 bg-routine caption">
            <div class="bg-routine" v-bind:class="{'active' : curmenu == 'routine'}">Режим</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Headmenu",
        props: {'userid': {'default' : null}, 'curmenu' : {'default': 'all'}},
    }
</script>

<style scoped>

</style>
