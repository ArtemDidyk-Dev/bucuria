<div class="cert-big-card-wrapper">
    <img src="/images/ingradient-group.png" alt="" class="cert-big-card-img">

    <div class="cert-big-card">
        <div class="cert-big-card-content">
            <div class="cert-big-card-title h3 color-white">
                {{ $title }}
            </div>

            <div class="cert-big-card-desc main-text color-white">
                {!! $description !!}

            </div>
        </div>
    </div>
</div>


@desktopcss
<style>
    .cert-big-card-wrapper {
        position: relative;
    }

    .cert-big-card {
        display: block;
        position: relative;
        z-index: 1;
        width: auto;
        /* height: 991px; */
        padding: 100px 80px;
    }

    .cert-big-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 1440px;
        height: 100%;
        object-fit: cover;
    }

    .cert-big-card-title {
        display: flex;
        justify-content: flex-start;
        width: 1000px;
        text-transform: uppercase;
    }

    .cert-big-card-desc {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 1000px;
    }

    .cert-big-card-desc p {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .cert-big-card-desc li {
        margin-bottom: 10px;
        margin-left: 50px;
    }

    .cert-big-card-desc li:last-child {
        margin-bottom: 0;
    }
</style>
@mobilecss
<style>
    .cert-big-card {
        display: block;
        position: relative;
        z-index: 1;
        width: auto;
        height: 100%;
        padding: 59px 15px;
    }

    .cert-big-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: auto;
        height: 100%;
        object-fit: cover;
    }

    .cert-big-card-title {
        display: flex;
        justify-content: flex-start;
        width: 100%;
        text-transform: uppercase;
    }

    .cert-big-card-desc {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 100%;
    }

    .cert-big-card-desc p {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .cert-big-card-desc li {
        margin-bottom: 10px;
        margin-left: 15px;
    }

    .cert-big-card-desc li:last-child {
        margin-bottom: 0;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
