//import Vue
import Vue from 'vue';

//import App
import App from './views/App';

//Vue instance
const app = new Vue({
    el: '#root',
    render: h => h(App)
});