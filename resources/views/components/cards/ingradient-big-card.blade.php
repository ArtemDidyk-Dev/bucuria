<div class="ingradient-big-card">
    <img src="/images/ingradient-group.png" alt="" class="ingradient-big-card-img">

    <div class="ingradient-big-card-content">
        <div class="ingradient-big-card-title h3 color-white">
            {{ $title }}
        </div>

        <div class="ingradient-big-card-desc main-text color-white">
            {!! $description !!}

        </div>
    </div>
</div>

@desktopcss
<style>
    .ingradient-big-card {
        display: block;
        position: relative;
        z-index: 1;
        width: auto;
        height: 991px;
    }

    .ingradient-big-card-img {
        display: block;
        position: absolute;
        z-index: -1;
        width: 1440px;
        height: 991px;
        object-fit: cover;
    }

    .ingradient-big-card-content {
        padding: 59px 80px;
    }

    .ingradient-big-card-title {
        display: flex;
        justify-content: flex-start;
        width: 100%;
        text-transform: uppercase;
    }

    .ingradient-big-card-desc {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 100%;
    }

    .ingradient-big-card-desc p {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .ingradient-big-card-desc li {
        margin-bottom: 10px;
    }

    .ingradient-big-card-desc li:last-child {
        margin-bottom: 0;
    }
</style>
@mobilecss
<style>
    .ingradient-big-card {
        display: block;
        position: relative;
        z-index: 1;
        width: 100%;
    }

    .ingradient-big-card-img {
        display: block;
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ingradient-big-card-content {
        padding: 59px 25px;
    }

    .ingradient-big-card-title {
        display: flex;
        justify-content: flex-start;
        width: 100%;
        text-transform: uppercase;
    }

    .ingradient-big-card-desc {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 100%;
    }

    .ingradient-big-card-desc h3 {
        font-family: Taviraj;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: 34px;
        text-transform: uppercase;
    }

    .ingradient-big-card-desc p {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .ingradient-big-card-desc li {
        margin-bottom: 10px;
    }

    .ingradient-big-card-desc li:last-child {
        margin-bottom: 0;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
