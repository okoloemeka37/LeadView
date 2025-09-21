<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Hospital Directory</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="{{asset("script/index.js")}}" defer></script>
  <script src="{{asset("script/location.js")}}" defer></script>
 <link rel="stylesheet" href="{{asset("style/index.css")}}">
</head>
<body>

  <div class="container topbar">
    <div class="d-flex justify-content-between align-items-center">
      <div class="brand">
        <i class="bi bi-hospital fs-4"></i>
        <div>
          <div style="font-size:1rem">Hospital Directory</div>
          <small class="text-muted">Professional listings</small>
        </div>
      </div>

      <div class="controls d-flex align-items-center gap-2">
        <div class="input-group shadow-sm" style="min-width:260px;">
          <span class="input-group-text bg-white border-0"><i class="bi bi-search"></i></span>
          <input id="search" class="form-control"  placeholder="Search name, city, or type">
        </div>

        <select id="filterType" class="form-select form-select-sm" style="min-width:150px;">
          <option>All types</option>
        </select>
      </div>
    </div>
  </div>

  <main class="container pb-4">
    <div class="panel">

      <!-- Desktop Table -->
      <div class="desktop-view">
        <div class="table-responsive">
        <table class="hospital-table">
  <thead>
    <tr>
      <th style="width:30%;">Hospital</th>
      <th style="width:15%;">Type</th>
      <th style="width:15%;">Town</th>
      <th style="width:15%;">State</th>
      <th style="width:5%;">Zone</th>

      <th style="width:15%;" class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lists as $list)
    <tr>
      <td>
        <div class="d-flex align-items-center">
        {{--   <div class="initials">SM</div> --}}
          <div>
            <div style="font-weight:600;" class="PROVIDER">{{$list['PROVIDER']}}</div>
            <div style="font-size:.88rem;)">{{$list["ADDRESS"]}}</div>
            <div style="font-size:.88rem; )">{{$list["PLAN"]}}</div>
          </div>
        </div>
      </td>
      <td>{{$list["SPECIALTY"]}}</td>
      <td class="TOWN">{{$list["TOWN"] }}</td>
      <td>{{$list["STATE"]}}</td>
      <td>{{$list["ZONE"]}}</td>
      <td class="text-end">
        <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-telephone"></i></a>
        <a href="#" class="btn btn-sm btn-primary">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
      </div>

      <!-- Mobile List -->
     {{--  <div class="mobile-view">
        <ul class="list-group mobile-list">
    

          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <div class="d-flex align-items-center">
                <div class="initials me-2">CC</div>
                <div>
                  <div style="font-weight:600; font-size:0.97rem;">City Children’s Clinic</div>
                  <div class="meta">Abuja • <span class="type-pill">Pediatric</span></div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-column align-items-end ms-3">
              <a href="#" class="btn btn-sm btn-outline-primary mb-1"><i class="bi bi-telephone"></i></a>
              <a href="#" class="btn btn-sm btn-primary">View</a>
            </div>
          </li>
          <!-- Add more list items -->
        </ul>
      </div>
 --}}
    </div>
  </main>


</body>
</html>
