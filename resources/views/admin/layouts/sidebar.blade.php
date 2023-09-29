<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bold ms-2">Lara Ecom</span>
        </a>

        <a href="javascript:void(0);" class="layout-  menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="{{ route('admindashboard') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="{{ route('addcategory') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Add Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('allcategory') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">All Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('addsubcategory') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="eCommerce">Add Sub Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('allsubcategory') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Logistics">All Sub Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('addproduct') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Academy">Add Product</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('allproducts') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Academy">All Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('pendingorder') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Academy">Pending Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('completeorders') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Academy">Completed Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('cancelledorders') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Academy">Canceled Orders</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
