<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:640px;">

    <div class="mb-3">
      <a href="{{ route('admin.shifts.index') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to shifts
      </a>
    </div>

    <div class="mb-4">
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">Create shift</h1>
      <p style="font-size:13px;color:#888780;margin:0;">Assign a driver and bus to a route on a specific date</p>
    </div>

    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.shifts.store') }}">
        @csrf

        <div class="mb-3">
          <label for="date" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Date</label>
          <input type="date" id="date" name="date"
                 class="form-control @error('date') is-invalid @enderror"
                 value="{{ old('date') }}"
                 min="{{ date('Y-m-d') }}" required>
          @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="route_id" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Route</label>
          <select id="route_id" name="route_id"
                  class="form-select @error('route_id') is-invalid @enderror" required>
            <option value="">Select a route</option>
            @foreach($routes as $route)
              <option value="{{ $route->id }}" {{ old('route_id') == $route->id ? 'selected' : '' }}>
                {{ $route->name }}
              </option>
            @endforeach
          </select>
          @error('route_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="driver_id" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Driver</label>
          <select id="driver_id" name="driver_id"
                  class="form-select @error('driver_id') is-invalid @enderror" required>
            <option value="">Select a driver</option>
            @foreach($drivers as $driver)
              <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>
                {{ $driver->name }}
              </option>
            @endforeach
          </select>
          @error('driver_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="bus_id" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Bus</label>
          <select id="bus_id" name="bus_id"
                  class="form-select @error('bus_id') is-invalid @enderror" required>
            <option value="">Select a bus</option>
            @foreach($buses as $bus)
              <option value="{{ $bus->id }}" {{ old('bus_id') == $bus->id ? 'selected' : '' }}>
                {{ $bus->plate_number }} ({{ $bus->model }})
              </option>
            @endforeach
          </select>
          @error('bus_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="status" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Status</label>
          <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
            <option value="scheduled" {{ old('status', 'scheduled') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
            <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>In progress</option>
            <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
          @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn px-4 py-2"
                  style="background:#085041;color:#E1F5EE;border-radius:8px;font-size:14px;font-weight:500;">
            Create shift
          </button>
          <a href="{{ route('admin.shifts.index') }}" class="btn px-4 py-2"
             style="background:#f0f4f0;color:#444441;border-radius:8px;font-size:14px;font-weight:500;text-decoration:none;">
            Cancel
          </a>
        </div>

      </form>

    </div>

  </div>
</div>
</x-layout>
