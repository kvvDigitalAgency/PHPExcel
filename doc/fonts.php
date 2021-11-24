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
                    <h2>Шрифт</h2>
                    <h3 id="setall" class="headerScroll">Установка общего шрифта для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalFont</span>(<span class="c">font</span>, <span class="c">textStyle</span>, <span class="c">size</span>, <span class="c">color</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если шрифт установлен, либо false, если такого шрифта нет.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>font</b> – Строка. Название шрифта.</p>
                    <p><b>textStyle</b> – Строка. Стиль шрифта. варианты данных: b - полужирный текст, i - наклоненный текст, u - подчеркнутый текст.</p>
                    <p><b>size</b> – Число. Размер шрифта.</p>
                    <p><b>color</b> – Строка hex. Цвет текста. Можно прописывать: #123, #123456, 123, 123456.</p>
                    <h3 id="getall" class="headerScroll">Получение общего шрифта всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">getGlobalFont</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку описание шрифта всей книги типа:</p>
                    <pre class="rounded"><span class="y">&lt;font&gt;</span>
    <span class="y">&lt;textStyle/&gt;</span>
    <span class="y">&lt;sz</span> val=<span class="s">"size"</span><span class="y">/&gt;</span>
    <span class="y">&lt;color</span> rgb=<span class="s">"color"</span><span class="y">/&gt;</span>
    <span class="y">&lt;name</span> val=<span class="s">"font"</span><span class="y">/&gt;</span>
    <span class="y">&lt;family</span> val=<span class="s">"2"</span><span class="y">/&gt;</span>
    <span class="y">&lt;scheme</span> val=<span class="s">"minor"</span><span class="y">/&gt;</span>
<span class="y">&lt;/font&gt;</span></pre>
                    <h3 id="set" class="headerScroll">Установка шрифта в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setFontToCells</span>(<span class="c">cells</span>, <span class="c">font</span>, <span class="c">textStyle</span>, <span class="c">size</span>, <span class="c">color</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если шрифт установлен, либо false, если такого шрифта нет.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p><b>font</b> – Строка. Название шрифта.</p>
                    <p><b>textStyle</b> – Строка. Стиль шрифта. варианты данных: b - полужирный текст, i - наклоненный текст, u - подчеркнутый текст.</p>
                    <p><b>size</b> – Число. Размер шрифта.</p>
                    <p><b>color</b> – Строка hex. Цвет текста. Можно прописывать: #123, #123456, 123, 123456.</p>
                    <h3 id="get" class="headerScroll">Получение шрифта ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">getCellFont</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку описание шрифта, используемого в выбранной ячейке:</p>
                    <pre class="rounded"><span class="y">&lt;font&gt;</span>
    <span class="y">&lt;textStyle/&gt;</span>
    <span class="y">&lt;sz</span> val=<span class="s">"size"</span><span class="y">/&gt;</span>
    <span class="y">&lt;color</span> rgb=<span class="s">"color"</span><span class="y">/&gt;</span>
    <span class="y">&lt;name</span> val=<span class="s">"font"</span><span class="y">/&gt;</span>
    <span class="y">&lt;family</span> val=<span class="s">"2"</span><span class="y">/&gt;</span>
    <span class="y">&lt;scheme</span> val=<span class="s">"minor"</span><span class="y">/&gt;</span>
<span class="y">&lt;/font&gt;</span></pre>
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
                        <button class="btn btn-outline-success active btn-sm mb-1">Шрифт</button>
                        <a href="#setall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка общего шрифта для всей книги
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение общего шрифта всей книги
                            </button>
                        </a>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка шрифта в ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Получение шрифта ячейки
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