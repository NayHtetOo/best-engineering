@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-primary px-2 py-1 mb-3">Create Hearthwork Head</button>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 250px;text-align: left;">Site</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Land Type</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 350px;">Description</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Length</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Width</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Height</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Qty</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Workers</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:end;">Salary Rate</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:end;">Amount</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width:100px;text-align: center;min-width:150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($earthwork_heads as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->site->name }}</td>
                                <td class="text-center">{{ $data->landType->name_mm }}</td>

                                <td>{{ $data->description}}</td>
                                <td class="text-center">{{ $data->length}}</td>
                                <td class="text-center">{{ $data->width}}</td>
                                <td class="text-center">{{ $data->height}}</td>
                                <td class="text-center">{{ $data->qty}}</td>
                                <td class="text-center">{{ $data->workers}}</td>
                                <td class="text-end">{{ $data->salary_rate}}</td>
                                <td class="text-end">{{ $data->amount}}</td>
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
