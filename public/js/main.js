$(document).ready(function () {
    //List related stuff
    var options = {
        valueNames: [ 'first-name', 'last-name', 'email', 'birth-date', 'cell-phone', 'home-phone', 'work-phone', 'addresses' ]
    };
    new List('contacts-list', options);

    $('.popbox').popbox();
    $('.show-second-address').bind('click', function (event) {
        $('.second-address').toggle();
    });

    $('#contacts-list li').bind('click', function (event) {
        var current = $(this);
        if (current.hasClass('active')) {
            var selected = true;
        }
        $('.active').removeClass('active');
        if (!selected) {
            current.addClass('active');
            $('.edit-button, .delete-button').show();
        } else {
            $('.edit-button, .delete-button').hide();
        }
    });

    $('.delete-button').bind('click', function (event) {
        var confirmed = confirm('Are you sure you want to delete ' + $('.active .first-name').text().trim() + '?');
        if (confirmed) {
            var id = $('.active').attr('id');
            window.location = '/contacts/delete?id=' + id;
        }
    });

    $('.edit-button').bind('click', function (event) {
        var id = $('.active').attr('id');
        var box = $('.box');
        box.block({ message: null });
        $.get('/contacts/edit?id=' + id, function (data) {

            var info = jQuery.parseJSON(data);
            var form = $("form[name='edit_contact_form']");
            $.each(info, function (i, item) {
                form.find("input[name='" + i + "']").val(info[i]);
            });
            box.unblock();
        });
    });

    $('.form-submit').bind('click', function (event) {
        //TODO: Add validation
        $('.box').block({ message: null });
        $(this).closest("form").submit();
    });

    //Hotkeys
    $(window).keydown(function (event) {
        var target = $(event.target);
        if (event.which == 13) { // enter
            var form = target.closest('form')
            if (form.length) {
                $(form[0]).find('.form-submit').click();
            }
        }

        if (!target.is('input')) {
            if (event.which == 78) {        //n
                $('.add-button').click();
                $('form[name="new_contact_form"] input[name="first_name"]').focus();
                event.preventDefault();
            } else if (event.which == 69) { //e
                if ($('.active').length) {
                    $('.edit-button').click();
                    $('form[name="edit_contact_form"] input[name="first_name"]').focus();
                    event.preventDefault();
                }
            } else if (event.which == 70) { //f
                $('.search').focus();
                event.preventDefault();
            } else if (event.which == 38) { //up arrow
                var active = $('.active');
                if (!active.length) {
                    active = $('.list').children(":first").click();
                }else{
                    active.prev().click();
                }
            } else if (event.which == 40) { //down arrow
                var active = $('.active');
                if (!active.length) {
                    active = $('.list').children(":first").click();
                }else{
                    active.next().click();
                }
            }
        }
    });
});
