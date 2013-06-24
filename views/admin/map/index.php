<!-- Load Google Map Api v3 -->
<script type="text/javascript">
    var googleMap = Asset.javascript('http://maps.googleapis.com/maps/api/js?sensor=true&callback=handleApiReady', {
        id: 'googleMap',
        onLoad: function(){
            console.log('Google MAP API Loaded...');
        }
    });
</script>

<div id="maincolumn">

    <h2 class="main map"><?php echo lang('module_map_title'); ?></h2>

    <div class="main subtitle">

        <!-- About Map Module -->
        <p class="lite">
            <?php echo lang('module_map_about'); ?>
        </p>
    </div>

    <div class="tabsidecolumn" style="background: none; padding: 0;">
        <div data-title="<?php echo lang('module_map_title_map_management') ?>" class="desktopBloc content-panel collapsed" id="mapManagementBloc" style="width: 100%;">
            <!--
            <p class="lite">Some info</p>
            -->
            <hr />

            <form id="mapManagementForm" method="post">

                <!-- Center -->
                <dl class="small">
                    <dt>
                        <label for="center"><?php echo lang('module_map_label_center'); ?></label>
                    </dt>
                    <dd>
                        <input id="center" class="inputtext" type="text" value="<?php echo $center; ?>" name="center">
                    </dd>
                </dl>

                <!-- Height -->
                <dl class="small">
                    <dt>
                        <label for="height"><?php echo lang('module_map_label_height'); ?></label>
                    </dt>
                    <dd>
                        <input id="height" class="inputtext w60" type="text" value="<?php echo $height; ?>" name="height">
                    </dd>
                </dl>

                <!-- Width -->
                <dl class="small">
                    <dt>
                        <label for="width"><?php echo lang('module_map_label_width'); ?></label>
                    </dt>
                    <dd>
                        <input id="width" class="inputtext w60" type="text" value="<?php echo $width; ?>" name="width">
                    </dd>
                </dl>

                <!-- Zoom -->
                <dl class="small">
                    <dt>
                        <label for="zoom"><?php echo lang('module_map_label_zoom'); ?></label>
                    </dt>
                    <dd>
                        <input id="zoom" class="inputtext w60" type="text" value="<?php echo $zoom; ?>" name="zoom">
                    </dd>
                </dl>

                <!-- Map Type -->
                <dl class="small">
                    <dt>
                        <label><?php echo lang('module_map_label_map_type'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="SATELLITE"<?php echo ($map_type === 'SATELLITE') ? ' checked="checked"' : ''; ?> id="satellite" name="map_type"><label for="satellite"><?php echo lang('module_map_label_map_type_satellite') ?></label><br>
                        <input type="radio" value="TERRAIN"<?php echo ($map_type === 'TERRAIN') ? ' checked="checked"' : ''; ?> id="terrain" name="map_type"><label for="terrain"><?php echo lang('module_map_label_map_type_terrain') ?></label><br>
                        <input type="radio" value="ROADMAP"<?php echo ($map_type === 'ROADMAP') ? ' checked="checked"' : ''; ?> id="roadmap" name="map_type"><label for="roadmap"><?php echo lang('module_map_label_map_type_roadmap') ?></label><br>
                        <input type="radio" value="HYBRID"<?php echo ($map_type === 'HYBRID') ? ' checked="checked"' : ''; ?> id="hybrid" name="map_type"><label for="hybrid"><?php echo lang('module_map_label_map_type_hybrid') ?></label>
                    </dd>
                </dl>

                <!-- Disble Zoom Control -->
                <dl class="small">
                    <dt>
                        <label><?php echo lang('module_map_label_zoom_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disableZoomControl === 1) ? ' checked="checked"' : ''; ?> id="zoomOFF" name="disableZoomControl"><label for="zoomOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disableZoomControl === 0) ? ' checked="checked"' : ''; ?> id="zoomON" name="disableZoomControl"><label for="zoomON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Disble Navigation Control -->
                <dl class="small">
                    <dt>
                        <label><?php echo lang('module_map_label_navigation_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disableNavigationControl === 1) ? ' checked="checked"' : ''; ?> id="navOFF" name="disableNavigationControl"><label for="navOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disableNavigationControl === 0) ? ' checked="checked"' : ''; ?> id="navON" name="disableNavigationControl"><label for="navON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Disble Pan Control -->
                <dl class="small">
                    <dt>
                        <label><?php echo lang('module_map_label_pan_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disablePanControl === 1) ? ' checked="checked"' : ''; ?> id="panOFF" name="disablePanControl"><label for="panOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disablePanControl === 0) ? ' checked="checked"' : ''; ?> id="panON" name="disablePanControl"><label for="panON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Disble Scale Control -->
                <dl class="small">
                    <dt>
                        <label for="disableScaleControl"><?php echo lang('module_map_label_scale_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disableScaleControl === 1) ? ' checked="checked"' : ''; ?> id="scaleOFF" name="disableScaleControl"><label for="scaleOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disableScaleControl === 0) ? ' checked="checked"' : ''; ?> id="scaleON" name="disableScaleControl"><label for="scaleON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Disble Map Type Control -->
                <dl class="small">
                    <dt>
                        <label><?php echo lang('module_map_label_map_type_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disableMapTypeControl === 1) ? ' checked="checked"' : ''; ?> id="mapTypeOFF" name="disableMapTypeControl"><label for="mapTypeOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disableMapTypeControl === 0) ? ' checked="checked"' : ''; ?> id="mapTypeON" name="disableMapTypeControl"><label for="mapTypeON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Disble Street View Control -->
                <dl class="small">
                    <dt>
                        <label><?php echo lang('module_map_label_street_view_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disableStreetViewControl === 1) ? ' checked="checked"' : ''; ?> id="streetViewOFF" name="disableStreetViewControl"><label for="streetViewOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disableStreetViewControl === 0) ? ' checked="checked"' : ''; ?> id="streetViewON" name="disableStreetViewControl"><label for="streetViewON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Disble Overview Map Control -->
                <dl class="small">
                    <dt>
                        <label for="disableOverviewMapControl"><?php echo lang('module_map_label_overview_map_control'); ?></label>
                    </dt>
                    <dd>
                        <input type="radio" value="1"<?php echo ($disableOverviewMapControl === 1) ? ' checked="checked"' : ''; ?> id="overviewOFF" name="disableOverviewMapControl"><label for="overviewOFF"><?php echo lang('module_map_label_off') ?></label><br>
                        <input type="radio" value="0"<?php echo ($disableOverviewMapControl === 0) ? ' checked="checked"' : ''; ?> id="overviewON" name="disableOverviewMapControl"><label for="overviewON"><?php echo lang('module_map_label_on') ?></label>
                    </dd>
                </dl>

                <!-- Save Map -->
                <dl class="small">
                    <dt> </dt>
                    <dd>
                        <input type="submit" id="mapManagementSubmit" class="input submit" name="submit" value="<?php echo lang('ionize_button_save'); ?>" />
                    </dd>
                </dl>
            </form>
        </div>
        <div data-title="<?php echo lang('module_map_title_marker_management') ?>" class="desktopBloc content-panel collapsed" id="markerManagementBloc" style="width: 100%;">
            <hr />

            <form id="markerManagementForm" method="post">
                <!-- Marker Position -->
                <dl class="small">
                    <dt>
                        <label for="marker_position"><?php echo lang('module_map_label_marker_position'); ?></label>
                    </dt>
                    <dd>
                        <input id="marker_position" class="inputtext" type="text" value="<?php echo $marker_position; ?>" name="marker_position">
                    </dd>
                </dl>
            </form>
        </div>
    </div>

    <div class="tabcolumn">
        <div id="map-canvas"></div>
    </div>
</div>

<script type="text/javascript">

    $$('.desktopBloc').each(function(bloc){
        new ION.ContentPanel({
            'id': bloc.id,
            'title': bloc.getAttribute('data-title'),
            'container':bloc
        });
    });

    function updateMarkerPosition(latLng) {
        document.getElementById('marker_position').value = [
            latLng.lat(),
            latLng.lng()
        ].join(', ');
    }


    function handleApiReady() {
        var map;

        var mapLatLng = new google.maps.LatLng(<?php echo $center; ?>);
        var mapOptions = {
            zoom: <?php echo $zoom; ?>,
            center: mapLatLng,
            mapTypeId: google.maps.MapTypeId.<?php echo $map_type; ?>,
            zoomControl: false,
            navigationControl:false,
            panControl:<?php echo (($disablePanControl==1) ? 'false' : 'true'); ?>,
            zoomControl:<?php echo (($disableZoomControl==1) ? 'false' : 'true'); ?>,
            scaleControl:<?php echo (($disableScaleControl==1) ? 'false' : 'true'); ?>,
            mapTypeControl:<?php echo (($disableMapTypeControl==1) ? 'false' : 'true'); ?>,
            streetViewControl:<?php echo (($disableStreetViewControl==1) ? 'false' : 'true'); ?>,
            overviewMapControl:<?php echo (($disableOverviewMapControl==1) ? 'false' : 'true'); ?>

        }

        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        var mapMarker = new google.maps.Marker({
            position: mapLatLng,
            title: '<?= lang('module_map_drag_and_drop_marker') ?>',
            map: map,
            draggable: true
        });

        // Update Map Center Position
        google.maps.event.addListener(map, 'center_changed', function() {
            var mapCenter = map.getCenter();
            $('center').value = mapCenter.lat() + ', ' + mapCenter.lng();
//            window.setTimeout(function() {
//                map.panTo(marker.getPosition());
//            }, 3000);
        });

        // Update Marker Posion
        google.maps.event.addListener(mapMarker, 'drag', function () {
            var mapMarkerLatLng = mapMarker.getPosition();
            $('marker_position').value = mapMarkerLatLng.lat() + ', ' + mapMarkerLatLng.lng();
        });

        // Update Zoom Level
        google.maps.event.addListener(map, 'zoom_changed', function() {
            var zoomLevel = map.getZoom();
            $('zoom').value = zoomLevel;
        });

        // Map Type
        $$('input[name=map_type]').addEvent('click', function(){
            var val = this.get('value');

            switch (val) {
                case 'HYBRID':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.HYBRID
                    });
                    break
                case 'ROADMAP':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.ROADMAP
                    });
                    break
                case 'SATELLITE':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.SATELLITE
                    });
                    break
                case 'TERRAIN':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.TERRAIN
                    });
                    break
            }
        });

        // Disble Zoom Control
        $$('input[name=disableZoomControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        zoomControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        zoomControl:false
                    });
                    break
            }
        });

        // Disble Navigation Control
        $$('input[name=disableNavigationControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        navigationControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        navigationControl:false
                    });
                    break
            }
        });

        // Disble Pan Control
        $$('input[name=disablePanControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        panControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        panControl:false
                    });
                    break
            }
        });

        // Disble Scale Control
        $$('input[name=disableScaleControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        scaleControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        scaleControl:false
                    });
                    break
            }
        });

        // Disble Map Type Control
        $$('input[name=disableMapTypeControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        mapTypeControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        mapTypeControl:false
                    });
                    break
            }
        });

        // Disable Street View Control
        $$('input[name=disableStreetViewControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        streetViewControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        streetViewControl:false
                    });
                    break
            }
        });

        // Disble Overview Map Control
        $$('input[name=disableOverviewMapControl]').addEvent('click', function(){
            var val = this.get('value');

            // Disable = 1, Enable = 0
            switch (val) {
                case '0':
                    map.setOptions({
                        overviewMapControl:true
                    });
                    break
                case '1':
                    map.setOptions({
                        overviewMapControl:false
                    });
                    break
            }
        });
    }

</script>