$('#form-subir').on('submit', function (e) {
    e.preventDefault();

    var formData = new FormData();
    let tipo_doc = document.getElementById("tipo_doc").value
    formData.append('tipo_doc', tipo_doc);
    // Attach file
    formData.append('archivo', $('input[type=file]')[0].files[0])

    var fileInput =
        document.getElementById('archivo');

    var filePath = fileInput.value;

    // Allowing file type
    var allowedExtensions =
        /(\.pdf)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    }
    $.ajax({
        data: formData,
        async: false,
        cache: false,
        processData: false,
        contentType: false,
        url: 'includes/upload_archivos.php',
        type: 'POST',
        timeout: 10000,
        beforeSend: function () {
            //document.getElementById("resultado_busqueda" ").innerHTML= '<img src=*img/load.gif" style="width:120px,">
        },
        success: function (response) {
            document.getElementById(tipo_doc).innerHTML = response;

        },
        error: function (response, error) {
            document.getElementById("Solicitud_res").innerHTML = error;
        }
    });
});