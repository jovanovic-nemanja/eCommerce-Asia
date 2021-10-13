jQuery(document).ready(function($) {
    //youtubePlayer();
    lang = $('body').attr('lang');
    //console.log (lang);
    $.getJSON('/json/'+lang+'/jVideo.json', function(data, textStatus) {

        var totalList = data.VideoList.concat(data.VideoList2rd, data.VideoList3th);
        
        //console.log (totalList);
        //console.log (data.VideoList);
        //console.log (data);
        youtubePlayer(totalList);

    });
});

function youtubePlayer(data) {
    //console.log (data);

    //getting the video id
/*    function getParameter(url, name) {
        var urlparts = url.split('?');
        if (urlparts.length > 1) {
            var parameters = urlparts[1].split('&');
            for (var i = 0; i < parameters.length; i++) {
                var paramparts = parameters[i].split('=');
                if (paramparts.length > 1 && unescape(paramparts[0]) == name) {
                    return unescape(paramparts[1]);
                }
            }
        }
        return null;
    }*/
    //end getting the video id

    var stageHtml = new String();

    $.each(data, function(i) {
        //stageHtml += '<li class="videoItem clearfix" videotype="'+this.UrlType+'" id="'+ this.ID +'"data-vid="' + this.Url + '"><a href="javascript:void();"><img src="' + this.Thumbnail + '"><p>' + this.Title + '</p></a></li>';
        /*-- Gavin WebTrend Code --*/
        if (addWebTrends){
          stageHtml += '<li class="videoItem clearfix" videotype="'+this.UrlType+'" id="'+ this.ID +'"data-vid="' + this.Url + '"><a href="javascript:void();" onclick="callButtonClick($(this).find(\'p\').html());"><img src="' + this.Thumbnail + '"><p>' + this.Title + '</p></a></li>';
        }
    });

    $('.videoList').html(stageHtml);

    $('.scrollPane').jScrollPane();

    //default display first video
    //iframeSrc = 'http://www.youtube.com/embed/' + $('.videoItem').first().data('vid')+'?autoplay=1';
    //$('.videoItem').first().addClass('active');
    //$('#youtubePlayer').attr('src', "https://www.youtube.com/watch?v="+iframeSrc);

    //

    $('.videoItem').click(function() {

    var videoType = $(this).attr('videotype');
    var vid = $(this).data('vid');
    //console.log(videoType);

    showVideo(videoType, vid);

    });

    $('#youtubeBox .closeBtn').click(function(event) {
        $('#youtubePlayer').attr('src', '');
        $('.videoItem').removeClass('active');
    });
}

function showVideo(videoType, vid){
    //console.log(videoType, vid);
    if (videoType == 0){
            //YouKu iframe URL
            iframeSrc = 'http://player.youku.com/embed/' + vid;
        } else {
             //Youtube
            iframeSrc = 'http://www.youtube.com/embed/' + vid + '?autoplay=1';
        }

        //youku
        //<iframe height=498 width=510 src="http://player.youku.com/embed/XNzE0MzE1Nzc2" frameborder=0 allowfullscreen></iframe>
        //http://v.youku.com/v_show/id_XNzAxODczODY0.html

        $('.videoItem').removeClass('active').filter(this).addClass('active');
        $('#youtubePlayer').attr('src', iframeSrc);
}

function getVideoItem(item, catNum) {
    //console.log (item==null);
    $('#youtubeBox').show();
    //$('.scrollPane').jScrollPane();
    item = (item == null ? $('.videoItem').eq(0).attr('id') : item);
    $selectVideo = $('.videoItem').filter(function(index) {
        return $(this).attr('id') == item;
    });

    //console.log (item);
    //console.log ($selectVideo);


    var videoType =   $selectVideo.attr('videotype');
    var vid =   $selectVideo.data('vid');
    showVideo(videoType, vid);



    var element = $('#youtubeBox .scrollPane').jScrollPane();
    var jscrollpane_api = element.data('jsp');

    if (catNum === undefined) {
        jscrollpane_api.scrollToY(0,false);
    }else{
        var scorllTarget = $('.videoItem[id='+item+']');
        var scrollVal = scorllTarget.position().top-32; 
        jscrollpane_api.scrollToY(scrollVal,false);
    }
    
}