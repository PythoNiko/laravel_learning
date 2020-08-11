require('./bootstrap');

window.Vue = require('vue');

new Vue({
    el: '#app',
    data: {
        message: 'Hello World',
        name: 'Niko',
        add: 5 + 3
    }
});
