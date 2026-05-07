<template>
    <div class="modal-dialog custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Выберите способ создания программы тренировок</h5>
                <button type="button" class="btn-close" aria-label="Close" @click="$emit('close')"></button>
            </div>
            <div class="modal-body">
                <p><input type="button" class="btn btn-primary" value="Создать пустую программу тренировок" @click="$emit('close', {'selected': 'empty'})"></input></p>
                <p><input type="button" class="btn btn-primary" value="Создать на основе шаблона" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"></input></p>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="accordion" id="accordion2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-expanded="true" aria-controls="collapse2One">
                                        Начинающий
                                    </button>
                                </h2>
                                <div id="collapse2One" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion2">
                                    <div class="accordion-body">
                                        <ul class="templatemodal">
                                            <li v-for="(program, key) in trainings" v-bind:key="key" v-if="program.aimTrain == 1" @click="$emit('close', {'selected': 'template', 'idtemplate': program.id})"><div><h4>{{program.name}}</h4></div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Опытный
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion2">
                                    <div class="accordion-body">
                                        <ul class="templatemodal">
                                            <li v-for="(program, key) in trainings" v-bind:key="key" v-if="program.aimTrain == 2" @click="$emit('close', {'selected': 'template', 'idtemplate': program.id})"><div><h4>{{program.name}}</h4></div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p><input type="button" class="btn btn-primary" value="Создать новую программу тренировок"  @click="$emit('close', {'selected': 'new'})"></input></p>
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
        name: "CreateTrainingprogramModal",
        data() {
            return {
                trainings: null
            }
        },
        mounted() {
            this.$nextTick(function () {
                axios.get('/api/trainingprogram/listtemplates').then(resp => {
                    console.log(resp.data.trainingprograms);
                    this.trainings = resp.data.trainingprograms;
                    //this.musculgroup.push({'name': 'test', 'exercise': []})
                })
                    .catch(err => {
                        console.log(err);
                    })
            })
        }
    }
</script>

<style scoped>

</style>
