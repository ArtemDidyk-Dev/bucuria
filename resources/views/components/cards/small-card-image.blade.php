<div class="small-social-card">
    <img src="{{ $image }}" alt="" class="small-social-card-img desktop">
    <img src="/images/mobile-so-card.png" alt="" class="big-card-img mobile">
</div>

@desktopcss
<style>
    .small-social-card {
        display: block;
        position: relative;
        width: 1440px;
        height: 550px;
        margin-top: 0;
    }

    .small-social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 720px;
        height: 550px;
        object-fit: containe;
    }

    .small-social-card-content {
        display: block;
        position: absolute;
        z-index: 1;
        padding-left: 80px;
        padding-right: 80px;
        padding-top: 138px;
        padding-bottom: 156px;
    }

    .card-social-title {
        display: flex;
        justify-content: flex-start;
        text-transform: uppercase;
    }

    .card-social-desc {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
    }

    .social-icons {
        display: flex;
        justify-content: flex-start;
        margin-top: 40px;
    }

    .btn-social {
        display: inline-block;
        align-items: center;
        padding: 8px 20px;
        margin-right: 20px;
        align-items: center;
        border-radius: 8px;
        border: 1px solid var(--white, #FFF);
        transition: .3s;
    }

    .btn-social:hover {
        color: var(--color-red);
        background: var(--color-white);
        transition: .3s;
    }

    .social-text {
        display: flex;
        justify-content: flex-start;
    }

    .social-img {
        width: 18px;
        height: 18px;
        margin-right: 10px;
        margin-top: 3.5px;
        text-decoration: none;
        filter: brightness(100);
    }

    .btn-social:hover .icon-instagram {
        filter: brightness(1);
    }
</style>
@mobilecss
<style>
    .small-social-card {
        display: block;
        position: relative;
        width: 100%;
        height: 417px;
        margin-top: 0;
    }

    .small-social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: 0;
        width: 100%;
        height: 417px;
        object-fit: containe;
    }

    .big-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        left: 0;
        width: 100%;
        height: 417px;
        object-fit: cover;
    }

    .small-social-card-content {
        display: block;
        position: absolute;
        z-index: 1;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 101px;
        padding-bottom: 101px;
    }

    .card-social-title {
        display: flex;
        justify-content: flex-start;
        text-transform: uppercase;
        width: 290px;
    }

    .card-social-desc {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
        width: 290px;
    }

    .social-icons {
        display: flex;
        justify-content: flex-start;
        margin-top: 48px;
    }

    .btn-social {
        display: inline-block;
        align-items: center;
        padding: 8px 20px;
        margin-right: 20px;
        align-items: center;
        border-radius: 8px;
        border: 1px solid var(--white, #FFF);
        transition: .3s;
    }

    .btn-social:hover {
        color: var(--color-red);
        background: var(--color-white);
        transition: .3s;
    }

    .social-text {
        display: flex;
        justify-content: flex-start;
    }

    .social-img {
        width: 18px;
        height: 18px;
        margin-top: 3.5px;
        text-decoration: none;
        object-fit: contain;
    }

    .btn-social:hover .icon-instagram {
        content: url('/images/icons/instagram-red.svg')
    }

    .btn-social:hover .icon-video {
        content: url('/images/icons/video-red.svg')
    }

    .btn-social:hover .icon-facebook {
        content: url('/images/icons/facebook-red.svg')
    }
</style>
@endcss

@startjs
<script></script>
@endjs
