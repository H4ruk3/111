<template>
    <div class="membercontent">
        <Headmenu :curmenu="'training'"></Headmenu>
        <div class="row mx-0">
            <trainingprograms_list :programid="id"></trainingprograms_list>
    <div id="content" class="col-md-8 col-lg-8">
        <div v-if="trainingprogram != undefined" class="orange">
            <div class="row mx-0 mt-0 flex-nowrap base bigtitle">
                <div class="date-time">
                    <template v-if="trainingprogram.lastmodified != null && trainingprogram.lastmodified != ''">
                        <span class="day">{{trainingprogram.lastmodified.substr(8,2)}}</span><br>
                        <span class="month">{{trainingprogram.lastmodified.substr(5,2)}} {{trainingprogram.lastmodified.substr(0,4)}}</span>
                    </template>
                </div>
                <div style="width: auto">
                    <H1>{{trainingprogram.name}}</H1>
                    <p class="aime">Описание тренировки: {{trainingprogram.description}}</p>
                </div>
            </div>
            <div class="row mx-0 flex-nowrap base">
                <div class="col-md-12 routine col-lg-8">
                    <div class="c1" id="trainingdayinfocontainer">
                        <div class="dayheader" v-if="trainingprogram.trainingprogramday.length > 0">
                            <h4>День {{trainingprogram.trainingprogramday[activeday].number+1}}</h4>
                        </div>
                        <div class="btn-group days" role="group" style="margin-top:0px; margin-bottom:10px;">
                            <button v-for="(day, i) in trainingprogram.trainingprogramday" type="button" v-on:click="activeday=i" class="btn btn-secondary" v-bind:class="{'active': activeday == i}">День {{i+1}}</button>
                        </div>
                        <div v-for="(exercise, i) in trainingprogram.trainingprogramday[activeday].trainingprogramday_exercise" class="wp-block property list">
                            <div class="wp-block-body">
                                <div class="wp-block-content">
                                    <small> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Упражнение {{i + 1}}</small>
                                    <a href="#" v-on:click.prevent="exerciseinfo(exercise.exercise)"><h4 class="content-title">{{exercise.exercise.name}}</h4></a>
                                    <p style="margin-bottom: 0px" v-for="(approach, id) in exercise.trainingprogramday_exercise_approach">
                                        <span> <b>Подход {{approach.approach}}</b> Повторения: <span class="number">{{approach.repeat}}</span> Вес <span class="number">{{approach.weight}}</span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<comments :comments="trainings[displayedtraining].comments" :userid="userid" :objectid="displayedtraining" :object="'trainingprogram'" v-on:addcomment="addcomment($event)"></comments>-->
            </div>
        </div>
    </div>
        </div>
    </div>
</template>

<script>
    import ExerciseinfoModal from "./ExerciseinfoModal";
    import Headmenu from "./Headmenu";
    import TrainingprogramsList from "./TrainingprogramsList"

    export default {
        name: "TrainingprogramInfo",
        props: {'id': {'default':null}},
        components: {'trainingprograms_list': TrainingprogramsList, Headmenu},
        data() {
            return {
                trainingprogram: null,
                activeday: 0
            }
        },
        watch: {
            id: function(val) {
                axios.get('/api/trainingprogram/get/'+val).then(resp => {
                    console.log(resp.data.trainingprograms);
                    this.trainingprogram = resp.data.trainingprogram;
                    //this.musculgroup.push({'name': 'test', 'exercise': []})
                })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        mounted() {
            this.$nextTick(function () {
                if (this.id != null)
                axios.get('/api/trainingprogram/get/'+this.id).then(resp => {
                    console.log(resp.data.trainingprograms);
                    this.trainingprogram = resp.data.trainingprogram;
                    //this.musculgroup.push({'name': 'test', 'exercise': []})
                })
                    .catch(err => {
                        console.log(err);
                    })
            })
        },
        methods: {
            exerciseinfo(ex) {
                this.$modal.show(
                    ExerciseinfoModal,
                    { exercise: ex},
                    {height: '80%'},
                )
            },
        }
    }
</script>

<style scoped>

</style>
