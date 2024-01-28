@php $s = new Single('Модальные окна', 0, 2); @endphp

<div class="modal fade-in" id="modal-loyalty">
    <div class="container-modal container-modal-loyalty">
        <div class="closemodal closemodal-loyalty" onclick="close_modal()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.723145" width="1.02265" height="17.385" transform="rotate(-45 0 0.723145)"
                    fill="#333333" />
                <rect x="12.293" width="1.02265" height="17.385" transform="rotate(45 12.293 0)" fill="#333333" />
            </svg>
        </div>
        <div class="h5 color-black loyalty-modal-title">
            {{ $s->field('Программа лояльности', 'Заголовок', 'text', true, 'Registration in the loyalty program') }}
        </div>

        <form action="{{ route('api-register-loyalty', [], false) }}" onsubmit="registerLoyalty(this); return false;">
            <div class="form-input">
                <x-inputs.input :label="$s->field('Программа лояльности', 'Имя и фамилия', 'text', true, 'Name and surname')" :placeholder="$s->field('Программа лояльности', 'Имя и фамилия', 'text', true, 'Name and surname')" type='text' name='name' />
            </div>
            <div class="form-input">
                <x-inputs.input label='email' placeholder='example@gmail.com' type='email' name='email' />
            </div>
            <div class="form-input">
                <x-inputs.input label='phone' placeholder='+373 (22) 0000000' type='phone' name='phone' />
            </div>
            <div class="form-input">
                <x-inputs.input :label="$s->field('Программа лояльности', 'Дата рождения', 'text', true, 'Date of Birth')" placeholder='01.01.1990' type='date' name='date' />
            </div>

            <x-inputs.button
                type="submit">{{ $s->field('Программа лояльности', 'Текст кнопки', 'text', true, 'Create an account') }}</x-inputs.button>

            <div class="extra-text color-red register-model-error"
                data-default="{{ $s->field('Регистрация', 'Ошибка', 'text', true, 'Unknown error') }}">
                {{ $s->field('Регистрация', 'Ошибка', 'text', true, 'Unknown error') }}</div>
        </form>
    </div>
</div>


@desktopcss
<style>
    .modal-loyalty {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
        display: flex;
        z-index: 10001;
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

    .container-modal-loyalty {
        width: 501px;
    }

    .loyalty-modal-title {
        align-self: flex-start;
        margin-bottom: 20px;
    }

    .container-modal-loyalty .header-search-form {
        margin: 0;
        margin-bottom: 20px;
    }

    .container-modal-loyalty .header-search-input {
        border: 1px solid var(--color-line);
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
    .container-modal-loyalty {
        width: 290px;
        display: inline-flex;
        padding: 35px 20px;
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }

    .loyalty-modal-title {
        align-self: flex-start;
        margin-bottom: 15px;
    }

    .container-modal-loyalty .header-search-form {
        order: 0;
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 15px;
    }

    .container-modal-loyalty .header-search-input {
        border: 1px solid var(--color-line);
    }

    .modal-cities-blocks {
        align-self: flex-start;
        height: 325px;
        overflow: auto;
        width: 100%;
    }

    .membership-modal-text {
        text-align: center;
    }
</style>
@endcss

@startjs
<script>
    async function registerLoyalty(form) {

        event.preventDefault()

        const route = form.getAttribute('action')

        const response = await post(route, {
            name: form.elements['name'].value,
            phone: form.elements['phone'].value,
            email: form.elements['email'].value,
            date: form.elements['date'].value,
        }, true)

        if (response.success) {
            if (window.location.href.indexOf("account") !== -1) {
                location.reload()
            } else {
                form.reset()
                close_modal()
                open_modal('loyalty-success')
            }
        } else {
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
