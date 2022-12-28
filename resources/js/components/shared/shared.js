export default {
    showStatus: function (message, type = 'success') {



        if (type == "success") {
            // document.getElementById("sweetalertaudiosuccess").play();
            $(".tagsinput").tagsinput('removeAll')
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: type,
                title: message,
            })
        }
        else if (type == "error") {
            // document.getElementById("sweetalertaudioerror").play();

            Swal.fire({
                icon: type,
                title: message,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            })


        }
        $('.modal').modal("hide");


    }
}
