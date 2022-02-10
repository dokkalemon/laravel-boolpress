import Vue from 'vue';
import VueRouter from 'vue-router';

/* IMPORTIAMO I COMPONENTI */
import Home from './pages/Home.vue';
import About from './pages/About.vue';

/* ATTIVIAMO IL ROUTER */
Vue.use(VueRouter)

/* DEFINIZIONI DELLE ROTTE */
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { 
            path: '/',
            name: 'home',
            component: Home,
        },
        { 
            path: '/about',
            name: 'about',
            component: About,
        }
    ],
});

export default router;