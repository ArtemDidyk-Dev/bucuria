<x-layout>
    <?php $s = new Single('Контакты', 10, 1); ?>

    <div class="main">
        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Хлебные крошки', 'Текст', 'text', true, 'About Us'),
                        'link' => '',
                    ],
                ]" />
            </div>
            <div class="container">
                <div class="banner">
                    <div class="baner-image">
                        <img src="{{ $s->field('Баннер', 'Картинка', 'photo', false, '/images/career-img.png') }}"
                            alt="" class="banner-img">
                        <div class="gradient-banner"></div>
                    </div>
                    <div class="banner-content">
                        <div class="banner-title h1 color-white">
                            {{ $s->field('Баннер', 'Заголовок', 'textarea', true, 'career') }}
                        </div>
                        <div class="banner-desc subtitle color-white">
                            {{ $s->field('Баннер', 'Описание', 'textarea', true, 'If you are talented, have unique abilities, are not afraid of bold decisions - welcome to our team of like-minded people!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @foreach ($s->field('Контакты', 'Контакты', 'repeat', true) as $contactsItem)
                <div class="contact-big-card">
                    <div class="contact-title h5 color-red">
                        {{ $contactsItem->field('Заголовок', 'text', '') }}
                    </div>
                    <div class="contact-big-block">
                        @foreach ($contactsItem->field('Блок контактов', 'repeat', '') as $contactsItemBlock)
                            <div class="contact-block">
                                <div class="contact-block-label">
                                    {{ $contactsItemBlock->field('Заголовок', 'text', '') }}
                                </div>
                                <div class="contact-block-data">

                                    @php $phone1 = $contactsItemBlock->field('Номер 1', 'text', '') @endphp
                                    @if (!empty($phone1))
                                        <a href="tel:{{ Field::phone($phone1) }}"
                                            class="extra-text contact-li color-black">{{ Field::phone($phone1) }}</a>
                                    @endif

                                    @php $phone2 = $contactsItemBlock->field('Номер 2', 'text', '') @endphp
                                    @if (!empty($phone2))
                                        <a href="tel:{{ Field::phone($phone2) }}"
                                            class="extra-text contact-li color-black">{{ Field::phone($phone2) }}</a>
                                    @endif

                                    @php $email = $contactsItemBlock->field('Email', 'text', '') @endphp
                                    <a href="mailto:{{ $email }}"
                                        class="extra-text contact-li color-black">{{ $email }}</a>

                                    <div class="extra-text contact-li color-black">
                                        {{ $contactsItemBlock->field('Время работы', 'text', '') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @php
                            $mapLink = $contactsItem->field('Ссылка на местоположение', 'text', '');
                            $mapTitle = $contactsItem->field('Местоположение', 'text', '');
                        @endphp
                        @if (!empty($mapTitle))
                            <div class="google-maps-block">
                                <img src="/images/google-maps.svg" alt="" class="google-maps-icon">
                                <a href="{{ $mapLink }}" target="_blank"
                                    class="google-maps-title extra-text color-black">{{ $mapTitle }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="contact-form-blocks">

        <div class="container">
            <div class="contact-form-block">
                <div class="contact-title h3 color-white">
                    {{ $s->field('Форма обратной связи', 'Заголовок', 'text', true, 'Contact Form') }}</div>
                <div class="contact-desc extra-text color-white">
                    {{ $s->field('Форма обратной связи', 'Описание', 'textarea', true, 'Contact us and we will be happy to answer all your questions') }}
                </div>
                <div class="contact-form">
                    <x-inc.form nocv />
                </div>
            </div>
        </div>

    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Mainpage') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Mainpage') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Mainpage') }}
    </x-slot>


</x-layout>
@desktopcss
<style>
    .breadcrumbs-last {
        color: var(--color-white);
    }

    .banner-title,
    .banner-desc {
        width: 900px;
        margin: 0 auto;
    }

    .contact-big-card {
        display: inline-flex;
        padding: 50px 80px;
        align-items: flex-start;
        background: var(--color-skin);
        width: 100%;
        border: none;
        border-bottom: 1px solid var(--color-white);
    }

    .contact-big-block {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        margin-left: 135px;
    }

    .contact-block {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        margin-top: 25px
    }

    .contact-block-data {
        display: flex;
        justify-content: flex-start;
        margin-top: 4px;
    }

    .contact-title {
        width: 350px;
    }

    .contact-li {

        margin-right: 25px;
    }

    .contact-li:last-child {
        margin-left: 0;
    }

    .google-maps-block {
        display: flex;
        align-items: center;
    }

    .google-maps-icon {
        width: 45px;
        height: 45px;
    }

    .google-maps-title {
        width: 300px;
        margin-left: 20px;
    }

    .contact-block-label {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
        margin-bottom: 4px;
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
    .contact-big-card {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 25px 15px;
        align-items: flex-start;
        background: var(--color-skin);
        width: 100%;
        border: none;
        border-bottom: 1px solid var(--color-white);
    }

    .contact-big-block {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
    }

    .contact-block {
        display: flex;
        flex-direction: column;
        align-content: flex-start;
    }

    .contact-block-data {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        margin-top: 4px;
    }

    .contact-title {
        width: 290px;
    }

    .contact-li {
        margin-bottom: 8px;
    }

    .contact-li:last-child {
        margin-left: 0;
    }

    .breadcrumbs-block {
        margin-left: 15px;
    }

    .banner {
        display: block;
        width: auto;
        height: 390px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        object-fit: cover;
        width: auto;
        height: 530px;
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

    .containercheckbox {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 100%;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-left: 30px;
        transition: .3s;
    }

    .containercheckbox a {
        display: inline;
        color: var(--color-grey);
        text-decoration: underline;
    }

    .containercheckbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 1px;
        width: 1px;
    }

    .checkmark {
        position: absolute;
        top: 15px;
        transform: translateY(-50%);
        left: 0;
        height: 20px;
        width: 20px;
        background-color: var(--color-white);
        transition: .3s;
        border-radius: 2px;
    }

    .checkbox-filter .checkmark {
        background: var(--color-black);
        border: 1px solid var(--color-stroke);
    }

    .checkbox-filter:hover .containercheckbox {
        color: var(--color-black);
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .containercheckbox input:checked~.checkmark:after {
        display: block;
        opacity: 1;
    }

    .containercheckbox input:checked~.checkmark {
        background: var(--color-white);
    }

    .checkbox-filter .containercheckbox input:checked~.checkmark {
        background: var(--color-white);
    }

    .containercheckbox .checkmark:after {
        left: 50%;
        top: calc(50% - 2px);
        transform: translate(-50%, -50%) rotate(45deg);
        width: 4px;
        height: 8px;
        border: solid var(--color-black);
        border-width: 0 2.1px 2.1px 0;
        transition: .3s;
        z-index: 10;
    }

    .btn-submit {
        width: 290px;
        padding: 12px 15px;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 8px;
        background: var(--color-white);
    }

    .contact-form-block {
        padding: 60px 15px;
        background: url(/images/contact-mobile.png);
    }

    .form-input-block {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .button-block {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-top: 40px
    }

    .input-block {
        display: flex;
        flex-direction: column;
        width: 290px;
    }

    .input {
        box-sizing: border-box;
        background: none;
        border: none;
        border-bottom: 1px solid var(--color-white);
        padding: 12px 10px 10px 0;
    }

    input::placeholder {
        color: var(--color-white);
    }

    .label-input {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
    }

    .contact-form-blocks .container {
        padding-left: 0;
        padding-right: 0;
    }

    .main>.container {
        padding-left: 0;
        padding-right: 0;
    }

    .contact-block-label {
        font-family: "Istok Web", sans-serif ;
        font-size: 11px;
        font-style: normal;
        font-weight: 700;
        line-height: 19px;
        text-transform: uppercase;
        margin-top: 20px;
    }

    .google-maps-block {
        display: flex;
        align-items: center;
    }

    .google-maps-icon {
        width: 35px;
        height: 35px;
    }

    .google-maps-title {
        width: 240px;
        margin-left: 15px;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
