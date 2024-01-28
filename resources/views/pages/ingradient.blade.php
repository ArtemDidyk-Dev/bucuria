<x-layout>
    <?php $s = new Single('Ингредиенты', 10, 1); ?>


    <div class="container">
        <div class="breadcrumbs-block">
            <div class="main">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Хлебные крошки', 'Текст', 'text', true, 'Ingradients'),
                        'link' => route('ingradients', [], false),
                    ],
                    [
                        'title' => $ingradient->title,
                        'link' => '',
                    ],
                ]" />
            </div>
        </div>
        <div class="banner">
            <div class="baner-image">
                <img src="{{ $ingradient->banner_img }}" alt="" class="banner-img">
                <div class="gradient-banner"></div>
            </div>
            <div class="banner-content">
                <div class="banner-title h1 color-white">
                    {!! Field::enter_to_br($ingradient->banner_title) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <x-cards.big-card
                title="{{ $s->field('Cтраница инградиента', 'Красный блок Заголовок', 'textarea', true, 'The best flavor combinations for you') }}"
                description="{{ $s->field('Cтраница инградиента', 'Красный блок Описание', 'textarea', true, 'Our Master Chocolatiers continuously create beautiful flavour combinations; perfectly pairing ingredients to bring out our chocolate’s unique flavour. Every single ingredient is meticulously researched and sourced from the finest producers around the world') }}"
                :image="$s->field(
                    'Cтраница инградиента',
                    'Красный блок Картинка',
                    'photo',
                    false,
                    '/images/mask.png',
                )" :imagemob="$s->field(
                    'Cтраница инградиента',
                    'Красный блок Картинка моб',
                    'photo',
                    false,
                    '/images/mobile-big-card.png',
                )" />
        </div>

        <div class="container">
            <x-cards.video :video="$s->field('Cтраница инградиента', 'Видео', 'file', false, '/files/video1.mp4')" />
        </div>

        <div class="container">
            <x-cards.big-image-card image='{{ $ingradient->img_block }}'
                descriptionBlockTitle='{{ $ingradient->title_block }}'
                descriptionBlockDesc="{{ $ingradient->description_block }}" top descriptionBlockRight />
        </div>
        <x-cards.small-text-card image='{{ $ingradient->img_block2 }}' title="{{ $ingradient->title_block2 }}"
            description="{!! $ingradient->description_block2 !!}" />

        <div class="container last-card">
            <x-cards.big-image-card image='{{ $ingradient->img_block3 }}'
                descriptionBlockTitle='{{ $ingradient->title_block3 }}' descriptionBlockDesc="{!! $ingradient->description_block3 !!}"
                top />
        </div>
    </div>
    <x-slot name="meta_title">
        {{ $ingradient->meta_title }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $ingradient->meta_description }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $ingradient->meta_keywords }}
    </x-slot>

</x-layout>
@desktopcss
<style>
    .breadcrumbs-block {
        position: absolute;
        margin-left: 80px;
        z-index: 2;
    }

    .card-title {
        width: 900px;
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
        height: 705px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: auto;
        object-fit: cover;
        width: 1440px;
        height: 710px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: auto;
        width: 100%;
        height: 705px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: containe;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        padding-top: 280px;
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
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .last-card li,
    .last-card p {
        margin-top: 6px;
        font-family: 'Alice';
        font-size: 18px;
        font-style: normal;
        font-weight: 300;
        line-height: 30px;
        margin-left: 20px;
    }

    .last-card p {
        margin-left: 0;
    }

    .last-card li::marker {
        color: var(--color-red);
    }

    .last-card .description-card-title {
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 28px;
        text-transform: uppercase;
    }
</style>
@mobilecss
<style>
    .breadcrumbs-block {
        margin-left: 15px;
        z-index: 2;
    }

    .breadcrumbs-last {
        color: var(--color-white);
    }

    .ingradient-card-section {
        display: flex;
        flex-wrap: wrap;
        width: auto;
    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .banner {
        display: block;
        width: auto;
        height: 402px;
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

    .main .container {
        padding-left: 0;
        padding-right: 0;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
