<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <div class="p-2">
            <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                <img width="180" height="35" src="{{asset(configData()->header_logo)}}" alt="">
            </a>
        </div>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms</span></li>
        <li
            class="menu-item {{ Request::is('admin/setting*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Setting">Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/setting/config') ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.config') }}" class="menu-link">
                        <div data-i18n="List">Config</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('admin/setting/agreement') ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.agreement') }}" class="menu-link">
                        <div data-i18n="List">Agreement</div>
                    </a>
                </li>
            </ul>
        </li>
        
        {{-- category --}}
        <li class="menu-item {{ Request::is('admin/category/list') ? 'active' : '' }}">
            <a href="{{ route('admin.category.list') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Category List">Category</div>
            </a>
        </li>

        {{-- post --}}
        <li
            class="menu-item {{ Request::is('admin/post*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Post">Post</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/post/add') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.add') }}" class="menu-link">
                        <div data-i18n="Add">Add</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('admin/post/list') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.list') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- contact --}}
        <li class="menu-item {{ Request::is('admin/contact/list') ? 'active' : '' }}">
            <a href="{{ route('admin.contact.list') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Contact List">Contact Us</div>
            </a>
        </li>

        {{-- visitor --}}
        <li class="menu-item {{ Request::is('admin/visitor/list') ? 'active' : '' }}">
            <a href="{{ route('admin.visitor.list') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Visitor List">Visitors</div>
            </a>
        </li>
    </ul>
</aside>
