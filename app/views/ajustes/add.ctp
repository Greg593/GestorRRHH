<script type="text/javascript">        
    function setVisibility() {
        if(document.getElementById('final').style.display != 'none'){
            document.getElementById('final').style.display = 'none';
            document.getElementById('boton_actual').setAttribute("class", "");
            document.getElementById('AjusteAJUSTEAÑOFIN').value="";
            document.getElementById('AjusteAJUSTEMESFIN').value="";
            document.getElementById('AjusteQUINCENAFIN').value="";
            
        }else{
            document.getElementById('final').style.display = 'inline';
            document.getElementById('boton_actual').setAttribute("class", "disabled");
        }        
    }        
</script>
<div class="box">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box">
    <div class="title"><h2>Quincena en la que inicia</h2>
        <?php echo $this->Html->image("title-hide.gif", array('class' => 'toggle')); ?>
    </div>
    <div class="content form">
        <?php
        echo $this->Form->create('Ajuste', array('url' => array('controller' => 'ajustes', 'action' => 'add', 'empleadoId:' . $empleadoId)));
        echo $this->Form->input('empleado_id', array('value' => $empleadoId, 'type' => 'hidden'));

        echo "<div class='row'>";
        echo "<div style='float:left;width:30%;'>";
        $options = array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio'
            , '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
        echo $this->Form->input('AJUSTE_MES_INICIO', array('div' => false, 'label' => 'Mes', 'class' => 'small', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione el Opcion'));
        echo "</div>";

        echo "<div style='float:left;width:30%;'>";
        echo $this->Form->input('AJUSTE_AÑO_INICIO', array('div' => false, 'label' => 'Año', 'class' => 'small'));
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div style='float:left;width:40%'>";
        $options = array('Primera' => 'Primera', 'Segunda' => 'Segunda');
        echo $this->Form->input('QUINCENA_INICIO', array('div' => false, 'label' => 'Quincena', 'class' => 'small', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione una opcion'));
        echo "</div>";
        echo "</div>";
        ?>
    </div>    
</div>

<div class="box">    
    <div class="title"><h2>Quincena en la que Finaliza</h2>
        <?php echo $this->Html->image("title-hide.gif", array('class' => 'toggle')); ?>
    </div>
    <div class="content form">
        <div class="row">
            <div class="boton">                
                <?php echo $this->Form->button('Actual', array('id' => 'boton_actual', 'type' => 'button', 'onClick' => 'setVisibility();')); ?>
            </div>
        </div>
        <div class="row" id="final" style="display: none">
            <?php
            echo "<div class='row'>";
            echo "<div style='float:left;width:30%;'>";
            $options = array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio'
                , '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
            echo $this->Form->input('AJUSTE_MES_FIN', array('div' => false, 'label' => 'Mes', 'class' => 'small', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione el Opcion'));
            echo "</div>";

            echo "<div style='float:left;width:30%;'>";
            echo $this->Form->input('AJUSTE_AÑO_FIN', array('div' => false, 'label' => 'Año', 'class' => 'small'));
            echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
            echo "<div style='float:left;width:40%'>";
            $options = array('Primera' => 'Primera', 'Segunda' => 'Segunda');
            echo $this->Form->input('QUINCENA_FIN', array('div' => false, 'label' => 'Quincena', 'class' => 'small', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione una opcion'));
            echo "</div>";
            echo "</div>";
            ?>
        </div>
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
                <?php echo $this->Html->link('Regresar', array('action' => 'edit', $empleadoId)); ?>
            </div>
        </div>        
    </div>
</div>