$(document).ready(function() {
    var options = {
        valueNames: [ 'name', 'description', 'category' ]
    };

    new List('contacts-list', options);

    $('.popbox').popbox();
    $('#show-second-address').bind('click', function(event){
        $('#second-address').toggle();
    });
});
