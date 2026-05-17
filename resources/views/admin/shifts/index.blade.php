<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:1100px;">

    <div class="mb-3">
      <a href="{{ route('admin.home') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to dashboard
      </a>
    </div>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
      <div>
        <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">Shifts</h1>
        <p style="font-size:13px;color:#888780;margin:0;">Assign drivers and buses to routes by date</p>
      </div>
      <a href="{{ route('admin.shifts.create') }}" class="btn"
         style="background:#085041;color:#E1F5EE;border-radius:8px;
                padding:8px 16px;font-size:13px;font-weight:500;text-decoration:none;">
        + Create shift
      </a>
    </div>

    @if(session('success'))
      <div class="alert py-2 px-3 mb-3"
           style="background:#E1F5EE;color:#085041;border-radius:8px;
                  border:0.5px solid #9FE1CB;font-size:13px;">
        {{ session('success') }}
      </div>
    @endif

    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;overflow:hidden;">
      <table class="table mb-0">
        <thead style="background:#fafafa;">
          <tr>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:12px 1rem;">Date</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:12px 1rem;">Route</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:12px 1rem;">Driver</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:12px 1rem;">Bus</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:12px 1rem;">Status</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:12px 1rem;text-align:right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($shifts as $shift)
            <tr>
              <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:12px 1rem;border-color:#f1efef;">
                {{ \Carbon\Carbon::parse($shift->date)->format('d M Y') }}
              </td>
              <td style="font-size:13px;color:#444441;padding:12px 1rem;border-color:#f1efef;">
                {{ $shift->route->name ?? '—' }}
              </td>
              <td style="font-size:13px;color:#444441;padding:12px 1rem;border-color:#f1efef;">
                {{ $shift->driver->name ?? '—' }}
              </td>
              <td style="font-size:13px;color:#444441;padding:12px 1rem;border-color:#f1efef;">
                {{ $shift->bus->plate_number ?? '—' }}
              </td>
              <td style="padding:12px 1rem;border-color:#f1efef;">
                @if($shift->status === 'scheduled')
                <span style="font-size:11px;padding:3px 10px;border-radius:20px;background:#E1F5EE;color:#085041;font-weight:500;">Scheduled</span>
                @elseif($shift->status === 'in_progress')
                <span style="font-size:11px;padding:3px 10px;border-radius:20px;background:#FCEFD8;color:#854F0B;font-weight:500;">In progress</span>
                @elseif($shift->status === 'completed')
                <span style="font-size:11px;padding:3px 10px;border-radius:20px;background:#DCEAF8;color:#185FA5;font-weight:500;">Completed</span>
                @else
                <span style="font-size:11px;padding:3px 10px;border-radius:20px;background:#f1efef;color:#888780;font-weight:500;">Cancelled</span>
                @endif
              </td>
              <td style="padding:12px 1rem;border-color:#f1efef;text-align:right;">
                <a href="{{ route('admin.shifts.edit', $shift) }}"
                   style="font-size:12px;color:#085041;text-decoration:none;font-weight:500;padding:4px 8px;">
                  Edit
                </a>
                <form method="POST" action="{{ route('admin.shifts.destroy', $shift) }}"
                      style="display:inline;" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          style="font-size:12px;color:#C8200A;background:none;border:none;padding:4px 8px;cursor:pointer;font-weight:500;">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align:center;padding:2rem;color:#888780;font-size:14px;border:none;">
                No shifts found. <a href="{{ route('admin.shifts.create') }}" style="color:#085041;text-decoration:none;">Create one</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($shifts->hasPages())
      <div class="mt-3">{{ $shifts->links() }}</div>
    @endif

  </div>
</div>
</x-layout>
