

var trade_edit_form_check_box_checker, generate_trade_search_result,base_url;

base_url = $("[name='url']").val();


trade_edit_form_check_box_checker = function(){
    var cat_id,cat_arr,parent_cat,chield_cat;
    cat_id = $('[name="hidden_categorie"]').val();
    cat_arr = cat_id.split(",");
    parent_cat = cat_arr[0];
    for(i=1;i<cat_arr.length;i++){
        $("input[type='checkbox'][value='"+parent_cat+"']").prop('checked', true);
        $(".chield_id[type='checkbox'][value='"+cat_arr[i]+"']").prop('checked', true);
    }
};

generate_trade_search_result = function(data){
    var template = "";
    var edit_url = base_url+'/admin/tradeshow-edit';
    var delete_url = base_url+'/admin/tradeshow-delete';
    $('.trade_table_body').html(template);
    $.each(data,function(i,v){
        template += "<tr>" +
                "<td>"+ v.title+"</td>" +
                "<td>"+ v.venue+"</td>" +
                "<td>"+ v.country+"</td>" +
                "<td>"+ v.created_at+"</td>" +
                "<td>" +
                    "<a href="+edit_url+'/'+v.id+" class='btn btn-xs btn-info'>Edit</a>" +
                    "<a href="+delete_url+'/'+ v.id+" class='btn btn-xs btn-danger trade_delete'>Delete</a>" +
            "</td>" +
            "</tr>";
    });
    $('.trade_table_body').html(template);
    return;
};


(function(){

    //$('.date').datepicker({
    //    dateFormat: 'yy-mm-dd',
    //});
    //$("body").niceScroll();
    $(window).load(function(){
        if ($('a[href="#forbuyer"]').text() == 'Hot Brands'){
            $('a[href="#forbuyer"]').click();
        }
        $('a[href="#details"]').click();
        $('.mymenu li.active').removeClass('active');
        $('a[href="#section-user-gd1"]').click().parent().addClass('active');
        
    
        $('#scrollUp').html("<i class='fa fa-angle-up text-center' style='display:block'></i><p class='text-center' style='font-size:10px;display:block;margin-top:5%'>TOP</p>").css('height','38px');
    })
    // $('.contact_supplier').animatedModal({
    //     color:"rgba(102, 102, 102,.92)",
    //     animatedIn:"lightSpeedIn"
    // });
    
    if($('.trade_edit_form').length>0){
        trade_edit_form_check_box_checker();
    }
    $(document).on({click:function(e){
        e.preventDefault();
        $('[name="country_id"]').val($(this).data('country_id'));
    }},'.country_str');

    $(document).on({click:function(e){
        e.preventDefault();
        $('.show_trade_list').show();
        var url = $('.trade_search_form').attr('action');
        $.post(url,$('.trade_search_form').serialize(),function(r){
            generate_trade_search_result(r);
        })
    }},'.trade_search_btn');

    $(document).on({click:function(e){
        e.preventDefault();
        var reletive_tr = $(this).closest('tr');
        $.get($(this).attr('href'),function(r){
            reletive_tr.remove();
        })
    }},'.trade_delete');
   



})();





