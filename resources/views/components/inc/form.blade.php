<?php $s = new Single('Карьера', 10, 1); ?>
<form class="form-contact" action="{{ route('send-contact', [], false) }}" onsubmit="send_contact(this); return false;">
    <div class="form-input-block {{ $type ? 'wrap' : '' }} {{ $department ? 'wrap' : '' }}">
        <div class="input-block">
            <label for="name"
                class="label-input color-white">{{ $s->field('Форма обратной связи', 'Описание поля Имя', 'text', true, 'Enter your name') }}</label>
            <input class="input extra-text"
                placeholder="{{ $s->field('Форма обратной связи', 'Описание поля Имя', 'text', true, 'Enter your name') }}"
                type="text" required name="name">
        </div>
        <div class="input-block">
            <label for="email"
                class="label-input color-white">{{ $s->field('Форма обратной связи', 'Описание поля Email', 'text', true, 'Enter your email*') }}</label>
            <input class='input extra-text'
                placeholder="{{ $s->field('Форма обратной связи', 'Описание поля Email', 'text', true, 'example@gmail.com ') }}"
                type="email" required name="email">
        </div>
        @if ($type)
            @php
                $supliersSingle = new Single('Партнеры', 5, 1);
                $types = $supliersSingle->field('Форма обратной связи', 'Тип', 'repeat', true);
                $typesItems = [];
                foreach ($types as $elm) {
                    $typesItems[] = [
                        'title' => $elm->field('Название', 'text', ''),
                        'value' => $elm->field('Название', 'text', ''),
                    ];
                }
            @endphp
            <x-inputs.select
                :label="$s->field('Форма обратной связи', 'Описание поля Type', 'text', true, 'Type of cooperation')"
                name="type"
                :items="$typesItems"
            />
        @endif
        @if ($department)
            @php
                $supliersSingle = new Single('Контакты', 10, 1);
                $departments = $supliersSingle->field('Форма обратной связи', 'Отдел', 'repeat', true);
                $departmentsItems = [];
                foreach ($departments as $elm) {
                    $departmentsItems[] = [
                        'title' => $elm->field('Название', 'text', ''),
                        'value' => $elm->field('Название', 'text', ''),
                    ];
                }
            @endphp
            @if(!empty($departmentsItems))
            <x-inputs.select
                :label="$s->field('Форма обратной связи', 'Описание поля Отдел', 'text', true, 'Department')"
                name="department"
                :items="$departmentsItems"
            />
            @else
                <div class="input-block">
                    <label for="department"
                           class="label-input color-white">{{ $s->field('Форма обратной связи', 'Описание поля Отдел', 'text', true, 'Department')}}</label>
                    <input class="input extra-text"
                           placeholder="{{ $s->field('Форма обратной связи', 'Описание поля Отдел', 'text', true, 'Department') }}"
                           type="text"  name="department">
                </div>
            @endif
        @endif

        <div class="input-block input-block-message">
            <label for="message"
                class="label-input color-white">{{ $s->field('Форма обратной связи', 'Описание поля Message', 'text', true, 'Message') }}</label>
            <textarea rows="5" cols="33" class='input extra-text'  placeholder="{{ $s->field('Форма обратной связи', 'Описание поля Message', 'text', true, 'Your message ') }}"
                required name="message"></textarea>
        </div>
    </div>
    <div class="button-block">
        <div class="checkbox ">
            <label class="containercheckbox extra-text color-white ">
                <input type="checkbox" name="check" value="0" required>
                <span class="checkmark"></span>
                <span>{{ $s->field('Форма обратной связи', 'Описание чекбокса', 'text', true, 'I agree to the processing of personal data according to the personal data policy.') }}</span>
            </label>
        </div>
        <button class='button-small color-red btn-submit' type="submit">
            {{ $s->field('Форма обратной связи', 'Описание кнопки', 'text', true, 'Send') }}
        </button>
    </div>
    @if (!$nocv)
        <div class="file-input" js-file-manager>
            <label class="file-input__real" hidden aria-hidden="true">
                <input type="file" name="file" accept=".doc, .docx, .pdf, .png, .jpeg" js-real-file-input>
            </label>
            <span class="input__left">
                <button type="button" class="button-small-2 color-white btn-file-input" js-fake-file-input>Attach your
                    CV</button>
                <div class="file-input-files">
                    <svg class="file-input-icon" width="17" height="18" viewBox="0 0 17 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.9479 10.3665L13.7172 9.237L8.17923 4.15486C7.1586 3.2252 5.51109 3.228 4.49428 4.16117C3.47746 5.09434 3.47441 6.60632 4.4874 7.54299L10.0251 12.6266C10.2516 12.8346 10.619 12.8346 10.8456 12.6266C11.0721 12.4187 11.0721 12.0816 10.8456 11.8736L5.30791 6.78998C4.74154 6.2702 4.74154 5.42764 5.30791 4.90787C5.87427 4.38809 6.79236 4.38809 7.35873 4.90787L12.8981 9.99L14.1288 11.1193C15.1484 12.0554 15.148 13.5728 14.1281 14.5084C13.1081 15.444 11.4549 15.4438 10.4353 14.5077L9.40993 13.5664L3.66702 8.29588L3.2567 7.91943C1.82256 6.56212 1.84078 4.39978 3.29746 3.06281C4.75428 1.72596 7.11045 1.70924 8.58942 3.0254L14.7425 8.67244C14.8892 8.80689 15.1028 8.85938 15.3029 8.81016C15.5032 8.76094 15.6596 8.6175 15.7132 8.43372C15.7669 8.24994 15.7095 8.054 15.563 7.91943L9.40993 2.27251C7.48293 0.512098 4.36689 0.515371 2.44435 2.27987C0.521677 4.04426 0.51811 6.90396 2.43632 8.67244L8.58942 14.3194L9.6163 15.2607C11.0972 16.5661 13.4441 16.5444 14.8958 15.2116C16.3476 13.879 16.3707 11.7252 14.9479 10.3665Z"
                            fill="#A3A3A3" />
                    </svg>
                    <span class="input__no-file extra-text color-white" js-no-file></span>
                    <span class="input__files chip__container extra-text color-white" js-chip-container></span>
                    <div class="input__remove" hidden js-remove-files>
                        <svg xmlns="http://www.w3.org/2000/svg" class="input__remove__icon" width="14"
                            height="14" viewBox="0 0 14 14" fill="none">
                            <path
                                d="M7.55245 7.00002L11.8856 2.66686C12.0381 2.5143 12.0381 2.26696 11.8856 2.11442C11.733 1.96188 11.4857 1.96186 11.3331 2.11442L6.99999 6.44758L2.66686 2.11442C2.5143 1.96186 2.26696 1.96186 2.11442 2.11442C1.96188 2.26698 1.96186 2.51432 2.11442 2.66686L6.44755 7L2.11442 11.3332C1.96186 11.4857 1.96186 11.7331 2.11442 11.8856C2.19069 11.9619 2.29067 12 2.39065 12C2.49063 12 2.59059 11.9619 2.66688 11.8856L6.99999 7.55246L11.3331 11.8856C11.4094 11.9619 11.5094 12 11.6094 12C11.7093 12 11.8093 11.9619 11.8856 11.8856C12.0381 11.733 12.0381 11.4857 11.8856 11.3332L7.55245 7.00002Z"
                                fill="#D2D2D2" />
                        </svg>
                    </div>
                </div>
            </span>
        </div>
    @endif
    <div class="message success extra-text">Thank you! Your application sended!</div>
    <div class="message error extra-text color-black">Error! Your application not sended!</div>
</form>

@desktopcss

<style>
    textarea {
        resize: none;
        height: 46px;
    }
    .form-contact .select {
        height: 35px;
        width: 400px;
    }

    .form-contact .select-title,
    .form-contact .select-title::after {
        border-color: var(--color-white);
        color: var(--color-white);
    }

    .form-contact .select-label {
        color: var(--color-white) !important;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .message {
        margin-top: 10px;
        display: none;
    }

    .message.success {
        color: var(--color-green2);
    }

    .input__left {
        display: flex;
        justify-content: flex-start;
    }

    .file-input-files {
        display: flex;
        justify-content: flex-start;
        align-self: center;
    }

    .btn-file-input {
        display: flex;
        padding: 6px 25px;
        align-items: flex-start;
        gap: 10px;
        text-align: center;
        border-radius: 8px;
        border: 1.5px solid var(--color-white);
        background: none;
        margin-right: 30px;
        cursor: pointer;
        transition: .3s;
    }

    .btn-file-input:hover {
        background: var(--color-red-hover);
        border: 1.5px solid var(--color-red-hover);
    }

    .file-input-icon {
        margin-right: 5px;
    }

    .input__remove {
        text-align: center;
        align-self: center;
    }

    .input__remove__icon {
        width: 14px;
        height: 14px;
        margin-left: 8px;
        align-self: center;
    }

    .containercheckbox {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 100%;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-left: 30px;
        transition: .3s;
    }

    .containercheckbox a {
        display: inline;
        color: var(--color-grey);
        text-decoration: underline;
    }

    .containercheckbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 1px;
        width: 1px;
    }

    .checkmark {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        height: 20px;
        width: 20px;
        background-color: var(--color-white);
        transition: .3s;
        border-radius: 2px;
    }

    .checkbox-filter .checkmark {
        background: var(--color-black);
        border: 1px solid var(--color-stroke);
    }

    .checkbox-filter:hover .containercheckbox {
        color: var(--color-black);
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .containercheckbox input:checked~.checkmark:after {
        display: block;
        opacity: 1;
    }

    .containercheckbox input:checked~.checkmark {
        background: var(--color-white);
    }

    .checkbox-filter .containercheckbox input:checked~.checkmark {
        background: var(--color-white);
    }

    .containercheckbox .checkmark:after {
        left: 50%;
        top: calc(50% - 2px);
        transform: translate(-50%, -50%) rotate(45deg);
        width: 4px;
        height: 8px;
        border: solid var(--color-black);
        border-width: 0 2.1px 2.1px 0;
        transition: .3s;
        z-index: 10;
    }

    .btn-submit {
        width: 400px;
        padding: 12px 50px;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 8px;
        background: var(--color-white);
        cursor: pointer;
        transition: .3s;
    }

    .btn-submit:hover {
        color: var(--color-white);
        background: var(--color-red-hover);
    }

    .contact-form-block {
        padding: 80px;
        background: url(/images/mask.png);
    }

    .form-input-block {
        display: flex;
        justify-content: space-between;
    }

    .form-input-block.wrap {
        flex-wrap: wrap;
    }

    .form-input-block.wrap .input-block-message {
        width: 100%;
        margin-top: 30px;
    }

    .form-contact {
        display: flex;
        flex-direction: column;
        margin-top: 40px
    }

    .button-block {
        display: flex;
        justify-content: space-between;
        margin-top: 40px
    }

    .input-block {
        display: flex;
        flex-direction: column;
        width: 400px;
    }

    .input {
        box-sizing: border-box;
        background: none;
        border: none;
        border-bottom: 1px solid var(--color-white);
        color: #fff;
        margin-right: 27px;
        padding: 12px 10px 10px 0;
    }

    input::placeholder,textarea::placeholder {
        color: #fff !important;
    }

    /* Стили для автозаполнения в Chrome */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
        box-shadow: 0 0 0 1000px transparent inset !important;
        -webkit-text-fill-color: #ffff !important;
        color: #fff !important;
        transition: background-color 5000s ease-in-out 0s !important; /* Избежание смены цвета фона */
        caret-color: #fff  !important; /* Цвет каретки */
    }



    .label-input {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
    }
</style>

@mobilecss

<style>

    .form-contact .select {
        height: 35px;
    }

    .form-contact .select-title,
    .form-contact .select-title::after {
        border-color: var(--color-white);
        color: var(--color-white);
        background: none;
        border-radius: 0;
        border-bottom: 1px solid var(--color-white);
    }

    .form-contact .select-label {
        color: var(--color-white) !important;
        font-size: 11px;
        font-style: normal;
        font-weight: 700;
        line-height: 19px;
        text-transform: uppercase;
        margin-top: 30px;
    }


    .input__left {
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .file-input-files {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
    }

    .btn-file-input {
        display: flex;
        padding: 6px 25px;
        align-items: flex-start;
        text-align: center;
        border-radius: 8px;
        border: 1.5px solid var(--color-white);
        background: none;
        margin-right: 30px;
        margin-top: 25px;
        width: 150px;
        ;
        cursor: pointer;
        transition: .3s;
    }

    .btn-file-input:hover {
        background: var(--color-red-hover);
        border: 1.5px solid var(--color-red-hover);
    }

    .file-input-icon {
        margin-right: 5px;
    }

    .input__remove {
        text-align: center;
        align-self: center;
    }

    .input__remove__icon {
        width: 14px;
        height: 14px;
        margin-left: 8px;
        align-self: center;
    }

    .containercheckbox {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 100%;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-left: 30px;
        transition: .3s;
        margin-bottom: 25px;
    }

    .containercheckbox a {
        display: inline;
        color: var(--color-grey);
        text-decoration: underline;
    }

    .containercheckbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 1px;
        width: 1px;
    }

    .checkmark {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        height: 20px;
        width: 20px;
        background-color: var(--color-white);
        transition: .3s;
        border-radius: 2px;
    }

    .checkbox-filter .checkmark {
        background: var(--color-black);
        border: 1px solid var(--color-stroke);
    }

    .checkbox-filter:hover .containercheckbox {
        color: var(--color-black);
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .containercheckbox input:checked~.checkmark:after {
        display: block;
        opacity: 1;
    }

    .containercheckbox input:checked~.checkmark {
        background: var(--color-white);
    }

    .checkbox-filter .containercheckbox input:checked~.checkmark {
        background: var(--color-white);
    }

    .containercheckbox .checkmark:after {
        left: 50%;
        top: calc(50% - 2px);
        transform: translate(-50%, -50%) rotate(45deg);
        width: 4px;
        height: 8px;
        border: solid var(--color-black);
        border-width: 0 2.1px 2.1px 0;
        transition: .3s;
        z-index: 10;
    }

    .btn-submit {
        width: 290px;
        padding: 12px 15px;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 8px;
        background: var(--color-white);
    }

    .contact-form-block {
        padding: 60px 15px;
        background: url(/images/contact-mobile.png);
    }

    .form-input-block {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .form-contact {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .button-block {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 40px
    }

    .input-block {
        display: flex;
        flex-direction: column;
        width: 290px;
    }

    .input {
        box-sizing: border-box;
        background: none;
        border: none;
        border-bottom: 1px solid var(--color-white);
        padding: 12px 10px 10px 0;
        color: #fff;
    }

    input::placeholder {
        color: var(--color-white);
    }

    .label-input {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
        margin-top: 30px;
    }

    .contact-form-blocks .container {
        padding-left: 0;
        padding-right: 0;
    }

    .message {
        margin-top: 10px;
        display: none;
    }

    .message.success {
        color: var(--color-green2);
    }

    textarea {
        resize: none;
    }

    input::placeholder,textarea::placeholder {
        color: #fff !important;
    }

    /* Стили для автозаполнения в Chrome */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
        box-shadow: 0 0 0 1000px transparent inset !important;
        -webkit-text-fill-color: #ffff !important;
        color: #fff !important;
        transition: background-color 5000s ease-in-out 0s !important; /* Избежание смены цвета фона */
        caret-color: #fff  !important; /* Цвет каретки */
    }
</style>

@endcss

@startjs
<script>
    async function send_contact(form) {

        event.preventDefault()

        const route = form.getAttribute('action')

        let formdata = new FormData();

        formdata.append("name", form.elements['name'].value);
        formdata.append("email", form.elements['email'].value);
        if (form.elements['type']) {
            formdata.append("type", form.elements['type'].value);
        }
        if (form.elements['department']) {
            formdata.append("department", form.elements['department'].value ?? '');
        }
        formdata.append("message", form.elements['message'].value);

        if (form.elements['file']) {
            formdata.append("file", form.elements['file'].files[0] ?? '');
        }

        const response = await post(route, formdata, false, true)

        if (response.success) {

            form.querySelector('.message.error').style.display = 'none';
            form.querySelector('.message.success').style.display = 'block';

            form.reset();

        } else {
            form.querySelector('.message.error').style.display = 'block';
            form.querySelector('.message.success').style.display = 'none';
        }

    }
</script>
@endjs
