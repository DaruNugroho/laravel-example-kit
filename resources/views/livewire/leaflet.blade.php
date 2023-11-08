@push('pageTitle', 'Basic CRUD')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('assets/css/leflet.fullscreen.css') }}" />

    <style>
        .form-floating>label {
            font-weight: normal !important;
        }
    </style>
@endpush

<div class="content-wrapper">

    <livewire:comps.title-page title="Leaflet" subTitle="example" :breadcrumb="$breadcrumb" />

    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0"> Map Update Marker </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-floating row">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lat" placeholder="lat">
                                        <label for="lat" class="form-label">lat</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lng" placeholder="lng">
                                        <label for="lng" class="form-label">lng</label>
                                    </div>
                                </div>
                            </div>
                            <div id="mapUpdateMarker" style="height: 300px;" wire:ignore></div>
                            <button type="button" class="btn btn-outline-primary btn-xs mt-3" id="btnGetLoc">Set Your
                                Current
                                Location</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Basic Map - Show Marker </h3>
                        </div>
                        <div id="mapBasic" style="height: 300px;" wire:ignore></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('assets/js/leflet.fullscreen.js') }}"></script>

    <script>
        //Basic Map
        var map = L.map('mapBasic').setView([51.505, -0.09], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([51.5, -0.09]).addTo(map).bindPopup('A sample marker.');


        // Map Update Marker
        var lat = document.getElementById("lat");
        var lng = document.getElementById("lng");
        lat.value = 35.10418;
        lng.value = -106.62987;
        var options = {
            center: [35.10418, -106.62987],
            zoom: 10,
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            }
        }

        var map = L.map('mapUpdateMarker', options);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: 'OSM'
            })
            .addTo(map);
        var myMarker = L.marker([35.10418, -106.6287], {
                title: "MyPoint",
                alt: "The Big I",
                draggable: true
            })
            .addTo(map)
            .on('dragend', function() {
                var latMarker = myMarker.getLatLng().lat;
                var lngMarker = myMarker.getLatLng().lng;
                lat.value = latMarker;
                lng.value = lngMarker;
                myMarker.bindPopup("Moved to: " + latMarker + ", " + lngMarker + ".");
            });

        L.DomEvent.on(document.getElementById('btnGetLoc'), 'click', function() {
            map.locate({
                setView: true,
                maxZoom: 16
            }).on("locationfound", e => {
                if (!myMarker) {
                    myMarker = new L.marker(e.latlng).addTo(this.map);
                } else {
                    myMarker.setLatLng(e.latlng);
                }
                var latMarker = myMarker.getLatLng().lat;
                var lngMarker = myMarker.getLatLng().lng;
                lat.value = latMarker;
                lng.value = lngMarker;
            }).on("locationerror", error => {
                if (myMarker) {
                    map.removeLayer(marker);
                    myMarker = undefined;
                }
            });
        });
    </script>
@endpush
