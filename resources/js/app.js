import './bootstrap';
import $ from 'jquery';
import axios from 'axios';
import DataTable from 'datatables.net-dt';
import Toastify from 'toastify-js'

window.$ = $;
window.jQuery = $;
window.axios = axios;
window.Toastify = Toastify;

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.content;

import 'popper.js';
import "bootstrap"
import "admin-lte"
import 'datatables.net-buttons-dt';
import 'datatables.net-responsive-dt';
import 'datatables.net-searchbuilder-dt';