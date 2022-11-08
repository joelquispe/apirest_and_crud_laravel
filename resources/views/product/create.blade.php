
@extends('header')
@section('contenido')

    <form action="{{url('/product')}}" method="post" enctype="multipart/form-data">
        @csrf
        
       @include('product.form',['modo'=>'crear'])
    </form>


@endsection