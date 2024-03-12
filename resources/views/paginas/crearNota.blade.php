@extends('layouts.base')

@section('header')
<nav>
    <span>
        <a href="http://localhost:8000/profile">Profile</a>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </span>
</nav>
@endsection

@section('body')
<form method="post" action="{{route('crearNota')}}" autocomplete="off">
    @csrf
    <input type="text" placeholder="Titulo" name="titulo">
    <input type="submit" value="Crear Nota">
</form>
@endsection