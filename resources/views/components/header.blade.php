<header>
    <div class="header">
        <div class="company">
            <a href="{{ url('/') }}">ООО "Ромашка"</a>
        </div>
        <div class="search">
            <input type="text" id="search" name="search" placeholder="Поиск" aria-label="Search">
            <button type="submit">
                <img src="{{ asset('assets/ico/find.ico') }}">
            </button>
        </div>
        <div style="display: flex">
            @auth
                <div style="margin-right: 20px">
                    @if(Auth::user()->isAdmin)
                        <p style="color:red; margin: 0">Администратор: <b>{{ Auth::user()->name }}</b>
                            <a href="{{route('news.users.index')}}" style="color:red;">Редактор пользователей</a>
                        </p>
                    @else
                        <p style="margin: 0">Здравствуйте: <b>{{ Auth::user()->name }}</b></p>
                    @endif

                </div>
                <div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin: 0">
                        @csrf
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}">Вход</a>&nbsp;&nbsp;

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Регистрация</a>
                @endif
            @endauth
        </div>
    </div>
</header>
