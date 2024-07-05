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

                        <div class="card-header">
                            <h4 class="mt-2 text-center text-primary" style="text-transform: uppercase;">{{ __('Concretingwork Head Application Form') }}</h4>
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

                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="px-2 py-2">Material Costs</div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Cements</span></label>
                                                    <input type="number" class="form-control mt-1" id="cements" name="cements" value="{{ old('cements', $concretingwork_heads?->cements)}}" readonly required>
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
                                                    <label><span class="eng">Sands</span></label>
                                                    <input type="number" class="form-control mt-1" id="sands" name="sands" value="{{ old('sands', $concretingwork_heads?->sands)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col" id="fuelField">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Fuel</span></label>
                                                    <input type="number" class="form-control mt-1" id="fuel" name="fuel" value="{{ old('fuel', $concretingwork_heads?->fuel)}}" readonly required>
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
                                                    <input type="number" class="form-control mt-1" id="masons" name="masons" value="{{ old('masons', $concretingwork_heads?->masons)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Workers</span></label>
                                                    <input type="number" class="form-control mt-1" id="workers" name="workers" value="{{ old('workers', $concretingwork_heads?->workers)}}" readonly required>
                                                </fieldset>
                                            </div>

                                            <div class="col" id="machineDriverField">
                                                <fieldset class="form-group">
                                                    <label><span class="eng">Machine Drivers</span></label>
                                                    <input type="number" class="form-control mt-1" id="machine_drivers" name="machine_drivers" value="{{ old('machine_drivers', $concretingwork_heads?->machine_drivers)}}" readonly required>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="d-flex justify-content-end mb-2">
                                        <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary button" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                        <button class="bg-success btn btn-success button" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
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
                    $('#machineDriverField').hide(700);
                }
                if(type == 2){ // စက်ဖျော်
                    $('#fuelField').show(700);
                    $('#machineDriverField').show(700);
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
            concretingworkEstimate();

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

    </script>

@endsection
