<div class="filter" data-href="{{ $clearRoute }}">
    <div class="filter-title">
        <div class="h5 title-block">
            Filter

        </div>
        @if (count($activeTastes) > 0 || count($activeWeights) > 0 || $activeCategory)
            <div class="filter-tag">
                @foreach ($activeTastes as $activeTaste)
                    <label for="taste-{{ $activeTaste->slug }}" class="tag-item cookie color-red">
                        {{ $activeTaste->title }}
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.55245 8.00002L12.8856 3.66686C13.0381 3.5143 13.0381 3.26696 12.8856 3.11442C12.733 2.96188 12.4857 2.96186 12.3331 3.11442L7.99999 7.44758L3.66686 3.11442C3.5143 2.96186 3.26696 2.96186 3.11442 3.11442C2.96188 3.26698 2.96186 3.51432 3.11442 3.66686L7.44755 8L3.11442 12.3332C2.96186 12.4857 2.96186 12.7331 3.11442 12.8856C3.19069 12.9619 3.29067 13 3.39065 13C3.49063 13 3.59059 12.9619 3.66688 12.8856L7.99999 8.55246L12.3331 12.8856C12.4094 12.9619 12.5094 13 12.6094 13C12.7093 13 12.8093 12.9619 12.8856 12.8856C13.0381 12.733 13.0381 12.4857 12.8856 12.3332L8.55245 8.00002Z" fill="#C81317"/>
                        </svg>
                    </label>
                @endforeach
                @foreach ($activeWeights as $activeWeight)
                    <label for="weight-{{ $activeWeight->slug }}" class="tag-item cookie color-red">
                        {{ $activeWeight->title }}
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.55245 8.00002L12.8856 3.66686C13.0381 3.5143 13.0381 3.26696 12.8856 3.11442C12.733 2.96188 12.4857 2.96186 12.3331 3.11442L7.99999 7.44758L3.66686 3.11442C3.5143 2.96186 3.26696 2.96186 3.11442 3.11442C2.96188 3.26698 2.96186 3.51432 3.11442 3.66686L7.44755 8L3.11442 12.3332C2.96186 12.4857 2.96186 12.7331 3.11442 12.8856C3.19069 12.9619 3.29067 13 3.39065 13C3.49063 13 3.59059 12.9619 3.66688 12.8856L7.99999 8.55246L12.3331 12.8856C12.4094 12.9619 12.5094 13 12.6094 13C12.7093 13 12.8093 12.9619 12.8856 12.8856C13.0381 12.733 13.0381 12.4857 12.8856 12.3332L8.55245 8.00002Z" fill="#C81317"/>
                        </svg>
                    </label>
                @endforeach
            </div>
            <a href="{{ route('catalog', false) }}" class="button-small color-red clear-filter">CLEAR ALL FILTERS</a>
        @endif

    </div>

    <div style="display: none"><x-inputs.checkbox /></div>

    <div class="filter-item filter-item-checkbox active" onclick="toggleFilter(this)" data-id="taste">
        <div class="accordion-btn">
            <div class="accordion filter">Tastes</div>
            <img src="/images/icons/arrow-filter.svg" class="arrow-filter">
        </div>
        <div class="panel">
            @foreach ($tastes as $taste)
                <div class="checkbox {{ $taste->active ? 'active' : '' }}">
                    <label class="containercheckbox body-2 color-white">
                        <input
                            type="checkbox"
                            name="filter-field"
                            @if($taste->active)
                                checked
                            @endif
                            value="{{ $taste->slug }}"
                            onchange="makeFilters()"
                            id="taste-{{ $taste->slug }}"
                        >
                        <img src="{{ $taste->image }}" alt="{{ $taste->title }}" class="checkbox-image hover-active">
                        <span class="checkmark"></span>
                        <span class="checkbox-description extra-text color-black">{{ $taste->title }} <span class="checkbox-count color-grey">{{ $taste->products_count }}</span></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="filter-item filter-item-checkbox active" onclick="toggleFilter(this)" data-id="weight">
        <div class="accordion-btn">
            <div class="accordion filter">The weight</div>
            <img src="/images/icons/arrow-filter.svg" class="arrow-filter">
        </div>
        <div class="panel">
            @foreach ($weights as $weight)
                <div class="checkbox">
                    <label class="containercheckbox body-2 color-white">
                        <input
                            type="checkbox"
                            name="filter-field"
                            @if($weight->active)
                                checked
                            @endif
                            value="{{ $weight->slug }}"
                            onchange="makeFilters()"
                            id="weight-{{ $weight->slug }}"
                        >
                        <span class="checkmark"></span>
                        <span class="checkbox-description extra-text color-black">{{ $weight->title }} <span class="checkbox-count color-grey">{{ $weight->products_count }}</span></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="filter-item filter-item-checkbox" data-id="weight">
        <div class="accordion-btn accordion-filters-box active">
            <div class="accordion filter">The weight</div>
            <img src="/images/icons/arrow-filter.svg" class="arrow-filter">
        </div>
        <div class="filters-box active">
            <div class="filters-input-prices">
                <div class="filters-input-price">
                    <div class="input-wrapper-label">
                        Min weight, kg
                    </div>
                    <label class="input-wrapper">
                        <input data-minprice="22" name="minPrice" type="text" class="input-text " placeholder="" value="8">
                    </label>
                </div>
                <div class="filters-input-price">
                    <div class="input-wrapper-label">
                        Max weight, kg
                    </div>
                    <label class="input-wrapper">
                        <input data-maxprice="81" name="maxPrice" type="text" class="input-text " placeholder="" value="81">
                    </label>
                </div>
            </div>
            <div id="price-slider" class="price-slider"></div>
        </div>
    </div>


</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('price-slider');
        const accordionBtn = document.querySelector(".accordion-filters-box");
        const filtersBox = document.querySelector('.filters-box');
        accordionBtn.addEventListener('click', (e)=> {
            filtersBox.classList.toggle('active');
            accordionBtn.classList.toggle('active');
        })
        if (slider) {
            let form = document.querySelector('.filters')
            let min = 0
            let max = 90
            let inputMin = document.querySelector('[data-minPrice]');
            let inputMax = document.querySelector('[data-maxPrice]');
            let tooltips = [document.createElement('span'), document.createElement('span')];

            noUiSlider.create(slider, {
                start: [min, max],
                connect: true,
                range: {
                    'min': min,
                    'max': max
                }

            });

            slider.noUiSlider.on('update', function(values, handle) {
                let minValue = parseInt(values[0]);
                let maxValue = parseInt(values[1]);
                let circles = document.querySelectorAll(".noUi-touch-area");
                let minCircle = circles[0];
                let maxCircle = circles[1];
                inputMin.value = minValue;
                inputMax.value = maxValue;
                tooltips[handle].innerHTML = values[handle];
                tooltips[handle].classList.add('nouislider-tooltip');
                minCircle.innerHTML = `<span class="min-circle">${minValue}</span>`
                maxCircle.innerHTML = `<span class="max-circle">${maxValue}</span>`
            });

            let minCountInput = min;
            let maxCountInput = max;

            inputMin.addEventListener("input", (e) => {
                inputMin.setAttribute('value', e.target.value);
                minCountInput = e.target.value;
                slider.noUiSlider.set([minCountInput, maxCountInput]);
            });

            inputMax.addEventListener("input", (e) => {
                inputMax.setAttribute('value', e.target.value);
                maxCountInput = e.target.value;
                setTimeout(() => {
                    slider.noUiSlider.set([minCountInput, maxCountInput]);
                }, 1500);
            });
        }

    });
</script>
