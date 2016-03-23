<?php
/* @var $this CarouselController */
/* @var $dataProvider CActiveDataProvider */
?>
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'adminSlider.css'); ?>" />
<br>
<br>
<ul class="list-inline">
    <li>
        <button type="button" class="btn btn-primary"
                onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/carousel/create');?>','Додати фото')">
            Додати фото</button>
    </li>
</ul>

    <div class="page-header">
        <h4>Слайдер на головній</h4>
    </div>

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="mainSliderTable" style="width:100%">
                    <thead>
                    <tr>
                        <th>Порядок</th>
                        <th>Фото</th>
                        <th>Вверх</th>
                        <th>Вниз</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $jq(document).ready(function () {
        initMainSliderList();
    });
</script>