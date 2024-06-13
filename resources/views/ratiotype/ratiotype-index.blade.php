@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-primary px-2 py-1 mb-3">Create Work Type</button>
            </div>
            <div style="overflow-x: auto">

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background: #e4f7eb;">
                            <th style="font-weight: bold;background:blue;color:white;d;text-align: center;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;d;min-width: 100px;">Ratio</th>
                            <th style="font-weight: bold;background:blue;color:white;d;min-width: 300px;">Name</th>
                            <th style="font-weight: bold;background:blue;color:white;d;text-align: center;" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratio_types as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->ratio }}</td>
                                <td>{{ $data->name }}</td>
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
