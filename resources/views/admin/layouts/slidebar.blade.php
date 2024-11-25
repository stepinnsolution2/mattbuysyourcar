<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4" style="background: #2c2e2f !important;">
<!-- Brand Logo -->
<a href="#" class="brand-link">
    Admin panel
</a>
<!-- Sidebar -->
<div class="sidebar">
    <style>
        .nav-pills .nav-link.active {
            background-color: #000000 !important;
            color: #ffffff !important;
            }
            .nav-pills .nav-link:not(.active):hover {
                background-color: #000000 !important;
                color: #ffffff !important;
            }
            .nav-item {
                cursor: pointer; /* Ensure the pointer cursor appears for menu items */
            }
            .submenu {
                display: none;
                list-style-type: none; /* Remove bullets */
            }
            .menu-toggle {
                cursor: pointer; /* Ensure pointer cursor for the menu toggle link */
            }
            .submenu.show {
                display: block;
            }
            .menu-item a:hover,
            .menu-item a:focus,
            .submenu-item:hover,
            .submenu-item:focus {
                color: #000;
                background-color: transparent;
                text-decoration: none;
            }
            .collapse-icon {
                transition: transform 0.3s;
            }

            .menu-toggle.collapsed .collapse-icon {
                transform: rotate(-180deg);
            }
    </style>
    <!-- Sidebar user (optional) -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link @if(Request::routeIs('dashboard')) active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('banners') }}" class="nav-link @if(Request::routeIs('banners')) active @endif">
                    <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p>Banners</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.about.index') }}" class="nav-link @if(Request::routeIs('admin.about.index')) active @endif">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>About</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.blog.index') }}" class="nav-link @if(Request::routeIs('admin.blog.index')) active @endif">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>Blog</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.marketing-media.index') }}" class="nav-link @if(Request::routeIs('admin.marketing-media.index')) active @endif">
                    <i class="fas fa-calendar nav-icon"></i>
                    <p>Marketing Media</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.car_detail.index') }}" class="nav-link @if(Request::routeIs('admin.car_detail.index')) active @endif">
                    <i class="fas fa-solid fa-store nav-icon"></i>
                    <p>Available Purchases</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.faqs.index') }}" class="nav-link @if(Request::routeIs('admin.faqs.index')) active @endif">
                    <i class="fas fa-solid fa-question nav-icon"></i>
                    <p>Faqs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.cars.index') }}" class="nav-link @if(Request::routeIs('admin.cars.index')) active @endif">
                    <i class="fas fa-solid fa-car nav-icon"></i>
                    <p>Car Types & Models</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.testimonial.index') }}" class="nav-link @if(Request::routeIs('admin.testimonial.index')) active @endif">
                    <i class="fas fa-solid fa-car nav-icon"></i>
                    <p>Testimonials</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.subscribe') }}" class="nav-link @if(Request::routeIs('admin.subscribe')) active @endif">
                    <i class="fas fa-solid fa-car nav-icon"></i>
                    <p>Subscribers</p>
                </a>
            </li>
        </ul>
    </nav>


    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Check the submenu state on page load
        $('.submenu').each(function() {
            // If any of the submenu links is active
            if ($(this).find('.active').length > 0) {
                $(this).show(); // Show the submenu
                $(this).prev('.menu-toggle').addClass('collapsed'); // Rotate the icon
            }
        });

        $('.menu-toggle').click(function(){
            $(this).next('.submenu').slideToggle();
            $(this).toggleClass('collapsed');
        });
    });
</script>
<!-- Content Wrapper. Contains page content -->
