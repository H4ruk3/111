<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<style>
    .user-nav-tabs.membertabs {
        border: 1px solid #cfcfcf;
        border-top: 1px solid #fff;
        margin: 0;
        margin-top: -1px;
        margin-bottom: 20px;
    }
    .caption {
        height: 40px;
        text-align: center;
        color: #FFF;
        font-weight: bold;
        font-size: 20px;
        line-height: 40px;
    }
    .caption:hover {
        cursor: pointer;
    }
    .bg-routine {
        background: #589BE6;
    }
    .bg-routine.hover {

    }
    .bg-training {
        background: #EBC85E;
    }
    .bg-training:hover {
        background: #d5ad35;
        transition: 1s;
    }
    .bg-eating {
        background: #51D466;
    }
    .bg-health {
        background: #f48fb1;
    }

</style>

<script>




    export default {
        props: ['userid', 'user'],
        data() {
            return {
                state: 'totalinfo',
                curmenu: '',
            }
        },
        //components: {totalinfo, routineinfo, trainingprograminfo, eatingprograminfo, createroutine, createtraining, createeating, showdiary, showdiaryday},
        methods: {
            /*neweatingprogram: function () {
                var neweatingprogram = {
                    users_id: this.userid,
                    routine_id: this.user.activeroutineid,
                    name: "",
                    days: []
                }
                if (this.user.routines.length == 0 || this.user.routines.length == undefined && Object.keys(this.user.routines).length == 0) {
                    showerror("Для создания программы питания необходимо сначала создать распорядок дня.")
                } else {
                    for (var firstKey in this.user.routines)
                        if (this.user.routines[firstKey].routineday != undefined && this.user.routines[firstKey].routineday.length > 0) break;
                    neweatingprogram.routine_id = firstKey;
                    this.$set(neweatingprogram.days, 0, {
                        'daytype': 0,
                        'eatings': []
                    });
                    for (var i = 0; i < this.user.routines[firstKey].routineday[0].eatCount; i++) {
                        this.$set(neweatingprogram.days[0].eatings, neweatingprogram.days[0].eatings.length, {
                            'eating_id': this.user.routines[firstKey].routineday[0].eating[i].id,
                            "foods": []
                        });
                    }
                    return neweatingprogram;
                }
            },
            newroutine: function () {
                return {
                    name: '',
                    routineday: [{
                        type: 1,
                        eatCount: 1,
                        eating: [{
                            time: null,
                            timeStr: null
                        }],
                        wakeupTime: null,
                        trainTime: null,
                        trainDuration: null,
                        sleepTime: null,
                        wakeupTimeStr: null,
                        trainTimeStr: null,
                        trainDurationStr: null,
                        sleepTimeStr: null
                    },
                        {
                            type: 2,
                            eatCount: 1,
                            eating: [{
                                time: null,
                                timeStr: null
                            }],
                            wakeupTime: null,
                            sleepTime: null,
                            wakeupTimeStr: null,
                            sleepTimeStr: null
                        }
                    ]
                };
            },
            newtraining: function () {
                if (this.previewelem == null)
                    return {
                        name: '',
                        aimTrain: this.user.profile.aimTrain,
                        trainingprogramday: [{
                            number: 1,
                            trainingprogramday_exercise: []
                        }]
                    };
                else {
                    let tmp = JSON.parse(JSON.stringify(this.globalstate.templates != null ? this.globalstate.templates.trainings[this.previewelem] : this.user.trainings[this.previewelem]));
                    delete tmp.id;
                    delete tmp.active;
                    for (let i = 0; i < tmp.trainingprogramday.length; i++) {
                        delete tmp.trainingprogramday[i].id;
                        for (let j = 0; j < tmp.trainingprogramday[i].trainingprogramday_exercise.length; j++)
                            delete tmp.trainingprogramday[i].trainingprogramday_exercise[j].id;
                    }
                    return tmp;
                }
            },
            getpol: function (sex) {
                if (sex == 'male')
                    return "мужской"
                else if (sex == 'female')
                    return "женский"
                else return "-"
            },
            getsomatotype: function (somatotype) {
                var somatotypes = ['Эктоморф', 'Мезоморф', 'Эндоморф']
                if (somatotype != null)
                    return somatotypes[somatotype - 1];
                else
                    return " - ";
            },
            getaimetrain: function (aimeTrain) {
                var aimeTrains = ['Похудение', 'Набор мышечной массы', 'Поддержание текущего веса'];
                if (aimeTrain != null)
                    return aimeTrains[aimeTrain - 1];
                else
                    return " - ";
            },
            getactivity: function (activity) {
                var activitys = {
                    "1.2": "минимум или отсутствие физической нагрузки",
                    "1.375": "занятия фитнесом 3 раза в неделю",
                    "1.4625": " занятия фитнесом 5 раз в неделю",
                    "1.55": " интенсивная физическая нагрузка 5 раз в неделю",
                    "1.6375": " занятия фитнесом каждый день",
                    "1.725": "каждый день интенсивно или по два раза в день",
                    "1.9": "ежедневная физическая нагрузка плюс физическая работа"
                };
                if (activity != null && activitys[activity] != undefined)
                    return activitys[activity];
                else
                    return " - ";
            },
            previewelement: function (event) {
                if (event.itemtype == 'routine')
                    this.showroutine(event.item);
                else if (event.itemtype == 'training')
                    this.showtraining(event.item);
                else if (event.itemtype == 'eating')
                    this.showeating(event.item);
                else if (event.itemtype == 'createroutine') {
                    this.previewelem = event.item
                    this.state = 'createroutine'
                    this.curmenu = 'routine'
                } else if (event.itemtype == 'editroutine') {
                    this.previewelem = event.item
                    this.state = 'editroutine'
                    this.curmenu = 'routine'
                } else if (event.itemtype == 'createtraining') {
                    this.previewelem = event.item
                    this.state = 'createtraining'
                    this.curmenu = 'training'
                } else if (event.itemtype == 'edittraining') {
                    this.previewelem = event.item
                    this.state = 'edittraining'
                    this.curmenu = 'training'
                } else if (event.itemtype == 'createeating') {
                    this.previewelem = event.item
                    this.state = 'createeating'
                    this.curmenu = 'eating'
                } else if (event.itemtype == 'editeating') {
                    this.previewelem = event.item
                    this.state = 'editeating'
                    this.curmenu = 'eating'
                }
            },
            updateroutine: function (data) {
                //this.user.routine
                data.userid = this.userid;
                this.$emit('updateuserroutine', data);
                this.previewelem = data.item;
                this.state = 'routineinfo'
                this.curmenu = 'routine'
            },
            updatetraining: function (data) {
                //this.user.routine
                data.userid = this.userid;
                this.$emit('updateusertraining', data);
                this.previewelem = data.item;
                this.state = 'trainingprograminfo'
                this.curmenu = 'training'
            },
            updateeating: function (data) {
                //this.user.routine
                data.userid = this.userid;
                this.$emit('updateusereating', data);
                this.previewelem = data.item;
                this.state = 'eatingprograminfo'
                this.curmenu = 'eating'
            },
            removeroutine: function (data) {


                var ob = data;
                var vuenode = this;
                this.$vuedals.open({
                    title: 'Удаление распорядка дня',

                    component: {
                        name: 'inside-modal',

                        template: `<div>Подтвердите удаление распорядка дня
							<div class="buttons">
								<input type="button" class="success" value='Удалить' v-on:click = "$vuedals.close({result: 'confirm'})">
								<input type="button" class="reject" value='Отмена' v-on:click = "$vuedals.close({result: 'reject'})">
							</div>
							</div>
                    		`,
                    },
                    onClose(data) {
                        //console.log(data);
                        if (data.result == "confirm") {
                            $.post("/members/deleteuserroutine/" + vuenode.userid + "/" + ob.id, {}, function (data) {
                                try {
                                    obj = $.parseJSON(data);
                                    if (obj.status == "success") {
                                        vuenode.$emit("removeroutine", ob);
                                        showsuccess("Распорядок дня успешно удалён")
                                    } else {
                                        showerror("Во время удаления распорядка дня возникла ошибка. <p>" + obj.msg + "</p>");
                                    }

                                } catch (e) {
                                    showerror();
                                }
                            })
                        }
                    }
                })
            },
            removetraining: function (data) {
                var ob = data;
                var vuenode = this;
                this.$vuedals.open({
                    title: 'Удаление программы тренировок',

                    component: {
                        name: 'inside-modal',

                        template: `<div>Подтвердите удаление программы тренировок
							<div class="buttons">
								<input type="button" class="success" value='Удалить' v-on:click = "$vuedals.close({result: 'confirm'})">
								<input type="button" class="reject" value='Отмена' v-on:click = "$vuedals.close({result: 'reject'})">
							</div>
							</div>
                    		`,
                    },
                    onClose(data) {
                        //console.log(data);
                        if (data.result == "confirm") {
                            $.post("/members/deleteusertrainingprogram/" + vuenode.userid + "/" + ob.id, {}, function (data) {
                                try {
                                    obj = $.parseJSON(data);
                                    if (obj.status == "success") {
                                        vuenode.$emit("removetraining", ob);
                                        showsuccess("Программа тренировок успешно удалена!")
                                    } else {
                                        showerror("Ошибка удаления программы тренировок!");
                                    }
                                } catch (e) {
                                    showerror();
                                }
                            })
                        }
                    }
                })
            },
            removeeating: function (data) {
                var ob = data;
                var vuenode = this;
                this.$vuedals.open({
                    title: 'Удаление программы питания',

                    component: {
                        name: 'inside-modal',

                        template: `<div>Подтвердите удаление программы питания
							<div class="buttons">
								<input type="button" class="success" value='Удалить' v-on:click = "$vuedals.close({result: 'confirm'})">
								<input type="button" class="reject" value='Отмена' v-on:click = "$vuedals.close({result: 'reject'})">
							</div>
							</div>
                    		`,
                    },
                    onClose(data) {
                        //console.log(data);
                        if (data.result == "confirm") {
                            $.post("/members/deleteusereatingprogram/" + vuenode.userid + "/" + ob.id, {}, function (data) {
                                try {
                                    obj = $.parseJSON(data);
                                    if (obj.status == "success") {
                                        vuenode.$emit("removeeating", ob);
                                        showsuccess("Программа питания успешно удалена!")
                                    } else {
                                        showerror("Ошибка удаления программы питания!");
                                    }
                                } catch (e) {
                                    showerror();
                                }
                            })
                        }
                    }
                })
            },
            activeroutine: function (data) {
                var ob = data;
                var vuenode = this;
                $.post("/members/activeuserroutine/" + this.userid + "/" + data.id, {}, function (data) {
                    try {
                        obj = $.parseJSON(data);
                        if (obj.status == "success") {
                            vuenode.$emit("activeroutine", ob);
                            showsuccess("Активный распорядок успешно изменён!")
                        } else {
                            showerror("Ошибка смены активного распорядка!");
                        }

                    } catch (e) {
                        showerror();
                    }
                })
            },
            activetraining: function (data) {
                var ob = data;
                var vuenode = this;
                $.post("/members/activeusertrainingprogram/" + this.userid + "/" + data.id, {}, function (data) {
                    try {
                        obj = $.parseJSON(data);
                        if (obj.status == "success") {
                            vuenode.$emit("activetraining", ob);
                            showsuccess("Активная программа тренировок успешно изменена!")
                        } else {
                            showerror("Ошибка активации программы тренировок!");
                        }

                    } catch (e) {
                        showerror();
                    }
                })
            },
            activeeating: function (data) {
                var ob = data;
                var vuenode = this;
                $.post("/members/activeusereatingprogram/" + this.userid + "/" + data.id, {}, function (data) {
                    try {
                        obj = $.parseJSON(data);
                        if (obj.status == "success") {
                            vuenode.$emit("activeeating", ob);
                            showsuccess("Активная программа питания успешно изменена!")
                        } else {
                            showerror("Ошибка активации программы питания!");
                        }

                    } catch (e) {
                        showerror();
                    }
                })
            },*/
        }
    }
</script>

<style>
    .user-nav-tabs.membertabs {
        margin-bottom: 0;
    }
</style>
