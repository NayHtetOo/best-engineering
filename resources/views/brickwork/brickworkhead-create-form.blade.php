@php
    $brickwork_heads = $brickwork_heads ?? null;
    $brickworks = $brickworks ?? null;
    $editId = $editId ?? null;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form id="myForm" autocomplete="off" class="form-inline" method="POST" action="{{ route('brickworkhead.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="mt-2 text-center text-primary" style="text-transform: uppercase;">{{ __('Brickwork Head Application Form') }}</h4>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-2">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Site</span></label>

                                        <select class="form-control" name="site_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($sites as $value)
                                                <option value="{{ $value->id }}" {{ old('site_id', $brickwork_heads?->site_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Thickness Type</span></label>

                                        <select class="form-control" id="thickness_type" name="thickness_type_id" onchange="brickworkEstimate()" required>
                                            <option value="">Choose</option>
                                            @foreach ($thickness_types as $value)
                                                <option value="{{ $value->id }}" {{ old('thickness_type_id', $brickwork_heads?->thickness_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name_mm }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Length</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="length" name="length" value="{{ old('length', $brickwork_heads?->length)}}" required>
                                    </fieldset>
                                </div>


                                <div class="col-1" id="widthField">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Width</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="width"  name="width" value="{{ old('width', $brickwork_heads?->width)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Height</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="height" name="height" value="{{ old('height', $brickwork_heads?->height)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Qty</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="qty" name="qty" value="{{ old('qty', $brickwork_heads?->qty)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-2">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Total Volume</span></label>
                                        <input type="number" class="form-control mt-1" onchange="brickworkEstimate()" id="volume" name="volume" value="{{ old('volume', ($brickwork_heads?->length * $brickwork_heads?->height * $brickwork_heads?->qty))}}" readonly required>
                                    </fieldset>
                                </div>



                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Ratio Type</span></label>

                                        <select class="form-control" id="ratio_type_id" name="ratio_type_id" onchange="brickworkEstimate()" required>
                                            <option value="">Choose</option>
                                            @foreach ($ratio_types as $value)
                                                <option value="{{ $value->id }}" {{ old('ratio_type_id', $brickwork_heads?->ratio_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->ratio }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="px-2 py-2">Material Costs</div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Bricks</span></label>
                                                    <input type="number" class="form-control mt-1" id="bricks" name="bricks" value="{{ old('bricks', $brickwork_heads?->bricks)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Cements</span></label>
                                                    <input type="number" class="form-control mt-1" id="cements" name="cements" value="{{ old('cements', $brickwork_heads?->cements)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Sands</span></label>
                                                    <input type="number" class="form-control mt-1" id="sands" name="sands" value="{{ old('sands', $brickwork_heads?->sands)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">X-met</span></label>
                                                    <input type="number" class="form-control mt-1" id="xmet" name="xmet" value="{{ old('xmet', $brickwork_heads?->xmet)}}" readonly required>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="px-2 py-2">Labour Costs</div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Masons</span></label>
                                                    <input type="number" class="form-control mt-1" id="masons" name="masons" value="{{ old('masons', $brickwork_heads?->masons)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Workers</span></label>
                                                    <input type="number" class="form-control mt-1" id="workers" name="workers" value="{{ old('workers', $brickwork_heads?->workers)}}" readonly required>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="d-flex justify-content-end mb-2">
                                        <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary button" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                        <button class="bg-success btn btn-success button" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
                                            @isset($brickwork_heads)
                                                Update
                                            @else
                                                Save
                                            @endisset
                                        </button>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var brickworks = @json($brickworks);

        $(document).ready(function() {
            console.log("JQuery is Here");
            $('#thickness_type').change(function() {
                var thickness_type = $(this).val();
                if(thickness_type == 1){ // ၄ လက်မ အထူ
                    $('#widthField').hide(800);
                    $('#width').val(1);
                }
                if(thickness_type == 2){ // ၉ လက်မ အထူ
                    $('#widthField').show(800);
                }

            });

        });

    function volumeCalculate(){
        var length = document.getElementById("length").value;
        var width = document.getElementById("width").value;
        var height = document.getElementById("height").value;
        var qty = document.getElementById("qty").value;

        var volume = length * width * height * qty;
        document.getElementById('volume').value = volume;
        brickworkEstimate();

    }
    function brickworkEstimate(){
        var ratio_type_id = document.getElementById('ratio_type_id').value;
        var thickness_type_id = document.getElementById('thickness_type').value;

        // console.log('Ratio Type Id' + ratio_type_id);
        if(ratio_type_id && thickness_type_id){
            // alert('ID');
            var currentRatioTypeId = parseInt(ratio_type_id);
            var currentThicknessTypeId = parseInt(thickness_type_id);

            // Find the type by ID in the types array
            var brickwork = brickworks.find(function(type) {
                return type.ratio_type_id === currentRatioTypeId && type.thickness_type_id === currentThicknessTypeId;
            });
            // console.log('Current Brickwork' + brickwork);

            var volume = document.getElementById('volume').value;
            // console.log('This is Volume' + volume);

            if(volume != 0 && brickwork){

                var ratio = volume / 100;

                var bricks = brickwork.bricks * ratio;
                var cements = brickwork.cements * ratio;
                var sands = brickwork.sands * ratio;
                var xmet = brickwork.xmet * ratio;
                var masons = brickwork.masons * ratio;
                var workers = brickwork.workers * ratio;

                appendValue('bricks',bricks.toFixed(2));
                appendValue('cements',cements.toFixed(2));
                appendValue('sands',sands.toFixed(2));
                appendValue('xmet',xmet.toFixed(2));
                appendValue('masons',masons.toFixed(2));
                appendValue('workers',workers.toFixed(2));
            }else{
                appendValue('bricks','');
                appendValue('cements','');
                appendValue('sands','');
                appendValue('xmet','');
                appendValue('masons','');
                appendValue('workers','');
            }

        }

    }
    function appendValue(id,value){
        document.getElementById(id).value = value;
    }

    </script>

@endsection
