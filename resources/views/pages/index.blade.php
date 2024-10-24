<x-layout>
    <?php $s = new Single('Главная', 10, 1); ?>
    <div class="main">
        <div class="container lr">
            <div class="banner">
                <div class="baner-image">
                    <img src="{{ $s->field('Баннер', 'Картинка', 'photo', false, '/images/header-baner.png') }}"
                        alt="" class="banner-img desktop">
                    <img src="{{ $s->field('Баннер', 'Картинка моб', 'photo', false, '/images/banner-mobile.png') }}"
                        alt="" class="banner-img mobile">
                    <div class="gradient-banner"></div>
                </div>
{{--                <div class="banner-content">--}}
{{--                  --}}
{{--                        <div class="banner-title h1 color-white">--}}
{{--                            {!! Field::enter_to_br(--}}
{{--                                $s->field('Баннер', 'Заголовок', 'textarea', true, 'Welcome to the biggest factory of chocolates from Moldova'),--}}
{{--                            ) !!}--}}
{{--                        </div>--}}
{{--                    <div class="banner-desc h1 subtitle color-white">--}}
{{--                        {!! Field::enter_to_br($s->field('Баннер', 'Описание', 'textarea', true, 'With us life is sweeter!')) !!}--}}

{{--                    </div>--}}
{{--                  --}}
{{--                </div>--}}
            </div>
        </div>

        <div class="container">
            <div class="big-card-section">
                <x-cards.big-card :title="$s->field('Баннер 1', 'Заголовок', 'textarea', true, 'We gave chocolate a makeover')" :description="$s->field(
                    'Баннер 1',
                    'Описание',
                    'textarea',
                    true,
                    'We stripped away added sugars, emulsifiers, and other weird ingredients.  Instead we use the whole cacao pod—seed and fruit—to let chocolates inner-beauty shine.',
                )" :image="$s->field('Баннер 1', 'Картинка', 'photo', false, '/images/mask.png')" :imagemob="$s->field('Баннер 1', 'Картинка моб', 'photo', false, '/images/mobile-big-card.png')" />
            </div>
        </div>

        <div class="container">
            <x-cards.big-image-card
                :title="$s->field('Баннер 2','Заголовок','textarea',true,'The largest enterprise for the production of confectionery in Moldova')"
                :image="$s->field('Баннер 2', 'Картинка', 'photo', false, '/images/card-image1.png')"
                :imagemob="$s->field('Баннер 2', 'Картинка моб', 'photo', false, '/images/card-image1-mob.png')"
                center
                :btn-text="$s->field('Баннер 2','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 2','Кнопка ссылка','text',false,'/catalog')"
                gradient
            />
        </div>

        <div class="container">
            <x-cards.big-image-card
                :title="$s->field('Баннер 3', 'Заголовок', 'textarea', true, 'We only use the best ingredients')"
                :image="$s->field('Баннер 3', 'Картинка', 'photo', true, '/images/card-coffe.png')"
                :imagemob="$s->field('Баннер 3', 'Картинка моб', 'photo', true, '/images/card-coffe-mob.png')"
                :btn-text="$s->field('Баннер 3','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 3','Кнопка ссылка','text',false,'/ingradients')"
                red
            />
        </div>

        <div class="container">
            <x-cards.social-card />
        </div>

        <div class="container">
            <x-cards.big-image-card
                :title="$s->field('Баннер 4', 'Заголовок', 'textarea', true, 'We have over 300 products in our range!')" :description="$s->field('Баннер 4','Описание','textarea',true,'You will 100% find something for yourself from the abundance of sweets')"
                :image="$s->field('Баннер 4', 'Картинка', 'photo', false, '/images/image-card3.png')"
                :imagemob="$s->field('Баннер 4', 'Картинка моб', 'photo', false, '/images/image-card3-mob.png')"
                center
                :btn-text="$s->field('Баннер 4','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 4','Кнопка ссылка','text',false,'/catalog')"
                gradient
            />
        </div>

        @php
            $cards = $s->field('Блок страниц', 'Страница', 'repeat', true);
            $cards_items = [];
            foreach ($cards as $elm) {
                $cards_items[] = [$elm->field('Текст', 'text', ''), $elm->field('Картинка', 'photo', ''), $elm->field('Ссылка', 'text', '')];
            }
        @endphp

        <div class="container">
            <div class="small-card-section">
                @foreach ($cards_items as $item)
                    <x-cards.small-card :image="$item[1]" : :link="$item[2]">
                        {{ $item[0] }}
                    </x-cards.small-card>
                @endforeach
            </div>
        </div>

        <x-cards.small-social-card />
    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria') }}
    </x-slot>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const banner = document.querySelector('.banner');
            if(banner) {
                setTimeout(() => {
                    banner.classList.add('show');
                }, 450);  // Невелика затримка перед активацією
            }
        });
    </script>

</x-layout>
@desktopcss
<style>
    .small-card-section {
        display: flex;
        justify-content: flex-start;

    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .banner {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 572px;
        position: relative;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        top: -158px;
        left: 0;
        object-fit: cover;
        width: 1440px;
        height: 730px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        top: -158px;
        left: 0;
        width: 1440px;
        height: 730px;
        background: transparent;
        background-repeat: no-repeat;
        background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.30) 53.71%, rgba(0, 0, 0, 0.00) 100%);
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        width: 900px;
    }

    .banner-desc {
        display: flex;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .big-card-section .card-title {
        font-size: 42px;
        width: 1200px;
    }

    .banner-content {
        opacity: 0;
        transform: translateY(20px);  /* Зсуваємо текст вниз */
        transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
        transition-delay: 0.5s;  /* Затримка перед появою */
        z-index: 999;
    }


    .banner.show .banner-content {
        opacity: 1;
        transform: translateY(0);
    }


    .banner-title {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease, transform 1s ease;
        transition-delay: 0.3s;  /* Затримка появи заголовка */
    }

    .banner-desc {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1.2s ease, transform 1.2s ease;
        transition-delay: 0.6s;  /* Затримка появи опису */
    }


    .banner.show .banner-title,
    .banner.show .banner-desc {
        opacity: 1;
        transform: translateY(0);
    }


</style>
@mobilecss
<style>
    .banner {
        display: block;
        height: 100px;
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
        height: 505px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 505px;
        background: transparent;
        background-repeat: no-repeat;
        background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.30) 53.71%, rgba(0, 0, 0, 0.00) 100%);
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 125px;
        position: relative;
        z-index: 1;
    }

    .banner-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .big-card-section {
        margin-top: 255px;
    }

    .main>.container {
        padding-left: 0;
        padding-right: 0;
    }

    .banner-content {
        /* Спочатку приховуємо весь контент */
        opacity: 0;
        transform: translateY(20px);  /* Зсуваємо текст вниз */
        transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
        transition-delay: 0.5s;  /* Затримка перед появою */
    }


    .banner.show .banner-content {
        opacity: 1;
        transform: translateY(0);
        position: relative;
        z-index: 2;
    }


    .banner-title {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease, transform 1s ease;
        transition-delay: 0.3s;  /* Затримка появи заголовка */
    }

    .banner-desc {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1.2s ease, transform 1.2s ease;
        transition-delay: 0.6s;  /* Затримка появи опису */
    }


    .banner.show .banner-title,
    .banner.show .banner-desc {
        opacity: 1;
        transform: translateY(0);
    }

</style>
@endcss

@startjs
@endjs
