jQuery(document).ready(function ($) {
    "use strict";
    $(".responsive-menu").click(function (e) {
        $(".menu>ul").css({display: "block"});
        e.stopPropagation();
        if (e.preventDefault)
            e.preventDefault();
        return false;
    });
    $("body").click(function () {
        $(".menu>ul").css({display: "none"});
    });
});

jQuery(document).ready(function ($) {
   /* GALLERY IMAGE ZOOM */
        $Tesla.swipebox = (jQuery().swipebox) ? ( $(".swipebox").length ? $(".swipebox").swipebox() : ( $('.gallery .gallery-item').length ? $('.gallery .gallery-item a').swipebox() : null ) )  : null;
});
/* ================= SCROOL TOP ================= */
jQuery(document).ready(function ($) {
    "use strict";
    $('.backtotop').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1200, 'swing');
        return false;
    });
});

/* ================= ajax ================= */
/*
function do_ajax(paged) {

    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
            action: 'tt_ajax_get_gallery_pages',
            paged: paged
        },
        success: function(data, textStatus, XMLHttpRequest){
            var pagination = data;
            // refresh pagination
            $('#gallery_pagination').empty();
            $('#gallery_pagination').html(pagination);

            console.log(data);
        },
        error: function(MLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
        }
    });

}

$(function () {

    $('#gallery_pagination').click( function(evt) {
        evt.preventDefault();
        var elm = evt.target;

        if ( $(elm).closest('a').length > 0 ) {
            var pager_link = $(elm).closest('a');
            var pager_href = pager_link.attr('href');
            var delim = 'paged=';
            
            if (pager_href.indexOf(delim) ){

                var splited_arr = pager_href.split(delim);
                var paged = splited_arr[splited_arr.length - 1];
                do_ajax(paged);
            }
        }
    });
});
*/
/* ================= ajax ================= */

/* ================= IE fix ================= */
jQuery(document).ready(function ($) {
    "use strict";
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (obj, start) {
            for (var i = (start || 0), j = this.length; i < j; i++) {
                if (this[i] === obj) {
                    return i;
                }
            }
            return -1;
        };
    }
});

/* ================= START PLACE HOLDER ================= */
jQuery(document).ready(function ($) {
    "use strict";
    $('input[placeholder], textarea[placeholder]').placeholder();
});
/* ================= END PLACE HOLDER ================= */

jQuery('#contact_form').each(function () {

    "use strict";
    var t = jQuery(this);
    var t_result = jQuery('#contact_send');
    var t_result_init_val = t_result.val();
    var validate_email = function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };
    var t_timeout;
    t.submit(function (event) {
        event.preventDefault();
        var t_values = {};
        var t_values_items = t.find('input[name],textarea[name]');
        t_values_items.each(function () {
            t_values[this.name] = jQuery(this).val();
        });
        if (t_values['name'] === '' || t_values['email'] === '' || t_values['message'] === '') {
            t_result.val('Please fill in all the required fields.');
        } else
        if (!validate_email(t_values['email']))
            t_result.val('Please provide a valid e-mail.');
        else console.log(ajaxurl);
            jQuery.post(ajaxurl, "action=tt_ajax_contact_form&" + t.serialize(), function (result) {
                t_result.val(result);
            });
        clearTimeout(t_timeout);
        t_timeout = setTimeout(function () {
            t_result.val(t_result_init_val);
        }, 3000);
    });

});

/* AS JavaScript [START] */

$Tesla = {};