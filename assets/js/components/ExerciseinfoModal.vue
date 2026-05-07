<template>
    <div class="modal-dialog custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{exercise.name}}</h5>
                <button type="button" class="btn-close" aria-label="Close" @click="$emit('close')"></button>
            </div>
            <div class="modal-body">
                <img :src="'/img/exercise/'+exercise.img" />
                <div v-html="exercise.description"></div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "ExerciseinfoModal",
        props: ["exercise"]
    }
</script>

<style scoped>

</style>
