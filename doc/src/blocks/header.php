<header class="p-3 bg-success text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h1>PHPExcel</h1>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"></ul>
            <div class="text-end">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-light"><i class="bi-github" role="img" aria-label="GitHub"></i> GitHub</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Скачать</a></li>
                    <li class="d-lg-none d-inline-block" data-bs-toggle="collapse" data-bs-target="#menu" aria-expanded="true">
                        <a class="nav-link px-2 text-white">Меню</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="container">

    <ul class="list-unstyled ps-0 collapse" id="menu">
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