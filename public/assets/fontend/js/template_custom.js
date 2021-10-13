! function() {
    switch ($("#search_about").val()) {
        case "1":
            $("#search_about").trigger("change")

    }
    $(".product_cat_btn").click(function(e) {
        var t = $(this).attr("href");
        window.location.href = t
    }), $(document).on({
        mouseenter: function() {
            $(this).addClass("hvr-glow");
            var e = $(this).find(".fa-shopping-basket");
            e.parent().addClass("animated fadeIn hvr-bubble-float-left")
        }
    }, ".product_box"), $(document).on({
        mouseleave: function() {
            $(this).removeClass("hvr-glow");
            var e = $(this).find(".fa-shopping-basket");
            e.parent().removeClass("animated fadeIn hvr-bubble-float-left")
        }
    }, ".product_box"), $("#search_about").on("change", function() {
        var e = window.location.origin,
            t = $(this).closest("form");
        1 == $(this).val() ? t.attr("action", e + "/profile/search_/" + $('[name="profile_id"]').val()) : t.attr("action", e + "/search-product/search==products+..+key==" + $('[name="key"]').val() + "+..+country==0+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0")
    }), $(".search_from_template").on("click", function(e) {
         e.preventDefault();
        var url = window.location.origin,

            t = $(this).closest("form");
            var search_key = $('input[name="key"].search_key').val();
            if(search_key == ''){
            var query_str = '';
            
            alert("You must enter keyword");
            return false;
          }else{
            var query_str = search_key.split(' ').join('-');
            var query_str = query_str.split('/').join('-');
          }
          alert("You must enter keyword");
           window.location.href = url+'/'+query_str+'/buyerseller/public/search?t=products';

        //"products" == $("#search_about").val() && t.attr("action", e +'/'+query_str+'/search?t=products')
    })
}();