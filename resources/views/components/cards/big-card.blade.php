<div class="big-card">

    <img src="{{ $image }}" alt="" class="big-card-img desktop">
    <img src="{{ $imagemob }}" alt="" class="big-card-img mobile">

    <div class="container">
        <div class="card-content">
            <div class="card-title h2 color-white">
                {!! Field::enter_to_br($title) !!}
            </div>

            @if ($description)
                <div class="card-desc extra-text color-white">
                    {!! Field::enter_to_br($description) !!}
                </div>
            @endif
        </div>
    </div>
</div>

@desktopcss
<style>

    .big-card {
        width: auto;
        height: 550px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .big-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 1440px;
        height: 550px;
        object-fit: contain;
    }

    .card-content {
        position: relative;
        z-index: 1;
    }

    .card-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 570px;
        text-transform: uppercase;
        margin: 0 auto;
    }

    .card-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: 25px auto 0;
        width: 900px;
    }
</style>
@mobilecss
<style>
    .big-card {
        width: auto;
        height: 417px;
    }

    .big-card .container {
        height: 100%;
    }

    .big-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: 0;
        width: 100%;
        height: 421px;
        object-fit: cover;
    }

    .card-content {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
    }

    .card-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: auto;
        text-transform: uppercase;
    }

    .card-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 25px;
        width: auto;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
