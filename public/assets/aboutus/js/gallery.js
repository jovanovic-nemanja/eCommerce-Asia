var output = new String();
var galleryTag = new String();

$(document).ready(function() {
    galleryInit();
});

function galleryInit() {
    lang = $('body').attr('lang');

    $.getJSON("/json/" + lang + "/jPhotoGallery.json", function(data) {
        intialGallery(data.PhotoGalleryList);
    });

    function intialGallery(data) {
        $.each(data, function(index, val) {
            title = this.Title;
            aid = this.ID;
            photolist = this.PhotoList;
            descContent = this.DescContent;

            if (photolist.length > 0) { // check if it is not blank ablum
                galleryTag += '<li title="' + descContent + '"><a href="javascript:getAlbum(' + aid + ');">' + title + '</a></li>';

                $.each(photolist, function(index, val) {
                    pid = index;
                    theCaption = val.Caption;
                    photoPath = val.PhotoPath;
                    url = val.URL;
                    output += '<div class="item" aid="' + aid + '"><img class="lazyOwl gthumb" data-src="' + photoPath + '" caption="' + theCaption + '" aid="' + aid + '" pid="' + pid + '" album="' + title + '" url="' + url + '"></div>\n';
                });

            }
        });
        $('#galleryNav').html(output);
        $('#galleryTag').html(galleryTag);
        $('#galleryTag > li').powerTip({
            placement: 'n'
        }); //enable powerTip

        $("#galleryNav").owlCarousel({
            items: 5,
            lazyLoad: true,
            lazyFollow: true,
            navigation: true,
            navigationText: ["", ""],
            responsive: false,
            rewindNav: false
        });

        gallery = $("#galleryNav").data('owlCarousel');

        //gallery event
        $('#galleryNav').find('.item').click(function(event) {
            $('#galleryNav').find('.item').removeClass('active');
            $(this).addClass('active');

            $thumb = $(this).find('.gthumb');

            //transit the imageShowBox
            $('#imgBox').attr('src', $thumb.data('src'));
            $('#albumTitle').html($thumb.attr('album'));
            //$('#captionLink').html($thumb.attr('caption'));
            $('#galleryLink, #captionLink').attr('href', $thumb.attr('url'));

            var caption = $thumb.attr('caption');
            //console.log (caption);

            $('#captionLink').html(caption);
            //console.log ($thumb.attr('caption'));
            //console.log ($thumb.attr('url'));

            /*-- Gavin WebTrend Code --*/
            if (addWebTrends) {
                //callButtonClick('BTN GALLERYLINK');
            }
        });

        $('#galleryNav').find('.item').eq(0).trigger('click'); //display first item

        navEvent();

        /*-- Gavin WebTrend Code --*/
        if (addWebTrends) {
            //code for IE window.location.origin undefined
            if (!window.location.origin) {
                window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
            }
            var currentUrl = window.location.href.replace(window.location.origin, "");
            var currentLang = currentUrl.split('/')[1];
            
            $('#galleryLink').on('click', {
                inBtnName: 'BTN '+ currentLang.toUpperCase()+' GALLERYLINK'
            }, function(event) {
                callButtonClick(event.data.inBtnName);
            });
        }
        /*--*/
    }
}

function goToAlbum(aid) {
    $targetP = $('#galleryNav').find('.item').filter(function(index) {
        return $(this).attr('aid') == aid;
    }).first();

    var index = $targetP.closest('.owl-item').index();
    //console.log(index);

    //$('#galleryNav').find('.item').removeClass('active');
    $targetP.trigger('click');

    gallery.goTo(index);
}

function getAlbum(aid) {
    $('#galleryPop').show();
    goToAlbum(aid);
}

function navEvent() {
    $('#galleryNav .owl-next').click(function(event) {
        // }
        $targetItem = $('.item.active').parent().next().find('.item');

        if ($targetItem.length > 0) {
            // if ($targetItem.length <= 0){
            //     $targetItem = $('.owl-item').first().find('.item');
            // }
            $('.item.active').removeClass('active');
            $targetItem.addClass('active');
            $targetItem.trigger('click');
        }
         else {
            $targetItem = $('.owl-item').first().find('.item');

            gallery.jumpTo(0);
            $('.item.active').removeClass('active');
            $targetItem.addClass('active');
            $targetItem.trigger('click');
        }
    });

    $('#galleryNav .owl-prev').click(function(event) {
        $targetItem = $('.item.active').parent().prev().find('.item');
        // if ($targetItem.length <= 0){
        //     $targetItem = $('.owl-item').last().find('.item');
        // }
        if ($targetItem.length > 0) {
            $('.item.active').removeClass('active');
            $targetItem.addClass('active');
            $targetItem.trigger('click');
        }
        else {
            $targetItem = $('.owl-item').last().find('.item');
            var index = $('.owl-item').last().index();

            gallery.jumpTo(index);
            $('.item.active').removeClass('active');
            $targetItem.addClass('active');
            $targetItem.trigger('click');
        }
    });
}