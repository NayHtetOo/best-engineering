@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form id="myForm" autocomplete="off" class="form-inline" method="POST" action="{{ route('site.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="mt-2 text-center text-blue-700" style="text-transform: uppercase;">{{ __('Summary') }}</h4>
                        </div>
                        <div class="card-body">

                            <div class="row text-center">
                                <h4><span class="eng">{{ $site->name}}</span></h4>
                            </div>
                            <div class="row text-end">
                                <h4><span class="eng">{{ $site->address}}</span></h4>
                            </div>


                            <!-- Earthwork -->
                            <div class="row">
                                <h5 class="px-2 py-2">Earthworks</h5>
                                <div style="overflow-x: auto">

                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;text-align: center;">No</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 200px;text-align: left;">Land Type</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 350px;">Description</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Length</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Width</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Height</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Qty</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:center;">Volume (Cu-ft)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:end;">Workers</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:end;">Salary Rate (MMK)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:end;">Amount (MMK)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($earthwork_heads as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                                    <td class="text-left">{{ $data->landType->name_mm }}</td>
                                                    <td>{{ $data->description}}</td>
                                                    <td class="text-center">{{ $data->length}}</td>
                                                    <td class="text-center">{{ $data->width}}</td>
                                                    <td class="text-center">{{ $data->height}}</td>
                                                    <td class="text-center">{{ $data->qty}}</td>
                                                    <td class="text-center">{{ $data->length * $data->width * $data->height * $data->qty}}</td>
                                                    <td class="text-end">{{ $data->workers}}</td>
                                                    <td class="text-end salary_rate">{{ $data->salary_rate}}</td>
                                                    <td class="text-end amount" id="formatted-number">{{ $data->amount}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" class="text-center"></td>
                                                <td class="text-center text-white" style="background: blue;">Labour Costs</td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs}}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <br><br><br>

                            <!-- Brickworks -->
                            <div class="row">
                                <h5 class="px-2 py-2">Brickworks (Fake Data)</h5>
                                <div style="overflow-x: auto">

                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;text-align: center;">No</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 200px;text-align: left;">Land Type</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 350px;">Description</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Length</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Width</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Height</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Qty</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:center;">Volume (Cu-ft)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:end;">Workers</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:end;">Salary Rate (MMK)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:end;">Amount (MMK)</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($earthwork_heads as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                                    <td class="text-left">{{ $data->landType->name_mm }}</td>
                                                    <td>{{ $data->description}}</td>
                                                    <td class="text-center">{{ $data->length}}</td>
                                                    <td class="text-center">{{ $data->width}}</td>
                                                    <td class="text-cenMaterialter">{{ $data->height}}</td>
                                                    <td class="text-center">{{ $data->qty}}</td>
                                                    <td class="text-center">{{ $data->length * $data->width * $data->height * $data->qty}}</td>
                                                    <td class="text-end">{{ $data->workers}}</td>
                                                    <td class="text-end salary_rate">{{ $data->salary_rate}}</td>
                                                    <td class="text-end amount" id="formatted-number">{{ $data->amount}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" class="text-center"></td>
                                                <td class="text-center text-white" style="background: blue;">Material Costs</td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs}}</td>
                                            </tr>

                                            @foreach ($earthwork_heads as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                                    <td class="text-left">{{ $data->landType->name_mm }}</td>
                                                    <td>{{ $data->description}}</td>
                                                    <td class="text-center">{{ $data->length}}</td>
                                                    <td class="text-center">{{ $data->width}}</td>
                                                    <td class="text-cenMaterialter">{{ $data->height}}</td>
                                                    <td class="text-center">{{ $data->qty}}</td>
                                                    <td class="text-center">{{ $data->length * $data->width * $data->height * $data->qty}}</td>
                                                    <td class="text-end">{{ $data->workers}}</td>
                                                    <td class="text-end salary_rate">{{ $data->salary_rate}}</td>
                                                    <td class="text-end amount" id="formatted-number">{{ $data->amount}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" class="text-end text-white"></td>
                                                <td class="text-center text-white" style="background: blue;">Labour Costs</td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs}}</td>
                                            </tr>

                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <td colspan="9"></td>
                                                <td class="text-center text-white" style="background:blue;">Material + Labour </td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs + $labour_costs }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <br><br><br>

                            <!-- Concretingworks -->
                            <div class="row">
                                <h5 class="px-2 py-2">Concretingworks (Fake Data)</h5>
                                <div style="overflow-x: auto">

                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;text-align: center;">No</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 200px;text-align: left;">Land Type</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 350px;">Description</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Length</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Width</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Height</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Qty</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:center;">Volume (Cu-ft)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:end;">Workers</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:end;">Salary Rate (MMK)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 150px;text-align:end;">Amount (MMK)</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($earthwork_heads as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                                    <td class="text-left">{{ $data->landType->name_mm }}</td>
                                                    <td>{{ $data->description}}</td>
                                                    <td class="text-center">{{ $data->length}}</td>
                                                    <td class="text-center">{{ $data->width}}</td>
                                                    <td class="text-cenMaterialter">{{ $data->height}}</td>
                                                    <td class="text-center">{{ $data->qty}}</td>
                                                    <td class="text-center">{{ $data->length * $data->width * $data->height * $data->qty}}</td>
                                                    <td class="text-end">{{ $data->workers}}</td>
                                                    <td class="text-end salary_rate">{{ $data->salary_rate}}</td>
                                                    <td class="text-end amount" id="formatted-number">{{ $data->amount}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" class="text-center"></td>
                                                <td class="text-center text-white" style="background: blue;">Material Costs</td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs}}</td>
                                            </tr>

                                            @foreach ($earthwork_heads as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                                    <td class="text-left">{{ $data->landType->name_mm }}</td>
                                                    <td>{{ $data->description}}</td>
                                                    <td class="text-center">{{ $data->length}}</td>
                                                    <td class="text-center">{{ $data->width}}</td>
                                                    <td class="text-cenMaterialter">{{ $data->height}}</td>
                                                    <td class="text-center">{{ $data->qty}}</td>
                                                    <td class="text-center">{{ $data->length * $data->width * $data->height * $data->qty}}</td>
                                                    <td class="text-end">{{ $data->workers}}</td>
                                                    <td class="text-end salary_rate">{{ $data->salary_rate}}</td>
                                                    <td class="text-end amount" id="formatted-number">{{ $data->amount}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="9" class="text-end text-white"></td>
                                                <td class="text-center text-white" style="background: blue;">Labour Costs</td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs}}</td>
                                            </tr>

                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <td colspan="9"></td>
                                                <td class="text-center text-white" style="background:blue;">Material + Labour </td>
                                                <td class="text-end text-white" style="background: blue;">{{ $labour_costs + $labour_costs }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <br><br>
                            <br><br>

                            <!-- Final Reports Form -->
                            <div class="row">
                                <div style="overflow-x: auto">
                                    <h5 class="font-bold text-center">Final Reports Form</h5>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;text-align: center;">No</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 200px;text-align: left;">Particulars</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 350px;text-align:center;">Amount (MMK)</th>
                                                <th style="font-weight: bold;background: rgb(11, 11, 88);color:white;min-width: 100px;text-align:center;">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-left">Material Cost</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-left">Material Cost + Labour Cost</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-left">Labour Cost</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-left">Total Material + Labour</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-left">Transportation Charges (3%)</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td class="text-left">Contingency (5%)</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">7</td>
                                                <td class="text-left">Supervision & Overhead Charges (5%)</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">8</td>
                                                <td class="text-left">Grand Total Cost</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">9</td>
                                                <td class="text-left">Say</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">10</td>
                                                <td class="text-left">Total Area</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">11</td>
                                                <td class="text-left">PAE Rate</td>
                                                <td class="text-end">269,919,323</td>
                                                <td class="text-end amount" id="formatted-number"></td>
                                            </tr>

                                            <tr>
                                                <td colspan="999" class="text-center" style="background: orange;color: balck;">မှတ်ချက် ။     ။ ယခု ခန့်မှန်းကုန်ကျငွေစာရင်းတွင် လျှပ်စစ်လုပ်ငန်း၊ ရေ နှင့် မိလ္လာ လုပ်ငန်းများ၊ ကြွေပြားကပ်ခြင်း၊ ပါကေးခင်းခြင်း၊ မျက်နှာကျက် လုပ်ငန်းများ ပါဝင်ခြင်း မရှိသေးပါ။</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
