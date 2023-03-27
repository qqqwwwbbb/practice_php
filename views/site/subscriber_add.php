<h2><?= $message ?? ''; ?></h2>
<?php
if (app()->auth::check() && app()->auth::user()->name !== 'admin'):
?>
<div class="container mt-4">
    <a href="<?= app()->route->getUrl('/hello') ?>"<h5>< Назад</h5></a>
</div>
<?php
endif;
?>
<div class="container mt-4">
    <a href="<?= app()->route->getUrl('/hello') ?>"<h5>< Назад</h5></a>
</div>
<h2 class=" mt-5 fw-bold mb-0 d-flex justify-content-center">Добавление читателя</h2>
<div class="container d-flex justify-content-center">

    <div class="col-md-7 col-lg-8">
        <form method="post" class="needs-validation" novalidate="">
            <div class="row g-3">
                <div class="col-sm-6 mt-5">
                    <label for="firstName" class="form-label">Фамилия</label>
                    <input name="surname" type="text" class="form-control" id="surname" placeholder="" value=""
                           required="">
                </div>

                <div class="col-sm-6 mt-5">
                    <label for="lastName" class="form-label">Имя</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="" value="" required="">
                </div>

                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Отчество</label>
                    <input name="last_name" type="text" class="form-control" id="last_name" placeholder="" value=""
                           required="">
                </div>

                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Номер телефона</label>
                    <input name="number" type="text" class="form-control" id="number" placeholder="" value=""
                           required="">
                </div>

                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Дата сдачи</label>
                    <input name="date_of_Birth" type="date" class="form-control" id="number" placeholder="" value=""
                           required="">
                </div>


                <div class="col-md-6">
                    <label for="country" class="form-label">Желаемая книга</label>
                    <select name="subunit_id" class="form-select" id="country" required="">
                        <?php
                        foreach ($subunits as $subunit) {
                            echo '<option value="' . $subunit->id . '">' . $subunit->id . ' - ' . $subunit->title . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="country" class="form-label">Автор</label>
                    <select name="room_id" class="form-select" id="country" required="">
                        <?php
                        foreach ($rooms as $room) {
                            echo '<option value="' . $room->id . '">' . $room->id . ' - ' . $room->title . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="container d-flex justify-content-center">
                <button class="my-5 w-50 btn btn-success btn-lg" type="submit">Добавить</button>
            </div>
        </form>
    </div>
</div>
