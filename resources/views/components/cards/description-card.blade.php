<div @if ($right) class="description-card-right" @else class="description-card-left" @endif>
    <div class="description-card-title h4 color-red">{!! Field::enter_to_br($title) !!}</div>
    @if($description)
    <div class="description-card-desc extra-text color-red">{!! html_entity_decode(Field::enter_to_br($description)) !!}</div>
    @endif
</div>

@desktopcss
<style>
    .description-card-left {
        display: flex;
        position: absolute;
        left: 0;
        margin-top: 40px;
        width: 600px;
        height: 419px;
        flex-direction: column;
        padding: 30px 50px 42px 80px;
        z-index: 1;
        background: var(--color-skin);
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .description-card-right {
        display: flex;
        position: absolute;
        right: 0;
        margin-top: 40px;
        width: 600px;
        height: 419px;
        flex-direction: column;
        padding: 30px 50px 42px 80px;
        z-index: 1;
        background: var(--color-skin);
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;

    }

    .description-card-desc {
        margin-top: 15px;
        overflow: auto;
        padding-right: 25px;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }


    ::-webkit-scrollbar-track {
        background-color: var(--color-light-grey);
    }


    ::-webkit-scrollbar-thumb {
        background-color: var(--color-red);
        border-radius: 5px;
    }
</style>
@mobilecss
<style>
    .description-card-left {
        display: flex;
        position: absolute;
        left: 0;
        width: 305px;
        height: auto;
        flex-direction: column;
        padding: 33px 10px 35px 33px;
        z-index: 1;
        background: var(--color-skin);
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .description-card-right {
        display: flex;
        position: absolute;
        right: 0;
        width: 305px;
        height: auto;
        flex-direction: column;
        padding: 33px 10px 35px 33px;
        z-index: 1;
        background: var(--color-skin);
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;

    }

    .description-card-desc {
        margin-top: 15px;
        padding-right: 10px;
        overflow-x: hidden;
        overflow-y: auto;
        max-height: 192px;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }


    ::-webkit-scrollbar-track {
        background-color: var(--color-light-grey);
    }


    ::-webkit-scrollbar-thumb {
        background-color: var(--color-red);
        border-radius: 5px;
    }

    .description-card-title .h4 {
        font-family: Taviraj;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 28px;
        text-transform: uppercase;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
