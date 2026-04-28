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
                Welcome back
            </h5>
            <p class="text-center mb-3" style="font-size:13px;color:#888780;">
                Enter your phone number to receive a one-time login code
            </p>

            {{-- OTP note --}}
            <div class="text-center mb-3 py-2 px-3"
                 style="background:#E1F5EE;border-radius:8px;
                        font-size:12px;color:#085041;">
                A verification code will be sent to your phone
            </div>

            {{-- Session error --}}
            @if(session('error'))
                <div class="alert alert-danger py-2 mb-3" style="font-size:13px;">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="phone_number" class="form-label"
                           style="font-size:13px;font-weight:500;color:#444441;">
                        Phone number
                    </label>
                    <input type="tel"
                           id="phone_number"
                           name="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           placeholder="e.g. 70 123 456"
                           value="{{ old('phone_number') }}"
                           required autofocus>
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn w-100 py-2 mt-1"
                        style="background:#085041;color:#E1F5EE;
                               border-radius:8px;font-size:14px;font-weight:500;">
                    Send code
                </button>
            </form>

            {{-- Divider --}}
            <div class="d-flex align-items-center gap-2 my-3">
                <hr class="flex-grow-1" style="border-color:#d3d1c7;">
                <span style="font-size:12px;color:#888780;">or</span>
                <hr class="flex-grow-1" style="border-color:#d3d1c7;">
            </div>

            {{-- Register link --}}
            <p class="text-center mb-0" style="font-size:13px;color:#888780;">
                Don't have an account?
                <a href="{{ route('registerView') }}"
                   style="color:#085041;font-weight:500;text-decoration:none;">
                    Register
                </a>
            </p>

        </div>
    </div>
</x-layout>
