<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:640px;">

    {{-- Breadcrumb --}}
    <div class="mb-3">
      <a href="{{ route('admin.stops.index') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to stops
      </a>
    </div>

    {{-- Header --}}
    <div class="mb-4">
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">
        Create stop
      </h1>
      <p style="font-size:13px;color:#888780;margin:0;">
        Add a new bus stop location
      </p>
    </div>

    {{-- Form card --}}
    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.stops.store') }}">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
          <label for="name" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Stop name
          </label>
          <input type="text"
                 id="name"
                 name="name"
                 class="form-control @error('name') is-invalid @enderror"
                 placeholder="e.g. Aley town square"
                 value="{{ old('name') }}"
                 required>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Latitude --}}
        <div class="mb-3">
          <label for="lat" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Latitude
            <span style="color:#888780;font-weight:400;">(optional)</span>
          </label>
          <input type="number"
                 step="0.0000001"
                 id="lat"
                 name="lat"
                 class="form-control @error('lat') is-invalid @enderror"
                 placeholder="e.g. 33.8138"
                 value="{{ old('lat') }}">
          @error('lat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Longitude --}}
        <div class="mb-4">
          <label for="lng" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Longitude
            <span style="color:#888780;font-weight:400;">(optional)</span>
          </label>
          <input type="number"
                 step="0.0000001"
                 id="lng"
                 name="lng"
                 class="form-control @error('lng') is-invalid @enderror"
                 placeholder="e.g. 35.5997"
                 value="{{ old('lng') }}">
          @error('lng')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Buttons --}}
        <div class="d-flex gap-2">
          <button type="submit"
                  class="btn px-4 py-2"
                  style="background:#085041;color:#E1F5EE;border-radius:8px;
                         font-size:14px;font-weight:500;">
            Create stop
          </button>
          <a href="{{ route('admin.stops.index') }}"
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
