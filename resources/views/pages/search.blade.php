<x-layout>

    <?php $s = new Single('Поиск', 0, 1); ?>

    <div class="container mb">

        <div class="breadcrumbs-block">
            <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                [
                    'title' => $s->field('Поиск', 'Описание', 'text', true, 'Search results for') . ' `' . $value . '`',
                    'link' => '',
                ],
            ]" />
        </div>

        <div class="banner">
            <div class="baner-image">
                <img src="{{ $s->field('Поиск', 'Банер', 'photo', false, '/images/search-baner.png') }}" alt=""
                    class="banner-img">
                <div class="gradient-banner"></div>
            </div>
            <div class="banner-content">
                <div class="banner-title h2 color-white">
                    {{ $s->field('Поиск', 'Заголовок', 'text', true, 'Search') }}
                </div>

                <div class="banner-desc subtitle color-white">
                    {{ $s->field('Поиск', 'Описание', 'text', true, 'Search results for') }} "{{ $value }}"
                </div>
            </div>
        </div>

        <div id="content-block">
            <x-cards.card-items :items="$products" />
        </div>

        <div id="pagination">
            <x-inc.pagination :count="$count" :page="$page" :pagesize="$pagesize" :paglink="$paglink"
                :showmore="true" />
        </div>

    </div>


    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Search') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Search') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Search') }}
    </x-slot>

</x-layout>

@desktopcss
<style>
    .breadcrumbs-block {
        margin-left: 80px;
        position: absolute;
        z-index: 2;
    }

    .small-card-section {
        display: flex;
        justify-content: flex-start;

    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .banner {
        display: block;
        height: 450px;
        position: relative;
        padding-top: 167px;
        margin-bottom: 50px;
    }

    .banner-img {
        display: block;
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;
        object-fit: cover;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        z-index: 1;
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

    #content-block {
        padding: 0 80px;
    }
</style>
@mobilecss
<style>
    .banner {
        display: block;
        width: auto;
        height: 500px;
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
        height: 460px;
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
        padding-top: 70px;
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
        margin-top: 70px;
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

    .breadcrumbs-block {
        position: absolute;
        z-index: 2;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
