//import Vue
import Vue from 'vue';
import router from './routes';

//import App
import App from './views/App';

//Vue instance
const app = new Vue({
    el: '#root',
    router,
    render: h => h(App)
});