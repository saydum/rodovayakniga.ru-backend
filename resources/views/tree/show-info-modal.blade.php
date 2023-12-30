<div class="modal fade" id="show-info-modal" tabindex="-1" aria-labelledby="show-info-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="name" class="card-title"></h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card">
                    <img id="image" src="https://mdbcdn.b-cdn.net/img/new/standard/city/062.webp" class="card-img-top" alt="Chicago Skyscrapers"/>
                    <div class="card-body">
                        <p class="card-text">
                            <b>Дата рождения:</b> <span id="data_birth"></span>
                            <br>
                            <b>Место рождения:</b> <span id="location_birth"></span>
                        </p>
                    </div>
                    <ul id="text" class="list-group list-group-light list-group-small">
                        {{--TXT--}}
                    </ul>

                    @auth()
                        <div class="card-body">

                            <a href="#" type="button" class="btn btn-outline-primary btn-sm btn-rounded">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="#" class="btn btn-outline-warning btn-sm btn-rounded">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
