<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('admin.dash') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tags"></i>
            <span>{{ __('admin.categories') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item"
                    href="{{ route('admin.categories.index') }}">{{ __('admin.all_categories') }}</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">{{ __('admin.add_new') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-heart"></i>
            <span>{{ __('admin.products') }}</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="buttons.html">{{ __('admin.all_products') }}</a>
                <a class="collapse-item" href="cards.html">{{ __('admin.add_new') }}</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-shopping-cart"></i>
            <span>{{ __('admin.orders') }}</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-dollar-sign"></i>
            <span>{{ __('admin.payments') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-users"></i>
            <span>{{ __('admin.customers') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true"
            aria-controls="collapseRole">
            <i class="fas fa-lock"></i>
            <span>{{ __('admin.role') }}</span>
        </a>
        <div id="collapseRole" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="buttons.html">{{ __('admin.all_role') }}</a>
                <a class="collapse-item" href="cards.html">{{ __('admin.add_new') }}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>