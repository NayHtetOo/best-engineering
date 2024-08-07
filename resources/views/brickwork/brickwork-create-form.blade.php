@php
    $brickworks = $brickworks ?? null;
    $editId = $editId ?? null;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form autocomplete="off" class="form-inline" method="POST" action="{{ route('brickwork.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header bg-primary">
                            <h4 class="mt-2 text-center text-white" style="text-transform: uppercase;">{{ __('Brickwork Application Form') }}</h4>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Thickness Type</span></label>

                                        <select class="form-control" name="thickness_type" required>
                                            <option value="">Choose</option>
                                            @foreach ($thickness_types as $value)
                                                <option value="{{ $value->id }}" {{ old('thickness_type_id', $brickworks?->thickness_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name_mm }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Ratio Type</span></label>

                                        <select class="form-control" name="ratio_type_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($ratio_types as $value)
                                                <option value="{{ $value->id }}" {{ old('ratio_type_id', $brickworks?->ratio_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->ratio }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Bricks</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="bricks" name="bricks" value="{{ old('bricks', $brickworks?->bricks)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Cements</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="cements"  name="cements" value="{{ old('cements', $brickworks?->cements)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Sands</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="sands" name="sands" value="{{ old('sands', $brickworks?->sands)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1" id="xmetField">
                                    <fieldset class="form-group">
                                        <label><span class="eng">X-mets</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="xmet" name="xmet" value="{{ old('xmet', $brickworks?->xmet)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Masons</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="masons" name="masons" value="{{ old('masons', $brickworks?->masons)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Workers</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="workers" name="workers" value="{{ old('workers', $brickworks?->workers)}}" required>
                                    </fieldset>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="d-flex justify-content-end mb-2">
                                    <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                    <button class="btn btn-outline-success" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
                                        @isset($brickworks)
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
        $(document).ready(function() {
            $('#thickness_type').change(function() {
                alert('choose thickness type');
                var thickness_type = $(this).val();

                if(thickness_type == 1){ // ၄ လက်မ အထူ
                    $('#xmetField').show(800);
                }
                if(thickness_type == 2){ // ၉ လက်မ အထူ
                    $('#xmetField').hide(800);

                }

            });

        });

    </script>
@endsection
