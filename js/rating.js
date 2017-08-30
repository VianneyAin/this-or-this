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
    console.log('ici');
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
});
