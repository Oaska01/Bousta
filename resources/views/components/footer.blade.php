<footer style="background-color:#085041;">
    <div class="container-fluid px-4 pt-4 pb-3">

        {{-- Top section --}}
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-4 mb-4">

            {{-- Brand + tagline --}}
            <div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <div style="width:32px;height:32px;background:#9FE1CB;border-radius:8px;
                                display:flex;align-items:center;justify-content:center;
                                font-weight:700;font-size:14px;color:#085041;">B</div>
                    <span style="font-size:20px;font-weight:500;color:#E1F5EE;">Bousta</span>
                </div>
                <p style="font-size:12px;color:#5DCAA5;margin:0;">
                    Your digital bus schedule — always on time.
                </p>
            </div>

            {{-- Links --}}
            <div class="d-flex flex-wrap gap-5">

                <div>
                    <h6 style="font-size:11px;font-weight:500;color:#9FE1CB;
                               text-transform:uppercase;letter-spacing:0.8px;margin-bottom:10px;">
                        Schedule
                    </h6>
                    <a href="{{ url('/') }}"
                       style="display:block;font-size:13px;color:#9FE1CB;
                              text-decoration:none;margin-bottom:6px;opacity:0.8;">
                        View schedule
                    </a>
                    <a href="{{ url('/routes') }}"
                       style="display:block;font-size:13px;color:#9FE1CB;
                              text-decoration:none;margin-bottom:6px;opacity:0.8;">
                        Routes
                    </a>
                    <a href="{{ url('/stops') }}"
                       style="display:block;font-size:13px;color:#9FE1CB;
                              text-decoration:none;opacity:0.8;">
                        Stops
                    </a>
                </div>

                <div>
                    <h6 style="font-size:11px;font-weight:500;color:#9FE1CB;
                               text-transform:uppercase;letter-spacing:0.8px;margin-bottom:10px;">
                        Account
                    </h6>
                    @guest
                        <a href="{{ route('login') }}"
                           style="display:block;font-size:13px;color:#9FE1CB;
                                  text-decoration:none;margin-bottom:6px;opacity:0.8;">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           style="display:block;font-size:13px;color:#9FE1CB;
                                  text-decoration:none;margin-bottom:6px;opacity:0.8;">
                            Register
                        </a>
                    @endguest
                    @auth
                        <a href="#"
                           style="display:block;font-size:13px;color:#9FE1CB;
                                  text-decoration:none;margin-bottom:6px;opacity:0.8;">
                            Lost items
                        </a>
                    @endauth
                </div>

            </div>
        </div>

        {{-- Divider --}}
        <hr style="border:none;border-top:0.5px solid #0F6E56;margin:0 0 1rem;">

        {{-- Bottom section --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span style="font-size:12px;color:#5DCAA5;">
                &copy; {{ date('Y') }} Bousta. All rights reserved.
            </span>
            <span style="font-size:11px;color:#0F6E56;background:#04342C;
                         padding:3px 10px;border-radius:20px;">
                v1.0
            </span>
        </div>

    </div>
</footer>
