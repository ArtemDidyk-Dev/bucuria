@php $s = new Single('Модальные окна', 0, 2); @endphp

<div class="cookie-item" id="cookie-popup">
    <div class="cookie__info">
        <img src="/images/icons/cookie.svg" alt="" class="cookie__img" width="40" height="40">
        <p class="cookie__text">  {{ $s->field('Cookie', 'Текст', 'text', true, 'We use cookies to make your experience on this website better.') }}</p>
    </div>
    <div class="cookie__btns">
        <a href="{{ $s->field('Cookie', 'Ссылка', 'text', true, '/privacy-policy') }}" class="cookie__link">
            {{ $s->field('Cookie', 'Текст на Ссылку', 'text', true, 'Cookie Policies') }}
        </a>
        <button id="cookie-accept-button" class="cookie__close">{{ $s->field('Cookie', 'Кнопка', 'text', true, 'Accept') }}</button>
    </div>
</div>

@desktopcss
<style>
    .cookie-item {
        display: flex;
        flex-direction: column;
        position: fixed;
        bottom: 24px;
        left: 24px;
        background: var(--color-red);
        border-radius: 10px;
        padding: 24px;
        max-width: 342px;
        z-index: 100;
        transform: translateX(calc(-100% - 50px));
    }

    .cookie-item.cookie-popup-shown {
        transform: translateX(0);
        transition: transform 0.3s ease-in-out;
    }

    .cookie__info {
        display: flex;
    }

    .cookie__img {
        margin-right: 8px;
        min-width: 40px;
        height: 40px;
    }

    .cookie__text {
        font-weight: 500;
        font-size: 20px;
        line-height: 1.5;
        color: #fff;
    }

    .cookie__btns {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
    }

    .cookie__link {
        font-weight: 600;
        font-size: 18px;
        line-height: 40px;
        color: #efefef;
    }

    .cookie__close {
        line-height: 40px;
        margin-left: 24px;
        font-weight: 600;
        font-family: Montserrat, 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 18px;
        padding: 0 35px;
        border-radius: 5px;
        background: none;
        line-height: 45px;
        border: 1px solid;
        cursor: pointer;
        color: #fff;
        transition: background-color 0.5s;
    }

</style>
@mobilecss
<style>
    .cookie-item {
        display: flex;
        flex-direction: column;
        position: fixed;
        bottom: 24px;
        background: var(--color-red);
        border-radius: 10px;
        max-width: 342px;
        z-index: 100;
        transform: translateX(calc(-100% - 50px));
        left: 0px;
        padding: 11px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .cookie-item.cookie-popup-shown {
        transform: translateX(0);
        transition: transform 0.3s ease-in-out;
    }

    .cookie__info {
        display: flex;
    }

    .cookie__img {
        margin-right: 8px;
        min-width: 40px;
        height: 40px;
    }

    .cookie__text {
        font-weight: 500;
        font-size: 20px;
        line-height: 1.5;
        color: #fff;
    }

    .cookie__btns {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
    }

    .cookie__link {
        font-weight: 600;
        font-size: 18px;
        line-height: 40px;
        color: #efefef;
    }

    .cookie__close {
        margin-left: 24px;
        font-weight: 600;
        font-family: Montserrat, 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 18px;
        border-radius: 5px;
        background: none;
        border: 1px solid;
        cursor: pointer;
        color: #fff;
        transition: background-color 0.5s;
        line-height: normal;
        padding: 10px;
    }

    .cookie__text {
        font-size: 14px;
    }

    .cookie__close,
    .cookie__link {
        font-size: 16px;
    }

    .cookie {
        top: initial;
        bottom: 0;
        left: 20px;
        right: 20px;
        max-width: 100%;
    }
</style>
@endcss

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cookiePopup = document.getElementById('cookie-popup');
        const acceptButton = document.getElementById('cookie-accept-button');
        if (cookiePopup) {
            if (!localStorage.getItem('cookieAccepted')) {
                setTimeout(() => {
                    cookiePopup.classList.add('cookie-popup-shown');
                }, 100);
            }
            acceptButton.addEventListener('click', function () {
                localStorage.setItem('cookieAccepted', 'true');
                cookiePopup.classList.remove('cookie-popup-shown');
            });
        }
    });
</script>
