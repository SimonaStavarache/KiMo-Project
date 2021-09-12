var map;
var myLatLng;
var mark = [];
$(document).ready(function () {
    geoLocationInit();
    function geoLocationInit() {
        //current position of the device
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success,fail);

        }else {
            alert("Browser not supported");
        }

    }

    function success(position) {
        //console.log(position)
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;


        console.log([latval, lngval]);

        myLatLng = new google.maps.LatLng(latval, lngval);
        createMap(myLatLng);
        //nearbySearch(myLatLng,"school");
        searchKids();
       // deleteMarkers();

    }

    function fail() {
        alert("It fails");

    }

    //var myLatLng = new google.maps.LatLng(48.943740, 5.7771445);

    function createMap(myLatLang) {
         map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                scrollwheel: false,
                zoom: 14
            })
        ;

         var marker= new google.maps.Marker({
             position:myLatLang,
             map: map

         });
    }

//marker
    function createMarker(latlng,icn,name) {
        var marker = new google.maps.Marker({
            position:latlng,
            map: map,
            icon:icn,
            title: name
        });
    }

    function nearbySearch(myLatLng,type) {
        var request = {
            location: myLatLng,
            radius: '1300',
            types: [type]
        };


   service = new google.maps.places.PlacesService(map);
   // service.nearbySearch(request, callback);


    function callback(results, status) {


        //console.log(results);
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                console.log(place);
                latlng= place.geometry.location;
                icn="img/drg.png";
                name= place.name;

                createMarker(latlng,icn,name);
            }
        }


    }
    }

    var customLabel = {
        girl: {
            label: 'G'
        },
        boy: {
            label: 'B'
        }
    };


    function searchKids() {

     //   var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('xml.php', function(data) {

            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
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
                addMarker(point,infowincontent);
                showMarkers();
                //deleteMarkers();


               /* var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon:"img/drg.png",
                    //label: icon.label
                    animation: google.maps.Animation.BOUNCE
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });

                mark.push(marker);
                */
            });
        });


    }

    function addMarker(point,infowincontent) {
        var infoWindow = new google.maps.InfoWindow;
        var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon:"img/drg.png",
            //label: icon.label
            animation: google.maps.Animation.BOUNCE
        });
        marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
        });

        mark.push(marker);
    }
    function showMarkers() {
        setMapOnAll(map);
    }

    function setMapOnAll(map) {
        for (var i = 0; i < mark.length; i++) {
            mark[i].setMap(map);
        }
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function deleteMarkers() {
        clearMarkers();
        mark = [];
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }


    function doNothing() {}

    deleteMarkers();
    setInterval(deleteMarkers,1000);

    setInterval(searchKids,1000);

});

