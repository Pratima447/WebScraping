$(document).ready(function () {
    $('#real_items').css('display', 'none');
    
    var i;
    for (i = 0; i < 8; i++) {
        $('#items').append('<div class="item_main_card item_card_border"><div class=" item_box_shadow img_container"><img class="item_img placeholder_img" src="" alt=""></div>' +
            '<div class="row item_detail_chunk font_size_14 sans_font"><div class="margin_10_0 col-md-3 placeholder_divs"></div><div class="col-md-7 placeholder_divs"></div></div>' +
            '<hr class="custom_line"><div class="chunk"><div class="deal_btn_pos m_b_10 col-md-4 placeholder_divs"></div></div>');
    }
})

$(window).load(function () {
    setTimeout(function () {
        $('#items').css('display', 'none');
        $('#real_items').css('display', 'flex');

    }, 1000)
    
    $.get('/show_items', {})
        .done(function (result) {
            $('#real_items').html('');
            console.log(result);
            var brand_cat = '';
            $.each(result.data, function (key, value) {
                brand_cat = value.brand ? value.brand : value.category;
                
                $('#real_items').append('<div class="item_main_card item_card_border "><div class=" item_box_shadow img_container"><img class="item_img" src='+value.image_url+' alt='+value.prod_name+'></div>' +
                '<div class="offer_card"><p class="offer_text">' + value.discount + ' % OFF </p></div><div class="row item_detail_chunk font_size_14 sans_font"><div class="margin_10_0"><span class="striked_text">'+value.old_price+'/- </span>' +
                    '<span class="red_font">' + value.new_price + '/- </span><div><div><span> B/C:</span><span class="color_9b9b9b">'+brand_cat+'</span></div>'+
                    '<div> <span class="item_title">'+value.prod_name+'</span></div ></div > <hr class="custom_line"><div class="chunk">' +
                '<div class="deal_btn deal_btn_pos m_b_10"><a class="no_deco_text font_size_12 green_font " href="">Get Deal</a> </div> </div> </div>');
        
            })
        })
})


