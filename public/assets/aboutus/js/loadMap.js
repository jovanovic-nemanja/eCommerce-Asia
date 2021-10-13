var mainMap, childMap, childMarker;
var markerIcon = "../images/marker.png";
var locationData;

$(window).load(function() {

    lang = $('body').attr('lang');

    $.getJSON("/json/" + lang + "/jGlobalNetwork.json", function(data) {
        $('#GlobalNetworkSubTitleImage').attr('src', data.GlobalNetworkSubTitleImage);
        $('#GlobalNetworkOfficeFile').attr('href', data.GlobalNetworkOfficeFile);
        $('#GlobalNetworkContent').html(data.GlobalNetworkContent);
        $.each(data.ContinentList, function(index, val) {
            var i = index + 1;
            var numCtn = ' (' + this.NoOfOffice + ')';
            $('.netWorkTag > li').find('a').eq(i).append(numCtn);
        });

        locationData = data.Offices;


        if (lang == 'en')
            headOfficeRegion = "Head Office";
        else if (lang == 'tc')
            headOfficeRegion = "總辦事處";
        else if (lang == 'sc')
            headOfficeRegion = "总办事处";

        var headOffice = {
            "ContinentID": 1,
            "Region": headOfficeRegion,
            "ContactPerson": data.HeadOfficeContactPerson,
            "ContactPersonTitle": data.HeadOfficeContactPersonTitle,
            "Content": data.HeadOfficeContactContent,
            "Thumbnail": data.HeadOfficeThumbnail,
            "Latitude": data.HeadOfficeLatitude,
            "Longitude": data.HeadOfficeLongitude
        };

        locationData.unshift(headOffice);

        // Generate the main map
        mainMap = GenerateMap("map_canvas", 18.481201, 111.425780, 4);

        // Load the markers into the main map
        //console.log(locationData);
        LoadOfficeMarkers(mainMap, locationData);

        // Generate the mini map
        childMap = GenerateMap("childMap", 38.135877, 99.648438, 17);

        // Add child marker
        childMarker = new google.maps.Marker({
            position: new google.maps.LatLng(38.135877, 99.648438),
            map: childMap,
            icon: markerIcon
            //title: 'BDITDC',
        });
    });
})

// Initialization the map
// divID = ID of the div to store the map
// lat = latitude
// lng = longitude
// zoom = zoom rate
function GenerateMap(divID, lat, lng, zoom) {

    //check if it is main map , disable scrollwheel
    var wheelZoom = (divID == 'map_canvas' ? false : true);

    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        scrollwheel: wheelZoom,
        zoom: zoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        // styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]

    };
    return new google.maps.Map(document.getElementById(divID),
        mapOptions);
}

function LoadOfficeMarkers(map, data) {
    $.each(data, function(idx) {

        // Add markers
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data[idx].Latitude, data[idx].Longitude),
            map: map,
            icon: markerIcon,
            title: data[idx].Region,
            data_region: data[idx].Region,
            data_name: data[idx].ContactPerson,
            data_title: data[idx].ContactPersonTitle,
            data_content: data[idx].Content,
            data_thumb: data[idx].Thumbnail,

            data_lat: data[idx].Latitude,
            data_lng: data[idx].Longitude,
            /*-- Gavin WebTrend Code --*/
            data_btnname: data[idx].BtnName
            /*--*/
        });

        // Add open pop up event handler
        google.maps.event.addListener(marker, 'click', function() {
            /*-- Gavin WebTrend Code --*/
            if (addWebTrends){ //Management, click download btn in fancy-box
              if (!window.location.origin) {
                window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
              }
              var currentUrl = window.location.href.replace(window.location.origin, "");
              var currentLang = currentUrl.split('/')[1];
              callButtonClick("BTN "+currentLang.toUpperCase()+" GLOBAL NETWORK PIN "+this.data_btnname);;
            }
            /*--*/
                            
            $('.mapPopInfo').show();

            // Set the data for this marker pop up
            $('.mapPopInfo .data_region').text(this.data_region);
            $('.mapPopInfo .data_name').text(this.data_name);
            $('.mapPopInfo .data_title').text(this.data_title);
            $('.mapPopInfo .data_thumb').attr('src', this.data_thumb);
            $('.mapPopInfo .data_content').html(this.data_content);

            // hide the image icon if it is blank
            if (this.data_thumb.length <= 0) {
                $('.mapPopInfo .data_thumb').hide();
            } else {
                $('.mapPopInfo .data_thumb').show();
            }
            //

            if (this.data_name.length <= 0) {
                $('.mapPopInfo .data_name').hide();
            } else {
                $('.mapPopInfo .data_name').show();
            }

            if (this.data_title.length <= 0) {
                $('.mapPopInfo .data_title').hide();
            } else {
                $('.mapPopInfo .data_title').show();
            }

            // Change child marker position
            childMarker.setPosition(new google.maps.LatLng(this.data_lat, this.data_lng));

            // Change child map center
            google.maps.event.trigger(childMap, 'resize');
            childMap.setCenter(new google.maps.LatLng(this.data_lat, this.data_lng));

        });

        // Add close pop up event handler
        $('.mapPopClose').click(function() {
            //$('.mapPopInfo').hide();
            $('.mapPopInfo').hide();
        });

    });

}

function ChangeContinent(lat, lng) {
    // Change main map center
    mainMap.panTo(new google.maps.LatLng(lat, lng));
    mainMap.setZoom(4);
}

function headOffce(lat, lng) {
    mainMap.panTo(new google.maps.LatLng(lat, lng));
    mainMap.setZoom(15);
}