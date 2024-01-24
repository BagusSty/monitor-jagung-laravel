<div class="flex-shrink-0 p-3 bg-white sidebar" style="width: 280px;">
    <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold text-center">Monitoring Benih Jagung</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1 @if(Request::is('/')) active @endif">
        <a href="{{ url('/') }}" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed @if(Request::is('/')) disabled @endif">
            <i class="fa-solid fa-house  me-2"></i> Dashboard
        </a>
      </li>
      <li class="mb-1" style="display: @if(session('role') == 2) none @endif;">
        <a href="#" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
            <i class="fa-solid fa-database me-2"></i>Data Master
        </a>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li class="@if(Route::currentRouteName() == 'distributor') active @endif"><a href="{{ url('/distributor')}}" class="link-dark d-inline-flex text-decoration-none rounded @if(Request::is('distributor*')) disabled @endif">Data Distributor</a></li>
            <li class="@if(Route::currentRouteName() == 'kios') active @endif"><a href="{{ url('/kios')}}" class="link-dark d-inline-flex text-decoration-none rounded @if(Request::is('kios*')) disabled @endif">Data Kios</a></li>
            <li class="@if(Route::currentRouteName() == 'produk') active @endif"><a href="{{ url('/produk')}}" class="link-dark d-inline-flex text-decoration-none rounded @if(Request::is('produk*')) disabled @endif">Data Produk</a></li>
            <li class="@if(Route::currentRouteName() == 'gaslap') active @endif"><a href="{{ url('/gaslap') }}" class="link-dark d-inline-flex text-decoration-none rounded collapsed @if(Request::is('gaslap*')) disabled @endif">Data Gaslap</a></li>
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
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const disabledLinks = document.querySelectorAll('.disabled');

        disabledLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
            });
        });
    });
</script>
