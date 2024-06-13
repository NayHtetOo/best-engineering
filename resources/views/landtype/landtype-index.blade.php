@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-primary px-2 py-1 mb-3">Create Land Type</button>
            </div>

            <div style="overflow-x: auto">

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="font-weight: bold;background-color: blue;color:white;text-align: center;">No</th>
                            <th style="font-weight: bold;background-color: blue;color:white;min-width: 400px;">Name in Myanmar</th>
                            <th style="font-weight: bold;background-color: blue;color:white;min-width: 400px;">Name in English</th>
                            <th style="font-weight: bold;background-color: blue;color:white;min-width: 100px;text-align:center">Rate</th>
                            <th style="font-weight: bold;background-color: blue;color:white;text-align: center;" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($land_types as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->name_mm }}</td>
                                <td>{{ $data->name_eng }}</td>
                                <td class="text-center">{{ $data->rate }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-secondary" style="min-width: 50px;">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" style="min-width: 50px;" onclick="return confirm('Are you sure to delete?')">Delete</button>

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
