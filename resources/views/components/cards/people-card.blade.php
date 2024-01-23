<div class="card-team">
    <img src="{{ $image }}" alt="" class="team-img">
    <div class="team-title button-normal color-black">{{ $name }}</div>
    <div class="team-description cookie color-grey">{{ $description }}</div>
    <a href="tel:{{ Field::phone($phone) }}" class="menu color-blue2">{{ $phone }}</a>
    <a href="mailto:{{ $email }}" class="menu color-blue2">{{ $email }}</a>
</div>

@desktopcss
<style>
    .card-team {
        display: flex;
        position: relative;
        padding: 20px 15px;
        flex-direction: column;
        gap: 10px;
        border-radius: 8px;
        background: var(--white, #FFF);
        box-shadow: 0px 4px 20px 2px #D8D8D8;
        margin-right: 32px;
        margin-bottom: 24px;
    }

    .card-team a {
        text-decoration: none;
    }

    .card-team .menu {
        color: var(--color-blue2);
        margin-bottom: 0;
    }

    .card-team:nth-child(4n) {
        margin-right: 0;
    }

    .team-img {
        width: 260px;
        height: 220px;
        border-radius: 16px;
    }

    .team-title {
        text-align: left;
    }

    .team-description {
        text-align: left;
    }
</style>
@mobilecss
<style>
 .card-team {
        display: flex;
        position: relative;
        padding: 20px 15px;
        flex-direction: column;
        border-radius: 8px;
        background: var(--white, #FFF);
        box-shadow: 0px 4px 20px 2px #D8D8D8;
        margin-bottom: 24px;
    }

    .card-team a {
        text-decoration: none;
    }

    .card-team .menu {
        color: var(--color-blue2);
        margin-bottom: 0;
    }

    .card-team:nth-child(4n) {
        margin-right: 0;
    }

    .team-img {
        width: 260px;
        height: 220px;
        border-radius: 16px;
    }

    .team-title {
        text-align: left;
        margin-top: 20px;
    }

    .team-description {
        text-align: left;
        margin-bottom: 10px;
    }
</style>
@endcss

@startjs
<script></script>
@endjs
