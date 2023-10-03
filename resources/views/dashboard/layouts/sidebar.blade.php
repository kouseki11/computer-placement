<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="user" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/dashboard/computers*') ? 'active' : '' }}" href="/dashboard/computers">
                <span data-feather="monitor" class="align-text-bottom"></span>
                My Computer
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/dashboard/rooms*') ? 'active' : '' }}" href="/dashboard/rooms">
                <span data-feather="home" class="align-text-bottom"></span>
                Computer Room
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/dashboard/brands*') ? 'active' : '' }}" href="/dashboard/brands">
                <span data-feather="bold" class="align-text-bottom"></span>
                Computer Brand
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
</div>