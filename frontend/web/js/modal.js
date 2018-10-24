$(document).ready(function() {
    modalView('.actionCancel', '#declinedModal');
    modalView('.actionApprove', '#acceptdModal');
<<<<<<< HEAD
    modalView('.modalDesign', '#modalFile');
    modalView('.declinedHelp', '#declinedHelpModal');
    modalView('.draft', '#draftModal');
    modalView('.modalShipping-button', '#modalShipping');
    modalView('.modalReminder-button', '#modalReminder');
    modalView('.modalZakazview-button', '#modalZakazview');
    modalView('.modalTodoist-button', '#modalTodoist');
    modalView('.modalZakazcreate-button', '#modalZakazcreate');
    modalView('.modalZakazupdate-button', '#modalZakazupdate');
=======
    modalView('.modalDisain', '#modalFile');
    modalView('.declinedHelp', '#declinedHelpModal');
    modalView('.draft', '#draftModal');
    modalView('.modalShipping-button', '#modalShipping');
>>>>>>> origin/master
    modalView('.financy', '#financeModel');
    bodyModalView('.createClient', '#modalCreateClient', '.modalContentClient');
    bodyModalView('.declinedTodoist', '#modalDeclinedTodoist', '.modalContent');

    $('body').on('click', '.addNotice', function () {
        $('#create-modal_notify').modal('show')
    });

    function modalView(button, modal) {
<<<<<<< HEAD
        $('body').on('click', button, function(e){
=======
        $(button).click(function (e) {
>>>>>>> origin/master
            e.preventDefault();
            $(modal).modal('show')
                .find('.modalContent')
                .load($(this).attr('value'));
        });
    }
    function bodyModalView(button, modal, content){
        $('body').on('click', button, function(e){
            e.preventDefault();
            $(modal).modal('show')
                .find(content)
                .load($(this).attr('value'))
        })
    }
});