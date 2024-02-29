<div class="big-image-card {{ $center ? 'big-card-center' : 'big-card-top' }}">

    <img src="{{ $image }}" alt="" class="big-image-card-img desktop">
    <img src="{{ empty($imagemob) ? $image : $imagemob }}" alt="" class="big-image-card-img mobile">

    @if ($gradient)
        <div class="big-image-card-gradient"></div>
    @endif

    <div class="container">
        <div class="card-image-content">
            <div class="card-image-title h2 {{ $red ? 'color-red' : 'color-white' }}">
                {!! Field::enter_to_br($title) !!}
            </div>

            @if ($description)
                <div class="card-image-desc extra-text color-white">
                    {!! Field::enter_to_br($description) !!}
                </div>
            @endif

            @if (!empty($btnText))
                <div class="btn-block">
                    <a href="{{ Lang::link($link) }}" class="btn button-normal color-white">{{ $btnText }}</a>
                </div>
            @endif
        </div>
    </div>
    <div class="descrtiption-card-block">
        @if ($descriptionBlockTitle)
            @if ($descriptionBlockRight)
                <x-cards.description-card :title="$descriptionBlockTitle" :description="$descriptionBlockDesc" right />
            @else
                <x-cards.description-card :title="$descriptionBlockTitle" :description="$descriptionBlockDesc" />
            @endif
        @endif
    </div>

</div>


@desktopcss
<style>
    .big-image-card {
        position: relative;
        height: 700px;
    }

    .card-title {
        text-align: center;
    }

    .descrtiption-card-block {
        position: relative;
    }

    .big-card-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .big-card-top {
        padding-top: 100px;
    }

    .big-image-card-gradient {
        display: block;
        position: absolute;
        background-repeat: no-repeat;
        z-index: 1;
        top: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        background: radial-gradient(74% 74% at 50% 55.43%, rgba(0, 0, 0, 0.30) 0%, rgba(0, 0, 0, 0.00) 100%);
        object-fit: cover;
    }

    .big-image-card-img {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
        width: 1440px;
        height: 700px;
        margin: auto;
        object-fit: cover;
    }

    .card-image-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .card-image-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
        width: 900px;
    }

    .card-image-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .btn-block {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn {
        display: inline-block;
        align-items: center;
        padding: 14px 50px;
        border-radius: 8px;
        margin-top: 40px;
        background: var(--color-red);
        transition: .3s;
    }

    .btn:hover {
        color: var(--color-red);
        background: var(--color-white);
    }
</style>
@mobilecss
<style>

    .big-image-card {
        position: relative;
        height: 500px;
    }

    .card-title {
        text-align: center;
    }

    .descrtiption-card-block {
        position: relative;
    }

    .big-card-center {
        padding-top: 117px;
        padding-bottom: 117px;
        height: 500px;
    }

    .big-card-top {
        padding-top: 74px;
        padding-bottom: 392px;
        height: 500px;
    }

    .big-image-card-gradient {
        display: block;
        position: absolute;
        background-repeat: no-repeat;
        z-index: 1;
        width: 100%;
        height: 500px;
        top: 0;
        left: 0;
        background: transparent;
        background: radial-gradient(74% 74% at 50% 55.43%, rgba(0, 0, 0, 0.30) 0%, rgba(0, 0, 0, 0.00) 100%);
        object-fit: cover;
    }

    .big-image-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 500px;
        top: 0;
        left: 0;
        flex-shrink: 0;
        margin: auto;
        object-fit: cover;
    }

    .card-image-content {
        display: block;
        position: relative;
        z-index: 1;
    }

    .card-image-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-transform: uppercase;
    }

    .card-image-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 25px;
    }

    .btn-block {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn {
        display: inline-block;
        align-items: center;
        padding: 14px 50px;
        border-radius: 8px;
        margin-top: 40px;
        background: var(--color-red);
        transition: .3s;
    }

    .btn:hover {
        color: var(--color-red);
        background: var(--color-white);
    }
</style>
@endcss

@startjs
<script></script>
@endjs
