<x-layout>
    @if($access)
        <div class="standart">
            <div class="container">
                <x-inc.access :page="$page"/>
            </div>
        </div>
    @else
    <section class="standart">

        <div class="breadcrumbs-block">
            <x-inc.breadcrumbs :breadcrumbs="[
                [
                    'title' => $page->title,
                    'link' => '',
                ],
            ]" />
        </div>

        <div class="container">
            <div class="standart-inner">
                <div class="standart-content">
                    <div class="content">
                        <h1 class="h2 color-text color-black">{{ $page->title }}</h1>
                        {!! $page->content !!}
                        @if($page->file)
                            <x-inputs.download href="{{$page->file}}">
                                {{$page->button_text}}
                            </x-inputs.download>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-slot name="meta_title">
        {{ $page->meta_title }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $page->meta_description }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $page->meta_keywords }}
    </x-slot>
    @endif
</x-layout>

@desktopcss
<style>
    .download {
        margin-left: -14px;
    }
    .standart {
        padding-left: 80px;
        padding-right: 80px;
    }

    .standart-title {
        width: 900px;
        margin-top: 40px
    }

    .description-standart {
        width: 900px;
        margin-top: 15px;
    }

    .content {
        padding-bottom: 80px;
    }

    .content p,
    .content ul,
    .content ol,
    .content li,
    .content h2,
    .content h3,
    .content h4,
    .content h5 {
        width: 1000px;
    }

    .content h2 {
        font-size: 46px;
        font-family: Taviraj;
        font-style: normal;
        font-weight: 600;
        line-height: 58px;
        text-transform: uppercase;
        color: var(--color-black);
        margin-top: 40px;
    }

    .content h3 {
        font-size: 30px;
        font-family: Taviraj;
        font-style: normal;
        font-weight: 600;
        line-height: 42px;
        text-transform: uppercase;
        color: var(--color-black);
        margin-top: 40px;
    }

    .content p {
        font-size: 18px;
        font-family: "Istok Web", sans-serif ;
        font-style: normal;
        font-weight: 300;
        line-height: 30px;
        margin-top: 15px;
    }

    .content li {
        margin-top: 15px;
        font-size: 18px;
        font-family: "Istok Web", sans-serif ;
        font-style: normal;
        font-weight: 300;
        line-height: 30px;
        margin-left: 50px;
    }

    .content li::marker {
        color: var(--color-red);
    }

    .content li span {
        color: var(--color-black);
    }

    .content figure {
        margin: 0;
    }
    .access  {
        width: 361px;
        margin: 0 auto;
        padding: 60px 0;
    }
</style>
@mobilecss
<style>
    .access  {
        width: 100%;
        padding: 114px 0 30px 0;
    }
    .access form button {
        width: 100%;
        margin-top: 0px;
    }
    .standart {
        padding-left: 15px;
        padding-right: 15px;
    }

    .standart-title {
        width: 290px;
        margin-top: 40px
    }

    .description-standart {
        width: 290px;
        margin-top: 15px;
    }

    .content {
        padding-bottom: 80px;
    }

    .content p,
    .content ul,
    .content ol,
    .content li,
    .content h2,
    .content h3,
    .content h4,
    .content h5 {
        width: 290px;
    }

    .content h2 {
        font-family: Taviraj;
        font-size: 28px;
        font-style: normal;
        font-weight: 500;
        line-height: 38px;
        text-transform: uppercase;
        color: var(--color-black);
        margin-top: 40px;
    }

    .content h3 {
        font-family: Taviraj;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: 34px;
        text-transform: uppercase;
        color: var(--color-black);
        margin-top: 40px;
    }

    .content p {
        font-family: "Istok Web", sans-serif ;
        font-size: 16px;
        font-style: normal;
        font-weight: 300;
        line-height: 26px;
        margin-top: 15px;
    }

    .content li {
        margin-top: 15px;
        font-size: 18px;
        font-family: "Istok Web", sans-serif ;
        font-style: normal;
        font-weight: 300;
        line-height: 30px;
        margin-left: 35px;
        width: 253px;
    }

    .content li::marker {
        color: var(--color-red);
    }

    .content li span {
        color: var(--color-black);
    }

    .content figure {
        margin: 0;
    }

    .breadcrumbs-link {
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 16px;
        color: var(--color-black);
        display: inline;
    }

    .breadcrumbs-last {
        color: var(--color-grey);
    }
</style>
@endcss
