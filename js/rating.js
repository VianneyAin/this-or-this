function check_selected(){
    jQuery('.ratings_stars').each(function(){
        if (jQuery(this).hasClass('selected')){
            jQuery(this).text('star');
        }
        else {
            jQuery(this).text('star_border');
        }
    });
}

jQuery('.ratings_stars').mouseover(function(){
    $(this).prevAll().andSelf().text('star');
});

jQuery('.ratings_stars').mouseout(function(){
    $(this).prevAll().andSelf().text('star_border');
    check_selected();
});

jQuery('.ratings_stars').click(function(){
    $(this).nextAll().removeClass('selected');
    $(this).prevAll().andSelf().addClass('selected');
    $(this).parent().attr('data-rate', $(this).attr('data-rate'));

    var ajax = $.ajax({
        url: ajaxurl,
        data: {
            from : 'user',
            action : 'rate_joke',
            joke_id : jQuery(this).closest('.joke').attr('data-id'),
            rate_value : jQuery(this).parent().attr('data-rate'),
        },
        type: 'POST',
        dataType : 'json',
        beforeSend: function (jqXHR, settings) {
            url = settings.url + "?" + settings.data;
            console.log(url);
        },
        error: function (thrownError) {
            console.log(thrownError);
            alert(thrownError.responseText);
        },
        complete: function () {
        },
        success: function (data, status) {
            console.log(data);
        }
    });
});

function init_rating(){
    jQuery('.rating-action').each(function(){
        if (jQuery(this).attr('data-rate') != null){
            var rate = jQuery(this).attr('data-rate');
            jQuery(this).find('.ratings_stars').each(function(){
                if (jQuery(this).attr('data-rate') == rate){
                    $(this).prevAll().andSelf().addClass('selected');
                    $(this).prevAll().andSelf().text('star');
                }
            });
        }
    });
}

jQuery(document).ready(function(){
    init_rating();
});
