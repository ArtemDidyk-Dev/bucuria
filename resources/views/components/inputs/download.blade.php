<a href="{{ $href }}" download="{{ $slot }}" class="download color-white"> {{ $slot }}</a>

@desktopcss
<style>
    .download {
        display: inline-block;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
        padding: 10px;
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

    .download:hover {
        color: var(--color-white);
        background: var(--color-red-hover);
    }
</style>
@mobilecss
<style>
.download {
        display: inline-block;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
        padding: 10px;
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
