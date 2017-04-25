<?php
/**
  * @var \App\View\AppView $this
  */

?>

<div class="row">
    <?php foreach ($printers as $key => $printer): ?>
            <div class="col-xs-12 col-sm-2">
                
                    <?= $this->Html->link(
                            $this->Html->image('/img/icons/print.png',['class'=>'img-thumbnail'])."<h5>${printer['name']}</br><small>${printer['status']}</small></h5>", 
                            [
                                'plugin'=>'prints', 
                                'controller'=>'printers', 
                                'action' => 'spool'
                            ],
                            [
                                'escape'=>false
                            ]
                    )?>
               
            </div>
    <?php endforeach; ?>
</div>