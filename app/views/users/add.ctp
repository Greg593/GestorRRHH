<div class="box">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box">
    <div class="title"><h2>Datos del Usuario</h2>
        <?php echo $this->Html->image("title-hide.gif", array('class' => 'toggle')); ?>
    </div>
    <div class="content form">
        <?php
        echo $this->Form->create('User',array('url'=>array('controller'=>'users','action'=>'add')));
        echo "<div class='row'>";
        echo "<div style='margin-right: auto;margin-left: auto;width:50%'>";        
        echo $this->Form->input('NOMBRE', array('div' => false, 'label' => 'Nombre', 'class' => 'medium'));
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div style='margin-right: auto;margin-left: auto;width:50%'>";        
        echo $this->Form->input('APELLIDO', array('div' => false, 'label' => 'Apellido', 'class' => 'medium'));
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div style='margin-left:25%;float:left;width:25%'>";        
        echo $this->Form->input('USERNAME', array('div' => false, 'label' => 'Usuario', 'class' => 'small'));
        echo "</div>";
        echo "<div style='margin-right:22%;float:right;width:25%'>";        
        echo $this->Form->input('PASSWORD', array('type'=>'password','div' => false, 'label' => 'Contraseña', 'class' => 'small'));
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div style='margin-right: auto;margin-left: auto;width:28%'>";
        $options=array('Operador'=>'Operador','Usuario'=>'Usuario');
        echo $this->Form->input('GRUPO', array('div' => false, 'label' => 'Grupo', 'class' => 'small','type'=>'select','options'=>$options,'empty'=>'Seleccione una Opcion'));
        echo "</div>";
        echo "</div>";
        ?>
    </div>
</div>

<div class="box">
    <div class="title"><h2>Acciones</h2>
        <?php echo $this->Html->image("title-hide.gif", array('class' => 'toggle')); ?>
    </div>
    <div class="content form">            
        <div class="row">
            <div class="boton">
                <?php echo $this->Form->end('Agregar'); ?>
            </div>
            <div class="boton">
                <?php echo $this->Html->link('Regresar', array('action' => 'index')); ?>
            </div>              
        </div>        
    </div>
</div>
