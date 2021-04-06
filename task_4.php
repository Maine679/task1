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

                            <?php
                                $arrData = array(
                                    array(
                                        'name'=>'My Tasks',
                                        'name_class'=>'d-flex mt-2',
                                        'value'=>'130 / 500',
                                        'value_class'=>'d-inline-block ml-auto',
                                        'progress_data'=> array(
                                            'class' => 'progress progress-sm mb-3',
                                            'param' => array(
                                                'class'=>'progress-bar bg-fusion-400',
                                                'role'=>'progressbar',
                                                'style'=>'width: 65%;',
                                                'aria-valuenow'=>'65',
                                                'aria-valuemin'=>'0',
                                                'aria-valuemax'=>'100'
                                            )
                                        )
                                    ),
                                    array(
                                        'name'=>'Transfered',
                                        'name_class'=>'d-flex',
                                        'value'=>'440 TB',
                                        'value_class'=>'d-inline-block ml-auto',
                                        'progress_data'=> array(
                                            'class' => 'progress progress-sm mb-3',
                                            'param' => array(
                                                'class'=>'progress-bar bg-success-500',
                                                'role'=>'progressbar',
                                                'style'=>'width: 34%;',
                                                'aria-valuenow'=>'34',
                                                'aria-valuemin'=>'0',
                                                'aria-valuemax'=>'100'
                                            )
                                        )
                                    ),
                                    array(
                                        'name'=>'Bugs Squashed',
                                        'name_class'=>'d-flex',
                                        'value'=>'77%',
                                        'value_class'=>'d-inline-block ml-auto',
                                        'progress_data'=> array(
                                            'class' => 'progress progress-sm mb-3',
                                            'param' => array(
                                                'class'=>'progress-bar bg-info-400',
                                                'role'=>'progressbar',
                                                'style'=>'width: 77%;',
                                                'aria-valuenow'=>'77',
                                                'aria-valuemin'=>'0',
                                                'aria-valuemax'=>'100'
                                            )
                                        )
                                    ),
                                    array(
                                        'name'=>'User Testing',
                                        'name_class'=>'d-flex',
                                        'value'=>'7 days',
                                        'value_class'=>'d-inline-block ml-auto',
                                        'progress_data'=> array(
                                            'class' => 'progress progress-sm mb-g',
                                            'param' => array(
                                                'class'=>'progress-bar bg-primary-300',
                                                'role'=>'progressbar',
                                                'style'=>'width: 84%;',
                                                'aria-valuenow'=>'84',
                                                'aria-valuemin'=>'0',
                                                'aria-valuemax'=>'100'
                                            )
                                        )
                                    ));

                                function showData($arr) : void {
                                    echo '<div class="' . $arr['name_class'] . '">';
                                    echo $arr['name'];
                                    echo '<span class="' . $arr['value_class'] . '">' . $arr['value'] . '</span>';
                                    echo '</div>';
                                    echo '<div class="' . $arr['progress_data']['class'] . '">';
                                    echo '<div ';

                                    foreach ($arr['progress_data']['param'] as $param => $data) {
                                        echo $param . '="' . $data . '" ';
                                    }

                                    echo '></div>';
                                    echo '</div>';
                                }

                                foreach ($arrData as $key) {
                                    showData($key);
                                }

                            ?>

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
