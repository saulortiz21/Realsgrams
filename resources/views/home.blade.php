@extends('layouts.app')

@section('titulo')
    
@endsection

@section('contenido')
    
    <x-listar-post :posts="$posts" layout="list" class="mt-10" />

@endsection