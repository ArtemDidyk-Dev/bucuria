<x-layout>

    <?php $s = new Single('Продукты', 10, 1); ?>

    <div class="main">
        <div class="container mb">

            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs"/>
            </div>

            <div class="banner">
                <div class="baner-image">
                    <img src="{{ $s->field('Каталог', 'Банер', 'photo', false, '/photos/1/catalog-banner.png') }}"
                         alt="" class="banner-img">
                    <div class="gradient-banner"></div>
                </div>
                <div class="banner-content">
                    <h1 class="banner-title h2 color-white">
                        {{ $h1 }}
                    </h1>
                    <div class="banner-desc subtitle color-white">
                        {!! Field::enter_to_br(
                            $s->field(
                                'Каталог',
                                'Описание',
                                'textarea',
                                true,
                                'Give joy to yourself and your loved ones with our sweets. We have over 300 products to choose from.',
                            ),
                        ) !!}
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="content-catalog-block">
                    <x-cards.filter-categories :categories="$categories"/>
                </div>

                <div class="content-catalog-block">
                    <div id="filters" class="filter-block">
                        <x-catalog.filters :tastes="$tastes"
                                           :weights="$weights"
                                           :clearRoute="$clearRoute"
                                           :activeTastes="$activeTastes"
                                           :activeWeights="$activeWeights"
                                           weightsMin="{{$weightsMin}}"
                                           weightsMax="{{$weightsMax}}"
                                           activeCategory={{$activeCategory}}


                        />
                        <x-inputs.download href="{{$s->field('Каталог', 'Файл', 'photo', true)}}">
                            {{$s->field('Каталог', 'Текст кнопки', 'text', true, 'download catalog')}}
                        </x-inputs.download>
                    </div>

                    <div class="catalog-cards-block">

                        <button class="btn color-white btn-filter mobile" onclick="close_filter()">
                            <img src="/images/filter.svg" alt="" class="filter-img">
                            Filter
                        </button>

                        <div id="content-block">
                            <x-cards.card-items :items="$products"/>
                        </div>

                        <div id="pagination">
                            <x-inc.pagination :count="$count" :page="$page" :pagesize="$pagesize" :paglink="$paglink"
                                              :showmore="true"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="javascript">
        <script>
            initializeSlider()
            async function makeFilters(loader = true) {
                const clearRoute = document.querySelector('.filter').getAttribute('data-href');
                let href = document.location.href; // Використовуємо поточний URL, щоб зберігати всі активні параметри
                let url = new URL(href);
                let params = url.searchParams;
                // Обробляємо чекбокси фільтрів
                let filters = document.querySelectorAll('.filter-item-checkbox');
                filters.forEach(filter => {
                    let filter_fields = filter.querySelectorAll('input[name="filter-field"]:checked');

                    const filter_fields_values = [...filter_fields].map(element => {
                        return element.value;
                    }).join(',');

                    // Видаляємо попередні фільтри та додаємо нові значення
                    if (filter_fields_values) {
                        params.set(filter.dataset.id, filter_fields_values);
                    } else {
                        params.delete(filter.dataset.id);
                    }
                });

                // Обробляємо слайдери фільтрів
                let filters_sliders = document.querySelectorAll('.filter-item-slider');
                filters_sliders.forEach(slider => {
                    const minValue = slider.querySelector('input[name="min-value"]').value;
                    const maxValue = slider.querySelector('input[name="max-value"]').value;

                    // Додаємо мінімальне та максимальне значення як параметри, якщо вони задані
                    if (minValue || maxValue) {
                        params.set(slider.dataset.id + '_min', minValue);
                        params.set(slider.dataset.id + '_max', maxValue);
                    } else {
                        // Видаляємо параметри, якщо вони пусті
                        params.delete(slider.dataset.id + '_min');
                        params.delete(slider.dataset.id + '_max');
                    }
                });

                href = decodeURIComponent(url.toString());

                const response = await post(href, {}, true, loader);

                if (response.success) {
                    document.querySelector('#content-block').innerHTML = response.data.html;
                    document.querySelector('#pagination').innerHTML = response.data.pagination;
                    document.querySelector('#filters').innerHTML = response.data.filters;
                    initializeSlider()
                    history.pushState({}, '', href); // Оновлюємо історію браузера з новими параметрами

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    // checkLazy(); // Якщо у тебе є логіка для ленивого завантаження, активуй це
                }

                return false;
            }
            function initializeSlider() {
                const slider = document.getElementById('price-slider');
                if (slider) {
                    let min = +document.querySelector('[data-minprice]').value; // виправлено: 'data-minPrice' на 'data-minprice'
                    let max = +document.querySelector('[data-maxprice]').value; // виправлено: 'data-maxPrice' на 'data-maxprice'

                    let inputMin = document.querySelector('[data-minprice]');
                    let inputMax = document.querySelector('[data-maxprice]');
                    let tooltips = [document.createElement('span'), document.createElement('span')];

                    noUiSlider.create(slider, {
                        start: [min, max],
                        connect: true,
                        range: {
                            'min': min,
                            'max': max
                        }
                    });

                    slider.noUiSlider.on('update', function(values, handle) {
                        let minValue = parseInt(values[0]);
                        let maxValue = parseInt(values[1]);
                        inputMin.value = minValue;
                        inputMax.value = maxValue;
                        tooltips[handle].innerHTML = values[handle];
                        tooltips[handle].classList.add('nouislider-tooltip');
                        // оновлення круга
                        const circles = document.querySelectorAll(".noUi-touch-area");
                        circles[handle].innerHTML = `<span class="${handle === 0 ? 'min-circle' : 'max-circle'}">${handle === 0 ? minValue : maxValue}</span>`;
                    });

                    let minCountInput = min;
                    let maxCountInput = max;

                    inputMin.addEventListener("input", (e) => {
                        inputMin.setAttribute('value', e.target.value);
                        minCountInput = e.target.value;
                        slider.noUiSlider.set([minCountInput, maxCountInput]);
                    });

                    inputMax.addEventListener("input", (e) => {
                        inputMax.setAttribute('value', e.target.value);
                        maxCountInput = e.target.value;
                        setTimeout(() => {
                            slider.noUiSlider.set([minCountInput, maxCountInput]);
                        }, 1500);
                    });
                    let buttonShow = document.querySelector('.show.weights')
                    buttonShow.addEventListener('click', async () => {
                        let min = +document.querySelector('[data-minprice]').value;
                        let max = +document.querySelector('[data-maxprice]').value;
                        let href = document.location.href; // Використовуємо поточний URL, щоб зберігати всі активні параметри
                        let url = new URL(href);
                        let params = url.searchParams;
                        params.set('minWidth', min);
                        params.set('maxWidth', max);
                        href = decodeURIComponent(url.toString());
                        const response = await post(href, {}, true, loader);
                        if (response.success) {
                            document.querySelector('#content-block').innerHTML = response.data.html;
                            document.querySelector('#pagination').innerHTML = response.data.pagination;
                            document.querySelector('#filters').innerHTML = response.data.filters;
                            initializeSlider()
                            history.pushState({}, '', href);
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });

                            // checkLazy(); // Якщо у тебе є логіка для ленивого завантаження, активуй це
                        }
                    })
                }
            }

            function bindFilterClickEvents() {
                const filterItems = document.querySelectorAll(".filter-product-item");
                if (filterItems) {
                    filterItems.forEach(filter => {
                        filter.addEventListener('click', async (event) => {
                            event.preventDefault();

                            let link = window.location.href;
                            let categorySlug = filter.getAttribute('data-link');
                            let url = new URL(link);
                            const searchParams = url.searchParams;
                            let categories = [];
                            searchParams.forEach((value, key) => {
                                if (key.startsWith('category')) {
                                    categories.push(value);
                                }
                            });

                            if (!categories.includes(categorySlug)) {
                                categories.push(categorySlug);
                            } else {
                                categories = categories.filter(category => category !== categorySlug);
                            }
                            let taste = url.searchParams.getAll('taste');
                            let page = url.searchParams.getAll('page');
                            url = new URL("{{route('catalog')}}");

                            categories.forEach(category => {
                                url.searchParams.append('category[]', category);
                            });
                            if(taste.length > 0) {
                                url.searchParams.append('taste', taste.join());
                            }
                            if(page.length > 0) {
                                url.searchParams.append('page', page.join());
                            }
                            let href = decodeURIComponent(url.toString());

                            const response = await post(href, {}, true, true);
                            if (response.success) {
                                document.querySelector('#content-block').innerHTML = response.data.html;
                                document.querySelector('#pagination').innerHTML = response.data.pagination;
                                document.querySelector('#filters').innerHTML = response.data.filters;
                                document.querySelector('#categories').innerHTML = response.data.categories;
                                history.pushState({}, '', href); // Оновлюємо історію браузера з новими параметрами

                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                                bindFilterClickEvents();
                                initializeSlider();
                            }
                        });
                    });
                }
            }
            bindFilterClickEvents();
        </script>
    </x-slot>

    <x-slot name="meta_title">
        {{ $metaTitle }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $metaDescription }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $metaKeywords }}
    </x-slot>

</x-layout>

@desktopcss
<style>
    .show {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
        padding: 6px;
        border: none;
        border-radius: 8px;
        margin-top: 20px;
        background: var(--color-red);
        transition: .3s;
        text-transform: uppercase;
        font-family: Raleway;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px; /* 171.429% */
        text-transform: uppercase;

    }
    .breadcrumbs-block {
        margin-left: 80px;
        position: absolute;
        z-index: 2;
    }

    .filter-item-product {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        width: 100%;
        margin-bottom: 35px;
    }

    .filter-tag {
        display: flex;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .clear-filter {
        text-decoration: underline;
        margin-top: 20px;
        display: block;
    }

    .checkbox-count {
        margin-left: 20px;
    }

    .checkbox-image {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .checkbox-image-wrapper {
        border-radius: 50%;
        border: 2px solid transparent;
    }

    .checkbox-image-wrapper .containercheckbox {
        width: 48px;
        height: 48px;
        padding: 0;
    }

    .checkbox-image-wrapper.active {
        border: 2px solid var(--color-red);
    }

    .checkbox-image-wrapper .checkmark {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: none;
        background: transparent;
        border-radius: 50%;
    }

    .checkbox-image-wrapper.active .containercheckbox input:checked ~ .checkmark {
        background: var(--color-white);
        border: none;
    }

    .checkbox-image-wrapper.active .containercheckbox .checkmark:after {
        border-color: var(--color-red);
    }

    .panel-images {
        display: flex;
        flex-wrap: wrap;
    }

    .panel-images .checkbox-image-wrapper {
        margin-right: 8px;
        margin-bottom: 12px;
    }

    .panel-images .checkbox-image-wrapper:nth-child(4n) {
        margin-right: 0;
    }

    .tag-item {
        display: flex;
        padding: 5px 15px;
        justify-content: center;
        align-items: center;
        gap: 5px;
        border-radius: 100px;
        border: 1px solid var(--red, #C81317);
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .tag-item svg {
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }

    .catalog-cards-block .card-product {
        margin-left: 24px;
        flex-basis: calc(25% - 24px);
        margin-right: 0px !important;
    }

    /*.card-product:nth-child(4n) {*/
    /*    margin-right: 0;*/
    /*}*/

    .arrow-filter {
        display: block;
        position: absolute;
        right: 0;
        top: 20px;
        text-align: center;
        width: 14px;
        height: 14px;
        transition: .3s;
    }

    .filter {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        position: relative;
        width: 100%;
    }

    .filter-title {
        padding-bottom: 25px;
        width: 242px;
        border-bottom: 1px solid #D2D2D2;
    }

    .filter-item {
        display: block;
        position: relative;
        background-color: var(--color-white);
        cursor: pointer;
        width: 242px;
        padding: 18px 0 18px 0;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
        border-bottom: 1px solid #D2D2D2;
    }

    .filter-item.active .arrow-filter {
        transform: rotate(-90deg);
    }

    .accordion-btn {
        margin-bottom: 0;
        transition: .3s;
    }

    .filter-item.active .accordion-btn {
        margin-bottom: 12px;
    }

    .panel {
        background-color: white;
        overflow: auto;
        max-height: 0;
        transition: .3s;
    }

    .panel::-webkit-scrollbar {
        width: 3px;
    }

    .panel::-webkit-scrollbar-track {
        background: #E6E6E6;
    }

    .panel::-webkit-scrollbar-thumb {
        background: var(--color-red);
    }

    .filter-item.active .panel {
        max-height: 196px;
    }

    .small-card-section {
        display: flex;
        justify-content: flex-start;

    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .banner {
        display: block;
        height: 450px;
        position: relative;
        padding-top: 167px;
        margin-bottom: 50px;
    }

    .banner-img {
        display: block;
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;
        object-fit: cover;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .banner-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .content-catalog-block {
        display: flex;
        justify-content: flex-start;
        padding-left: 80px;
        padding-right: 80px;
    }

    .catalog-cards-block {
        margin-left: 50px;
    }

    .checkbox-image.hover-active {
        opacity: 0;
        position: absolute;
        top: -21px;
        z-index: 999;
        border-radius: 8px;
        left: 50%;
        transform: translate(-50%);
        transition: .3s;
    }

    .checkbox:nth-child(1) .checkbox-image.hover-active {
        top: 2px;
    }

    .checkbox:hover .checkbox-image.hover-active {
        opacity: 1;
    }

    .filters-input-prices {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 13px;
    }

    .input-wrapper-label {
        font-size: 15px;
        font-weight: 400;
        line-height: 20px;
        color: #747474;
        margin-bottom: 6px;
    }

    .input-wrapper {
        border: 1px solid #D9D9D9;
        border-radius: 8px;
        position: relative;
        display: flex;
    }

    .input-text {
        width: 100%;
        padding: 8px 15px;
        border: 0;
        border-radius: 8px;
    }

    .accordion-filters-box {
        padding-bottom: 18px;
    }

    .price-slider {
        margin-top: 62px;
    }

    .filters-box {
        max-height: 0;
        transition: .3s;
        opacity: 0;
    }

    .filters-box.active {
        max-height: 132px;
        opacity: 1;
    }

    .accordion-filters-box.active .arrow-filter {
        transform: rotate(-90deg);
    }
</style>
@mobilecss
<style>
    .show {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
        padding: 6px;
        border: none;
        border-radius: 8px;
        margin-top: 20px;
        background: var(--color-red);
        transition: .3s;
        text-transform: uppercase;
        font-family: Raleway;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px; /* 171.429% */
        text-transform: uppercase;

    }
    .banner {
        display: block;
        width: auto;
        height: 300px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        top: 0;
        left: 0;
        object-fit: cover;
        width: auto;
        height: 500px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        width: auto;
        height: 500px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        padding-top: 21px;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        margin-left: auto;
        z-index: 1;
        text-transform: uppercase;
    }

    .banner-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .breadcrumbs-block {
        z-index: 2;
    }

    .filter-item-product {
        display: flex;
        align-items: flex-start;
        width: 290px;
        margin-top: 150px;
        overflow-x: scroll;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        padding: 10px;
    }

    .filter-block {
        display: none;
    }

    .filter-block.active {
        display: block;
        position: fixed;
        top: 0;
        background: #fff;
        z-index: 1111;
        width: 100%;
        padding: 0 15px;
        height: var(--app-height);
        left: 0;
        right: 0;
        overflow: scroll;
        padding-bottom: 20px
    }

    .filter-img {
        width: 20px;
        height: 20px;
        object-fit: cover;
        margin-right: 12px;
    }

    .btn-filter {
        display: flex;
        justify-content: center;
        margin-bottom: 33px;
        width: 290px;
        border: none;
    }

    .filter-tag {
        display: flex;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .clear-filter {
        text-decoration: underline;
        margin-top: 20px;
        display: block;
    }

    .checkbox-count {
        margin-left: 20px;
    }

    .tag-item {
        display: flex;
        padding: 5px 15px;
        justify-content: center;
        align-items: center;
        gap: 5px;
        border-radius: 100px;
        border: 1px solid var(--red, #C81317);
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .tag-item svg {
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }

    .card-product:nth-child(4n) {
        margin-right: 0;
    }

    .arrow-filter {
        display: block;
        position: absolute;
        right: 0;
        top: 20px;
        text-align: center;
        width: 14px;
        height: 14px;
        transition: .3s;
    }

    .filter {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        position: relative;
        width: 290px;
    }

    .title-block {
        display: flex;
        justify-content: space-between;
    }

    .closefilter {
        margin-top: 10px;
    }

    .filter-title {
        padding-bottom: 25px;
        padding-top: 30px;
        width: 290px;
        border-bottom: 1px solid #D2D2D2;
    }

    .filter-item {
        display: block;
        position: relative;
        background-color: var(--color-white);
        cursor: pointer;
        width: 290px;
        padding: 18px 0 18px 0;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;

        border-bottom: 1px solid #D2D2D2;
    }

    .filter-item.active .arrow-filter {
        transform: rotate(-90deg);
    }

    .accordion-btn {
        margin-bottom: 0;
        transition: .3s;
    }

    .filter-item.active .accordion-btn {
        margin-bottom: 12px;
    }

    .panel {
        background-color: white;
        overflow: auto;
        max-height: 0;
        transition: .3s;
    }

    .panel::-webkit-scrollbar {
        width: 3px;
    }

    .panel::-webkit-scrollbar-track {
        background: #E6E6E6;
    }

    .panel::-webkit-scrollbar-thumb {
        background: var(--color-red);
    }

    .filter-item.active .panel {
        max-height: 196px;
    }

    .small-card-section {
        display: flex;
        justify-content: flex-start;

    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .content-catalog-block {
        display: flex;
        justify-content: flex-start;
        padding-left: var(--offset);
        padding-right: var(--offset);
    }

    .catalog-cards-block .card-product:nth-child(2n) {
        margin-right: 0;
    }

    .catalog-cards-block .btn {
        margin-top: 5px;
    }

    .checkbox-image {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .checkbox-image-wrapper {
        border-radius: 50%;
        border: 2px solid transparent;
    }

    .checkbox-image-wrapper .containercheckbox {
        width: 46px;
        height: 46px;
        padding: 0;
    }

    .checkbox-image-wrapper.active {
        border: 2px solid var(--color-red);
    }

    .checkbox-image-wrapper .checkmark {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: none;
        background: transparent;
        border-radius: 50%;
    }

    .checkbox-image-wrapper.active .containercheckbox input:checked ~ .checkmark {
        background: var(--color-white);
        border: none;
    }

    .checkbox-image-wrapper.active .containercheckbox .checkmark:after {
        border-color: var(--color-red);
    }

    .panel-images {
        display: flex;
        flex-wrap: wrap;
    }

    .panel-images .checkbox-image-wrapper {
        margin-right: 8px;
        margin-bottom: 12px;
    }

    .panel-images .checkbox-image-wrapper:nth-child(5n) {
        margin-right: 0;
    }

    .checkbox-image.hover-active {
        opacity: 0;
        position: absolute;
        top: -21px;
        z-index: 999;
        border-radius: 8px;
        left: 50%;
        transform: translate(-50%);
        transition: .3s;
    }

    .checkbox:nth-child(1) .checkbox-image.hover-active {
        top: 2px;
    }

    .checkbox:hover .checkbox-image.hover-active {
        opacity: 1;
    }

    .filters-input-prices {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 13px;
    }

    .input-wrapper-label {
        font-size: 15px;
        font-weight: 400;
        line-height: 20px;
        color: #747474;
        margin-bottom: 6px;
    }

    .input-wrapper {
        border: 1px solid #D9D9D9;
        border-radius: 8px;
        position: relative;
        display: flex;
    }

    .input-text {
        width: 100%;
        padding: 8px 15px;
        border: 0;
        border-radius: 8px;
    }

    .accordion-filters-box {
        padding-bottom: 18px;
    }

    .price-slider {
        margin-top: 52px;
        margin-left: 15px;
        margin-right: 15px;
    }

    .filters-box {
        max-height: 0;
        transition: .3s;
        opacity: 0;
    }

    .filters-box.active {
        max-height: 132px;
        opacity: 1;
    }

    .accordion-filters-box.active .arrow-filter {
        transform: rotate(-90deg);
    }
</style>
@endcss

@startjs
<script>

</script>
@endjs
