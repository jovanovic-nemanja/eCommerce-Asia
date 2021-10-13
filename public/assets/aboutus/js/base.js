//test
var easing = 'easeInOutCubic';
var loopBubble;
var ieVer = getInternetExplorerVersion();
var isIE8 = (ieVer == '8.0' ? true : false);
var isIE9 = (ieVer == '9.0' ? true : false);
var modernBrowser = true;
if (isIE8|| isIE9){
    modernBrowser = false;
}
var lang;

$(function() {
    bodyLangClass();
    checkIE8();
    BLKone();
    BLKtow();
    topMenu();
    resizeItem();
    hoverEffect();
    landingAnimate();
    showBox();

    general();


    $(window).resize(function() {
    });

});

var winWd, winHt;

function screenDetect() {
    winWd = $(window).width();
    winHt = $(window).height();
}


function resizeItem() {

    var $tagline = $('.BLKvideo .tagline'),
        paddingVal = ($('.BLK1').outerHeight() - $('.BLKvideo .btmCtn').outerHeight()) * 0.45;

    $tagline.css({
        paddingTop: paddingVal
    });
    
}

function getInternetExplorerVersion()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
    var rv = -1; // Return value assumes failure.
    if (navigator.appName == 'Microsoft Internet Explorer') {
        var ua = navigator.userAgent;
        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        if (re.exec(ua) != null)
            rv = parseFloat(RegExp.$1);
    }
    return rv;
}

function checkVersion() {
    var msg = "You're not using Internet Explorer.";
    var ver = getInternetExplorerVersion();

    if (ver > -1) {
        if (ver >= 8.0)
            msg = "You're using a recent copy of Internet Explorer."
        else
            msg = "You should upgrade your copy of Internet Explorer.";
    }
}

function checkIE8() {
}

function bodyLangClass() {
    var currentPath = window.location.pathname;
    var checkLangTc = currentPath.match(/\/tc\//g);
    var checkLangEn = currentPath.match(/\/en\//g);
    var checkLangSc = currentPath.match(/\/sc\//g);

    if ($('body').attr('lang') == null) {
        if (checkLangTc != null) {
            $('body').addClass("tc");
            $('body').attr('lang', 'tc');
            lang = "tc";
        } else if (checkLangSc != null) {
            $('body').addClass("sc");
            $('body').attr('lang', 'sc');
            lang = "sc";
        } else {
            $('body').addClass("en");
            $('body').attr('lang', 'en');
            lang = "en";
        }
    }
}

function BLKtow() {
    var $bubbleItem2 = $('.BLK2 .compBubble li')

    $bubbleItem2.hover(function() {
        $(this).find('span').fadeOut();
    }, function() {
        $(this).find('span').fadeIn();
    });

    $bubbleItem2.click(function() {
        $('.activeBubble').removeClass('activeBubble')
        $(this).addClass('activeBubble');
        $(this).find('span').fadeIn();
    });

    $bubbleItem2.eq(0).addClass('activeBubble').find('span').show();
    $('.BLK1 .linkArrow').click(function() {
        var target = $('.BLK1 .selItem').index() + 2;
        section.goTo(target);
    });
}

var iconScroll = true;

function BLKone() {

    $(window).scroll(function() {
        var pos = $(window).scrollTop();

        if (pos <= 0) {
            if (iconScroll != true) {
                iconScroll = true;
                $('.scrollSign').fadeIn(250);
            }
        } else {
            if (iconScroll == true) {
                iconScroll = false;
                $('.scrollSign').fadeOut(250);
            }
        }
    });

    $bubbleItem = $('.BLKoneBubbles li');

    //bubble change event
    function bubbleEvent(element) {
        //console.log($(this).length);

        $this = (element.length > 0 ? element : $(this));

        $bubbleItem.removeClass('selItem');
        $this.addClass('selItem');

        $('.btmCtn .article').children().hide();

        var index = $('.BLK1 .selItem').index();

        $('.btmCtn .article').eq(index).children().fadeIn();


        //restart bubble cycle loop on click event
        if (this.window !== this) {
            
            window.clearInterval(loopBubble);
            loopBubble = window.setInterval(bubbleCycle, 5000);
        }
        //
    }

    $bubbleItem.click(bubbleEvent);
    bubbleEvent($bubbleItem.eq(0));

    //timeout change active bubble

    loopBubble = window.setInterval(bubbleCycle, 5000);

    function bubbleCycle() {
        total = $bubbleItem.length;
        index = $bubbleItem.filter('.selItem').index();
        //console.log (total, index);
        target = (index + 1 <= total - 1 ? index + 1 : 0);
        //$bubbleItem.eq(target).trigger('click');
        bubbleEvent($bubbleItem.eq(target));
        //console.log(target);
    }
    //

    //scroll down icon
    $('.icoScrollAni').hover(function() {
        $(this).stop(true).removeClass('icoScrollAni');
    }, function() {
        $(this).addClass('icoScrollAni');
        //icoLoop();
    });

    //icoLoop();

}

function icoLoop() {
    $('.icoScrollAni').animate({
        backgroundPosition: 'center 10px'
    }, 'slow', function() {
        $(this).animate({
            backgroundPosition: 'center 0px'
        }, 'slow');
        icoLoop();
    })
}

function topMenu() {

    $topMenu = $('.navbar'),
    fixedTopClass = 'active';

    var smallLogo = false;

    $(window).scroll(function() {
        var pos = $(window).scrollTop();

        if (pos > 0) {
            //$topMenu.addClass('active').find('.logo').fadeOut().fadeIn();
            $topMenu.addClass('active');
            if (smallLogo == false) {
                $('.logo').find('img').fadeToggle(400);
                smallLogo = true;
            }
        } else {
            $topMenu.removeClass('active');
            if (smallLogo == true) {
                $('.logo').find('img').fadeToggle(400);
                smallLogo = false;
                //icoLoop();
            }
        }
    });
}

function timeline() {
    $container = $('.timeline');
    controlNum = 3;

    $container.find('.jcarousel')
        .jcarousel({
            // Options go here
        });

    $container.find('.jcarousel-control-prev')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '-=' + controlNum
        });

    $container.find('.jcarousel-control-next')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '+=' + controlNum
        });

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

    //hover show event
    var hideTimeline;

    $('.cirTimeline, .timeline').hover(function() {
        clearTimeout(hideTimeline);
        //$('.timeline').fadeIn();
        $('.timeline').addClass('show');

    }, function() {
        clearTimeout(hideTimeline);

        hideTimeline = setTimeout(function() {
            //$('.timeline').fadeOut();
        $('.timeline').removeClass('show');
        }, 2000);
    })
}

function landingAnimate() {
    $('.btnContainer').hover(function() {
        $(this).find('.bgFill').addClass('active');
    }, function() {
        $(this).find('.bgFill').removeClass('active');
    });
}

function floatBubble() {
    $('.BLK2 .compBubble').hide();

    $(window).scroll(function(event) {

        if ($(window).scrollTop() < $(".BLK2").offset().top / 2) {
            $('.BLK2 .compBubble').fadeOut();
        }

        if ($(window).scrollTop() > $(".BLK1").offset().top + $(".BLK2").offset().top / 2 && $(window).scrollTop() < $(".BLK2").offset().top) {
            $('.BLK2 .compBubble').fadeIn().css('position', 'fixed');
        } else {
            $('.BLK2 .compBubble').css('position', '');
        }
    });

}

function quickFact() {
    $('.showFact').click(function(event) {
        $(this).hide();

        var fact = $(this).attr('qfact');
        $target = $('.qfactp[qfact=' + fact + ']');
        $target.slideDown();
        return false;
    });

    $('.hideFact').click(function(event) {
        var target = $(this).attr('href');
        var fact = $(this).attr('qfact');

        $target = $('.showFact[qfact=' + fact + ']');
        $targetp = $('.qfactp[qfact=' + fact + ']');

        $targetp.slideUp(function() {
            $target.show();
        })

        return false;
    });
}

function general() {
    $('.closeBtn').click(function(event) {
        $(this).closest('.popup').hide();
    });

    if (isIE8 == true) {
        $('body').addClass('ie8');
    }

    if (isIE9 == true) {
        $('body').addClass('ie9');
    }

    $('body').addClass($('body').attr('lang'));

    var currentYear = (new Date).getFullYear();
    $('#year').html(currentYear);
    
}


function showBox(){
    $('.listTbl > li').hover(function(event) {
        $target = $(this).find('.detailBox');
        $('.detailBox').not($target).stop().slideUp();
        if (!$target.is(':empty')) {
            $target.slideDown();
        }
});
}

function changeLang(target) {
    var array = new Array('en', 'tc', 'sc');
    var lang;
    var url = top.location.href;

    for (var i = 0; i < array.length; i++) {
        if (url.indexOf('/' + array[i] + '/') < 0) continue;
        url = url.replace('/' + array[i] + '/', '/' + target + '');
        break;
    }

    window.top.location.href = url;
}

function weiBoCode(){
    $('.weixin').hover(function() {
    $('.weixinHolder').stop().fadeIn();
    }, function() {
        $('.weixinHolder').stop().fadeOut();
    });
}