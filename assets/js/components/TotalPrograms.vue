<template>
    <div class="membercontent" :num="userid">
        <Headmenu></Headmenu>
        <div class="row mx-0">
            <trainingprograms_list :programid="programid"></trainingprograms_list>
        </div>
    </div>
</template>

<script>
    import TrainingprogramsList from "./TrainingprogramsList"
    import Headmenu from "./Headmenu";

    export default {
        name: "TotalPrograms",
        props: {'userid':{'default':null},'programid':{'default' : null}},
        components: {'trainingprograms_list' : TrainingprogramsList, Headmenu}
    }
</script>

<style scoped>

</style>
