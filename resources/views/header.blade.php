<header class="nav">
    <a href="{{route('page.main')}}" class="logo" aria-label="Convertiverse Home">
        <img src="{{Vite::asset('resources/images/logo.png')}}" alt="logo.png" width="50">
    </a>
    <nav class="nav-buttons">
        <a href="{{route('page.main')}}">Converter</a>
        <a href="{{route('page.api') }}">API</a>

        @auth()
            <a href="{{route('page.account')}}">
                <svg style="display: inline;" width="16" height="16" viewBox="0 0 28 28" id="Layer_1"
                     data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>.cls-1 {
                                fill: none;
                                stroke: #020202;
                                stroke-miterlimit: 10;
                                stroke-width: 1.91px;
                            }</style>
                    </defs>
                    <circle class="cls-1" cx="12" cy="7.25" r="5.73"/>
                    <path class="cls-1"
                          d="M1.5,23.48l.37-2.05A10.3,10.3,0,0,1,12,13h0a10.3,10.3,0,0,1,10.13,8.45l.37,2.05"/>
                </svg>
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </a>
            <a href="{{route('page.logout')}}">
                <svg fill="#000000" height="16" width="16" id="Capa_1" style="display: inline"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 384.971 384.971" xml:space="preserve">
<g>
    <g id="Sign_Out">
        <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
			C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
			C192.485,366.299,187.095,360.91,180.455,360.91z"/>
        <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
			c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
			c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"/>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
</g>
</svg>
                Logout</a>
        @endauth
        @guest()
            <a href="{{route('page.sign-up')}}">Sign up</a>
            <a href="{{route('page.login')}}">Login</a>
        @endguest
    </nav>
</header>
