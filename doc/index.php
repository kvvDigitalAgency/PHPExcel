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
                        <h2 id="preface" class="headerScroll">Предисловие</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam at cum eum facilis,
                            harum quo quod voluptatum! Commodi dolorum error explicabo magni quae quis rem soluta
                            veniam? Autem, consectetur doloremque ducimus harum incidunt recusandae voluptate. A
                            accusantium adipisci aliquam animi aspernatur assumenda debitis dolor dolorem, error eum
                            fuga id ipsa ipsam molestiae necessitatibus non officia placeat recusandae sed similique,
                            vel vero voluptate voluptatum? Ad assumenda debitis dolores ea enim est ex facere in
                            inventore ipsa ipsum laborum libero magni mollitia, nam nostrum officia officiis omnis optio
                            perferendis porro praesentium quisquam, quo rem repellendus saepe soluta sunt suscipit vero
                            voluptates? A accusamus ad amet, at atque autem dicta dolorum ducimus esse et facere fuga
                            incidunt iste minus molestiae natus necessitatibus nemo perferendis praesentium quam quia
                            quibusdam repudiandae rerum saepe vel veritatis voluptas voluptatibus. Consequatur
                            consequuntur debitis exercitationem ipsum itaque numquam suscipit. Consequuntur ex,
                            natus porro quia quisquam repellendus suscipit tempore.
                        </p>
                        <h2 id="description" class="headerScroll">Описание</h2>
                        <p>Библиотека для работы с Microsoft Excel 2013 на языке PHP.</p>
                        <p>
                            Большинство библиотек в composer весят очень много, поэтому мы решили сделать свою версию,
                            вес которой получился всего 100 КБ.
                        </p>
                        <p>
                            Мы сделали 2 версии: для использования – со сжатым кодом, и с возможностью доработки – со всеми
                            комментариями и читабельным кодом.
                        </p>
                        <h2 id="callback" class="headerScroll">Обратная связь</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam at cum eum facilis,
                            harum quo quod voluptatum! Commodi dolorum error explicabo magni quae quis rem soluta
                            veniam? Autem, consectetur doloremque ducimus harum incidunt recusandae voluptate. A
                            accusantium adipisci aliquam animi aspernatur assumenda debitis dolor dolorem, error eum
                            fuga id ipsa ipsam molestiae necessitatibus non officia placeat recusandae sed similique,
                            vel vero voluptate voluptatum? Ad assumenda debitis dolores ea enim est ex facere in
                            inventore ipsa ipsum laborum libero magni mollitia, nam nostrum officia officiis omnis optio
                            perferendis porro praesentium quisquam, quo rem repellendus saepe soluta sunt suscipit vero
                            voluptates? A accusamus ad amet, at atque autem dicta dolorum ducimus esse et facere fuga
                            incidunt iste minus molestiae natus necessitatibus nemo perferendis praesentium quam quia
                            quibusdam repudiandae rerum saepe vel veritatis voluptas voluptatibus. Consequatur
                            consequuntur debitis exercitationem ipsum itaque numquam suscipit. Consequuntur ex,
                            natus porro quia quisquam repellendus suscipit tempore.
                        </p>
                    </div>
                </div>
                <div class="col-3 d-none d-xl-flex">
                    <div class="bg-light my-3 rounded p-3 thisPage">
                        <p class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                            <span class="fs-5 fw-semibold">На этой странице</span>
                        </p>
                        <div class="headerNav" id="onThisPage">
                            <button class="btn btn-outline-success active btn-sm mb-1">Описание</button>
                            <a href="#preface" class="d-block mb-1 ms-4 hrefScroll">
                                <button class="btn btn-outline-success btn-sm active">
                                    Предисловие
                                </button>
                            </a>
                            <a href="#description" class="d-block mb-1 ms-4 hrefScroll">
                                <button class="btn btn-outline-success btn-sm">
                                    Описание
                                </button>
                            </a>
                            <a href="#callback" class="d-block mb-1 ms-4 hrefScroll">
                                <button class="btn btn-outline-success btn-sm">
                                    Обратная связь
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