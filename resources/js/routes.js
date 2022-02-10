import Vue from 'vue';
import VueRouter from 'vue-router';

/* IMPORTIAMO I COMPONENTI */
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import Post from './pages/Post.vue';
import NotAvailable from './pages/NotAvailable.vue';

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
        },
        { 
            path: '/blog',
            name: 'blog',
            component: Blog,
        },
        //Rotta dinamica
        {
            path: '/blog/:slug',
            name: 'post',
            component: Post,
        },

        //404 Route
        {
            path: '*',
            name: 'invalid',
            component: NotAvailable,
        }
    ],
});

export default router;