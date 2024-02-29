@props(['checked' => false])

<div class="checkbox {{ $class }}">
    <label class="containercheckbox body-2 color-white">
        <input type="checkbox" name="{{ $name }}" @if ($checked) checked @endif
            value="{{ $value }}" onchange="{{ $onchange }}" @if ($required) required @endif
            @if (!empty($vmodel)) v-model="{{ $vmodel }}" @endif>
        <span class="checkmark"></span>
        <span class="checkbox-description color-black">{{ $slot }}</span>
    </label>
</div>



@desktopcss

<style>
    .checkbox {
        margin-bottom: 5px;
    }

    .containercheckbox {
        display: flex;
        align-items: center;
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
        color: #D2D2D2;
    }

    .containercheckbox input {
        opacity: 0;
        cursor: pointer;
        height: 1px;
        width: 1px;
    }

    .checkmark {
        position: absolute;
        transform: translateY(-50%);
        left: 0;
        top: 12px;
        height: 20px;
        width: 20px;
        background-color: var(--color-white);
        border: 1px solid #D2D2D2;
        transition: .3s;
        border-radius: 4px;
    }

    .checkbox.white .checkmark {
        background-color: var(--color-red);
        border: 1px solid var(--color-red);
        border-radius: 4px;
    }

    .checkbox.white .containercheckbox {
        color: var(--color-red);
    }

    .checkmark:after {
        content: "";
        position: absolute;
    }

    .containercheckbox input:checked~.checkmark:after {
        display: block;
        opacity: 1;
    }

    .containercheckbox input:checked~.checkmark {
        background: var(--color-red);
        border: 1px solid var(--color-red);
    }

    .containercheckbox .checkmark:after {
        left: 50%;
        top: calc(50% - 2px);
        transform: translate(-50%, -50%) rotate(45deg);
        width: 4px;
        height: 8px;
        border: solid var(--color-white);
        border-width: 0 2.1px 2.1px 0;
        transition: .2s;
        z-index: 10;
        opacity: 0;
    }
</style>

@mobilecss
<style>
    .checkbox {
        margin-bottom: 5px;
    }

    .containercheckbox {
        display: flex;
        align-items: center;
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
        color: #D2D2D2;
    }

    .containercheckbox input {
        opacity: 0;
        cursor: pointer;
        height: 1px;
        width: 1px;
    }

    .checkmark {
        position: absolute;
        transform: translateY(-50%);
        left: 0;
        top: 12px;
        width: 18px;
        height: 18px;
        background-color: var(--color-white);
        border: 1px solid #D2D2D2;
        transition: .3s;
        border-radius: 4px;
    }

    .checkbox.white .checkmark {
        background-color: var(--color-red);
        border: 1px solid var(--color-red);
        border-radius: 4px;
    }

    .checkbox.white .containercheckbox {
        color: var(--color-red);
    }

    .checkmark:after {
        content: "";
        position: absolute;
    }

    .containercheckbox input:checked~.checkmark:after {
        display: block;
        opacity: 1;
    }

    .containercheckbox input:checked~.checkmark {
        background: var(--color-red);
        border: 1px solid var(--color-red);
    }

    .containercheckbox .checkmark:after {
        left: 50%;
        top: calc(50% - 2px);
        transform: translate(-50%, -50%) rotate(45deg);
        width: 4px;
        height: 8px;
        border: solid var(--color-white);
        border-width: 0 2.1px 2.1px 0;
        transition: .2s;
        z-index: 10;
        opacity: 0;
    }
</style>
@endcss
