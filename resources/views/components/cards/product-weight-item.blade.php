<div class="product-weight-item color-red lang {{ $active ? 'active' : '' }}">{{ $title }}</div>

@desktopcss
<style>
    .product-weight-title {
        margin-top: 20px;
    }

    .product-weight-block {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        row-gap: 10px;
    }

    .product-weight-item {
        display: flex;
        padding: 8px 25px;
        justify-content: center;
        align-items: center;
        gap: 5px;
        border-radius: 100px;
        border: 1px solid var(--color-red);
        margin-right: 15px;
        cursor: pointer;
        transition: .3s;
    }

    .product-weight-block .active {
        color: var(--color-white);
        background: var(--color-red);
    }

    .product-weight-item:hover {
        color: var(--color-white);
        background: var(--color-red);
    }
</style>
@mobilecss
<style>
.product-weight-title {
        margin-top: 20px;
    }

    .product-weight-block {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        row-gap: 8px;
    }

    .product-weight-item {
        display: flex;
        padding: 10px 16px;
        justify-content: center;
        align-items: center;
        gap: 5px;
        border-radius: 100px;
        border: 1px solid var(--color-red);
        margin-right: 15px;
        cursor: pointer;
        transition: .3s;
    }

    .product-weight-block .active {
        color: var(--color-white);
        background: var(--color-red);
    }

    .product-weight-item:hover {
        color: var(--color-white);
        background: var(--color-red);
    }
</style>
@endcss

@startjs
<script></script>
@endjs
