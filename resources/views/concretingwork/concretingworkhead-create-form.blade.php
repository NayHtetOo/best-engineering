@php
    $concretingwork_heads = $concretingwork_heads ?? null;
    $concretingworks = $concretingworks ?? null;
    $editId = $editId ?? null;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form id="myForm" autocomplete="off" class="form-inline" method="POST" action="{{ route('concretingworkhead.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header" style="background:blue;">
                            <h4 class="mt-2 text-center text-white" style="text-transform: uppercase;">{{ __('Concretingwork Head Application Form') }}</h4>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-2">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Site</span></label>

                                        <select class="form-control" name="site_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($sites as $value)
                                                <option value="{{ $value->id }}" {{ old('site_id', $concretingwork_heads?->site_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Ratio Type</span></label>

                                        <select class="form-control" id="ratio_type_id" name="ratio_type_id" onchange="concretingworkEstimate()" required>
                                            <option value="">Choose</option>
                                            @foreach ($ratio_types as $value)
                                                <option value="{{ $value->id }}" {{ old('ratio_type_id', $concretingwork_heads?->ratio_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->ratio }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Length</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="length" name="length" value="{{ old('length', $concretingwork_heads?->length)}}" required>
                                    </fieldset>
                                </div>


                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Width</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="width"  name="width" value="{{ old('width', $concretingwork_heads?->width)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Height</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="height" name="height" value="{{ old('height', $concretingwork_heads?->height)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Qty</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="qty" name="qty" value="{{ old('qty', $concretingwork_heads?->qty)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-2">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Total Volume</span></label>
                                        <input type="number" class="form-control mt-1" onchange="concretingworkEstimate()" id="volume" name="volume" value="{{ old('volume', ($concretingwork_heads?->length * $concretingwork_heads?->height * $concretingwork_heads?->qty))}}" readonly required>
                                    </fieldset>
                                </div>

                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Mixed Type</span></label>

                                        <select class="form-control" id="mixed_type_id" name="mixed_type_id" onchange="concretingworkEstimate()" required>
                                            <option value="">Choose</option>
                                            @foreach ($mixed_types as $value)
                                                <option value="{{ $value->id }}" {{ old('mixed_type_id', $concretingwork_heads?->mixed_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name_mm }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="row mt-3 px-4">
                                    <!-- Labour Costs -->
                                    <div class="col-4 card">
                                        <div class="card-header text-primary">Labour Costs</div>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Masons</span></label>
                                                        <input type="number" class="form-control mt-1" id="masons" name="masons" value="{{ old('masons', $concretingwork_heads?->masons)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Mason Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="mason_rate" name="mason_rate" onchange="labourCostCalculate()" value="{{ old('mason_rate', $concretingwork_heads?->mason_rate)}}" required>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Workers</span></label>
                                                        <input type="number" class="form-control mt-1" id="workers" name="workers" value="{{ old('workers', $concretingwork_heads?->workers)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Worker Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="worker_rate" name="worker_rate" onchange="labourCostCalculate()" value="{{ old('worker_rate', $concretingwork_heads?->worker_rate)}}" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col" id="machineDriverField">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Machine Drivers</span></label>
                                                        <input type="number" class="form-control mt-1" id="machine_drivers" name="machine_drivers" value="{{ old('machine_drivers', $concretingwork_heads?->machine_drivers)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col" id="machineDriverRateField">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Machine Driver Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="machine_driver_rate" name="machine_driver_rate" onchange="labourCostCalculate()" value="{{ old('machine_driver_rate', $concretingwork_heads?->machine_driver_rate)}}" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Material Costs -->
                                    <div class="col-8 card">
                                        <div class="card-header text-primary">Material Costs</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Cements</span></label>
                                                        <input type="number" class="form-control mt-1" id="cements" name="cements" value="{{ old('cements', $concretingwork_heads?->cements)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Cement Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="cement_rate" name="cement_rate" onchange="materialCostCalculate()" value="{{ old('cement_rate', $concretingwork_heads?->cement_rate)}}" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Aggregates</span></label>
                                                        <input type="number" class="form-control mt-1" id="aggregates" name="aggregates" value="{{ old('aggregates', $concretingwork_heads?->aggregates)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Aggregate Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="aggregate_rate" name="aggregate_rate" onchange="materialCostCalculate()" value="{{ old('aggregate_rate', $concretingwork_heads?->aggregate_rate)}}" required>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Sands</span></label>
                                                        <input type="number" class="form-control mt-1" id="sands" name="sands" value="{{ old('sands', $concretingwork_heads?->sands)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Sand Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="sand_rate" name="sand_rate" onchange="materialCostCalculate()" value="{{ old('sand_rate', $concretingwork_heads?->sand_rate)}}" required>
                                                    </fieldset>
                                                </div>

                                                <div class="col" id="fuelField">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Fuel</span></label>
                                                        <input type="number" class="form-control mt-1" id="fuel" name="fuel" value="{{ old('fuel', $concretingwork_heads?->fuel)}}" readonly required>
                                                    </fieldset>
                                                </div>

                                                <div class="col" id="fuelRateField">
                                                    <fieldset class="form-group">
                                                        <label><span class="eng">Fuel Rate</span></label>
                                                        <input type="number" class="form-control mt-1" id="fuel_rate" name="fuel_rate" onchange="materialCostCalculate()" value="{{ old('fuel_rate', $concretingwork_heads?->fuel_rate)}}" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row mt-3 mx-1">
                                                <div class="col-6"></div>

                                                <div class="col-2 text-end">
                                                    <label class="py-1 px-2 bg-primary text-white" style="min-width: 110px;">Material Costs</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="number" class="form-control py-1 text-end" id="material_costs" name="material_costs" value="{{ old('material_costs', $concretingwork_heads?->material_costs)}}" readonly required>
                                                </div>
                                                <div class="col-1 bg-primary text-white py-1">MMK</div>
                                            </div>

                                            <div class="row py-2 mx-1">
                                                <div class="col-6"></div>

                                                <div class="col-2 text-end">
                                                    <label class="py-1 px-2 bg-primary text-white" style="min-width: 110px;">Labour Costs</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="number" class="form-control py-1 text-end" id="labour_costs" name="labour_costs" value="{{ old('labour_costs', $concretingwork_heads?->labour_costs)}}" readonly required>
                                                </div>
                                                <div class="col-1 bg-primary text-white py-1">MMK</div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="d-flex justify-content-end mb-2">
                                        <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                        <button class="btn btn-outline-success" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
                                            @isset($concretingwork_heads)
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
        var concretingworks = @json($concretingworks);

        $(document).ready(function() {
            console.log("JQuery is Here");
            $('#mixed_type_id').change(function() {
                var type = $(this).val();
                if(type == 1){ // လက်ဖျော်
                    $('#fuelField').hide(700);
                    $('#fuelRateField').hide(700);
                    $('#machineDriverField').hide(700);
                    $('#machineDriverRateField').hide(700);
                    appendValue('fuel_rate',0);
                    appendValue('machine_driver_rate',0);

                }
                if(type == 2){ // စက်ဖျော်
                    $('#fuelField').show(700);
                    $('#fuelRateField').show(700);
                    $('#machineDriverField').show(700);
                    $('#machineDriverRateField').show(700);

                }

            });

        });

        function appendValue(id,value){
            document.getElementById(id).value = value;
        }

        function volumeCalculate(){
            var length = document.getElementById("length").value;
            var width = document.getElementById("width").value;
            var height = document.getElementById("height").value;
            var qty = document.getElementById("qty").value;

            var volume = length * width * height * qty;
            document.getElementById('volume').value = volume;
            concretingworkEstimate();
            materialCostCalculate();
            labourCostCalculate();

        }
        function concretingworkEstimate(){
            var ratio_type_id = document.getElementById('ratio_type_id').value;
            var mixed_type_id = document.getElementById('mixed_type_id').value;

            // console.log('Ratio Type Id' + ratio_type_id);
            if(ratio_type_id && mixed_type_id){
                // alert('ID');
                var currentRatioTypeId = parseInt(ratio_type_id);
                var currentMixedTypeId = parseInt(mixed_type_id);

                // Find the type by ID in the types array
                var works = concretingworks.find(function(type) {
                    return type.ratio_type_id === currentRatioTypeId && type.mixed_type_id === currentMixedTypeId;
                });
                // console.log('Current Brickwork' + works);

                var volume = document.getElementById('volume').value;
                // console.log('This is Volume' + volume);

                if(volume != 0 && works){

                    var ratio = volume / 100;

                    var cements = works.cements * ratio;
                    var aggregates = works.aggregates * ratio;
                    var sands = works.sands * ratio;


                    var masons = works.masons * ratio;
                    var workers = works.workers * ratio;
                    if(currentMixedTypeId == 2){
                        var fuel = works.fuel * ratio ;
                        var machine_drivers = works.machine_drivers * ratio;
                        appendValue('fuel',fuel.toFixed(2));
                        appendValue('machine_drivers',machine_drivers.toFixed(2));
                    }

                    appendValue('cements',cements.toFixed(2));
                    appendValue('aggregates',aggregates.toFixed(2));
                    appendValue('sands',sands.toFixed(2));

                    appendValue('masons',masons.toFixed(2));
                    appendValue('workers',workers.toFixed(2));

                    materialCostCalculate();
                    labourCostCalculate();

                }else{
                    appendValue('cements','');
                    appendValue('aggregates','');
                    appendValue('sands','');
                    appendValue('fuel','');

                    appendValue('masons','');
                    appendValue('workers','');
                    appendValue('workers','');
                    appendValue('machine_drivers','');
                }

            }

        }
        function appendValue(id,value){
            document.getElementById(id).value = value;
        }

        function materialCostCalculate(){
        var fuel = document.getElementById("fuel").value;
        var fuel_rate = document.getElementById("fuel_rate").value;

        var cements = document.getElementById("cements").value;
        var cement_rate = document.getElementById("cement_rate").value;

        var sands = document.getElementById("sands").value;
        var sand_rate = document.getElementById("sand_rate").value;

        var aggregates = document.getElementById("aggregates").value;
        var aggregate_rate = document.getElementById("aggregate_rate").value;

        var material_costs = (fuel * fuel_rate) + (cements * cement_rate) + (sands * sand_rate) + (aggregates * aggregate_rate);

        document.getElementById("material_costs").value = material_costs.toFixed(2);

    }

    function labourCostCalculate(){
        var masons = document.getElementById("masons").value;
        var mason_rate = document.getElementById("mason_rate").value;

        var workers = document.getElementById("workers").value;
        var worker_rate = document.getElementById("worker_rate").value;

        var machine_drivers = document.getElementById("machine_drivers").value;
        var machine_driver_rate = document.getElementById("machine_driver_rate").value;

        var labour_costs = (masons * mason_rate) + (workers * worker_rate) + (machine_drivers * machine_driver_rate);

        document.getElementById("labour_costs").value = labour_costs.toFixed(2);
    }

    </script>

@endsection
