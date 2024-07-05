@php
    $ratio_type = $ratio_type ?? null;
    $ratio_edit_id = $ratio_edit_id ?? null;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form id="myForm" autocomplete="off" class="form-inline" method="POST" action="{{ route('ratiotype.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="mt-2 text-center text-primary" style="text-transform: uppercase;">{{ __('Ratio Creation Form') }}</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <fieldset class="form-group">
                                    <label><span class="eng">Ratio</span></label>
                                    <input type="text" class="form-control" name="ratio" value="{{ old('ratio',$ratio_type?->ratio)}}" required>
                                </fieldset>
                            </div>
                            <div class="col">
                                <fieldset class="form-group">
                                    <label><span class="eng">Name</span></label>
                                    <input type="text" class="form-control" name="ratio_name" value="{{ old('ratio_name',$ratio_type?->name)}}" required>
                                </fieldset>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="d-flex justify-content-end mb-2">
                                <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                <button class="bg-success btn btn-sm btn-success" name="updateButton" value="{{ $ratio_edit_id}}" type="submit" style="min-width: 80px;">
                                    @isset($ratio_type)
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
@endsection
