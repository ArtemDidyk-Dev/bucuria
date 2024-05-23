<?php $s = new Single('Поиск', 0, 1); ?>

<div class="search-items-inner">
    @if (count($items) > 0)
        @foreach ($items as $item)
            <a href="{{ route('product', $item->slug, false) }}" class="search-item">
                <img src="{{ $item->image }}" alt="" class="search-item-image">
                <div class="search-item-text">
                    <div class="body-2 color-black search-item-title">{{ $item->title }}</div>
                </div>
            </a>
        @endforeach
        <a href="{{ route('search', ['s' => $value], false) }}" class="color-red button-small-2 search-btn">
            {{ $s->field('Поиск', 'Все результаты', 'text', true, 'All search results') }}
        </a>
        
    @else
        <div class="product-title color-black">{{ $s->field('Поиск', 'Ничего не найдено', 'text', true, 'Nothing found') }}</div>
    @endif
</div>