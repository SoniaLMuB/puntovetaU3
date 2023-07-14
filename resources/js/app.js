// import './bootstrap';
import Dropzone from 'dropzone';

import { Select, initTE } from "tw-elements";
initTE({ Select });

Dropzone.autoDiscover = false;
// Configuración del dropzone
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        // En caso que tenga value, lo tomará para llenar los atributos de dropzone
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};

            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('success', function (file, response) {
    // Asigna el value de la imagen (nombre) en el input oculto de create.blade.php
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('removedfile', function () {
    // Para resetear el valor cuando se elimine la imagen
    document.querySelector('[name="imagen"]').value = '';
});