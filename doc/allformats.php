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
                    <h2 id="preface" class="headerScroll">Установка и подключение</h2>
                    <p>
                        Установка библиотеки довольно проста:
                        <a
                                href="https://github.com/kvvDigitalAgency/PHPExcel/archive/refs/heads/main.zip"
                                class="link-success"
                        >Скачиваем</a>
                        файлы и вставляем папку с нужной версией в проект.</p>
                    <p>
                        Подключение:
                    </p>
                    <pre class="rounded">
<span class="a">use</span> PHPExcel\core\PHPExcel<span class="a">;</span>
<span class="a">use</span> PHPExcel\models\Workbooks<span class="a">;</span>
<span class="c">//если нет автозагрузчика:</span>
<span class="a">require_once</span> <span class="s">'<путь до папки PHPExcel>core/PHPExcel.php'</span><span class="a">;</span>
<span class="a">require_once</span> <span class="s">'<путь до папки PHPExcel>models/Workbooks.php'</span><span class="a">;</span></pre>
                </div>
            </div>
            <div class="col-3 d-none d-xl-flex">
                <div class="bg-light my-3 rounded p-3 thisPage">
                    <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <span class="fs-5 fw-semibold">На этой странице</span>
                    </p>
                    <div class="headerNav" id="onThisPage">
                        <button class="btn btn-outline-success active btn-sm mb-1">Установка и подключение</button>
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