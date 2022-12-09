$("#formRegistro").on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'includes/register.php',
        data: $('#formRegistro').serialize(),
        success: function (response) {
            if (response == "success") {
                window.location.href = "login.php";
            } else if (response == "error") {

                $(document).ready(function () {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Este numero de control ya existe',
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
            } else if (response == "fatal_error") {

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