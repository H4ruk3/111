<template>
    <div data-target="training" class="col-md-4 training col-lg-4 trainingcol">
        <div v-if="activetrainingid != undefined" class="activeblank" >
            <H4>Активная программа тренировок</H4>
            <div :trainingid="activetrainingid" class="ui-item  training br-training" v-bind:class="{'active': displayedtraining == activetrainingid}">
                <div class="title" v-on:click="displayedtraining = activetrainingid, $router.push('/programs/trainingprogram/'+training.id)"><H2>{{trainings[activetrainingid].name}}</H2>
                    <div class="tags">
                        <div v-if="String(trainings[activetrainingid].active).toLowerCase() === 'true'" class="tag activetag">активная</div>
                    </div>
                    <div class="data">
                        <p><span class="subtitle">Дата изменения:</span> <span>{{trainings[activetrainingid].lastmodified != null?trainings[activetrainingid].lastmodified.substring(0, 10):" - "}}</span></p>
                    </div>
                </div>
                <div class="actions">
                    <i class="round-button bi bi-eye" v-on:click="$router.push('/programs/trainingprogram/'+trainings[activetrainingid].id), displayedtraining = activetrainingid, $emit('select-menu', {itemtype: 'training', item: activetrainingid})" aria-hidden="true"></i>
                    <i class="round-button bi bi-pencil" v-on:click="trainings[activetrainingid].canedit?$router.push('/programs/trainingprogram/edit/'+trainings[activetrainingid].id):''" aria-hidden="true" v-bind:class="{'disabled': !trainings[activetrainingid].canedit}" data-toggle="tooltip" data-placement="bottom" :title="!trainings[activetrainingid].canedit?'У вас нет прав на редактирование данной программы':'Изменение программы тренировок'"></i>
                    <i v-on:click="" class="round-button bi bi-trash disabled" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" :title="!trainings[activetrainingid].canedit?'У вас нет прав на удаление данной программы':(trainings[activetrainingid].active?'Нельзя удалять активную программу':'Удаление программы тренировок')"></i>
                    <i v-on:click="" class="round-button bi bi-check disabled" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" :title="trainings[activetrainingid].active?'Данная программа уже является активной':(trainings[activetrainingid].template?'Нельзя сделать активным шаблон программы тренировок':'')"></i>
                </div>
            </div>
        </div>
        <div class="ui-item  training br-training">
            <div class="form-group input-group has-feedback">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="trainingsearchtext" v-model="trainingsearchtext" id="trainingsearchtext" class="form-control" onkeyup="this.setAttribute('value', this.value);">
                <label class="form-label" style="padding-left: 40px;"> Введите название искомой программы тренировок</label>
            </div>
        </div>
        <!--<div class="input-group" style="width:100%; margin: 10px 0">
            <span class="input-group-addon glyphicon glyphicon-search"></span>
            <input style="text-align: left; font-size: 18px; margin: 0" v-model="trainingsearchtext" type="text" placeholder="Введите название искомой программы тренировок" />
            <span class="input-group-addon glyphicon glyphicon-remove" v-bind:class="{'erroricon': trainingsearchtext == ''}" @click="trainingsearchtext=''"></span>
        </div>-->
        <div v-for="(training, id) in trainings" v-bind:key="id" :trainingid="id" v-if="!training.template && !training.active && ((trainingsearchtext != '' && training.name.toLowerCase().indexOf(trainingsearchtext) != -1) || trainingsearchtext == '')" class="ui-item  training br-training" v-bind:class="{'active': displayedtraining == id}">
            <div class="title" v-on:click="displayedtraining = id, $router.push('/programs/trainingprogram/'+training.id)"><H2>{{training.name}}</H2>
                <div class="tags">
                    <div v-if="String(training.active).toLowerCase() === 'true'" class="tag activetag">активный</div>
                    <!--<div class="tag">шаблон</div>-->
                </div>
                <div class="data">
                    <p><span class="subtitle">Дата изменения:</span> <span>{{training.lastmodified != null?training.lastmodified.substring(0, 10):" - "}}</span></p>
                    <!--<p><span class="subtitle">Цель тренировки:</span> <span>{{getaimetrain(training.aimTrain)}}</span></p>-->
                </div>
            </div>
            <div class="actions">
                <i class="round-button bi bi-eye" v-on:click="$router.push('/programs/trainingprogram/'+training.id), displayedtraining=id" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" :title="'Просмотреть программу тернировок'"></i>
                <i class="round-button bi bi-pencil" v-on:click="training.canedit?($emit('select-menu', {itemtype: 'edittraining', item: id}), $router.push('/programs/trainingprogram/edit/'+training.id)):''" aria-hidden="true" v-bind:class="{'disabled': !training.canedit}" data-toggle="tooltip" data-placement="bottom" :title="!training.canedit?'У вас нет прав на редактирование данной программы':'Изменение программы тренировок'"></i>
                <i v-on:click="training.canedit && !training.active?removetraining(id, training.id):''" class="round-button bi bi-trash" aria-hidden="true" v-bind:class="{'disabled': !training.canedit || training.active}"  data-toggle="tooltip" data-placement="bottom" :title="!training.canedit?'У вас нет прав на удаление данной программы':(training.active?'Нельзя удалять активную программу':'Удаление программы тренировок')"></i>
                <i v-on:click="activetraining(id)" class="round-button bi bi-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" :title="'Сделать прогармму активной'"></i>
            </div>
        </div>
        <div class="activeblank" data-bs-toggle="collapse" data-bs-target="#collapseTrainingTemplate" aria-expanded="true" style="display:flex">
            <h4 style="flex-grow:1">Шаблоны программ тренировок</h4>
            <div class="collapseicon" ></div>
        </div>
        <div class="collapse in show" id="collapseTrainingTemplate">
            <div v-for="(training, id) in trainings" :trainingid="id" v-if="training.template" class="ui-item  training br-training">
                <div class="title" v-on:click="displayedtraining = id, $emit('select-menu', {itemtype: 'training', item: id})"><H2>{{training.name}}</H2>
                    <div class="tags">
                        <div v-if="String(training.template).toLowerCase() === 'true'" class="tag activetag">шаблон</div>
                        <!--<div class="tag">шаблон</div>-->
                    </div>
                    <div class="data">
                        <p><span class="subtitle">Дата изменения:</span> <span>{{training.lastmodified != null?training.lastmodified.substring(0, 10):" - "}}</span></p>
                    </div>
                </div>
                <div class="actions">
                    <i class="round-button fa fa-eye" v-on:click="displayedtraining = id, $emit('select-menu', {itemtype: 'training', item: id})" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="ui-item training br-training addcard">
            <a href="" v-on:click.prevent="createtraining()"><i class="bi bi-plus-square"></i></a>
            <!--<router-link to="/programs/trainingprogram/create"><i class="bi bi-plus-square"></i></router-link>-->
        </div>
    </div>
    <!--<trainingprogram-info v-if="trainings!=null && trainings[displayedtraining]!=null" :id="trainings[displayedtraining].id"></trainingprogram-info>
    </div>
    </div>-->
</template>

<script>
    import ExerciseinfoModal from "./ExerciseinfoModal";
    import CreateTrainingprogramModal from "./CreateTrainingprogramModal";

    export default {
        name: "TrainingprogramsList",
        props: ['programid'],
        data() {
            return {
                trainings: null,
                activetrainingid: null,
                displayedtraining: null,
                trainingsearchtext: '',
                activeday: 0
            }
        },
        methods: {
            createtraining() {
                this.$modal.show(
                    CreateTrainingprogramModal,
                    {},
                    {height: '80%'},
                    {'before-close': (evt) => {
                            var empty = {
                                name: 'Свободная программа',
                                description: '',
                                users_id: null,
                                creator: null,
                                active: false,
                                lastmodified: null,
                                trainingprogramday: [
                                    {
                                        number: 0,
                                        trainingprogram_id: null,
                                        trainingprogramday_exercise: []
                                    }
                                ]
                            }
                        if (evt.params.selected != undefined) {
                            if (evt.params.selected == 'new')
                                this.$router.push('/programs/trainingprogram/create')
                            else if (evt.params.selected == 'empty') {
                                axios.post('/api/trainingprogram/add', empty).then(resp => {
                                    //console.log(resp.data);
                                    this.$router.push('/programs');
                                })
                                    .catch(err => {
                                        console.log(err);
                                    })
                            } else if (evt.params.selected == 'template') {
                                axios.get('/api/trainingprogram/copy/'+evt.params.idtemplate).then(resp => {
                                    //console.log(resp.data);
                                    this.$router.push('/programs/trainingprogram/'+resp.data.trainingprogram.id);
                                    this.load();
                                    //this.$router.push('/programs');
                                })
                                    .catch(err => {
                                        console.log(err);
                                    })
                            }
                        }
                        console.log(evt);
                        },
                    }
                )
                /*this.$vuedals.open({
                    title: 'Выберите шаблон создаваемого распорядка дня.',
                    component: SelectTemplate,
                    props: {
                        trainings: this.globalstate.templates != null ? this.globalstate.templates.trainings : this.user.trainings
                    },
                    onClose(data) {
                        //console.log(data);
                        if (data.result == "confirm") {
                            view.previewelem = data.selecteditem
                            view.state = 'createroutine'
                            view.curmenu = 'routine'
                        }
                    }
                });*/
            },
            removetraining(i, id) {
                axios.delete("/api/trainingprogram/delete/"+id).then(resp => {
                    this.trainings.splice(i,1);
                })
                .catch(err => {
                    console.log(err);
                })
            },
            activetraining(i) {
                var ind = i;
                axios.get("/api/trainingprogram/active/"+this.trainings[i].id).then(resp => {
                    this.activetrainingid = ind;
                    for(var i = 0; i < this.trainings.length; i++) {
                        if (i!=ind) {
                            this.trainings[i].active = false;
                        } else
                            this.trainings[i].active = true;

                    }
                    //this.trainings.splice(i,1);
                })
                    .catch(err => {
                        console.log(err);
                    })
            },
            load() {
                axios.get('/api/trainingprogram/list').then(resp => {
                    console.log(resp.data);
                    this.trainings = resp.data.trainingprograms;
                    console.log(this.trainings);
                    if (this.trainings.length == 0)
                        this.createtraining();
                    for(var i = 0; i < this.trainings.length; i++) {
                        if (this.trainings[i].active) {
                            this.activetrainingid = i;
                        }
                        if (this.trainings[i].id == this.programid)
                            this.displayedtraining = i;
                    }
                    //this.musculgroup.push({'name': 'test', 'exercise': []})
                })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        mounted: function () {
            //this.musculgroup.push({'name': 'test', 'exercise': []})
            this.$nextTick(function () {
                this.load()
            })
        }
    }
</script>

<style scoped>
  .trainingcol {
      padding: 0 10px;
  }
</style>
