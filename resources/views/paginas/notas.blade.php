@extends('layouts.base')

@section('header')
<nav>
    <a href="http://localhost:8000/profile">Profile</a>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                    {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
    <a href="{{route('crearNota')}}">Nueva Nota</a>
</nav>
@endsection

@section('lista')
<ul>
    @foreach($notas as $nota)
        <li><a href="{{route('abrirNota', $nota->id)}}">{{$nota->titulo}}</a></li>
    @endforeach
</ul>
@endsection

@section('body')
<form action="{{route('guardarNota')}}" method="post" autocomplete="off" class="nota-form">
    @csrf
    <input type="hidden" name="id" value="{{$nota_abierta->id}}">
    <div class="form-row">
        <input type="text" name="titulo" class="inputTitulo" value="{{$nota_abierta->titulo}}" tabindex="1">
        <input type="submit" value="Guardar" class="inputGuardar">
    </div>
    <textarea name="nota" id="nota" tabindex="2">{{$nota_abierta->contenido}}</textarea>
</form>
@endsection