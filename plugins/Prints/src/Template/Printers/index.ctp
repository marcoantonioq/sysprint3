<?php
/**
  * @var \App\View\AppView $this
  */

?>


<div class="row">
        <?php
        echo $this->Html->link('<i class="fa fa-lock"></i> '.$this->request->session()->read('Auth.User.name').' | Sair?',
            [
                'plugin'=>'AuthUser',
                'controller' => 'users', 'action' => 'logout'
            ],
            [
                'class'=> 'btn btn-default pull-right',
                'escape'=>false
            ])." ";
            ?>
</div>



<div class="row">
    <?php foreach ($printers as $key => $printer): ?>
            <div class="col-xs-12 col-sm-3 .col-md-2 list-printers">
                
                    <?= $this->Html->link(
                            $this->Html->image('Template./img/icons/print.png',['class'=>'img-thumbnail'])."<h5>${printer['name']}</br><small>${printer['status']}</small></h5>", 
                            [
                                'plugin'=>'prints', 
                                'controller'=>'printers', 
                                'action' => 'spool',
                                $printer['name']
                            ],
                            [
                                'escape'=>false
                            ]
                    )?>
               
            </div>
    <?php endforeach; ?>
</div>