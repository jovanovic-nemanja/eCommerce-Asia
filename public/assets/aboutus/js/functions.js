(function(a) {
    (jQuery.browser = jQuery.browser || {}).mobile = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
})(navigator.userAgent || navigator.vendor || window.opera);
var checkTablet = (/ipad|xoom|sch-i800|playbook|tablet|kindle/i.test(navigator.userAgent.toLowerCase()));
var checkMobile = (/mobile|nexus|iphone|ipod|blackberry|windows\sce|palm|smartphone|iemobile|NOKIA/i.test(navigator.userAgent.toLowerCase()));


var ieVer = getInternetExplorerVersion();
var modernBrowser = true; //not IE9 or lowser version
var isIE8 = false;
var isIE9 = false;

var isMobile = jQuery.browser.mobile;
if (checkTablet || checkMobile) {
    isMobile = true;
}

var isDesktop = false;
if (!isMobile) {
    isDesktop = true;
}


function ieClass() {
    if (ieVer > 0) {
        var ieClass = 'IE' + ieVer;
        $('body').addClass(ieClass);

        if (ieVer <= 9) {
            modernBrowser = false;
        }
        if (ieVer == 8) {
            isIE8 = true;
        } else if (ieVer == 9) {
            isIE9 = true;
        }
    }

    if (isMobile) {
        $('body').addClass('mobile');
    }
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


isWideScreen = ($(window).width() >= 1280 ? true : false);

// global variable
var lang;
//

$(document).ready(function() {
    if (getCookie("SSOUID") != "") {
        $("#liLogout").show();
        $("#liLogin").hide();
    } else {
        $("#liLogin").show();
        $("#liLogout").hide();
    }


    bgVideoEmbed('#embed-container', 16 / 9);
    section = new sections('.baseBLK'); //passing the section general class
    sideMenu();
    genearl();
    fancyBox();
    responsive();
    viewportSetup();


    if (isMobile) {
        $('body').addClass('mobile');
        $('#embed-container').remove();

        //function only for mobile
    } else {
        $('body').addClass('desktop');

        // add pallax effect only for support backgroun size
        //console.log (isIE9);
        if (Modernizr.backgroundsize) {
            //function only for desktop
            var s = skrollr.init({
                forceHeight: false
            });
        }
        //
    }
});

$(window).load(function() {
    $('.scrollPane').jScrollPane();
    $('.blkWrap, .sideMenu, .navbar').css('visibility', 'visible');
    $('.loadingMask').fadeOut(0, 'linear');
    responWidSwitch();

});

$(window).resize(function() {
    isWideScreen = ($(window).width() >= 1280 ? true : false);
    responsive();
    viewportSetup();
    responWidSwitch();
});


function viewportSetup(){
    if(orientation()=='landscape'){
        $("meta[name='viewport']").attr('content', 'target-densitydpi=device-dpi, width=1001');
    }else{
        $("meta[name='viewport']").attr('content', 'target-densitydpi=device-dpi, width=970');        
    }

    function orientation(){
        var height = $(window).height();
        var width = $(window).width();
        var oriMode;

        if(width>height) {
        // Landscape
          oriMode = 'landscape';
        } else {
         // Portrait
          oriMode = 'portrait';
        }

        return oriMode;
    }

}


function responWidSwitch(){
    var switchid = '',
        lang = $('body').attr('lang');
        url = '/mobile/'+lang+'/',
        sectArray = ['home','explore-and-connect','showcase-service-hong-kong','enhancing-hong-kong-smes-capabilities','our-mission','the-council','the-managment','corporate-structure','global-network','corporate-publications','career','contact-us'];

    if(modernBrowser || isMobile){
            pathOn = true;
    }

    if(pathOn==true){
       pathSwitch();
    }

    function pathSwitch(){
        //targetWid = 970;
        
        if($(window).width()<=targetWid){
            if(modernBrowser){                
                if(gup()==sectArray[0]){
                    window.location = url+'index.html';                
                }else if(gup()==sectArray[1] || gup()==sectArray[2] || gup()==sectArray[3]){
                    window.location = url+'work-connect.html';  
                }else if(gup()==sectArray[4]){
                    window.location = url+'our-mission.html';  
                }else if(gup()==sectArray[5]){
                    window.location = url+'council.html';  
                }else if(gup()==sectArray[6]){
                    window.location = url+'management.html';  
                }else if(gup()==sectArray[7]){
                    window.location = url+'structure.html';  
                }else if(gup()==sectArray[8]){
                    window.location = url+'network.html';  
                }else if(gup()==sectArray[9]){
                    window.location = url+'publications.html';  
                }else if(gup()==sectArray[10]){
                    window.location = url+'career.html';  
                }else if(gup()==sectArray[11]){
                    window.location = url+'contact.html';  
                }else{
                    window.location = url+'index.html';  
                }
            }
        }
    }
}

function gup( switchid )
{
    var switchid = '';
    var hash = window.location.hash.slice(1),
        switchid = document.URL.substr(document.URL.indexOf('#')+1);
    return switchid;
}

function responsive() {
    width = $(window).width();
    height = $(window).height();

    $('body').removeClass('css-md');
    $('body').removeClass('css-large');


    if (width <= 1280 && height > 800) {
        $('body').addClass('css-large');
    } else if (width <= 1024 || height <= 800) {
        $('body').addClass('css-md');
    }
}

//define global variable

//fancyBox

function fancyBox() {
    $(".fancybox").fancybox({
        wrapCSS: 'main',
        closeClick: false,
        //scrolling: 'no',

        beforeShow: function() {
            $('.scrollPane').jScrollPane();
        },

        afterLoad: function() {
            $('.scrollPane').jScrollPane();
        },

        afterShow: function() {
        },

        afterClose: function() {
            $('#youtubeBox iframe').attr('src', '');
        },

        helpers: {
            overlay: {
                locked: false,
            }
        }
    });

    $(".concilPop").fancybox({
        wrapCSS: 'concilPop',
        closeClick: false,

        beforeShow: function() {
            $('.scrollPane').jScrollPane();
        },

        afterLoad: function() {
            $('.scrollPane').jScrollPane();
        },

        helpers: {
            overlay: {
                locked: false
            }
        }
    });

    $(".galleryPop").fancybox({
        wrapCSS: 'galleryPop',

        helpers: {
            overlay: {
                locked: false
            }
        }
    });


    $(".postApp").fancybox({
        wrapCSS: 'postApp',

        helpers: {
            overlay: {
                locked: false
            }
        }
    });


    $(".popGrid").fancybox({
        wrapCSS: 'corpStrPop',
        helpers: {
            overlay: {
                locked: false
            }
        },
        fitToView: false,

        tpl: {
            closeBtn: '<a title="Close" class="fancybox-item fancybox-close closeBtn" href="javascript:;"></a>'
        }
    });

    //prevent scroll when fancybox pop
    var keys = [37, 38, 39, 40];

    function preventDefault(e) {
        e = e || window.event;
        if (e.preventDefault) e.preventDefault();
        e.returnValue = false;
    }

    function keydown(e) {
        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                preventDefault(e);
                return;
            }
        }
    }

    function wheel(e) {
        preventDefault(e);
    }

    function disable_scroll() {
        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', wheel, false);
        }
        window.onmousewheel = document.onmousewheel = wheel;
        document.onkeydown = keydown;
    }

    function enable_scroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', wheel, false);
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null;
    }
    //
}

//
function genearl() {
    $(".accordion").accordion({
        collapsible: true,
        heightStyle: "content",
        icons: {
            "header": "icon-plus",
            "activeHeader": "icon-minus"
        },
        active: 0
    });
}


//side menu
function sideMenu() {
    //side menu default staus
    $('.toggleBtn').removeClass('active');
    $('.sideMenu').css('right', -$('.sideMenu').width());

    $('.itemList .item').click(function() {
        $('.sideMenu .item').removeClass('active').filter(this).addClass('active');
        section.currentActive = $(this).index();
    });

    //slideMenu event
    $('.funcList .item').hover(function() {
        $showbox = $(this).find('.showBox');
        if ($showbox.find('img').attr("src").length > 0) { //only show when its has image sr path
            $showbox.stop().fadeIn(300);
        }
    }, function() {
        if ($showbox.find('img').attr("src").length > 0) { //only show when its has image sr path
            $showbox.stop().fadeOut(300);
        }
    });


    var menuToggle = false;
    $('.toggleBtn').click(function() {
 
        sideMenuWidth = $('.sideMenu').width();
        sideMenuMove = sideMenuWidth;

        //slide the menu



        if (menuToggle == false) {
            // toggle true
            $(this).addClass('active');

            if (modernBrowser) {
                $('.blkWrap, .navbar').stop().transition({
                    x: -sideMenuMove
                }, 1000);
            }
            $('.sideMenu').animate({
                right: 0
            }, 400);

            menuToggle = true;
        } else {
            // toggle false
            menuToggle = false;
            if (modernBrowser) {
                $('.blkWrap, .navbar').stop().transition({
                    x: 0
                }, 700);
            }
            $('.sideMenu').animate({
                right: -sideMenuWidth
            }, 1000);
            $(this).removeClass('active');
        }

    });
}

//section slider
function sectionSlider() {
    var windowWidth, windowHeight;

    windowWidth = $(window).width();
    windowHeight = $(window).height();

    //adjsut the wrapper size
    $('.slide-wrapper').css({
        'height': '100%',
        'width': windowWidth * $('.slide-wrapper > div').length
    });
    //adjsut the slides size
    $('.slide-wrapper > div.slide').css({
        height: '100%',
        'width': windowWidth
    });


    //adjsut the left position 
    leftMovement = -($('.slide-wrapper div.active').attr('id').slice(5) - 1) * windowWidth;
    
    $('.slide-wrapper').css({
        'left': leftMovement
    });

}

//slide control functions
function goToSlide(location) {
    // scroll to section 2 slider if it is not at section 2
    if (section.currentActive != 1) {
        section.scrollTo(2);
    }
    //
    $slide = $('#slide' + location);
    leftPosition = -$slide.position().left;
    index = $slide.index();

    $('.slide-wrapper').animate({
        'left': leftPosition
    }, 500, 'easeOutQuad');

    $('.slide-wrapper > div').removeClass('active');
    $('.slide-wrapper > div').eq(index).addClass('active');


}
//section slider end

function hoverEffect() {

    if (!isMobile) {
        $('.fadeHov').hover(function() {
            $(this).find('.frame').fadeIn();
        }, function() {
            $(this).find('.frame').fadeOut();
        });
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = $.trim(ca[i]);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function substituteURL(url, param) {
    return url.replace("?1", encodeURIComponent(param.replace(/#$/, "")));
}

function replaceCurrentURL(url) {
    return url.replace("?1", encodeURIComponent(location.href.replace(/#$/, "")));
}

function getPostLoginLink() {
    var url = "http://www.bditdc.com";
    return replaceCurrentURL(url);
}

function gotoSSOLoginPage() {
    var url = "http://www.bditdc.com";
    window.location.href = replaceCurrentURL(url);
}

function gotoSSOLogoutPage() {
    var url = "http://www.bditdc.com";
    window.location.href = replaceCurrentURL(url);
}