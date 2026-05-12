<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:640px;">

    {{-- Breadcrumb --}}
    <div class="mb-3">
      <a href="{{ route('admin.users.index') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to users
      </a>
    </div>

    {{-- Header --}}
    <div class="mb-4">
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">
        Edit user
      </h1>
      <p style="font-size:13px;color:#888780;margin:0;">
        Update user information
      </p>
    </div>

    {{-- Form card --}}
    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        {{-- to tell laravel this is an update request --}}
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">
          <label for="name" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Full name
          </label>
          <input type="text"
                 id="name"
                 name="name"
                 class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $user->name) }}"
                 required>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label for="email" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Email
          </label>
          <input type="email"
                 id="email"
                 name="email"
                 class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email', $user->email) }}"
                 required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Phone number --}}
        <div class="mb-3">
          <label for="phone_number" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Phone number
          </label>
          <input type="tel"
                 id="phone_number"
                 name="phone_number"
                 class="form-control @error('phone_number') is-invalid @enderror"
                 value="{{ old('phone_number', $user->phone_number) }}"
                 maxlength="8"
                 required>
          @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label for="password" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Password
            <span style="color:#888780;font-weight:400;">(leave blank to keep current)</span>
          </label>
          <input type="password"
                 id="password"
                 name="password"
                 class="form-control @error('password') is-invalid @enderror"
                 placeholder="Minimum 6 characters">
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Confirm password --}}
        <div class="mb-3">
          <label for="password_confirmation" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Confirm password
          </label>
          <input type="password"
                 id="password_confirmation"
                 name="password_confirmation"
                 class="form-control">
        </div>

        {{-- Role --}}
        <div class="mb-4">
          <label for="role" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Role
          </label>
          <select id="role"
                  name="role"
                  class="form-select @error('role') is-invalid @enderror"
                  required>
            <option value="driver" {{ old('role', $user->role) === 'driver' ? 'selected' : '' }}>Driver</option>
            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
          </select>
          @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Buttons --}}
        <div class="d-flex gap-2">
          <button type="submit"
                  class="btn px-4 py-2"
                  style="background:#085041;color:#E1F5EE;border-radius:8px;
                         font-size:14px;font-weight:500;">
            Save changes
          </button>
          <a href="{{ route('admin.users.index') }}"
             class="btn px-4 py-2"
             style="background:#f0f4f0;color:#444441;border-radius:8px;
                    font-size:14px;font-weight:500;text-decoration:none;">
            Cancel
          </a>
        </div>

      </form>

    </div>

  </div>
</div>
</x-layout>
