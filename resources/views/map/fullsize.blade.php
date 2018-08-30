<div id="map" class="fullsize-map"
     data-longitude="{{$mapCoordinates->longitude}}"
     data-latitude="{{$mapCoordinates->latitude}}"
     data-zoom="{{$mapCoordinates->zoom}}"
     {!! isset($highlightRoute) ? 'data-route="'.$highlightRoute->id.'"' : '' !!}>

</div>