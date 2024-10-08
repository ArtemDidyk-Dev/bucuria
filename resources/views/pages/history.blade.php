<x-layout>

    <?php $s = new Single('История', 10, 1); ?>

    <div class="main">
        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Баннер', 'Заголовок', 'textarea', true, 'The Bucuria history'),
                        'link' => '',
                    ],
                ]" />
            </div>
        </div>
    </div>
    <div class="banner-section">
        <div class="container">
            <div class="banner">
                <div class="baner-image">
                    <img src="{{ $s->field('Баннер', 'Картинка', 'photo', false, '/images/history.png') }}" alt=""
                        class="banner-img">
                    <div class="big-image-card-gradient"></div>
                </div>
                <div class="banner-content">
                    <div class="banner-title h1 color-white">
                        {{ $s->field('Баннер', 'Заголовок', 'textarea', true, 'The Bucuria history') }}
                    </div>
                    <div class="banner-desc subtitle color-white">
                        {!! Field::enter_to_br(
                            $s->field(
                                'Баннер',
                                'Описание',
                                'textarea',
                                true,
                                'Entrepreneurial spirit. Chocolate revolution. This is the story about how Bucuria came to be. ',
                            ),
                        ) !!}
                    </div>
                    <a href="#0"
                        class="button-normal button-banner color-white">{{ $s->field('Баннер', 'Кнопка', 'textarea', true, 'founded in 1946') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @php
        $cards = $s->field('История', 'Годы', 'repeat', true);
        $cards_items = [];
        foreach ($cards as $elm) {
            $cards_items[] = [$elm->field('Год', 'text', ''), $elm->field('Заголовок', 'text', ''), $elm->field('Текст', 'textarea', ''), $elm->field('Картинка', 'photo', '')];
        }
    @endphp

    <div class="year-menu-section">
        <div class="container">
            <div class="year-menu">
                @foreach ($cards_items as $key => $item)
                    @if(!empty($item[0]))
                        <a href="#{{ $key }}" class="year-link color-white" id="year-{{ $key }}">{{ $item[0] }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    <div class="big-card-height-small-section history">
        <div class="container">
            <x-cards.big-card-height-small
                title="{{ $s->field('Блок 1', 'Заголовок', 'text', true, 'Life is sweeter with us…') }}"
                description="{{ $s->field('Блок 1', 'Текст', 'textarea', true, 'The trademark SA «Bucuria» is the visit card of Moldova. Today this is the largest enterprise producing confectionery in the republic. For more than six decades the company SA «Bucuria» gives joy to the children and grown-ups, totally corresponding to the motto – «Life is sweeter with us…»') }}" />
        </div>
    </div>

    @foreach ($cards_items as $key => $item)
        <div class="history-block" id="{{ $key }}">
            <div class="container">
                <x-cards.history-card year="{{ $item[0] }}" title="{{ $item[1] }}"
                    description="{{ $item[2] }}" image="{{ $item[3] }}" :count="$key" />
            </div>
        </div>
    @endforeach

    <div class="main">
        <div class="container">
            <x-cards.big-image-card
                title="{{ $s->field('Блок 2', 'Заголовок', 'textarea', true, 'We have over 300 products in our range!') }}"
                description="{{ $s->field('Блок 2', 'Текст', 'textarea', true, 'You will 100% find something for yourself from the abundance of sweets') }}"
                image="{{ $s->field('Блок 2', 'Изображение', 'photo', false, '/images/image-card3.png') }}"
                :btn-text="$s->field('Блок 2','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Блок 2','Кнопка ссылка','text',false,'/catalog')"
                center
                gradient
            />
        </div>
    </div>

    <x-slot name="javascript">
        <script>

            const historyBlocks = document.querySelectorAll('.history-block')
            const headerHeight = $("header").height() + $('.year-menu-section').height()

            $(window).on("scroll", function() {
                const scrollOffset = this.scrollY
                historyBlocks.forEach(historyBlock => {

                    if (scrollOffset > historyBlock.offsetTop - headerHeight) {
                        document.querySelector('#year-'+historyBlock.getAttribute('id')).classList.add('active')
                    } else {
                        document.querySelector('#year-'+historyBlock.getAttribute('id')).classList.remove('active')
                    }

                    if (scrollOffset > historyBlock.offsetTop - headerHeight + $(historyBlock).height()) {
                        document.querySelector('#year-'+historyBlock.getAttribute('id')).classList.remove('active')
                    }
                });
            })

        </script>
    </x-slot>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'The Bucuria history') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'The Bucuria history') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'The Bucuria history') }}
    </x-slot>

</x-layout>
@desktopcss
<style>
    .history .card-title-small.h2.color-red {
        text-transform: none;
    }

    .history-card-title .h3{
        text-transform: none;
    }
    .breadcrumbs-last {
        color: var(--color-white);
    }

    .year-menu {
        display: flex;
        justify-content: center;
        position: relative;
        width: 100%;
        height: 46px;
        background: #F11015;
        padding-left: auto;
    }

    .year-link {
        text-align: center;
        font-family: "Istok Web", sans-serif ;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 30px;
        padding: 8px 20px 8px 20px;
        margin-right: 40px;
        transition: .3s;
    }

    .year-link:last-child {
        margin-right: 0;
    }

    .year-link:hover {
        border-radius: 8px;
        background: var(--color-white);
        color: var(--color-red);
    }

    .year-link.active {
        border-radius: 8px;
        background: var(--color-white);
        color: var(--color-red);
    }

    .history-cards:nth-child(2n) .history-card {
        background: var(--color-skin);
    }

    .button-banner {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        margin-top: 40px;
        z-index: 1;
    }

    .breadcrumbs-block {
        position: absolute;
        padding-left: 80px;
        z-index: 2;
    }

    .small-card-section {
        display: flex;
        justify-content: flex-start;

    }

    .ingradient-card-section {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .banner {
        display: block;
        position: relative;
        width: auto;
        height: 633px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: auto;
        object-fit: cover;
        width: 1440px;
        height: 633px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: auto;
        width: auto;
        height: 633px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        padding-top: 186px;
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

    .big-image-slider {
        display: flex;
        justify-content: flex-start;
        position: relative;
    }

    .card-block-arrow-right {
        display: block;
        position: absolute;
        top: 345px;
        right: 80px;
        z-index: 1;
        cursor: pointer;
        width: 30px;
        height: 30px;
    }

    .card-block-arrow-left {
        display: block;
        position: absolute;
        top: 345px;
        left: 80px;
        z-index: 1;
        cursor: pointer;
        width: 30px;
        height: 30px;
    }

    .big-image-slider-item {
        display: flex;
        justify-content: flex-start;
        position: relative;
        width: 1440px;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .slider-img {
        width: 1440px;
        height: 700px;
        object-fit: cover;
    }

    .year-menu-section {
        position: sticky;
        top: 110px;
        left: 0;
        width: 100%;
        height: 46px;
        z-index: 1000;
    }
</style>
@mobilecss
<style>
    .history .card-title-small.h2.color-red {
        text-transform: none;
    }
    .history-card-title .h3{
        text-transform: none;
    }
    .year-menu {
        display: flex;
        justify-content: flex-start;
        align-self: center;
        position: relative;
        width: 100%;
        overflow-x: scroll;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        background: #F11015;
        padding-left: 15px;
    }

    .year-link {
        text-align: center;
        font-family: "Istok Web", sans-serif ;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 26px;
        display: flex;
        padding: 6px 10px;
        margin-right: 25px;
        transition: .3s;
    }

    .year-link:last-child {
        margin-right: 0;
    }

    .year-link.active {
        border-radius: 8px;
        background: var(--color-white);
        color: var(--color-red);
    }

    .history-cards:nth-child(2n) .history-card {
        background: var(--color-skin);
    }

    .button-banner {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        margin-top: 40px;
        z-index: 1;
    }

    .breadcrumbs-block {
        padding-left: var(--offset);
        z-index: 2;
    }

    .small-card-section {
        display: flex;
        justify-content: flex-start;

    }

    .ingradient-card-section {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .banner {
        display: block;
        width: auto;
        width: 100%;
        height: 355px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        top: 0;
        left: 0;
        object-fit: cover;
        width: 100%;
        height: 500px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
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
        margin-top: 15px;
        position: relative;
        z-index: 1;
    }

    .banner-section>.container {
        padding-left: 0;
        padding-right: 0;
    }

    .big-image-slider {
        display: flex;
        justify-content: flex-start;
        position: relative;
    }

    .card-block-arrow-right {
        display: block;
        position: absolute;
        top: 345px;
        right: 80px;
        z-index: 1;
        cursor: pointer;
        width: 30px;
        height: 30px;
    }

    .card-block-arrow-left {
        display: block;
        position: absolute;
        top: 345px;
        left: 80px;
        z-index: 1;
        cursor: pointer;
        width: 30px;
        height: 30px;
    }

    .big-image-slider-item {
        display: flex;
        justify-content: flex-start;
        position: relative;
        width: 1440px;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .slider-img {
        width: 1440px;
        height: 700px;
        object-fit: cover;
    }

    .sticky {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 46px;
        z-index: 1000;
    }

    .big-card-height-small-section .container {
        padding-left: 0;
        padding-right: 0;
    }

    .history-block .container {
        padding-left: 0;
        padding-right: 0;
    }

    .year-menu-section>.container {
        padding-left: 0;
        padding-right: 0;
    }

    .year-menu-section {
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
        z-index: 1000;
    }

    .main>.container {
        padding-left: 0;
        padding-right: 0;
    }
</style>
@endcss

@startjs

@endjs
