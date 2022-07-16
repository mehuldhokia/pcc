<div class="sidebar px-4 py-4 py-md-4 me-0 gradient=">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('home') }}" class="mb-0 brand-icon bg-white rounded p-1 px-3">
            <span class="logo-icon">
                <img src="{{ asset('assets/images/favicon.png') }}" width="40" class="bg-white rounded p-1">
                {{-- <i class="bi bi-bag-check-fill fs-4"></i> --}}
            </span>
            <span class="logo-text text-dark m-0 pl-0 pb-2">PCC India</span>
        </a>

        {{-- @if (!empty(Auth::user()->getRoleNames()))
            @foreach (Auth::user()->getRoleNames() as $v)
                <?php $userRole = $v; ?>
            @endforeach
        @endif --}}

        <?php $page = Route::current()->getName(); ?>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">

            <li>
                <a href="{{ route('home') }}"
                    @if ($page == 'home') class="m-link active" @else class="m-link" @endif>
                    <i class="icofont-home fs-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @can('user-read', 'role-read')
                <hr class="dropdown-divider border-light">
                {{-- <li class="collapsed">
                    <a @if ($page == 'users.index' || $page == 'roles.index' || $page == 'permissions.index') class="m-link active" @else class="m-link" @endif
                        data-bs-toggle="collapse" data-bs-target="#menu-user" href="#">
                        <i class="icofont-people fs-5"></i> <span>User Management</span> <span
                            class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>

                    <ul class="sub-menu collapse" id="menu-user"> --}}
                @can('user-read')
                    <li>
                        <a href="{{ route('users.index') }}"
                            @if ($page == 'users.index') class="m-link active" @else class="m-link" @endif>
                            <i class="icofont-users fs-5"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan

                @can('role-read')
                    <li>
                        <a href="{{ route('roles.index') }}"
                            @if ($page == 'roles.index') class="m-link active" @else class="m-link" @endif>
                            <i class="icofont-id-card fs-5"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                @endcan

                @can('role-read')
                    <li>
                        <a href="{{ route('permissions.index') }}"
                            @if ($page == 'permissions.index') class="m-link active" @else class="m-link" @endif>
                            <i class="icofont-key fs-5"></i>
                            <span>Permissions</span>
                        </a>
                    </li>
                @endcan
                {{-- </ul>
                </li> --}}
                <hr class="dropdown-divider border-light">
            @endcan

            @can('carousel-read')
                <li>
                    <a href="{{ route('carousels.index') }}"
                        @if ($page == 'carousels.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-ui-image fs-5"></i>
                        <span>Carousel</span>
                    </a>
                </li>
            @endcan

            @can('course-read')
                <li>
                    <a href="{{ route('courses.index') }}"
                        @if ($page == 'courses.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-book-alt fs-5"></i>
                        <span>Courses</span>
                    </a>
                </li>
            @endcan

            @can('center-read')
                <li>
                    <a href="{{ route('centers.index') }}"
                        @if ($page == 'centers.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-building-alt fs-5"></i>
                        <span>Center Details</span>
                    </a>
                </li>
            @endcan

            @can('city-read')
                <li>
                    <a href="{{ route('cities.index') }}"
                        @if ($page == 'cities.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-location-pin fs-5"></i>
                        <span>City Details</span>
                    </a>
                </li>
            @endcan

            @can('contact-read')
                <li>
                    <a href="{{ route('contacts.index') }}"
                        @if ($page == 'contacts.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-email fs-5"></i>
                        <span>Contact Messages</span>
                    </a>
                </li>
            @endcan


            {{-- <li class="collapsed">
                <a @if ($page == 'product.grid' || $page == 'product.list' || $page == 'product.edit' || $page == 'product.detail' || $page == 'product.add' || $page == 'product.cart' || $page == 'checkout') class="m-link active" @else class="m-link" @endif
                    data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                    <i class="icofont-truck-loaded fs-5"></i> <span>Products</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-product">
                    <li><a @if ($page == 'product.grid') class="m-link active" @else class="m-link" @endif
                            href="{{ route('product.grid') }}">Product Grid</a></li>
                    <li><a @if ($page == 'product.list') class="m-link active" @else class="m-link" @endif
                            href="{{ route('product.list') }}">Product List</a></li>
                    <li><a @if ($page == 'product.edit') class="m-link active" @else class="m-link" @endif
                            href="{{ route('product.edit') }}">Product Edit</a></li>
                    <li><a @if ($page == 'product.detail') class="m-link active" @else class="m-link" @endif
                            href="{{ route('product.detail') }}">Product Details</a></li>
                    <li><a @if ($page == 'product.add') class="m-link active" @else class="m-link" @endif
                            href="{{ route('product.add') }}">Product Add</a></li>
                    <li><a @if ($page == 'product.cart') class="m-link active" @else class="m-link" @endif
                            href="{{ route('product.cart') }}">Shopping Cart</a></li>
                    <li><a @if ($page == 'checkout') class="m-link active" @else class="m-link" @endif
                            href="{{ route('checkout') }}">Checkout</a></li>
                </ul>
            </li> --}}

            {{-- <li class="collapsed">
                <a @if ($page == 'categories.create' || $page == 'categories.edit' || $page == 'categories.index') class="m-link active" @else class="m-link" @endif
                    data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                    <i class="icofont-chart-flow fs-5"></i> <span>Categories</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="categories">
                    <li><a @if ($page == 'categories.index') class="m-link active" @else class="m-link" @endif
                            href="{{ route('categories.index') }}">Categories List</a></li>
                    <li><a @if ($page == 'categories.create') class="m-link active" @else class="m-link" @endif
                            href="{{ route('categories.create') }}">Categories Add</a></li>
                    <!-- <li><a @if ($page == 'categories.edit') class="m-link active" @else class="m-link" @endif
                            href="{{ route('categories.edit') }}">Categories Edit</a></li> -->
                </ul>
            </li> --}}

            {{-- <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                    <i class="icofont-notepad fs-5"></i> <span>Orders</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="menu-order">
                    <li><a class="ms-link " href="order-list.html">Orders List</a></li>
                    <li><a class="ms-link " href="order-details.html">Order Details</a></li>
                    <li><a class="ms-link " href="order-invoices.html">Order Invoices</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#customers-info" href="#">
                    <i class="icofont-funky-man fs-5"></i> <span>Customers</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="customers-info">
                    <li><a class="ms-link " href="customers.html">Customers List</a></li>
                    <li><a class="ms-link " href="customer-detail.html">Customers Details</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#menu-sale" href="#">
                    <i class="icofont-sale-discount fs-5"></i> <span>Sales Promotion</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="menu-sale">
                    <li><a class="ms-link " href="coupon-list.html">Coupons List</a></li>
                    <li><a class="ms-link " href="coupon-add.html">Coupons Add</a></li>
                    <li><a class="ms-link " href="coupon-edit.html">Coupons Edit</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">
                    <i class="icofont-chart-histogram fs-5"></i> <span>Inventory</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="menu-inventory">
                    <li><a class="ms-link " href="inventory-info.html">Stock List</a></li>
                    <li><a class="ms-link " href="purchase.html">Purchase</a></li>
                    <li><a class="ms-link " href="supplier.html">Supplier</a></li>
                    <li><a class="ms-link " href="returns.html">Returns</a></li>
                    <li><a class="ms-link " href="department.html">Department</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#menu-Componentsone" href="#"><i
                        class="icofont-ui-calculator"></i> <span>Accounts</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="menu-Componentsone">
                    <li><a class="ms-link " href="invoices.html">Invoices </a></li>
                    <li><a class="ms-link " href="expenses.html">Expenses </a></li>
                    <li><a class="ms-link " href="salaryslip.html">Salary Slip </a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#app" href="#">
                    <i class="icofont-code-alt fs-5"></i> <span>App</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="app">
                    <li><a class="ms-link " href="calendar.html">Calandar</a></li>
                    <li><a class="ms-link " href="chat.html"> Chat App</a></li>
                </ul>
            </li>

            <li><a class="m-link " href="store-locator.html"><i class="icofont-focus fs-5"></i> <span>Store
                        Locator</span></a></li>
            <li><a class="m-link " href="stater-page.html"><i class="icofont-code fs-5"></i> <span>Stater
                        Page</span></a></li>


            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#menu-Components" href="#"><i
                        class="icofont-paint"></i> <span>UI Components</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="menu-Components">
                    <li><a class="ms-link " href="ui-alerts.html"><span>Alerts</span> </a></li>
                    <li><a class="ms-link " href="ui-badge.html"><span>Badge</span></a></li>
                    <li><a class="ms-link " href="ui-breadcrumb.html"><span>Breadcrumb</span></a></li>
                    <li><a class="ms-link " href="ui-buttons.html"><span>Buttons</span></a></li>
                    <li><a class="ms-link " href="ui-card.html"><span>Card</span></a></li>
                    <li><a class="ms-link " href="ui-carousel.html"><span>Carousel</span></a></li>
                    <li><a class="ms-link " href="ui-collapse.html"><span>Collapse</span></a></li>
                    <li><a class="ms-link " href="ui-dropdowns.html"><span>Dropdowns</span></a></li>
                    <li><a class="ms-link " href="ui-listgroup.html"><span>List group</span></a></li>
                    <li><a class="ms-link " href="ui-modal.html"><span>Modal</span></a></li>
                    <li><a class="ms-link " href="ui-navs.html"><span>Navs</span></a></li>
                    <li><a class="ms-link " href="ui-navbar.html"><span>Navbar</span></a></li>
                    <li><a class="ms-link " href="ui-pagination.html"><span>Pagination</span></a></li>
                    <li><a class="ms-link " href="ui-popovers.html"><span>Popovers</span></a></li>
                    <li><a class="ms-link " href="ui-progress.html"><span>Progress</span></a></li>
                    <li><a class="ms-link " href="ui-scrollspy.html"><span>Scrollspy</span></a></li>
                    <li><a class="ms-link " href="ui-spinners.html"><span>Spinners</span></a></li>
                    <li><a class="ms-link " href="ui-toasts.html"><span>Toasts</span></a></li>
                    <li><a class="ms-link " href="ui-tooltips.html"><span>Tooltips</span></a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#Authentication" href="#">
                    <i class="icofont-ui-lock fs-5"></i> <span>Authentication</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="Authentication">
                    <li><a class="ms-link " href="auth-signin.html">Sign in</a></li>
                    <li><a class="ms-link " href="auth-signup.html">Sign up</a></li>
                    <li><a class="ms-link " href="auth-password-reset.html">Password reset</a></li>
                    <li><a class="ms-link " href="auth-two-step.html">2-Step Authentication</a></li>
                    <li><a class="ms-link " href="auth-404.html">404</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link " data-bs-toggle="collapse" data-bs-target="#page" href="#">
                    <i class="icofont-page fs-5"></i> <span>Other Pages</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse " id="page">
                    <li><a class="ms-link " href="admin-profile.html">Profile Page</a></li>
                    <li><a class="ms-link " href="purchase-plan.html">Price Plan Example</a></li>
                    <li><a class="ms-link " href="charts.html">Charts Example</a></li>
                    <li><a class="ms-link " href="table.html">Table Example</a></li>
                    <li><a class="ms-link " href="forms.html">Forms Example</a></li>
                    <li><a class="ms-link " href="icon.html">Icons</a></li>
                    <li><a class="ms-link " href="contact.html">Contact Us</a></li>
                    <li><a class="ms-link " href="todo-list.html">Todo List</a></li>
                </ul>
            </li>

            <li><a class="m-link " href="documentation.html"><i class="icofont-law-document fs-5"></i>
                    <span>Documentation</span></a></li>
            <li><a class="m-link " href="changelog.html"><i class="icofont-edit fs-5"></i>
                    <span>Changelog</span> <span class="ms-auto small-14 fw-bold">v1.0.0</span></a></li> --}}
        </ul>

        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
