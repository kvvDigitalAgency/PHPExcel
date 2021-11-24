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
                    <h2>Работа со значениями ячеек</h2>
                    <h3 id="add" class="headerScroll">Добавить значение в ячейку</h3>
                    <pre class="rounded">$excel-><span class="y">setValuesToCells</span>(<span class="c">cells</span>, <span class="c">values</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если значение были установлены, либо false, если значения не были установлены (пример ошибки: неверно введены параметры).</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p><b>values</b> - Массив типа:</p>
                    <pre class="rounded">[
    <span class="s">'Value1'</span>,
    <span class="s">'Value2'</span>,
    …
]</pre>
                    <h5>Пометки:</h5>
                    <p>Значения устанавливаются в том листе, который был выбран в текущем листе.</p>
                    <p>Можно передавать в функцию:</p>
                    <ul class="fw-normal ms-4">
                        <li>1 ячейку и 1 значение;</li>
                        <li>Несколько ячеек и 1 значение - в данном случает значение установится во все ячейки;</li>
                        <li>Несколько ячеек и столько же значений - в этом случае значения установятся по порядку в ячейки. Если количество ячеек и количество значений не совпадёт - функция вернёт false и ничего не установит</li>
                    </ul>
                    <p>В остальных случаях функция вернёт false и ничего не установит.</p>
                    <h3 id="get" class="headerScroll">Получить значения ячеек</h3>
                    <pre class="rounded">$excel-><span class="y">getValuesCells</span>(<span class="c">cells</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает массив типа:</p>
                    <pre class="rounded">[
    <span class="s">'A1'</span> => <span class="s">'value'</span>,
    <span class="s">'A2'</span> => <span class="s">'value'</span>,
    …
]</pre>
                    <p>Либо пустой массив, если все ячейки из диапазона пустые.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <h5>Пометки:</h5>
                    <p>Значения берутся из выбранного текущего листа.</p>
                    <h3 id="getall" class="headerScroll">Получить все значение выбранного листа</h3>
                    <pre class="rounded">$excel-><span class="y">getAllValues</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает массив типа:</p>
                    <pre class="rounded">[
    <span class="s">'A1'</span> => <span class="s">'value'</span>,
    <span class="s">'A2'</span> => <span class="s">'value'</span>,
    …
]</pre>
                    <p>Либо пустой массив, если все ячейки из диапазона пустые.</p>
                    <h5>Пометки:</h5>
                    <p>Значения берутся из выбранного текущего листа.</p>
                </div>
            </div>
            <div class="col-3 d-none d-xl-flex">
                <div class="bg-light my-3 rounded p-3 thisPage">
                    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">На этой странице</span>
                    </p>
                    <div class="headerNav" id="onThisPage">
                        <button class="btn btn-outline-success active btn-sm mb-1">Работа со значениями ячеек</button>
                        <a href="#add" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Добавить значение в ячейку
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получить значения ячеек
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Получить все значение выбранного листа
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