<?php

use dmstr\widgets\Menu;

/** @var $publishedUrl string */
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $publishedUrl ?>/img/avatar.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->admin;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?= Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'encodeLabels' => false,
                'activateParents' => true,
                'items' => [
                    ['label' => '<span>' . 'Frontend' . '</span>', 'options' => ['class' => 'header']],
                    ['label' => '<span>' . 'Mặt hàng' . '</span>', 'icon' => 'fa fa-archive', 'url' => ['/product/index']],
                    ['label' => '<span>' . 'Tổng hợp XNT' . '</span>', 'icon' => 'fa fa fa-bar-chart', 'url' => ['/logio/index']],
                    ['label' => '<span>' . 'Nhập kho' . '</span>', 'icon' => 'fa fa-arrow-circle-left', 'url' => ['/stockin/index']],
                    ['label' => '<span>' . 'Xuất kho' . '</span>', 'icon' => 'fa fa-arrow-circle-right', 'url' => ['/stockout/index']],
                    ['label' => '<span>' . 'Backend' . '</span>', 'options' => ['class' => 'header']],
                    ['label' => '<span>' . 'Quyền' . '</span>', 'icon' => 'fa fa-list-ol', 'url' => ['/functional/index']],
                    ['label' => '<span>' . 'Nhóm' . '</span>', 'icon' => 'fa fa-users', 'url' => ['/groups/index']],
                    ['label' => '<span>' . 'Quản trị viên' . '</span>', 'icon' => 'fa fa-user', 'url' => ['/admin/index']],
                    ['label' => '<span>' . 'Login' . '</span>', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>
    <!-- /.sidebar -->
</aside>
