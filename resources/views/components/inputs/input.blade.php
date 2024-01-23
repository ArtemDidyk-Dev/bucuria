<label for="" class="label-input color-black">{{ $label }}
    <input class='input extra-text' placeholder="{!! $placeholder !!}"
        @if ($type != 'phone') type="{{ $type }}"
        @else
            type="tel" @endif
        @if ($required) required @endif name="{{ $name }}"
        @if ($type == 'phone') pattern="^[+()\- 0-9]+$" title="phone" @endif
        value="{{ $value }}"
    >
    @if ($type == 'password')
        <div class="pass-status" onclick="viewPassword(this)">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.5452 10.7127C18.4858 6.90545 14.8741 4.60156 10.8774 4.60156C6.88078 4.60156 3.263 6.90545 1.22189 10.7127L1.05078 10.9999L1.20967 11.2932C3.26911 15.1005 6.88078 17.4043 10.8774 17.4043C14.8741 17.4043 18.4919 15.131 20.5452 11.2932L20.7041 10.9999L20.5452 10.7127ZM10.8774 16.1516C7.43689 16.1516 4.27745 14.2327 2.44411 10.9999C4.27745 7.76712 7.43689 5.84823 10.8774 5.84823C14.318 5.84823 17.4408 7.77323 19.3047 10.9999C17.4408 14.2327 14.3119 16.1516 10.8774 16.1516Z" fill="#242222"/>
                <path d="M11.0562 6.82604C10.2276 6.83209 9.41935 7.08355 8.73358 7.54867C8.04782 8.01378 7.51527 8.67169 7.20321 9.4393C6.89114 10.2069 6.81354 11.0498 6.98023 11.8615C7.14691 12.6731 7.55039 13.4172 8.13972 13.9997C8.72904 14.5822 9.47776 14.977 10.2913 15.1342C11.1049 15.2914 11.9468 15.204 12.7107 14.8831C13.4746 14.5621 14.1263 14.0219 14.5834 13.3308C15.0405 12.6396 15.2825 11.8285 15.2789 10.9999C15.2765 10.4484 15.1653 9.90269 14.9517 9.39418C14.738 8.88568 14.4261 8.42433 14.0338 8.03659C13.6415 7.64885 13.1766 7.34233 12.6656 7.1346C12.1546 6.92687 11.6077 6.82201 11.0562 6.82604ZM11.0562 13.9883C10.4709 13.9822 9.90041 13.8034 9.41644 13.4742C8.93246 13.145 8.55654 12.6802 8.33589 12.138C8.11524 11.5959 8.0597 11.0006 8.17625 10.427C8.29279 9.85344 8.57623 9.32707 8.99096 8.91403C9.40568 8.50099 9.93321 8.21971 10.5073 8.1055C11.0813 7.9913 11.6764 8.04926 12.2176 8.27212C12.7588 8.49498 13.2221 8.8728 13.5494 9.35812C13.8766 9.84344 14.0531 10.4146 14.0567 10.9999C14.0583 11.3938 13.9818 11.7842 13.8314 12.1483C13.681 12.5124 13.4599 12.843 13.1808 13.121C12.9016 13.3989 12.5701 13.6187 12.2054 13.7676C11.8407 13.9165 11.4501 13.9915 11.0562 13.9883Z" fill="#242222"/>
                <path class="hide" d="M2.97479 3.53214L5.70035 6.25769C3.97758 7.36693 2.56956 8.90122 1.61201 10.7127L1.45312 10.9999L1.61201 11.2932C3.67146 15.1005 7.28312 17.4044 11.2798 17.4044C12.8397 17.404 14.3794 17.051 15.7837 16.3716L18.8392 19.4271L19.9087 18.5105L4.01979 2.62158L2.97479 3.53214ZM8.93313 9.49047L12.997 13.5544C12.5378 13.8386 12.0092 13.9908 11.4692 13.9944C11.0769 13.9944 10.6884 13.9168 10.3261 13.7661C9.9638 13.6154 9.6349 13.3945 9.3583 13.1162C9.0817 12.8379 8.86287 12.5077 8.71438 12.1445C8.5659 11.7813 8.49071 11.3923 8.49313 10.9999C8.50001 10.4661 8.65212 9.94433 8.93313 9.49047ZM8.04701 8.60436C7.47528 9.41066 7.2073 10.3933 7.29053 11.3782C7.37376 12.3631 7.80282 13.2868 8.50175 13.9857C9.20067 14.6847 10.1244 15.1137 11.1093 15.197C12.0942 15.2802 13.0768 15.0122 13.8831 14.4405L14.8609 15.4182C13.729 15.9021 12.5108 16.1516 11.2798 16.1516C7.83924 16.1516 4.71035 14.2327 2.84646 10.9999C3.74095 9.41605 5.02918 8.08993 6.58646 7.14992L8.04701 8.60436Z" fill="#242222"/>
                <clipPath>
                    <rect width="22" height="22" fill="white"/>
                </clipPath>
            </svg>
        </div>
    @endif
</label>

@desktopcss
<style>

    .pass-status {
        position: absolute;
        width: 22px;
        height: 22px;
        bottom: -5px;
        right: 26px;
        cursor: pointer;
        user-select: none;
    }

    .pass-status svg {
        width: 22px;
        height: 22px;
    }

    .pass-status .hide {
        display: none;
    }

    .pass-status.active .hide {
        display: block;
    }

    .input-block {
        display: flex;
        flex-direction: column;
    }

    .input {
        width: 100%;
        box-sizing: border-box;
        background: none;
        border: none;
        border-bottom: 1px solid var(--color-white);
        margin-right: 27px;
        padding: 8px 10px 10px 0;
    }

    input::placeholder {
        color: var(--color-grey);
    }

    .label-input {
        font-family: Urbanist;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
        position: relative;

    }
</style>
@mobilecss
<style>

    .pass-status {
        position: absolute;
        width: 18px;
        height: 18px;
        bottom: -5px;
        right: 25px;
        cursor: pointer;
        user-select: none;
    }

    .pass-status svg {
        width: 18px;
        height: 18px;
    }

    .pass-status .hide {
        display: none;
    }

    .pass-status.active .hide {
        display: block;
    }

    .input-block {
        display: flex;
        flex-direction: column;
    }

    .input {
        width: 100%;
        box-sizing: border-box;
        background: none;
        border: none;
        border-bottom: 1px solid var(--color-white);
        margin-right: 27px;
        padding: 8px 10px 10px 0;
    }

    input::placeholder {
        color: var(--color-grey);
    }

    .label-input {
        font-family: Urbanist;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
        position: relative;

    }
</style>
@endcss

@startjs
<script>

    function viewPassword(element){

        const passStatus = element;
        const passwordInput = element.parentElement.querySelector('input');

        if (passwordInput.type == 'password') {
            passwordInput.type='text';
            passStatus.classList.add('active');
        } else {
            passwordInput.type='password';
            passStatus.classList.remove('active');
        }
    }

</script>
@endjs
