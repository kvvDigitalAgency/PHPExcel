<!doctype html>
<html lang="en">
<head>

    <?php require_once './src/blocks/head.php'?>

</head>
<body>
<div class="wrapper">

    <?php require_once './src/blocks/header.php'?>


    <div class="container main">
        <div class="row">
            <div class="col-xl-3 col-4 d-lg-flex d-none">

                <?php require_once './src/blocks/sideBar.php'?>

            </div>
            <div class="col-xl-6 col-lg-8 col-12">
                <div class="bg-light my-3 rounded p-3" id="body">
                    <h2>Работа с листами книги</h2>
                    <h3 id="select" class="headerScroll">Выбор текущего листа для работы с ним</h3>
                    <pre class="rounded">$excel-><span class="y">setCurrentSheet</span>(<span class="c">nameSheet</span>)<span class="a">;</span></pre>
                    <h4>Возврат:</h4>
                    <p>Возвращает true, если текущий лист установлен, либо false, если листа с таким названием не существует</p>
                    <h4>Передаваемые параметры:</h4>
                    <p><b>nameSheet</b> - Строка. Название листа</p>
                    <h3 id="get" class="headerScroll">Получение текущего листа</h3>
                    <pre class="rounded">$excel-><span class="y">getCurrentSheet</span>()<span class="a">;</span></pre>
                    <h4>Возврат:</h4>
                    Возвращает название текущего листа
                    <h3 id="getall" class="headerScroll">Получение списка всех листов</h3>
                    <pre class="rounded">$excel-><span class="y">getAllSheets</span>()<span class="a">;</span></pre>
                    <h4>Возврат:</h4>
                    <p>Возвращает массив типа:</p>
                    <pre class="rounded">[
    <span class="s">'Лист 1'</span>,
    <span class="s">'Лист 2'</span>,
    …
]</pre>

                    <h3 id="create" class="headerScroll">Создание нового листа</h3>
                    <pre class="rounded">$excel-><span class="y">createSheet</span>(<span class="c">nameSheet</span>)<span class="a">;</span></pre>
                    <h4>Возврат</h4>
                    <p>Возвращает true, если лист создался и устанавливает его текущим листом, либо false, если лист с таким же названием уже существует</p>
                    <h4>Передаваемые параметры:</h4>
                    <p><b>nameSheet</b> - Строка. Название листа</p>
                </div>
            </div>
            <div class="col-3 d-none d-xl-flex">
                <div class="bg-light my-3 rounded p-3 thisPage">
                    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">На этой странице</span>
                    </p>
                    <div class="headerNav" id="onThisPage">
                        <button class="btn btn-outline-success active btn-sm mb-1">Работа с листами книги</button>
                        <a href="#select" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm active">
                                Выбор текущего листа для работы с ним
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение текущего листа
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение списка всех листов
                            </button>
                        </a>
                        <a href="#create" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Создание нового листа
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light">

        <?php require_once './src/blocks/footer.php'?>

    </div>
</div>
</body>
</html>