import './bootstrap';

import $ from 'jquery';
window.$ = $;
window.jQuery = $;


// jQuery FIRST
//import $ from 'jquery';
//window.$ = window.jQuery = $;

// Select2 FULL (IMPORTANT)
//import 'select2/dist/js/select2.full.js';
//import 'select2/dist/css/select2.min.css';

// Alpine
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

window.ClassicEditor = ClassicEditor;