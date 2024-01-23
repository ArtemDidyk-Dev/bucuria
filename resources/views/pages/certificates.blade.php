<x-layout>

    <?php $s = new Single('Cертификаты', 10, 1); ?>

    <div class="main">
        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Баннер', 'Заголовок', 'textarea', true, 'Certificates'),
                        'link' => '',
                    ],
                ]" />
            </div>

            <div class="container">
                <div class="banner">
                    <div class="baner-image">
                        <img src="{{ $s->field('Баннер', 'Картинка', 'photo', true, '/images/cert.jpg') }}" alt=""
                            class="banner-img">
                        <div class="gradient-banner"></div>
                    </div>
                    <div class="banner-content">
                        <div class="banner-title h1 color-white">
                            {!! Field::enter_to_br($s->field('Баннер', 'Заголовок', 'textarea', true, 'Certificates')) !!}
                        </div>

                        <div class="banner-desc subtitle color-white">
                            {!! Field::enter_to_br(
                                $s->field(
                                    'Баннер',
                                    'Описание',
                                    'textarea',
                                    true,
                                    'Our products meet all the requirements for sweets and confectionery products and have all the necessary quality certificates',
                                ),
                            ) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $cards = $s->field('Cертификаты', 'Cертификат', 'repeat', true);
        $cards_items = [];
        foreach ($cards as $elm) {
            $cards_items[] = [$elm->field('Заголовок', 'text', ''), $elm->field('Текст', 'textarea', ''), $elm->field('Файл', 'file', ''), $elm->field('Фото', 'photo', ''), $elm->field('Текст кнопки', 'text', '')];
        }
    @endphp

    @foreach ($cards_items as $item)
        <div class="certificate-big-card">
            <div class="container certificate-big-card-inner">
                <img src="{{ $item[3] }}" alt="" class="certificate-img">
                <div class="certificate-content">
                    <div class="certificate-title h5 color-red">{{ $item[0] }}</div>
                    <div class="extra-text color-red certificate-desc">{{ $item[1] }}</div>
                    <a href="{{ $item[2] }}" download class="color-white button-small button-a">
                        {{ $item[4] }}
                        <img src="/images/icons/pdf.svg" alt="" class="button-icon">
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="certificate-big-cards">
        <div class="container">
            <x-cards.certificate-big-card
                title="{{ $s->field('Блок 4', 'Заголовок', 'textarea', true, 'The best we can offer you is our chocolate') }}"
                description="{!! $s->field('Блок 4', 'Описание', 'ckeditor', true, '') !!}" />
        </div>
    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Cертификаты') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Cертификаты') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Cертификаты') }}
    </x-slot>

</x-layout>
@desktopcss
<style>
    .certificate-big-card {
        display: inline-flex;
        padding: 0 80px;
        align-items: flex-start;
        background: var(--color-skin);
        width: 100%;
        border: none;
    }

    .certificate-big-card-inner {
        display: flex;
        align-items: center;
        border-bottom: 1px solid var(--color-white);
        padding: 50px 0;
    }

    .button-a {
        display: flex;
        padding: 12px 50px;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        background: var(--red, #C81317);
        width: 306px;
    }

    .button-icon {
        width: 26px;
        height: 26px;
        object-fit: cover;
        margin-left: 5px;
    }

    .certificate-title {
        margin-bottom: 20px;
    }

    .certificate-desc {
        margin-bottom: 92px;
    }

    .certificate-img {
        width: 280px;
        height: 400px;
        margin-right: 50px;
        object-fit: cover;
    }

    .breadcrumbs-block {
        position: absolute;
        margin-left: 80px;
        z-index: 2;
    }

    .banner {
        display: block;
        position: relative;
        width: auto;
        height: 450px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: auto;
        object-fit: cover;
        width: auto;
        height: 450px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: auto;
        width: 100%;
        height: 450px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        padding-top: 151px;
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
        position: relative;
        z-index: 1;
        width: 800px;
        margin: 25px auto 0;
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
    .certificate-big-card {
        display: flex;
        flex-direction: column;
        padding: 50px 15px;
        align-items: flex-start;
        background: var(--color-skin);
        width: 100%;
        border: none;
        border-bottom: 1px solid var(--color-white);
    }

    .button-a {
        display: flex;
        padding: 12px 50px;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        background: var(--red, #C81317);
        width: 290px;
    }

    .button-icon {
        width: 26px;
        height: 26px;
        object-fit: cover;
        margin-left: 5px;
    }

    .certificate-big-card-inner {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .certificate-title {
        margin-top: 25px;
        margin-bottom: 20px;
    }

    .certificate-desc {
        margin-bottom: 20px;
    }

    .certificate-img {
        width: 188px;
        height: 269px;
        object-fit: cover;
    }

    .breadcrumbs-block {
        margin-left: 15px;
        z-index: 2;
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
        z-index: 1;
        left: 0;
        top: 0;
        width: auto;
        height: 100%;
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
        width: auto;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .slider-img {
        width: auto;
        height: 320px;
        object-fit: cover;
    }

    .certificate-big-cards .container {
        padding-left: 0;
        padding-right: 0;
    }

    .certificate-big-cards {
        position: relative;
    }

    .main>.container {
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
