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
                    <h2>Выравнивание текста</h2>
                    <h3 id="setall" class="headerScroll">Установка общего выравнивания текста для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalAlignment</span>(<span class="c">alignment</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если выравнивание установился, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p id="alignment"><b>alignment</b> – Массив типа:</p>
                    <pre class="rounded">[
    <span class="s">'h'</span>=><span class="s">'left | center | right | justify | fill | distributed'</span>,
    <span class="s">'v'</span>=><span class="s">'top | center | bottom | justify | distributed'</span>
]</pre>
                    <h5>Поддерживаемые данные:</h5>
                    <p><b>h</b> – Горизонтальное выравнивание:</p>
                    <p class="ms-4"><b>left</b> – по левому краю, <b>center</b> – по центру, <b>right</b> – по правому краю, <b>justify</b> – по ширине, <b>fill</b> - заполнение, <b>distributed</b> – распределенное.</p>
                    <p><b>v</b> – Вертикальное выравнивание:</p>
                    <p class="ms-4"><b>top</b> – по верхнему краю, <b>center</b> – по центру, <b>bottom</b> – по нижнему краю, <b>justify</b> – по ширине, <b>distributed</b> – распределенное.</p>
                    <h3 id="getall" class="headerScroll">Получение общего выравнивания текста для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">getGlobalAlignment</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает массив <a href="#alignment" class="link-success">типа.</a></p>
                    <h3 id="set" class="headerScroll">Установка выравнивания текста в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setAlignmentToCells</span>(<span class="c">cells</span>, <span class="c">alignment</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если выравнивание установился, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p><b>alignment</b> – Массив <a href="#alignment" class="link-success">типа.</a></p>
                    <h3 id="get" class="headerScroll">Получение выравнивания текста ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">getCellAlignment</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает массив <a href="#alignment" class="link-success">типа.</a></p>
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
                        <button class="btn btn-outline-success active btn-sm mb-1">Выравнивание текста</button>
                        <a href="#setall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка общего выравнивания текста для всей книги
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение общего выравнивания текста для всей книги
                            </button>
                        </a>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка выравнивания текста в ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Получение выравнивания текста ячейки
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