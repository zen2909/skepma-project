<style>
    /* Custom styles for the sidebar */
    .sidebar {
        height: 100vh;
        background-color: #343a40;
        color: white;
        position: fixed;
        width: 250px;
        transition: all 0.3s ease;
    }

    .sidebar .nav-link {
        color: #adb5bd;
    }

    .sidebar .nav-link:hover {
        color: white;
        background-color: #495057;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .collapsed .sidebar {
        width: 80px;
    }

    .collapsed .content {
        margin-left: 80px;
    }

    .sidebar-toggler {
        font-size: 1.5rem;
        cursor: pointer;
    }

    .sidebar-toggler:hover {
        color: #adb5bd;
    }

</style>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="text-white">Menu</h4>
            <span class="sidebar-toggler text-white">&#9776;</span>
        </div>
        <hr class="text-secondary">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('certificates.index') }}" class="nav-link"><i class="bi bi-house"></i> Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('certificates.list') }}" class="nav-link"><i class="bi bi-info-circle"></i> list</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="bi bi-envelope"></i> Contact</a>
            </li>
        </ul>
    </nav>
</div>
</div>
