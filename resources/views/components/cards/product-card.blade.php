<a href="{{ route('product', [$item->slug], false) }}" class="card-product">

    @foreach ($item->tags as $tag)
        <div class="card-icon color-white">{{ $tag->title }}</div>
        <div class="card-icon-triangle"></div>
    @endforeach

    <img src="{{ $item->image }}" alt="">
    <div class="product-title color-black">{{ $item->title }}</div>
    <div class="product-description color-grey">{{ $item->weight ? $item->weight->title : '' }}</div>
</a>

@desktopcss
<style>
    .card-product {
        display: flex;
        position: relative;
        padding: 20px 15px;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 230px;
        gap: 10px;
        border-radius: 8px;
        background: var(--white, #FFF);
        box-shadow: 0px 4px 20px 2px #D8D8D8;
        margin-right: 32px;
        margin-bottom: 24px;
    }

    .card-product:nth-child(5n) {
        margin-right: 0;
    }

    .product-title {
        text-align: center;
        font-family: Urbanist;
        font-size: 15px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
    }

    .product-description {
        text-align: center;
        font-family: Urbanist;
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
    }

    .card-icon {
        display: block;
        position: absolute;
        width: 52px;
        height: 26px;
        left: -10px;
        padding: 5px 10px;
        background: var(--color-red);
        z-index: 1;
        text-align: center;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: 16px;
        text-transform: uppercase;
    }

    .card-icon-triangle {
        position: absolute;
        width: 5.944px;
        height: 12.962px;
        left: -6px;
        top: 40px;
        transform: rotate(-60deg);
        flex-shrink: 0;
        background: #960003;
        z-index: -1;
    }
</style>
@mobilecss
<style>
    .card-product {
        display: flex;
        position: relative;
        padding: 20px 15px;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 140px;
        border-radius: 8px;
        background: var(--white, #FFF);
        box-shadow: 0px 4px 20px 2px #D8D8D8;
        margin-right: 10px;
        margin-bottom: 24px;
    }

    .card-product:nth-child(2n) {
        margin-right: 0;
    }

    .product-title {
        text-align: center;
        font-family: Urbanist;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    .product-description {
        text-align: center;
        font-family: Urbanist;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
    }

    .card-icon {
        display: block;
        position: absolute;
        width: 52px;
        height: 26px;
        left: -10px;
        padding: 5px 10px;
        background: var(--color-red);
        z-index: 1;
        text-align: center;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: 16px;
        text-transform: uppercase;
    }

    .card-icon-triangle {
        position: absolute;
        width: 5.944px;
        height: 12.962px;
        left: -6px;
        top: 40px;
        transform: rotate(-60deg);
        flex-shrink: 0;
        background: #960003;
        z-index: -1;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
