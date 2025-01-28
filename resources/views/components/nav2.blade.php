@props([])

<nav id="navmenu" class="navmenu">
    <img src="{{ asset('assets_front/img/icon/moon.png') }}" id="icon">
    <ul>
        <li><a href="{{ route('front.home') }}" class="{{ $active=='front.home'?'active':'' }}">Home<br></a></li>
        <li><a href="{{ route('front.services') }}" class="{{ $active=='front.services'?'active':'' }}">Services</a></li>
        <li><a href="{{ route('front.doctor') }}" class="{{ $active=='front.doctor'?'active':'' }}">Doctor</a></li>
        <li><a href="{{ route('front.contact') }}" class="{{ $active=='front.contact'?'active':'' }}">Contact</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
