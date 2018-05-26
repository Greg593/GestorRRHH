<div class="ui segment vertical very padded">
<div class="ui container">  
<div class="box">
    <div class="title"><h2>Nominas</h2></div>
    <div class="content pages">
        <div class="row">
            <?php
            echo $this->Form->create(false);
            echo "<div>";
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
            echo $this->Form->input('Fopcion', array('div' => false, 'label' => false, 'class' => 'ui selection dropdown', 'type' => 'select', 'options' => $options, 'empty' => 'Seleccione una Opcion'));
            echo "</div>";
            echo "<div style='float:left;width:20%'>";
            echo $this->Form->label('Año: ');
            echo $this->Form->input('AÑO', array('div' => false, 'label' => false, 'class' => 'ui input'));
            echo "</div>";
            echo "<div style='float:left;width:15%;padding-top:20px'>";
            echo $this->Form->End('Buscar');
            echo "</div>";
            echo "</div>";
            ?>
        </div>
        <div class="box"></div>
        <div class="pagination">
            <?php echo $this->Paginator->prev(null, array(), null, array('class' => 'disabled')); ?>
            <?php echo $this->Paginator->numbers(array('class' => 'disabled', 'separator' => '')); ?>
            <?php echo $this->Paginator->next(null, array(), null, array('class' => 'disabled')); ?>
        </div>

        <table cellpadding="0" cellspacing="0" class="ui celled table">
            <thead>
                <tr>
                    <th></th>  
                    <th style="width:10%;"><?php echo $this->Paginator->sort('Mes', 'FECHA_INI'); ?></th>
                    <th style="width:10%;">Año</th>
                    <th style="width:25%;">Quincena</th>
                    <th style="width:20%;"><?php echo $this->Paginator->sort('Fecha Inicio', 'FECHA_INI'); ?></th>
                    <th style="width:20%;"><?php echo $this->Paginator->sort('Fecha Fin', 'FECHA_FIN'); ?></th>                                        
                    <th style="width:15%; text-align: center"class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($nominas as $nomina):
                    $class = ' class="even"';
                    if ($i++ % 2 == 0) {
                        $class = ' class="odd"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td></td>
                        <td><?php echo $nomina['Nomina']['MES']; ?></td>
                        <td><?php echo $nomina['Nomina']['AÑO']; ?></td>
                        <td><?php echo $nomina['Nomina']['QUINCENA']; ?></td>
                        <td><?php echo fechaElegible($nomina['Nomina']['FECHA_INI']); ?></td>
                        <td><?php echo fechaElegible($nomina['Nomina']['FECHA_FIN']); ?></td>                                                                        
                        <td class="actions">
                            <?php
                            echo $this->Html->image("Button White Info.png", array("alt" => "modificar", 'width' => '18', 'heigth' => '18', 'title' => 'Editar Nomina', 'url' => array('action' => 'edit', $nomina['Nomina']['id'])));
                            echo $this->Html->link($this->Html->image("file_delete.png", array('alt' => 'delete', 'height' => '18', 'width' => '18')), array('controller' => 'Nominas', 'action' => 'delete', $nomina['Nomina']['id']), array('escape' => false), sprintf('Esta seguro que desea eliminar esta Nomina?'));
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>            
        </table>
        <div class="pages-bottom">
            <div class="actionbox">
                <?php
                echo $this->Paginator->counter(array('format' => 'Mostrando %current% Nomina(s), de un total de  %count% Nominas'));
                ?>
            </div>
            <div class="pagination">
                <?php echo $this->Paginator->prev(null, array(), null, array('class' => 'disabled')); ?>
                <?php echo $this->Paginator->numbers(array('class' => 'disabled', 'separator' => '')); ?>
                <?php echo $this->Paginator->next(null, array(), null, array('class' => 'disabled')); ?>
            </div>
        </div>

    </div>
</div>

<div class="box">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box">

    <form action="/GestorRRHH/nominas/add/" id="" method="post" accept-charset="utf-8" class="ui form">
        <button class="ui button fluid teal" type="submit">Nuevo</button>                
    </form>    
<!--     <div class="title">	<h2>Acciones</h2></div>
    <div class="content form">
        <div class="row">
            <div class="boton">
                <?php echo $this->Html->link('Nueva Nomina', array('action' => 'add')); ?>
            </div>
        </div>
    </div> -->
</div>
</div>
</div>