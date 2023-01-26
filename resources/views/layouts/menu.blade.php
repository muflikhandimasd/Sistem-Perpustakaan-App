<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('anggota.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Anggota

                </p>
            </a>
        </li>


        {{-- !PETUGAS --}}
        <li class="nav-item">
            <a href="{{ route('petugas.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Petugas

                </p>
            </a>
        </li>

    </ul>
</nav>
