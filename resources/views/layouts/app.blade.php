<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'Home') | {{ config('app.name') }}</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sbadmin2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
 

  
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A==" crossorigin="anonymous" />
  <link href="{{ asset('sbadmin2/css/sb-admin-2.css' ) }}" rel="stylesheet">
  @yield('css')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav navbar-dark bg-dark sidebar sidebar-dark accordion" style="height:auto;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
        <div>Sklep Warzywny</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('kokpit.index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Kokpit</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    

       <!-- Nav Item - Gospodarstwo Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGospodarstwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-tractor"></i>
          <span>Dane Gospodarstwa</span>
        </a>
        <div id="collapseGospodarstwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="{{ route('gospodarstwo.create')}}">Dodaj Gospodarstwo</a>
            <a class="collapse-item" href="{{ route('gospodarstwo.index')}}">Edytuj Gospodarstwo</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Users Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span>Użytkownicy</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="{{ route('uzytkownik.create')}}">Dodaj Użytkownika</a>
            <a class="collapse-item" href="{{ route('uzytkownik.index')}}">Edytuj Użytkownika</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Categories Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
          <span>Kategorie</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item"  href="{{ route('kategorie.create')}}">Dodaj Kategorie</a>
            <a class="collapse-item"  href="{{ route('kategorie.index')}}">Edytuj Kategorie</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Produkty Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Produkty</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item"  href="{{ route('produkt.create')}}">Dodaj Produkt</a>
            <a class="collapse-item"  href="{{ route('produkt.index')}}">Edytuj Produkt</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Zamowienia Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-beer"></i>
          <span>Zamowienia</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/zamowienia')}}">Edytuj Zamowienie</a>
          </div>
        </div>
      </li>

        <!-- Nav Item - Kalendarz Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCalendar" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-calendar-alt"></i>
          <span>Kalendarz</span>
        </a>
        <div id="collapseCalendar" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('task.index')}}">Widok Kalendarz</a>
            <a class="collapse-item"  href="{{ route('task.create')}}">Dodaj do Kalendarza</a>
          </div>
        </div>
      </li>

    

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Szukaj..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
        @auth
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Szukaj..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

          

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/zamowienia')}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$zamowienia}} Nowych zamówień
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('produkt.index')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> {{$produktystanilosc}} skończonych produktów
           
          </a>
      </li>
     
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  {{ auth()->user()->name }}
                </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{  route('uzytkownik.edit', Auth::user()->id) }}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ustawienia
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
       
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Wyloguj
                </a>
              </div>
            </li>
          </ul>
        @endauth

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @yield('content')
            <br>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
   <!-- Footer -->
   <footer class="sticky-footer bg-white p-3">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright Struzik Patryk 28933 &copy;  {{ date('Y') }}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @auth
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Na pewno chcesz się wylogować?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Wybierz "wyloguj" jeśli chcesz zakończyć sesje.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Anuluj</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Wyloguj
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
 @endauth

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sbadmin2/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('js/jquery.validate.min.js') }}"></script>
   <!-- Datatables -->
    <script src="{{ asset('js/datatables-demo.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
  
  @yield('js')
</body>

</html>
