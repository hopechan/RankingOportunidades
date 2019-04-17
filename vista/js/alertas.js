function agregarEstudiante(){
    let nombre = document.getElementByName('txtNombre').value;
    let apellidos = document.getElementByName('txtApellidos').value;
    let fecha = document.getElementByName('txtFechaNac').value;
    let telefono = document.getElementByName('txtTelefono').value;
    let email = document.getElementByName('txtEmail').value;
    let direccion = document.getElementByName('txtDireccion').value;

    swal({
        title: '¿Los datos son correcto?',
        text:'Revise que los datos sean correctos antes de guardarlo',
        type: 'question',
        showCancelButton: true,
    });
}