require('./bootstrap');

window.Vue = require('vue');

Vue.component('date-component', require('./components/DateComponent.vue').default);

const app = new Vue({
    el: '#app',
});
