<x-layout>

    <?php $s = new Single('О нас', 10, 1); ?>

    <div class="main">
        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Баннер', 'Заголовок', 'textarea', true, 'About bucuria'),
                        'link' => '',
                    ],
                ]" />
            </div>
        </div>
        <div class="container">
            <div class="banner">
                <div class="baner-image">
                    <img src="{{ $s->field('Баннер', 'Изображение', 'photo', false, '/images/about.png') }}"
                        alt="" class="banner-img">
                </div>
                <div class="banner-content">
                    <div class="banner-title h1 color-white">
                        {{ $s->field('Баннер', 'Заголовок', 'textarea', true, 'About bucuria') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main">
        <div class="container">
            <div class="big-card-section">
                <x-cards.big-card :title="$s->field(
                    'Блок 1',
                    'Заголовок',
                    'textarea',
                    true,
                    'Bucuria is the largest confectionery company in Moldova',
                )" :description="$s->field(
                    'Блок 1',
                    'Описание',
                    'textarea',
                    true,
                    'The trademark SA Bucuria is the visit card of Moldova. Today this is the largest enterprise producing confectionery in the republic.',
                )" image="/images/mask.png"
                    imagemob="/images/mobile-big-card.png" />
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 2', 'Изображение', 'photo', false, '/images/about2.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 2', 'Заголовок', 'textarea', true, '300+ types of products') }}"
                descriptionBlockDesc="{{ $s->field('Блок 2', 'Описание', 'textarea', true, 'Bucuria produces more than 300 items of high-quality confectionery. The assortment of the corporation includes chocolate and jelly candies, caramel, toffee, chocolate bars and bars, cookies, waffles, biscuit rolls, cakes and tarts. Some of them have no analogues on the Moldovan market. Bucuria confectionery products are made using the most modern technologies. The operation of modern high-production equipment, ') }}"
                top descriptionBlockRight />
        </div>
    </div>
    <div class="image-galery">
        <div class="container">
            <div class="big-image-slider">
                <div class="card-block-arrow-left" onclick="prev_card_block('big-image-slider-item')">
                    <img src="/images/icons/left-arrow.png">
                </div>
                <div class="card-block-arrow-right" onclick="next_card_block('big-image-slider-item')">
                    <img src="/images/icons/right-arrow.png">
                </div>
                <div class="big-image-slider-item" id="big-image-slider-item">
                    @foreach ($s->field('Слейдер 1', 'Слайдер', 'gallery', false, '') as $item)
                        <img src="{{ $item }}" alt="" class="slider-img">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 3', 'Изображение', 'photo', false, '/images/about3.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 3', 'Заголовок', 'textarea', true, '1 large factory') }}"
                descriptionBlockDesc="{{ $s->field('Блок 3', 'Описание', 'textarea', true, 'The factory is located in Chisinau, Moldova. The production facilities of the Bucuria confectionery factory are certified in accordance with the requirements of international food quality and safety standards. The Bucuria factory operates a quality management system that meets the requirements of ISO 9001:2008 and a food safety management system that meets the requirements of the ISO 22000:2005 standard, which is confirmed by the presence of certificates of conformity.') }}"
                top />
        </div>
    </div>

    <div class="map">
        <div class="container">
            <x-cards.map />
        </div>
    </div>

    <div class="main">
        <div class="container">
            <x-cards.big-image-card :image="$s->field('Блок 4', 'Изображение', 'photo', false, '/images/about4.png')" :descriptionBlockTitle="$s->field('Блок 4', 'Заголовок', 'textarea', true, '40 branded shops')" :descriptionBlockDesc="$s->field(
                'Блок 4',
                'Описание',
                'textarea',
                true,
                'We make sure that you can buy Bucuria products for every taste and occasion at affordable prices. That is why there is a network of branded stores on the territory of Ukraine. Here you will find chocolate bars, candies, gift sets, caramel, cookies, biscuits, cakes, pastries, rum beans and exclusive sweets. Each store is distinguished by a unique atmosphere. Qualified and polite staff work in the establishments, who will always be happy to',
            )" top descriptionBlockRight />
        </div>
    </div>


    <div class="image-galery">
        <div class="container">
            <div class="big-image-slider">
                <div class="card-block-arrow-left" onclick="prev_card_block('big-image-slider-item2')">
                    <img src="/images/icons/left-arrow.png">
                </div>
                <div class="card-block-arrow-right" onclick="next_card_block('big-image-slider-item2')">
                    <img src="/images/icons/right-arrow.png">
                </div>
                <div class="big-image-slider-item" id="big-image-slider-item2">
                    @foreach ($s->field('Слейдер 2', 'Слайдер', 'gallery', false, '') as $item)
                        <img src="{{ $item }}" alt="" class="slider-img">
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="video-section">
        <div class="container">
            <x-cards.video :video="$s->field('Видео', 'Видео', 'file', false, '/files/video1.mp4')" />
        </div>
    </div>

    <div class="main">
        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 5', 'Изображение', 'photo', false, '/images/about5.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 5', 'Заголовок', 'textarea', true, 'More than 1000 employees') }}"
                descriptionBlockDesc="{{ $s->field('Блок 5', 'Описание', 'textarea', true, 'The factory is located in Chisinau, Moldova. The production facilities of the Bucuria confectionery factory are certified in accordance with the requirements of international food quality and safety standards. The Bucuria factory operates a quality management system that meets the requirements of ISO 9001:2008 and a food safety management system that meets the requirements of the ISO 22000:2005 standard, which is confirmed by the presence of certificates of conformity.') }}" />
        </div>
    </div>


    @php
        $elms = $s->field('Блок 6', 'Елемент', 'repeat', true);
        $elmts_items = [];
        foreach ($elms as $elm) {
            $elmts_items[] = [$elm->field('Картинка', 'photo', 'images/card1.png'), $elm->field('Заголовок', 'text', 'certificates'), $elm->field('Ссылка', 'text', '/')];
        }
    @endphp
    <div class="main">
        <div class="container">
            <div class="small-card-section">
                @foreach ($elmts_items as $item)
                    <x-cards.small-card :image="$item[0]" :link="$item[2]">
                        {{ $item[1] }}
                    </x-cards.small-card>
                @endforeach
            </div>
        </div>
    </div>
    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'About Bucuria') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'About Bucuria') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'About Bucuria') }}
    </x-slot>


</x-layout>
@desktopcss
<style>
    .breadcrumbs-block {
        position: absolute;
        z-index: 2;
        margin-left: 80px;
    }

    .card-title {
        width: 1000px;
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
        height: 448px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: auto;
        object-fit: cover;
        width: 1440px;
        height: 550px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: auto;
        width: 100%;
        height: 550px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
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
        width: 40px;
        height: 40px;
    }

    .card-block-arrow-left {
        display: block;
        position: absolute;
        top: 345px;
        left: 80px;
        z-index: 1;
        cursor: pointer;
        width: 40px;
        height: 40px;
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
</style>
@mobilecss
<style>
    .breadcrumbs-block {
        z-index: 1;
    }

    .small-card-section {
        display: flex;
        flex-direction: column;
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
        width: 100%;
        height: 362px;
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
        display: flex;
        padding-top: 91px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
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
        right: 15px;
        top: 200px;
        z-index: 1;
        cursor: pointer;
        width: 40px;
        height: 40px;
    }

    .card-block-arrow-left {
        display: block;
        position: absolute;
        left: 15px;
        z-index: 1;
        top: 200px;
        cursor: pointer;
        width: 40px;
        height: 40px;
    }

    .big-image-slider-item {
        display: flex;
        justify-content: flex-start;
        position: relative;
        width: 100%;
        height: 417px;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .slider-img {
        width: 100%;
        height: 417px;
        object-fit: cover;
    }

    .main>.container {
        padding-left: 0;
        padding-right: 0;
    }

    .map .container {
        padding-left: 0;
        padding-right: 0;
    }

    .image-galery .container {
        padding-left: 0;
        padding-right: 0;
    }

    .video-section .container {
        padding-left: 0;
        padding-right: 0;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
