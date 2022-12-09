$("#formEmpresa").on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'includes/empresa.php',
        data: $('#formEmpresa').serialize(),
        success: function (response) {
            if (response == "success") {
                window.location.href = "inicio.php";
            } else if (response == "error") {

                $(document).ready(function () {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Esta empresa ya existe',
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
            } else if (response == "fatal-error") {

                $(document).ready(function () {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Ha ocurrido un error inesperado',
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
})