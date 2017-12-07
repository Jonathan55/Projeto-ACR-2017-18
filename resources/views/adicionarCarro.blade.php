@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Carro</div>

                <div class="panel-body">
                    Marca:
                    <select name="marca_id">
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                    </select>
                    <br>
                    Modelo:
                    <input type="text" name="modelo">
                    <br>
                    Combustivel:
                    <select name="combustivel">
                    <option value="gasolina">gasolina</option>
                    </select>
                    Cor:
                    <input type="text" name="cor">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
