// المدن
$(document).ready(function () {
// عن النقر على بحث
    $("#search-city").submit(function (event) {
        event.preventDefault();
        var data = $("#map-city").children("option:selected").val();
        var data = data.split("#");
        initMap(data[0], data[1]);

        $('#branches > .city-'+ data[2]).removeClass('d-none');
        $('#branches > :not(.city-'+ data[2] +')').addClass('d-none');

    });
    // عن الاختيار المباشر
    $("#map-city").change(function (event) {
        var data = $("#map-city").children("option:selected").val();
        var data = data.split("#");
        initMap(data[0], data[1]);

        $('#branches > .city-'+ data[2]).removeClass('d-none');
        $('#branches > :not(.city-'+ data[2] +')').addClass('d-none');

    });



});
// الفروع
function goCity(x,y) {
    initMap(x, y, 12);
}
// رمز الاسقاط
var customLabel = {
    m: {
        label: 'm'
    },
    w: {
        label: 'w'
    }
};

function initMap(x, y, zoom) {
    if (typeof x == 'undefined') {
        x = 15.3639814;
        y = 43.6950745;
        zoom = 6;
    }
    if (typeof zoom == 'undefined') {
        zoom = 11;
    }

    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(x, y),
        zoom: zoom,
    });
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP or XML file
    downloadUrl('/map', function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function (markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });
            marker.addListener('click', function () {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
        });
    });
}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() { }