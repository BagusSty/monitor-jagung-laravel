<div class="flex-shrink-0 p-3 bg-white sidebar" style="width: 280px;">
    <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold text-center">Monitoring Benih Jagung</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1 @if(Request::is('/') || Request::is('/dashboard')) active @endif">
        <a href="{{ url('/') }}" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed @if(Request::is('/')) disabled @endif">
            <i class="fa-solid fa-house  me-2"></i> Dashboard
        </a>
      </li>
      <li class="mb-1 ">
        <a href="#" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
            <i class="fa-solid fa-database me-2"></i>Data Master
        </a>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Data Distributor</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Data Kios</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Data Produk</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Data Gaslap</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <a href="{{ url('/logout')}}" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed">
            <i class="fa-solid fa-right-from-bracket me-2"></i>Log Out
        </a>
      </li>
    </ul>
  </div>
