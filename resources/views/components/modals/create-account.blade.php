@php $s = new Single('Модальные окна', 0, 2); @endphp

<div class="modal fade-in" id="modal-account">
    <div class="container-modal container-modal-account">
        <div class="closemodal closemodal-account" onclick="close_modal()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.723145" width="1.02265" height="17.385" transform="rotate(-45 0 0.723145)"
                    fill="#333333" />
                <rect x="12.293" width="1.02265" height="17.385" transform="rotate(45 12.293 0)" fill="#333333" />
            </svg>
        </div>
        <div class="h5 color-black account-modal-title">
            {{ $s->field('Регистрация', 'Заголовок', 'text', true, 'Create an account') }}</div>

        <form action="{{ route('api-register', [], false) }}" class="form-modal-register"
            onsubmit="register(this); return false;">
            <div class="form-input">
                <x-inputs.input :label="$s->field('Регистрация', 'Имя и фамилия', 'text', true, 'Name and surname')" :placeholder="$s->field('Регистрация', 'Имя и фамилия', 'text', true, 'Name and surname')" type='text' name='name' />
            </div>
            <div class="form-input">
                <x-inputs.input label='email' placeholder='example@gmail.com' type='email' name='email' />
            </div>
            <div class="form-input">
                <x-inputs.input label='phone' placeholder='+373 (22) 0000000' type='phone' name='phone' />
            </div>
            <div class="form-input">
                <x-inputs.input :label="$s->field('Регистрация', 'Дата рождения', 'text', true, 'Date of Birth')" placeholder='01.01.1990' type='date' name='date' />
            </div>
            <div class="form-input">
                <x-inputs.input :label="$s->field(
                    'Регистрация',
                    'Код программы лояльности',
                    'text',
                    true,
                    'Loyalty program participant code',
                )" placeholder='0000000' type='text' name='loyalty_code' />
            </div>
            <div class="form-input">
                <x-inputs.input :label="$s->field('Регистрация', 'Пароль', 'text', true, 'Password')" :placeholder="$s->field('Регистрация', 'Пароль', 'text', true, 'Password')" type='password' name='password' />
            </div>
            <div class="form-input">
                <x-inputs.input :label="$s->field('Регистрация', 'Повторите пароль', 'text', true, 'Repeat password')" :placeholder="$s->field('Регистрация', 'Пароль', 'text', true, 'Password')" type='password' name='password_confirmation' />
            </div>

            <x-inputs.button type="submit">
                {{ $s->field('Регистрация', 'Текст кнопки', 'text', true, 'Create an account') }}
            </x-inputs.button>

            <div class="extra-text color-red register-model-error"
                data-default="{{ $s->field('Регистрация', 'Ошибка', 'text', true, 'Unknown error') }}">
                {{ $s->field('Регистрация', 'Ошибка', 'text', true, 'Unknown error') }}</div>
        </form>
        <div class="button-small color-red btn-link" onclick="open_modal('sign-in')">
            {{ $s->field('Регистрация', 'Войти', 'text', true, 'Sign in') }}</div>
        <div class="button-small color-red btn-link" onclick="open_modal('loyalty')">
            {{ $s->field('Регистрация', 'Регистрация в програме лояльности', 'text', true, 'Register for a loyalty program') }}
        </div>

        <div class="color-grey modal-description">
            {!! $s->field(
                'Регистрация',
                'Политика',
                'text',
                true,
                'By registering, you agree to our <a href="/privacy-policy">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy</a>',
            ) !!}
        </div>

    </div>
</div>

@desktopcss
<style>
    .register-model-error {
        margin-top: 5px;
        display: none;
    }

    .modal-description a {
        text-decoration: underline;
        transition: .3s;
        color: var(--color-grey);
    }

    .modal-description a:hover {
        color: var(--color-black);
    }

    .modal-description {
        width: 360px;
        text-align: center;
        font-family: "Istok Web", sans-serif ;
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
        cursor: pointer;
    }

    .btn-link:hover {
        color: var(--color-black);
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

    .container-modal-account {
        width: 501px;
    }

    .account-modal-title {
        align-self: flex-start;
        margin-bottom: 20px;
    }

    .container-modal-account .header-search-form {
        margin: 0;
        margin-bottom: 20px;
    }

    .container-modal-account .header-search-input {
        border: 1px solid var(--color-line);
    }

    .modal-account-blocks {
        align-self: flex-start;
        height: 800px;
        width: 100%;
        overflow: auto;
    }

    .modal-account-blocks::-webkit-scrollbar {
        width: 3px;
    }

    .modal-account-blocks::-webkit-scrollbar-track {
        background: #E6E6E6;
    }

    .modal-account-blocks::-webkit-scrollbar-thumb {
        background: var(--color-main);
    }

    .modal-account-block-title {
        margin-bottom: 10px;
    }

    .modal-account-block {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modal-account-block-city {
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
    .container-modal-account {
        width: 290px;
        display: flex;
        padding: 35px 20px;
        flex-direction: column;
        align-items: center;
    }

    .form-input {
        border-bottom: 1px solid var(--color-black);
        margin-bottom: 30px;
    }

    .form-input:last-child {
        margin-bottom: 0;
    }

    .account-modal-title {
        align-self: flex-start;
        margin-bottom: 15px;
    }

    .container-modal-account .header-search-form {
        order: 0;
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 15px;
    }

    .container-modal-account .header-search-input {
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

    .modal-account-block {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modal-account-block-city {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 22px;
        font-feature-settings: 'pnum' on, 'lnum' on;
        margin-bottom: 8px;
    }

    .label-input {
        font-family: "Istok Web", sans-serif ;
        font-size: 11px;
        font-style: normal;
        font-weight: 700;
        line-height: 19px;
        text-transform: uppercase;
        position: relative;
    }

    .input::placeholder {
        font-family: "Istok Web", sans-serif ;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        color: var(--color-grey);
    }

    .register-model-error {
        margin-top: 5px;
        display: none;
    }

    .modal-description {
        width: 290px;
        text-align: center;
        text-align: center;
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: 18px;
        margin-top: 15px;
    }

    .modal-description a {
        text-decoration: underline;
        transition: .3s;
        color: var(--color-grey);
    }

     .btn-link {
        margin-top: 12px;
        text-decoration: underline;
        transition: .3s;
        cursor: pointer;
    }
</style>
@endcss

@startjs
<script>
    async function register(form) {

        event.preventDefault()

        const route = form.getAttribute('action')

        const response = await post(route, {
            name: form.elements['name'].value,
            phone: form.elements['phone'].value,
            email: form.elements['email'].value,
            date: form.elements['date'].value,
            loyalty_code: form.elements['loyalty_code'].value,
            password: form.elements['password'].value,
            password_confirmation: form.elements['password_confirmation'].value
        }, true)

        if (response.success) {
            form.reset()
            open_modal('sign-in')
        } else {

            if (response.data.loyalty_code) {
                form.reset()
                close_modal()
                open_modal('loyalty-error')
            }

            form.querySelector('.register-model-error').style.display = 'block'

            if (response.data.errors) {
                form.querySelector('.register-model-error').innerText = response.data.message
            } else {
                form.querySelector('.register-model-error').innerText = form.querySelector('.register-model-error')
                    .getAttribute('data-default')
            }
        }
    }
</script>
@endjs
