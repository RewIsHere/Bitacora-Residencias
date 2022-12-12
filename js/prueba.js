$('#form-subir').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);

    $.ajax({
        data: formData,
        async: false,
        cache: false,
        processData: false,
        contentType: false,
        url: 'includes/upload_archivos.php',
        type: 'POST',
        success: function (response) {
            if (response == "success") {
                window.location.href = "inicio.php";
            } else if (response == "error-ext") {

                $(document).ready(function () {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'No se pueden subir archivos con otras extensiones',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                });
            } else if (response == "error-files") {

                $(document).ready(function () {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Te ha faltado uno o varios archivos por subir',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                });
            }
        }
    });
});