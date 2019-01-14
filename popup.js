$(function () {
    $('#profileForm').submit(function () {
        
        Swal({
            type: 'success',
            title: 'Félicitations !',
            text: 'Le patient a été rajouté avec succès !',
            timer: 3000
        });
        return false;
    });
});