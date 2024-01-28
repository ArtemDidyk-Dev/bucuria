@php $s = new Single('Модальные окна', 0, 2); @endphp

<div class="modal fade-in" id="modal-sign-in">
    <div class="container-modal container-modal-sign-in">
        <div class="closemodal closemodal-sign-in" onclick="close_modal()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.723145" width="1.02265" height="17.385" transform="rotate(-45 0 0.723145)"
                    fill="#333333" />
                <rect x="12.293" width="1.02265" height="17.385" transform="rotate(45 12.293 0)" fill="#333333" />
            </svg>
        </div>
        <div class="h5 color-black sign-in-modal-title">{{ $s->field('Вход', 'Заголовок', 'text', true, 'sing in') }}
        </div>
        <div class="sign-in-modal-description extra-text color-black">{!! Field::enter_to_br(
            $s->field('Вход', 'Описание', 'textarea', true, 'Enter your email address or phone number to sign in'),
        ) !!}</div>
        <form action="{{ route('api-login', [], false) }}" onsubmit="login(this)">
            <div class="form-inputs">
                <div class="form-input">
                    <x-inputs.input label='email' placeholder='example@gmail.com' type='email' name='email' />
                </div>
                <div class="form-input">
                    <x-inputs.input :label="$s->field('Вход', 'Пароль', 'text', true, 'Password')" :placeholder="$s->field('Вход', 'Пароль', 'text', true, 'Password')" type='password' name='password' />
                </div>
            </div>
            <div class="color-red btn-link btn-link-right" onclick="open_modal('password-recovery')">
                {{ $s->field('Вход', 'Забыли пароль', 'text', true, 'Forgot your password?') }}</div>
            <x-inputs.button type="submit">
                {{ $s->field('Вход', 'Текст кнопки', 'text', true, 'sing in') }}
            </x-inputs.button>
            <div class="login-error color-red">
                {{ $s->field('Вход', 'Ошибка', 'text', true, 'Error! Wrong email or password.') }}</div>
        </form>
        <div class="button-small color-red btn-link" onclick="open_modal('account')">
            {{ $s->field('Вход', 'Создать аккаунт', 'text', true, 'Create an account') }}</div>
    </div>
</div>

@desktopcss
<style>
    .login-error {
        display: none;
        text-align: center;
        margin-top: 10px;
    }

    .sign-in-modal-description {
        margin-bottom: 15px;
        width: 100%;
    }

    .modal-description-link {
        text-decoration: underline;
        transition: .3s;
    }

    .modal-description-link:hover {
        color: var(--color-black);
    }

    .modal-description {
        width: 360px;
        text-align: center;
        font-family: 'Alice';
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        margin-top: 15px;
    }

    .btn-link {
        margin-top: 15px;
        text-decoration: underline;
        transition: .3s;
    }

    .btn-link:hover {
        color: var(--color-black);
    }

    .btn-link-right {
        margin-top: 10px;
        text-align: right;
        float: right;
        font-family: 'Alice';
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        text-decoration: underline;
        transition: .3s;
    }

    .membership-modal-text {
        width: 361px;
        text-align: center;
    }

    .form-input {
        width: 361px;
        border-bottom: 1px solid var(--color-black);
        margin-bottom: 25px;
    }

    .form-input:last-child {
        margin-bottom: 0;
    }

    .container-modal-sign-in {
        width: 501px;
    }

    .sign-in-modal-title {
        align-self: flex-start;
        margin-bottom: 20px;
    }

    .container-modal-sign-in .header-search-form {
        margin: 0;
        margin-bottom: 20px;
    }

    .container-modal-sign-in .header-search-input {
        border: 1px solid var(--color-line);
    }

    .modal-sign-in-blocks {
        align-self: flex-start;
        height: 800px;
        width: 100%;
        overflow: auto;
    }

    .modal-sign-in-blocks::-webkit-scrollbar {
        width: 3px;
    }

    .modal-sign-in-blocks::-webkit-scrollbar-track {
        background: #E6E6E6;
    }

    .modal-sign-in-blocks::-webkit-scrollbar-thumb {
        background: var(--color-main);
    }

    .modal-sign-in-block-title {
        margin-bottom: 10px;
    }

    .modal-sign-in-block {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modal-sign-in-block-city {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 22px;
        font-feature-settings: 'pnum' on, 'lnum' on;
        margin-bottom: 8px;
        cursor: pointer;
    }

    .modal-cities-block-city-top {
        font-weight: 600;
    }

    .modal-cities-block-city:hover {
        text-decoration: underline;
    }
</style>
@mobilecss
<style>
    .container-modal-sign-in {
        width: 290px;
        display: flex;
        padding: 35px 20px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .sign-in-modal-title {
        align-self: flex-start;
        margin-bottom: 15px;
        font-family: Taviraj;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 28px;
        text-transform: uppercase;
    }

    .container-modal-sign-in .header-search-form {
        order: 0;
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 15px;
    }

    .container-modal-sign-in .header-search-input {
        border: 1px solid var(--color-line);
    }

    .modal-cities-blocks {
        align-self: flex-start;
        height: 325px;
        overflow: auto;
        width: 100%;
    }

    .modal-account-blocks::-webkit-scrollbar {
        width: 2px;
    }

    .modal-account-blocks::-webkit-scrollbar-track {
        background-color: var(--color-line);
    }

    .modal-account-blocks::-webkit-scrollbar-thumb {
        background-color: var(--color-main);
    }

    .modal-account-block-title {
        margin-bottom: 10px;
    }

    .modal-sign-in-block {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modal-sign-in-block-city {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 22px;
        font-feature-settings: 'pnum' on, 'lnum' on;
        margin-bottom: 8px;
    }

    .btn-link-right {
        margin-top: 6px;
        text-align: right;
        font-family: 'Alice';
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: 18px;
        text-decoration: underline;
        transition: .3s;
    }

    .sign-in-modal-description {
        margin-bottom: 20px;
        width: 100%;
    }

    .modal .btn {
        width: 100%
    }

    .login-error {
        display: none;
        text-align: center;
        margin-top: 10px;
    }
</style>
@endcss

@startjs
<script>
    async function login(form) {

        event.preventDefault()

        const route = form.getAttribute('action')

        const response = await post(route, {
            email: form.elements['email'].value,
            password: form.elements['password'].value,
        }, true)

        if (response.success) {

            form.querySelector('.login-error').style.display = 'none'
            form.reset()

            location.href = response.data.redirect

        } else {
            form.querySelector('.login-error').style.display = 'block'
        }
    }
</script>
@endjs
