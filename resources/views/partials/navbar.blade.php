<nav class="navbar navbar-expand-lg navbar-light bg-light border border-bottom border-lg shadow-sm position-fixed w-100 top-0 d-flex py-2 px-4" style="z-index:100;">
    <a class="navbar-brand" href="/">Wikrama Computer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>                                                                                                                                                              
    </button>                                                                                  
    <div class="collapse navbar-collapse" id="navbarNav">                                    
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link text-dark" href="/home">Home</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Wikrama
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item" onclick="return confirm('Yakin?')"><i class="bi bi-box-arrow-right"></i>Logout</button>
              </form>
            </li>
          </ul>
        </li>       
        {{-- <li class="nav-item">
          <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
        </li> --}}
      </ul>
    </div>
  </nav>