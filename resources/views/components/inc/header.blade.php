<header class="header {{ $routeName != 'home' ? 'fixed' : '' }}" data-route="{{ $routeName }}">

    <div class="container header-main">
        <div class="header-inner">

            <div class="header-left desktop">
                {{-- <a href="{{ route('aboutus', false) }}" class="menu color-white">{{ $fields['about'] }}</a> --}}
                <div class="product-menu-block desktop">
                    <a href="{{ route('aboutus', false) }}" class="menu color-white">{{ $fields['about'] }}</a>
                    <div class="header-menu">
                        <div class="products-menu" id="about-menu">
                            @foreach ($fields['about_menu'] as $aboutMenuItem)
                                <a href="{{ Lang::link($aboutMenuItem[1]) }}" class="menu-item">
                                    <img src="{{ $aboutMenuItem[2] }}" class="menu-item-img">
                                    <div class="menu-item-title">{{ $aboutMenuItem[0] }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-menu-block desktop">
                    <a href="{{ route('catalog', false) }}"
                        class="menu color-white menu-products">{{ $fields['products'] }}</a>
                    <div class="header-menu">
                        <div class="card-arrow-left" onclick="prev_card('products-menu')"><img
                                src="/images/icons/left-arrow.png"></div>
                        <div class="card-arrow-right" onclick="next_card('products-menu')"><img
                                src="/images/icons/right-arrow.png"></div>
                        <div class="products-menu " id="products-menu">
                            @foreach ($categories as $category)
                                <a href="{{ route('catalog') . '?category[]=' . $category->slug }}" class="menu-item">
                                    <img src="{{ $category->image }}" class="menu-item-img">
                                    <div class="menu-item-title">{{ $category->title }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-menu-block desktop">
                    <a href="{{ route('findus', false) }}" class="menu color-white">{{ $fields['find'] }}</a>
                    <div class="header-menu">
                        <div class="products-menu" id="find-menu">
                            @foreach ($fields['find_menu'] as $findMenuItem)
                                <a href="{{ Lang::link($findMenuItem[1]) }}" class="menu-item">
                                    <img src="{{ $findMenuItem[2] }}" class="menu-item-img">
                                    <div class="menu-item-title">{{ $findMenuItem[0] }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-logo desktop">
                <a href="{{ route('home', [], false) }}">
                    <img width="114" height="58" src="/images/header-logo.svg" alt="" class="logo">
                </a>
            </div>

            <div class="header-right desktop">
                <div class="search search-block">

                    <form class="header-search" action="{{ route('search', [], false) }}">

                        <svg class="header-search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.8779 20.6996L16.0681 14.8897C17.17 13.5293 17.8334 11.7997 17.8334 9.9167C17.8334 5.55145 14.2819 2 9.91666 2C5.55141 2 2 5.55145 2 9.9167C2 14.2819 5.55145 17.8334 9.9167 17.8334C11.7997 17.8334 13.5293 17.17 14.8897 16.0681L20.6996 21.878C20.8623 22.0407 21.1261 22.0407 21.2889 21.878L21.878 21.2888C22.0407 21.1261 22.0407 20.8623 21.8779 20.6996ZM9.9167 16.1667C6.47024 16.1667 3.66668 13.3631 3.66668 9.9167C3.66668 6.47024 6.47024 3.66668 9.9167 3.66668C13.3631 3.66668 16.1667 6.47024 16.1667 9.9167C16.1667 13.3631 13.3631 16.1667 9.9167 16.1667Z"
                                fill="#1F1F1F" />
                        </svg>

                        <input type="text" class="header-search-input body-1" autocomplete="off" placeholder=""
                            required name="s"
                            oninput="searchInput(this, '{{ route('api-search', [], false) }}')">

                        <div class="search-items">
                            <x-inc.search-items />
                        </div>

                        <svg class="header-search-icon-close" width="16" height="16" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg" onclick="openSearch()">
                            <path
                                d="M8.75541 7.99974L14.698 2.05713C14.9072 1.84791 14.9072 1.50869 14.698 1.2995C14.4888 1.0903 14.1496 1.09027 13.9404 1.2995L7.99775 7.24211L2.05517 1.2995C1.84595 1.09027 1.50674 1.09027 1.29754 1.2995C1.08835 1.50872 1.08832 1.84793 1.29754 2.05713L7.24012 7.99972L1.29754 13.9423C1.08832 14.1516 1.08832 14.4908 1.29754 14.7C1.40214 14.8046 1.53926 14.8569 1.67637 14.8569C1.81349 14.8569 1.95058 14.8046 2.0552 14.7L7.99775 8.75738L13.9403 14.7C14.0449 14.8046 14.182 14.8569 14.3192 14.8569C14.4563 14.8569 14.5934 14.8046 14.698 14.7C14.9072 14.4907 14.9072 14.1515 14.698 13.9423L8.75541 7.99974Z"
                                fill="#1F1F1F" />
                        </svg>
                    </form>

                </div>

                <img src="/images/icons/search-icon.png" alt=""
                    class="header-icon header-icon-search header-item" onclick="openSearch()">

                @auth
                    <a href="{{ route('account', [], false) }}" class="header-icon header-item">
                        <img src="/images/icons/account-icon.png" alt=""
                            class="header-icon header-icon-account header-item">
                    </a>
                @else
                    <img src="/images/icons/account-icon.png" alt=""
                        class="header-icon header-icon-account header-item" onclick="open_modal('sign-in')">
                @endauth

                @foreach (Lang::getLangs() as $lang)
                    <a href="{{ Lang::getUrl($lang->tag) }}"
                        class="lang header-item color-white {{ $lang->tag == Lang::get() ? 'active' : '' }}">
                        {{ str_replace(['ru', 'ro', 'en'], ['RUS', 'ROM', 'ENG'], $lang->tag) }}
                    </a>
                @endforeach
            </div>

            <div class="header-mobile mobile">
                <a href="/"><img src="/images/header-logo.svg" alt="" class="logo"></a>

                <div class="right-block">
                    <div class="search search-block ">
                        <img src="/images/icons/search-red.svg" alt=""
                            class="header-icon header-icon-search  header-item" onclick="search_mobile()">


                        <div class="search-form ">
                            <form class="header-search" action="{{ route('search', [], false) }}">

                                <svg class="header-search-icon" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.8779 20.6996L16.0681 14.8897C17.17 13.5293 17.8334 11.7997 17.8334 9.9167C17.8334 5.55145 14.2819 2 9.91666 2C5.55141 2 2 5.55145 2 9.9167C2 14.2819 5.55145 17.8334 9.9167 17.8334C11.7997 17.8334 13.5293 17.17 14.8897 16.0681L20.6996 21.878C20.8623 22.0407 21.1261 22.0407 21.2889 21.878L21.878 21.2888C22.0407 21.1261 22.0407 20.8623 21.8779 20.6996ZM9.9167 16.1667C6.47024 16.1667 3.66668 13.3631 3.66668 9.9167C3.66668 6.47024 6.47024 3.66668 9.9167 3.66668C13.3631 3.66668 16.1667 6.47024 16.1667 9.9167C16.1667 13.3631 13.3631 16.1667 9.9167 16.1667Z"
                                        fill="#1F1F1F" />
                                </svg>

                                <input type="text" class="header-search-input body-1" autocomplete="off"
                                    placeholder="" required name="s"
                                    oninput="searchInput(this, '{{ route('api-search', [], false) }}')">

                                <div class="search-items">
                                    <x-inc.search-items />
                                </div>

                                <svg class="header-search-icon-close" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    onclick="search_mobile()">
                                    <path
                                        d="M8.75541 7.99974L14.698 2.05713C14.9072 1.84791 14.9072 1.50869 14.698 1.2995C14.4888 1.0903 14.1496 1.09027 13.9404 1.2995L7.99775 7.24211L2.05517 1.2995C1.84595 1.09027 1.50674 1.09027 1.29754 1.2995C1.08835 1.50872 1.08832 1.84793 1.29754 2.05713L7.24012 7.99972L1.29754 13.9423C1.08832 14.1516 1.08832 14.4908 1.29754 14.7C1.40214 14.8046 1.53926 14.8569 1.67637 14.8569C1.81349 14.8569 1.95058 14.8046 2.0552 14.7L7.99775 8.75738L13.9403 14.7C14.0449 14.8046 14.182 14.8569 14.3192 14.8569C14.4563 14.8569 14.5934 14.8046 14.698 14.7C14.9072 14.4907 14.9072 14.1515 14.698 13.9423L8.75541 7.99974Z"
                                        fill="#1F1F1F" />
                                </svg>
                            </form>
                        </div>

                    </div>
                    <div class="toggle" onclick="toggle_menu()" bis_skin_checked="1">
                        <div class="toggle-item" bis_skin_checked="1"></div>
                        <div class="toggle-item" bis_skin_checked="1"></div>
                        <div class="toggle-item" bis_skin_checked="1"></div>


                    </div>

                </div>

                <div class="mobile_toggle_menu">

                    <div class="header-icon-block">
                        @auth
                            <a href="{{ route('account', [], false) }}" class="header-icon header-item">
                                <img src="/images/icons/account-icon.png" alt=""
                                    class="header-icon header-icon-account header-item">
                            </a>
                        @else
                            <img src="/images/icons/account-icon.png" alt=""
                                class="header-icon header-icon-account header-item" onclick="open_modal('sign-in')">
                        @endauth
                    </div>

                    <div class="mobile-menu-link" onclick="about_menu()">
                        <a href="{{ route('aboutus', false) }}" class="mobile-link-text color-black">
                            {{ $fields['about'] }}
                        </a>
                        <img src="/images/next.svg" class="next-img" alt="">
                    </div>

                    <div class="mobile-menu-link" onclick="products_menu()">
                        <div class="mobile-link-text color-black">
                            {{ $fields['products'] }}
                        </div>
                        <img src="/images/next.svg" class="next-img" alt="">

                    </div>

                    <div class="mobile-menu-link" onclick="find_menu()">
                        <div class="mobile-link-text color-black">
                            {{ $fields['find'] }}
                        </div>
                        <img src="/images/next.svg" class="next-img" alt="">

                    </div>

                    <div class="mobile-lang">
                        @foreach (Lang::getLangs() as $lang)
                            <a href="{{ Lang::getUrl($lang->tag) }}"
                                class="lang header-item color-black {{ $lang->tag == Lang::get() ? 'active' : '' }}">
                                {{ str_replace(['ru', 'ro', 'en'], ['RUS', 'ROM', 'ENG'], $lang->tag) }}
                            </a>
                        @endforeach
                    </div>

                </div>

                <div class="mobile_toggle_menu_about">

                    <div class="h5 title-mobile-menu color-black">
                        {{ $fields['about'] }}
                    </div>

                    <div class="back-mob">
                        <img src="/images/back-mob.svg" alt="" class="back-mob-img">
                        <div class="extra-text color-grey" onclick="about_menu()">
                            Menu
                        </div>
                    </div>

                    <div class="products-menu " id="products-menu">
                        @foreach ($fields['about_menu'] as $aboutMenuItem)
                            <a href="{{ Lang::link($aboutMenuItem[1]) }}" class="menu-item">
                                <img src="{{ $aboutMenuItem[2] }}" class="menu-item-img">
                                <div class="menu-item-title">{{ $aboutMenuItem[0] }}</div>
                            </a>
                        @endforeach
                    </div>


                </div>

                <div class="mobile_toggle_menu_products">

                    <div class="h5 title-mobile-menu color-black">
                        {{ $fields['products'] }}
                    </div>

                    <div class="back-mob">
                        <img src="/images/back-mob.svg" alt="" class="back-mob-img">
                        <div class="extra-text color-grey" onclick="products_menu()">
                            Menu
                        </div>
                    </div>

                    <div class="products-menu" id="products-menu">
                        @foreach ($categories as $category)
                            <a href="{{ route('catalog', [$category->slug], false) }}" class="menu-item">
                                <img src="{{ $category->image }}" class="menu-item-img">
                                <div class="menu-item-title">{{ $category->title }}</div>
                            </a>
                        @endforeach
                    </div>


                </div>

                <div class="mobile_toggle_menu_find">

                    <div class="h5 title-mobile-menu color-black">
                        {{ $fields['find'] }}
                    </div>

                    <div class="back-mob">
                        <img src="/images/back-mob.svg" alt="" class="back-mob-img">
                        <div class="extra-text color-grey" onclick="find_menu()">
                            Menu
                        </div>
                    </div>

                    <div class="products-menu " id="products-menu">
                        @foreach ($fields['find_menu'] as $findMenuItem)
                            <a href="{{ Lang::link($findMenuItem[1]) }}" class="menu-item">
                                <img src="{{ $findMenuItem[2] }}" class="menu-item-img">
                                <div class="menu-item-title">{{ $findMenuItem[0] }}</div>
                            </a>
                        @endforeach
                    </div>


                </div>
            </div>

        </div>
    </div>
</header>

@desktopcss
<style>
    .search-items {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        width: 100%;
        padding: 20px;
        background: #FFFFFF;
        box-shadow: 0px 8px 16px 8px rgba(131, 131, 131, 0.15);
        transition: .5s;
        opacity: 0;
        pointer-events: none;
        visibility: hidden;
        margin-top: 15px;
    }

    .search-items.active {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
    }

    .search-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .search-item:last-child {
        margin-bottom: 0;
    }

    .search-item-title {
        font-size: 13px;
        font-family: "Istok Web", sans-serif ;
        font-style: normal;
        font-weight: 600;
        line-height: 18px;
        text-transform: uppercase;
    }

    .search-item:hover .search-item-title {
        text-decoration: underline;
    }

    .search-item-image {
        width: 68px;
        height: 55px;
        flex-shrink: 0;
        margin-right: 10px;
        object-fit: cover;
    }

    .search-btn {
        display: block;
        text-align: center;
    }

    .header {
        display: block;
        position: relative;
        z-index: 100;
        height: 158px;
        width: 100%;
        top: 0;
        margin: auto;
        height: 94px;
        transition: .3s;
    }

    .header-main {
        background: transparent;
        transition: .3s;
    }

    header:hover .header-main {
        background: var(--color-white);
    }

    header.fixed,
    header:hover {
        background: #fff;
        position: sticky;
        top: 0;
        width: 100%;
        height: 113px;
        z-index: 1001;
        box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.08);
    }

    header.fixed .menu,
    header:hover .menu {
        color: var(--color-black);
    }

    header.fixed .header-item,
    header:hover .header-item {
        color: var(--color-black);
    }

    header.fixed .header-icon-search,
    header:hover .header-icon-search {
        content: url('/images/icons/search-black.svg');
        width: 24px;
        height: 24px;
    }

    header.fixed .header-icon-account,
    header:hover .header-icon-account {
        content: url('/images/account-black-user.svg');
        width: 24px;
        height: 24px;
    }


    header.fixed .header-inner {
        padding-top: 21px;
        margin-bottom: 15px;
    }

    header.fixed .header-left {
        margin-top: 14px;
    }

    header.fixed .header-right {
        margin-top: 14px;
    }

    .header-inner {
        display: flex;
        justify-content: space-between;
        padding-top: 32px;
        padding-left: 80px;
        padding-right: 80px;
        margin-bottom: 30px;
        position: relative;
        z-index: 1;
    }

    .header-left {
        display: flex;
        justify-content: flex-start;
        margin-top: 26px;
    }

    .menu {
        width: auto;
        margin-right: 80px;
    }

    .menu:last-child {
        margin-right: 0;
    }

    .menu:hover {
        color: var(--color-red);
    }

    header.fixed .menu:hover {
        color: var(--color-red);
    }

    .header-logo {
        display: flex;
        justify-content: center;
        margin-right: 190px;

    }

    .logo {
        height: 82px;
        object-fit: cover;
        width: auto;
    }

    .header-right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-top: 26px;
        height: 24px;
    }

    .header-icon {
        object-fit: cover;
        cursor: pointer;
        width: 24px;
        height: 24px;
    }

    .header-item {
        margin-right: 28px;
    }

    .header-item:last-child {
        margin-right: 0;
    }

    .header-item:hover {
        text-decoration: underline;
    }

    .header-item.active {
        display: flex;
        padding: 1px 10px;
        align-items: flex-start;
        gap: 10px;
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.30);
    }

    header.fixed .header-item.active,
    header:hover .header-item.active {
        background: rgba(31, 31, 31, 0.08);
    }

    .header-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 120px;
        position: relative;
        z-index: 1;
    }

    .header-desc {
        display: flex;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .header-search-input {
        width: 365px;
        height: 35px;
        gap: 8px;
        padding: 10px 35px;
        border: none;
        border-bottom: 1px solid #000000;
        background: transparent;
    }

    .search.active {
        display: flex;
        justify-content: flex-start;
        position: absolute;
        z-index: 100;
        /* width: 385px; */
        background: transparent;
    }

    .header-search {
        display: none;
    }

    .search.active .header-search {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        /* width: 385px; */
        /* height: 24px; */
        border: none;
    }

    .header-search svg {
        width: 24px;
        height: 24px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .header-search-icon {
        left: 0;
    }

    .header-search-icon-close {
        right: 0;
        cursor: pointer;
    }

    .header-icon-search {
        width: 24px;
        height: 24px;
    }

    .header-search {
        display: none;
    }

    .card-arrow-right {
        display: block;
        position: absolute;
        top: 60px;
        right: 30px;
        z-index: 1;
        cursor: pointer;
        width: 45px;
        height: 45px;
        img {
            object-fit: cover;
            width: 100%;
        }
    }

    .card-arrow-left {
        display: block;
        position: absolute;
        top: 60px;
        left: 30px;
        z-index: 1;
        cursor: pointer;
        width: 45px;
        height: 45px;
        img {
            object-fit: cover;
            width: 100%;
        }
    }

    .header-menu {
        background: #fff;
        position: absolute;
        padding: 30px 80px 15px 80px;
        align-items: center;
        box-shadow: 0px 14px 16px 0px rgba(0, 0, 0, 0.08);
        top: 100%;
        left: 0;
        width: 100%;
        transition: .3s;
        opacity: 0;
        pointer-events: none;
        visibility: hidden;
    }

    .product-menu-block:hover .header-menu {
        opacity: 1;
        pointer-events: all;
        visibility: visible;
    }

    .product-menu-block {
        transition: .3s;
    }

    .menu-item-title {
        text-align: center;
        font-size: 13px;
        font-family: "Istok Web", sans-serif ;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        color: var(--color-black);
        padding-top: 5px;
        transition: .3s;
    }

    .menu-item {
        height: 110px;
        margin-top: 10px;
        margin-bottom: 10px;
        transition: .3s;
        min-width: calc(100% / 10);
    }

    .menu-item:hover {
        min-width: 150px;
        height: 120px;
        margin-right: 20px;
        /* margin-top: 0; */
        margin-bottom: 0;
        color: var(--color-red);
    }

    .menu-item:hover .menu-item-title {
        color: var(--color-red);
    }


    .menu-item-img {
        width: 110px;
        height: 80px;
        transition: .3s;
        border-radius: 8px;
    }

    .menu-item:hover .menu-item-img {
        width: 150px;
        height: 100px;
    }

    .products-menu {
        position: relative;
        display: flex;
        justify-content: flex-start;
        width: 100%;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        transition: .3s;
        gap: 13px;
    }

    .menu {
        transition: .3s;
    }

    .product-menu-block:hover .menu {
        color: var(--color-red) !important;
    }

    #products-menu {
        scroll-behavior: smooth;
        cursor: grab;
    }
    #products-menu:hover {
        cursor: grabbing;
    }
</style>
@mobilecss
<style>
    .header {
        display: block;
        position: absolute;
        z-index: 100;
        width: 100%;
        top: 0;
        margin: auto;
        height: 94px;
    }

    .header-mobile {
        display: flex;
        justify-content: space-between;

    }

    .header-mobile.active {
        display: flex;
        justify-content: space-between;
        position: absolute;
        left: 0;
        top: 0;
        background: var(--color-white);
        width: 100%;
        height: 100%;
        padding-left: var(--offset);
        padding-right: var(--offset);
    }

    .mobile_toggle_menu_products {
        display: none;
    }

    .header-mobile.active .mobile_toggle_menu_products.active {
        display: block;
        display: flex;
        flex-direction: column;
        height: auto;
        width: 100%;
        position: absolute;
        left: 0;
        top: 90px;
        padding-left: var(--offset);
        padding-right: var(--offset);
        padding-bottom: 25px;
        background: var(--color-white);
    }

    .mobile_toggle_menu_find {
        display: none;
    }

    .header-mobile.active .mobile_toggle_menu_find.active {
        display: block;
        display: flex;
        flex-direction: column;
        height: auto;
        width: 100%;
        position: absolute;
        left: 0;
        top: 90px;
        padding-left: var(--offset);
        padding-right: var(--offset);
        padding-bottom: 25px;
        background: var(--color-white);
    }

    .mobile_toggle_menu_about {
        display: none;
    }

    .header-mobile.active .mobile_toggle_menu_about.active {
        display: block;
        display: flex;
        flex-direction: column;
        height: auto;
        width: 100%;
        position: absolute;
        left: 0;
        top: 90px;
        padding-left: var(--offset);
        padding-right: var(--offset);
        padding-bottom: 25px;
        background: var(--color-white);
    }

    .title-mobile-menu {
        margin-top: 15px;
    }

    .mobile-link-text {
        font-family: "Istok Web", sans-serif ;
        font-size: 13px;
        font-style: normal;
        font-weight: 700;
        line-height: 19px;
        text-transform: uppercase;
    }

    .mobile_toggle_menu {
        display: none;
    }

    .header-mobile.active .mobile_toggle_menu.active {
        display: flex;
        flex-direction: column;
        height: auto;
        width: 100%;
        position: absolute;
        left: 0;
        top: 90px;
        padding-left: var(--offset);
        padding-right: var(--offset);
        padding-bottom: 25px;
        background: var(--color-white);
    }

    .next-img {
        width: 12px;
        height: 12px;
        object-fit: cover;
    }

    .back-mob {
        display: flex;
        justify-content: flex-start;
        margin-top: 10px;
    }

    .back-mob-img {
        width: 10px;
        height: 10px;
        margin-right: 10px;
        margin-top: 8px;
    }

    .mobile-menu-link {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }

    .logo {
        width: 100px;
        height: 51px;
        margin-top: 15px;
        flex-shrink: 0;
        object-fit: cover;
    }

    .right-block {
        display: flex;
        padding: 10px 20px;
        align-items: center;
        margin-top: 15px;
        border-radius: 50px;
        background: var(--white, #FFF);
    }

    .header-mobile.active .right-block {
        display: flex;
        margin-top: 0;
        padding-top: 0;
        align-items: center;
        border-radius: 50px;
        background: var(--white, #FFF);
    }

    .toggle {
        cursor: pointer;
        width: 25px;
        height: 27px;
        transition: .3s;
    }

    .toggle-item {
        width: 25px;
        height: 1.5px;
        background: var(--color-red);
        border-radius: 2px;
        margin: 6px 0;
        transition: .3s;
    }

    header.active .toggle {
        padding-top: 8px;
    }

    header.active .toggle-item:nth-child(1) {
        transform: rotate(45deg);
        margin-bottom: -2px;
    }

    header.active .toggle-item:nth-child(2) {
        opacity: 0;
        visibility: hidden;
        margin: 0;
        height: 0;
    }

    header.active .toggle-item:nth-child(3) {
        transform: rotate(-45deg);
        margin-top: -2px;
    }

    .header-search-input {
        width: 100%;
        height: 35px;
        gap: 8px;
        padding: 24px 45px;
        border: none;
        border-bottom: 1px solid #000000;
        background: transparent;
    }

    .search {
        display: flex;
        justify-content: flex-start;

        z-index: 100;
        /* width: 385px; */
        background: transparent;
    }

    .search-form.active {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 1;
        background: #fff;
        height: 100px;
        width: 100%;
    }

    .search-form {
        display: none;
    }

    .header-search {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        /* width: 385px; */
        /* height: 24px; */
        border: none;
    }

    .header-search svg {
        width: 15px;
        height: 15px;
        position: absolute;
        margin-top: 15px;
    }

    .header-search-icon {
        left: 15px;
    }

    .header-search-icon-close {
        right: 15px;
        cursor: pointer;
    }

    .header-icon-search {
        width: 25px;
        height: 25px;
    }

    .search-items {
        background: #fff;
        display: flex;
        justify-content: center;
        text-align: center;
        width: 100%;
        padding: 30px 15px;
    }

    .search-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .search-item:last-child {
        margin-bottom: 0;
    }

    .search-item-title {
        font-size: 13px;
        font-family: "Istok Web", sans-serif ;
        font-style: normal;
        font-weight: 600;
        line-height: 18px;
        text-transform: uppercase;
    }

    .search-item:hover .search-item-title {
        text-decoration: underline;
    }

    .search-item-image {
        width: 68px;
        height: 55px;
        flex-shrink: 0;
        margin-right: 10px;
        object-fit: cover;
    }

    .mobile-lang {
        display: flex;
        justify-content: flex-start;
        margin-top: 100px;
    }

    .header-item {
        margin-right: 23px;
    }

    .header-item:last-child {
        margin-right: 0;
    }

    .header-item:hover {
        text-decoration: underline;
    }

    .header-item.active {
        display: flex;
        padding: 1px 10px;
        align-items: flex-start;
        gap: 10px;
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.30);
    }

    header.fixed .header-item.active,
    header:hover .header-item.active {
        background: rgba(31, 31, 31, 0.08);
    }

    .header-icon {
        object-fit: cover;
        cursor: pointer;
        width: 24px;
        height: 24px;
    }

    header.fixed .header-icon-account,
    header:hover .header-icon-account {
        content: url('/images/account-black-user.svg');
        width: 24px;
        height: 24px;
    }

    .header-icon-block {
        margin-top: 15px;
        padding-bottom: 25px;
        border: none;
        border-bottom: solid 1px #E4E4E4;
        ;
    }

    .products-menu {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        margin-top: 25px;
    }

    .menu-item-title {
        text-align: center;
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: 18px;
        color: var(--color-black);
        padding-top: 5px;
    }

    .menu-item {
        margin-right: 10px;
        margin-top: 8px;
        margin-bottom: 8px;
    }

    .menu-item:nth-child(3n) {
        margin-right: 0;
    }

    .menu-item-img {
        width: 90px;
        height: 65px;
        border-radius: 8px;
    }

    .button-small-2 {
        text-decoration: underline;
    }
</style>
@endcss

@startjs
<script>
    if ($('header[data-route="home"]').length) {

        var header = $("header"),
            introH = $("header").height(),
            scrollOffset = $(window).scrollY

        checkScroll(scrollOffset)

        $(window).on("scroll", function() {

            scrollOffset = this.scrollY
            checkScroll(scrollOffset)
        });

        function checkScroll(scrollOffset) {

            if (scrollOffset >= introH) {

                header.addClass("fixed")
            } else {

                header.removeClass("fixed")
            }
        }
    }

    function openSearch() {
        document.querySelector('.search').classList.toggle('active')
        if (document.querySelector('.search').classList.contains('active')) {
            document.querySelectorAll('.header-item').forEach(element => {
                element.style.opacity = 0;
                element.style.poinerEvents = 'none';
            });
        } else {
            document.querySelectorAll('.header-item').forEach(element => {
                element.style.opacity = 1;
                element.style.poinerEvents = 'all';
            });
        }
    }

    function toggle_menu() {
        document.querySelector('.header').classList.toggle('active')
        document.querySelector('.header-mobile').classList.toggle('active')
        document.querySelector('.mobile_toggle_menu').classList.toggle('active')
    }

    function products_menu() {
        document.querySelector('.mobile_toggle_menu').classList.toggle('active')
        document.querySelector('.mobile_toggle_menu_products').classList.toggle('active')
    }

    function find_menu() {
        document.querySelector('.mobile_toggle_menu').classList.toggle('active')
        document.querySelector('.mobile_toggle_menu_find').classList.toggle('active')

    }

    function about_menu() {
        document.querySelector('.mobile_toggle_menu').classList.toggle('active')
        document.querySelector('.mobile_toggle_menu_about').classList.toggle('active')
    }


    async function searchInput(input, route) {

        const value = input.value

        if (!value) {
            document.querySelector('.search-items').classList.remove('active')
            return
        }

        const response = await post(route, {
            value
        }, true, false)

        if (response.success) {
            input.closest('.header-search').querySelector('.search-items').innerHTML = response.data.search_items
            document.querySelector('.search-items').classList.add('active')
        } else {

        }
    }
</script>
@endjs
