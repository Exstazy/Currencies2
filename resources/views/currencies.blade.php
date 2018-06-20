@extends('layouts.main')

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <div class="row card border-secondary">
                <div class="card-header">
                    Valūtas (no <a href="https://bank.lv" target="_blank">www.bank.lv</a>)
                    <form action="" method="get" class="form-inline float-right">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Valūtas nosaukums"
                               aria-label="Valūtas nosaukums">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Meklēt</button>
                    </form>
                </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Valūtas vienības par 1 eiro. <u>Atjaunojās katru dienu plkst 14:00</u></h5>
                    <div class="panel">
                        <table class="table table-hover" id="dev-table">
                            @if($currencies->isEmpty())
                                <div class="alert alert-danger" role="alert">
                                    Nav ierakstu par valūtām
                                </div>
                            @else
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Karogs</th>
                                    <th>Valūta</th>
                                    <th>Kurss</th>
                                    <th>Pēdējās izmaiņas</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($currencies as $currency)
                                    <tr>
                                        <td>{{ $currency->id }}</td>
                                        <td>
                                            <img src="{{ asset('images/currency-flags/' . $currency->name . '.png') }}"/>
                                        </td>
                                        <td>{{ $currency->name }}</td>
                                        <td>{{ round($currency->rate, 5) }}</td>
                                        <td>{{ $currency->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>

                        {{ $currencies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection