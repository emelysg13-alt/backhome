@extends('layouts.cliente')

@section('contenido')

<h1>
    Bienvenido {{ auth()->user()->primer_nombre }}
</h1>

<p>
    Panel del cliente
</p>

@endsection