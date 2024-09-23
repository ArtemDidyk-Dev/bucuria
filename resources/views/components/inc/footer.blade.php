<footer class="footer-block">
    <div class="container">
        <div class="footer-inner">

            <div class="footer-logo-section">
                <a href="{{ route('home', [], false) }}">
                    <img src="/images/header-logo.png" alt="" class="footer-logo">
                </a>
                <div class="copyright cookie color-grey">
                    2017-{{ date('Y') }} © All rights reserved <br>
                    АО «Bucuria»
                </div>
            </div>

            <div class="footer-right-section"></div>

            <div class="footer-column">
                <div class="footer-title color-black">{{ $fields['col1_title'] }}</div>
                @foreach ($fields['col1'] as $item)
                    <a href="{{ Lang::link($item[1]) }}"
                        class="footer-list-item footer color-black">{{ $item[0] }}</a>
                @endforeach
            </div>


            <div class="footer-column ">
                <div class="footer-title color-black">{{ $fields['col2_title'] }}</div>
                @foreach ($fields['col2'] as $item)
                    <a href="{{ Lang::link($item[1]) }}"
                        class="footer-list-item footer color-black">{{ $item[0] }}</a>
                @endforeach
            </div>

            <div class="footer-column contacts-footer-section">
                <div class="footer-title color-black">{{ $fields['col3_title'] }}</div>
                <a href="tel:{{ Field::phone($fields['phone']) }}"
                    class="footer-list-item footer color-black">{{ $fields['phone'] }}</a>
                <a href="mailto:{{ $fields['email'] }}"
                    class="footer-list-item footer color-black">{{ $fields['email'] }}</a>
                <div class="footer-list-item footer color-black">{{ $fields['address'] }}</div>

                <div class="footer-social">
                    @foreach ($fields['social'] as $socialItem)
                        <a href="{{ $socialItem[1] }}" target="_blank">
                            <img src="{{ $socialItem[0] }}" alt=""
                                class="footer-social-img footer-icon-instagram">
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
</footer>

<x-modals.create-account />
<x-modals.sign-in />
<x-modals.password-recovery />
<x-modals.registration-loyalty />
<x-modals.loyalty-error />
<x-modals.loyalty-success />

<div id="loader">
    <svg width="40" height="40" viewBox="0 0 50 50">
        <path fill="#black"
            d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
            <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25"
                dur="0.6s" repeatCount="indefinite" />
        </path>
    </svg>
</div>

@desktopcss
<style>
    .footer-block {
        width: 100%;
        padding: 50px 80px;
        background: var(--color-white);
        border: none;
        border-top: 1px solid #E2E2E2;
    }

    .footer-inner {
        display: flex;
        justify-content: flex-start;
    }

    .footer-right-section {
        display: flex;
        justify-content: flex-start;
        margin-left: 258px;
    }

    .footer-title {
        margin-bottom: 10px;
    }

    .footer-column {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        margin-right: 130px;
    }

    .footer-column:last-child {
        margin-right: 0;
    }

    .footer-list-item {
        margin-bottom: 6px;
    }

    .footer-list-item:hover {
        text-decoration: underline;
    }

    .footer-list-item:last-child {
        margin-bottom: 0;
    }

    .footer-logo-section {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
    }

    .logo {
        object-fit: cover;
    }

    .copyright {
        margin-top: 20px;
    }

    .contacts-footer-section {
        width: 194px;
    }

    .footer-social {
        display: flex;
        justify-content: flex-start;
        margin-top: 25px;
    }

    .footer-social-img {
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }
</style>
@mobilecss
<style>
    .footer-block {
        width: 100%;
        background: var(--color-white);
        padding-top: 40px;
        padding-bottom: 20px;
        border: none;
        border-top: 1px solid #E2E2E2;
    }

    .footer-inner {
        display: flex;
        flex-direction: column;
    }

    .footer-right-section {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        margin-left: 258px;
    }

    .footer-title {
        margin-top: 30px;
        margin-bottom: 10px;
    }

    .footer-column {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        margin-right: 130px;
    }

    .footer-column:last-child {
        margin-right: 0;
    }

    .footer-list-item {
        margin-bottom: 6px;
    }

    .footer-list-item:hover {
        text-decoration: underline;
    }

    .footer-list-item:last-child {
        margin-bottom: 0;
    }

    .footer-logo-section {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
    }

    .footer-logo {
        width: 105px;
        height: 61px;
        object-fit: contain;
    }

    .copyright {
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .contacts-footer-section {
        width: 194px;
    }

    .footer-social {
        display: flex;
        justify-content: flex-start;
        margin-top: 25px;
    }

    .footer-social-img {
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }

    .footer-icon-instagram:hover {
        transition: .3s;
        content: url('/images/icons/footer-instagram-red.svg')
    }

    .footer-icon-youtube:hover {
        transition: .3s;
        content: url('/images/icons/footer-youtube-red.svg')
    }

    .footer-icon-facebook:hover {
        transition: .3s;
        content: url('/images/icons/footer-facebook-red.svg')
    }
</style>
@endcss


@startjs('0')

<script>
    function toggleFilter(elm) {
        elm.classList.toggle('active')
    }

    function prev_card_block(id) {
        var el = document.getElementById(id).querySelector('.slider-img');
        var elMargin = parseInt(window.getComputedStyle(el, null).marginRight);
        var elWidth = parseInt(el.offsetWidth);
        document.getElementById(id).scrollLeft -= elWidth + elMargin;
    }

    function next_card_block(id) {

        var el = document.getElementById(id).querySelector('.slider-img');
        var elMarginRight = parseInt(window.getComputedStyle(el, null).marginRight);
        var elWidth = parseInt(el.offsetWidth);
        document.getElementById(id).scrollLeft += elWidth + elMarginRight;
    }

    function prev_card(id) {
        var container = document.getElementById(id);
        if (container.scrollLeft > 0) {
            var el = container.querySelector('.menu-item');
            var elMargin = parseInt(window.getComputedStyle(el).marginRight);
            var elWidth = el.offsetWidth;
            container.scrollLeft -= elWidth + elMargin;
        }
    }

    function next_card(id) {
        var container = document.getElementById(id);
        var el = container.querySelector('.menu-item');
        var elMarginRight = parseInt(window.getComputedStyle(el).marginRight);
        var elWidth = el.offsetWidth;
        var maxScrollLeft = container.scrollWidth - container.clientWidth;
        var remainingScroll = maxScrollLeft - container.scrollLeft;

        if (remainingScroll >= elWidth + elMarginRight) {
            container.scrollLeft += elWidth + elMarginRight;
        } else {
            container.scrollLeft = maxScrollLeft;
        }
    }


    // document.addEventListener('DOMContentLoaded', function(){

    // lazy load START
    /**
     * Usage: <img srcset="/images/lazy.svg" src="/images/original.png" alt="">
     */
    function check_lazy() {
        for (var i = lazy_imgs.length - 1; i >= 0; i--) {
            var img = lazy_imgs[i]
            if (img.srcset == '/images/lazy.svg' && img.getBoundingClientRect().top - 100 < window.innerHeight) {
                (function(img) {
                    img.onload = () => {
                        img.removeAttribute('srcset')
                    }
                })(img)
                img.srcset = img.src
            }
        }
    }
    var lazy_imgs = []
    window.addEventListener('DOMContentLoaded', () => {
        lazy_imgs = Array.prototype.slice.call(document.querySelectorAll('img[srcset]'))
        setTimeout(() => {
            check_lazy()
        }, 200)
    })
    window.addEventListener('scroll', () => {
        check_lazy()
    })
    // lazy load END


    function scrollIt(destination, duration = 500, easing = 'easeInOutCubic', callback) {

        const easings = {
            easeInOutCubic(t) {
                return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
            },
        };

        const start = window.scrollY;
        const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

        const documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement
            .clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
        const windowHeight = window.innerHeight || document.documentElement.clientHeight || document
            .getElementsByTagName('body')[0].clientHeight;
        const destinationOffset = typeof destination === 'number' ? destination : destination.offsetTop;
        const destinationOffsetToScroll = Math.round(documentHeight - destinationOffset < windowHeight ?
            documentHeight - windowHeight : destinationOffset);

        if ('requestAnimationFrame' in window === false) {
            window.scroll(0, destinationOffsetToScroll);
            if (callback) {
                callback();
            }
            return;
        }

        function scroll() {
            const now = 'now' in window.performance ? performance.now() : new Date().getTime();
            const time = Math.min(1, ((now - startTime) / duration));
            const timeFunction = easings[easing](time);
            window.scroll(0, Math.ceil((timeFunction * (destinationOffsetToScroll - start)) + start));

            if (Math.abs(window.scrollY - destinationOffsetToScroll) < 2) {
                if (callback) {
                    callback();
                }
                return;
            }

            requestAnimationFrame(scroll);
        }

        scroll();
    }


    // ajax request START
    let load_count = 0
    const loader = document.getElementById('loader')

    const serialize = function(obj, prefix) {
        var str = [],
            p;
        for (p in obj) {
            if (obj.hasOwnProperty(p)) {
                var k = prefix ? prefix + "[" + p + "]" : p,
                    v = obj[p];
                str.push((v !== null && typeof v === "object") ?
                    serialize(v, k) :
                    encodeURIComponent(k) + "=" + encodeURIComponent(v));
            }
        }
        return str.join("&");
    }

    const formdata = function(obj) {

        let formData = new FormData()

        for (const i in obj) {

            formData.append(i, obj[i])
        }

        return formData
    }

    async function post(endpoint, obj, is_file = false, is_loader = true) {

        try {

            if (is_loader && loader) {
                load_count++
                loader.classList.add('active')
                // document.dispatchEvent(new CustomEvent('loading', { 'detail': load_count }))
            }

            const url = endpoint

            let headers = {
                'Accept': 'application/json',
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }

            if (!is_file) {

                // headers['Content-Type'] = 'multipart/form-data'

                var response = await fetch(url, {
                    method: 'POST',
                    headers: headers,
                    body: obj
                })

            } else {

                headers['Content-Type'] = 'application/x-www-form-urlencoded'

                var response = await fetch(url, {
                    method: 'POST',
                    headers: headers,
                    body: serialize(obj)
                })
            }

            let json = []

            try {

                json = await response.json()

            } catch (error) {}

            if (is_loader && loader) {
                load_count--
                if (load_count == 0)
                    loader.classList.remove('active')
                // document.dispatchEvent(new CustomEvent('loading', { 'detail': load_count }))
            }

            if (!json.data) {
                return {
                    success: false,
                    message: "Fatal error",
                    data: json,
                }
            }

            return json

        } catch (error) {

            console.error(error)
        }

        return {
            success: false,
            message: "Fatal error",
            data: {}
        }
    }
    // ajax request END

    // })
</script>

<script>
    function resize() {
        document.body.style.setProperty('--width', document.body.clientWidth)
    }
    resize()
    window.addEventListener('resize', resize)

    const appHeight = () => {
        const doc = document.documentElement
        doc.style.setProperty('--app-height', `${window.innerHeight}px`)
    }
    appHeight()
    window.addEventListener('resize', appHeight)

    const Cart = new function() {

        this.add = async (id_product, count, attributes = '') => {

            is_checkout = window.location.href.indexOf("checkout") !== -1

            delivery = ''

            if (is_checkout) {
                delivery = $('input[name="delivery"]:checked').val()
            }

            const response = await post(lang + '/api/add-to-cart', {
                id_product: id_product,
                count: count,
                is_checkout: is_checkout,
                attributes: attributes,
                delivery: delivery,
            })

            if (!response.success) {
                alert('Ошибка')
                return
            }

            $('#mini-cart').html(response.data.minicart)
            $('.header-icons-circle').text(response.data.cart_count)
            $('#mini-cart-price').text(response.data.cart_total)

            if (!is_checkout)
                open_cart_modal();
            else {
                $('#checkout-cart').html(response.data.checkout_cart);
            }

            if (response.data.cart_total > 0) {
                $('#checkout-submit').css('display', 'flex')
                $('#cart-submit').css('display', 'flex')
            } else {
                $('#checkout-submit').css('display', 'none')
                $('#cart-submit').css('display', 'none')
            }

        }
    }

    const Saved = new function() {


        this.toggle = async (elm, id_product) => {

            const response = await post('/api/saved', {
                id_product: id_product,
            }, false, false)

            if (response.success) {
                if (response.data.status) {
                    elm.classList.add('active')
                } else {
                    elm.classList.remove('active')
                }
                if (elm.classList.contains('delete-wished-product') || elm.classList.contains(
                        'wished-clear')) {
                    location.reload();
                }
                return
            } else {
                open_error_modal()
            }

        }

        this.clear = async () => {
            const response = await post('/api/saved/clear', {})

            if (response.success) {
                location.reload();
            }
        }

    }

    window.addEventListener('load', function(event) {
        document.querySelector('body').setAttribute('id', '');
    });
</script>

<script>
    function open_modal(modal) {

        var elems = document.querySelectorAll(".modal");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active");
        });
        modal = '#modal-' + modal

        $('.form-answer').css('display', 'none')

        $(modal).addClass('active')

        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });

    }

    function close_modal() {
        $('.modal').removeClass('active');
    }

    $('.modal').on('click', function(e) {
        if (this == (e.target)) {
            close_modal()
        }
    })

    function close_modal2() {
        $('.modal2').removeClass('active');
    }

    function close_modal3() {
        $('.modal3').removeClass('active');
    }

    function close_modal4() {
        $('.modal4').removeClass('active');
    }

    function close_modal_loyalty() {
        $('.modal-loyalty').removeClass('active');
    }

    $('.modal').on('click', function(e) {
        if (this == (e.target)) {
            close_modal()
        }
    })

    function openTabs(evt, tabsId) {
        var i, x, tablinks;
        x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }
        document.getElementById(tabsId).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function openTab(tabsId, activeTab) {
        document.getElementById(tabsId).classList.toggle('active');
        document.getElementById(activeTab).classList.toggle('active');
    }
</script>

<script>
    const anchors = document.querySelectorAll('a[href*="#"]')

    for (let anchor of anchors) {


        anchor.addEventListener('click', function(e) {
            e.preventDefault()


            for (let anchorr of anchors) {
                anchorr.classList.remove('active')
                anchor.classList.add('active')
            }

            const blockID = anchor.getAttribute('href').substr(1)

            document.getElementById(blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
        })
    }

    const fileManager = document.querySelector('[js-file-manager]');

    class FileManager {
        static chipTemplate = (text, id) => {
            return `
        <span id="${id}" class="chip">
            <span class="chip__text">${text}</span>
        </span>
        `;
        }

        static generateId = () => {
            const randomId = (Math.random() * 0xFFFFFF << 0).toString(16);

            return `chip-${randomId}`;
        }

        constructor(containerElement) {
            this._containerElement = containerElement;
            this._fakeInput = this._containerElement.querySelector('[js-fake-file-input]');
            this._realInput = this._containerElement.querySelector('[js-real-file-input]');
            this._chipContainer = this._containerElement.querySelector('[js-chip-container]');
            this._noFile = this._containerElement.querySelector('[js-no-file]');
            this._removeFilesButton = this._containerElement.querySelector('[js-remove-files]');

            this._files = [];

            this._addEventListeners();
        }

        _addEventListeners = () => {
            this._fakeInput.addEventListener('click', this._handleFakeInputClick, false);
            this._realInput.addEventListener('change', this._handleRealInputChange, false);
            this._removeFilesButton.addEventListener('click', this._handleRemoveFilesButtonClick, false);
        }

        _handleFakeInputClick = () => {
            if (this._chipContainer.querySelectorAll('.chip').length > 0) {
                this._removeChips();
            }

            this._realInput.click();
        }

        _handleRealInputChange = (e) => {
            if (this._realInput.files.length > 0) {
                this._toggleNoFile();
                [...this._realInput.files].forEach(file => {
                    const name = file.name;
                    const id = FileManager.generateId();
                    const chipTemplate = FileManager.chipTemplate(name, id);

                    this._chipContainer.insertAdjacentHTML('beforeend', chipTemplate);

                    const chip = this._chipContainer.querySelector(`#${id}`);

                    const filesObj = {
                        name,
                        id,
                        chip
                    };

                    this._files.push(filesObj);
                })
            }
        }

        _handleRemoveFilesButtonClick = (e) => {
            if (this._realInput.files.length) {
                this._removeChips();
            }
        }

        _removeChips = () => {
            const chips = [...this._chipContainer.querySelectorAll('.chip')];
            this._toggleNoFile();
            this._files = [];
            this._chipContainer.innerHTML = '';
            this._realInput.value = '';
        }

        _toggleNoFile = () => {
            this._noFile.hidden = !this._noFile.hidden;
            this._removeFilesButton.hidden = !this._removeFilesButton.hidden;
        }
    }

    if (fileManager) {
        const fileManagerReference = new FileManager(fileManager);
    }

    function toggleDescription(elm) {
        document.querySelector('.product-card-desc').classList.toggle('active');
        elm.classList.toggle('active');
    }

    function close_filter() {
        document.querySelector('.filter-block').classList.toggle('active');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    }

    function search_mobile() {
        document.querySelector('.search-form').classList.toggle('active')
    }
    document.addEventListener('DOMContentLoaded', function () {
        const banner = document.querySelector('.banner');
        console.log(banner)
        setTimeout(() => {
            banner.classList.add('show');
        }, 100);  // Невелика затримка перед активацією
    });
</script>

@endjs

{!! JSAssembler::get() !!}
