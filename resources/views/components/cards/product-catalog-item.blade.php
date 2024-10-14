<div class="product-catalog-item">
    <img src="{{ $image }}" class="product-catalog-item-image">
    <div class="product-catalog-item-title {{ $active ? 'active' : '' }}">{{ $title }}</div>
</div>

@desktopcss
<style>
    .product-catalog-item-image {
        width: 70px;
        height: 70px;
        border-radius: 70px;
        object-fit: cover;
    }

    .product-catalog-item {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        align-content: center;
        text-align: center;
        margin-right: 22px;
        cursor: pointer;
    }

    .product-catalog-item-title {
        width: 70px;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
        font-family: "Istok Web", sans-serif ;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 18px;
        transition: .3s;
    }

    .product-catalog-item:hover {
        color: var(--color-red);
    }

    .product-catalog-item .active {
        color: var(--color-red);
    }
</style>
@mobilecss
<style>
    .product-catalog-item-image {
        width: 65px;
        height: 65px;
        border-radius: 65px;
        object-fit: cover;
    }

    .product-catalog-item {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        align-content: center;
        text-align: center;
        margin-right: 15px;
        cursor: pointer;
    }

    .product-catalog-item-title {
        width: 65px;
        text-align: center;
        font-family: "Istok Web", sans-serif ;
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: 17px;
        transition: .3s;
    }

    .product-catalog-item:hover {
        color: var(--color-red);
    }

    .product-catalog-item .active {
        color: var(--color-red);
    }
</style>
@endcss

@startjs
<script></script>
@endjs
