
import './loading';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

import argEmprUnidades from './components/ArgEmprUnidades';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.data('argEmprUnidades', argEmprUnidades);

Alpine.start();