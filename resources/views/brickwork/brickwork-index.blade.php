@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-success px-1 py-1 mb-3">Create Thickness Type</button>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr style="background: #e4f7eb;">
                        <th style="font-weight: normal;text-align: center;">No</th>
                        <th style="font-weight: normal;text-align: center;">Thickness Type</th>
                        <th style="font-weight: normal;text-align: center;">Ratio Type</th>
                        <th style="font-weight: normal;min-width: 300px;">Bricks</th>
                        <th style="font-weight: normal;min-width: 300px;">Cements</th>
                        <th style="font-weight: normal;min-width: 300px;">Sands</th>
                        <th style="font-weight: normal;min-width: 300px;">X-mets</th>
                        <th style="font-weight: normal;min-width: 300px;">Masons</th>
                        <th style="font-weight: normal;min-width: 300px;">Workers</th>
                        <th style="font-weight: normal;min-width: 300px;">Unit</th>
                        <th style="font-weight: normal;text-align: center;" width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brickworks as $data)

                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $data->thicknessType->name_mm }}</td>
                            <td>{{ $data->ratioType->name }}</td>
                            <td>{{ $data->bricks}}</td>
                            <td>{{ $data->cements}}</td>
                            <td>{{ $data->sands}}</td>
                            <td>{{ $data->xmet}}</td>
                            <td>{{ $data->masons}}</td>
                            <td>{{ $data->workers}}</td>
                            <td>{{ $data->unit}}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

