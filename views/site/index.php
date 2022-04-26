<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ip</th>
                        <th scope="col">Client</th>
                        <th scope="col">type</th>
                        <th scope="col">domian</th>
                    </tr>
                    </thead>
                <?php foreach($services as $service):?>
                        <tbody>
                        <tr>
                            <td><?= $service->ip?></td>
                            <td><?= $service->client->first_name?></td>
                            <td><?= $service->type?></td>
                            <td><?= $service->domain?></td>
                        </tr>
                        </tbody>
                <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->