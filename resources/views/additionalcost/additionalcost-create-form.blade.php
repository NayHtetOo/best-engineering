@php
    $additonalcost = $additonalcost ?? null;
    $editId = $editId ?? null;
    $site_id = $site->id;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form autocomplete="off" class="form-inline" method="POST" action="{{ route('additionalcost.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header bg-primary">
                            <h4 class="mt-2 text-center text-white" style="text-transform: uppercase;">{{ __('Additional Costs Application Form') }}</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Site Name</span></label>
                                        <input type="hidden" class="form-control mt-1" id="site_id" name="site_id" value="{{$site_id}}" required>
                                        <input type="text" class="form-control mt-1" readonly value="{{$site->name}}">
                                    </fieldset>
                                </div>

                                <div class="col-4">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Name</span></label>
                                        <input type="text" class="form-control mt-1" onchange="" id="name" name="name" value="{{ old('name', $additonalcost?->name)}}" required>
                                    </fieldset>
                                </div>

                                <div class="col-4">
                                    <fieldset class="form-group">
                                        <label><span class="eng">Amount</span></label>
                                        <input type="number" class="form-control mt-1" onchange="" id="amount" name="amount" value="{{ old('amount', $additonalcost?->amount)}}" required>
                                    </fieldset>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="d-flex justify-content-end mb-2">
                                    <a id="cancel" href="{{ url()->previous() }}" class="btn btn-outline-secondary" style="min-width: 80px;margin-right: 10px;">Cancel</a>
                                    <button class="btn btn-outline-success" name="updateButton" value="{{ $editId }}" type="submit" style="min-width: 80px;">
                                        @isset($additonalcost)
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

    </script>
@endsection
