@extends('header')
@section('contenido')

    <form action="{{url('/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include("product.form",['modo'=>'editar'])
    </form>


@endsection