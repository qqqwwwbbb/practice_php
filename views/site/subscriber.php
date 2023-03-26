<h3><?= $message ?? ''; ?></h3>
<div class="container mt-4">
    <a class="text-success text-decoration-none" href="/"><h5>< Назад</h5></a>
</div>

<h1 class=" mt-5 fw-bold mb-4 d-flex justify-content-center">Reader</h1>

<div class="container d-flex justify-content-center">

    <div class="col-md-7 col-lg-8">
        <div class="row g-3 d-flex justify-content-center">

            <div class="col-sm-6 mt-5 d-flex flex-column align-items-center">
                <label for="firstName" class="form-label"><h5>Фамилия</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($subscribers as $subscriber) {
                    echo '<p>' . $subscriber->surname . '</p>';
                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>


            <div class="col-sm-6 mt-5 d-flex flex-column align-items-center">
                <label for="lastName" class="form-label"><h5>Имя</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($subscribers as $subscriber) {
                    echo '<p>' . $subscriber->name . '</p>';

                }
                ?>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <div class="col-sm-6 d-flex flex-column align-items-center">
                <label for="firstName" class="form-label"><h5>Отчество</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($subscribers as $subscriber) {
                    echo '<p>' . $subscriber->last_name . '</p>';

                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6 d-flex flex-column align-items-center">
                <label for="firstName" class="form-label"><h5>Номер телефона</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($subscribers as $subscriber) {
                    echo '<p>' . $subscriber->number . '</p>';
                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <h4 class="mt-5 d-flex justify-content-center">Books</h4>


            <div class="col-sm-6 d-flex flex-column align-items-center">
                <label for="firstName" class="form-label"><h5>Название</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($subunits as $subunit) {
                    if ($subunit->id == $subscriber->subunit_id) {
                        echo '<p>' . $subunit->title . '</p>';
                    }
                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6 d-flex flex-column align-items-center">
                <label for="firstName" class="form-label"><h5>Вид</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($subunits as $subunit) {
                    if ($subunit->id == $subscriber->subunit_id) {
                        foreach ($type_subunits as $type_subunit) {
                            if ($subunit->type_subunit_id == $type_subunit->id) {
                                echo '<p>' . $type_subunit->title . '</p>';
                            }
                        }
                    }
                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <h4 class="mt-5 d-flex justify-content-center">Books</h4>

            <div class="col-sm-6 d-flex flex-column align-items-center mb-5">
                <label for="firstName" class="form-label"><h5>Название</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($rooms as $room) {
                    if ($room->id == $subscriber->room_id) {
                        echo '<p>' . $room->title . '</p>';
                    }
                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6 d-flex flex-column align-items-center mb-5">
                <label for="firstName" class="form-label"><h5>Вид</h5></label>
                <hr style="background-color: #0b4c0b; height: 2px;" class="w-50 mt-1">
                <?php
                foreach ($rooms as $room) {
                    if ($room->id == $subscriber->room_id) {
                        foreach ($type_rooms as $type_room) {
                            if ($room->type_room_id == $type_room->id) {
                                echo '<p>' . $type_room->title . '</p>';
                            }
                        }
                    }
                }
                ?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>
        </div>
    </div>
</div>

