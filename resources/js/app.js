import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;
import axios from 'axios';
window.axios = axios;
import DataTable from 'datatables.net-bs5';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.content;

import 'popper.js';
import "bootstrap"
import "admin-lte"
import 'datatables.net-responsive';
import 'datatables.net-responsive-bs5';
import 'datatables.net-searchbuilder-bs5';
import 'datatables.net-searchpanes-bs5';

import '../formvalidation/dist/js/Bootstrap.min.js';
import '../formvalidation/dist/js/FormValidation.min.js';

