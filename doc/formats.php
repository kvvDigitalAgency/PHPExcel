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
                    <h2>Формат данных</h2>
                    <h3 id="setall" class="headerScroll">Установка общего формата данных для всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">setGlobalFormat</span>(<span class="c">format</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если формат установился, либо false, если такого формата нет.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>format</b> – Строка. Общий формат данных для всей книги – по умолчанию – общий.</p>
                    <h5>Поддерживаемые данные:</h5>
                    <p class="hd collapsed" data-bs-toggle="collapse" data-bs-target="#secsec" aria-expanded="true"><b>format: </b><i class="bi-chevron-up" role="img" aria-label="list"></i></p>
                    <div id="secsec" class="collapse">
                        <table class="table table-striped table-success table-hover">
                            <thead>
                            <tr>
                                <th>Данные</th>
                                <th>Описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>general</td>
                                <td>Общий формат данных</td>
                            </tr>
                            <tr>
                                <td>fraction1</td>
                                <td>Дробное число до 1 знака: 1/2, 2/3, 1/4...</td>
                            </tr>
                            <tr>
                                <td>fraction2</td>
                                <td>Дробное число до 2 знаков: 1/12, 12/7, 78/86…</td>
                            </tr>
                            <tr>
                                <td>fraction3</td>
                                <td>Дробное число до 3 знаков: 134/12, 132/7, 718/876…</td>
                            </tr>
                            <tr>
                                <td>date(m/d/yyyy)</td>
                                <td>Дата формата м/д/гггг</td>
                            </tr>
                            <tr>
                                <td>date(d-mmm-yy)</td>
                                <td>Дата формата д-ммм-гг</td>
                            </tr>
                            <tr>
                                <td>date(d-mmm)</td>
                                <td>Дата формата д-ммм</td>
                            </tr>
                            <tr>
                                <td>date(mmm-yy)</td>
                                <td>Дата формата ммм-гг</td>
                            </tr>
                            <tr>
                                <td>time(h:mm AM/PM)</td>
                                <td>Время формата ч:мм до полудня/после полудня</td>
                            </tr>
                            <tr>
                                <td>time(h:mm:ss AM/PM)</td>
                                <td>Время формата ч:мм:сс до полудня/после полудня</td>
                            </tr>
                            <tr>
                                <td>time(h:mm)</td>
                                <td>Время формата ч:мм</td>
                            </tr>
                            <tr>
                                <td>time(h:mm:ss)</td>
                                <td>Время формата ч:мм:сс</td>
                            </tr>
                            <tr>
                                <td>time(m/d/yyyy h:mm)</td>
                                <td>Время формата м/д/гггг ч:мм</td>
                            </tr>
                            <tr>
                                <td>time(mm:ss)</td>
                                <td>Время формата мм:сс</td>
                            </tr>
                            <tr>
                                <td>time([h]:mm:ss)</td>
                                <td>Время формата [ч]:мм:сс</td>
                            </tr>
                            <tr>
                                <td>time(mm:ss.0)</td>
                                <td>Время формата мм:сс.мс</td>
                            </tr>
                            <tr>
                                <td>text</td>
                                <td>Текстовый формат</td>
                            </tr>
                            <tr>
                                <td>integer</td>
                                <td>Целочисленный формат</td>
                            </tr>
                            <tr>
                                <td>integerOnlyPositive</td>
                                <td>Только позитивные целые числа (отрицательные выделяются красным) минус перед числом присутствует</td>
                            </tr>
                            <tr>
                                <td>integerWithGroupSeparator</td>
                                <td>Целые числа с разделителем групп: 1 283 132</td>
                            </tr>
                            <tr>
                                <td>integerOnlyPositiveWithoutMinus</td>
                                <td>Только положительные целые числа (отрицательные выделяются красным) минус перед числом отсутствует</td>
                            </tr>
                            <tr>
                                <td>exponential/0, exponential/1…exponential/30</td>
                                <td>Экспоненциальные числа: 1E12, 1.2E84…1.234567890987654321234567890987E16</td>
                            </tr>
                            <tr>
                                <td>percentages/0, percentages/1… percentages/30</td>
                                <td>Проценты: 1%, 1.2%…1.234567890987654321234567890987%</td>
                            </tr>
                            <tr>
                                <td>decimal/s/s/1, decimal/s/s/2… decimal/s/s/30</td>
                                <td>Десятичные числа: 1234.5, 1.23…321.234567890987654321234567890987</td>
                            </tr>
                            <tr>
                                <td>decimal/s/gs/1, decimal/s/gs/2… decimal/s/gs/30</td>
                                <td>Десятичные числа c разделителем групп: 1 013.8, 1.24…1.234567890987654321234567890987</td>
                            </tr>
                            <tr>
                                <td>decimal/op/s/1, decimal/op/s/2… decimal/op/s/30</td>
                                <td>Только положительные десятичные числа (отрицательные выделяются красным) минус перед числом присутствует: 1234.5, 1.23…321.234567890987654321234567890987</td>
                            </tr>
                            <tr>
                                <td>decimal/op/gs/1, decimal/op/gs/2… decimal/op/gs/30</td>
                                <td>Только положительные десятичные числа (отрицательные выделяются красным) минус перед числом присутствует. С разделителем групп: 1 013.8, 1.24…1.234567890987654321234567890987</td>
                            </tr>
                            <tr>
                                <td>decimal/a/s/1, decimal/a/s/2… decimal/a/s/30</td>
                                <td>Только положительные десятичные числа (отрицательные выделяются красным) минус перед числом отсутствует: 1234.5, 1.23…321.234567890987654321234567890987</td>
                            </tr>
                            <tr>
                                <td>decimal/a/gs/1, decimal/a/gs/2… decimal/a/gs/30</td>
                                <td>Только положительные десятичные числа (отрицательные выделяются красным) минус перед числом отсутствует. С разделителем групп: 1 013.8, 1.24…1.234567890987654321234567890987</td>
                            </tr>
                            <tr>
                                <td>money/0/none/s, money/1/none/s… money/30/none/s</td>
                                <td>Денежный формат без валюты: 1 024, -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>money/0/none/op, money/1/none/op… money/30/none/op</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом присутствует без валюты: 1 024, -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>money/0/none/a, money/1/none/a… money/30/none/a</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует без валюты: 1 024, -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>money/0/dollar/s, money/1/dollar/s… money/30/dollar/s</td>
                                <td>Денежный формат доллар: $ 1 024, $ -81 909 132, $ 946</td>
                            </tr>
                            <tr>
                                <td>money/0/dollar/op, money/1/dollar/op… money/30/dollar/op</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом присутствует доллар: $ 1 024, $ -81 909 132, $ 946</td>
                            </tr>
                            <tr>
                                <td>money/0/dollar/a, money/1/dollar/a… money/30/dollar/a</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует доллар: $ 1 024, $ -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>money/0/euro/s, money/1/euro/s… money/30/euro/s</td>
                                <td>Денежный формат евро: € 1 024, € -81 909 132, € 946</td>
                            </tr>
                            <tr>
                                <td>money/0/euro/op, money/1/euro/op… money/30/euro/op</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом присутствует евро: € 1 024, € -81 909 132, € 946</td>
                            </tr>
                            <tr>
                                <td>money/0/euro/a, money/1/euro/a… money/30/euro/a</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует евро: € 1 024, € -81 909 132, € 946</td>
                            </tr>
                            <tr>
                                <td>money/0/ruble/s, money/1/ruble/s… money/30/ruble/s</td>
                                <td>Денежный формат рубли: 1 024 ₽, -81 909 132 ₽, 946 ₽</td>
                            </tr>
                            <tr>
                                <td>money/0/ruble/op, money/1/ruble/op… money/30/ruble/op</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом присутствует рубли: 1 024 ₽, -81 909 132 ₽, 946 ₽</td>
                            </tr>
                            <tr>
                                <td>money/0/ruble/a, money/1/ruble/a… money/30/ruble/a</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует рубли: 1 024 ₽, -81 909 132 ₽, 946 ₽</td>
                            </tr>
                            <tr>
                                <td>money/0/pound/s, money/1/pound/s… money/30/pound/s</td>
                                <td>Денежный формат фунты стерлинга: £ 1 024, £ -81 909 132, £ 946</td>
                            </tr>
                            <tr>
                                <td>money/0/pound/op, money/1/pound/op… money/30/pound/op</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом присутствует фунты стерлинга: £ 1 024, £ -81 909 132, £ 946</td>
                            </tr>
                            <tr>
                                <td>money/0/pound/a, money/1/pound/a… money/30/pound/a</td>
                                <td>Денежный формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует фунты стерлинга: £ 1 024, £ -81 909 132, £ 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/none/s, finance/1/none/s… finance/30/none/s</td>
                                <td>Финансовый формат без валюты: 1 024, -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/none/op, finance/1/none/op… finance/30/none/op</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом присутствует без валюты: 1 024, -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/none/a, finance/1/none/a… finance/30/none/a</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует без валюты: 1 024, -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/dollar/s, finance/1/dollar/s… finance/30/dollar/s</td>
                                <td>Финансовый формат доллар: $ 1 024, $ -81 909 132, $ 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/dollar/op, finance/1/dollar/op… finance/30/dollar/op</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом присутствует доллар: $ 1 024, $ -81 909 132, $ 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/dollar/a, finance/1/dollar/a… finance/30/dollar/a</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует доллар: $ 1 024, $ -81 909 132, 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/euro/s, finance/1/euro/s… finance/30/euro/s</td>
                                <td>Финансовый формат евро: € 1 024, € -81 909 132, € 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/euro/op, finance/1/euro/op… finance/30/euro/op</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом присутствует евро: € 1 024, € -81 909 132, € 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/euro/a, finance/1/euro/a… finance/30/euro/a</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует евро: € 1 024, € -81 909 132, € 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/ruble/s, finance/1/ruble/s… finance/30/ruble/s</td>
                                <td>Финансовый формат рубли: 1 024 ₽, -81 909 132 ₽, 946 ₽</td>
                            </tr>
                            <tr>
                                <td>finance/0/ruble/op, finance/1/ruble/op… finance/30/ruble/op</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом присутствует рубли: 1 024 ₽, -81 909 132 ₽, 946 ₽</td>
                            </tr>
                            <tr>
                                <td>finance/0/ruble/a, finance/1/ruble/a… finance/30/ruble/a</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует рубли: 1 024 ₽, -81 909 132 ₽, 946 ₽</td>
                            </tr>
                            <tr>
                                <td>finance/0/pound/s, finance/1/pound/s… finance/30/pound/s</td>
                                <td>Финансовый формат фунты стерлинга: £ 1 024, £ -81 909 132, £ 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/pound/op, finance/1/pound/op… finance/30/pound/op</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом присутствует фунты стерлинга: £ 1 024, £ -81 909 132, £ 946</td>
                            </tr>
                            <tr>
                                <td>finance/0/pound/a, finance/1/pound/a… finance/30/pound/a</td>
                                <td>Финансовый формат только положительные (отрицательные выделяются красным) минус перед числом отсутствует фунты стерлинга: £ 1 024, £ -81 909 132, £ 946</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 id="getall" class="headerScroll">Получение общего формата данных всей книги</h3>
                    <pre class="rounded">$excel-><span class="y">getGlobalFormat</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку формата данных всей книги.</p>
                    <h5>Поддерживаемые данные:</h5>
                    <a href="#secsec" class="link-dark"><p class="collapsed" data-bs-toggle="collapse" data-bs-target="#secsec" aria-expanded="true"><b>format: </b><i class="bi-chevron-up" role="img" aria-label="list"></i></p></a>
                    <h3 id="set" class="headerScroll">Установка формата данных в ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">setFormatToCells</span>(<span class="c">cells</span>, <span class="c">format</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если формат установился, либо false, если такого формата нет.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cells</b> - Строка. Номер ячейки или ячеек. Пример: A1, b8:ch55, A2:b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка.</p>
                    <p><b>format</b> – Строка. Общий формат данных для всей книги – по умолчанию – общий.</p>
                    <h5>Поддерживаемые данные:</h5>
                    <a href="#secsec" class="link-dark"><p class="collapsed" data-bs-toggle="collapse" data-bs-target="#secsec" aria-expanded="true"><b>format: </b><i class="bi-chevron-up" role="img" aria-label="list"></i></p></a>
                    <h3 id="get" class="headerScroll">Получение формата данных ячейки</h3>
                    <pre class="rounded">$excel-><span class="y">getCellFormat</span>(<span class="c">cell</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку формата данных ячейки.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>cell</b> – Строка. Номер ячейки. Пример: A1, b3. Строка не чувствительна к регистру. A1 и a1 - одна и та же ячейка. Диапазон ячеек указывать ошибочно.</p>
                    <h5>Поддерживаемые данные:</h5>
                    <a href="#secsec" class="link-dark"><p class="collapsed" data-bs-toggle="collapse" data-bs-target="#secsec" aria-expanded="true"><b>format: </b><i class="bi-chevron-up" role="img" aria-label="list"></i></p></a>
                </div>
            </div>
            <div class="col-3 d-none d-xl-flex">
                <div class="bg-light my-3 rounded p-3 thisPage">
                    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">На этой странице</span>
                    </p>
                    <div class="headerNav" id="onThisPage">
                        <button class="btn btn-outline-success active btn-sm mb-1">Формат данных</button>
                        <a href="#setall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Установка общего формата данных для всей книги
                            </button>
                        </a>
                        <a href="#getall" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение общего формата данных всей книги
                            </button>
                        </a>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Установка формата данных в ячейки
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="text-start btn btn-outline-success btn-sm">
                                Получение формата данных ячейки
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