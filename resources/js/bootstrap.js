window._ = require('lodash');
import "bootstrap";
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}





window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
