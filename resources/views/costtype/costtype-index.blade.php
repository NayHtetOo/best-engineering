@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <a href="" class="btn btn-outline-primary px-2 py-1 mb-3">Create Cost Type</a>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background: #e4f7eb;">
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;width:80px;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: left;">Name</th>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;width:200px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($costtypes as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td class="text-center">
                                    <form action="" method="post" style="display: inline;">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-outline-danger" style="min-width:55px;">Delete</button>
                                    </form>

                                    <a href="" class="btn btn-sm btn-outline-secondary" style="min-width:55px;">Edit</a>
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

