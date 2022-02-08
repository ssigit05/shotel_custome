<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard')}}" class="brand-link">
      <img src="{{ url('images/ssgit.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <x-nav-item label="Dashboard" icon="fas fa-tachometer-alt" :link="route('dashboard')"/>
            <x-nav-item label="Pemesanan" icon="fas fa-cash-register" :link="route('pemesanan.index')"/>
            <x-nav-item label="Fasilitas Hotel" icon="fas fa-hotel" :link="route('fasilitas.index')"/>
            <x-nav-item label="Kamar" icon="fas fa-bed" :link="route('kamar.index')"/>
            @can('role', 'admin')
              <x-nav-item label="User Admin" icon="fas fa-users" :link="route('admin.index')"/>
            @endcan
            
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>