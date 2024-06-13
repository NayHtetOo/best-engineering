@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-primary px-2 py-1 mb-3">Create Brickwork</button>
            </div>

            <div style="overflow-x: auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;">Thickness Type</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;">Ratio Type</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Bricks</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Cements</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Sands</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">X-mets</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Masons</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Workers</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align: center;">Unit</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brickworks as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->thicknessType->name_mm }}</td>
                                <td class="text-center">{{ $data->ratioType->ratio }}</td>
                                <td class="text-center">{{ $data->bricks}}</td>
                                <td class="text-center">{{ $data->cements}}</td>
                                <td class="text-center">{{ $data->sands}}</td>
                                <td class="text-center">{{ $data->xmet ?? '-'}}</td>
                                <td class="text-center">{{ $data->masons}}</td>
                                <td class="text-center">{{ $data->workers}}</td>
                                <td class="text-center">{{ $data->unit}}</td>
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

