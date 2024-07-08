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
                                        <label><span class="eng">Total Volume(Sq-ft)</span></label>
                                        <input type="number" class="form-control mt-1 text-end" onchange="brickworkEstimate()" id="volume" name="volume" value="{{ old('volume', ($brickwork_heads?->length * $brickwork_heads?->height * $brickwork_heads?->qty))}}" readonly required>
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


                                <div class="row mt-3 px-4">

                                    <div class="col-8 card">
                                        <div class="card-header">
                                            Material Costs
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Bricks</span></label>
                                                        <input type="number" class="form-control mt-1 text-end" id="bricks" name="bricks" value="{{ old('bricks', $brickwork_heads?->bricks)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Brick Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="brick_rate" onchange="materialCostCalculate()" name="brick_rate" value="{{ old('brick_rate', $brickwork_heads?->brick_rate)}}" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Cements</span></label>
                                                        <input type="number" class="form-control mt-1 text-end" id="cements" name="cements" value="{{ old('cements', $brickwork_heads?->cements)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Cement Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="cement_rate" onchange="materialCostCalculate()" name="cement_rate" value="{{ old('cement_rate', $brickwork_heads?->cement_rate)}}" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row py-3">
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Sands</span></label>
                                                        <input type="number" class="form-control mt-1 text-end" id="sands" onchange="materialCostCalculate()" name="sands" value="{{ old('sands', $brickwork_heads?->sands)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Sand Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="sand_rate" name="sand_rate" onchange="materialCostCalculate()" value="{{ old('sand_rate', $brickwork_heads?->sand_rate)}}" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">X-met</span></label>
                                                        <input type="number" class="form-control mt-1 text-end" id="xmet" name="xmet" value="{{ old('xmet', $brickwork_heads?->xmet)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">X-met Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="xmet_rate" name="xmet_rate" onchange="materialCostCalculate()" value="{{ old('xmet_rate', $brickwork_heads?->xmet_rate)}}">
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-4 card">
                                        <div class="card-header">
                                            Labour Costs
                                        </div>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Masons</span></label>
                                                        <input type="number" class="form-control mt-1 text-end" id="masons" name="masons" value="{{ old('masons', $brickwork_heads?->masons)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Mason Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="mason_rate" name="mason_rate" onchange="labourCostCalculate()" value="{{ old('mason_rate', $brickwork_heads?->mason_rate)}}" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row py-3">
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Workers</span></label>
                                                        <input type="number" class="form-control mt-1 text-end" id="workers" name="workers" value="{{ old('workers', $brickwork_heads?->workers)}}" readonly required>
                                                    </fieldset>
                                                </div>
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Worker Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="worker_rate" name="worker_rate" onchange="labourCostCalculate()" value="{{ old('worker_rate', $brickwork_heads?->worker_rate)}}" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-8"></div>

                                    <div class="col-2 text-end">
                                        <label class="py-1 px-2 bg-primary text-white" style="min-width: 110px;">Material Costs</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control py-1 text-end" id="material_costs" name="material_costs" value="{{ old('material_costs', $brickwork_heads?->material_costs)}}" readonly required>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-8"></div>

                                    <div class="col-2 text-end">
                                        <label class="py-1 px-2 bg-primary text-white" style="min-width: 110px;">Labour Costs</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control py-1 text-end" id="labour_costs" name="labour_costs" value="{{ old('labour_costs', $brickwork_heads?->labour_costs)}}" readonly required>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="d-flex justify-content-end mb-2">
                                        <a id="cancel" href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary px-4 py-2" style="min-width: 80px;margin-right: 7px;">Cancel</a>
                                        <button class="btn btn-sm btn-outline-success px-4 py-2" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
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
        materialCostCalculate();
        labourCostCalculate();

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

                materialCostCalculate();
                labourCostCalculate();
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

    function materialCostCalculate(){
        var bricks = document.getElementById("bricks").value;
        var brick_rate = document.getElementById("brick_rate").value;

        var cements = document.getElementById("cements").value;
        var cement_rate = document.getElementById("cement_rate").value;

        var sands = document.getElementById("sands").value;
        var sand_rate = document.getElementById("sand_rate").value;

        var xmet = document.getElementById("xmet").value;
        var xmet_rate = document.getElementById("xmet_rate").value;

        var material_costs = (bricks * brick_rate) + (cements * cement_rate) + (sands * sand_rate) + (xmet * xmet_rate);

        document.getElementById("material_costs").value = material_costs.toFixed(2);
    }

    function labourCostCalculate(){
        var masons = document.getElementById("masons").value;
        var mason_rate = document.getElementById("mason_rate").value;

        var workers = document.getElementById("workers").value;
        var worker_rate = document.getElementById("worker_rate").value;

        var labour_costs = (masons * mason_rate) + (workers * worker_rate);

        document.getElementById("labour_costs").value = labour_costs.toFixed(2);
    }

    </script>

@endsection
