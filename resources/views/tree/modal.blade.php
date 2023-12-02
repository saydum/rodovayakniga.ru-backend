<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-header">
                    <form action="{{ route("humans.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label>Кого добавить?</label>
                                <select class="form-select" aria-label="Пол" name="gender">
                                    <option value="man">Отец</option>
                                    <option value="woman">Мать</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 pt-4">
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="o_name" placeholder="Отчество"
                                       aria-label="Отчество">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="f_name" placeholder="Фамилия"
                                       aria-label="Фамилия">
                            </div>
                        </div>
                        <div class="row g-3 pt-4">
                            <div class="col">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-success">Добавить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
