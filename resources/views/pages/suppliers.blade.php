<x-layout>
    <?php $s = new Single('Партнеры', 5, 1); ?>

    <div class="banner-section">

        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Хлебные крошки', 'Текст', 'text', true, 'Suppliers'),
                        'link' => '',
                    ],
                ]" />
            </div>
        </div>

        <div class="container">
            <div class="banner">
                <div class="baner-image">
                    <img src="{{ $s->field('Баннер', 'Картинка', 'photo', false, '/images/partners.png') }}"
                        alt="" class="banner-img">
                    <div class="gradient-banner"></div>
                </div>
                <div class="banner-content">
                    <div class="banner-title h1 color-white">
                        {{ $s->field('Баннер', 'Заголовок', 'textarea', true, 'PARTNERS') }}
                    </div>
                    <div class="banner-desc subtitle color-white">
                        {{ $s->field('Баннер', 'Описание', 'textarea', true, 'Our products meet all the requirements for sweets and confectionery products and have all the necessary quality certificates') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="big-image-card-section">
        <div class="container">
            <x-cards.ingradient-big-card title=""
                                         description="" />
        </div>
    </div>


    <div class="big-image-card-section">
        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 1', 'Картинка', 'photo', true, '/images/partners2.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 1', 'Заголовок', 'textarea', true, 'HOW TO BECOME A NEW PARTNER OF THE COMPANY') }}"
                descriptionBlockDesc="{{ $s->field('Блок 1', 'Описание', 'textarea', true, 'If you want to sell on our marketplace yourself, please fill out the application. If you would like to cooperate as a supplier, please see the information below.') }}"
                top descriptionBlockRight />
        </div>
    </div>

    <div class="big-image-card-section">
        <div class="container">
            <x-cards.ingradient-big-card title="{{ $s->field('Блок 2', 'Заголовок', 'textarea', true, '') }}"
                description="{!! $s->field('Блок 2', 'Описание', 'ckeditor', true, '') !!}" />
        </div>
    </div>

    <div class="big-image-card-section">
        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 3', 'Картинка', 'photo', true, '/images/partners3.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 3', 'Заголовок', 'textarea', true, 'Send us your suggestions by e-mail:office@bucuria.md') }}"
                top />
        </div>
    </div>

    <div class="main">
        <div class="container">
            <div class="contact-form-block">
                <div class="contact-title h3 color-white">
                    {{ $s->field('Форма обратной связи', 'Заголовок', 'text', true, 'Contact Form') }}</div>
                <div class="contact-desc extra-text color-white">
                    {{ $s->field('Форма обратной связи', 'Описание', 'textarea', true, 'Contact us and we will be happy to answer all your questions') }}
                </div>
                <div class="contact-form">
                        <x-inc.form nocv type />
                </div>
            </div>
        </div>
    </div>
    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Partners') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Partners') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Partners') }}
    </x-slot>


</x-layout>
@desktopcss
<style>
    .breadcrumbs-block {
        position: absolute;
        margin-left: 80px;
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
        height: 700px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: auto;
        object-fit: cover;
        width: 1440px;
        height: 700px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: auto;
        width: 100%;
        height: 700px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        height: 100%;
        display: flex;
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
        width: 900px;
    }

    .big-image-card-section {
        position: relative;
    }

    .ingradient-big-card {
        height: initial;
    }

    .ingradient-big-card-img {
        height: 100%;
    }

    .ingradient-big-card h3 {
        font-family: Taviraj;
        font-size: 30px;
        font-style: normal;
        font-weight: 600;
        line-height: 42px;
        text-transform: uppercase;
        margin-top: 60px;
    }

    .ingradient-big-card h3:first-child {
        margin-top: 0;
    }

    .ingradient-big-card ul {
        margin-left: 73px;
    }

    .descrtiption-card-block {
        position: initial;
    }

    .description-card-right,
    .description-card-left {
        height: initial;
        top: 50%;
        transform: translateY(-50%);
        margin-top: 0;
    }
</style>
@mobilecss
<style>
    .breadcrumbs-block {
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
        height: 405px;
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
        height: 545px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 0;
        left: 0;
        top: 0;
        width: 100%;
        height: 545px;
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

    .big-image-card-section .container {
        padding-left: 0;
        padding-right: 0;
    }

    .video-section .container {
        padding-left: 0;
        padding-right: 0;
    }

    .main .container {
        padding-left: 0;
        padding-right: 0;
    }

    .ingradient-big-card h3 {
        font-family: Taviraj;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: 34px;
        text-transform: uppercase;
        margin-top: 40px;
    }

    .ingradient-big-card h3:first-child {
        margin-top: 0;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
