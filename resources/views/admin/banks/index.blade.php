@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h4>Listagem de bancos</h4>
        <a href="{{route('admin.banks.create')}}" class="btn waves-effect">Novo banco</a>
        <table class="bordered striped highlight centered responsive-table z-depth-5">
            <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Ações</td>
            </tr>
            </thead>
            <tbody>

            @foreach($banks as $bank)
            <tr>
                <td>{{ $bank->id }}</td>
                <td>{{ $bank->name }}</td>
                <td>
                    <a href="{{route('admin.banks.edit', ['bank' => $bank->id])}}">Editar</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {!! $banks->links() !!}
    </div>
</div>
@endsection