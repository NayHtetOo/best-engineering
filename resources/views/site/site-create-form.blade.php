@php
    $site = $site ?? null;
    $site_edit_id = $site_edit_id ?? null;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form id="myForm" autocomplete="off" class="form-inline" method="POST" action="{{ route('site.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="mt-2 text-center text-primary" style="text-transform: uppercase;">{{ __('Site Creation Form') }}</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <fieldset class="form-group">
                                    <label><span class="eng">Site Name</span></label>
                                    <input type="text" class="form-control" name="site_name" value="{{ old('site_name',$site?->name)}}" required>
                                </fieldset>
                            </div>
                            <div class="col">
                                <fieldset class="form-group">
                                    <label><span class="eng">Address</span></label>
                                    <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ $site?->address }}</textarea>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="d-flex justify-content-end mb-2">
                                <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                <button class="bg-success btn btn-sm btn-success" name="updateButton" value="{{ $site_edit_id}}" type="submit" style="min-width: 80px;">
                                    @isset($site)
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
