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
                    <h2>Границы</h2>
                    <h3 id="set" class="headerScroll">Установка границ для ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setBordersToCells</span>(<span class="c">cells</span>, <span class="c">borders</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если границы для ячеек установлены, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p id="borders"><b>borders</b> – Массив типа:</p>
                    <pre class="rounded">[
    <span class="s">‘top | right | bottom | left | diagonalUp | diagonalDown’</span> => [
        <span class="s">‘thin | hair | dotted | dashed | dashDot | dashDotDot | double | medium | mediumDashed | mediumDashDot | mediumDashDotDot | slantDashDot | thick’</span>,
        <span class="s">‘color’</span>
    ],
]</pre>
                    <h5>Поддерживаемые данные:</h5>
                    <p><b>top</b> – верхняя сторона,
                        <br><b>right</b> – правая сторона,
                        <br><b>bottom</b> – нижняя сторона,
                        <br><b>left</b> – левая сторона,
                        <br><b>diagonalUp</b> – диагональная снизу вверх,
                        <br><b>diagonalDown</b> – диагональная сверху вниз.</p>
                    <p><b>thin</b> – тонка сплошная,
                        <br><b>hair</b> – мелкая пунктирная,
                        <br><b>dotted</b> – точечная пунктирная,
                        <br><b>dashed</b> – пунктирная линия,
                        <br><b>dashDot</b> – пунктир линия точка,
                        <br><b>dashDotDot</b> – пунктир линия точка точка,
                        <br><b>double</b> – двойная сплошная,
                        <br><b>medium</b> – сполшная средней толщины,
                        <br><b>mediumDashed</b> – пунктирная линия средней толщины
                        <br><b>mediumDashDot</b> – пунктир линия точка средней толщины,
                        <br><b>mediumDashDotDot</b> – пунктир линия точка точка средней толщины,
                        <br><b>slantDashDot</b> – косая пунктир линия точка средней толщины,
                        <br><b>thick</b> – сплошная большой толщины.</p>
                    <p><b>color</b> - color – Строка hex. Цвет текста. Можно прописывать: #123, #123456, 123, 123456.</p>
                    <h5>Пометки:</h5>
                    <p>Порядок не важен, если какая-то граница не нужна – просто не прописывайте ее.</p>
                    <h3 id="get" class="headerScroll">Получение границы ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">getCellBorders</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает массив <a href="#borders" class="link-success">типа.</a></p>
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
                        <button class="btn btn-outline-success active btn-sm mb-1">Границы</button>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка границ для ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение границы ячейки
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