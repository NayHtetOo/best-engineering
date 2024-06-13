@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-primary px-2 py-1 mb-3">Create Site</button>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background: #e4f7eb;">
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;width:80px;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: left;">Name</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: left;">Address</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;width:120px;">Attachment</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;width:180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sites as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->address }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary" style="min-width:50px;">view</button>
                                </td>

                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-secondary" style="min-width:50px;">Edit</button>
                                    <button class="btn btn-sm btn-outline-primary" style="min-width:50px;">Show</button>
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

