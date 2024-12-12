<header class="nav">
    <a href="{{route('page.main')}}" class="logo" aria-label="Convertiverse Home">
        <img src="{{Vite::asset('resources/images/logo.png')}}" alt="logo.png" width="50">
    </a>
    <nav class="nav-buttons">
        <a href="{{route('page.main')}}">Converter</a>
        <a href="{{route('page.api') }}">API</a>
        <a href="{{route('page.sign-up')}}">Sign up</a>
        <a href="{{route('page.login')}}">Login</a>
    </nav>
</header>
