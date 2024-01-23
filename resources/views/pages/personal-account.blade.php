<x-layout>
    <?php $s = new Single('Аккаунт', 0, 1); ?>


    <div class="container">
        <div class="main">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Личный аккаунт', 'Заголовок', 'textarea', true, 'Personal account'),
                        'link' => '',
                    ],
                ]" />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="page-content mb">
            <div class="page-content-header">
                <div class="h3 page-title color-black">
                    {{ $s->field('Личный аккаунт', 'Заголовок', 'text', true, 'Personal account') }}</div>
                <div class="extra-text color-grey page-content-logout"
                    onclick="logout('{{ route('api-logout', [], false) }}')">
                    {{ $s->field('Личный аккаунт', 'Выйти', 'text', true, 'Exit') }}
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" class="exit-icon"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.8589 8.06201C16.8515 8.03965 16.8456 8.0162 16.8363 7.99452C16.7982 7.89824 16.741 7.80757 16.6626 7.72967L14.6348 5.70159C14.3306 5.39765 13.8377 5.39765 13.5334 5.70159C13.2291 6.00582 13.2291 6.51892 13.5334 6.82315L14.2693 7.57878H7.37693C6.95737 7.57878 6.61719 7.94568 6.61719 8.36525C6.61719 8.7851 6.95721 9.15172 7.37693 9.15172H14.3708L13.5718 9.90405C13.2676 10.208 13.2675 10.6781 13.5718 10.9819C13.8756 11.2858 14.369 11.274 14.6729 10.9701L16.7013 8.93609C16.9361 8.70127 16.9874 8.3485 16.8592 8.06194L16.8589 8.06201Z"
                            fill="#AEAEAE" />
                        <path
                            d="M10.8219 10.3304C10.4025 10.3304 10.1336 10.6709 10.1336 11.0902V13.1047C10.1336 13.5801 9.81373 14.0674 9.33845 14.0674H3.84358C3.36846 14.0674 2.85823 13.5801 2.85823 13.1047V3.55491C2.85823 3.07993 3.36846 2.85924 3.84358 2.85924H9.33845C9.81371 2.85924 10.1336 3.07994 10.1336 3.55491V5.56939C10.1336 5.98896 10.4024 6.32941 10.8219 6.32941C11.2417 6.32941 11.5102 5.98898 11.5102 5.56939L11.51 3.55491C11.51 2.24283 10.651 1.28613 9.33849 1.28613H3.84361C2.53126 1.28613 1.28516 2.24283 1.28516 3.55491V13.105C1.28516 14.4169 2.53126 15.6406 3.84361 15.6406H9.33849C10.651 15.6406 11.51 14.4169 11.51 13.1047V11.0902C11.51 10.6711 11.2416 10.3305 10.8219 10.3305L10.8219 10.3304Z"
                            fill="#AEAEAE" />
                    </svg>
                </div>
            </div>

            <div class="content-block">
                <div class="left-block desktop">
                    <div class="list-item color-blck tablink active" onclick="(event, 'account-block')">
                        <img src="/images/icons/account-icon-black.svg" class="list-img-account">
                        <div class="list-item-title button-small color-black">
                            {{ $s->field('Личный аккаунт', 'Информация заголовок', 'text', true, 'Personal data') }}
                        </div>
                        <img src="/images/icons/list-arrow-black.svg" class="list-arrow-img">
                    </div>
                    <div class="list-item color-black tablink" onclick="openTabs(event, 'loyalty-block')">
                        <img src="/images/icons/loyalty.svg" class="list-img-box">
                        <div class="list-item-title button-small color-black">
                            {{ $s->field('Личный аккаунт', 'Програма лояльности заголовок', 'text', true, 'Loyalty program') }}
                        </div>
                        <img src="/images/icons/list-arrow-red.svg" class="list-arrow-img">
                    </div>
                </div>

                <div class="left-block mobile">
                    <div class="account-mobile-block">
                        <div class="list-item color-blck tablink"
                            onclick="openTab('account-block-mobile', 'account-tabs')" id="account-tabs">
                            <img src="/images/icons/account-icon-black.svg" class="list-img-account">
                            <div class="list-item-title button-small color-black">
                                {{ $s->field('Личный аккаунт', 'Информация заголовок', 'text', true, 'Personal data') }}
                            </div>
                            <img src="/images/icons/down-arrow.svg" class="list-arrow-img">
                            <img src="/images/icons/up-arrow.svg" class="list-arrow-imgg">
                        </div>
                        <div class="account-block tabs" id="account-block-mobile">
                            <form action="{{ route('api-user-edit', [], false) }}" onsubmit="userEdit(this)">
                                <div class="form-mob">
                                    <div class="personal-data-title color-black button-normal">
                                        {{ $s->field('Личный аккаунт', 'Информация заголовок', 'text', true, 'Personal data') }}
                                    </div>

                                    <div class="personal-data">
                                        <div class="list-form-input">
                                            <x-inputs.input :label="$s->field(
                                                'Личный аккаунт',
                                                'Имя и фамилия',
                                                'text',
                                                true,
                                                'Name and surname',
                                            )" :placeholder="$s->field(
                                                'Личный аккаунт',
                                                'Имя и фамилия',
                                                'text',
                                                true,
                                                'Name and surname',
                                            )" type='text'
                                                name='name' :value="$user->name" />
                                        </div>
                                        <div class="list-form-input">
                                            <x-inputs.input label='email*' placeholder='example@gmail.com'
                                                type='email' name='email' :value="$user->email" />
                                        </div>
                                        <div class="list-form-input">
                                            <x-inputs.input :label="$s->field(
                                                'Личный аккаунт',
                                                'Номер телефона',
                                                'text',
                                                true,
                                                'Phone',
                                            )" placeholder='+373 (22) 0000000'
                                                type='phone' name='phone' :value="$user->phone" />
                                        </div>
                                        <div class="list-form-input">
                                            <x-inputs.input :label="$s->field(
                                                'Личный аккаунт',
                                                'Дата рождения',
                                                'text',
                                                true,
                                                'Date of Birth',
                                            )" placeholder='01.01.1990' type="date"
                                                name='date' :value="date_format(date_create($user->date), 'Y-m-d')" />
                                        </div>
                                    </div>

                                    <div class="password-change-title color-black button-normal">
                                        {{ $s->field('Личный аккаунт', 'Изменить пароль', 'text', true, 'Password change') }}
                                    </div>
                                    <div class="password-change">

                                        <div class="list-form-input">
                                            <x-inputs.input :label="$s->field('Личный аккаунт', 'Пароль', 'text', true, 'Password*')" placeholder='' type='password'
                                                name='password' />
                                        </div>
                                        <div class="list-form-input">
                                            <x-inputs.input :label="$s->field(
                                                'Личный аккаунт',
                                                'Повторите пароль',
                                                'text',
                                                true,
                                                'Repeat password*',
                                            )" placeholder='' type='password'
                                                name='password_confirmation' />
                                        </div>

                                    </div>
                                    <div class="btn-account">
                                        <x-inputs.button
                                            type="submit">{{ $s->field('Личный аккаунт', 'Сохранить', 'text', true, 'Save Changes') }}</x-inputs.button>
                                        <div class="account-answer success color-green2">
                                            {{ $s->field('Личный аккаунт', 'Успешно', 'text', true, 'Data saved successfully!') }}
                                        </div>
                                        <div class="account-answer error color-red"
                                            data-default="Error! Data is not saved!">
                                            {{ $s->field('Личный аккаунт', 'Ошибка', 'text', true, 'Error! Data is not saved!') }}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="left-block mobile">
                    <div class="account-mobile-block">
                        <div class="list-item color-black tablink"
                            onclick="openTab('loyalty-block-mobile', 'loyalty-tabs')" id="loyalty-tabs">
                            <img src="/images/icons/loyalty.svg" class="list-img-box">
                            <div class="list-item-title button-small color-black">
                                {{ $s->field('Личный аккаунт', 'Програма лояльности заголовок', 'text', true, 'Loyalty program') }}
                            </div>
                            <img src="/images/icons/down-arrow.svg" class="list-arrow-img">
                            <img src="/images/icons/up-arrow.svg" class="list-arrow-imgg">
                        </div>
                    </div>

                    <div class="loyalty-block tabs" id="loyalty-block-mobile">
                        <div class="personal-data-title color-black button-normal">
                            {{ $s->field('Личный аккаунт', 'Програма лояльности заголовок', 'text', true, 'Loyalty program') }}
                        </div>
                        @if (empty($user->loyalty_code))
                            <form action="{{ route('api-register-loyalty', [], false) }}"
                                onsubmit="registerLoyalty(this); return false;">
                                <div class="extra-text color-black personal-data-description">
                                    {!! Field::enter_to_br(
                                        $s->field(
                                            'Личный аккаунт',
                                            'Програма лояльности описание',
                                            'textarea',
                                            true,
                                            'Become a member of our loyalty program and receive individual discounts and great offers. To do this, leave the required data.',
                                        ),
                                    ) !!}
                                </div>
                                <div class="personal-data">
                                    <div class="list-form-input">
                                        <x-inputs.input :label="$s->field(
                                            'Личный аккаунт',
                                            'Имя и фамилия',
                                            'text',
                                            true,
                                            'Name and surname',
                                        )" :placeholder="$s->field(
                                            'Личный аккаунт',
                                            'Имя и фамилия',
                                            'text',
                                            true,
                                            'Name and surname',
                                        )" type='text'
                                            name='name' :value="$user->name" />
                                    </div>
                                    <div class="list-form-input">
                                        <x-inputs.input label='email*' placeholder='example@gmail.com' type='email'
                                            name='email' :value="$user->email" />
                                    </div>
                                    <div class="list-form-input">
                                        <x-inputs.input :label="$s->field('Личный аккаунт', 'Номер телефона', 'text', true, 'Phone')" placeholder='+373 (22) 0000000'
                                            type='phone' name='phone' :value="$user->phone" />
                                    </div>
                                    <div class="list-form-input">
                                        <x-inputs.input :label="$s->field(
                                            'Личный аккаунт',
                                            'Дата рождения',
                                            'text',
                                            true,
                                            'Date of Birth',
                                        )" placeholder='01.01.1990' type="date"
                                            name='date' :value="date_format(date_create($user->date), 'Y-m-d')" />
                                    </div>
                                </div>
                                <div class="btn-account">
                                    <x-inputs.button
                                        type="submit">{{ $s->field('Личный аккаунт', 'Зарегистрироваться в програме лояльности', 'text', true, 'Register for a loyalty program') }}</x-inputs.button>
                                    <div class="account-answer error color-red">
                                        {{ $s->field('Личный аккаунт', 'Ошибка', 'text', true, 'Error! Data is not saved!') }}
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="extra-text color-black loyalty-code">Your loyalty program number: <span
                                    class="button-normal">{{ $user->loyalty_code }}</span></div>
                            <div class="extra-text color-black loyalty-code-qr-text">Your QR code to present in stores
                                when making a purchase:</div>
                            <div class="loyalty-qr">
                                {{ QrCode::size(120)->generate($user->loyalty_code) }}
                            </div>
                        @endif

                    </div>

                </div>



                <div class="right-block desktop">
                    <div class="account-block tabs" style="display: block" id="account-block">
                        <form action="{{ route('api-user-edit', [], false) }}" onsubmit="userEdit(this)">
                            <div class="personal-data-title color-black button-normal">
                                {{ $s->field('Личный аккаунт', 'Информация заголовок', 'text', true, 'Personal data') }}
                            </div>

                            <div class="personal-data">
                                <div class="list-form-input">
                                    <x-inputs.input :label="$s->field(
                                        'Личный аккаунт',
                                        'Имя и фамилия',
                                        'text',
                                        true,
                                        'Name and surname',
                                    )" :placeholder="$s->field(
                                        'Личный аккаунт',
                                        'Имя и фамилия',
                                        'text',
                                        true,
                                        'Name and surname',
                                    )" type='text'
                                        name='name' :value="$user->name" />
                                </div>
                                <div class="list-form-input">
                                    <x-inputs.input label='email*' placeholder='example@gmail.com' type='email'
                                        name='email' :value="$user->email" />
                                </div>
                                <div class="list-form-input">
                                    <x-inputs.input :label="$s->field('Личный аккаунт', 'Номер телефона', 'text', true, 'Phone')" placeholder='+373 (22) 0000000' type='phone'
                                        name='phone' :value="$user->phone" />
                                </div>
                                <div class="list-form-input">
                                    <x-inputs.input :label="$s->field(
                                        'Личный аккаунт',
                                        'Дата рождения',
                                        'text',
                                        true,
                                        'Date of Birth',
                                    )" placeholder='01.01.1990' type="date"
                                        name='date' :value="date_format(date_create($user->date), 'Y-m-d')" />
                                </div>
                            </div>

                            <div class="password-change-title color-black button-normal">
                                {{ $s->field('Личный аккаунт', 'Изменить пароль', 'text', true, 'Password change') }}
                            </div>
                            <div class="password-change">

                                <div class="list-form-input">
                                    <x-inputs.input :label="$s->field('Личный аккаунт', 'Пароль', 'text', true, 'Password*')" placeholder='' type='password'
                                        name='password' />
                                </div>
                                <div class="list-form-input">
                                    <x-inputs.input :label="$s->field(
                                        'Личный аккаунт',
                                        'Повторите пароль',
                                        'text',
                                        true,
                                        'Repeat password*',
                                    )" placeholder='' type='password'
                                        name='password_confirmation' />
                                </div>

                            </div>
                            <div class="btn-account">
                                <x-inputs.button
                                    type="submit">{{ $s->field('Личный аккаунт', 'Сохранить', 'text', true, 'Save Changes') }}</x-inputs.button>
                                <div class="account-answer success color-green2">
                                    {{ $s->field('Личный аккаунт', 'Успешно', 'text', true, 'Data saved successfully!') }}
                                </div>
                                <div class="account-answer error color-red" data-default="Error! Data is not saved!">
                                    {{ $s->field('Личный аккаунт', 'Ошибка', 'text', true, 'Error! Data is not saved!') }}
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="loyalty-block tabs" style="display: none" id="loyalty-block">
                        <div class="personal-data-title color-black button-normal">
                            {{ $s->field('Личный аккаунт', 'Програма лояльности заголовок', 'text', true, 'Loyalty program') }}
                        </div>
                        @if (empty($user->loyalty_code))
                            <form action="{{ route('api-register-loyalty', [], false) }}"
                                onsubmit="registerLoyalty(this); return false;">
                                <div class="extra-text color-black personal-data-description">
                                    {!! Field::enter_to_br(
                                        $s->field(
                                            'Личный аккаунт',
                                            'Програма лояльности описание',
                                            'textarea',
                                            true,
                                            'Become a member of our loyalty program and receive individual discounts and great offers. To do this, leave the required data.',
                                        ),
                                    ) !!}
                                </div>
                                <div class="personal-data">
                                    <div class="list-form-input">
                                        <x-inputs.input :label="$s->field(
                                            'Личный аккаунт',
                                            'Имя и фамилия',
                                            'text',
                                            true,
                                            'Name and surname',
                                        )" :placeholder="$s->field(
                                            'Личный аккаунт',
                                            'Имя и фамилия',
                                            'text',
                                            true,
                                            'Name and surname',
                                        )" type='text'
                                            name='name' :value="$user->name" />
                                    </div>
                                    <div class="list-form-input">
                                        <x-inputs.input label='email*' placeholder='example@gmail.com' type='email'
                                            name='email' :value="$user->email" />
                                    </div>
                                    <div class="list-form-input">
                                        <x-inputs.input :label="$s->field('Личный аккаунт', 'Номер телефона', 'text', true, 'Phone')" placeholder='+373 (22) 0000000'
                                            type='phone' name='phone' :value="$user->phone" />
                                    </div>
                                    <div class="list-form-input">
                                        <x-inputs.input :label="$s->field(
                                            'Личный аккаунт',
                                            'Дата рождения',
                                            'text',
                                            true,
                                            'Date of Birth',
                                        )" placeholder='01.01.1990' type="date"
                                            name='date' :value="date_format(date_create($user->date), 'Y-m-d')" />
                                    </div>
                                </div>
                                <div class="btn-account">
                                    <x-inputs.button
                                        type="submit">{{ $s->field('Личный аккаунт', 'Зарегистрироваться в програме лояльности', 'text', true, 'Register for a loyalty program') }}</x-inputs.button>
                                    <div class="account-answer error color-red">
                                        {{ $s->field('Личный аккаунт', 'Ошибка', 'text', true, 'Error! Data is not saved!') }}
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="extra-text color-black loyalty-code">Your loyalty program number: <span
                                    class="button-normal">{{ $user->loyalty_code }}</span></div>
                            <div class="extra-text color-black loyalty-code-qr-text">Your QR code to present in stores
                                when making a purchase:</div>
                            <div class="loyalty-qr">
                                {{ QrCode::size(120)->generate($user->loyalty_code) }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Personal account') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Personal account') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Personal account') }}
    </x-slot>

    <x-slot name="javascript">
        <script>
            async function userEdit(form) {

                event.preventDefault()

                const route = form.getAttribute('action')

                const response = await post(route, {
                    name: form.elements['name'].value,
                    date: form.elements['date'].value,
                    phone: form.elements['phone'].value,
                    email: form.elements['email'].value,
                    password: form.elements['password'].value,
                    password_confirmation: form.elements['password_confirmation'].value,
                }, true)

                if (response.success) {
                    form.querySelector('.account-answer.success').style.display = 'block'
                    form.querySelector('.account-answer.error').style.display = 'none'

                    form.elements['password'].value = ''
                    form.elements['password_confirmation'].value = ''
                } else {

                    // for (const [key, error] of Object.entries(response.data.errors)) {
                    // 	const errorElement = form.elements[key].parentElement.querySelector('.input-error')
                    // 	errorElement.innerText = error
                    // 	errorElement.style.display = 'block'
                    // }

                    // } else {
                    form.querySelector('.account-answer.success').style.display = 'none'
                    form.querySelector('.account-answer.error').style.display = 'block'
                    // }

                    if (response.data.message) {
                        form.querySelector('.account-answer.error').innerText = response.data.message
                    } else {
                        form.querySelector('.account-answer.error').innerText = form.querySelector('.account-answer.error')
                            .getAttribute('data-default')
                    }
                }
            }

            async function logout(route) {

                const response = await post(route, {})

                if (response.success) {
                    location.href = response.data.link
                }
            }
        </script>
    </x-slot>


</x-layout>
@desktopcss
<style>
    .loyalty-qr svg {
        width: 120px;
        height: 120px;
    }

    .loyalty-code {
        margin-bottom: 20px;
    }

    .loyalty-code span {
        margin-left: 15px;
    }

    .loyalty-code-qr-text {
        margin-bottom: 15px;
    }

    .page-content-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .page-content-logout {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .page-content-logout svg {
        margin-left: 6px;
    }

    .content-block {
        display: flex;
        align-items: flex-start;
        justify-content: space-between
    }

    .page-content {
        padding: 0 80px;
    }

    .page-title {
        margin-bottom: 20px;
    }

    .left-block {
        display: flex;
        flex-direction: column;
        width: 328px;
        padding: 20px;
        align-items: center;
        gap: 10px;
        border-radius: 8px;
        background: var(--color-white);
        box-shadow: 0px 4px 18px 2px #EDEDED;
        margin-right: 135px;
    }

    .right-block {
        flex: 1;
    }

    .list-item {
        display: flex;
        justify-content: flex-start;
        width: 303px;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        cursor: pointer;
    }

    .list-item:last-child {
        margin-bottom: 0;
    }

    .list-item-title {
        width: 100%;
    }

    .list-img-account {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
    }

    .list-img-box {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
    }

    .list-arrow-img {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
        display: none;
        float: right;
    }

    .left-block .active .list-arrow-img {
        display: block;
    }

    .left-block .active .list-img-account {
        content: url('/images/icons/account-red.svg');
    }

    .left-block .active .list-item-title {
        color: var(--color-red);
    }

    .left-block .active .list-img-box {
        content: url('/images/icons/loyalty-red.svg');
    }

    .personal-data-title {
        margin-bottom: 18px;
    }

    .personal-data {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

    }

    .password-change {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

    }

    .password-change-title {
        margin-top: 50px;
        margin-bottom: 18px;
    }

    .list-form-input {
        width: 381px;
        border-bottom: 1px solid var(--color-black);
        margin-bottom: 25px;
    }

    .btn-account {
        width: 381px;
    }

    .account-answer {
        text-align: center;
        font-family: Montserrat;
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        margin-top: 8px;
        display: none;
    }

    .personal-data-description {
        width: 640px;
        margin-bottom: 25px;
    }

    .breadcrumbs-block {
        position: relative;
        margin-left: 80px;
        z-index: 2;
    }

    .breadcrumbs-block .little-text {
        color: var(--color-black);
    }

    .breadcrumbs-last {
        color: var(--color-light-grey);
    }
</style>
@mobilecss
<style>
    .loyalty-qr svg {
        width: 80px;
        height: 80px;
    }

    .loyalty-code {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .loyalty-code-qr-text {
        margin-bottom: 15px;
    }

    .content-block {
        display: flex;
        flex-direction: column;
        justify-content: space-between
    }

    .page-title {
        margin-bottom: 20px;
    }

    .left-block {
        display: flex;
        flex-direction: column;
        width: 290px;
        height: auto;
        padding: 20px;
        margin-bottom: 6px;
        align-items: center;
        gap: 10px;
        border-radius: 8px;
        background: var(--color-white);
        box-shadow: 0px 4px 18px 2px #EDEDED;
    }

    .list-item {
        display: flex;
        justify-content: flex-start;
        width: auto;
        align-items: center;
        gap: 12px;
        cursor: pointer;
    }

    .list-item:last-child {
        margin-bottom: 0;
    }

    .list-item-title {
        width: 100%;
    }

    .list-img-account {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
    }

    .list-img-box {
        width: 30px;
        height: 30px;
        flex-shrink: 0;
    }

    .list-arrow-img {
        width: 12px;
        height: 12px;
        flex-shrink: 0;
        display: block;
        float: right;
    }

    .list-arrow-imgg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
        display: none;
        float: right;
    }

    .left-block .active .list-arrow-imgg {
        display: block;
    }

    .left-block .active .list-arrow-img {
        display: none;
    }

    .left-block .active .list-img-account {
        content: url('/images/icons/account-red.svg');
    }

    .left-block .active .list-item-title {
        color: var(--color-red);
    }

    .left-block .active .list-img-box {
        content: url('/images/icons/loyalty-red.svg');
    }

    .personal-data-title {
        margin-bottom: 18px;
    }

    .personal-data {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

    }

    .password-change {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

    }

    .password-change-title {
        margin-top: 50px;
        margin-bottom: 18px;
    }

    .list-form-input {
        width: auto;
        border-bottom: 1px solid var(--color-black);
        margin-bottom: 25px;
    }

    .btn-account {
        width: auto;
    }

    .btn-account .btn {
        width: 100%;
    }

    .account-answer {
        text-align: center;
        font-family: Montserrat;
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        margin-top: 8px;
        display: none;
    }

    .personal-data-description {
        width: auto;
        margin-bottom: 25px;
    }

    .breadcrumbs-block {
        position: relative;
        z-index: 2;
    }

    .breadcrumbs-block .little-text {
        color: var(--color-black);
    }

    .breadcrumbs-last {
        color: var(--color-light-grey);
    }

    .right-block {
        padding: 0;
    }

    .main .container {
        padding-left: 0;
        padding-right: 0;
    }

    .page-content-logout {
        display: flex;
        align-items: center;
        cursor: pointer;
        margin-bottom: 25px;
    }

    .exit-icon {
        margin-left: 6px;
    }

    .loyalty-block {
        display: none;
    }

    .loyalty-block.active {
        display: block;
        margin-top: 20px;

    }

    .account-block {
        display: none;
    }

    .account-block.active {
        display: block;
        margin-top: 20px;

    }

    .account-mobile-block {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        height: auto;
        width: 100%
    }
</style>
@endcss
