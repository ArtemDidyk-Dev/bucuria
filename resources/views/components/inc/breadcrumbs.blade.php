<div {{ $attributes->merge(['class' => 'breadcrumbs ' . $type]) }}>
    <div class="container">
        <ul class="breadcrumbs-inner ">
            @foreach ($breadcrumbs as $index => $item)
                <li class="breadcrumbs-item">
                    @if ($index < sizeof($breadcrumbs) - 1)
                        <a href="{{ $item['link'] }}" class="breadcrumbs-link little-text color-grey">
                            {{ $item['title'] }}
                        </a>
                    @else
                        <div class="breadcrumbs-link breadcrumbs-last cookie">
                            {{ $item['title'] }}
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>


<script type="application/ld+json">
    @json($json)
</script>


@desktopcss
<style>
    .breadcrumbs {
        background: var(--color-back-and-stroke);
        margin-top: 30px;
        margin-bottom: 40px;
        padding: 5px var(--offset);
        position: relative;
        z-index: 1;
    }

    .breadcrumbs-inner {
        display: inline;
        list-style: none;
    }

    .breadcrumbs-item {
        display: inline;
    }

    .breadcrumbs-link {
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 20px;
        display: inline;
    }

    .breadcrumbs-link::after {
        content: url(/images/icons/breadcrumbs-arrow.svg);
        display: inline-block;
        margin: 0 2.1px;
    }

    .breadcrumbs-last::after {
        display: none;
    }

    .breadcrumbs-last {
        color: var(--color-light-grey);
    }
</style>
@mobilecss
<style>
    .breadcrumbs {
        background: var(--color-back-and-stroke);
        margin-bottom: 25px;
        padding: 7px 0;
    }

    .breadcrumbs-inner {
        display: inline;
        list-style: none;
    }

    .breadcrumbs-item {
        display: inline;
    }

    .breadcrumbs-link {
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 16px;
        color: var(--color-white);
        display: inline;
    }

    .breadcrumbs-link::after {
        content: url(/images/icons/breadcrumbs-arrow.svg);
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 16px;
        color: var(--color-grey);
        margin: 0 2.5px;
    }

    .breadcrumbs-last::after {
        display: none;
    }

    .breadcrumbs-last {
        color: var(--color-light-grey);
    }
</style>
@endcss
