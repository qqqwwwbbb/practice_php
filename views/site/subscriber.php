<h3><?= $message ?? ''; ?></h3>
<div class="container mt-4">
    <a class="text-success text-decoration-none" href="hello"><h5>< Назад</h5></a>
</div>

<h1 class=" mt-5 fw-bold mb-4 d-flex justify-content-center">Страничка читателя</h1>
<div class="container d-flex justify-content-center">

    <div class="col-md-7 col-lg-8">
        <div class="row g-3 d-flex justify-content-center">

            <div class="col-sm-6 mt-5 d-flex flex-column align-items-center">
<?php
foreach ($subscribers as $subscriber) {
    echo '<tr>';
    echo '<td>' . '<b>' . $subscriber->id . '</b>' . '<h5>Номер читательского билета</h5> ' . '</td>';
}
?>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>
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

            <h4 class="mt-5 d-flex justify-content-center">Книги</h4>


            <div class="col-sm-6 d-flex flex-column align-items-center">
                <label for="firstName" class="form-label"><h5>Любимые книги</h5></label>
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
                <label for="firstName" class="form-label"><h5>Любимые авторы</h5></label>
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
        </div>
    </div>
</div>

