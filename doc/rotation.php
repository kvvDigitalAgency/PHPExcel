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
                    <h2>Поворот текста</h2>
                    <h3 id="setall" class="headerScroll">Установка поворота текста для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalTextRotation</span>(<span class="c">degree</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если поворот текста установлен, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p id="alignment"><b>degree</b> – Число. Угол поворота текста.</p>
                    <h3 id="getall" class="headerScroll">Получение поворота текста всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">getGlobalTextRotation</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает угол поворота текста, либо строку "вертикальный текст", если текст установлен вертикальный.</p>
                    <h3 id="setalltwo" class="headerScroll">Установка вертикального текста для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalTextVertical</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если вертикальный текст установлен, либо false, если произошла ошибка.</p>
                    <h3 id="getalltwo" class="headerScroll">Проверка установки вертикального текста для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">isGlobalTextVertical</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если текст во всей книге вертикальный, либо false – если нет.</p>
                    <h3 id="set" class="headerScroll">Установка поворота текста в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setTextRotationToCells</span>(<span class="c">cells</span>, <span class="c">degree</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если поворот текста установлен, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p><b>degree</b> – Число. Угол поворота текста</p>
                    <h3 id="get" class="headerScroll">Получение поворота текста ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">getCellTextRotation</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает угол поворота текста, либо строку "вертикальный текст", если текст установлен вертикальный</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cell</b> – Строка. Номер ячейки. Пример: A1, b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка. Диапазон ячеек указывать ошибочно.</p>
                    <h3 id="settwo" class="headerScroll">Установка вертикального текста в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setTextVerticalToCells</span>(<span class="c">cells</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если вертикальный текст установлен, либо false, если произошла ошибка.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <h3 id="gettwo" class="headerScroll">Проверка установки вертикального текста для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">isCellTextVertical</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если текст во всей книге вертикальный, либо false – если нет.</p>
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
                        <button class="btn btn-outline-success active btn-sm mb-1">Поворот текста</button>
                        <a href="#setall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка поворота текста для всей книги
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение поворота текста всей книги
                            </button>
                        </a>
                        <a href="#setalltwo" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка вертикального текста для всей книги
                            </button>
                        </a>
                        <a href="#getalltwo" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Проверка установки вертикального текста для всей книги
                            </button>
                        </a>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка поворота текста в ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Получение поворота текста ячейки
                            </button>
                        </a>
                        <a href="#settwo" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка вертикального текста в ячейки
                            </button>
                        </a>
                        <a href="#gettwo" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Проверка установки вертикального текста для всей книги
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