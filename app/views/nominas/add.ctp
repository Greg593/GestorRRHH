<div class="ui segment vertical very padded">
<div class="ui container"> 

<div class="box">
    <?php echo $this->Session->flash(); ?>    
</div>

<div class="box">
    <div class="title"><h2>Quincena de la Nomina</h2>
        <!-- <?php echo $this->Html->image("title-hide.gif", array('class' => 'toggle')); ?> -->
    </div>
    <div class="content form">
        <?php
        echo $this->Form->create('Nomina', array('url' => array('controller' => 'nominas', 'action' => 'add')));
        echo $this->Form->input('FECHA_ELA', array('type' => 'hidden', 'value' => date("Y-m-d H:i:s")));

        echo "<div class='row'>";
        echo "<div style='float:left;width:30%;'>";
        $options = 
        array('1' => 'Enero', 
              '2' => 'Febrero', 
              '3' => 'Marzo', 
              '4' => 'Abril', 
              '5' => 'Mayo', 
              '6' => 'Junio', 
              '7' => 'Julio',
              '8' => 'Agosto', 
              '9' => 'Septiembre', 
              '10' => 'Octubre', 
              '11' => 'Noviembre', 
              '12' => 'Diciembre');
        echo $this->Form->label('Mes: ');
        echo $this->Form->input('NOMINA_MES', array('div' => false, 'label' => false, 'class' => 'ui selection dropdown', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione el Opcion'));
        echo "</div>";

        echo "<div style='float:left;width:30%;'>";
        echo $this->Form->label('Año');
        echo $this->Form->input('NOMINA_AÑO', array('div' => false, 'label' => false, 'class' => 'small'));
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div style='float:left;width:40%'>";
        $options = array('Primera' => 'Primera', 'Segunda' => 'Segunda');
        echo $this->Form->input('QUINCENA', array('div' => false, 'label' => 'Quincena', 'class' => 'small', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione una opcion'));
        echo "</div>";
        
        echo "</div>";
        echo "<div class='row'>";
        echo "<div style='float:left;width:40%'>";        
        echo $this->Form->input('SUELDO_MINIMO', array('div' => false, 'label' => 'Sueldo Minimo', 'class' => 'small'));
        echo "</div>";
        echo "</div>";
        ?>
    </div>    
</div>

<div class="box">

    <form action="" id="" method="post" accept-charset="utf-8" class="ui form">
        <button class="ui button fluid teal" type="submit">Agregar</button>    
        <div class="boton">
        <?php echo $this->Html->link('Regresar', array('action' => 'index')); ?> 
        </div>           
    </form>


<!--     <div class="title"><h2>Acciones</h2>
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
    </div> -->
</div>
</div>
</div>