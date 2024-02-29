<a href="{{ Lang::link($link) }}" class="small-card-wrapper card-link">
    <img src="{{ $image }}" alt="" class="small-card-img">
    <div class="small-card-img-gradient"></div>
    <div class="small-card">
        <div class="container">
            <div class="card-content">
                <div class="small-card-title h5 color-white">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</a>
@desktopcss
<style>
    .small-card {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding-bottom: 20px;
        height: 580px;
    }

    .small-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 580px;
        object-fit: cover;
        transition: .3s;
    }

    .small-card-img-gradient {
        display: block;
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 580px;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 53.33%, rgba(0, 0, 0, 0.49) 80.73%);
        pointer-events: none
    }

    .small-card-wrapper:hover .small-card-img {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }

    .card-link {
        display: block;
        position: relative;
        z-index: 1;
        width: 100%;
        height: 580px;
        overflow: hidden;
    }

    .small-card-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }
</style>
@mobilecss
<style>
    .small-card {
        display: block;
        padding-top: 450px;
        padding-bottom: 20px;
    }

    .small-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .3s;
    }

    .small-card-img:hover {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }

    .card-link {
        display: block;
        z-index: 1;
        width: 100%;
        height: 500px;
        overflow: hidden;
        position: relative;
    }

    .card-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }

    .small-card-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }

    .small-card-img-gradient {
        display: block;
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 53.33%, rgba(0, 0, 0, 0.49) 80.73%);
        pointer-events: none
    }
</style>
@endcss

@startjs
<script></script>
@endjs
