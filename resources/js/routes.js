import Vue from 'vue';
import VueRouter from 'vue-router';

/* IMPORTIAMO I COMPONENTI */
import Home from './pages/Home.vue';

/* ATTIVIAMO IL ROUTER */
Vue.use(VueRouter)

/* DEFINIZIONI DELLE ROTTE */
const router = new VueRouter({
    mode: 'history',
    routes: [
        { 
            path: '/',
            name: 'home',
            component: Home,
        }
    ],
});

export default router;