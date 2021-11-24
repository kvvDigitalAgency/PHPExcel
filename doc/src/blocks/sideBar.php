<div class="flex-shrink-0 p-3 my-3 bg-light rounded">
    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">Навигация</span>
    </p>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-success <?php if(
                $_SERVER['REQUEST_URI'] != '/' &&
                $_SERVER['REQUEST_URI'] != '/install.php'
            ) echo 'collapsed'?>" data-bs-toggle="collapse" data-bs-target="#fc" aria-expanded="true">
                <i class="bi-chevron-right" role="img" aria-label="list"></i>
                Знакомство
            </button>
            <div class="collapse
            <?php if(
                    $_SERVER['REQUEST_URI'] == '/' ||
                    $_SERVER['REQUEST_URI'] == '/install.php'
            ) echo 'show'?>" id="fc">
                <ul class="btn-toggle-nav list-unstyled fw-normal py-1 small ms-4">
                    <li><a href="/" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/') echo 'active'?>">Описание</a></li>
                    <li><a href="/install.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/install.php') echo 'active'?>">Установка и подключение</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <a href="/workbook.php" class="btn btn-outline-success aside
                <?php if($_SERVER['REQUEST_URI'] == '/workbook.php') echo 'active'?>">
                Создание книги
            </a>
        </li>
        <li class="mb-1">
            <a href="/sheets.php" class="btn btn-outline-success aside
                <?php if($_SERVER['REQUEST_URI'] == '/sheets.php') echo 'active'?>">
                Работа с листами книги
            </a>
        </li>
        <li class="mb-1">
            <a href="/values.php" class="btn btn-outline-success aside
                <?php if($_SERVER['REQUEST_URI'] == '/values.php') echo 'active'?>">
                Работа со значениями ячеек
            </a>
        </li>
        <li class="mb-1">
            <button class="btn btn-success <?php if(
                $_SERVER['REQUEST_URI'] != '/fonts.php' &&
                $_SERVER['REQUEST_URI'] != '/fill.php' &&
                $_SERVER['REQUEST_URI'] != '/formats.php' &&
                $_SERVER['REQUEST_URI'] != '/alignment.php' &&
                $_SERVER['REQUEST_URI'] != '/wrap.php' &&
                $_SERVER['REQUEST_URI'] != '/rotation.php' &&
                $_SERVER['REQUEST_URI'] != '/borders.php'
            ) echo 'collapsed'?>" data-bs-toggle="collapse" data-bs-target="#sc" aria-expanded="true">
                <i class="bi-chevron-right" role="img" aria-label="list"></i>
                Работа со стилями
            </button>
            <div class="collapse
            <?php if(
                $_SERVER['REQUEST_URI'] == '/fonts.php' ||
                $_SERVER['REQUEST_URI'] == '/fill.php' ||
                $_SERVER['REQUEST_URI'] == '/formats.php' ||
                $_SERVER['REQUEST_URI'] == '/alignment.php' ||
                $_SERVER['REQUEST_URI'] == '/wrap.php' ||
                $_SERVER['REQUEST_URI'] == '/rotation.php' ||
                $_SERVER['REQUEST_URI'] == '/borders.php'
            ) echo 'show'?>" id="sc">
                <ul class="btn-toggle-nav list-unstyled fw-normal py-1 small ms-4">
                    <li><a href="/fonts.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/fonts.php') echo 'active'?>">Шрифт</a></li>
                    <li><a href="/fill.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/fill.php') echo 'active'?>">Заливка</a></li>
                    <li><a href="/formats.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/formats.php') echo 'active'?>">Формат данных</a></li>
                    <li><a href="/alignment.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/alignment.php') echo 'active'?>">Выравнивание текста</a></li>
                    <li><a href="/wrap.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/wrap.php') echo 'active'?>">Перенос строк</a></li>
                    <li><a href="/rotation.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/rotation.php') echo 'active'?>">Поворот текста</a></li>
                    <li><a href="/borders.php" class="btn btn-outline-success aside btn-sm mb-1
            <?php if($_SERVER['REQUEST_URI'] == '/borders.php') echo 'active'?>">Границы</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <a href="/file.php" class="btn btn-outline-success aside
                <?php if($_SERVER['REQUEST_URI'] == '/file.php') echo 'active'?>">
                Получение готового файла Excel
            </a>
        </li>
    </ul>
</div>