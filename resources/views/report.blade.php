@extends('layouts.master')

@section('content')
<div id="topic"> General Report</div>
<table border=0>
    <thead>
        <tr>
            <th>Category</th>
            <th>Quantity</th>
            <th>Total price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style='text-align: center'> {{ 0 }} </td>
        </tr>
    </tbody>

</table>

<div class="summary" style="margin: 10% auto; text-align: center">
    <h2>TOTAL ASSETS = {{ $devices->count() }}</h2>        
</div>



@endsection
