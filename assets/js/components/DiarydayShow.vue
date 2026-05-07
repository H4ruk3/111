<template>
    <div style="margin: 0 15px" v-bind:class="{'orange' :  curselectedmenu=='training', 'green' :  curselectedmenu=='eating', 'pink' :  curselectedmenu=='helf'}">
        <div class="row flex-nowrap bigtitle">
            <div class="arrowleft" v-on:click="prevday()"></div>
            <div class="date-time" style="padding: 3px 3px 3px 3px;">
                <span class="month">создано</span><br>
                <span class="day">{{day}}</span><br>
                <span class="month">{{month}} {{year}}</span>
            </div>
            <div class="arrowright" v-on:click="nextday()"></div>
            <div style="flex-grow: 1; width: auto" v-if="curselectedmenu=='training' && trainings.length>0">
                <H1>Тренировка <span class="traininginfo">программа тренировок <b>{{trainings[0].trainingprogram.name}}</b>, день {{trainings[0].trainingprogramday.number+1}}</span></H1>
                <p>Время начала тренировки: {{gettime(trainings[0].date)}}</p>
<!--                <H1>{{"День "+diarydays[trainingdayid].trainingprogramday.number}} <div class="daymark"></div></H1>-->
<!--                <p class="aime">Название программы тренировок: <b>{{trainings[diarydays[trainingdayid].trainingprogramday.trainingprogram_id].name}}</b></p>-->
            </div>
            <div style="flex-grow: 1; width: auto" v-else-if="curselectedmenu=='training'"><H1>В этот день не было тренировки</H1></div>
            <div style="flex-grow: 1; width: auto" v-else-if="curselectedmenu=='eating'">
                <template v-if="eating != null">
<!--                    <H1>День {{eating!=null?eating.days[0].day_number + 1:""}}</H1>-->
<!--                    <p class="aime">Программа питания: <b>{{eating.name}}</b></p>-->
                </template>
            </div>
            <div style="flex-grow: 1" v-else-if="curselectedmenu=='helf'"> </div>
                <i class="bi bi-pencil ok" v-if="curselectedmenu=='training' && trainings.length > 0 || curselectedmenu=='eating' || curselectedmenu=='helf'"></i>
<!--            <img v-if="curselectedmenu=='training' && trainings.length > 0 || curselectedmenu=='eating' || curselectedmenu=='helf'" src="/icon/edit.png" class="ok" v-on:click="edit()">-->
        </div>
        <div class="row flex-nowrap diarymenu">
            <div class="diarymenuitem backcalendar bg-routine" v-on:click="$router.push('/diary')"><div><span class="glyphicon glyphicon-calendar"></span> Календарь</div></div>
            <div class="diarymenuitem train caption" v-on:click="curselectedmenu='training'"><div class="bg-training" v-bind:class="{'active' :  curselectedmenu=='training'}">Тренировка</div></div>
            <div class="diarymenuitem eating caption" v-on:click="curselectedmenu='eating'"><div v-bind:class="{'active' : curselectedmenu=='eating'}" class="bg-eating">Питание</div></div>
            <div class="diarymenuitem eating caption" v-on:click="curselectedmenu='helf'"><div v-bind:class="{'active' : curselectedmenu=='helf'}" class="bg-health">Здоровье</div></div>
        </div>
        <div v-if="trainings.length != 0 && curselectedmenu=='training'" class="row flex-nowrap base">
            <div class="col-md-12 routine col-lg-8">
                <div class="c1" id="trainingdayinfocontainer">
                    <div v-for="(exercise, i) in trainings[0].diary_exercise" class="wp-block property list">
                        <div class="wp-block-body">
                            <div class="wp-block-content">
                                <small> <img src="/img/train.png" style = 'height: 20px;'> Упражнение {{i + 1}}</small>
                                <a href="#" v-on:click.prevent="updateex(exercise)"><h4 class="content-title">{{exercise.exercise.name}}</h4></a>
                                <table class="diarytable">
                                    <thead>
                                    <tr>
                                        <td>Номер подхода</td>
                                        <td>Число повторений<br>(фактическое / плановое)</td>
                                        <td>Вес <br> (фактический / плановый)</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(set, numset) in exercise.diary_exercise_approach">
                                        <td class="number">{{set.approach + 1}}</td>
                                        <td style="font-size: 20px; font-weight: bold;"><span class="number">{{set.repeats}}</span> / <span class="number" style="padding-left: 5px">{{set.planrepeats}}</span> </td>
                                        <td style="font-size: 20px; font-weight: bold;"><span class="number">{{set.weight}}</span> / <span class="number" style="padding-left: 5px">{{set.planweight}}</span> </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--<span> Подходы: <span class="number">{{exercise.plan.podhod}}</span> Повторения: <span class="number">{{exercise.plan.repeats}}</span> Вес <span class="number">{{exercise.plan.minweight>0?(exercise.plan.minweight+'% - '+exercise.plan.maxweight+'%'):exercise.plan.weight}}</span></span>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <comments :comments="diarydays[trainingdayid].comments" :userid="userid" :objectid="trainingdayid" :object="'diarytrainings'" :realobjectid="diarydays[trainingdayid].id" v-on:addcomment="addcomment($event)"></comments>-->
        </div>
<!--        <div v-if="curselectedmenu=='eating' && eating != null" class="c1" id="trainingdayinfocontainer">-->
<!--            <div v-for="(eating, i) in eating.days[0].data" class="wp-block property list">-->
<!--                <div class="wp-block-body">-->
<!--                    <div class="wp-block-content">-->
<!--                        <small>-->
<!--                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{i + 1}} приём пищи  {{eating.eating.time.substr(11, 5)}}-->
<!--                        </small>-->
<!--                        <table class="nutritiontable diarytable">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th className="table-header nutrition-caption-name">Продукт</th>-->
<!--                                <th className="table-header nutrition-caption-weight">Граммы<br>(фактические / плановые)</th>-->
<!--                                <th className="table-header nutrition-caption-pfc">Б<br>(фактические / плановые)</th>-->
<!--                                <th className="table-header nutrition-caption-pfc">Ж<br>(фактические / плановые)</th>-->
<!--                                <th className="table-header nutrition-caption-pfc">У<br>(фактические / плановые)</th>-->
<!--                                <th className="table-header nutrition-caption-calories">Ккал<br>(фактические / плановые)</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            <tr v-for="food in eating.foods">-->
<!--                                <td style="width:25%">{{food.food.name}}</td>-->
<!--                                <td style="width:25%" class="number">-->
<!--                                    {{food.real.cnt>0?food.real.cnt:"-"}} / {{food.plan.cnt}}-->
<!--                                </td>-->
<!--                                <td id="proteins" style="width:10%" class="number">{{food.real.food!=null?food.real.food.proteins:"-"}} / {{food.plan.food!=null?food.plan.food.proteins:"-"}}</td>-->
<!--                                <td id="fats" style="width:10%" class="number">{{food.real.food!=null?food.real.food.fats:"-"}} / {{food.plan.food!=null?food.plan.food.fats:"-"}}</td>-->
<!--                                <td id="hidrocarbonats" style="width:10%" class="number">{{food.real.food!=null?food.real.food.hidrocarbonats:"-"}} / {{food.plan.food!=null?food.plan.food.hidrocarbonats:"-"}}</td>-->
<!--                                <td id="colories" style="width:15%" class="number">{{food.real.food!=null?food.real.food.colories:"-"}} / {{food.plan.food!=null?food.plan.food.colories:"-"}}</td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div v-if="curselectedmenu=='helf'" class="c1" id="trainingdayinfocontainer">-->
<!--            <div class="wp-block property list">-->
<!--                <div class="wp-block-body">-->
<!--                    <div class="wp-block-content">-->
<!--                        <table class="nutritiontable diarytable">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th className="table-header">#</th>-->
<!--                                <th className="table-header">Время измерения</th>-->
<!--                                <th className="table-header">Пульс</th>-->
<!--                                <th className="table-header">Давление</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            <tr v-for="(helf, ind) in healfs">-->
<!--                                <td> {{ind + 1}} </td>-->
<!--                                <td> {{helf.date.substr(11, 5)}} </td>-->
<!--                                <td> {{helf.puls}} </td>-->
<!--                                <td> {{helf.heart}} </td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: "DiarydayShow",
        props: ['date'],
        data() {
            return {
                curselectedmenu: 'training',
                curdate: moment(this.date),
                eating: null,
                trainings: [],
                trainingdayid: null
            }
        },
        computed: {
            year: function() {
                return this.curdate.format("Y");
            },
            month: function() {
                this.curdate.locale("ru");
                return this.curdate.format("MMMM");
            },
            day: function() {
                return this.curdate.format("DD");
            }
        },
        methods: {
            nextday() {
                this.curdate = moment(this.curdate).add(1, 'day');
                axios.get('/api/diary/get/'+this.curdate.format('YYYY-MM-DD')).then(resp => {
                    console.log(resp.data);
                    this.trainings = resp.data.events;
                })
                    .catch(err => {
                        console.log(err);
                    })
            },
            prevday() {
                this.curdate = moment(this.curdate).subtract(1, 'day');
                axios.get('/api/diary/get/'+this.curdate.format('YYYY-MM-DD')).then(resp => {
                    console.log(resp.data);
                    this.trainings = resp.data.events;
                })
                    .catch(err => {
                        console.log(err);
                    })
            },
            gettime(date) {
                console.log(moment(date));
                return moment(date).utc().format("HH:mm")
            }
        },
        mounted() {
            axios.get('/api/diary/get/'+this.date).then(resp => {
                console.log(resp.data);
                this.trainings = resp.data.events;
            })
            .catch(err => {
                console.log(err);
            })
        }

    }
</script>

<style scoped>

</style>
