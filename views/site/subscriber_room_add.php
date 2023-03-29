<h2><?= $message ?? ''; ?></h2>

<div class="container mt-4">
    <a class="text-success text-decoration-none" href="subscriber_subunit_add"><h5>< Назад</h5></a>
</div>

<h2 class=" mt-5 fw-bold mb-0 d-flex justify-content-center">add reader</h2>
<h4 class=" mt-5 fw-bold mb-0 d-flex justify-content-center">book</h4>

<div class="container d-flex justify-content-center">
    <div class="col-md-7 col-lg-8">
        <form method="post" class="needs-validation" novalidate="">
            <div class="row g-3 d-flex justify-content-center">
                <div class="col-md-6 mt-5">
                    <label for="country" class="form-label">Название</label>
                    <select name="title" class="form-select" id="country" required="">
                        <option value="">Выберите...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="col-md-6 mt-5">
                    <label for="state" class="form-label">Вид</label>
                    <select name="title" class="form-select" id="state" required="">
                        <option value="">Выберите...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <button class="my-5 w-50 btn btn-success btn-lg" type="submit">Добавить</button>
            </div>
        </form>
    </div>
</div><?php
