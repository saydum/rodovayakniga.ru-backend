<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">
        rodovayakniga.ru
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('rods.index') }}">
            РОДовое Древо
        </a>
{{--        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">РОДовая книга</a>--}}
{{--        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">РОДственники</a>--}}
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('humans.index') }}">
            РОДственники
        </a>
{{--        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Мой профиль</a>--}}
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('links.index') }}">Управление ссылками</a>
    </div>
</div>
