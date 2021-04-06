<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>


                    <div class="panel-container show">
                        <div class="panel-content">
                           <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">

                           <?php

                                function showUser($userInfo) : void {
                                    echo '<div class="rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">';
                                    echo '<img src="img/demo/authors/' . $userInfo['image_src'] . '" alt="'. $userInfo['surname'] .' ' . $userInfo['name'] . '" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">';
                                    echo '<div class="ml-2 mr-3">';
                                    echo '<h5 class="m-0">';
                                    echo $userInfo['surname'] .' ' . $userInfo['name'] . ' (' . $userInfo['info'] . ')';
                                    echo '<small class="m-0 fw-300">';
                                    echo $userInfo['position'];
                                    echo '</small>';
                                    echo '</h5>';
                                    echo '<a href="https://twitter.com/' . $userInfo['twitter'] . '" class="text-info fs-sm" target="_blank">' . $userInfo['twitter'] . '</a> -';
                                    echo '<a href="https://wrapbootstrap.com/user/' . $userInfo['login'] . '" class="text-info fs-sm" target="_blank" title="Contact' . $userInfo['surname'] . '"><i class="fal fa-envelope"></i></a>';
                                    echo '</div>';
                                    echo '</div>';
                                }


                                $arrUsers = array(
                                    array(
                                        'name'=>'A.',
                                        'surname'=>'Sunny',
                                        'login'=>'myorange',
                                        'info'=>'UI/UX Expert',
                                        'image_src'=>'sunny.png',
                                        'position'=>'Lead Author',
                                        'twitter'=>'@myplaneticket'
                                    ),
                                    array(
                                        'name'=>'K.',
                                        'surname'=>'Jos',
                                        'login'=>'Walapa',
                                        'info'=>'ASP.NET Developer',
                                        'image_src'=>'josh.png',
                                        'position'=>'Partner &amp; Contributor',
                                        'twitter'=>'@atlantez'
                                    ),
                                    array(
                                        'name'=>'L.',
                                        'surname'=>'Jovanni',
                                        'login'=>'lodev09',
                                        'info'=>'PHP Developer',
                                        'image_src'=>'jovanni.png',
                                        'position'=>'Partner &amp; Contributor',
                                        'twitter'=>'@lodev09'
                                    ),
                                    array(
                                        'name'=>'R.',
                                        'surname'=>'Roberto',
                                        'login'=>'sildur',
                                        'info'=>'Rails Developer',
                                        'image_src'=>'roberto.png',
                                        'position'=>'Partner &amp; Contributor',
                                        'twitter'=>'@sildur'
                                    )
                                );

                                foreach ($arrUsers as $dataUser) {
                                    showUser($dataUser);
                                }

                           ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
