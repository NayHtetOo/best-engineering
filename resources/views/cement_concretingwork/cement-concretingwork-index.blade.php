@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-primary px-2 py-1 mb-3">Create Cement Concreting Work Head</button>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background: #e4f7eb;">
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width:250px;text-align: left;">Site</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width:100px;text-align: center;">Ratio Type</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width:100px;text-align: center;">Mixed Type</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Length</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Width</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Height</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Qty</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Cements</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Aggregates</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Sands</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Masons</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Workers</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Fuels</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 130px;text-align: center;">Machine Drivers</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;min-width:150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cement_concretingworks as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->site->name }}</td>
                                <td class="text-center">{{ $data->ratioType->ratio }}</td>
                                <td class="text-center">{{ $data->mixedType->name_mm }}</td>

                                <td class="text-center">{{ $data->length}}</td>
                                <td class="text-center">{{ $data->width}}</td>
                                <td class="text-center">{{ $data->height}}</td>
                                <td class="text-center">{{ $data->qty}}</td>

                                <td class="text-center">{{ $data->cements}}</td>
                                <td class="text-center">{{ $data->aggregates}}</td>
                                <td class="text-center">{{ $data->sands}}</td>

                                <td class="text-center">{{ $data->masons}}</td>
                                <td class="text-center">{{ $data->workers}}</td>

                                <td class="text-center">{{ $data->fuel ?? '-'}}</td>
                                <td class="text-center">{{ $data->machine_drivers ?? '-'}}</td>

                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-secondary" style="min-width: 50px;">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete?')" style="min-width: 50px;">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
