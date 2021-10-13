/*function isIE8(){
    if(navigator.appVersion.indexOf("MSIE 8.")!=-1) {
        //$('body').addClass('IE8')
        return(true);
    }
}*/

function sections(section) {

    this.section = $(section);
    this.loadingMask = $('.loadingMask');
    this.sideMenu = $('.sideMenu');
    this.menuItem = $('.itemList > .item');
    //
    this.lastestActive = 0;
    this.currentActive = 0;
    this.direction = 'down';
    this.playerReady = false;

    //private var
    var responeTime = 1500,
        //adjustPoint = 1,
        //
        $section = this.section,
        $loadingMask = this.loadingMask,
        $transMask = $('.transMask'),
        //$sideMenu = this.sideMenu,
        $menuItem = this.menuItem;
    //
    var self = this,
        totalSection = $section.length,
        width = $(window).width(),
        height = $(window).height();

    function construct() {
        fitSize();
        getHash();
        //findCurrentActive();
        //autoPark(); // disable it if no need auto adjust scrollTop after manual scroll
    }

    function fitSize() {

        minHeight = 860;

         $section.css({
                width: width,
                height: height
        });


         //fix IE8 issues
         //if (isIE8() == true){
            if (height <= minHeight) {
                $section.css({
                    width: width,
                    height: minHeight
                });
            }
            $('.BLK1, .BLK11').css('height', height);
         //}
        //fix IE8 issues end


        $loadingMask.css({
            width: width,
            height: height
        });

        $transMask.css({
            width: width,
            height: height
        });
    }

    $(window).resize(function() {
        width = $(window).width();
        height = $(window).height();
        fitSize();
    });


    /*$(window).scroll(function() {
        findCurrentActive();
        var scrolled = $(document).scrollTop().valueOf();
        if (scrolled == 0) {
            //activeClass(0);
        }
    });*/

    /*$section.waypoint(function(direction) {
        var index = $(this).index();
        //activeClass(index);
        this.direction = direction;
    });*/


    function activeClass(i) {

        $section.removeClass('active').eq(i).addClass('active');
        //self.currentActive = i;

        if (i == 1 || i == 2 || i == 3) { //our work section
            $menuItem.removeClass('active').eq(1).addClass('active');
        } else {
            $menuItem.removeClass('active').eq(i).addClass('active');
        }

        autoPauseVideo();



        if (this.currentActive == 0 || this.currentActive == totalSection - 1) {
            // do it when it is at the section edge top or bottom section

            $('.nextSecBtn').removeClass('active');
        } else {
            // do it 

            $('.nextSecBtn').addClass('active');
        }


        //add hash to the URL
        var hashName =  $menuItem.eq(i).attr('hash');
        window.location.hash = hashName;
        //add hash to the URL

        //if (this.currentActive == 1 && $('.BLK2 .compBubble').offset().top < $('.BLK3').offset().top){

        /*if ($('.BLK2 .compBubble').offset().top > $('.BLK3').offset().top){
            $('.BLK2 .compBubble').css('zIndex','-100');
        } else{
            $('.BLK2 .compBubble').css('zIndex','');
        }*/
    }

    function getHash(){

        var hash = window.location.hash.substr(1);
        if (hash.length > 0){
            var targetLocation = $menuItem.filter('[hash="'+hash+'"]');

            var index = targetLocation.index()+1;

            if (targetLocation.length > 0){
                self.jumpTo(index);


            }

            if (index == 1){
                findCurrentActive();
            }
        } else{
            //self.freshTo(1);
            findCurrentActive();
        }
    }

    function autoPauseVideo() {

        if (self.playerReady) {
            if (this.currentActive > 0 && player.getPlayerState() == 1) {
                player.pauseVideo();
            } else if (this.currentActive == 0 && player.getPlayerState() != 1) {
                player.playVideo();
            }
        }

        var mp4Video = document.getElementById("mp4Video");
        if (mp4Video != null) {
        if (this.currentActive > 0) {
                mp4Video.pause();
            } else if(this.currentActive == 0){
                mp4Video.play();
            }
        }
    }

    //adjust scrollTop position after scroll with delay

    //$(window).scroll($.debounce(1500, autoPark));

    $(window).scroll($.debounce(300, findCurrentActive));
    //$(window).scroll($.debounce(500, trackSection)); //do it after 1s scroll event complete
    //$(window).scroll($.debounce(responeTime, autoPark));

    /* $(window).scroll(function() {
        //findCurrentActive();

        clearTimeout($.data(this, 'scrollTimer'));
        $.data(this, 'scrollTimer', setTimeout(function() {
            //autoPark();
        }, responeTime));
    });*/

    //method to control the slide

    this.freshTo = function(section) {

        var index = section - 1;
        var offsetTop = $section.eq(index).offset().top;
        $transMask.fadeIn(400, function() {
            $('html, body').animate({
                scrollTop: offsetTop
            }, 0, function() {
                $transMask.fadeOut(400);
            });
        });

    };

    this.jumpTo = function(section) {

        var index = section - 1;
        var offsetTop = $section.eq(index).offset().top;
         $('html, body').scrollTop(offsetTop);

    };

    this.scrollTo = function(section) {


        var index = section - 1;
        var offsetTop = $section.eq(index).offset().top;
        $('html, body').animate({
            scrollTop: offsetTop
        }, 800, 'easeInOutCirc');
    };

    this.goTo = function(section) {
        var index = section - 1;
        //activeClass(index);
        var currentActive = $section.filter('.active').index();
        //var index = section - 1;
        /*if (index == currentActive + 1 || index == currentActive - 1 || index == currentActive) {
            self.scrollTo(section);
        } else {
            self.freshTo(section);
        }*/
        self.scrollTo(section);
    };

    this.goToNext = function() {
        var currentActive = $section.filter('.active').index();
        var section = currentActive + 1;
        var targetSec = section + 1;

        if (targetSec >= 1 && targetSec <= totalSection) {
            this.goTo(targetSec);
        }
    };

    this.goToPrev = function() {
        var currentActive = $section.filter('.active').index();
        var section = currentActive + 1;
        var targetSec = section - 1;

        if (targetSec >= 1 && targetSec <= totalSection) {
            this.goTo(targetSec);
        }
    };

    //method to control the slide end

    function findCurrentActive() {

        scrollTop = $(document).scrollTop();

        var smallestLength = $(document).height(),
            $nearest, length = 0;
        $section.each(function() {
            if ($(this).length > 0) {
                length = Math.abs($(this).offset().top - scrollTop);
                //length = $(this).offset().top - scrollTop;
                if (length < smallestLength) {
                    smallestLength = length;
                    $nearest = $(this);

                }
            }
        });

        this.lastestActive = this.currentActive;
        this.currentActive = $nearest.index();
        activeClass(this.currentActive);
        trackSection();

    }

    function autoPark() {

        /*scrollTop = $(document).scrollTop();

        var smallestLength = $(document).height(),
            $nearest, length = 0;
        $section.each(function(i) {
            if ($(this).length > 0) {
                length = Math.abs($(this).offset().top - scrollTop);
                //length = $(this).offset().top - scrollTop;
                if (length < smallestLength) {
                    smallestLength = length;
                    $nearest = $(this);

                }
            }
        });*/

        //if (smallestLength <= height * 0.25) {
        //align if it the length is small than adjustPoint * scrollTop
        $('html, body').animate({
            scrollTop: $section.eq(this.currentActive).offset().top
        }, 500, 'easeOutQuad');
        //}


        //After parking
        //activeClass($nearest.index());
        //end after parking
    }

    function trackSection(){




        if (this.lastestActive != this.currentActive){
        //do it only if it has scroll to other section after scroll (not happen if scroll with the same section)


        //getting current section information afterscroll
            //code for IE window.location.origin undefined
            if (!window.location.origin) {
                window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
            }
            
            var currentSection = this.currentActive;
            //var currentSectionTitle = $('.sideMenu').find('.item').eq(currentSection).attr('hash');
            currentSection = $('.sideMenu').find('.item').eq(currentSection).attr('hash');
            var currentSectionTitle = "About BDITDC";
            var currentUrl = window.location.href.replace(window.location.origin, "");
            var currentLang = currentUrl.split('/')[1];
            
            //Gavin please enter the track code inside this function is fine


            /*-- Gavin WebTrend Code --*/
            if (addWebTrends){
              if (typeof _tag != "undefined"){
                callEndlessScrolling(currentUrl, currentSectionTitle, currentSection, currentLang.toUpperCase());
              }
            }
        }

    }

    construct(); //initialize
}