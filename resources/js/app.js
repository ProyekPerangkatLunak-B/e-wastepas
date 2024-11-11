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

// Import and start Alpine.js
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// Import other project dependencies
import "./bootstrap";

// import @fortawesome/fontawesome
import '@fortawesome/fontawesome-free/css/all.css';

// import chart.js
import Chart from 'chart.js/auto';
window.Chart = Chart;

