<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:1100px;">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
      <div>
        <h1 style="font-size:24px;font-weight:500;color:#085041;margin-bottom:4px;">
          Admin Dashboard
        </h1>
        <p style="font-size:14px;color:#888780;margin:0;">
          Welcome back, {{ auth()->user()->name }}
        </p>
      </div>
      <span style="font-size:12px;color:#888780;">
        {{ now()->format('l, d F Y') }}
      </span>
    </div>

    {{-- Stat cards --}}
    <div class="row g-3 mb-4">

      <div class="col-md-6 col-lg-3">
        <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;">
          <div style="font-size:11px;color:#888780;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:8px;">
            Active Routes
          </div>
          <div style="font-size:28px;font-weight:500;color:#085041;">2</div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;">
          <div style="font-size:11px;color:#888780;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:8px;">
            Total Drivers
          </div>
          <div style="font-size:28px;font-weight:500;color:#085041;">20</div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;">
          <div style="font-size:11px;color:#888780;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:8px;">
            Active Buses
          </div>
          <div style="font-size:28px;font-weight:500;color:#085041;">20</div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;">
          <div style="font-size:11px;color:#888780;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:8px;">
            Trips Today
          </div>
          <div style="font-size:28px;font-weight:500;color:#085041;">80</div>
        </div>
      </div>

    </div>

    {{-- Management menu --}}
    <h2 style="font-size:16px;font-weight:500;color:#085041;margin-bottom:1rem;">
      Manage
    </h2>

    <div class="row g-3">

      <div class="col-md-4">
        <a href="{{ route('admin.routes.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Routes
            </div>
            <div style="font-size:12px;color:#888780;">
              Define paths and stop sequences
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.stops.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Stops
            </div>
            <div style="font-size:12px;color:#888780;">
              Manage stop locations
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.buses.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Buses
            </div>
            <div style="font-size:12px;color:#888780;">
              Manage fleet vehicles
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Users
            </div>
            <div style="font-size:12px;color:#888780;">
              Manage drivers and admins
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.shifts.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Shifts
            </div>
            <div style="font-size:12px;color:#888780;">
              Assign drivers and buses to shifts
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.trip-templates.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Trip Templates
            </div>
            <div style="font-size:12px;color:#888780;">
              Set recurring departure patterns
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ route('admin.lost-items.index') }}" class="text-decoration-none">
          <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;padding:1.25rem;height:100%;">
            <div style="font-size:14px;font-weight:500;color:#085041;margin-bottom:4px;">
              Lost Items
            </div>
            <div style="font-size:12px;color:#888780;">
              Match passenger reports with found items
            </div>
          </div>
        </a>
      </div>

    </div>

  </div>
</div>
</x-layout>
