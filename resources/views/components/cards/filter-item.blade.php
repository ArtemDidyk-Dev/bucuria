<a href="{{ route('catalog', [$item->slug], false) }}" class="filter-product-item">
    <img src="{{ $item->image }}" class="filter-product-img">
    <div class="filter-product-item-title {{ $item->active ? 'active' : '' }}">{{ $item->title }}</div>
</a>

@desktopcss

<style>
    .filter-product-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 190px;
        margin-right: 28px;
        margin-bottom: 35px;
        cursor: pointer;
    }

    .filter-product-item:nth-child(6n) {
        margin-right: 0;
    }

    .filter-product-img {
        width: 190px;
        height: 190px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .filter-product-item-title {
        display: flex;
        width: 190px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: var(--color-black);
        text-align: center;
        font-family: Urbanist;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 18px;
        transition: .3s;
    }

    .filter-product-item-title.active,
    .filter-product-item:hover .filter-product-item-title {
        color: var(--color-red);
    }
</style>

@mobilecss
<style>
    .filter-product-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 70px;
        margin-right: 22px;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .filter-product-item:nth-child(11n) {
        margin-right: 0;
    }

    .filter-product-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 70px;
        margin-bottom: 10px;
    }

    .filter-product-item-title {
        display: flex;
        width: 70px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: var(--color-black);
        text-align: center;
        font-family: Urbanist;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 18px;
        transition: .3s;
    }

    .filter-product-item-title.active,
    .filter-product-item:hover .filter-product-item-title {
        color: var(--color-red);
    }
</style>
@endcss
