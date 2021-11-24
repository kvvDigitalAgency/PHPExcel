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
                    <h2>Заливка</h2>
                    <h3 id="setall" class="headerScroll">Установка общей заливки для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalFill</span>(<span class="c">color</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если цвет установлен, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>color</b> – Строка hex. Цвет текста. Можно прописывать: #123, #123456, 123, 123456.</p>
                    <h3 id="getall" class="headerScroll">Получение общей заливки всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">getGlobalFill</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку ‘none’ – если цвета заливки нет, либо цвет заливки формата hex.</p>
                    <h3 id="set" class="headerScroll">Установка заливки в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setFillToCells</span>(<span class="c">cells</span>, <span class="c">color</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если цвет установлен, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p><b>color</b> – Строка hex. Цвет текста. Можно прописывать: #123, #123456, 123, 123456.</p>
                    <h3 id="get" class="headerScroll">Получение заливки ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">getCellFill</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку ‘none’ – если цвета заливки нет, либо цвет заливки формата hex.</p>
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
                        <button class="btn btn-outline-success active btn-sm mb-1">Заливка</button>
                        <a href="#setall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка общей заливки для всей книги
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение общей заливки всей книги
                            </button>
                        </a>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка заливки в ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Получение заливки ячейки
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