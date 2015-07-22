
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/sliderAboutUs.js"</script>

<script>
    var width=0;
    if (self.screen)
    {
        width = screen.width
    }
    function centerPage()
    {
        $('.contentCenterBox').css('width', width);
    }
</script>
<body onload="centerPage()">

<div class="aboutusslider">
<div id="slider" class="owl-carousel">
    <div class="slideAbout">
            <div class="about1">
                <div class="headerAbout">
                    <?php echo Yii::t("slider", "0549") ?>
                </div>
                <div class="sliderCenterBoxLine">
                    <hr>
                </div>
                <div class="textabout">
                    <?php echo Yii::t("slider", "0550") ?>
                </div>
            </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'aboutus', '1.jpg'); ?>" />
    </div>
    <div class="slideAbout">
        <div class="about">
            <div class="about2">
                <div class="headerAbout">
                    <?php echo Yii::t("slider", "0549") ?>
                </div>
                <div class="sliderCenterBoxLine">
                    <hr>
                </div>
                <div class="textabout">
                    <?php echo Yii::t("slider", "0551") ?>
                </div>
            </div>
        </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'aboutus', '2.jpg'); ?>"/>
    </div>
    <div class="slideAbout">
        <div class="about">
            <div class="about3">
                <div class="headerAbout">
                    <?php echo Yii::t("slider", "0549") ?>
                </div>
                <div class="sliderCenterBoxLine">
                    <hr>
                </div>
                <div class="textabout">
                    <?php echo Yii::t("slider", "0552") ?>
                </div>
            </div>
        </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'aboutus', '3.jpg'); ?>"/>
    </div>
    <div class="slideAbout">
            <div class="about4">
                <div class="headerAbout">
                    <?php echo Yii::t("slider", "0549") ?>
                </div>
                <div class="sliderCenterBoxLine">
                    <hr>
                </div>
                <div class="textabout">
                    <?php echo Yii::t("slider", "0553") ?>
                </div>
            </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'aboutus', '4.jpg'); ?>"/>
    </div>
    <div class="slideAbout">
        <div class="about5">
            <div class="headerAbout">
                <?php echo Yii::t("slider", "0549") ?>
            </div>
            <div class="sliderCenterBoxLine">
                <hr>
            </div>
            <div class="textabout">
                <?php echo Yii::t("slider", "0554") ?>
            </div>
        </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'aboutus', '5.jpg'); ?>"/>
    </div>
    <div class="slideAbout">
        <div class="about6">
            <div class="headerAbout">
                <?php echo Yii::t("slider", "0549") ?>
            </div>
            <div class="sliderCenterBoxLine">
                <hr>
            </div>
            <div class="textabout">
                <?php echo Yii::t("slider", "0555") ?>
            </div>
        </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'aboutus', '6.jpg'); ?>"/>
    </div>
</div>
</div>