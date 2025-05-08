/* assets/app.js */
import { Tooltip, Toast, Popover } from 'bootstrap'; // Importa los componentes JS que necesites
//import './styles/app.css'; // Importa tus estilos
import './styles/sb-admin-2.min.css'; // Importa tus estilos

// Importa jQuery (si no usas autoProvidejQuery o necesitas una instancia específica)
const $ = require('jquery');
global.$ = global.jQuery = $; // Hacerlo global si es necesario

// Importa Bootstrap JS (y su dependencia Popper.js si es Bootstrap 4/5)
require('bootstrap'); // Asume que bootstrap está en node_modules o copiado en assets/vendor y configurado en webpack

// Importa otros vendors
require('chart.js'); // Ejemplo
// require('../vendor/datatables/jquery.dataTables.min.js'); // Ejemplo si copiaste vendors
// require('../vendor/datatables/dataTables.bootstrap4.min.js'); // Ejemplo

// Importa el JS específico de SB Admin 2
require('./sb-admin-2.min.js'); // Ajusta la ruta según donde lo copiaste

console.log('SB Admin 2 assets loaded!');


// Inicia el soporte de tooltips de Bootstrap (ejemplo)
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl)
    })
});

console.log('Webpack Encore está funcionando!');