<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        {{-- <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo1.png') }}" width="65"
             alt="Infyom Logo"> --}}
             <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo1.png') }}" width="65" alt="Infyom Logo" style="border-radius: 50%;">

        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo1.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
