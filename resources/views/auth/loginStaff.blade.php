<x-layout>
<div class="d-flex align-items-center justify-content-center py-5"
     style="min-height:80vh;background-color:#f0f4f0;">

    <div class="p-4 p-md-5"
         style="width:100%;max-width:440px;background:#fff;
                border-radius:16px;border:0.5px solid #d3d1c7;">

        {{-- Brand --}}
        <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
            <div style="width:40px;height:40px;background:#085041;border-radius:10px;
                        display:flex;align-items:center;justify-content:center;
                        font-weight:700;font-size:18px;color:#9FE1CB;">B</div>
            <span style="font-size:22px;font-weight:500;color:#085041;">Bousta</span>
        </div>

        <h5 class="text-center mb-1" style="font-weight:500;color:#1a1a1a;">
            Staff login
        </h5>
        <p class="text-center mb-3" style="font-size:13px;color:#888780;">
            For admins and drivers only
        </p>

        @if(session('error'))
            <div class="alert alert-danger py-2 mb-3" style="font-size:13px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.staff') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label"
                       style="font-size:13px;font-weight:500;color:#444441;">
                    Email
                </label>
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="staff@bousta.com"
                       value="{{ old('email') }}"
                       required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"
                       style="font-size:13px;font-weight:500;color:#444441;">
                    Password
                </label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn w-100 py-2"
                    style="background:#085041;color:#E1F5EE;
                           border-radius:8px;font-size:14px;font-weight:500;">
                Login
            </button>
        </form>

        <div class="d-flex align-items-center gap-2 my-3">
            <hr class="flex-grow-1" style="border-color:#d3d1c7;">
            <span style="font-size:12px;color:#888780;">or</span>
            <hr class="flex-grow-1" style="border-color:#d3d1c7;">
        </div>

        <p class="text-center mb-0" style="font-size:13px;color:#888780;">
            Are you a passenger?
            <a href="{{ route('login.view') }}"
               style="color:#085041;font-weight:500;text-decoration:none;">
                Login here
            </a>
        </p>

    </div>
</div>
</x-layout>
