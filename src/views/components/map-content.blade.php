<div class="col-md-{{ $col }}">
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" name="latitude" id="latitude" value="{{ $latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ $longitude }}" >
            <h6 id="finalCoordinates">
                @if (strlen($latitude) != 0)
                    {{ "Coordenadas: Latitude: " . $latitude . ", longitude: " . $longitude }}
                @endif
            </h6>

        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-sm btn-primary fillButton btn-block"
                    data-toggle="modal" data-target="#mapModal">
                Select coordinates
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel"
         aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel">Select coordinates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <h6 id="coordinates"></h6>
                    <button type="button" class="btn btn-primary fillButton" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
