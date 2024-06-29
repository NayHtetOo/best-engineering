@php
    $brickwork_heads = $brickwork_heads ?? null;
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
                                <div class="col-3">
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

                                <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Length</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="length" name="length" value="{{ old('length', $brickwork_heads?->length)}}" required>
                                    </fieldset>
                                </div>


                                {{-- <div class="col-1">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Width</span></label>
                                        <input type="number" class="form-control mt-1" onchange="volumeCalculate()" id="width"  name="width" value="{{ old('width', $brickwork_heads?->width)}}" required>
                                    </fieldset>
                                </div> --}}

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
                                        <input type="number" class="form-control mt-1" onchange="earthworkEstimate()" id="volume" name="volume" value="{{ old('volume', ($brickwork_heads?->length * $brickwork_heads?->height * $brickwork_heads?->qty))}}" readonly required>
                                    </fieldset>
                                </div>

                                <div class="col-3">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Thickness Type</span></label>

                                        <select class="form-control" name="site_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($thickness_types as $value)
                                                <option value="{{ $value->id }}" {{ old('site_id', $brickwork_heads?->thickness_type_id) == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name_mm }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Ratio Type</span></label>

                                        <select class="form-control" name="site_id" required>
                                            <option value="">Choose</option>
                                            @foreach ($ratio_types as $value)
                                                <option value="{{ $value->id }}" {{ old('site_id', $brickwork_heads?->ratio_type_id) == $value->id ? 'selected' : '' }}>
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
@endsection
