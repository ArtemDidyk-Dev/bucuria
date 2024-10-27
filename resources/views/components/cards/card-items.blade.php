<div class="content-product">
    @if (count($items) > 0)
        @foreach ($items as $item)
            <x-cards.product-card :item="$item" />
        @endforeach
    @else
        <div class="h5 color-black">Nothing not found!</div>
    @endif
</div>

@desktopcss
<style>
    .content-product {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        margin-left: -24px;
    }
</style>
@mobilecss
<style>
    .content-product {
        display: flex;
        flex-wrap: wrap;

    }
</style>
@endcss

@startjs
<script></script>
@endjs
