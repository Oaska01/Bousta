<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:640px;">

    <div class="mb-3">
      <a href="{{ route('admin.buses.index') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to buses
      </a>
    </div>

    <div class="mb-4">
      <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">Create bus</h1>
      <p style="font-size:13px;color:#888780;margin:0;">Add a new bus to the fleet</p>
    </div>

    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.5rem;">

      <form method="POST" action="{{ route('admin.buses.store') }}">
        @csrf

        <div class="mb-3">
          <label for="plate_number" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Plate number</label>
          <input type="text" id="plate_number" name="plate_number"
                 class="form-control @error('plate_number') is-invalid @enderror"
                 placeholder="e.g. LB 12345" value="{{ old('plate_number') }}" required>
          @error('plate_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="model" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Model</label>
          <input type="text" id="model" name="model"
                 class="form-control @error('model') is-invalid @enderror"
                 placeholder="e.g. Mercedes Sprinter" value="{{ old('model') }}" required>
          @error('model')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="capacity" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Capacity</label>
          <input type="number" id="capacity" name="capacity" min="1" max="100"
                 class="form-control @error('capacity') is-invalid @enderror"
                 placeholder="e.g. 20" value="{{ old('capacity') }}" required>
          @error('capacity')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="status" class="form-label" style="font-size:13px;font-weight:500;color:#444441;">Status</label>
          <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            <option value="retired" {{ old('status') === 'retired' ? 'selected' : '' }}>Retired</option>
          </select>
          @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn px-4 py-2"
                  style="background:#085041;color:#E1F5EE;border-radius:8px;font-size:14px;font-weight:500;">
            Create bus
          </button>
          <a href="{{ route('admin.buses.index') }}" class="btn px-4 py-2"
             style="background:#f0f4f0;color:#444441;border-radius:8px;font-size:14px;font-weight:500;text-decoration:none;">
            Cancel
          </a>
        </div>

      </form>

    </div>

  </div>
</div>
</x-layout>
