import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    url: '/imagenes',
    dictDefaultMessage: 'Sube tu imagen aquí',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar imagen',
    dictRemoveFileConfirmation: '¿Estás seguro de que quieres eliminar este archivo?',
    dictCancelUpload: 'Cancelar carga',
    maxFiles: 1,
    uploadMultiple: false, 

    init: function() {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234; // Tamaño ficticio, no es necesario para mostrar la imagen
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            this.files.push(imagenPublicada);
        }
    },
});

dropzone.on('sending', function(file, xhr, formData) {
    formData.append('_token', document.querySelector('[name="_token"]').value);
});


dropzone.on('success', function(file, response) {
    const input = document.querySelector('[name="imagen"]');
    if (input) {
        input.value = response.imagen;
    }
});

dropzone.on('removedfile', function(file) {
    const input = document.querySelector('[name="imagen"]');
    if (input) {
        input.value = '';
    }
});

