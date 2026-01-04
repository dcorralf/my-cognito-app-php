import './bootstrap';
import * as bootstrap from 'bootstrap'; // Importamos Bootstrap 5

// ESTA ES LA CLAVE:
// Asignamos bootstrap a la ventana global para poder usarlo
// en tus archivos .blade.php dentro de las etiquetas <script>
window.bootstrap = bootstrap;
