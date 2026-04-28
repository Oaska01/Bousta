<nav class="navbar navbar-expand-lg" style="background-color: #085041;">
    <div class="container-fluid px-4">

        {{-- Brand --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <div style="width:32px;height:32px;background:#9FE1CB;border-radius:8px;
                        display:flex;align-items:center;justify-content:center;
                        font-weight:700;font-size:14px;color:#085041;">B</div>
            <span style="font-size:20px;font-weight:500;color:#E1F5EE;letter-spacing:0.5px;">
                Bousta
            </span>
        </a>

        {{-- Mobile toggle --}}
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarContent"
                style="color:#E1F5EE;">
            <span class="navbar-toggler-icon" style="filter:invert(1);"></span>
        </button>

        {{-- Right side --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <div class="d-flex align-items-center gap-3 py-2 py-lg-0">

                @auth
                    {{-- Role badge --}}
                    @if(auth()->user()->role === 'admin')
                        <span class="badge rounded-pill"
                              style="background:#EF9F27;color:#412402;font-size:11px;">
                            Admin
                        </span>
                    @elseif(auth()->user()->role === 'driver')
                        <span class="badge rounded-pill"
                              style="background:#378ADD;color:#042C53;font-size:11px;">
                            Driver
                        </span>
                    @else
                        <span class="badge rounded-pill"
                              style="background:#9FE1CB;color:#085041;font-size:11px;">
                            Passenger
                        </span>
                    @endif

                    {{-- User name --}}
                    <span style="font-size:13px;color:#9FE1CB;">
                        {{ auth()->user()->name }}
                    </span>

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                style="font-size:13px;color:#E1F5EE;background:transparent;
                                       border:0.5px solid #5DCAA5;border-radius:6px;
                                       padding:5px 14px;cursor:pointer;">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Guest --}}
                    <a href="{{ route('loginView') }}"
                       style="font-size:13px;color:#E1F5EE;background:transparent;
                              border:0.5px solid #5DCAA5;border-radius:6px;
                              padding:5px 14px;text-decoration:none;">
                        Login
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>
