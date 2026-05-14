<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:640px;">

    <div class="mb-3">
      <a href="{{ route('admin.trip-templates.index') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to templates
      </a>
    </div>

    <div class="mb-4">
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">Edit trip template</h1>
      <p style="font-size:13px;color:#888780;margin:0;">Update departure pattern</p>
    </div>

    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.trip-templates.update', $template) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="route_id" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Route</label>
          <select id="route_id" name="route_id"
                  class="form-select @error('route_id') is-invalid @enderror" required>
            <option value="">Select a route</option>
            @foreach($routes as $route)
              <option value="{{ $route->id }}"
                      {{ old('route_id', $template->route_id) == $route->id ? 'selected' : '' }}>
                {{ $route->name }}
              </option>
            @endforeach
          </select>
          @error('route_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="depart_time" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Departure time</label>
          <input type="time" id="departure_time" name="departure_time"
                 class="form-control @error('departure_time') is-invalid @enderror"
                 value="{{ old('departure_time', \Carbon\Carbon::parse($template->departure_time)->format('H:i')) }}" required>
          @error('depart_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="day_of_week" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Day of week</label>
          <select id="day_of_week" name="day_of_week"
                  class="form-select @error('day_of_week') is-invalid @enderror" required>
            @foreach(['everyday','monday','tuesday','wednesday','thursday','friday','saturday','sunday'] as $day)
              <option value="{{ $day }}"
                      {{ old('day_of_week', $template->day_of_week) === $day ? 'selected' : '' }}>
                {{ ucfirst($day) }}
              </option>
            @endforeach
          </select>
          @error('day_of_week')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn px-4 py-2"
                  style="background:#085041;color:#E1F5EE;border-radius:8px;font-size:14px;font-weight:500;">
            Save changes
          </button>
          <a href="{{ route('admin.trip-templates.index') }}" class="btn px-4 py-2"
             style="background:#f0f4f0;color:#444441;border-radius:8px;font-size:14px;font-weight:500;text-decoration:none;">
            Cancel
          </a>
        </div>

      </form>

    </div>

  </div>
</div>
</x-layout>
