<a data-link="{{$item->slug}}" class="filter-product-item {{ $item->active ? 'active' : '' }}">
    <div class="filter-product-img-box">
        <img src="{{ $item->image }}" class="filter-product-img">
    </div>
    <div class="filter-product-item-title {{ $item->active ? 'active' : '' }}">{{ $item->title }}</div>
    @if($item->active)
        <span class="filter-product-close">
            &#10006;
        </span>
    @endif
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
        position: relative;
    }

    .filter-product-item:nth-child(6n) {
        margin-right: 0;
    }

    .filter-product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    .filter-product-img-box {
        width: 190px;
        height: 190px;
        border-radius: 50%;
        overflow: hidden;
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

    .filter-product-img {
        transition: .3s;
    }
    .filter-product-item {
        transition: .3s;
    }

    .filter-product-item-title.active,
    .filter-product-item:hover .filter-product-item-title {
        color: var(--color-red);
    }
    .filter-product-img-box {
        border: 3px solid transparent;
    }

    .filter-product-item:hover .filter-product-img-box{
        border: 3px solid #C81317;
    }
    .filter-product-img-box {
        transition: .3s;
    }
    .filter-product-item.active .filter-product-img-box {
        border: 3px solid #C81317;
    }

    .filter-product-item:hover .filter-product-img{
        object-position: right;
    }
    .filter-product-item:hover .filter-product-img-box {
        border: 3px solid #C81317;
    }

    .filter-product-close {
        color: #d94246;
        position: absolute;
        top: 0px;
        right: 0px;
        box-shadow: 0px -1px 39px 1px rgba(0, 0, 0, 0.42);
        width: 24px;
        height: 24px;
        border-radius: 50%;
        line-height: 27px;
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
        position: relative;
    }

    .filter-product-item:nth-child(11n) {
        margin-right: 0;
    }

    .filter-product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 70px;
        margin-bottom: 10px;
    }
    .filter-product-img-box {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 70px;
        margin-bottom: 10px;
        overflow: hidden;
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

    .filter-product-img-box {
        border: 2px solid transparent;
    }

    .filter-product-item:hover .filter-product-img-box{
        border: 2px solid #C81317;
    }
    .filter-product-img-box {
        transition: .3s;
    }
    .filter-product-item.active .filter-product-img-box {
        border: 2px solid #C81317;
    }

    .filter-product-item:hover .filter-product-img{
        transform: translateZ(-1px) scale(1.2);
    }
    .filter-product-item:hover .filter-product-img-box {
        border: 2px solid #C81317;
    }
    .filter-product-img {
        transition: .3s;
    }

    .filter-product-close {
        color: #d94246;
        position: absolute;
        box-shadow: 0px -1px 39px 1px rgba(0, 0, 0, 0.42);
        border-radius: 50%;
        width: 15px;
        height: 15px;
        right: -8px;
        font-size: 13px;
        line-height: 18px;
        top: -4px;
    }
</style>
@endcss
