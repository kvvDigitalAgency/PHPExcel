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
                    <h2>Перенос строк</h2>
                    <h3 id="setall" class="headerScroll">Установка переноса строк для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalWrapText</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если перенос строк установлен, либо false, если произошла ошибка.</p>
                    <h3 id="getall" class="headerScroll">Проверка переноса строк в книге</h3>
                    <pre class="rounded">$excel-><span class="y">isGlobalWrapText</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если перенос строк во всей книге установлен, либо false – если не установлен.</p>
                    <h3 id="set" class="headerScroll">Установка переноса строк в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setWrapTextToCells</span>(<span class="c">cells</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если перенос строк установлен, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые парамаетры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <h3 id="get" class="headerScroll">Проверка переноса строк ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">isCellWrapText</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если перенос строк в ячейке установлен, либо false – если не установлен.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cell</b> – Строка. Номер ячейки. Пример: A1, b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка. Диапазон ячеек указывать ошибочно.</p>
                </div>
            </div>
            <div class="col-3 d-none d-xl-flex">
                <div class="bg-light my-3 rounded p-3 thisPage">
                    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">На этой странице</span>
                    </p>
                    <div class="headerNav" id="onThisPage">
                        <button class="btn btn-outline-success active btn-sm mb-1">Перенос строк</button>
                        <a href="#setall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка переноса строк для всей книги
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Проверка переноса строк в книге
                            </button>
                        </a>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка переноса строк в ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Проверка переноса строк ячейки
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