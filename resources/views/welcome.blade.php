@extends('layouts.app')

@section('content')
<div class="">
   
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item">
                            <router-link to="/categorie" class="nav-link">categorie</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/produit" class="nav-link">produit</router-link>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        
                        @guest
                        @if (Route::has('login'))
                       
                            <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                       
                        @endif

                        @if (Route::has('register'))
                    
                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        
                        @endguest

                    </span>
                </div>
            </nav>
            <div class="container">
                <router-view></router-view>
            </div>
     


</div>


@endsection
