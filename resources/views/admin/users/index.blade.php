<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:1100px;">

    {{-- Breadcrumb --}}
    <div class="mb-3">
      <a href="{{ route('admin.home') }}"
         style="font-size:13px;color:#888780;text-decoration:none;">
        ← Back to dashboard
      </a>
    </div>

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
      <div>
        <h1 style="font-size:22px;font-weight:500;color:#085041;margin-bottom:4px;">
          Users
        </h1>
        <p style="font-size:13px;color:#888780;margin:0;">
          Manage admins and drivers
        </p>
      </div>
      <a href="{{ route('admin.users.create') }}" class="btn"
         style="background:#085041;color:#E1F5EE;border-radius:8px;
                padding:8px 16px;font-size:13px;font-weight:500;text-decoration:none;">
        + Create user
      </a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
      <div class="alert py-2 px-3 mb-3"
           style="background:#E1F5EE;color:#085041;border-radius:8px;
                  border:0.5px solid #9FE1CB;font-size:13px;">
        {{ session('success') }}
      </div>
    @endif

    {{-- Users table --}}
    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;overflow:hidden;">
      <table class="table mb-0">
        <thead style="background:#fafafa;">
          <tr>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;
                       letter-spacing:0.5px;border:none;padding:12px 1rem;">Name</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;
                       letter-spacing:0.5px;border:none;padding:12px 1rem;">Email</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;
                       letter-spacing:0.5px;border:none;padding:12px 1rem;">Phone</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;
                       letter-spacing:0.5px;border:none;padding:12px 1rem;">Role</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;
                       letter-spacing:0.5px;border:none;padding:12px 1rem;text-align:right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
            <tr>
              <td style="font-size:13px;font-weight:500;color:#1a1a1a;
                         padding:12px 1rem;border-color:#f1efef;">
                {{ $user->name }}
              </td>
              <td style="font-size:13px;color:#444441;padding:12px 1rem;border-color:#f1efef;">
                {{ $user->email ?? '—' }}
              </td>
              <td style="font-size:13px;color:#444441;padding:12px 1rem;border-color:#f1efef;">
                {{ $user->phone_number }}
              </td>
              <td style="padding:12px 1rem;border-color:#f1efef;">
                @if($user->role === 'admin')
                  <span style="font-size:11px;padding:3px 10px;border-radius:20px;
                               background:#FCEFD8;color:#854F0B;font-weight:500;">
                    Admin
                  </span>
                @else
                  <span style="font-size:11px;padding:3px 10px;border-radius:20px;
                               background:#DCEAF8;color:#185FA5;font-weight:500;">
                    Driver
                  </span>
                @endif
              </td>
              <td style="padding:12px 1rem;border-color:#f1efef;text-align:right;">
                <a href="{{ route('admin.users.edit', $user) }}"
                   style="font-size:12px;color:#085041;text-decoration:none;font-weight:500;
                          padding:4px 8px;">
                  Edit
                </a>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                      style="display:inline;"
                      onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          style="font-size:12px;color:#C8200A;background:none;border:none;
                                 padding:4px 8px;cursor:pointer;font-weight:500;">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5"
                  style="text-align:center;padding:2rem;color:#888780;font-size:14px;
                         border:none;">
                No users found. <a href="{{ route('admin.users.create') }}"
                                   style="color:#085041;text-decoration:none;">Create one</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    @if($users->hasPages())
      <div class="mt-3">
        {{ $users->links() }}
      </div>
    @endif

  </div>
</div>
</x-layout>
