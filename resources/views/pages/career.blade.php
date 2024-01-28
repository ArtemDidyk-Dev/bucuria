<x-layout>

    <?php $s = new Single('Карьера', 10, 1); ?>

    <div class="container">
        <div class="breadcrumbs-block">
            <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                [
                    'title' => $s->field('Баннер', 'Заголовок', 'textarea', true, 'Career'),
                    'link' => '',
                ],
            ]" />
        </div>
        <div class="banner">
            <div class="baner-image">
                <img src="{{ $s->field('Баннер', 'Изображение', 'photo', false, '/images/career-img.png') }}"
                    alt="" class="banner-img">
                <div class="gradient-banner"></div>
            </div>
            <div class="banner-content">
                <div class="banner-title h1 color-white">
                    {{ $s->field('Баннер', 'Заголовок', 'textarea', true, 'Career') }}
                </div>
                <div class="banner-desc subtitle color-white">
                    {!! Field::enter_to_br(
                        $s->field(
                            'Баннер',
                            'Описание',
                            'textarea',
                            true,
                            'If you are talented, have unique abilities, are not afraid of bold decisions - welcome to our team of like-minded people!',
                        ),
                    ) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <div class="career-big-card">
                <div class="career-big-card-title h2 color-red">
                    {{ $s->field('ПРЕИМУЩЕСТВА РАБОТЫ', 'Заголовок', 'textarea', true, 'ADVANTAGES OF WORK') }}
                </div>

                <div class="subtitle desc-career-big-card color-red">
                    {!! Field::enter_to_br(
                        $s->field(
                            'ПРЕИМУЩЕСТВА РАБОТЫ',
                            'Описание',
                            'textarea',
                            true,
                            'Working at Bucuria means constantly moving forward. Bucuria is proud of its employees, creates the best conditions for them to realize their potential and inspires new achievements.',
                        ),
                    ) !!}
                </div>

                @php
                    $cards = $s->field('ПРЕИМУЩЕСТВА', 'Карточка', 'repeat', true);
                    $cards_items = [];
                    foreach ($cards as $elm) {
                        $cards_items[] = [$elm->field('Заголовок', 'textarea', 'good salary'), $elm->field('Текст', 'textarea', 'Decent and regular salary'), $elm->field('Картинка', 'photo', '/images/icon-money.png')];
                    }
                @endphp

                <div class="career-small-cards">
                    @foreach ($cards_items as $item)
                        <div class="career-small-card">
                            <img src="{{ $item[2] }}" alt="" class="img-career">
                            <div class="career-card-content">
                                <div class="career-small-card-title h5 color-white">{!! Field::enter_to_br($item[0]) !!}</div>
                                <div class="career-small-card-desc extra-text color-white">{{ $item[1] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container">
                <div class="career-block-description">
                    <div class="career-block-title h2">
                        {{ $s->field('Наша команда', 'Заголовок', 'text', true, 'our team') }}</div>
                    <div class="career-desc subtitle">
                        {{ $s->field('Наша команда', 'Текст', 'textarea', true, 'If you are talented, have unique abilities, are not afraid of bold decisions - welcome to our team of like-minded people!') }}
                    </div>
                </div>

                @php
                    $galery = $s->field('Галерея', 'Фото', 'repeat', true);
                    $galery_items = [];
                    foreach ($galery as $elm) {
                        $galery_items[] = [$elm->field('Фото', 'photo', '/images/slider-image.png')];
                    }
                @endphp

                <div class="container">
                    <div class="big-image-slider">
                        <div class="card-block-arrow-left" onclick="prev_card_block('big-image-slider-item2')">
                            <img src="/images/icons/left-arrow.png">
                        </div>
                        <div class="card-block-arrow-right" onclick="next_card_block('big-image-slider-item2')">
                            <img src="/images/icons/right-arrow.png">
                        </div>
                        <div class="big-image-slider-item" id="big-image-slider-item2">
                            @foreach ($galery_items as $photo)
                                <img src="{{ $photo[0] }}" class="slider-img">
                            @endforeach
                        </div>
                    </div>

                    <div class="container">
                        <div class="teams-block">
                            <div class="teams-title h4 color-black">
                                {{ $s->field('Топ-менеджеры', 'Заголовок', 'text', true, 'Top managers in Bucuria') }}
                            </div>
                            @php
                                $managers = $s->field('Топ-менеджеры', 'Менеджер', 'repeat', true);
                                $managers_items = [];
                                foreach ($managers as $elm) {
                                    $managers_items[] = [$elm->field('Имя', 'text', 'Michal Richi'), $elm->field('Описание', 'text', 'Top manager'), $elm->field('Телефон', 'text', '+373 (22) 895322'), $elm->field('Email', 'text', 'reclama@bucuria.md'), $elm->field('Фото', 'photo', '')];
                                }
                            @endphp
                            <div class="teams">
                                @foreach ($managers_items as $item)
                                    <x-cards.people-card name="{{ $item[0] }}" description="{{ $item[1] }}"
                                        phone="{{ $item[2] }}" email="{{ $item[3] }}"
                                        image="{{ $item[4] }}" />
                                @endforeach
                            </div>
                        </div>

                        <div class="container">
                            <div class="contact-form-block">
                                <div class="contact-title h3 color-white">
                                    {{ $s->field('Форма обратной связи', 'Заголовок', 'text', true, 'Contact Form') }}
                                </div>
                                <div class="contact-desc extra-text color-white">
                                    {{ $s->field('Форма обратной связи', 'Описание', 'textarea', true, 'Contact us and we will be happy to answer all your questions') }}
                                </div>
                                <div class="contact-form">
                                    <x-inc.form />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-slot name="meta_title">
            {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Career') }}
        </x-slot>

        <x-slot name="meta_description">
            {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Career') }}
        </x-slot>

        <x-slot name="meta_keywords">
            {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Career') }}
        </x-slot>

</x-layout>
@desktopcss
<style>

    .breadcrumbs-last {
        color: var(--color-white);
    }

    .career-big-card-title {
        margin-bottom: 30px;
    }

    .career-block-description {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding-top: 80px;
        padding-bottom: 40px;
    }

    .career-block-title {
        width: 1000px;
    }

    .career-desc {
        width: 1000px;
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

    .teams-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .teams-block {
        display: flex;
        flex-direction: column;
        padding: 60px 80px 60px 80px;
    }

    .teams {
        display: flex;
        flex-wrap: wrap;
    }

    .career-big-card {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        text-align: center;
        padding: 100px 80px 100px 80px;
        background: var(--color-skin);
    }

    .career-small-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: auto;
    }

    .career-small-card {
        position: relative;
        display: flex;
        justify-content: flex-start;
        width: 400px;
        height: 210px;
        text-align: left;
        margin-top: 60px;
        border-radius: 8px;
        background-color: var(--color-red);
    }

    .career-small-card:nth-child(3n) {
        margin-right: 0;
    }

    .img-career {
        position: absolute;
        width: 130px;
        height: 123px;
        bottom: 0;
        left: 0;
    }

    .career-card-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        text-align: left;
        margin-left: 145px;
        padding-right: 25px;
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
        width: 1440px;
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

    .main .container {
        padding-left: 0;
        padding-right: 0;
    }

    .career-block-description {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding-top: 80px;
        padding-bottom: 40px;
    }

    .career-block-title {
        width: 290px;
    }

    .career-desc {
        width: 290px;
        font-family: 'Alice';
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
    }

    .big-image-slider {
        display: flex;
        justify-content: flex-start;
        position: relative;
    }

    .card-block-arrow-right {
        display: block;
        position: absolute;
        top: 161px;
        right: 10px;
        z-index: 1;
        cursor: pointer;
        width: 40px;
        height: 40px;
    }

    .card-block-arrow-left {
        display: block;
        position: absolute;
        top: 161px;
        left: 10px;
        z-index: 1;
        cursor: pointer;
        width: 40px;
        height: 40px;
    }

    .big-image-slider-item {
        display: flex;
        justify-content: flex-start;
        position: relative;
        width: 100%;
        overflow-x: hidden;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .slider-img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .teams-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .teams-block {
        display: flex;
        flex-direction: column;
        padding: 60px 15px 60px 15px;
        align-self: center;
        text-align: center;
    }

    .teams {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-self: center;
        align-items: center;
    }

    .career-big-card {
        display: inline-flex;
        padding: 60px 15px;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 50px;
        gap: 25px;
        text-align: center;
        background: var(--color-skin);
    }

    .career-small-cards {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-self: center;
        align-items: center;
        width: auto;
    }

    .career-small-card {
        position: relative;
        display: flex;
        justify-content: flex-start;
        width: 290px;
        height: 184px;
        text-align: left;
        margin-top: 20px;
        border-radius: 8px;
        background-color: var(--color-red);
    }

    .career-small-card:nth-child(3n) {
        margin-right: 0;
    }

    .img-career {
        position: absolute;
        width: 98px;
        height: 85px;
        bottom: 0;
        left: 0;
        object-fit: contain;
    }

    .career-card-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        text-align: left;
        margin-left: 100px;
        padding-left: 10px;
        padding-right: 15px;
    }

    .card-team {
        text-align: left;
        margin-top: 20px;
    }

    .breadcrumbs-block {
        margin-left: 15px;
        z-index: 2;
    }

    .main>.container {
        padding-left: 0;
        padding-right: 0;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
