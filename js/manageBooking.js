$(".Cancelbutton").on('click', function(){
    var cancel = $(this).val();
    if (confirm("Are you sure?")){
        window.location.href = 'deleteBooking.php?ticketID=' + cancel;
    }
});