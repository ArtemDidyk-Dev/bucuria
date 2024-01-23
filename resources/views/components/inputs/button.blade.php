@if ($type == 'submit')
    <button class="btn color-white" type="submit" onclick="{{ $action }}">
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" class="btn color-white"> {{ $slot }}</a>
@endif

@desktopcss
<style>
    .btn {
        display: inline-block;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
        padding: 14px 50px;
        border-radius: 8px;
        margin-top: 20px;
        background: var(--color-red);
        border: none;
        transition: .3s;
        text-transform: uppercase;
        font-family: Raleway;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px; /* 171.429% */
        text-transform: uppercase;
    }

    .btn:hover {
        color: var(--color-white);
        background: var(--color-red-hover);
    }
</style>
@mobilecss
<style>
.btn {
        display: inline-block;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
        padding: 14px 50px;
        border: none;
        border-radius: 8px;
        margin-top: 20px;
        background: var(--color-red);
        transition: .3s;
        text-transform: uppercase;
        font-family: Raleway;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px; /* 171.429% */
        text-transform: uppercase;
    }

    .btn:hover {
        color: var(--color-white);
        background: var(--color-red-hover);
    }
</style>
@endcss

@startjs
<script></script>
@endjs
