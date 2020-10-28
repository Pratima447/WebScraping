
$('#page').on('change', function () {
    var selected_page = $('#page option:selected').val();
    
    if (selected_page == 'brand_page') {
        $('#brand_options').removeClass('d_none');
        $('#cat_options').addClass('d_none');

    } else if (selected_page == 'category_page') {
        $('#cat_options').removeClass('d_none');
        $('#brand_options').addClass('d_none');

    }
})

$('#get_site_data').on('click', function () {

    var selected_site = $('#site option:selected').val();
    var selected_page = $('#page option:selected').val();

    if (!selected_page) {
        alert("Please select page to consider !");
        return false;
    }

    if (selected_page == 'brand_page') {
        var brand_url      = $('#brand option:selected').val();
        var selected_brand = $('#brand option:selected').text().toLowerCase();
        selected_brand     = selected_brand.replace(" ", "-");

        if (! brand_url) {
            alert("Please select Brand!");
            return false;
        }
        var selected_cat = '';

        var site_url = selected_site + brand_url;

    } else if (selected_page == 'category_page') {
        var cat_url      = $('#category option:selected').val();
        var selected_cat = $('#category option:selected').text().toLowerCase();
        selected_cat = selected_cat.replace(" ", "-");
        
        if (! cat_url) {
            alert("Please select Category!");
            return false;
        }

        var selected_brand = '';

        var site_url = selected_site + cat_url;

    }

    console.log(site_url);
  
    console.log('Calling API for fetching data');

    $.get('/get_items_data', { site_url :site_url, site: selected_site, cat: selected_cat, brand : selected_brand })
        .done(function (result) {
            console.log(result);
            alert(result);
        })
})