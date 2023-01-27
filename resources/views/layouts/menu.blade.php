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

        {{-- !Rak --}}

        <li class="nav-item">
            <a href="{{ route('rak.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Rak

                </p>
            </a>
        </li>


        {{-- !Penerbit --}}
        <li class="nav-item">
            <a href="{{ route('penerbit.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Penerbit

                </p>
            </a>
        </li>


        {{-- !Pengarang --}}
        <li class="nav-item">
            <a href="{{ route('pengarang.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Pengarang

                </p>
            </a>
        </li>


        {{-- !Pengarang --}}
        <li class="nav-item">
            <a href="{{ route('buku.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Buku

                </p>
            </a>
        </li>

        {{-- !Pengarang --}}
        <li class="nav-item">
            <a href="{{ route('peminjaman.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Peminjaman

                </p>
            </a>
        </li>

        {{-- !Pengarang --}}
        <li class="nav-item">
            <a href="{{ route('pengembalian.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Pengembalian

                </p>
            </a>
        </li>


        {{-- !Pengarang --}}
        <li class="nav-item">
            <a href="{{ route('peminjaman_detail.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Peminjaman Detail

                </p>
            </a>
        </li>
    </ul>
</nav>
