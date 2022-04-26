$(function () {
    $('.update-modal-click').click(function () {
        console.log('click');
        $('#update-modal')
            .modal('show')
            .find('#updateModalContent')
            .load($(this).attr('value'));
    });
});