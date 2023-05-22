@extends('layout.header')

@section('title', 'Homepage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/cartdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <div class="top-con">
        {{-- @if (!$trhistory->isEmpty()) --}}
        <div class="test">
            <table style="border-collapse: collapse">
                <thead>
                    <th>Transaction ID</th>
                    <th>Transaction Date</th>
                    <th>Total Item</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($trhistory as $th)
                            <tr>
                                <td>{{ $th->id }}</td>
                                <td>{{ $th->tr_date }}</td>
                                <td>{{ $th->total_item }}</td>
                                <td><a href="/transactionDetailPage/{{ $th->id }}">Details</a></td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- @else --}}
        {{-- <h1>You have no transaction..</h1>
        @endif --}}
    </div>
@endsection
