@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-end">
                <a href="{{ route('earthworkhead.create')}}" class="btn btn-outline-primary px-2 py-1 mb-3">Create Hearthwork Head</a>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="font-weight: bold;background:blue;color:white;text-align: center;">No</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 250px;text-align: left;">Site</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 200px;text-align: left;">Land Type</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 350px;">Description</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Length</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Width</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Height</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Qty</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 150px;text-align:center;">Volume (Cu-ft)</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 100px;text-align:center;">Workers</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 150px;text-align:end;">Salary Rate (MMK)</th>
                            <th style="font-weight: bold;background:blue;color:white;min-width: 150px;text-align:end;">Amount (MMK)</th>

                            <th style="font-weight: bold;background:blue;color:white;min-width:100px;text-align: center;min-width:200px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($earthwork_heads as $data)

                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $data->site->name }}</td>
                                <td class="text-left">{{ $data->landType->name_mm }}</td>

                                <td>{{ $data->description}}</td>
                                <td class="text-center">{{ $data->length}}</td>
                                <td class="text-center">{{ $data->width}}</td>
                                <td class="text-center">{{ $data->height}}</td>
                                <td class="text-center">{{ $data->qty}}</td>
                                <td class="text-center">{{ $data->length * $data->width * $data->height * $data->qty}}</td>
                                <td class="text-center">{{ $data->workers}}</td>
                                <td class="text-end salary_rate">{{ $data->salary_rate}}</td>
                                <td class="text-end amount">{{ $data->amount}}</td>

                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <a href="{{ route('earthworkhead.edit',$data->id)}}" class="btn btn-sm btn-outline-secondary me-2" style="min-width: 55px;">Edit</a>
                                        <form action="{{ route('earthworkhead.delete', $data->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete?')" style="min-width: 55px;">Delete</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Loop through all rows and format the numbers
    var origin_amounts = document.getElementsByClassName('amount');
    var origin_salaries = document.getElementsByClassName('salary_rate');

    for (var i = 0; i < origin_amounts.length; i++) {
        var originalNumber = parseInt(origin_amounts[i].innerText);
        origin_amounts[i].innerText = formatNumberWithCommas(originalNumber);
    }

    for (var i = 0; i < origin_salaries.length; i++) {
        var originalNumber = parseInt(origin_salaries[i].innerText);
        origin_salaries[i].innerText = formatNumberWithCommas(originalNumber);
    }

</script>
@endsection
