<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Report</title>
</head>
<body>
    <table class="blueTable">
        <thead>
        <tr>
            <th>Date</th>
            <th>Quantity</th>
            <th>Sold by</th>
            <th>Sold to</th> 
            <th>Total</th>
            <th>Payment</th>
            <th>Dues</th> 
            {{-- <th>Payment type</th>    --}}
            </tr>
        </thead>
        <tbody>
            @if(!empty($sales_pdf))
            @foreach($sales_pdf as $value)
            <tr>
            <td style="text-align: center">{{$value['created_at']->toFormattedDateString()}}</td>
            <td style="text-align: center">{{DB::table('sale_items')->where('sale_id', $value->id)->sum('quantity')}}</td>
            <td style="text-align: center">{{ $value->user['name'] }}</td>
            <td style="text-align: center">{{ $value->customer->name }}</td>
            <td style="text-align: center"><span> &#x20A6;</span>{{number_format($value->grand_total, 2)}}</td>
            <td style="text-align: center"><span> &#x20A6;</span>{{number_format($value->payment, 2   )}}</td>
            <td style="text-align: center"><span> &#x20A6;</span>{{number_format($value->dues, 2)}}</td>
            {{-- <td style="width: 300px;text-align:center">{{ $value->payment_type }}</td> --}}
            </tr>
            @endforeach
            @endif
        </tbody>
        </table>
</body>
</html>
                 
        