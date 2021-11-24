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
                    <h2>Получение готового файла Excel</h2>
                    <h3 id="set" class="headerScroll">Создание файла excel</h3>
                    <pre class="rounded">$excel-><span class="y">createExcelFile</span>(<span class="c">name</span>)<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает true, если файл был создан и false при возникновении ошибок.</p>
                    <h5>Передаваемые параметры:</h5>
                    <p><b>name</b> - Строка. Название файла</p>
                    <h3 id="get" class="headerScroll">Получение пути до файла excel</h3>
                    <pre class="rounded">$excel-><span class="y">getPathToExcel</span>()<span class="a">;</span></pre>
                    <h5>Возврат:</h5>
                    <p>Возвращает строку пути до файла, либо false, если файл ещё не создан</p>
                </div>
            </div>
            <div class="col-3 d-none d-xl-flex">
                <div class="bg-light my-3 rounded p-3 thisPage">
                    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">На этой странице</span>
                    </p>
                    <div class="headerNav" id="onThisPage">
                        <button class="btn btn-outline-success active btn-sm mb-1">Получение готового файла Excel</button>
                        <a href="#set" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm active">
                                Создание файла excel
                            </button>
                        </a>
                        <a href="#get" class="d-block mb-1 ms-4 hrefScroll">
                            <button class="btn btn-outline-success btn-sm">
                                Получение пути до файла excel
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