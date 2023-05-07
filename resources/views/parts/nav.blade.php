<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LaraGrafikart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_starts_with($routeName, 'blog.')]) href="{{ route('blog.index') }}">Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'active' => str_starts_with($routeName, 'blog.create'),
                    ]) href="{{ route('blog.create') }}">Créer
                    </a>
                </li>
            </ul>
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="nav-link">Se deconnecter</button>
                    </form>
                @endauth

                @guest
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
