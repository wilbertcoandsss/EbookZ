@extends('layout.header')

@section('title', 'Cartpage')

@section('content')
<div class="test">
    <div class="add-game-btn">
        <a href="/checkOut/{{Auth::user()->id}}">
            Checkout
        </a>
    </div>
    <table style="border-collapse: collapse">
        <thead>
            <th colspan="2">Game Title</th>
            <th>Game Price</th>
            <th>Quantity</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($cart as $c)
                <form action="/updateQty/{{ $c->id }}" method="POST">
                    @csrf
                    <tr>
                        <td>
                            <img class="game-pic-icon" src="{{ Storage::url('games/' . $c->game->pic) }}">
                        </td>
                        <td>{{ $c->game->title }}</td>
                        <td>{{ $c->game->price }}</td>
                        <td>
                            <div class="form-content-1">
                                <div class="form-insert">
                                    <input id="priceInsert" type="number" name="qty"
                                        value = "{{$c->qty}}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="submit-qty">
                                <input type="submit" value = "Update">
                            </div>
                        </td>
                        <td><a href="/deleteCart/{{ $c->id }}">Remove</a></td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
