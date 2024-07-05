@php
    $earthwork_heads = $earthwork_heads ?? null;
    $editId = $editId ?? null;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form id="myForm" autocomplete="off" class="form-inline" method="POST" action="{{ route('earthworkhead.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="mt-2 text-center text-primary" style="text-transform: uppercase;">{{ __('Earthwork Application Form') }}</h4>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Site</span></label>

                                        <select class="form-control" name="site_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($sites as $value)
                                                <option value="{{ $value->id }}" {{ old('site_id', $earthwork_heads?->site_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Description</span></label>
                                        <input type="text" class="form-control" name="description" value="{{ old('description', $earthwork_heads?->description)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Length</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="length" name="length" value="{{ old('length', $earthwork_heads?->length)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Width</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="width"  name="width" value="{{ old('width', $earthwork_heads?->width)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Height</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="height" name="height" value="{{ old('height', $earthwork_heads?->height)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Qty</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="qty" name="qty" value="{{ old('qty', $earthwork_heads?->qty)}}" required>
                                    </fieldset>
                                </div>



                            </div>

                            <div class="row my-3">

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Total Volume</span></label>
                                        <input type="number" class="form-control mt-1" onchange="earthworkEstimate()" id="volume" name="volume" value="{{ old('volume', ($earthwork_heads?->length * $earthwork_heads?->width * $earthwork_heads?->height * $earthwork_heads?->qty))}}" readonly required>
                                    </fieldset>
                                </div>

                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Land Type</span></label>
                                        <select class="form-control" id="land_type_id" name="land_type_id" onchange="earthworkEstimate()" required>
                                            <option value="">Choose</option>
                                            @foreach ($land_types as $land)
                                                <option value="{{ $land->id }}" {{ old('land_type_id',$earthwork_heads?->land_type_id) == $land->id ? 'selected' : '' }}>
                                                    {{ $land->name_mm }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Workers</span></label>
                                        <input type="number" class="form-control mt-1" id="workers" name="workers" value="{{ old('workers', $earthwork_heads?->workers)}}" readonly required>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Salary Rate</span></label>
                                        <input type="number" class="form-control mt-1" onchange="amountCalculate()" id="salary_rate" name="salary_rate" value="{{ old('salary_rate', $earthwork_heads?->salary_rate) }}" required>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Amount</span></label>
                                        <input type="number" class="form-control mt-1" id="amount" name="amount" value="{{ old('amount', $earthwork_heads?->amount) }}" readonly required>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Cost Type</span></label>

                                        <select class="form-control" name="cost_type_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($cost_types as $value)
                                                <option value="{{ $value->id }}" {{ old('cost_type_id', $earthwork_heads?->cost_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                            </div>


                            <div class="row mt-4">
                                <div class="d-flex justify-content-end mb-2">
                                    <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary button" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                    <button class="bg-success btn btn-success button" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
                                        @isset($earthwork_heads)
                                            Update
                                        @else
                                            Save
                                        @endisset
                                    </button>
                                </div>
                            </div>



                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        var land_types = @json($land_types);

        // on change event for land type
        function earthworkEstimate() {
            // console.log(element);
            var land_type = document.getElementById('land_type_id').value;
            var currentLandTypeId = parseInt(land_type);
            // Find the land type by ID in the land_types array
            var landType = land_types.find(function(type) {
                return type.id === currentLandTypeId;
            });

            if (landType) {
                var rate = landType.rate;
                var volume = document.getElementById("volume").value;

                var neededWorkers = volume * (rate / 100);

                document.getElementById('workers').value = neededWorkers;

                amountCalculate();

            } else {
                console.log("Land type not found.");
            }
        }

        function volumeCalculate(){
            var length = document.getElementById("length").value;
            var width = document.getElementById("width").value;
            var height = document.getElementById("height").value;
            var qty = document.getElementById("qty").value;

            var volume = length * width * height * qty;

            document.getElementById('volume').value = volume;
            earthworkEstimate();

        }

        function amountCalculate(){
            var workers = document.getElementById("workers").value;
            var salary_rate = document.getElementById("salary_rate").value;
            var amount = workers * salary_rate;
            document.getElementById('amount').value = amount.toFixed(2);
        }

    </script>
@endsection
