@php $s = new Single('Модальные окна', 0, 2); @endphp

<div class="modal fade-in" id="modal-loyalty-error">
    <div class="container-modal container-modal-account">
        <div class="closemodal closemodal-account" onclick="close_modal2()">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect y="0.723145" width="1.02265" height="17.385" transform="rotate(-45 0 0.723145)"
                    fill="#333333" />
                <rect x="12.293" width="1.02265" height="17.385" transform="rotate(45 12.293 0)"
                    fill="#333333" />
            </svg>
        </div>
        <div class="main-text color-black membership-modal-text">
            {!! Field::enter_to_br($s->field('Программа лояльности', 'Ошибка', 'textarea', true, 'Your membership code has already been registered by another user. Contact us to solve the problem')) !!}
        </div>

        <x-inputs.button href="{{ route('contact', [], false) }}">{{ $s->field('Программа лояльности', 'Текст кнопки (ошибка)', 'text', true, 'Submit your application') }}</x-inputs.button>
    </div>
</div>