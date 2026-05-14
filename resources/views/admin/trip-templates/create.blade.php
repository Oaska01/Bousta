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
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">Create trip template</h1>
      <p style="font-size:13px;color:#888780;margin:0;">Define a recurring departureure pattern</p>
    </div>

    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.trip-templates.store') }}">
        @csrf

        <div class="mb-3">
          <label for="route_id" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Route</label>
          <select id="route_id" name="route_id"
                  class="form-select @error('route_id') is-invalid @enderror" required>
            <option value="">Select a route</option>
            @foreach($routes as $route)
              <option value="{{ $route->id }}"
                      {{ old('route_id') == $route->id ? 'selected' : '' }}>
                {{ $route->name }}
              </option>
            @endforeach
          </select>
          @error('route_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="departure_time" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">departure time</label>
          <input type="time" id="departure_time" name="departure_time"
                 class="form-control @error('departure_time') is-invalid @enderror"
                 value="{{ old('departure_time') }}" required>
          @error('departure_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="day_of_week" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Day of week</label>
          <select id="day_of_week" name="day_of_week"
                  class="form-select @error('day_of_week') is-invalid @enderror" required>
            <option value="everyday" {{ old('day_of_week') === 'everyday' ? 'selected' : '' }}>Everyday</option>
            <option value="monday" {{ old('day_of_week') === 'monday' ? 'selected' : '' }}>Monday</option>
            <option value="tuesday" {{ old('day_of_week') === 'tuesday' ? 'selected' : '' }}>Tuesday</option>
            <option value="wednesday" {{ old('day_of_week') === 'wednesday' ? 'selected' : '' }}>Wednesday</option>
            <option value="thursday" {{ old('day_of_week') === 'thursday' ? 'selected' : '' }}>Thursday</option>
            <option value="friday" {{ old('day_of_week') === 'friday' ? 'selected' : '' }}>Friday</option>
            <option value="saturday" {{ old('day_of_week') === 'saturday' ? 'selected' : '' }}>Saturday</option>
            <option value="sunday" {{ old('day_of_week') === 'sunday' ? 'selected' : '' }}>Sunday</option>
          </select>
          @error('day_of_week')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn px-4 py-2"
                  style="background:#085041;color:#E1F5EE;border-radius:8px;font-size:14px;font-weight:500;">
            Create template
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
