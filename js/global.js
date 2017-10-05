$('#cat-button').sideNav();

jQuery(document).ready(function(){
    $('.button-collapse').sideNav();
    $('.parallax').parallax();

    jQuery('a').each(function(){
        if (jQuery(this).attr('href') != undefined)
        if (jQuery(this).attr('href').match(/000webhost.com/g)){
            jQuery(this).remove();
        }
    });
});
