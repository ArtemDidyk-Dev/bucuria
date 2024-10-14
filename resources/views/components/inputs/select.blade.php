<div class="select-wrapper">

    @if (!empty($label))
        <span class="menu color-text-blue select-label">{{ $label }}</span>
    @endif

    <div class="select">
        <div class="select-title extra-text @if($isChecked) color-text active @else color-grey @endif" onclick="selectClick(this)">
            @if (!empty($icon))
                <img src="{{ $icon }}" alt="" class="select-title-icon">
            @endif
            <span>{{ $current }}</span>
        </div>
        <input
            type="text"
            class="input-select"
            name="{{ $name }}"
            value="{{ $value }}"
            @if($required)
                required
            @endif
        >
        <div class="select-items">
            <div class="select-items-inner">
                @foreach ($items as $item)
                    <div class="extra-text select-item color-text"
                        data-value="{{ $item['value'] }}"
                        {{ $attributes->merge([ 'onclick' => "changeSelect(this); ".$action ]) }}
                    >{{ $item['title'] }}</div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="input-error  color-red"></div>
</div>


@desktopcss
<style>

    .input-select {
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .select-label {
        margin-bottom: 10px;
        display: block;
    }

    .select {
        position: relative;
        min-width: 252px;
        width: 100%;
        height: 38px;
        cursor: pointer;
    }

    .select-title {
        display: flex;
        align-items: center;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--color-black);
        height: 100%;
        position: relative;
        user-select: none;
    }

    .select-title-icon {
        width: 24px;
        height: 24px;
        margin-right: 5px;
    }

    .select-title::after {
        position: absolute;
        right: 0;
        top: cacl(50% - 12px);
        display: block;
        content: "";
        width: 7px;
        height: 7px;
        border: 1px solid var(--color-grey);
        transform: translateY(-50%) rotate(45deg);
        transition: .3s;
        border-left: none;
        border-top: none;
        margin-top: -2px;
    }

    .select.active .select-title::after {
        margin-top: 1px;
        transform: translateY(-50%) rotate(225deg);
    }

    .select-title.active {
        color: var(--color-text);
    }

    .select-items{
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        width: 100%;
        z-index: 100;
        background: #FFFFFF;
        box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.07);
        padding: 15px;
        padding-right: 10px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: .3s;
        border-radius: 10px;
    }

    .select.active .select-items {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
    }

    .select-item {
        margin-bottom: 10px;
        transition: .3s;
    }

    .select-item:last-child{
        margin-bottom: 0;
    }

    .select-item:hover {
        color: var(--color-violet);
    }

    .select-items-inner {
        max-height: 244px;
        overflow: auto;
    }

    .select-items-inner::-webkit-scrollbar {
		width: 2px;
	}

	.select-items-inner::-webkit-scrollbar-track {
		background-color: var(--color-back);
	}

	.select-items-inner::-webkit-scrollbar-thumb {
		background-color: var(--color-violet);
	}


</style>
@mobilecss
<style>

    .input-select {
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .select-label {
        margin-bottom: 5px;
        display: block;
    }

    .select-wrapper {
        width: 100%;
    }

    .select {
        position: relative;
        /* min-width: 133px; */
        width: 100%;
        height: 36px;
        cursor: pointer;
    }

    .select-title,
    .select-item {
        font-size: 11px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
    }

    .select-title {
        display: flex;
        align-items: center;
        border: 1px solid var(--color-stroke);
        background: var(--color-white);
        border-radius: 8px;
        padding-left: 11px;
        padding-right: 11px;
        height: 100%;
        position: relative;
        user-select: none;
    }

    .select-title-icon {
        width: 20px;
        height: 20px;
        margin-right: 2px;
    }

    .select-title::after {
        position: absolute;
        right: 11px;
        top: 50%;
        display: block;
        content: "";
        width: 6px;
        height: 6px;
        border: 1px solid var(--color-grey);
        transform: translateY(-50%) rotate(45deg);
        transition: .3s;
        border-left: none;
        border-top: none;
        margin-top: -2px;
    }

    .select.active .select-title::after {
        margin-top: 1px;
        transform: translateY(-50%) rotate(225deg);
    }

    .select-title.active {
        color: var(--color-text);
    }

    .select-items{
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        width: 100%;
        z-index: 100;
        background: #FFFFFF;
        box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.07);
        padding: 15px;
        padding-right: 22px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: .3s;
        border-radius: 8px;
    }

    .select.active .select-items {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
    }

    .select-item {
        margin-bottom: 5px;
        transition: .3s;
    }

    .select-item:last-child{
        margin-bottom: 0;
    }

    .select-items-inner {
        max-height: 170px;
        overflow: auto;
    }

    .select-items-inner::-webkit-scrollbar {
		width: 2px;
	}

	.select-items-inner::-webkit-scrollbar-track {
		background-color: var(--color-light);
	}

	.select-items-inner::-webkit-scrollbar-thumb {
		background-color: var(--color-blue);
	}


</style>
@endcss


@startjs
<script>

    function selectClick(elm){
        elm.parentElement.classList.toggle('active');
    }

    document.addEventListener('click', function(e) {
        document.querySelectorAll('.select').forEach(select => {
            if ((!select.contains(e.target) && select.classList.contains('active'))){
                select.classList.remove('active');
            }
        });
    });

    function changeSelect(elm) {

        const id_input = elm.closest('.select-wrapper').querySelector('input').getAttribute('name')

        elm.closest('.select-wrapper').querySelector('.input-error').style.display = 'none'

        const value = elm.dataset.value
        const text = elm.innerText

        const event = new CustomEvent('change_select_'+id_input, {
            detail: {
                select_value: value,
                select_title: text,
            },
        });

        document.dispatchEvent(event)

        if (screen.width <= 1000 && elm.closest('#modal-filters')) {

            elm.closest('.select').querySelector('.input-select').value = value

            span = elm.closest('.select').querySelector('span')
            if (span) {
                span.parentNode.removeChild(span)
            }

            let checkedElem = document.createElement('span');
            checkedElem.innerText = text
            elm.closest('.select').appendChild(checkedElem)

        } else {

            elm.closest('.select').querySelector('.input-select').value = value
            elm.closest('.select').querySelector('.select-title span').innerText = text
        }

        if (value != '') {

            elm.closest('.select').querySelector('.select-title').classList.add('active')
        } else {

            elm.closest('.select').querySelector('.select-title').classList.remove('active')
        }

        document.querySelectorAll('.select').forEach(select => {
            select.classList.remove('active');
        });
    }


</script>
@endjs
