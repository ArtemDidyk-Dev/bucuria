<x-layout>

    <?php $s = new Single('404', 0, 1);
    ?>

    <div class="error-404">

        <div class="breadcrumbs-404 container">
            <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                [
                    'title' => $s->field('Хлебные крошки', 'Текст', 'textarea', true, '404'),
                    'link' => '',
                ],
            ]" />
        </div>


        <div class="error-404-main">
            <div class="error-404-content container">

                <img src="/images/404.png" alt="" class="error-404-image desktop">
                <img src="/images/mobile-404.png" alt="" class="error-404-image mobile">

                <div class="error-404-content-inner">
                    <div class="color-red error-404-title">
                        {{ $s->field('Заголовок', 'Текст', 'textarea', true, '404 error') }}
                    </div>

                    <div class="main-text color-black error-404-description">
                        {{ $s->field(
                            'Описание',
                            'Текст',
                            'textarea',
                            true,
                            " Unfortunately, we did not find the page you are looking for.
                                                                                                                                                                                                                                                                    It may have been deleted or we haven't created it yet.",
                        ) }}
                    </div>

                    <div class="btn-section-404">
                        <x-inputs.btn-card class="btn-home color-red" :link="route('home', [], false)">
                            {{ $s->field('Кнопка 1', 'Текст', 'text', true, 'main page') }}</x-inputs.btn-card>
                        <x-inputs.btn-card class='btn-catalog color-white' :link="route('catalog', [], false)">
                            {{ $s->field('Кнопка 2', 'Текст', 'text', true, 'go to catalog') }}</x-inputs.btn-card>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | 404') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | 404') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | 404') }}
    </x-slot>

</x-layout>
