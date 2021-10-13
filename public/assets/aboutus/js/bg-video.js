function bgVideoEmbed(container, ratio) {

    this.ratio = (ratio === null) ? 16 / 9 : ratio; //default 16/9
    this.container = $(container);

    // define local variable
    var self = this;
    ratio = this.ratio;
    container = this.container;

    //construct
    function construct() {
        container.css({
            overflow: 'hidden',
            position: 'relative',
            zIndex: 1,
            width: '100%',
            height: '100%'
        });

        container.find('iframe, embed, object, video').css({
            position: 'absolute',
            top: 0,
            left: 0,
            width: '100%',
            height: '100%'
        });
        
        videoScale();

        $(window).resize(function(event) {
            videoScale();
        });
    }

    // when screen aspect ratio differs from video, video must center and underlay one dimension
    function videoScale() {

        var width = $(window).width(),
            pWidth, // player width, to be defined
            height = $(window).height(),
            pHeight; // player height, tbd

        if (width / (ratio) < height) { // if new video height < window height (gap underneath)
            pWidth = Math.ceil(height * ratio); // get new player width
            container.width(pWidth).height(height).css({
                left: (width - pWidth) / 2,
                top: 0
            }); // player width is greater, offset left; reset top
        } else { // new video width < window width (gap to right)
            pHeight = Math.ceil(width / ratio); // get new player height
            container.width(width).height(pHeight).css({
                left: 0,
                top: (height - pHeight) / 2
            }); // player height is greater, offset top; reset left
        }
    }

    //init
    if (container.length > 0) {
        construct();
    }
}