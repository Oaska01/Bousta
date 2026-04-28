<x-layout>
<div style="background:#f0f4f0;min-height:100vh;padding:2rem 1rem;">
  <div class="container" style="max-width:860px;">

    {{-- Hero --}}
    <div class="text-center mb-4">
      <h1 style="font-size:26px;font-weight:500;color:#085041;">Bus Schedule</h1>
      <p style="font-size:14px;color:#888780;">
        Select your route and stop to see upcoming arrivals
      </p>
    </div>

    {{-- Filter card --}}
    <div style="background:#fff;border-radius:12px;border:0.5px solid #d3d1c7;
                padding:1.5rem;margin-bottom:1.5rem;">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label"
                 style="font-size:12px;font-weight:500;color:#444441;">
            Route
          </label>
          <select class="form-select"
                  style="border:0.5px solid #b4b2a9;border-radius:8px;font-size:14px;">
            <option>Aley → Beirut</option>
            <option>Beirut → Aley</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label"
                 style="font-size:12px;font-weight:500;color:#444441;">
            Stop
          </label>
          <select class="form-select"
                  style="border:0.5px solid #b4b2a9;border-radius:8px;font-size:14px;">
            <option>All stops</option>
            <option>Aley town square</option>
            <option>Choueifat</option>
            <option>Khalde</option>
            <option>Beirut city center</option>
          </select>
        </div>
      </div>
      <button class="btn w-100 mt-3 py-2"
              style="background:#085041;color:#E1F5EE;
                     border-radius:8px;font-size:14px;font-weight:500;">
        View schedule
      </button>
    </div>

    {{-- Date heading --}}
    <p style="font-size:14px;font-weight:500;color:#085041;margin-bottom:1rem;">
      Today — Monday 19 April 2026
    </p>

    {{-- ======== TRIP 1 — COMPLETED ======== --}}
    <div style="background:#fff;border-radius:12px;margin-bottom:1rem;
                overflow:hidden;border:0.5px solid #d3d1c7;">
      <div class="d-flex justify-content-between align-items-center px-3 py-3"
           style="border-bottom:0.5px solid #f1efef;">
        <div>
          <div style="font-size:14px;font-weight:500;color:#1a1a1a;">
            Aley → Beirut
          </div>
          <div style="font-size:12px;color:#888780;margin-top:2px;">
            Driver: Ahmed Karaki
          </div>
        </div>
        <div class="d-flex align-items-center gap-2">
          <span style="font-size:13px;font-weight:500;color:#085041;">05:30</span>
          <span style="font-size:11px;padding:3px 10px;border-radius:20px;
                       background:#f1efef;color:#b4b2a9;">Completed</span>
        </div>
      </div>
      <table class="table table-sm mb-0">
        <thead style="background:#fafafa;">
          <tr>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;width:30px;"></th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Stop</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Scheduled</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Actual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#085041;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Aley town square</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">05:30</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">05:30</span></td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#085041;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Choueifat</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">05:45</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">05:46</span> <span style="font-size:11px;color:#C8200A;">+1 min</span></td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#085041;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Khalde</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">05:58</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">06:01</span> <span style="font-size:11px;color:#C8200A;">+3 min</span></td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#085041;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Beirut city center</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">06:15</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">06:20</span> <span style="font-size:11px;color:#C8200A;">+5 min</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    {{-- ======== TRIP 2 — ACTIVE ======== --}}
    <div style="background:#fff;border-radius:12px;margin-bottom:1rem;
                overflow:hidden;border:0.5px solid #9FE1CB;">
      <div class="d-flex justify-content-between align-items-center px-3 py-3"
           style="border-bottom:0.5px solid #f1efef;background:#f0faf6;">
        <div>
          <div style="font-size:14px;font-weight:500;color:#1a1a1a;">
            Aley → Beirut
          </div>
          <div style="font-size:12px;color:#888780;margin-top:2px;">
            Driver: Karim Nassar
          </div>
        </div>
        <div class="d-flex align-items-center gap-2">
          <span style="font-size:13px;font-weight:500;color:#085041;">07:30</span>
          <span style="font-size:11px;padding:3px 10px;border-radius:20px;
                       background:#E1F5EE;color:#085041;">Active</span>
        </div>
      </div>
      <table class="table table-sm mb-0">
        <thead style="background:#fafafa;">
          <tr>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;width:30px;"></th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Stop</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Scheduled</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Actual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#085041;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Aley town square</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">07:30</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">07:30</span></td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#085041;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Choueifat</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">07:45</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">07:44</span> <span style="font-size:11px;color:#085041;">-1 min</span></td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#EF9F27;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Khalde</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">07:58</td>
            <td style="font-size:13px;padding:10px 1rem;border-color:#f1efef;"><span style="color:#3B6D11;font-weight:500;">07:59</span> <span style="font-size:11px;color:#C8200A;">+1 min</span></td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#d3d1c7;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Beirut city center</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">08:15</td>
            <td style="font-size:13px;color:#b4b2a9;padding:10px 1rem;border-color:#f1efef;">— not yet reached</td>
          </tr>
        </tbody>
      </table>
    </div>

    {{-- ======== TRIP 3 — SCHEDULED ======== --}}
    <div style="background:#fff;border-radius:12px;margin-bottom:1rem;
                overflow:hidden;border:0.5px solid #d3d1c7;">
      <div class="d-flex justify-content-between align-items-center px-3 py-3"
           style="border-bottom:0.5px solid #f1efef;">
        <div>
          <div style="font-size:14px;font-weight:500;color:#1a1a1a;">
            Aley → Beirut
          </div>
          <div style="font-size:12px;color:#888780;margin-top:2px;">
            Driver: Hassan Mourad
          </div>
        </div>
        <div class="d-flex align-items-center gap-2">
          <span style="font-size:13px;font-weight:500;color:#085041;">08:30</span>
          <span style="font-size:11px;padding:3px 10px;border-radius:20px;
                       background:#f0f4f0;color:#888780;">Scheduled</span>
        </div>
      </div>
      <table class="table table-sm mb-0">
        <thead style="background:#fafafa;">
          <tr>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;width:30px;"></th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Stop</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Scheduled</th>
            <th style="font-size:11px;color:#888780;font-weight:500;text-transform:uppercase;letter-spacing:0.5px;border:none;padding:8px 1rem;">Actual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#d3d1c7;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Aley town square</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">08:30</td>
            <td style="font-size:13px;color:#b4b2a9;padding:10px 1rem;border-color:#f1efef;">—</td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#d3d1c7;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Choueifat</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">08:45</td>
            <td style="font-size:13px;color:#b4b2a9;padding:10px 1rem;border-color:#f1efef;">—</td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#d3d1c7;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Khalde</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">08:58</td>
            <td style="font-size:13px;color:#b4b2a9;padding:10px 1rem;border-color:#f1efef;">—</td>
          </tr>
          <tr>
            <td style="padding:10px 1rem;border-color:#f1efef;"><span style="width:8px;height:8px;border-radius:50%;background:#d3d1c7;display:inline-block;"></span></td>
            <td style="font-size:13px;font-weight:500;color:#1a1a1a;padding:10px 1rem;border-color:#f1efef;">Beirut city center</td>
            <td style="font-size:13px;color:#085041;padding:10px 1rem;border-color:#f1efef;">09:15</td>
            <td style="font-size:13px;color:#b4b2a9;padding:10px 1rem;border-color:#f1efef;">—</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>
</x-layout>
