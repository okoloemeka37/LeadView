<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Hospital Directory</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <style>
        
    :root {
      --accent: #2563eb;
      --muted: #6b7280;
      --card-bg: #ffffff;
    }
    body {
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: linear-gradient(180deg,#f6f9ff 0,#fdfefe 100%);
      color:#0b1220;
      min-height:100vh;
    }

    /* Top */
    .topbar { padding:18px 0; }
    .brand {
      display:flex; gap:.6rem; align-items:center; font-weight:700; color:var(--accent); font-size:1.05rem;
    }

    .controls .form-control { min-width: 180px; border-radius: 10px; }
    .controls .btn { border-radius: 10px; }

    /* Panel */
    .panel {
      background: var(--card-bg);
      border-radius: 14px;
      padding: 14px;
      box-shadow: 0 10px 30px rgba(37,99,235,0.06);
      margin-bottom: 18px;
    }

    /* Table (desktop) */
    table.hospital-table {
      border-collapse: separate;
      border-spacing: 0 10px;
      width:100%;
    }
    table.hospital-table thead th {
      font-weight:600; color:#0b1220; border-bottom:0;
    }
    table.hospital-table tbody tr {
      background: linear-gradient(180deg,#fff,#fbfdff);
      box-shadow: 0 8px 20px rgba(9,30,66,0.04);
      border-radius: 10px;
      transition: transform .12s ease, box-shadow .12s ease;
    }
    table.hospital-table tbody tr:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 40px rgba(9,30,66,0.06);
    }
    table.hospital-table tbody td {
      border:0; vertical-align:middle; padding:12px 14px;
    }

    .initials {
      width:44px; height:44px; border-radius:10px;
      display:inline-flex; align-items:center; justify-content:center;
      font-weight:700; color:#fff;
      background: linear-gradient(135deg,var(--accent), #1e40af);
      margin-right:12px; font-size:.95rem;
    }

    /* Mobile list */
    .mobile-list .list-group-item {
      border:0; border-radius:12px; padding:12px;
      background: linear-gradient(180deg,#fff,#fbfdff);
      box-shadow: 0 8px 20px rgba(9,30,66,0.03);
    }
    .mobile-list .meta { font-size:.88rem; color:var(--muted) }
    .type-pill {
      padding:4px 8px; border-radius:999px;
      font-weight:600; font-size:.79rem;
      color:var(--accent); background: rgba(37,99,235,0.08);
    }

    /* Footer */
    footer { text-align:center; color:var(--muted); padding:10px 0; font-size:.9rem; }

    /* Responsive: show table on md+, list on xs */
    .desktop-view { display:none; }
    .mobile-view { display:block; }
    @media(min-width:768px){
      .desktop-view { display:block; }
      .mobile-view { display:none; }
    }
  
        </style>

<div class="container mt-4 HD d-none">
  <div class="alert alert-info shadow-sm border-0 rounded-3" role="alert">
    <h5 class="alert-heading mb-2">
      <i class="bi bi-card-checklist me-2"></i> Enter Your HMO Plan
    </h5>
    <p class="mb-3">
      Please provide your HMO plan name below to continue.
    </p>
    <div class="d-flex align-items-center">
      <input type="text" class="form-control me-2 hd-in" placeholder="e.g. Leadway Health" required>
      <button class="btn btn-primary hd-btn">
        Submit
      </button>
    </div>
  </div>
</div>



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


  <script>

    let locality; 


const search=document.querySelector("#search");
search.addEventListener("keyup",()=>{
const provider=document.querySelectorAll(".PROVIDER");
provider.forEach((val)=>{

    const inputVal=search.value.toLowerCase()
const content=val.innerHTML.toLowerCase();

if (content.indexOf(inputVal) == -1) {

    val.closest("tr").className="d-none"

}else{
     val.closest("tr").classList.remove("d-none")


}

})

        if (search.value.length === 0) {
             const town=document.querySelectorAll(".TOWN");
       town.forEach((val)=>{


        const content=val.innerHTML.toLowerCase();

        if (content.indexOf(locality) == -1) {

    val.closest("tr").className="d-none"

        }else{
     val.closest("tr").classList.remove("d-none")


        }

        })
        }

})







//location


if (navigator.geolocation) {
  
    navigator.geolocation.getCurrentPosition((position)=>{
        
        const lat=position.coords.latitude;
        const long=position.coords.longitude

getLocation(lat,long)

    }, (error) => {
      console.error("Error getting location:", error);
    }
  );
    

}else {
  console.log("Geolocation is not supported by this browser.");
}



async function getLocation(lat,long) {
  await  fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${long}&localityLanguage=en`)
    .then((resp)=>resp.json())
    .then((data)=>{
       locality=data['locality'].toLowerCase();
       console.log(data)
       const town=document.querySelectorAll(".TOWN");
       town.forEach((val)=>{


        const content=val.innerHTML.toLowerCase();

        if (content.indexOf(locality) == -1) {

    val.closest("tr").className="d-none"

        }else{
     val.closest("tr").classList.remove("d-none")


        }

        })
    })
}



//plan
plan()
function plan() {
  window.onload=()=>{
 const HD=   document.querySelector(".HD");
 const planType=localStorage.getItem("plus");
 if (planType) {
  HD.classList.remove("d-none");
 let btn=document.querySelector(".hd-btn");
 btn.addEventListener("click",()=>{
  const inputVal=document.querySelector(".hd-in").value;

  localStorage.setItem("plan",inputVal);
 })
 }
 
  }
}

  </script>

</body>
</html>
