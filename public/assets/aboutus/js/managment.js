//management section 
$(document).ready(function() {
    lang = $('body').attr('lang');
    //console.log (lang);

    $.getJSON("/json/"+lang+"/jTheManagement.json", function(data) {
        //console.log (data);

        //get background images
        $('.BLK6 .BLKbg').css('backgroundImage', 'url('+data.TheManagementBGImage+')');

        var profile = data.Slides;

        //reAlign the first 6 item
        //var reProfile = profile.slice(6);
        //reProfile.unshift(profile[0], profile[3], profile[1], profile[4], profile[2], profile[5]);

        magSect(profile);

        
        // 7boxes setup | management section
        if($('li').hasClass('box7')){
            $('.box7 .box').slice(3,7).addClass('boxSm');
        }

        // boxes setup | management section
        if($('li').hasClass('box6b')){
            $('.box6b .box').slice(0,2).addClass('boxL');
        }
        if($('li').hasClass('box6c')){
            $('.box6c .box').eq(0).addClass('boxL');
            $('.box6c .box').slice(1,3).addClass('boxM');
            $('.box6c .box').slice(3,6).addClass('boxS');
        }
        if($('li').hasClass('box7b')){
            $('.box7b .box').eq(0).addClass('boxL');
            $('.box7b .box').slice(1,3).addClass('boxM');
        }
        if($('li').hasClass('box8b')){
            $('.box8b .box').eq(0).addClass('boxL');
            $('.box8b .box').slice(1,4).addClass('boxS');
        }

    });

});

function magSect(dataSet) {    

    //console.log (dataSet);

    $container = $('.magWarp');

    /*
        Carousel initialization
        */
    loadListContent();
    loadPopContent();
    $container.find('.jcarousel').jcarousel({
        // Options go here
    });

    /*
         Prev control initialization
         */
    $container.find('.jcarousel-control-prev')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '-=1'
        });

    /*
         Next control initialization
         */
    $container.find('.jcarousel-control-next')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '+=1'
        });

    /*
         Pagination initialization
         */
    $container.find('.jcarousel-pagination')
        .on('jcarouselpagination:active', 'a', function() {
            $(this).addClass('active');
        })
        .on('jcarouselpagination:inactive', 'a', function() {
            $(this).removeClass('active');
        })
        .jcarouselPagination({
            // Options go here
        });

    /* function loadListContent() {
        // box template intial
        var source = $("#box").html();
        var template = Handlebars.compile(source);
        //end template intial

        //get the images d into the li
        var content = '<ul>';
        var count = 0;

        $.each(dataSet, function(i) {
            count++;
            if (count % 2 == 1) {
                content += '<li>'
            }
            //console.log (this.imagePath);
            var output = template(this);
            content += output;
        });

        //add fakebox if it is odd number and last item <div class="box">
        if (dataSet.length % 2 != 0 && count == dataSet.length) {
            content += '<div class="box" style="cursor: auto;"></div>';
        }
        //

        if (count % 2 == 0) {
            content += '</li>'
        }
        content += '</ul>';
        $container.find('.jcarousel').html(content);

        //add class to highlight box
        $.each(dataSet, function(i) {
            if (this.IsMaster == true) {
                $('.box').eq(i).addClass('hightlight');
            }
        });
        //
    } */

    function loadListContent() {
        // box template intial
        var source = $("#box").html();
        var template = Handlebars.compile(source);
        var content = new String();
        //end template intial

        //console.log (dataSet);


        $.each(dataSet, function(index, val) {
             //console.log (this);

             var className = 'box'+this.SlideBox;
             content+='<li class='+className+'>';

             $.each(this.Hierarchys, function(index, val) {
                  //console.log (this);
                  var output = template(this);
                  content+=output;
             });
             content+='</li>';
        });

        content = '<ul>'+content+'</ul>';

        //putting the output to HTML
        $container.find('.jcarousel').html(content);

        //add hightlight class to master item

        //function addhighLight(){
            var count = 0;
            $.each(dataSet, function(i) {
                $.each(this.Hierarchys, function(index, val) {
                    if (this.IsMaster == true) {
                        //console.log (count);
                        $('.box').eq(count).addClass('hightlight');
                    }
                    count++;
                });
            });
        //}
        //add hightlight class to master item end

        //console.log (content);

        //get the images d into the li
/*        var content = '<ul>';
        var count = 0;

        $.each(dataSet, function(i) {
            count++;
            if (count % 6 == 1) {
                content += '<li>'
            }
            //console.log (this.imagePath);
            var output = template(this);

            //console.log (dataSet.length);
            //console.log (i);
            content += output;
            if (i == dataSet.length-1){
                //console.log ('this is the last item');
                var fakeBoxNum = (dataSet.length)%6;
                //console.log (fakeBoxNum);
                for (var i = 0; i < fakeBoxNum; i++) {
                    content += '<div class="box" style="cursor: auto;"></div>';
                    //console.log (content);
                };
            }
        });*/

        //add fakebox if it is odd number and last item <div class="box">
        // if (dataSet.length % 2 != 0 && count == dataSet.length) {
        //     content += '<div class="box" style="cursor: auto;"></div>';
        // }
        //
/*        if (count % 6 == 0) {
            content += '</li>'
        }
        content += '</ul>';*/

        //add class to highlight box
        /*$.each(dataSet, function(i) {
            if (this.IsMaster == true) {
                $('.box').eq(i).addClass('hightlight');
            }
        });*/
        //
    }

    function loadPopContent() {

        //popup box template intial
        var source = $("#popBox").html();
        var template = Handlebars.compile(source);
        //end template intial

            //var count = 0;
            $.each(dataSet, function(i) {
                $.each(this.Hierarchys, function(index, val) {
                     //console.log (this)
                     //if (i <= 5) { //only show for first 6 item

                        if (this.Bio != ""){
                            //console.log (this.ID);
                            $('.box[pid="'+this.ID+'"]').css('cursor', 'pointer');
                            var content = template(this);
                            $('.popContent').append(content);
                            
                            /*-- Gavin WebTrend Code --*/
                            if (addWebTrends){ //Management, click download btn in fancy-box
                                if (!window.location.origin) {
                                    window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
                                }
                                var currentUrl = window.location.href.replace(window.location.origin, "");
                                var currentLang = currentUrl.split('/')[1];
                                $('.popBox[pid="'+this.ID+'"]').find('a.btnDownload').on('click', {inBtnName: "BTN "+currentLang.toUpperCase()+" MANAGEMENT BIO DOWNLOAD "+this.BtnName}, function(event){callButtonClick(event.data.inBtnName);});
                            }
                            /*--*/
                        }
                    //} //only show for first 6 item end
                });
            });

        //loop out the popupbox content
/*        $.each(dataSet, function(i) {
            if (i <= 5) { //only show for first 6 item
                //console.log(this);
                if (this.ThumbnailPath != null){
                    var content = template(this);
                }
                $('.popContent').append(content);
            } //only show for first 6 item end
        });*/
        //loop out the popupbox content end 
    }

    //add class to highlight box
    /*    $.each(dataSet, function(i) {
       if (this.IsMaster == true){
            $('.popBox').eq(i).addClass('hightlight');
       }
    });*/
    //

    //show nav btn if more then 6 items
    var slideNum = dataSet.length;
    //console.log (slideNum);
    if (slideNum > 1) {
        $('.magWarp').find('.jcarousel-control').show();
    }

    $('.box').click(function() {

        //var index = $(this).index();
        var index = $(this).attr('pid');
        //console.log (index);
        $target = $('.popBox[pid="'+index+'"]');
        //if ($target.length > 0) {
            $target.fadeIn();
            $('.scrollPane').jScrollPane();

            if ($target.length > 0){
                $('.magWarp .jcarousel-control').hide();
            }
        //}
        /*-- Gavin WebTrend Code --*/
        if (addWebTrends){ //Management, click to show fancybox
            if (!window.location.origin) {
                window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
            }
            var currentUrl = window.location.href.replace(window.location.origin, "");
            var currentLang = currentUrl.split('/')[1];
            callButtonClick("BTN "+currentLang.toUpperCase()+" MANAGEMENT BIO: "+ $(this).attr('btnname'));
        }
        /*--*/
    });

    $('.popBox .closeBtn').click(function() {
        $('.popBox').fadeOut();
         $('.magWarp .jcarousel-control').show();
    });

    $('.magWarp .box').hover(function() {
        $(this).find('.picTplHover').fadeIn();
    }, function() {
        $(this).find('.picTplHover').fadeOut();
    });

    // remove the image frame for blank items
    $blankItem = $('.magWarp .box').filter(function(index) {
       return $( this ).find('.pic').attr( "src" ) === ""
    });
   // console.log($blankItem);
    $blankItem.find('.picTpl').css('background', '#f8f8f8');
    $blankItem.find('.picTplHover').css('background', '#f8f8f8');
    // Reload carousel


    //show pagination control
    /*if (dataSet.length <= 6){
  $('.jcarousel-control').hide();
}*/

}