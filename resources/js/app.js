require('./bootstrap');

window.Vue = require('vue');

Vue.component('cart-component', require('./components/CartComponent.vue').default);

const app = new Vue({
    el: '#app',
});
