import './bootstrap';
import $ from 'jquery';
import axios from 'axios';
import DataTable from 'datatables.net-dt';

window.$ = $;
window.jQuery = $;
window.axios = axios;

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.content;

import 'popper.js';
import "bootstrap"
import "admin-lte"