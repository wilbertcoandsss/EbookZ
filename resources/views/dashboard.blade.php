@extends('layout.sidebar')

@section('title', 'Admin Page')

@section('content')
    </style>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">



    <h2 class="fw-bold">Dashboard</h2>
    <br>
    <br>
    <div class="d-flex justify-content-between flex-row align-items-center align-content-center ms-2 me-5">
        <div class="dashboard-box">
            <img class="box-logo-dashboard" src="{{ Storage::url('assets/order.png') }}">
            <h5>Orders</h5>
            <h4 class="fw-semibold">{{ $transaction->count() }}</h4>
        </div>
        <div class="dashboard-box">
            <img class="box-logo-dashboard" src="{{ Storage::url('assets/activeuser.png') }}">
            <h5>Active User</h5>
            <h4 class="fw-semibold">{{ Auth::user()->count() }}</h4>
        </div>
        <div class="dashboard-box">
            <img class="box-logo-dashboard" src="{{ Storage::url('assets/earning.png') }}">
            <h5>Earnings</h5>
            <h4 class="fw-semibold">{{ $total }}</h4>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-column ms-2 me-5">
        <br>
        <br>
        <h2 class="fw-bold">Recent Orders</h2>
        <div class="table-tr-admin">
            <table style="border-collapse: collapse">
                <thead>
                    <th>Customers</th>
                    <th>Date Order</th>
                    <th>Total Item</th>
                    <th>Transaction Details</th>
                </thead>
                <tbody>
                    @foreach ($transaction as $th)
                        <tr>
                            <td>{{ $th->users->name }}</td>
                            <td>{{ $th->tr_date }}</td>
                            <td>{{ $th->total_item }}</td>
                            <td><a href="/transactionDetailPageAdmin/{{ $th->id }}">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
