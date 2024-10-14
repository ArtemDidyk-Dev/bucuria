<x-layout>
    <?php $s = new Single('Ингредиенты', 10, 1);
    ?>

    <div class="main">
        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Хлебные крошки', 'Текст', 'text', true, 'Ingradients'),
                        'link' => '',
                    ],
                ]" />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="banner">
            <div class="baner-image">
                <img src="{{ $s->field('Баннер', 'Картинка', 'photo', true, '/images/card-coffe.png') }}" alt=""
                    class="banner-img">
                <div class="gradient-banner"></div>
            </div>
            <div class="banner-content">
                <div class="banner-title h1 color-white">
                    {!! Field::enter_to_br($s->field('Баннер', 'Заголовок', 'textarea', true, 'We only use the best ingredients')) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 1', 'Картинка', 'photo', true, '/images/ingradiebt-card.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 1', 'Заголовок', 'textarea', true, 'The best we can offer you is our chocolate') }}"
                descriptionBlockDesc="{{ $s->field('Блок 1', 'Описание', 'textarea', true, 'We use the finest selection of ingredients to create our products that are a combination of tradition and modernism. We use the finest selection of ingredients to create our products that are a combination of tradition and modernism. We use the finest selection of ingredients to create our products that are a combination of tradition and modernism. We use the finest selection of ingredients to create our products that are a combination of tradition and modernism') }}"
                descriptionBlockRight />
        </div>
        <div class="container">
            <x-cards.big-card
                title="{{ $s->field('Блок 2', 'Заголовок', 'textarea', true, 'You can choose any flavor you like') }}"
                description=" {{ $s->field('Блок 2', 'Описание', 'textarea', true, 'We stripped away added sugars, emulsifiers, and other weird ingredients. Instead we use the whole cacao pod') }}"
                image="{{ $s->field('Блок 2', 'Картинка', 'photo', false, '/images/mask.png') }}" :imagemob="$s->field('Блок 2', 'Картинка моб', 'photo', false, '/images/mobile-big-card.png')" />
        </div>

        @php
            $cards = $s->field('Ингредиенты', 'Ингредиенты', 'repeat', true);
            $cards_items = [];
            foreach ($cards as $elm) {
                $cards_items[] = [
                    $elm->field('Заголовок', 'text', 'Strawberry'),
                    $elm->field(
                        'Текст',
                        'textarea',
                        'We only use real strawberries in our chocolates. We only use real strawberries in our chocolates. We only use real strawberries in our chocolates. We only use real strawberries in our chocolates. We only use real strawberries in our chocolates. We only use real strawberries in our chocolates. We only use real strawberries in our chocolates. We only use real strawberries in our chocolates.
',
                    ),
                    $elm->field('Картинка', 'photo', '/images/ingradient-small.png'),
                    $elm->field('Ссылка', 'text', '/strawberry'),
                ];
            }
        @endphp

        <div class="container">
            <div class="ingradient-card-section">
                @foreach ($ingradients as $ingradient)
                    <x-cards.ingradient-card :ingradient="$ingradient" />
                @endforeach
            </div>
        </div>

        <div class="container">
            <x-cards.big-image-card
                image="{{ $s->field('Блок 3', 'Картинка', 'photo', true, '/images/ingradient-card2.png') }}"
                descriptionBlockTitle="{{ $s->field('Блок 3', 'Заголовок', 'textarea', true, 'The best we can offer you is our chocolate') }}"
                descriptionBlockDesc="{{ $s->field('Блок 3', 'Описание', 'textarea', true, 'Share or give bliss with Bucuria Melting Milk Chocolate Truffles. Bucuria chocolate masters combine experience and the best ingredients to produce a perfectly round chocolate shell with an irresistibly smooth filling. Since 1946, Bucuria has been producing the finest chocolate, and the recipes created by Bucuria\'s master chocolatiers are of the highest quality to delight your taste buds. Our chocolates are perfect for celebrating special occasions: bringing a touch of bliss to any occasion, the perfect gift to impress or enjoy with friends and loved ones.') }}"
                top />
        </div>

        <div class="container">
            <x-cards.ingradient-big-card
                title="{{ $s->field('Блок 4', 'Заголовок', 'textarea', true, 'The best we can offer you is our chocolate') }}"
                description="{!! $s->field('Блок 4', 'Описание', 'ckeditor', true, '') !!}" />
        </div>


    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Ingredients') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Ingredients') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Ingredients') }}
    </x-slot>


</x-layout>
@desktopcss
<style>
    .breadcrumbs-block {
        position: absolute;
        margin-left: 80px;
        z-index: 2;
    }

    .breadcrumbs-last {
        color: var(--color-white);
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
        object-fit: containe;
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
        height: 350px;
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
