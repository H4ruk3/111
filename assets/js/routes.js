import VueRouter from 'vue-router';
import AppGreet from './components/AppGreet.vue';
import SecondApp from './components/SecondApp.vue';
import TrainingprogramsList from "./components/TrainingprogramsList";
import TotalPrograms from "./components/TotalPrograms";
import Createtrainingprogram from "./components/Createtrainingprogram";
import TrainingprogramInfo from "./components/TrainingprogramInfo";
import Diary from "./components/Diary";
import DiarydayShow from "./components/DiarydayShow";

export const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/programs',
            name: 'root',
            component: TotalPrograms
        },
        {
            path: '/programs/trainingprogram',
            name: 'root',
            component: TrainingprogramInfo,
        },
        {
            path: '/programs/trainingprogram/create',
            name: 'createtrainingprogram',
            component: Createtrainingprogram,
            props: {trainingid: null}
        },
        {
            path: '/programs/trainingprogram/:id',
            name: 'root',
            component: TrainingprogramInfo,
            props: true
        },

        {
            path: '/programs/trainingprogram/edit/:trainingid',
            name: 'createtrainingprogram',
            component: Createtrainingprogram,
            props: true
        },
        {
            path: '/programs/second',
            name: 'posts',
            component: SecondApp
        },
        {
            path: '/diary',
            name: 'diary',
            component: Diary
        },
        {
            path: '/diary/show',
            name: 'diary',
            component: DiarydayShow,
            //props: route => ({ query: route.query.q })
            props: route => ({ date: route.query.date })
        },
    ],
});
