<x-layout>

    <?php $s = new Single('Найти нас', 10, 1); ?>

    <div class="main">

        <div class="container">

            <div class="breadcrumbs-block">
                <div class="main">
                    <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                        [
                            'title' => $s->field('Хлебные крошки', 'Текст', 'text', true, 'Find us'),
                            'link' => '',
                        ],
                    ]" />
                </div>
            </div>

            <x-cards.big-image-card 
                :title="$s->field('Баннер 1','Заголовок','textarea',true,'Retail store addresses')" 
                :image="$s->field('Баннер 1', 'Картинка', 'photo', false, '/images/card-image1.png')"
                :imagemob="$s->field('Баннер 1', 'Картинка моб', 'photo', false, '/images/card-image1-mob.png')" 
                center 
                :btn-text="$s->field('Баннер 1','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 1','Кнопка ссылка','text',false,'/shopes')" 
                gradient 
            />
        </div>

        <div class="container">
            <x-cards.big-image-card 
                :title="$s->field('Баннер 2', 'Заголовок', 'textarea', true, 'Online stores')" 
                :image="$s->field('Баннер 2', 'Картинка', 'photo', true, '/images/card-coffe.png')" 
                :imagemob="$s->field('Баннер 2', 'Картинка моб', 'photo', true, '/images/card-coffe-mob.png')" 
                :btn-text="$s->field('Баннер 2','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 2','Кнопка ссылка','text',false,'/catalog')"  
                center 
                gradient 
            />
        </div>

        <div class="container">
            <x-cards.big-image-card 
                :title="$s->field('Баннер 3', 'Заголовок', 'textarea', true, 'Offices and representative offices of the company')" 
                :image="$s->field('Баннер 3', 'Картинка', 'photo', false, '/images/image-card3.png')" 
                :imagemob="$s->field('Баннер 3', 'Картинка моб', 'photo', false, '/images/image-card3-mob.png')" 
                center
                :btn-text="$s->field('Баннер 3','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 3','Кнопка ссылка','text',false,'/contacts')"  
                gradient 
            />
        </div>

        <div class="container">
            <x-cards.big-image-card 
                :title="$s->field('Баннер 4', 'Заголовок', 'textarea', true, 'Partners')" 
                :image="$s->field('Баннер 4', 'Картинка', 'photo', false, '/images/image-card3.png')" 
                :imagemob="$s->field('Баннер 4', 'Картинка моб', 'photo', false, '/images/image-card3-mob.png')" 
                center
                :btn-text="$s->field('Баннер 4','Кнопка текст','text',true,'Read more')"
                :link="$s->field('Баннер 4','Кнопка ссылка','text',false,'/suppliers')"  
                gradient 
            />
        </div>
    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Find us') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Find us') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Find us') }}
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

</style>
@mobilecss
<style>

    .breadcrumbs-block {
        margin-left: 15px;
        z-index: 2;
        position: absolute;
    }

    .breadcrumbs-last {
        color: var(--color-white);
    }

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
</style>
@endcss

@startjs
<script></script>
@endjs
