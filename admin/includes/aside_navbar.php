<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Brand Name</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?= $page == 'dashboard.php' ? 'active' : '' ?>">
            <a href="index.php?p=dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'category.php' ? 'active' : '' ?>">
            <a href="index.php?p=category" class="menu-link">
                <i class='menu-icon tf-icons bx bx-category'></i>
                <div data-i18n="Analytics">Category</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'brand.php' ? 'active' : '' ?>">
            <a href="index.php?p=brand" class="menu-link">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="Analytics">Brand</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'product.php' ? 'active' : '' ?>">
            <a href="index.php?p=products" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-component"></i>
                <div data-i18n="Analytics">Products</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'slideshow.php' ? 'active' : '' ?>">
            <a href="index.php?p=slideshow" class="menu-link">
                <i class="menu-icon tf-icons bx bx-slideshow"></i>
                <div data-i18n="Analytics">Slideshow</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'ads.php' ? 'active' : '' ?>">
            <a href="index.php?p=ads" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Analytics">Adverstise</div>
            </a>
        </li>
        <li class="menu-item <?= $page == 'contactus.php' ? 'active' : '' ?>">
            <a href="index.php?p=contactus" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Analytics">Page</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Configuration</span>
        </li>
        <li class="menu-item <?= $page == 'socialmedia.php' ? 'active' : '' ?>">
            <a href="index.php?p=socialmedia" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Account Settings">Social Media</div>
            </a>
        </li>
    </ul>
</aside>