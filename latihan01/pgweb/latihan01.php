<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="author" content="Yellove">
        <meta name="description" content="leaflet basic">
        
        <!-- Judul pada tab browser -->
        <title>LeafletJS - Covid19 - Yellove</title>
        
        <!-- Leaflet CSS Library -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>

        <!-- Tab browser icon -->
        <link rel="icon" type="image/x-icon" href="http://luk.staff.ugm.ac.id/logo/UGM/Resmi/Warna.gif">

        <!--Simbologi Judul-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        
        <style>
        /* Tampilan peta fullscreen */
        #map {
            height: 660px;
        }
        
        </style>
        </head>
        <body>
            <div id="map"></div>
        </body>

            <!-- Leaflet JavaScript Library -->
            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
            integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
            crossorigin=""></script>
            <script src="assets/plugins/leaflet.ajax.js"></script>
            <script src="assets/plugins/leaflet.ajax.min.js"></script> 
            <script src="data/jalan_sleman.js"></script>
            <script src="data/admin_desa.js"></script>
            <script src="assets/img/marker/marker-pink.png"></script>

            
            <script>
            /* Initial Map */
            var map = L.map('map').setView([-7.696499942818468, 110.38675628684814], 11); //lat, long, zoom
            
            var style1={
                "color": "#F2D388" ,
                "weight" : 3.0,
            }
            var jsonTest = new L.GeoJSON.AJAX(["data/jalan_sleman.geojson"], {onEachFeature:popUp, style:style1}).addTo(map);

            var style={
                "color": "#A5F1E9" ,
                "weight" : 1.0,
                "opacity" : 0.5,
            }
            var jsonTest = new L.GeoJSON.AJAX(["data/admin_desa.geojson"], {onEachFeature:popUp, style:style1}).addTo(map);

            /* Tile Basemap */ 
            var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIGUGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
            });
            
            var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
            });
            var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>'
            });

            var basemap4 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
            });

            basemap1.addTo(map);

            var rs = L.icon({
                iconUrl:"marker-pink.png" ,

                iconsize:[40, 45],
            });

            /* Layer Marker */
            var marker1 = L.marker([-7.767935794555573, 110.373447528389406]);
            marker1.addTo(map);
            marker1.bindPopup("RSUP DR. SARDJITO");
            
            var marker2 = L.marker([-7.686878701628561, 110.341897899552805]);
            marker2.addTo(map);
            marker2.bindPopup("RSUD SLEMAN");

            var marker3 = L.marker([-7.80463845103656, 110.483150583502805]);
            marker3.addTo(map);
            marker3.bindPopup("RSUD PRAMBANAN");
            
            var marker4 = L.marker([-7.75799609936896, 110.402982594211196]);
            marker4.addTo(map);
            marker4.bindPopup("RS JOGJAKARTA INTERNATIONAL HOSPITAL");

            var marker5 = L.marker([-7.772157155803583, 110.4667454306488]);
            marker5.addTo(map);
            marker5.bindPopup("RS PANTI RINI");
            
            var marker6 = L.marker([-7.767653378334843, 110.368097707976503]);
            marker6.addTo(map);
            marker6.bindPopup("RS SAKINA IDAMAN");

            var marker7 = L.marker([-7.800405811816248, 110.317710534437595]);
            marker7.addTo(map);
            marker7.bindPopup("RS PKU MUHAMMADIYAH GAMPING");
            
            var marker8 = L.marker([-7.743158322327536, 110.350388625852304]);
            marker8.addTo(map);
            marker8.bindPopup("RS.Akademik UGM");

            var marker9 = L.marker([-7.766211982001137, 110.471823330021707]);
            marker9.addTo(map);
            marker9.bindPopup("RS BHAYANGKARA");
            
            var marker10 = L.marker([-7.770251589592063, 110.432764723684201]);
            marker10.addTo(map);
            marker10.bindPopup("RS HERMINA");
            
            /* Control Layer */
            var baseMaps = {
                "OpenStreetMap": basemap1,
                "Esri World Street": basemap2,
                "Esri Imagery": basemap3,
                "NatGeo World": basemap4,
            };

            var overlayMaps = {
                "RSUP DR. SARDJITO":marker1,
                "RSUD SLEMAN":marker2,
                "RSUD PRAMBANAN":marker3,
                "RS JOGJAKARTA INTERNATIONAL HOSPITAL":marker4,
                "RS PANTI RINI":marker5,
                "RS SAKINA IDAMAN":marker6,
                "RS PKU MUHAMMADIYAH GAMPING":marker7,
                "RS.Akademik UGM":marker8,
                "RS BHAYANGKARA":marker9,
                "RS HERMINA":marker10,
            }

            //Judul dan Subjudul
            var title = new L.Control();
            title.onAdd = function (map) {
                this._div = L.DomUtil.create("div", "info");
                this.update();
                return this._div;
            };
            title.update = function () {
                this._div.innerHTML = "<h1>Persebaran Rumah sakit di kabupaten Sleman</h1>";
            };
            title.addTo(map);
            
            L.control.layers(baseMaps, overlayMaps, {collapsed: false}).addTo(map);
            
            /* Scale Bar */
            
            L.control.scale({
                maxWidth: 150,position:'bottomright'
            }).addTo(map);


            function popUp(f,l){
                var out = [];
                if (f.properties){
                    for(key in f.properties){
                        out.push(key+": "+f.properties[key]);
                    }
                    l.bindPopup(out.join("<br />"));
                }
        }
            
        var style1={
             "color": "#F2D388" ,
             "weight" : 3.0,
        }
        var jsonTest = new L.GeoJSON.AJAX(["data/jalan_sleman.geojson"], {onEachFeature:popUp, style:style1}).addTo(map);

        var style={
            "color": "#A5F1E9" ,
            "weight" : 1.0,
            "opacity" : 0.5,
        }
        var jsonTest = new L.GeoJSON.AJAX(["data/admin_desa.geojson"], {onEachFeature:popUp, style:style}).addTo(map);

            var geojson = L.geoJson(dataarea, {
                onEachFeature: function (feature, layer) {
                    var popupText = "Kecamatan: " + feature.properties.KECAMATAN;
                    
                    if (feature.properties.NAMOBJ) {
                        popupText += "<br/>Kelurahan: " + feature.properties.DESA;
                    }
                    layer.bindPopup(popupText);
                },
            }).addTo(map);

            var geojson = L.geoJson(datagaris, {
                onEachFeature: function (feature, layer) {
                    var popupText = "Kecamatan: " + feature.properties.KECAMATAN;
                    
                    if (feature.properties.NAMOBJ) {
                        popupText += "<br/>Kelurahan: " + feature.properties.DESA;
                    }
                    layer.bindPopup(popupText);
                },
            }).addTo(map);
            
            </script>
</html>
