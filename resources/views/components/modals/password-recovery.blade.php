@php $s = new Single('Модальные окна', 0, 2); @endphp

<div class="modal fade-in" id="modal-password-recovery">
    <div class="container-modal container-modal-password-recovery">
        <div class="closemodal closemodal-password-recovery" onclick="close_modal()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.723145" width="1.02265" height="17.385" transform="rotate(-45 0 0.723145)"
                    fill="#333333" />
                <rect x="12.293" width="1.02265" height="17.385" transform="rotate(45 12.293 0)" fill="#333333" />
            </svg>
        </div>

        <form action="{{ route('api-sendcode', [], false) }}" class="form-modal-forgot active" id="send-code"
            onsubmit="sendCode(this); return false;">
            <div class="h5 color-black password-recovery-modal-title">
                {{ $s->field('Забыли пароль', 'Заголовок 1', 'text', true, 'Password recovery') }}</div>
            <div class="password-recovery-modal-description extra-text color-black">
                {{ $s->field('Забыли пароль', 'Описание 1', 'textarea', true, 'Enter the email provided on the site upon registration') }}
            </div>
            <div class="form-input">
                <x-inputs.input label='email' placeholder='example@gmail.com' type='email' name='email' />
            </div>
            <x-inputs.button
                type="submit">{{ $s->field('Забыли пароль', 'Текст кнопки 1', 'text', true, 'send') }}</x-inputs.button>
            <div class="form-answer color-red error extra-text">
                {{ $s->field('Забыли пароль', 'Текст ошибки 1', 'text', true, 'This email does not exist') }}</div>
        </form>


        <form action="{{ route('api-checkcode', [], false) }}" class="form-modal-forgot" id="check-code"
            onsubmit="checkCode(this); return false;">
            <div class="h5 color-black password-recovery-modal-title">
                {{ $s->field('Забыли пароль', 'Заголовок 1', 'text', true, 'Password recovery') }}</div>
            <div class="password-recovery-modal-description extra-text color-black">
                {{ $s->field('Забыли пароль', 'Описание 2', 'textarea', true, 'Enter the received password:') }}</div>

            <div class="form-input">
                <x-inputs.input :label="$s->field('Забыли пароль', 'Код', 'textarea', true, 'Code')" :placeholder="$s->field('Забыли пароль', 'Код', 'textarea', true, 'Code')" type='text' name='code' />
            </div>
            <x-inputs.button
                type="submit">{{ $s->field('Забыли пароль', 'Текст кнопки 2', 'text', true, 'send') }}</x-inputs.button>
            <div class="form-answer color-red error extra-text">
                {{ $s->field('Забыли пароль', 'Текст ошибки 1', 'text', true, 'Wrong code') }}</div>
        </form>

        <form action="{{ route('api-changepassword', [], false) }}" class="form-modal-forgot" id="change-password"
            onsubmit="changePassword(this); return false;">
            <div class="h5 color-black password-recovery-modal-title">
                {{ $s->field('Забыли пароль', 'Заголовок 2', 'text', true, 'Create a new password') }}</div>

            <div class="form-input">
                <x-inputs.input :label="$s->field('Забыли пароль', 'Пароль', 'text', true, 'Password')" :placeholder="$s->field('Забыли пароль', 'Пароль', 'text', true, 'Password')" type='password' name='password' />
            </div>
            <div class="form-input">
                <x-inputs.input :label="$s->field('Забыли пароль', 'Повторите пароль', 'text', true, 'Repeat Password')" :placeholder="$s->field('Забыли пароль', 'Пароль', 'text', true, 'Password')" type='password' name='password_confirmation' />
            </div>

            <x-inputs.button
                type="submit">{{ $s->field('Забыли пароль', 'Текст кнопки 3', 'text', true, 'Update password') }}</x-inputs.button>
            <div class="form-answer color-red error extra-text">
                {{ $s->field('Забыли пароль', 'Текст ошибки 3', 'text', true, 'Unknown error') }}</div>
        </form>

        <div class="password-btn-block">
            <div class="button-small color-red btn-link " onclick="open_modal('account')">
                {{ $s->field('Забыли пароль', 'Создать аккаунт', 'text', true, 'Create an account') }}</div>
            <div class="button-small color-red btn-link " onclick="open_modal('sign-in')">
                {{ $s->field('Забыли пароль', 'Войти', 'text', true, 'Sign in') }}</div>
        </div>

    </div>
</div>


@desktopcss
<style>
    .form-answer {
        display: none;
        margin-top: 5px;
    }

    .form-modal-forgot {
        display: none;
    }

    .form-modal-forgot.active {
        display: block;
    }

    .password-recovery-modal-description {
        width: 361px;
        margin-bottom: 15px;
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

    form .btn {
        width: 100%;
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

    .password-btn-block {
        display: flex;
        justify-content: space-between;
        width: 361px;
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

    .password-recovery-modal-title {
        align-self: flex-start;
        margin-bottom: 20px;
    }

    .container-modal-password-recovery .header-search-form {
        margin: 0;
        margin-bottom: 20px;
    }

    .container-modal-password-recovery .header-search-input {
        border: 1px solid var(--color-line);
    }

    .modal-password-recovery-blocks {
        align-self: flex-start;
        height: 800px;
        width: 100%;
        overflow: auto;
    }

    .modal-password-recovery-blocks::-webkit-scrollbar {
        width: 3px;
    }

    .modal-password-recovery-blocks::-webkit-scrollbar-track {
        background: #E6E6E6;
    }

    .modal-password-recovery-blocks::-webkit-scrollbar-thumb {
        background: var(--color-main);
    }

    .modal-password-recovery-block-title {
        margin-bottom: 10px;
    }

    .modal-password-recovery-block {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modal-password-recovery-block-city {
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
    .container-modal-password-recovery {
        width: 290px;
        display: flex;
        padding: 35px 20px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .password-recovery-modal-title {
        align-self: flex-start;
        margin-bottom: 15px;
    }

    .container-modal-password-recovery .header-search-form {
        order: 0;
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 15px;
    }

    .container-modal-password-recovery .header-search-input {
        border: 1px solid var(--color-line);
    }

    .modal-password-recovery-blocks {
        align-self: flex-start;
        height: 325px;
        overflow: auto;
        width: 100%;
    }

    .modal-password-recovery-blocks::-webkit-scrollbar {
        width: 2px;
    }

    .modal-password-recovery-blocks::-webkit-scrollbar-track {
        background-color: var(--color-line);
    }

    .modal-password-recovery-blocks::-webkit-scrollbar-thumb {
        background-color: var(--color-main);
    }

    .modal-password-recovery-block-title {
        margin-bottom: 10px;
    }

    .modal-password-recovery-block {
        margin-bottom: 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modal-password-recovery-block-city {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 22px;
        font-feature-settings: 'pnum' on, 'lnum' on;
        margin-bottom: 8px;
    }

    .password-recovery-modal-description {
        margin-bottom: 15px;
    }

    .form-answer {
        display: none;
        text-align: center;
        margin-top: 5px;
    }

    .form-modal-forgot {
        display: none;
    }

    .form-modal-forgot.active {
        display: block;
    }

    .password-btn-block {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
@endcss

@startjs
<script>
    async function sendCode(form) {

        const route = form.getAttribute('action')
        const email = form.querySelector('input[name="email"]').value

        const response = await post(route, {
            email: email,
        }, true, true)

        if (response.success) {
            form.querySelector('.form-answer.error').style.display = 'none'
            form.classList.remove('active')
            document.querySelector('#check-code').classList.add('active')
        } else {
            form.querySelector('.form-answer.error').style.display = 'block'
        }

        return false;
    }

    async function checkCode(form) {

        const route = form.getAttribute('action')
        const email = document.querySelector('#send-code input[name="email"]').value
        const code = form.querySelector('input[name="code"]').value

        const response = await post(route, {
            email: email,
            code: code,
        }, true, true)

        if (response.success) {
            form.querySelector('.form-answer.error').style.display = 'none'
            form.classList.remove('active')
            document.querySelector('#change-password').classList.add('active')
        } else {
            form.querySelector('.form-answer.error').style.display = 'block'
        }

        return false;
    }

    async function changePassword(form) {

        const route = form.getAttribute('action')

        const email = document.querySelector('#send-code input[name="email"]').value
        const code = document.querySelector('#check-code input[name="code"]').value
        const password = form.querySelector('input[name="password"]').value
        const password_confirmation = form.querySelector('input[name="password_confirmation"]').value

        const response = await post(route, {
            email: email,
            code: code,
            password: password,
            password_confirmation: password_confirmation,
        }, true, true)

        if (response.success) {
            form.querySelector('.form-answer.error').style.display = 'none'
            form.classList.remove('active')
            document.querySelector('#send-code').classList.add('active')

            close_modal()
            open_modal('sign-in')
        } else {

            if (response.data.errors) {

                for (const [key, error] of Object.entries(response.data.errors)) {
                    const errorElement = form.elements[key].parentElement.querySelector('.input-error')
                    errorElement.innerText = error
                    errorElement.style.display = 'block'
                }
            } else {
                form.querySelector('.form-answer.error').style.display = 'block'
            }

            // if (response.data.password){
            //     $(form.querySelector('.form-answer.error')).text(response.data.password[0])
            // } else if (response.data.phone) {
            //     $(form.querySelector('.form-answer.error')).text(response.data.phone[0])
            // } else if (response.data.email) {
            //     $(form.querySelector('.form-answer.error')).text(response.data.email[0])
            // } else if (response.data.password_confirmation) {
            //     $(form.querySelector('.form-answer.error')).text(response.data.password_confirmation[0])
            // }
        }

        return false;
    }
</script>
@endjs
