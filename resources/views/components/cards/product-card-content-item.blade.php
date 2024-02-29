<div class="product-card-content-item">
    <div class="product-card-content-item-title extra-text">{{ $title }}</div>
    <div class="product-card-line extra-text"></div>
    <div class="product-card-content-item-value extra-text">{{ $value }}</div>
</div>

@desktopcss
<style>
    .product-card-line {
        content: '';
        display: flex;
        flex: 1;
        margin: 0 10px;
        margin-bottom: 5px;
        border: none;
        border-bottom: 1.5px dashed #1F1F1F;
    }
    
    .product-card-content-item {
        width: 100%;
        display: flex;
        justify-content: space-between;

    }
</style>
@mobilecss
<style>
.product-card-line {
        content: '';
        display: flex;
        flex: 1;
        margin: 0 10px;
        margin-bottom: 5px;
        border: none;
        border-bottom: 1.5px dashed #1F1F1F;
    }
    
    .product-card-content-item {
        width: 100%;
        display: flex;
        justify-content: space-between;

    }
</style>
@endcss

@startjs
<script></script>
@endjs