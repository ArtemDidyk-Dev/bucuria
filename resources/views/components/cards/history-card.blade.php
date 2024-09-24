@if ($count % 2 == 0)
    <div class="history-card-red">
        <div class="container">
            <div class="history-card-content">
                <div class="history-card-title color-white">
                    <div class="h4 history-year"> {{ $year }}</div>
                    <div class="h3">{!! Field::enter_to_br($title) !!}</div>
                </div>
                @if ($description)
                    <div class="history-card-desc main-text color-white">
                        <div class="box history-box">
                            {{ $description }}
                        </div>
                    </div>
                @endif

                <img src="{{ $image }}" alt="" class="history-card-img">
            </div>
        </div>
    </div>
@else
    <div class="history-card">
        <div class="container">
            <div class="history-card-content">
                <div class="history-card-title color-red">
                    <div class="h4 history-year-red">{{ $year }}</div>
                    <div class="h3">{!! Field::enter_to_br($title) !!}</div>
                </div>
                @if ($description)
                    <div class="history-card-desc main-text color-red">
                        {{ $description }}
                    </div>
                @endif
                <img src="{{ $image }}" alt="" class="history-card-img">
            </div>
        </div>
    </div>
@endif

@desktopcss
<style>
    .history-card-desc {
        overflow-x: hidden;
        overflow-y: auto;
        height: 100%;
        padding-right: 10px;
    }
    .history-card-desc::-webkit-scrollbar {
        width: 2px;
        background: rgba(31, 31, 31, 0.08);

    }
    .history-card-desc::-webkit-scrollbar-thumb {
        background-color: #fff;
    }
    .history-card-red {
        width: auto;
        height: 100%;
        background: var(--color-red);
    }

    .history-card {
        width: auto;
        height: 100%;
        background: var(--color-skin);
    }

    .history-card-img {
        display: block;
        object-fit: cover;
    }

    .history-card-content {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column;
        padding: 15px;
    }

    .history-card-title {
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: center;
        gap: 18px;
    }

    .history-year {
        padding-bottom: 0px;
        border-bottom: 1px solid var(--color-white);
        margin-bottom: 18px;
    }

    .history-year-red {
        padding-bottom: 0px;
        border-bottom: 1px solid var(--color-red);
        margin-bottom: 18px;
    }

    .history-card-desc {
        display: flex;
        justify-content: flex-start;
        width: 100%;
        margin-bottom: 10px;
    }
</style>
@mobilecss
<style>
    .history-card-red {
        display: flex;
        padding: 15px 0;
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
        background: var(--color-red);
    }

    .history-card {
        display: flex;
        padding: 60px 0;
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
        background: var(--color-skin);
    }

    .history-card-img {
        display: flex;
        justify-content: center;
        align-items: center;
        object-fit: cover;
    }

    .history-card-content {
        display: flex;
        padding:0 15px;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
    }

    .history-card-title {
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: center;
        gap: 18px;
    }

    .history-year {
        padding-bottom: 0px;
        border-bottom: 1px solid var(--color-white);
        margin-bottom: 18px;
    }

    .history-year-red {
        padding-bottom: 12px;
        border-bottom: 1px solid var(--color-red);
        margin-bottom: 18px;
    }

    .history-card-desc {
        display: flex;
        justify-content: flex-start;
        width: 100%;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
