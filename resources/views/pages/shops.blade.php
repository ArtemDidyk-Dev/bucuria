<x-layout>

    <?php $s = new Single('Магазины', 10, 1); ?>

    <div class="main">

        <div class="container">
            <div class="breadcrumbs-block">
                <x-inc.breadcrumbs :breadcrumbs="$breadcrumbs = [
                    [
                        'title' => $s->field('Хлебные крошки', 'Текст', 'text', true, 'Store addresses'),
                        'link' => '',
                    ],
                ]" />
            </div>
            <div class="banner">
                <div class="baner-image">
                    <img src="{{ $s->field('Баннер', 'Картинка', 'photo', false, '/images/search-baner.png') }}"
                        alt="" class="banner-img">
                    <div class="gradient-banner"></div>
                </div>
                <div class="banner-content">
                    <div class="banner-title h2 color-white">
                        {{ $s->field('Баннер', 'Заголовок', 'textarea', true, 'Store addresses') }}
                    </div>
                    <div class="banner-desc subtitle color-white">
                        {{ $s->field('Баннер', 'Описание', 'textarea', true, 'Give joy to yourself and your loved ones with our sweets. We have over 300 products to choose from.') }}
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="shops-block">
                    <div class="shops-left">

                        @php
                            $shops = $s->field('Магазины', 'Магазины', 'repeat', true);
                            $shopsItems = [];
                            foreach ($shops as $elm) {
                                $shopsItems[] = [$elm->field('Название', 'text', ''), $elm->field('Страна', 'text', ''), $elm->field('Адрес', 'text', ''), $elm->field('Время работы будни', 'text', ''), $elm->field('Время работы выходные', 'text', ''), $elm->field('Номер телефона', 'text', ''), $elm->field('E-mail', 'text', ''), $elm->field('Latitude', 'text', ''), $elm->field('Longitude', 'text', '')];
                            }
                            $countries = [
                                [
                                    'title' => $s->field('Поиск', 'Выберите страну', 'text', true, 'Select country'),
                                    'value' => '',
                                ],
                            ];
                            foreach ($shopsItems as $key => $value) {
                                if (!in_array($value[1], array_column($countries, 'title'))) {
                                    $countries[] = [
                                        'title' => $value[1],
                                        'value' => $value[1],
                                    ];
                                }
                            }
                        @endphp

                        <x-inputs.select :label="$s->field('Поиск', 'Заголовок', 'text', true, 'SEARCH BY COUNTRY')" :placeholder="$s->field('Поиск', 'Выберите страну', 'text', true, 'Select country')" name='location' :items="$countries"
                            action="changeCountry(this)" />
                        <div class="location-shops">

                            @foreach ($shopsItems as $item)
                                <div class="location-shop" data-country="{{ $item[1] }}"
                                    data-lat="{{ $item[7] }}" data-lon="{{ $item[8] }}">
                                    <div class="location-shop-title footer-title color-black">{{ $item[0] }}</div>
                                    <div class="location-shop-desc color-black">{{ $item[2] }}</div>
                                    <div class="location-shop-contact-block">
                                        <div class="location-shop-contact">
                                            <div class="location-shop-contact-title color-black">
                                                {{ $s->field('Магазины', 'Время работы', 'text', true, 'Schedule') }}:
                                            </div>
                                            @if ($item[3])
                                                <div class="location-shop-contact-item color-black">{{ $item[3] }}
                                                </div>
                                            @endif
                                            @if ($item[4])
                                                <div class="location-shop-contact-item color-black">{{ $item[4] }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="location-shop-contact">
                                            <div class="location-shop-contact-title color-black">
                                                {{ $s->field('Магазины', 'Контакты', 'text', true, 'Contacts') }}:
                                            </div>
                                            <a href="tel:{{ Field::phone($item[5]) }}"
                                                class="location-shop-contact-item color-black">{{ $item[5] }}</a>
                                            <a ref="mailto:{{ $item[6] }}"
                                                class="location-shop-contact-item color-black">{{ $item[6] }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="map"></div>

                    <script>
                        function initGmaps() {

                            if (document.querySelector('#map')) {

                                const items = document.querySelectorAll('.location-shop')

                                const map = new google.maps.Map(document.getElementById("map"), {
                                    zoom: 7,
                                    center: {
                                        lat: 47.237713,
                                        lng: 28.436018,
                                    },
                                    draggable: true,
                                    scrollwheel: true,
                                    disableDefaultUI: false,
                                    styles: [{
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#f5f5f5"
                                            }]
                                        },
                                        {
                                            "elementType": "labels.icon",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        },
                                        {
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#616161"
                                            }]
                                        },
                                        {
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "color": "#f5f5f5"
                                            }]
                                        },
                                        {
                                            "featureType": "administrative.country",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                            }]
                                        },
                                        {
                                            "featureType": "administrative.land_parcel",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                            }]
                                        },
                                        {
                                            "featureType": "administrative.land_parcel",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#bdbdbd"
                                            }]
                                        },
                                        {
                                            "featureType": "administrative.locality",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                            }]
                                        },
                                        {
                                            "featureType": "administrative.neighborhood",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                            }]
                                        },
                                        {
                                            "featureType": "administrative.province",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                            }]
                                        },
                                        {
                                            "featureType": "poi",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#eeeeee"
                                            }]
                                        },
                                        {
                                            "featureType": "poi",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#757575"
                                            }]
                                        },
                                        {
                                            "featureType": "poi.park",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#e5e5e5"
                                            }]
                                        },
                                        {
                                            "featureType": "poi.park",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#9e9e9e"
                                            }]
                                        },
                                        {
                                            "featureType": "road",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#ffffff"
                                            }]
                                        },
                                        {
                                            "featureType": "road.arterial",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#ff3d3d"
                                            }]
                                        },
                                        {
                                            "featureType": "road.arterial",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#757575"
                                            }]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#dadada"
                                            }]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#ff3d3d"
                                            }]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#616161"
                                            }]
                                        },
                                        {
                                            "featureType": "road.highway.controlled_access",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#ff3d3d"
                                            }]
                                        },
                                        {
                                            "featureType": "road.local",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#ff3d3d"
                                            }]
                                        },
                                        {
                                            "featureType": "road.local",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#9e9e9e"
                                            }]
                                        },
                                        {
                                            "featureType": "transit.line",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#e5e5e5"
                                            }]
                                        },
                                        {
                                            "featureType": "transit.station",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#eeeeee"
                                            }]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#c9c9c9"
                                            }]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#9e9e9e"
                                            }]
                                        }
                                    ]
                                });

                                var infoWindow = new google.maps.InfoWindow({
                                    disableAutoPan: false,
                                    maxWidth: 450,
                                    zIndex: 1
                                });

                                items.forEach(item => {

                                    const title = item.querySelector('.location-shop-title').innerText
                                    const address = item.querySelector('.location-shop-desc').innerText

                                    let coordinate = {
                                        lat: item.getAttribute('data-lat'),
                                        lng: item.getAttribute('data-lon'),
                                        title: title,
                                        address: address,
                                    }

                                    let {
                                        marker,
                                        content
                                    } = createMarker(map, infoWindow, coordinate.lat, coordinate.lng, coordinate.title, coordinate
                                        .address)

                                    content = '<div class="cookie-headline color-white">' + title + '</div>' +
                                        '<div class="title-litle-card color-white" style="text-transform: initial;">' + address +
                                        '</div>'

                                    item.addEventListener('click', function() {
                                        showMarker(map, marker, content)
                                    })
                                });
                            }

                            function createMarker(map, infoWindow, lat, lng, title, address) {

                                const iconMarker = {
                                    url: '/images/marker.svg',
                                    scaledSize: new google.maps.Size(40, 40),
                                };

                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(lat, lng),
                                    map: map,
                                    animation: google.maps.Animation.DROP,
                                    clickable: true,
                                    title: title,
                                    zIndex: 1,
                                    icon: iconMarker,
                                    title: title,
                                });

                                let content = '<div class="cookie-headline color-white">' + title + '</div>' +
                                    '<div class="marker-desc color-white" style="text-transform: initial;">' + address + '</div>'

                                google.maps.event.addListener(marker, 'click', function() {
                                    showMarker(map, marker, content)
                                });

                                return {
                                    marker,
                                    content
                                }
                            }

                            function showMarker(map, marker, content) {
                                infoWindow.close()
                                infoWindow.setContent(content)
                                infoWindow.open(map, marker)
                            }
                        }

                        function changeCountry(elm) {
                            const country = elm.getAttribute('data-value');

                            if (country !== '') {
                                document.querySelectorAll('.location-shop').forEach(element => {
                                    element.style.display = 'none'
                                });

                                document.querySelectorAll('.location-shop[data-country="' + country + '"]').forEach(element => {
                                    element.style.display = 'block'
                                });
                            } else {
                                document.querySelectorAll('.location-shop').forEach(element => {
                                    element.style.display = 'block'
                                });
                            }
                        }
                    </script>

                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-DhtHnlgozks-DacEIxTKYSPwmlK9ifY&amp;callback=initGmaps"
                        defer=""></script>

                </div>
            </div>

        </div>

        <x-cards.small-social-card />
    </div>


    <x-slot name="meta_title">
        {{ $s->field('Meta', 'Meta Title', 'textarea', true, 'Bucuria | Store addresses') }}
    </x-slot>

    <x-slot name="meta_description">
        {{ $s->field('Meta', 'Meta Description', 'textarea', true, 'Bucuria | Store addresses') }}
    </x-slot>

    <x-slot name="meta_keywords">
        {{ $s->field('Meta', 'Meta Keywords', 'textarea', true, 'Bucuria | Store addresses') }}
    </x-slot>

</x-layout>

@desktopcss
<style>
    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .location-shops {
        display: flex;
        flex-direction: column;
        width: 408px;
        height: 447px;
        border-radius: 8px;
        background: #F4F4F4;
        margin-top: 20px;
        overflow-x: hidden;
        overflow-y: scroll;
        padding: 30px;
    }

    .marker-desc {
        font-family: "Istok Web", sans-serif ;
        font-size: 13px;
        font-style: normal;
        font-weight: 500;
        line-height: 18px;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }


    ::-webkit-scrollbar-track {
        background-color: var(--color-light-grey);
    }


    ::-webkit-scrollbar-thumb {
        background-color: var(--color-red);
        border-radius: 5px;
    }

    .location-shop {
        margin-bottom: 15px;
        cursor: pointer;
    }

    .gm-style .gm-style-iw-c {
        background: var(--color-red);
    }

    .gm-style .gm-style-iw-d {
        overflow: initial !important;
        padding-bottom: 12px;
        padding-right: 15px;
    }

    .location-shop-desc {
        font-family: "Istok Web", sans-serif ;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
    }

    .location-shop-contact-block {
        display: flex;
        justify-content: flex-start;
        border: none;
        padding-bottom: 15px;
        padding-top: 15px;
        border-bottom: 1px solid var(--color-grey);
    }

    .location-shop-contact {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        margin-right: 50px;
    }

    .location-shop-contact:last-child {
        margin-right: 0;
    }

    .location-shop-contact-title {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
    }

    .location-shop-contact-item {
        font-family: "Istok Web", sans-serif ;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
    }

    .shops-block {
        display: flex;
        justify-content: space-between;
        padding: 0 80px;
        margin-bottom: 80px;
    }

    .map-image {
        width: 824px;
        height: 611px;
        border-radius: 8px;
    }

    .shops-left {
        width: 410px;
        margin-right: 45px;
    }

    .banner {
        display: block;
        height: 450px;
        top: 0;
        position: relative;
        margin-bottom: 50px;
    }

    .banner-img {
        display: block;
        position: absolute;
        object-fit: cover;
        height: 450px;
        top: 0;
        left: 0;
        width: 1440px;
        z-index: -1;
        object-fit: cover;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: auto;
        width: 100%;
        height: 450px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .banner-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
        width: 900px;
    }

    .banner-content {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #map {
        width: 824px;
        border-radius: 8px;
    }

    .breadcrumbs-block {
        position: absolute;
        z-index: 2;
        margin-left: 80px;
    }
</style>
@mobilecss
<style>
    .breadcrumbs-block {
        z-index: 2;
    }

    .banner {
        display: block;
        width: auto;
        height: 355px;
        top: 0;
    }

    .banner-img {
        display: block;
        position: absolute;
        z-index: 0;
        top: 0;
        left: 0;
        object-fit: cover;
        width: auto;
        height: 500px;
    }

    .gradient-banner {
        display: block;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        width: auto;
        height: 500px;
        background: transparent;
        background-repeat: no-repeat;
        object-fit: cover;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 18.68%, rgba(0, 0, 0, 0.34) 50.52%);
    }

    .banner-content {
        padding-top: 21px;
    }

    .banner-title {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        margin-left: auto;
        z-index: 1;
        text-transform: uppercase;
    }

    .banner-desc {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .small-social-section {
        display: flex;
        justify-content: space-between;
    }

    .location-shops {
        display: flex;
        flex-direction: column;
        width: 290px;
        height: 353px;
        border-radius: 8px;
        background: #F4F4F4;
        margin-top: 20px;
        overflow-x: hidden;
        overflow-y: scroll;
        padding: 30px;
        margin-bottom: 15px;
    }

    ::-webkit-scrollbar {
        width: 2px;
    }


    ::-webkit-scrollbar-track {
        background-color: var(--color-light-grey);
    }


    ::-webkit-scrollbar-thumb {
        background-color: var(--color-red);
        border-radius: 5px;
    }

    .location-shop {
        margin-bottom: 15px;
    }

    .location-shop-desc {
        font-family: "Istok Web", sans-serif ;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
    }

    .location-shop-contact-block {
        display: flex;
        justify-content: flex-start;
        border: none;
        padding-bottom: 15px;
        padding-top: 15px;
        border-bottom: 1px solid var(--color-grey);
    }

    .location-shop-contact {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        margin-right: 10px;
    }

    .location-shop-contact:last-child {
        margin-right: 0;
    }

    .location-shop-contact-title {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 22px;
        text-transform: uppercase;
    }

    .location-shop-contact-item {
        font-family: "Istok Web", sans-serif ;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
    }

    .shops-block {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        margin-top: 40px;
    }

    .map-image {
        width: 290px;
        height: 350px;
        border-radius: 8px;
    }

    .shops-left {
        width: 290px;
    }

    .main>.container {
        padding-left: 0;
        padding-right: 0;
    }

    #map {
        width: 290px;
        height: 350px;
        border-radius: 8px;
        margin-bottom: 60px;
    }

    .gm-style .gm-style-iw-c {
        background: var(--color-red);
    }

    .gm-style .gm-style-iw-d {
        overflow: initial !important;
        padding-bottom: 12px;
        padding-right: 15px;
    }

    .marker-desc {
        font-family: "Istok Web", sans-serif ;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: 16px;
    }
</style>
@endcss

@startjs
@endjs
