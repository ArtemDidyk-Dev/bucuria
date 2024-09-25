@php $s = new Single('Модальные окна', 0, 2); @endphp
<div class="access">
    <form action="{{route('access.page', $page)}}" method="POST">
        @method('POST')
        @csrf
        <div class="form-input">
            <x-inputs.input :label="$s->field('Вход', 'Пароль', 'text', true, 'Password')" :placeholder="$s->field('Вход', 'Пароль', 'text', true, 'Password')" type='password' name='password' />
        </div>
        <x-inputs.button type="submit">
            {{ $s->field('Вход', 'Текст кнопки', 'text', true, 'sing in') }}
        </x-inputs.button>
    </form>
</div>
