<?php $s = new Single('Социальные сети', 0, 2); ?>

<div class="container">
    <div class="big-social-section">
        <div class="big-social-card">

            <img src="{{ $s->field('Баннер 2', 'Картинка', 'photo', false, '/images/small-socia.png') }}" alt=""
                class="big-social-card-img desktop">
            <img src="{{ $s->field('Баннер 2', 'Картинка моб', 'photo', false, '/images/small-socia-mobile.png') }}"
                alt="" class="big-social-card-img mobile">

            <div class="big-social-card-content">

                <div class="card-social-title h4 color-white">
                    {!! $s->field(
                        'Баннер 2',
                        'Заголовок',
                        'textarea',
                        true,
                        'Follow us on social networks so you don\'t miss news and promotions',
                    ) !!}
                </div>
                <div class="card-social-desc extra-text color-white">
                    {!! $s->field(
                        'Баннер 2',
                        'Описание',
                        'textarea',
                        true,
                        'Subscribe and be the first to know all the news! Get discounts and prizes',
                    ) !!}
                </div>

                @php
                    $social = $s->field('Соц сети', 'Соц сети', 'repeat', false);
                    $social_items = [];
                    foreach ($social as $elm) {
                        $social_items[] = [$elm->field('Изображение', 'photo', ''), $elm->field('Текст', 'text', ''), $elm->field('Ссылка', 'text', '')];
                    }
                @endphp

                <div class="social-icons">
                    @foreach ($social_items as $social_item)
                        <a href="{{ $social_item[2] }}" target="_blank" class="btn-social color-white button-small">
                            <div class="social-text">
                                <img src="{{ $social_item[0] }}" alt="" class="social-img icon-instagram">
                                <div class="social-text-icon desktop">{{ $social_item[1] }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <x-cards.small-card-image :image="$s->field('Баннер 2', 'Картинка 2', 'photo', true, '/images/small-social-card2.png')" :imagemob="$s->field('Баннер 2', 'Картинка 2 моб', 'photo', true, '/images/small-social-card2-mob.png')" />
    </div>
</div>

@desktopcss
<style>
    .big-social-section {
        display: flex;
    }

    .big-social-card {
        display: block;
        position: relative;
        width: 1440px;
        height: 550px;
        margin-top: 0;
    }

    .big-social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 720px;
        height: 550px;
        object-fit: containe;
    }

    .big-social-card-content {
        display: block;
        position: absolute;
        z-index: 1;
        padding-left: 80px;
        padding-right: 80px;
        padding-top: 138px;
        padding-bottom: 156px;
    }

    .card-social-title {
        display: flex;
        justify-content: flex-start;
        text-transform: uppercase;
    }

    .card-social-desc {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
    }

    .social-icons {
        display: flex;
        justify-content: flex-start;
        margin-top: 40px;
    }

    .btn-social {
        display: inline-block;
        align-items: center;
        padding: 8px 20px;
        margin-right: 20px;
        align-items: center;
        border-radius: 8px;
        border: 1px solid var(--white, #FFF);
        transition: .3s;
    }

    .btn-social:hover {
        color: var(--color-red);
        background: var(--color-white);
        transition: .3s;
    }

    .social-text {
        display: flex;
        justify-content: flex-start;
    }

    .social-img {
        width: 18px;
        height: 18px;
        margin-right: 10px;
        margin-top: 3.5px;
        text-decoration: none;
        filter: brightness(100);
    }

    .btn-social:hover .icon-instagram {
        filter: brightness(1);
    }
</style>
@mobilecss
<style>
    .big-social-card {
        display: block;
        position: relative;
        width: 100%;
        height: 417px;
        margin-top: 0;
    }

    .big-social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 417px;
        object-fit: containe;
    }

    .big-social-card-content {
        display: block;
        position: absolute;
        z-index: 1;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 72px;

    }

    .card-social-title {
        display: flex;
        justify-content: flex-start;
        text-transform: uppercase;
        width: 100%;
    }

    .card-social-desc {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
        width: 100%;
    }

    .social-icons {
        display: flex;
        justify-content: flex-start;
        margin-top: 48px;
    }

    .btn-social {
        display: inline-block;
        align-items: center;
        padding: 8px 20px;
        margin-right: 20px;
        align-items: center;
        border-radius: 8px;
        border: 1px solid var(--white, #FFF);
        transition: .3s;
    }

    .btn-social:hover {
        color: var(--color-red);
        background: var(--color-white);
        transition: .3s;
    }

    .social-text {
        display: flex;
        justify-content: flex-start;
    }

    .social-img {
        width: 18px;
        height: 18px;
        margin-top: 3.5px;
        text-decoration: none;
        object-fit: contain;
        filter: brightness(100);
    }

    .btn-social:hover .icon-instagram {
        content: url('/images/icons/instagram-red.svg')
    }

    .btn-social:hover .icon-video {
        content: url('/images/icons/video-red.svg')
    }

    .btn-social:hover .icon-facebook {
        content: url('/images/icons/facebook-red.svg')
    }
</style>
@endcss

@startjs
<script></script>
@endjs
