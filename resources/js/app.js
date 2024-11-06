// Import jQuery and make it globally available
import $ from "jquery";
window.$ = $;
window.jQuery = $;

// Import DataTables
import 'datatables.net';

// Import and configure SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;

import 'select2';
import 'select2/dist/css/select2.css';

// Initialize Select2 on jQuery
jQuery(function() {
    if ($.fn.select2 === undefined) {
        console.error("Select2 is not loaded properly.");
    } else {
        console.log("Select2 loaded successfully.");
    }
});

// Import and start Alpine.js
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// Import other project dependencies
import "./bootstrap";
