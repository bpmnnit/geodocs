$(function() {
    // get the click of the create button
    $('#documentModalButton').click(function() {
        $('#documentModal').modal('show')
            .find('#documentModalContent')
            .load($(this).attr('value'));
    });
});