<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                foreach($services as $service):?>
                    <article class="post post-list">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-content">
                                    <header class="entry-header text-uppercase">
                                        <h6><a href="<?= Url::toRoute(['site/client','id'=>$service->client->id]);?>"> <?= $service->client->first_name?></a></h6>

                                        <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$service->id]);?>">Home is peaceful place</a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <p><?= $service->description?>
                                        </p>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By <?= $service->author->name;?> On <?= $service->getDate();?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach;?>
        </div>
    </div>
</div>
