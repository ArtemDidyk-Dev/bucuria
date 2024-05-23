<?php $s = new Single('Социальные сети', 0, 2); ?>

<img src="{{ $s->field('Баннер 1', 'Картинка', 'photo', false, '/images/mask-group.png') }}" alt=""
    class="social-card-img desktop">
<img src="{{ $s->field('Баннер 1', 'Картинка моб', 'photo', false, '/images/mobile-social-banner.png') }}" alt=""
    class="social-card-img mobile">

<div class="social-card">
    <div class="social-card-content">
        <div class="card-social-title h3 color-white">
            {!! Field::enter_to_br(
                $s->field('Баннер 1', 'Заголовок', 'textarea', true, 'Find out about great offers and personal discounts'),
            ) !!}
        </div>

        <div class="card-social-desc extra-text color-white">
            {!! Field::enter_to_br(
                $s->field(
                    'Баннер 1',
                    'Описание',
                    'textarea',
                    true,
                    'Subscribe and be the first to know all the news! Get discounts and prizes',
                ),
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

@desktopcss
<style>
    .social-card {
        display: block;
        position: relative;
        z-index: 1;
        width: auto;
        height: 350px;
        padding: 59px 80px;
    }

    .social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 1440px;
        height: 350px;
        object-fit: cover;
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

    /* .btn-social:hover .icon-video {
        content: url('/images/icons/video-red.svg')
    }

    .btn-social:hover .icon-facebook {
        content: url('/images/icons/facebook-red.svg')
    } */
</style>
@mobilecss
<style>
    .social-card {
        display: block;
        position: relative;
        z-index: 1;
        width: auto;
        height: 597px;
        padding: 59px 15px;
    }

    .social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: 0;
        width: 100%;
        height: 597px;
        object-fit: cover;
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

    .social-card-content h3 {
        font-family: Taviraj;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 32px;
        text-transform: uppercase;
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
        filter: brightness(100);
    }
</style>
@endcss

@startjs
<script></script>
@endjs
