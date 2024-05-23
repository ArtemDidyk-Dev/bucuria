@if (!empty($image))
    <div class="big-card-small-img">
        <img src="{{ $image }}" alt="" class="big-card-img-small">
        <div class="container">
            <div class="card-content-small-img">
                <div class="card-title h2 color-white">
                    {!! Field::enter_to_br($title) !!}
                </div>

                @if ($description)
                    <div class="card-desc-small subtitle color-white">
                        {!! Field::enter_to_br($description) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="big-card-small">
        <div class="container">
            <div class="card-content-small">
                <div class="card-title-small h2 color-red">
                    {!! Field::enter_to_br($title) !!}
                </div>

                @if ($description)
                    <div class="card-desc-small subtitle color-red">
                        {!! Field::enter_to_br($description) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif

@desktopcss
<style>
    .big-card-small {
        width: auto;
        background: var(--color-skin);
    }

    .big-card-small-img {
        width: auto;
        height: 419px;
        background: var(--color-skin);
    }

    .big-card-img-small {
        display: block;
        position: absolute;
        z-index: 0;
        width: 1440px;
        height: 419px;
        object-fit: cover;
    }

    .card-content-small {
        display: block;
        position: relative;
        padding: 100px 220px 100px 220px;
        z-index: 1;
    }

    .card-content-small-img {
        display: block;
        position: relative;
        padding-top: 100px;
        z-index: 1;
    }

    .card-title-small {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }

    .card-desc-small {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 30px;
    }
</style>
@mobilecss
<style>
    .big-card-small {
        width: auto;
        padding: 0 15px;
        background: var(--color-skin);
    }

    .big-card-small-img {
        width: auto;
        height: 419px;
        background: var(--color-skin);
    }

    .big-card-img-small {
        display: block;
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .card-content-small {
        display: block;
        position: relative;
        width: 100%;
        padding: 79px 0 79px 0;
        z-index: 1;
    }

    .card-content-small-img {
        display: block;
        position: relative;
        padding-top: 100px;
        z-index: 1;
    }

    .card-title-small {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
    }

    .card-desc-small {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 100%;
        margin-top: 30px;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
