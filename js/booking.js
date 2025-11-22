var selectedSeats = 0;


$(".booked").prop("disabled", true);

$("#seatsContainer").on('click', '.seat', function() {
    var seat = $(this);
 
    if (seat.hasClass('unavailable')) {
        return; // Do nothing if the seat is unavailable
    }

    seat.toggleClass('selected');

    // Update the number of selected seats
    if (seat.hasClass('selected')) {
        selectedSeats++;
    } else {
        selectedSeats--;
    }

    // Update the selected seats text
    $("#selectedSeatsText").html('Selected Seats: ' + selectedSeats);

    // Enable or disable the "Book Tickets" button based on selected seats
    $("#bookButton").prop("disabled", selectedSeats == 0);
});

$('#movieDate').on('change', function(){
    var $movieDetails = $('#movieDetails');

    var movieID = $movieDetails.data('movieid');
    var title = $movieDetails.data('title');
    var poster = $movieDetails.data('poster');
    var ticketPrice = $movieDetails.data('ticketprice');
    var genre = $movieDetails.data('genre');
    var runtime = $movieDetails.data('runtime');
    var plot = $movieDetails.data('plot');
    var movieDate = $('#movieDate').val();

    var queryString = 'movieID=' + encodeURIComponent(movieID) +
                    '&title=' + encodeURIComponent(title) +
                    '&poster=' + encodeURIComponent(poster) +
                    '&ticketPrice=' + encodeURIComponent(ticketPrice) +
                    '&movieDate=' + encodeURIComponent(movieDate) +
                    '&genre=' + encodeURIComponent(genre) +
                    '&runtime=' + encodeURIComponent(runtime) +
                    '&plot=' + encodeURIComponent(plot);

    window.location.href = 'booking.php?' + queryString;
}); 

$('#bookButton').on('click', function() {
    var selectedSeatIDs = [];
    var movieDate = $('#movieDate').val();

    $(".selected").each(function () {
        var seatid = $(this).data("seatid");
        selectedSeatIDs.push(seatid);
    });

    $('#popupMessage').text("You have selected " + 
        selectedSeatIDs.length + " seat(s): " + selectedSeatIDs.join(', '));
    $('#bookingPopup').fadeIn().css('display', 'flex');

    $('#popupOkBtn').on('click', function () {
        $('#bookingPopup').fadeOut();

        window.location.href = 'booking_process.php?bookedSeats=' + selectedSeatIDs + '&movieDate=' + movieDate;
    })
});

$(function() {
    // CODE INSIDE HERE WILL RUN ONLY AFTER ALL THE ELEMENTS ARE LOADED

    computeTotal(); // NO return EXPECTED

    $(".selectitem").on("change",function(){ //each time the select item changes value, we recompute the info
        computeTotal();
    });
});

function computeTotal() {
    var movieNameArray = []; // initialise empty array for item names
    var priceArray = []; // initialise empty array for prices
    var qtyArray = []; // initialise empty array for qty
    var selectedQty = 0; // used to test if any qty>0 has been selected

    $(".itemname").each(function() { // we grab the values of each of the item's name from the itemname class into an array 
        movieNameArray.push($(this).text());
    });

    $(".price").each(function() { // we grab the values of each of the item's price from the price class into an array  
        priceArray.push(parseFloat($(this).text()));
    });

    $(".selectitem option:selected").each(function() { // we grab the values of each of the item selected qty from the selectitem class into an array
        qtyArray.push(parseFloat($(this).val()));
        selectedQty += parseFloat($(this).val()); // increase qty selected
    });


    /*  Process the output string according to values in the name, price and qty arrays */

    var totalPrice=0.0; // reset the total price to zero first
    var output="<hr>"; // create the string to be inserted into the Order information box <div id="itemised"> later.
     
    if (selectedQty>0) { // if at least 1 food item is selected, we cycle through all selected items and calculate the output
        output=output+"<table class='itemtable'><tr><th>Item</th><th>Price</th><th></th><th>Qty</th><th class='rightalign'>Amt</th></tr>"; // add table headers to the output
 
        for (var i=0;i<movieNameArray.length;i++) { // for each of the food item in the array, we will extract the name, price and qty.             
            if (qtyArray[i]>0) { // generate a particular food item if the qty>0
                output=output+"<tr><td class='leftalign'>"+movieNameArray[i]+"</td><td>$"+priceArray[i].toFixed(2)+"</td><td>x</td><td>"+qtyArray[i]+"</td><td class='rightalign'>$"+(priceArray[i]*qtyArray[i]).toFixed(2)+"</td></tr>";
                totalPrice=totalPrice+priceArray[i]*qtyArray[i]; // compute the total price
            }
        }
 
        // generate the subtotal, the gst component and the TOTAL
        output=output+"<tr><td class='totalamt leftalign' colspan=4>SUBTOTAL</td><td class='totalamt rightalign'>$"+totalPrice.toFixed(2)+"</td></tr>";
        output=output+"<tr><td class='totalamt leftalign' colspan=4>9% GST</td><td class='totalamt rightalign'>$"+(totalPrice*0.09).toFixed(2)+"</td></tr>";
        output=output+"<tr><td class='totalamt leftalign' colspan=4>TOTAL</td><td class='totalamt rightalign'>$"+(totalPrice*1.09).toFixed(2)+"</td></tr>";
 
        $('#submit_button').prop("disabled",false); //enables the submit button
        $('#submit_button').removeClass("disabled"); // visually ungrey the button so user knows can click. This class is found in global.css
    } 
    else { // if no qty was selected
        output=output+"No food item selected."; // show message to user
        $('#submit_button').prop("disabled",true); //disables the submit button in the web page (cannot click)
        $('#submit_button').addClass("disabled"); // visually grey out the button so user knows cannot click.
    }                  
    output=output+"</table><hr>"; // ending of table and add a horizontal rule/line.
 
    // Insert the string we generated in the the #itemised div.
$("#itemised").html(output); // set the itemised div with generated content 
}