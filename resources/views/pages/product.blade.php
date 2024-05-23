<x-layout>

    <?php $s = new Single('Продукты', 10, 1); ?>


    <div class="container main">
        <div class="breadcrumbs-block">
            <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                [
                    'title' => $s->field('Хлебные крошки', 'Текст:', 'text', true, 'Catalog'),
                    'link' => route('catalog', [], false),
                ],
                [
                    'title' => $offer->product->category->title,
                    'link' => route('catalog', $offer->product->category->slug, false),
                ],
                [
                    'title' => $offer->title,
                    'link' => '',
                ],
            ]" />
        </div>

        <div class="main-slider-wrapper">
            <div class="main-slider">
                @foreach ($offer->product->category->banners as $banner)
                    <div class="main-slide">
                        <div class="container main-slide-container">
                            <div class="main-slide-grad"></div>
                            <div class="desktop">
                                <img src="{{ $banner->banner }}" alt="" class="main-slide-img">
                            </div>
                            <div class="mobile">
                                <img src="{{ $banner->banner_mobile }}" alt="" class="main-slide-img">
                            </div>
                            <div class="main-slide-content">
                                <div class="banner-title h3 color-white">
                                    {{ $banner->title }}
                                </div>
                                <div class="banner-desc subtitle color-white">
                                    {!! $banner->description !!}
                                </div>
                                <x-inputs.button :href="Lang::link($banner->btn_link)">
                                    {{ $banner->btn_text }}
                                </x-inputs.button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            $('.main-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                arrows: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 4000,
                prevArrow: '.main-slider-wrapper .arrow-prev',
                nextArrow: '.main-slider-wrapper .arrow-next',
            })
        </script>

        <div class="container">
            <div class="product-content">
                <div class="product-image-block">
                    <img src="{{ $offer->image }}" class="product-image">
                </div>

                <div class="product-content-desc">
                    <div class="product-title color-black h4">{{ $offer->title }}</div>

                    @if (!empty($offer->description))
                        <div class="product-description-title footer-title color-black">
                            {{ $s->field('Описание', 'Текст:', 'text', true, 'Description:') }}
                        </div>
                        <div class="extra-text product-description color-black">{{ $offer->description }}</div>
                    @endif

                    @if (count($tastes) > 0)
                        <div class="product-catalog-content-title color-black footer-title">
                            {{ $s->field('Вкус', 'Текст:', 'text', true, 'Taste:') }}
                        </div>

                        <div class="product-catalog">
                            @foreach ($tastes as $taste)
                                @if ($taste)
                                <a
                                    href="{{ !empty($taste->offer) ? route('product', [$taste->offer->slug], false) : route('product', [$offer->slug], false) }}">
                                    <x-cards.product-catalog-item :title="$taste->title" :active="$taste->active"
                                        :image="$taste->image" />
                                </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if (count($weights) > 0)
                        <div class="product-weight-title color-black footer-title">
                            {{ $s->field('Вес', 'Текст:', 'text', true, 'The weight:') }}
                        </div>

                        <div class="product-weight-block">

                            @foreach ($weights as $weight)
                                @if ($weight)
                                <a
                                    href="{{ !empty($weight->offer) ? route('product', [$weight->offer->slug], false) : route('product', [$offer->slug], false) }}">
                                    <x-cards.product-weight-item :title="$weight->title" :active="$weight->active" />
                                </a>
                                @endif
                            @endforeach

                        </div>
                    @endif

                    @if (!empty($offer->before_date))
                        <div class="product-weight-title color-black footer-title">
                            {{ $s->field('Срок годности', 'Текст', 'text', true, 'Shelf life:') }}
                        </div>

                        <div class="product-weight-block">
                            <div class="extra-text color-black">{{ $offer->before_date }}</div>
                        </div>
                    @endif

                    @if (!empty($offer->warning))
                        <div class="warning">
                            <div class="warning-title button-normal color-red">
                                {{ $s->field('Предупреждение', 'Текст', 'text', true, 'Be careful!') }}</div>
                            <div class="extra-text color-black">{{ $offer->warning }}</div>
                        </div>
                    @endif

                    <div class="product-features-title h5 color-black active" onclick="toggleDescription(this)">
                        {{ $s->field('Особенности продукта', 'Текст:', 'text', true, 'Product features') }}
                        <img src="/images/icons/arrow.svg" class="product-arrow">
                    </div>
                </div>

            </div>
            <div class="product-card-desc active">
                <div class="product-card-desc-content">

                    <div class="product-card-content-title color-black button-small">
                        {{ $s->field('Энергетическая ценность продукта (на 100 г):', 'Текст:', 'text', true, 'Energy value of the product (per 100 g):') }}
                    </div>

                    <div class="product-card-energy">
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Калорийность', 'text', true, 'Caloric content') }}"
                            value="{{ $offer->caloric_content }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Белки', 'text', true, 'Squirrels') }}"
                            value="{{ $offer->squirrels }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Жиры', 'text', true, 'Fats') }}"
                            value="{{ $offer->fats }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Насыщенные жирные кислоты', 'text', true, 'Saturated fatty acids') }}"
                            value="{{ $offer->saturated_fatty_acids }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Углеводы', 'text', true, 'Carbohydrates') }}"
                            value="{{ $offer->carbohydrates }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Сахар', 'text', true, 'Sugar') }}"
                            value="{{ $offer->sugar }}" />
                    </div>
                </div>
                <div class="product-card-desc-content">
                    <div class="product-card-content-title color-black button-small">
                        {{ $s->field('Состав продукта:', 'Текст:', 'text', true, 'Product composition:') }}
                    </div>

                    <div class="product-card-content product-card-content-scroll">
                        @if($offer->weight)
                            <x-cards.product-card-content-item
                                title="{{ $s->field('Особенности продукта', 'Вес', 'text', true, 'Weight') }}"
                                value="{{ $offer->weight->title }}" />
                        @endif
                        @if($offer->taste)
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Вкус', 'text', true, 'Taste') }}"
                            value="{{ $offer->taste->title }}" />
                        @endif
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Состав', 'text', true, 'Compound') }}"
                            value="{{ $offer->compound }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Вес коробки, кг', 'text', true, 'Box weight, kg') }}"
                            value="{{ $offer->weight_box }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Количество в коробке, кг/шт.', 'text', true, 'Quantity in a box, kg/pc.') }}"
                            value="{{ $offer->quantity_box }}" />
                        <x-cards.product-card-content-item
                            title="{{ $s->field('Особенности продукта', 'Использовать до', 'text', true, 'Best before date') }}"
                            value="{{ $offer->before_date }}" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container main">
            <x-cards.ingradient-big-card
                title="{{ $s->field('Блок 1', 'Заголовок', 'text', true, 'We use the finest selection of ingredients to create our products that are a combination of tradition and modernism') }} "
                description="{!! $s->field(
                    'Блок 1',
                    'Описание',
                    'ckeditor',
                    true,
                    'Sweets are produced from prepared semi-finished products - candy masses, icing, finishing materials. From the candy masses, candy bodies are first made, which are then glazed or subjected to other processing. Methods for obtaining cases are different depending on the structural and mechanical properties of the candy masses.
                                                                                                                                                                                                                                    The main types of raw materials for the production of sweets are:',
                ) !!}" />
        </div>

        <div class="container main">
            <x-cards.big-image-card :image="$s->field('Блок 1', 'Фото', 'photo', false, '/images/product-1.png')" />
        </div>

        <div class="container main">
            <x-cards.big-image-card
                title="{{ $s->field('Блок 2','Заголовок','text',true,'We have over 300 products in our range!') }} "
                description="{{ $s->field('Блок 2', 'Описание', 'text', true, 'You will 100% find something for yourself from the abundance of sweets') }}"
                :image="$s->field('Блок 2', 'Фото', 'photo', false, '/images/image-card3.png')" link="{{ $s->field('Блок 2', 'Ссылка', 'text', true, '/catalog') }} " 
                center 
                :btn-text="$s->field('Блок 2','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Блок 2','Кнопка ссылка','text',false,'/catalog')"
                gradient 
            />
        </div>

        <div class="container main">
            <x-cards.big-image-card :image="$s->field('Блок 2', 'Фото #2', 'photo', false, '/images/product-2.png')" />
        </div>

        <div class="container main">
            <x-cards.big-image-card
                title="{{ $s->field('Блок 3','Заголовок','text',true,'Learn more about our company') }}"
                link="{{ $s->field('Блок 3', 'Ссылка', 'text', true, '/aboutus') }} " 
                :image="$s->field('Блок 3', 'Фото', 'photo', false, '/images/card-image1.png')" 
                center 
                :btn-text="$s->field('Блок 3','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Блок 3','Кнопка ссылка','text',false,'/aboutus')"
                gradient 
            />
        </div>
    </div>



    <x-slot name="meta_title">
        {{ $offer->meta_title }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $offer->meta_description }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $offer->meta_keywords }}
    </x-slot>

</x-layout>

@desktopcss
<style>
    .warning {
        padding: 12px 15px;
        border-radius: 6px;
        border: 1.2px dashed var(--red, #C81317);
        background: rgba(200, 19, 23, 0.05);
        margin-top: 25px;
    }

    .warning-title {
        margin-bottom: 2px;
    }

    .breadcrumbs-block {
        position: absolute;
        padding: 0 80px;
        z-index: 2;
    }

    /* Slider */

    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .slick-track:before,
    .slick-track:after {
        display: table;
        content: "";
    }

    .slick-track:after {
        clear: both;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }

    [dir="rtl"] .slick-slide {
        float: right;
    }

    .slick-slide img {
        display: block;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }

    .main-slider-wrapper {
        position: relative;
        width: 1440px;
        height: 450px;
        margin-bottom: 50px;
    }

    .main-slide-grad {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.49) 49.09%);
    }

    .main-slide {
        position: relative;
        width: 100%;
        height: 450px;
        text-align: center;
    }

    .main-slide-container {
        height: 100%;
    }

    .main-slide-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .main-slide-img.mobile {
        display: none;
    }

    .main-slide-content {
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        margin-top: 150px;
        align-self: center;
        align-items: center;
        text-align: center;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    .main-slide-title {
        margin-bottom: 15px;
        font-size: 52px;
        line-height: 58px;
        text-transform: uppercase;
        color: #ffffff;
    }

    .main-slide-desc {
        margin-bottom: 45px;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 28px;
        color: #ffffff;
        width: 610px;
    }

    .main-slider-wrapper .arrow-prev-svg,
    .main-slider-wrapper .arrow-next-svg,
    .main-catalog-wrapper .arrow-prev-svg,
    .main-catalog-wrapper .arrow-next-svg {
        width: 24px;
        height: 24px;
        cursor: pointer;
    }

    .main-slider-wrapper .arrow-prev-svg,
    .main-catalog-wrapper .arrow-prev-svg {
        position: absolute;
        left: 29px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    .main-slider-wrapper .arrow-next-svg,
    .main-catalog-wrapper .arrow-next-svg {
        position: absolute;
        right: 29px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    .main-slider-wrapper .arrow-prev-svg circle,
    .main-slider-wrapper .arrow-next-svg circle {
        fill-opacity: 0.2;
        transition: 0.3s;
    }

    .main-slider-wrapper .arrow-prev-svg:hover circle,
    .main-slider-wrapper .arrow-next-svg:hover circle {
        fill-opacity: 0.45;
    }

    .main-slider .slick-dots,
    .main-catalog-slider .slick-dots {
        display: flex;
        list-style: none;
        position: absolute;
        bottom: 25px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }

    .main-slider .slick-dots li,
    .main-catalog-slider .slick-dots li {
        flex-shrink: 1;
        margin: 0 5px;
    }

    .main-slider .slick-dots li button,
    .main-catalog-slider .slick-dots li button {
        font-size: 0;
        line-height: 0;
        display: block;
        width: 7px;
        height: 7px;
        padding: 0;
        list-style: none;
        background: rgba(255, 255, 255, 0.6);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0.6000000238418579;
        transition: 0.3s;
    }

    .main-slider .slick-dots .slick-active button,
    .main-catalog-slider .slick-dots .slick-active button {
        width: 7px;
        height: 7px;
        background: #ffffff;
        opacity: 1;
        position: relative;
    }


    .product-content {
        display: flex;
        justify-content: flex-start;
        padding: 0 80px;
        margin-bottom: 25px;
    }

    .product-image-block {
        margin-right: 70px;
        margin-bottom: 73px;
    }

    .product-image {
        width: 450px;
        height: 443px;
        border-radius: 8px;
        border: 1px solid var(--color-red-hover);
        object-fit: contain;
    }

    .product-content-desc {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        width: 760px;
    }

    .product-description-title {
        margin-top: 21px;
    }

    .product-catalog-content-title {
        margin-top: 25px;
    }

    .product-catalog-item-image {
        width: 100px;
        height: 100px;
        border-radius: 100px;
        object-fit: cover;
    }

    .product-catalog-item-title  {
        width: 100px;
    }

    .product-catalog {
        display: flex;
        flex-wrap: wrap;
        align-self: flex-start;
    }

    .product-features-title {
        display: flex;
        justify-content: flex-start;
        margin-top: 40px;
        cursor: pointer;
    }

    .product-arrow {
        display: flex;
        align-self: center;
        width: 14px;
        height: 14px;
        margin-left: 8px;
        transition: .3s;
        transform: rotate(180deg);
    }

    .product-features-title.active .product-arrow {
        transform: rotate(0);
    }

    .product-card-energy {
        display: flex;
        padding: 20px;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        border-radius: 8px;
        background: var(--color-skin);
        width: 450px;
    }

    .product-card-content {
        display: flex;
        padding: 20px;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        border-radius: 8px;
        background: var(--color-skin);
        width: 760px;
    }

    .product-card-content-scroll {
        max-height: 236px;
        overflow: auto;
    }

    .product-card-content-scroll::-webkit-scrollbar {
        width: 3px;
    }

    .product-card-content-scroll::-webkit-scrollbar-track {
        background: #E6E6E6;
    }

    .product-card-content-scroll::-webkit-scrollbar-thumb {
        background: var(--color-red);
    }

    .product-card-desc {
        display: flex;
        justify-content: flex-start;
        padding: 0 80px;
        margin-bottom: 80px;
    }

    .product-card-desc {
        display: none;
    }

    .product-card-desc.active {
        display: flex;
    }

    .product-card-content-title {
        margin-bottom: 12px;
    }

    .product-card-desc-content {
        margin-right: 70px;
    }

    .product-card-desc-content:last-child {
        margin-right: 0;
    }

    .banner {
        display: block;
        height: 330px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        object-fit: cover;
        height: 450px;
        top: 100px;
        left: auto;
        width: 1440px;
        z-index: -1;
        object-fit: cover;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        align-self: center;
        position: relative;
        width: 900px;
        z-index: 1;
    }

    .banner-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        align-self: center;
        width: 900px;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .product-catalog a {
        color: var(--color-black);
    }
</style>
@mobilecss
<style>
    .warning {
        padding: 10px 12px;
        border-radius: 6px;
        border: 1.2px dashed var(--red, #C81317);
        background: rgba(200, 19, 23, 0.05);
        margin-top: 25px;
    }

    .warning-title {
        margin-bottom: 2px;
    }

    /* Slider */

    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .slick-track:before,
    .slick-track:after {
        display: table;
        content: "";
    }

    .slick-track:after {
        clear: both;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }

    [dir="rtl"] .slick-slide {
        float: right;
    }

    .slick-slide img {
        display: block;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }

    .main-slider-wrapper {
        position: relative;
        top: 0;
        width: 320px;
        height: 500px;
        margin-bottom: 50px;
    }

    .main-slide-grad {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.49) 49.09%);
    }

    .main-slide {
        position: relative;
        width: 100%;
        height: 500px;
        text-align: center;
    }

    .main-slide-container {
        height: 100%;
    }

    .main-slide-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .main-slide-img.mobile {
        display: none;
    }

    .main-slide-content {
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        margin-top: 150px;
        align-self: center;
        align-items: center;
        text-align: center;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    .main-slide-title {
        margin-bottom: 15px;
        font-size: 52px;
        line-height: 58px;
        text-transform: uppercase;
        color: #ffffff;
    }

    .main-slide-desc {
        margin-bottom: 45px;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 28px;
        color: #ffffff;
        width: 610px;
    }

    .main-slider-wrapper .arrow-prev-svg,
    .main-slider-wrapper .arrow-next-svg,
    .main-catalog-wrapper .arrow-prev-svg,
    .main-catalog-wrapper .arrow-next-svg {
        width: 24px;
        height: 24px;
        cursor: pointer;
    }

    .main-slider-wrapper .arrow-prev-svg,
    .main-catalog-wrapper .arrow-prev-svg {
        position: absolute;
        left: 29px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    .main-slider-wrapper .arrow-next-svg,
    .main-catalog-wrapper .arrow-next-svg {
        position: absolute;
        right: 29px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    .main-slider-wrapper .arrow-prev-svg circle,
    .main-slider-wrapper .arrow-next-svg circle {
        fill-opacity: 0.2;
        transition: 0.3s;
    }

    .main-slider-wrapper .arrow-prev-svg:hover circle,
    .main-slider-wrapper .arrow-next-svg:hover circle {
        fill-opacity: 0.45;
    }

    .main-slider .slick-dots,
    .main-catalog-slider .slick-dots {
        display: flex;
        list-style: none;
        position: absolute;
        bottom: 25px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }

    .main-slider .slick-dots li,
    .main-catalog-slider .slick-dots li {
        flex-shrink: 1;
        margin: 0 5px;
    }

    .main-slider .slick-dots li button,
    .main-catalog-slider .slick-dots li button {
        font-size: 0;
        line-height: 0;
        display: block;
        width: 7px;
        height: 7px;
        padding: 0;
        list-style: none;
        background: rgba(255, 255, 255, 0.6);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0.6000000238418579;
        transition: 0.3s;
    }

    .main-slider .slick-dots .slick-active button,
    .main-catalog-slider .slick-dots .slick-active button {
        width: 7px;
        height: 7px;
        background: #ffffff;
        opacity: 1;
        position: relative;
    }

    .main {
        padding-left: 0;
        padding-right: 0;
    }

    .product-content {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        margin-bottom: 25px;
    }

    .product-image-block {
        margin-bottom: 25px;
    }

    .product-image {
        width: 290px;
        height: 220px;
        border-radius: 8px;
        border: 1px solid var(--color-red-hover);
        object-fit: contain;
    }

    .product-content-desc {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        width: 290px;
    }

    .product-description-title {
        margin-top: 21px;
    }

    .product-catalog-content-title {
        margin-top: 25px;
    }

    .product-catalog-item-image {
        width: 70px;
        height: 70px;
        border-radius: 70px;
        object-fit: cover;
    }

    .product-catalog {
        display: flex;
        align-self: flex-start;
        width: 290px;
        overflow-x: scroll;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .product-features-title {
        display: flex;
        justify-content: flex-start;
        margin-top: 40px;
        cursor: pointer;
    }

    .product-arrow {
        display: flex;
        align-self: center;
        width: 14px;
        height: 14px;
        margin-left: 8px;
        transition: .3s;
        transform: rotate(180deg);
    }

    .product-features-title.active .product-arrow {
        transform: rotate(0);
    }

    .product-card-energy {
        display: flex;
        padding: 20px 15px;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        border-radius: 8px;
        background: var(--color-skin);
        width: 290px;
        margin-bottom: 25px;
    }

    .product-card-content {
        display: flex;
        padding: 20px 15px;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        border-radius: 8px;
        background: var(--color-skin);
        width: 100%;
    }

    .product-card-desc {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        margin-bottom: 80px;
    }

    .product-card-desc {
        display: none;
    }

    .product-card-desc.active {
        display: flex;
    }

    .product-card-content-title {
        margin-bottom: 12px;
    }

    .product-card-desc-content {
        margin-right: 70px;
    }

    .product-card-desc-content:last-child {
        margin-right: 0;
    }

    .product-catalog a {
        color: var(--color-black);
    }

    .breadcrumbs-block {
        position: absolute;
        width: 290px;
        padding: 0 15px;
        z-index: 2;
    }
</style>
@endcss
