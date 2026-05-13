<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:640px;">

    {{-- Breadcrumb --}}
    <div class="mb-3">
      <a href="{{ route('admin.routes.index') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to routes
      </a>
    </div>

    {{-- Header --}}
    <div class="mb-4">
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">
        Edit route
      </h1>
      <p style="font-size:13px;color:#888780;margin:0;">
        Update route information
      </p>
    </div>

    {{-- Form card --}}
    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.routes.update', $route) }}">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">
          <label for="name" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Route name
          </label>
          <input type="text"
                 id="name"
                 name="name"
                 class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $route->name) }}"
                 required>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
          <label for="description" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Description
            <span style="color:#888780;font-weight:400;">(optional)</span>
          </label>
          <textarea id="description"
                    name="description"
                    rows="2"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $route->description) }}</textarea>
          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Start stop --}}
        <div class="mb-3">
          <label for="start_stop_id" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Start stop
          </label>
          <select id="start_stop_id"
                  name="start_stop_id"
                  class="form-select @error('start_stop_id') is-invalid @enderror"
                  required>
            <option value="">Select start stop</option>
            @foreach($stops as $stop)
              <option value="{{ $stop->id }}"
                      {{ old('start_stop_id', $route->start_stop_id) == $stop->id ? 'selected' : '' }}>
                {{ $stop->name }}
              </option>
            @endforeach
          </select>
          @error('start_stop_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- End stop --}}
        <div class="mb-3">
          <label for="end_stop_id" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            End stop
          </label>
          <select id="end_stop_id"
                  name="end_stop_id"
                  class="form-select @error('end_stop_id') is-invalid @enderror"
                  required>
            <option value="">Select end stop</option>
            @foreach($stops as $stop)
              <option value="{{ $stop->id }}"
                      {{ old('end_stop_id', $route->end_stop_id) == $stop->id ? 'selected' : '' }}>
                {{ $stop->name }}
              </option>
            @endforeach
          </select>
          @error('end_stop_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Return route --}}
        <div class="mb-3">
          <label for="return_route_id" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Return route
            <span style="color:#888780;font-weight:400;">(optional)</span>
          </label>
          <select id="return_route_id"
                  name="return_route_id"
                  class="form-select @error('return_route_id') is-invalid @enderror">
            <option value="">None</option>
            @foreach($routes as $r)
              <option value="{{ $r->id }}"
                      {{ old('return_route_id', $route->return_route_id) == $r->id ? 'selected' : '' }}>
                {{ $r->name }}
              </option>
            @endforeach
          </select>
          @error('return_route_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Status --}}
        <div class="mb-4">
          <label for="status" class="form-label"
                 style="font-size:13px;font-weight:500;color:#444441;">
            Status
          </label>
          <select id="status"
                  name="status"
                  class="form-select @error('status') is-invalid @enderror"
                  required>
            <option value="active" {{ old('status', $route->status) === 'active' ? 'selected' : '' }}>Active</option>
            <option value="suspended" {{ old('status', $route->status) === 'suspended' ? 'selected' : '' }}>Suspended</option>
          </select>
          @error('status')
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
          <a href="{{ route('admin.routes.index') }}"
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
