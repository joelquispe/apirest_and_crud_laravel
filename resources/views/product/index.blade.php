@extends('header')
@section('contenido')
@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif

<a href="{{url('product/create')}}" class="btn btn-warning mt-5">Registrar nuevo producto</a>
    <div class="mt-5">
        
        <table class="table  table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Precio</th>
                    <th scope=""></th>
                    <th scope=""></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr class="">
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->marca }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>{{ $item->precio }}</td>
                        <td> <img src="{{asset('storage').'/'.$item->foto}}" height="100px" width="100px" alt=""></td>
                        <td >
                            <a href="{{url('/product/'.$item->id.'/edit')}}" class="btn btn-warning mx-2">Editar</a>
                           
                        </td>
                        <td>
                            <form action="{{ url('/product/' . $item->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" value="Borrar"
                                    onclick="return confirm('¿Quieres eliminarlo')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!!$products->links()!!}
    </div>
@endsection
