$(document).ready(function (){
    $('.delete').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Você tem certeza que deseja deletar?',
            text: "Isso não poderá ser desfeito",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
            if (result.value) {
                location.href = $(this).attr('href');
                Swal.fire(
                    'Deletado!',
                    'O registro foi deletado.',
                    'success'
                )
            }
        });
    });
});