<div class="container">
    <div class="big-social-section">
        <div class="big-social-card">
            
            <img src="/images/small-socia.png" alt="" class="big-social-card-img desktop">
            <img src="/images/small-social-mobile.png" alt="" class="big-social-card-img mobile">

            <div class="big-social-card-content">
                @if (!empty($title))
                    <div class="card-social-title h4 color-white">
                        {!! $title !!} 
                    </div>
                @endif
                <div class="card-social-desc extra-text color-white {{ empty($title) ? 'no-mt' : '' }}">
                    {!! $description !!} 
                </div>
            </div>
        </div>
        <x-cards.small-card-image 
            :image="$image" 
            :imagemob="$image" 
        />
    </div>
</div>

@desktopcss
<style>

    .big-social-section {
        display: flex;
    }

    .big-social-card {
        display: block;
        position: relative;
        width: 1440px;
        height: 550px;
        margin-top: 0;
    }

    .big-social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 720px;
        height: 550px;
        object-fit: containe;
    }

    .big-social-card-content {
        display: block;
        position: absolute;
        top: 168px;
        left: 80px;
        z-index: 1;
        width: 470px;
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

    .card-social-desc.no-mt {
        margin-top: 0;
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
    .big-social-card {
        display: block;
        position: relative;
        width: 100%;
        height: 417px;
        margin-top: 0;
    }

    .big-social-card-img {
        display: block;
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 417px;
        object-fit: containe;
    }

    .big-social-card-content {
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
        width: 100%;
    }

    .card-social-desc {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
        width: 100%;
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
