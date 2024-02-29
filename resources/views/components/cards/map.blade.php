<?php $s = new Single('О нас', 10, 1); ?>

<div class="map-block">
    <div class="map-title h3 color-white">{!! Field::enter_to_br($s->field('Карта', 'Заголовок', 'textarea', true, '50 countries')) !!}</div>
    <div class="map-description extra-text color-white">{!! Field::enter_to_br($s->field('Карта', 'Описание', 'textarea', true, 'The products are presented in Ukraine, USA, Canada, Europe, Georgia, China, Japan, Korea, Kazakhstan, Armenia and other countries.')) !!}</div>
    <img src="/images/map.svg" class="map-img desktop">
    <img src="/images/map-mob.svg" class="map-img mobile">
</div>


@desktopcss
<style>
    .map-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        width: 100%;
        height: 1111px;
        background: var(--color-red);
        padding: 100px 20px 100px 20px;
    }

    .map-title {
        margin-bottom: 15px;
    }

    .map-description {
        margin-bottom: 60px;
        width: 712px;
    }

    .map-img {
        width: 1400px;
        height: 700px;
        object-fit: cover
    }
</style>
@mobilecss
<style>
    .map-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        left: 0;
        margin-left: 0;
        width: 100%;
        height: 467px;
        background: var(--color-red);
        padding: 60px 15px 100px 15px;
    }

    .map-title {
        margin-bottom: 15px;
    }

    .map-description {
        margin-bottom: 40px;
        width: 100%;
    }

    .map-img {
        width: 100%;
        height: 467px;
        object-fit: contain
    }
</style>
@endcss

@startjs
<script></script>
@endjs
