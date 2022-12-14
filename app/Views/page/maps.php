<body>
  <div class="row">
    <div class="col-md-12">
      <div class="header">
        <div class="col-md-8">
          <span class="cari">Cari</span>
          <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        </div>
        <div class="col-md-4">
          Icon Bendera
        </div>
      </div>
    </div>
  </div>
  
  <div class="row map-row">
    <div class="col-md-12 map-col">
      <div id="map"></div>
    </div>
  </div>

  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="modalDetailLabel">Detail</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
    var customLabel = {
      restoran: {
        label: 'R'
      },
      hotel: {
        label: 'B'
      }
    };

    function initMap() {
      //var divMap = document.getElementsByClassName("row").getElementsByClassName("col-md-12")[0].getElementById("map");
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(-6.286863, 106.691915),
        zoom: 12
      });

      var input = document.getElementById('pac-input');
      var searchBox = new google.maps.places.SearchBox(input);
      //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

        //prepare for icon file
        var iconBase =
        '../assets/icon/';
        var icons = {
          restoran: {
            icon: iconBase + 'resto.png'
          },
          hotel: {
            icon: iconBase + 'hotel.png'
          }
        };

        //create new google maps window
        var infoWindow = new google.maps.InfoWindow;

        downloadUrl(<?php echo "'".$fileXml."'";?>, function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var description = markerElem.getAttribute('description');
            var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            infowincontent.className = 'customInfoWindow';

            var imgPath = '../assets/images/';
            var img = document.createElement('img');                                 
            img.src = imgPath+markerElem.getAttribute('image') ;
            img.style.width = '100%';
            infowincontent.appendChild(img);
            img.className = 'imageThumbnail';
            infowincontent.appendChild(document.createElement('br'));
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);

            infowincontent.appendChild(document.createElement('br'));

            var deskripsi = document.createElement('deskripsi');
            deskripsi.textContent = description
            infowincontent.appendChild(deskripsi);

            var link = document.createElement('a');
            var detail = document.createElement('text');
            detail.textContent = 'Detail';
            link.setAttribute('class', 'detail');
            link.setAttribute('data-id', id);
            link.setAttribute('href', '#');
            link.appendChild(detail);
            infowincontent.appendChild(link);

            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
                //custom icon for each marker
                icon: icons[type].icon,
              });
            marker.addListener('click', function() {
              //infoWindow.setContent(infowincontent);
              //infoWindow.open(map, marker);
              $("#modalDetail").modal('show');
                $.post(<?php echo "'".base_url("cari")."'";?>,
                    {id:id},
                    function(html){
                        $(".modal-body").html(html);
                        console.log(id);
                    }
                );
            });
          });
        });
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

  </script>

  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapsApi; ?>&callback=initMap&libraries=places">
  </script>

  <script>
        $(function(){
            $(document).on('click','.detail',function(e){
                e.preventDefault();
                $("#modalDetail").modal('show');
                $.post(<?php echo "'".base_url("cari")."'";?>,
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                        console.log(id);
                    }
                );
            });
        });
    </script>