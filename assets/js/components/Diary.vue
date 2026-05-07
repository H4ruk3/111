<template>
    <div class="container fluid">
        <div class="b-calendar">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 dayinfo">
                    <div class="b-calendar__information">
                        <div class="selected-date">
                            <div>
                                <span class="weekday">{{selectedWeekDay | capitalize}}</span>
                            </div>
                            <span class="day">{{selectedDayAndMonth.day}}</span>
                            <span class="month">{{selectedDayAndMonth.month | capitalize}}</span>
                        </div>
                        <div class="b-event-container" v-if="windowWidth > 480">
                            <!--<h4>Events:</h4>-->
                            <!--<create-event-form v-on:create="createEvent" v-on:update="newEventForm.eventTitle = $event"></create-event-form>-->
<!--                            <div class="btn-group btn-group-sm" role="group">-->
<!--                                <button type="button" class="btn btn-outline-light" :class="{'active': visibility === 'all'}" @click="changeVisibility('all')">All</button>-->
<!--                                <button type="button" class="btn btn-outline-light" :class="{'active': visibility === 'completed'}" @click="changeVisibility('completed')">completed</button>-->
<!--                                <button type="button" class="btn btn-outline-light" :class="{'active': visibility === 'active'}" @click="changeVisibility('active')">active</button>-->
<!--                            </div>-->
                            <transition-group name="event-list" tag="ul" class="event-list" v-if="filteredEventListForSelectedDate.length > 0">
                                <li class="event" :class="{'completed': event.completed}" v-for="event in filteredEventListForSelectedDate" :key="event.id">
                                    <span class="title">{{event.title}}</span>
                                    <div class="buttons">
                                        <button type="button" class="btn completed-event-btn" :class="{'completed': event.completed}" @click="changeCompletedEvent(event)">
                                            <i class="fa" :class="event.completed ? 'fa-check-square' : 'fa-square-o'" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn delete-event-btn" @click="deleteEvent(event)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </li>
                            </transition-group>
<!--                            <div class="no-events text-center" v-else>-->
<!--                                Event list is empty...-->
<!--                            </div>-->
                        </div>
                        <div class="row mx-0 dayributtonsrow">
                            <a href="" @click.prevent.stop="createEvent()" id="add" class="col-lg-6 dayributtons">
                                <i aria-hidden="true" class="fa fa-plus-square-o"></i>Создать тренировку
                            </a>
                            <a href="" @click.prevent.stop="$router.push({ path: '/diary/show', query: { date: selectedDate.format('YYYY-MM-DD') } })" id="show" class="col-lg-6 dayributtons">
                                <i aria-hidden="true" class="glyphicon glyphicon-list-alt"></i>Просмотреть результаты
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-8 col-8 calendar">
                    <div class="b-calendar__calendar">
                        <div class="b-calendar__header">
                            <div class="row">
                                <div class="col year text-right" align-h="end">
                                    <span>{{year}}</span>
                                </div>
                            </div>
                            <div class="row" align-v="center">
                                <div class="col text-left" align-h="start">
                                    <button type="button" id="goTodayBtn" class="btn btn-outline-dark go-today-btn" @click="goToday" v-show="!todayInCurrentMonthAndYear || !todayIsEqualSelectDate">
                                        Today
                                    </button>
                                    <!--<b-tooltip target="goTodayBtn" v-show="!todayInCurrentMonthAndYear || !todayIsEqualSelectDate">
                                        Back to today
                                    </b-tooltip>-->
                                </div>
                                <div class="col text-center" align-h="center">

                                </div>
                                <div class="col month-change-container text-right d-flex flex-row-reverse align-items-center" align-h="end">
                                    <button type="button" id="addMonthBtn" class="arrow arrow-right btn btn-light" variant="light" @click="addMonth">
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                    <!--<b-tooltip target="addMonthBtn">
                                        {{nextMonthAsString | capitalize}}
                                    </b-tooltip>-->
                                    <div class="month text-center">{{month}}</div>
                                    <button type="button" id="subtractMonthBtn" class="btn arrow arrow-left" variant="light" @click="subtractMonth">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <!--<b-tooltip target="subtractMonthBtn">
                                        {{previousMonthAsString | capitalize}}
                                    </b-tooltip>-->
                                </div>
                            </div>
                        </div>
                        <div class="b-calendar__weekdays">
                            <div class="weekday" v-for="(day, index) in days" :key="index">
                                <strong>{{day}}</strong>
                            </div>
                        </div>
                        <div class="b-calendar__dates">
                            <div class="date text-right" :class="{
                                    'selected': dateIsEqualSelectDate(date),
                                    'hastraining': eventList.filter(function(event) {
                                        return event.date === date.moment.format('DD.MM.YYYY');
                                    }).length > 0,
                                    'today': date.today,
                                    'blank': date.blank,
                                    'no-border-right': date.key % 7 === 0
                                }" v-for="date in dateList" :key="date.key" :data-date="date.date">
                                <a class="link" @click="setSelectedDate(date.moment)"></a>
                                <span class="day">{{date.dayNumber}}</span>
                                <span class="weekday">{{date.weekDay}}</span>
                                <div class="additional" v-show="date.additional">
                                    <span class="year" v-show="date.additional.year">{{date.additional.year}}</span>
                                    <span class="month" v-show="date.additional.month">{{date.additional.month}}</span>
                                </div>
                                <button type="button" :aria-controls="'collapseEvent' + date.key" class="btn btn-primary collapsed b-event-container event-mobile-container" aria-expanded="false" :class="{'show': !collapseEventList}" v-if="((windowWidth <= 480) && dateIsEqualSelectDate(date))" ></button>
                                    <div :id="'collapseEvent' + date.key" class="collapse">
                                    <h4>Events:</h4>
                                    <!--<create-event-form v-on:create="createEvent" v-on:update="newEventForm.eventTitle = $event"></create-event-form>-->
                                        <div class="buttons">
                                            <button type="button" class="btn btn-outline-light" :class="{'active': visibility === 'all'}" @click="changeVisibility('all')">All</button>
                                            <button type="button" class="btn btn-outline-light" :class="{'active': visibility === 'completed'}" @click="changeVisibility('completed')">completed</button>
                                            <button type="button" class="btn btn-outline-light" :class="{'active': visibility === 'active'}" @click="changeVisibility('active')">active</button>
                                        </div>
                                    <transition-group name="event-list" tag="ul" class="event-list" v-if="filteredEventListForSelectedDate.length > 0">
                                        <li class="event" :class="{'completed': event.completed}" v-for="event in filteredEventListForSelectedDate" :key="event.id">
                                            <span class="title">{{event.title}}</span>
                                            <div class="buttons">
                                                <button type="button" class="completed-event-btn" :class="{'completed': event.completed}" @click="changeCompletedEvent(event)">
                                                    <i class="fa" :class="event.completed ? 'fa-check-square' : 'fa-square-o'" aria-hidden="true"></i>
                                                </button>
                                                <button type="button"  class="delete-event-btn" @click="deleteEvent(event)">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </li>
                                    </transition-group>
                                    <div class="no-events text-center" v-else>
                                        Event list is empty...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal name="addtrainingmodal" :width="400"
               :height="220"
               :adaptive="true">
            <div class="modal-dialog custom">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Планирование тренировки</h5>
                        <button type="button" class="btn-close" aria-label="Close" @click="$modal.hide('addtrainingmodal')"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group input-group" style="width:100%">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-clock"></i></span>
                            <vue-clock-picker id="trainingtime" name="trainingtime" v-model="newevent.date"></vue-clock-picker>
                            <label class="form-label" style="padding-left: 40px" for="trainingtime" :class="{'active' : newevent.date != null && newevent.date != ''}">Время тренировки</label>
                        </div>
                        <a href="" id="plan" class="col-lg-12 mx-0 dayributtons" @click.stop.prevent="createtraining()">
                            Запланировать
                        </a>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import PerfectScrollbar from 'perfect-scrollbar';
    import moment from 'moment';

    export default {
        name: "Diary",
        data() {
            return {
                today: moment(),
                dateContext: moment(),
                selectedDate: moment(),
                days: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
                //events
                newevent: {
                    title: 'тренировка',
                    date: null
                },
                eventList: [{
                    id: 0,
                    title: "test event",
                    complleted: false,
                    date: '10.09.2021'
                }],
                visibility: 'all',
                windowWidth: window.outerWidth,
                collapseEventList: true
            }
        },
        watch: {
            /*eventList: {
                handler: function(eventList) {
                    eventStorage.save(eventList);
                },
                deep: true,
                immediate: true
            }*/
        },
        computed: {
            //calendar
            year: function() {
                return this.dateContext.format("Y");
            },
            month: function() {
                this.dateContext.locale("ru");
                return this.dateContext.format("MMMM");
            },
            daysInMonth: function() {
                return this.dateContext.daysInMonth();
            },
            currentDate: function() {
                return this.dateContext.get("date");
            },
            firstDayOfMonth: function() {
                let firstDay = moment(this.dateContext).subtract(
                    this.currentDate,
                    "days"
                );
                return firstDay.weekday();
            },
            previousMonth: function() {
                return moment(this.dateContext).subtract(1, "month");
            },
            previousMonthAsString: function() {
                return this.previousMonth.format("MMMM");
            },
            nextMonth: function() {
                return moment(this.dateContext).add(1, "month");
            },
            nextMonthAsString: function() {
                return this.nextMonth.format("MMMM");
            },

            daysInPreviousMonth: function() {
                return this.previousMonth.daysInMonth();
            },
            daysFromPreviousMonth: function() {
                let daysList = [];
                let count = this.daysInPreviousMonth - this.firstDayOfMonth;
                while (count < this.daysInPreviousMonth) {
                    count++;
                    daysList[count] = count;
                }

                return daysList.filter(function() {
                    return true;
                });
            },

            dateList: function() {
                let $this = this;

                let dateList = [];

                let previousMonth = this.previousMonth;
                let nextMonth = this.nextMonth;

                //dates for display
                let formattedCurrentMonth = this.dateContext.format("MM");
                let formattedCurrentYear = this.year;
                let formattedPreviousMonth = previousMonth.format("MM");
                let formattedPreviousYear = previousMonth.format("Y");
                let formattedNextMonth = nextMonth.format("MM");
                let formattedNextYear = nextMonth.format("Y");

                //counters
                let countDayInCurrentMonth = 0;
                let countDayInPreviousMonth = 0;

                //filling in dates from the previous month
                this.daysFromPreviousMonth.forEach(function(dayFromPreviousMonth) {
                    countDayInCurrentMonth++;
                    countDayInPreviousMonth++;

                    let formattedDay = $this.formattingDay(dayFromPreviousMonth);
                    let previousMonth =
                        $this.daysFromPreviousMonth.length ===
                        countDayInPreviousMonth
                            ? $this.previousMonthAsString
                            : false;
                    let previousYear =
                        formattedCurrentYear !== formattedPreviousYear &&
                        $this.daysFromPreviousMonth.length ===
                        countDayInPreviousMonth
                            ? formattedPreviousYear
                            : false;
                    let additional = {
                        month: previousMonth,
                        year: previousYear
                    };

                    if (!previousMonth && !previousYear) {
                        additional = false;
                    }

                    dateList[countDayInCurrentMonth] = {
                        key: countDayInCurrentMonth,
                        dayNumber: formattedDay,
                        date:
                            formattedDay +
                            "." +
                            formattedPreviousMonth +
                            "." +
                            formattedPreviousYear,
                        blank: true,
                        today: false,
                        additional: additional,
                        weekDay: false,
                        moment: moment(
                            formattedPreviousYear +
                            formattedPreviousMonth +
                            formattedDay
                        )
                    };
                });

                //filling in dates from the current month
                while (
                    countDayInCurrentMonth <
                    this.firstDayOfMonth + this.daysInMonth
                    ) {
                    countDayInCurrentMonth++;

                    let day = countDayInCurrentMonth - countDayInPreviousMonth;
                    let weekDay = this.getWeekDay(countDayInCurrentMonth);
                    let formattedDay = this.formattingDay(day);

                    dateList[countDayInCurrentMonth] = {
                        key: countDayInCurrentMonth,
                        dayNumber: formattedDay,
                        date:
                            formattedDay +
                            "." +
                            formattedCurrentMonth +
                            "." +
                            formattedCurrentYear,
                        blank: false,
                        today:
                            formattedDay === this.todayDate &&
                            this.todayInCurrentMonthAndYear,
                        additional: false,
                        weekDay: weekDay,
                        moment: moment(
                            formattedCurrentYear +
                            formattedCurrentMonth +
                            formattedDay
                        )
                    };
                }

                let daysInNextMonth = 7 - (countDayInCurrentMonth % 7);
                let countDayInCurrentMonthSaved = countDayInCurrentMonth;
                let day = 0;

                //filling in dates from the next month
                if (daysInNextMonth < 7) {
                    while (
                        countDayInCurrentMonth <
                        countDayInCurrentMonthSaved + daysInNextMonth
                        ) {
                        countDayInCurrentMonth++;
                        day++;

                        let formattedDay = this.formattingDay(day);
                        let nextMonth = day === 1 ? this.nextMonthAsString : false;
                        let nextYear =
                            formattedCurrentYear !== formattedNextYear && day === 1
                                ? formattedNextYear
                                : false;
                        let additional = {
                            month: nextMonth,
                            year: nextYear
                        };

                        if (!nextMonth && !nextYear) {
                            additional = false;
                        }

                        dateList[countDayInCurrentMonth] = {
                            key: countDayInCurrentMonth,
                            dayNumber: formattedDay,
                            date:
                                formattedDay +
                                "." +
                                formattedNextMonth +
                                "." +
                                formattedNextYear,
                            blank: true,
                            today: false,
                            additional: additional,
                            weekDay: false,
                            moment: moment(
                                formattedNextYear +
                                formattedNextMonth +
                                formattedDay
                            )
                        };
                    }
                }

                return dateList.filter(function() {
                    return true;
                });
            },

            todayDate: function() {
                return this.formattingDay(this.today.get("date"));
            },
            todayMonth: function() {
                return this.today.format("MMMM");
            },
            todayYear: function() {
                return this.today.format("Y");
            },

            //get selected day and month
            todayInCurrentMonthAndYear: function() {
                return (
                    this.month === this.todayMonth && this.year === this.todayYear
                );
            },

            //get selected day and month
            selectedDayAndMonth: function() {
                this.selectedDate.locale("ru");
                let dayAndMonth = this.selectedDate.format("DD MMMM");
                dayAndMonth = dayAndMonth.split(" ");
                dayAndMonth = {
                    day: dayAndMonth[0],
                    month: dayAndMonth[1]
                };

                return dayAndMonth;
            },

            //get selected weekday
            selectedWeekDay: function() {
                return this.selectedDate.format("dddd");
            },

            //comparison today with selectedDate
            todayIsEqualSelectDate: function() {
                return (
                    this.selectedDate.format("YYYYMMDD") ===
                    this.today.format("YYYYMMDD")
                );
            },

            //events
            /**
             *  get list events for selected in calendar date
             */
            eventListForSelectedDate: function() {
                var vue = this;
                return this.eventList.filter(function(event) {
                    return event.date === vue.selectedDate.format("DD.MM.YYYY");
                });
            },

            /**
             *  get filtered list events for selected in calendar date and completed filter
             */
            filteredEventListForSelectedDate: function() {
                return this.eventListForSelectedDate;
                //return filters[this.visibility](this.eventListForSelectedDate);
            }
        },
        methods: {
            //calendar

            //changing date list
            addMonth: function() {
                this.dateContext = this.nextMonth;
            },
            subtractMonth: function() {
                this.dateContext = this.previousMonth;
            },

            //changing selected date
            setSelectedDate: function(moment) {
                if (
                    this.selectedDate.format("YYYYMMDD") !==
                    moment.format("YYYYMMDD")
                ) {
                    moment.locale("ru");
                    this.selectedDate = moment;
                    this.collapseEventList = false;
                } else {
                    this.collapseEventList = !this.collapseEventList;
                }
            },

            //set selected date as today
            goToday: function() {
                this.selectedDate = this.today;
                this.dateContext = this.today;
            },

            //add 0 before [1..9] numbers in day
            formattingDay: function(day) {
                return ("0" + day).slice(-2);
            },

            //get weekday from data Weekdays
            getWeekDay: function(day) {
                let index = day;
                if (index > 7) {
                    index %= 7;
                }
                index = index === 0 ? 6 : index - 1;
                return this.days[index];
            },

            //selected date compare with date
            dateIsEqualSelectDate: function(date) {
                return (
                    this.selectedDate.format("YYYYMMDD") ===
                    date.moment.format("YYYYMMDD")
                );
            },

            //events

            //disable form submitting
            onSubmit: function(event) {
                event.preventDefault();
            },
            //adding event
            createEvent: function() {
                /*let eventTitle =
                    this.newEventForm.eventTitle &&
                    this.newEventForm.eventTitle.trim();
                if (!eventTitle) {
                    return;
                }
                this.eventList.push({
                    id: eventStorage.uid++,
                    title: eventTitle,
                    completed: false,
                    date: this.selectedDate.format("DD.MM.YYYY")
                });
                this.newEventForm.eventTitle = "";*/
                this.$modal.show('addtrainingmodal');
            },
            createtraining() {
                var date = this.selectedDate.format("YYYY-MM-DD")
                date+=' '+this.newevent.date;
                axios.post('/api/diary/add', {'date': date}).then(resp => {
                    console.log(resp.data);
                    this.$modal.hide('addtrainingmodal');
                    this.eventList.push({
                        id: resp.data.diary.id,
                        title: this.newevent.title,
                        completed: false,
                        date: this.selectedDate.format("DD.MM.YYYY")
                    });
                    //this.$router.push('/programs/trainingprogram/'+resp.data.trainingprogram.id);
                })
                    .catch(err => {
                        console.log(err);
                    })
                //console.log(date);
            },

            changeCompletedEvent: function(event) {
                event.completed = !event.completed;
            },

            deleteEvent: function(event) {
                let index = this.eventList.indexOf(event);
                this.eventList.splice(index, 1);
            },

            changeVisibility: function(visibility) {
                if (filters[visibility]) {
                    this.visibility = visibility;
                } else {
                    this.visibility = VISIBILITY_ALL;
                }
            }
        },
        filters: {
            capitalize: function(value) {
                if (!value) return "";
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1);
            }
        },
        mounted() {
            this.$nextTick(() => {
                window.addEventListener("resize", () => {
                    this.windowWidth = window.innerWidth;
                });
                axios.get("/api/diary").then(resp => {
                    console.log(resp.data);
                    this.eventList = resp.data.events;
                    /*this.eventList.push({
                        id: resp.data.diary.id,
                        title: this.newevent.title,
                        completed: false,
                        date: this.selectedDate.format("DD.MM.YYYY")
                    });*/
                    //this.$router.push('/programs/trainingprogram/'+resp.data.trainingprogram.id);
                })
                    .catch(err => {
                        console.log(err);
                    })
            });
        },
    }
</script>

<style scoped>

</style>
