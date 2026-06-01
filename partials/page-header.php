<div class="breadcumb-section">
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-content">
                    <?php if (!empty($mainTitle)) : ?>
                        <h1 class="breadcumb-title"><?php echo $mainTitle;?></h1>
                    <?php endif; ?>
                        <ul class="breadcumb-menu">
                            <?php if (!empty($Title)) : ?>
                            <li><a href="index.php"><?php echo $Title;?></a></li>
                            <?php endif; ?>
                            <li class="text-white">/</li>
                            <?php if (!empty($Title2)) : ?>
                            <li class="active"><?php echo $Title2;?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
