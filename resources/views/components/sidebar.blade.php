<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('learn3.news')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Главная в моей версии
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('learn3.news',['par' => 'categ'])}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('learn3.news',['par' => 'content'])}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Новости
                </a>
            </li>
        </ul>
    </div>
</nav>
