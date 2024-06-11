@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <button class="btn btn-outline-success px-1 py-1 mb-3">Create Work Type</button>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr style="background: #e4f7eb;">
                        <th style="font-weight: normal;text-align: center;">No</th>
                        <th style="font-weight: normal;min-width: 300px;">Ratio</th>
                        <th style="font-weight: normal;min-width: 300px;">Name</th>
                        <th style="font-weight: normal;text-align: center;" width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ratio_types as $data)

                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $data->ratio }}</td>
                            <td>{{ $data->name }}</td>
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
