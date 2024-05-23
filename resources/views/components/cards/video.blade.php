<video width="100%" class="video" autoplay loop muted>
    <source src="{{ $video }}" type="video/mp4">
</video>

@desktopcss
<style>
    .video {
        display: block;
        position: relative;

    }
</style>
@mobilecss
<style>
    .video {
        display: block;
        position: relative;
        width: 100%;
        height: 380px;
        object-fit: cover;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
