<template>
    <div class="membercontent" :num="userid">
        <Headmenu :curmenu="'training'"></Headmenu>
    <div :id = "'content' + userid" class="base nomargin createtraining">
        <div style="margin-top: 20px" class="col-md-12 col-lg-12 createdayheader">
            <i class="bi bi-chevron-left back" v-on:click="$router.push('/programs')"></i>
            <H2>Создание программы тренировок</H2>
            <i class="bi bi-check2 ok" v-on:click="saveеtrainingprogram()"></i>

        </div>
        <div class="row" style="margin: 0">
            <div class="col-md-6 col-lg-6 trainingname">

            </div>
            <!--<div class="col-md-6 col-lg-6 trainingselect">
                <select id="aime" v-model="training.aimTrain" >
                    <option value="1">Набор мышечной массы</option>
                    <option value="2">Поддержание мышечной массы</option>
                    <option value="3">Похудение</option>
                </select>
                <span v-if="ispost && !$v.training.aimTrain.required" class="errormsg">Выберите цель тренировки.</span>
            </div>-->
        </div>
        <div class="row wrapblock" style="margin: 0">
            <div class="col-md-4 col-lg-4" v-bind:class="[selectexercise ? 'showexercise' : 'hideexercise']">
                <!--<a href="#" v-on:click.prevent="selectexercise = false" class="btn btn-secondary adddaybtn addexercisebutton" >Дни тренировки</a>-->
                <div class="widget-container widget-categories widget-accordion">
                    <h3 class="widget-title">Упражнения</h3>
                    <div id="categories">
                        <div v-for="(exercise, i) in musculgroup" class="panel" v-bind:key="i">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-parent="#categories" :href="'#collapse'+i" hidefocus="true" style="outline: none;"><span>{{exercise.name}}</span><span class="counter">{{exercise.exercise.length}}</span></a>
                            </div>
                            <div :id="'collapse' + i" class="accordion-body collapse" style="height: 0px;">
                                <div class="accordion-inner">
                                    <ul>
                                        <li v-for="(subex, ind) in exercise.exercise" style="display: flex" :class="{first: ind==0}">
                                            <a v-on:click="exerciseinfo(subex)" hidefocus="true" style="outline: none; flex-grow: 1"><span>{{subex.name}}</span></a>
                                            <i class="bi bi-plus-square addexercise" @click="$set(training.trainingprogramday[activeday].trainingprogramday_exercise, training.trainingprogramday[activeday].trainingprogramday_exercise.length, {exercise: subex, trainingprogramday_exercise_approach:[], position: training.trainingprogramday[activeday].trainingprogramday_exercise.length, comment: ''}), animate($event), selectexercise = false"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ category1 -->
                    </div>
                </div>
            </div>

            <div class="col-md-8 training col-lg-8" v-bind:class="[selectexercise ? 'hideday' : 'showday']">
                <div class="form-group" style="width:100%">
                    <input type="text" id="trainingprogramname" name="name" v-model="training.name" class="form-control" :class="status($v.training.name)">
                    <label class="form-label" for="trainingprogramname" :class="{'active' : training.name != null && training.name != ''}">Название программы тренировок</label>
                    <i class="erroricon input-group-addon bi bi-exclamation-circle"></i>
                    <span v-if="ispost && !$v.training.name.required" class="errormsg">Введите название программы тренировок.</span>
                    <span v-if="ispost && !$v.training.name.minLength" class="errormsg">Минимальная длина 5 символов.</span>
                </div>
                <div class="form-group" style="width:100%">
                    <textarea id="trainingprogramdescription" style="height: 100px" name="name" v-model="training.description" class="form-control" :class="status($v.training.description)"></textarea>
                    <label class="form-label" for="trainingprogramdescription" :class="{'active' : training.description != null && training.description != ''}">Описание программы тренировок</label>
                    <span class="erroricon input-group-addon glyphicon glyphicon-exclamation-sign"></span>
                </div>
                <div class="btn-group days" role="group">
                    <button v-for="(day, i) in training.trainingprogramday" type="button collapsed" :data-daynum = "day.number" data-parent="#daycontents" data-toggle="tab" :data-target="'#daycontent' + i" :href="'#collapse'+i" class="btn btn-secondary" :class="{'active': activeday==i}" v-on:click="activeday = i">День {{i+1}}<span v-if="$v.training.trainingprogramday.$each[i].$invalid && ispost" class="day_error glyphicon glyphicon-exclamation-sign"></span></button>
                    <button type="button" v-on:click="addDay()" class="btn btn-secondary adddaybtn"><i class="bi bi-plus-square"></i></button>
                </div>

                <div class="c1" id="trainingdayinfocontainer">
                    <div class="dayheader">
                        <h4>День {{activeday + 1}}</h4>
                        <i class="bi bi-x removeday" @click="removeDay()"></i>
                        <!--<div class="removeday" v-on:click="removeDay()"><div class="cross"></div></div>-->
                    </div>
                    <div v-if="training.trainingprogramday[activeday].trainingprogramday_exercise.length == 0" class="wp-block property list addexercisetext">
                        <div class="wp-block-body">
                            <div class="wp-block-content">
                                <h4>Выберите упражнение из списка слева и нажмите на него для добавления в текущий день.</h4>
                            </div>
                        </div>
                        <span v-if="ispost && !$v.training.trainingprogramday.$each[activeday].trainingprogramday_exercise.notEmpty" class="errormsg">Не выбрано ни одного упражнения в данный день.</span>
                    </div>
                    <!--<a href="#" v-on:click.prevent="selectexercise = true" class="btn btn-secondary adddaybtn addexercisebutton" >Добавить упражнение <br><i aria-hidden="true" class="fa fa-plus-square-o"></i></a>-->
                    <div v-for="(exercise, i) in training.trainingprogramday[activeday].trainingprogramday_exercise" class="wp-block property list" v-bind:key="i">
                        <div class="wp-block-body">
                            <div class="wp-block-content">
                                <div class="row flex-nowrap">
                                    <small style="width: auto; flex-grow: 1">
                                        <img style="width: 20px" src="/img/train.png" />
                                        <span class="exercisenumber">Упражнение {{i+1}}</span>
                                    </small>
                                    <div class="exercisebtn" v-if="i>0" @click="upexercise(i)"><i class="bi bi-chevron-up"></i></div>
                                    <div class="exercisebtn" v-if="i<training.trainingprogramday[activeday].trainingprogramday_exercise.length-1" @click="downexercise(i)"><i class="bi bi-chevron-down"></i></div>
                                    <div class="exercisebtn" v-on:click="delexercise(i)"><i class="bi bi-x"></i></div>
                                </div>
                                <a href="#" v-on:click.prevent="exerciseinfo(exercise.exercise)"><h4 class="content-title">{{exercise.exercise.name}}</h4></a>
                                <div class="form-group" style="width:100%">
                                    <textarea style="height: 100px" name="name" v-model="exercise.comment" class="form-control" :class="status($v.training.name)"></textarea>
                                    <label class="form-label" :class="{'active' : exercise.comment != null && exercise.comment != ''}">Комментарий к упражнению</label>
                                    <span class="erroricon input-group-addon glyphicon glyphicon-exclamation-sign"></span>
                                </div>
                                <span>Подходы: </span>
                                <a href="#" v-on:click.prevent="exercise.trainingprogramday_exercise_approach.splice(exercise.trainingprogramday_exercise_approach.length-1, 1)"><i class="bi bi-dash-lg"></i></a>
                                {{exercise.trainingprogramday_exercise_approach.length}}
                                <a href="#" v-on:click.prevent="exercise.trainingprogramday_exercise_approach.push({repeat: '', weight: '', approach: exercise.trainingprogramday_exercise_approach.length})"><i class="bi bi-plus-lg"></i></a>
                                <div class="exerciseinfo" v-for="(approach, j) in exercise.trainingprogramday_exercise_approach">
                                    <!--<div>

                                        <div class="input-group" style="width:100%">
                                            <input type="number" style="text-align: center; font-size: 20px;" min-value=0 v-model="exercise.podhod" @change="exercise.podhod < 0?exercise.podhod = 0:'', exercise.podhod > 1000?exercise.podhod = 1000:''"  @focus="onFocus(exercise.podhod, i, 'podhod')" @blur="onBlur(exercise.podhod, i, 'podhod')"/>
                                            <span class="erroricon input-group-addon glyphicon glyphicon-exclamation-sign"></span>
                                            <span v-if="ispost && !$v.training.trainingprogramday.$each[activeday].trainingprogramday_exercise.$each[i].podhod.required" class="errormsg">Введите количество подходов.</span>
                                            <span v-if="ispost && !$v.training.trainingprogramday.$each[activeday].trainingprogramday_exercise.$each[i].podhod.minValue" class="errormsg">Количество подходов не может быть меньше 1.</span>
                                        </div>
                                    </div>-->
                                    <div>
                                        Подход {{j+1}}
                                    </div>
                                    <div>
                                        <div class="form-group" style="width:100%">
                                            <input class="form-control" style="text-align: center; font-size: 20px;" min-value=0 v-model="approach.repeat" @change="approach.repeat < 0?approach.repeat = 0:'', approach.repeat > 1000?approach.repeat = 1000:''" type="number" @focus="onFocus(approach.repeat, i, 'repeat')" @blur="onBlur(approach.repeat, i, 'repeat')"/>
                                            <label class="form-label" :class="{'active' : approach.repeat != null && approach.repeat != ''}">Количество повторений</label>
                                            <span class="erroricon input-group-addon glyphicon glyphicon-exclamation-sign"></span>
                                            <span v-if="ispost && !$v.training.trainingprogramday.$each[activeday].trainingprogramday_exercise.$each[i].trainingprogramday_exercise_approach.$each[j].repeat.required" class="errormsg">Введите количество.</span>
                                            <span v-if="ispost && !$v.training.trainingprogramday.$each[activeday].trainingprogramday_exercise.$each[i].trainingprogramday_exercise_approach.$each[j].repeat.minValue" class="errormsg">Количество повторений не может быть меньше 1.</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group" style="width:100%">
                                            <input class="form-control" style="text-align: center; font-size: 20px;"  v-model="approach.weight" type="text" @focus="onFocus(approach.weight, i, 'weight')" @blur="onBlur(approach.weight, i, 'weight')"/>
                                            <label class="form-label" :class="{'active' : approach.weight != null && approach.weight != ''}">Вес</label>
                                            <span class="erroricon input-group-addon glyphicon glyphicon-exclamation-sign"></span>
                                            <span v-if="ispost && !$v.training.trainingprogramday.$each[activeday].trainingprogramday_exercise.$each[i].trainingprogramday_exercise_approach.$each[j].weight.required" class="errormsg">Введите вес.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal name="exercise-info">

        </modal>
    </div>
    </div>
</template>

<script>
    import { required, minLength, minValue} from 'vuelidate/lib/validators'

    const notEmpty = (value) => value.length > 0

    import ExerciseinfoModal from "./ExerciseinfoModal";
    import Headmenu from "./Headmenu";

    export default {
        name: "Createtrainingprogram",
        components: {Headmenu},
        props: {'trainingid':{'default': null}, 'template_id': {'default': null}},
        data: function () {
            return {
                userid: null,
                training: {
                    name: '',
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
                } /*JSON.parse(JSON.stringify(this.trainingtmp))*/,
                musculgroup: [],
                activeday: 0,
                //aimetrains: ["Набор мышечной массы", "Поддержание мышечной массы", "Похудение"],
                ispost: false,
                selectexercise: false
            }
        },
        methods: {
            saveеtrainingprogram: function () {
                this.ispost = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }
                axios.post('/api/trainingprogram/add', this.training).then(resp => {
                    console.log(resp.data);
                    this.$router.push('/programs/trainingprogram/'+resp.data.trainingprogram.id);
                })
                .catch(err => {
                    console.log(err);
                })
                /*this.ispost = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }
                var url = "";
                this.training.userId = this.userid;
                var vnode = this;
//if (this.type == 'create')
                url = "/members/saveusertrainingprogram"
//else if (this.type == 'edit')
//	url = "/members/edituserroutine"
//else return;
                $.post(url, this.training, function (data) {
                    console.log(data);
                    try {
                        obj = $.parseJSON(data);
                        if (obj.status == "success") {
                            obj.object.modifieddate = obj.object.lastmodified != null ? new Date(obj.object.lastmodified) : null;
                            obj.object.month = obj.object.lastmodified != null ? months[(new Date(obj.object.lastmodified)).getMonth()] : "";
                            obj.object.aimTrainStr = vnode.aimetrains[obj.object.aimTrain - 1];
                            vnode.$emit('updatetraining', {
                                item: obj.object.id,
                                object: obj.object
                            });
                        }
                    } catch (e) {
//$("#message").html("Не удалось загрузить файл.");
//$(".alert").fadeTo(500, 1);
//window.setTimeout(function() { $(".alert").fadeTo(500, 0).slideUp(500, function() { /*$(this).remove()*/ /*}); }, 4000);
//$('#myModalBox').modal('hide');
                        console.log("illegal json");
                    }

                });*/
            },
            status(validation) {
                return {
                    error: validation.$invalid && this.ispost,
                    dirty: !validation.$invalid
                }
            },
            updateex: function (ind) {
                var exercise = this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[ind];
                exercise.collapsed = ((exercise.collapsed == undefined) ? false : !exercise.collapsed);
            },
            addDay: function () {
                var dayn = this.training.trainingprogramday.length;
                this.$set(this.training.trainingprogramday, this.training.trainingprogramday.length, {
                    number: dayn,
                    trainingprogramday_exercise: []
                });
                this.activeday = dayn;
            },
            removeDay: function () {
                if (this.training.trainingprogramday.length > 1) {
                    this.training.trainingprogramday.splice(this.activeday, 1);
                    this.activeday = 0;
                }
            },
            animate: function (e) {
                //$(e.currentTarget).addClass("clickanim");
                e.currentTarget.parentNode.classList.add('clickanim');
                e.currentTarget.parentNode.addEventListener('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function (e1) {
                    e1.currentTarget.parentNode.classList.remove("clickanim");
                })
            },
            onChange: function (ob) {
                if (ob < 0)
                    ob = 0;
                if (ob > 1000)
                    ob = 1000;
                console.log(ob);
            },
            onFocus: function (val, i, ob) {
                if (ob == "podhod" && val == 0)
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].podhod = '';
                else if (ob == "repeat" && val == 0)
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].repeat = '';
                else if (ob == "weight" && val == 0)
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].weight = '';
//console.log("focus "+val);
//console.log(ob);
//val = '';
            },
            onBlur: function (val, i, ob) {
                if (ob == "podhod" && val == '')
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].podhod = 0;
                else if (ob == "repeat" && val == '')
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].repeat = 0;
                else if (ob == "weight" && val == '')
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].weight = 0;
            },
            exerciseinfo(ex) {
                this.$modal.show(
                    ExerciseinfoModal,
                    { exercise: ex},
                    {height: '80%'},
                )
            },
            upexercise(i) {
                var list = this.training.trainingprogramday[this.activeday].trainingprogramday_exercise.slice();
                var tmp = list[i];
                list[i] = list[i-1];
                list[i-1] = tmp;
                list[i].position = i;
                list[i-1].position = i-1;
                this.training.trainingprogramday[this.activeday].trainingprogramday_exercise = list
            },
            downexercise(i) {
                var list = this.training.trainingprogramday[this.activeday].trainingprogramday_exercise.slice();
                var tmp = list[i];
                list[i] = list[i+1];
                list[i+1] = tmp;
                list[i].position = i;
                list[i+1].position = i+1;
                this.training.trainingprogramday[this.activeday].trainingprogramday_exercise = list
            },
            delexercise(i) {
                this.training.trainingprogramday[this.activeday].trainingprogramday_exercise.splice(i,1);
                for(var i = 0; i< this.training.trainingprogramday[this.activeday].trainingprogramday_exercise.length; i++ ) {
                    this.training.trainingprogramday[this.activeday].trainingprogramday_exercise[i].position = i;
                }
            }
        },
        mounted: function () {
            //this.musculgroup.push({'name': 'test', 'exercise': []})
            this.$nextTick(function () {
                axios.get('/api/exercises').then(resp => {
                    console.log(resp.data);
                    this.musculgroup = resp.data.musculgroup;
                    //this.musculgroup.push({'name': 'test', 'exercise': []})
                })
                .catch(err => {
                    console.log(err);
                })
                if (this.trainingid) {
                    axios.get('/api/trainingprogram/get/'+this.trainingid).then(resp => {
                        console.log(resp.data.trainingprograms);
                        this.training = resp.data.trainingprogram;
                    })
                        .catch(err => {
                            console.log(err);
                        })
                }
                //VueScrollTo.scrollTo('#content' + this.userid);
                var i = 0, j = 0;
                for (i = 0; i < this.training.trainingprogramday.length; i++)
                    for (j = 0; j < this.training.trainingprogramday[i].trainingprogramday_exercise.length; j++)
                        if (this.training.trainingprogramday[i].trainingprogramday_exercise[j].weight == null)
                            this.training.trainingprogramday[i].trainingprogramday_exercise[j].weight = 0;
            })
        },
        validations: {
            training: {
                name: {
                    required,
                    minLength: minLength(5)
                },
                description: {
                },
                trainingprogramday: {
                    notEmpty,
                    $each: {
                        trainingprogramday_exercise: {
                            $each: {
                                trainingprogramday_exercise_approach: {
                                    $each: {
                                        approach: {
                                            required,
                                            minValue: minValue(0)
                                        },
                                        repeat: {
                                            required,
                                            minValue: minValue(0)
                                        },
                                        weight: {
                                            required
                                        },
                                    }
                                }

                            }
                        }
                    }
                }
            }
        },
    }
</script>

<style scoped>
    h4 {
        font-size: 1rem;
    }
</style>
