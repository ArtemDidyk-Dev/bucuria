<a href="{{ route('ingradient', [$ingradient->slug], false) }}" class="ingradient-link">
    <img src="{{ $ingradient->image }}" alt="" class="ingradient-card-img">
    <div class="ingradient-contnet-card">
        <div class="ingradient-content">
            <div class="ingradient-title h4 color-white">
                {{ $ingradient->title }}
            </div>
        </div>
    </div>
</a>
@desktopcss
<style>
    .ingradient-contnet-card {
        opacity: 0;
        transition: .3s;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        height: 420px;
        background: rgba(0, 0, 0, 0.60);
    }

    .ingradient-link:hover .ingradient-contnet-card {
        opacity: 1;
    }

    .ingradient-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 420px;
        object-fit: cover;
    }

    .ingradient-link {
        display: block;
        position: relative;
        z-index: 1;
        width: 25%;
        height: 420px;
        overflow: hidden;
    }

    .ingradient-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
        margin: 42px 30px 8px 30px;
    }

    .ingradient-description {
        margin: 0 30px 48px 30px;
    }
</style>
@mobilecss
<style>
 .ingradient-contnet-card {
        opacity: 0;
        transition: .3s;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        height: 350px;
        background: rgba(0, 0, 0, 0.60);
    }

    .ingradient-link:hover .ingradient-contnet-card {
        opacity: 1;
    }

    .ingradient-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 320px;
        height: 350px;
        object-fit: cover;
    }

    .ingradient-link {
        display: block;
        position: relative;
        z-index: 1;
        width: 320px;
        height: 350px;
        overflow: hidden;
    }

    .ingradient-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
        margin: 48px 15px 8px 15px;
    }

    .ingradient-description {
        margin: 0 30px 48px 30px;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
