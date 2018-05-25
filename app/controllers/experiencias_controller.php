<?php

class ExperienciasController extends AppController {

    var $name = 'Experiencias';    
    /**
     * No implementado 
     */
    function index() {        
        
    }
    /**
     * Eliminar la experiencia de ID
     * @param type $id Id de la experiencia
     */
    function delete($id) {
        $empleadoid = $this->Experiencia->find('first', array(
            'conditions' => array(
                'Experiencia.id' => $id),
            'fields' => array(
                'Experiencia.empleado_id')
                ));
        if ($this->Experiencia->delete($id)) {
            $this->Session->setFlash('Se ha eliminado con exito', 'flash_success');
            $this->redirect('edit/' . $empleadoid['Experiencia']['empleado_id']);
        }
    }
    /**
     * Mostrar listado de todas las previas experiencias que posee el empleado id
     * @param type $id Id del empleado
     */
    function edit($id = null) {
        if (empty($this->data)) {
            $this->paginate = array(
                'Experiencia' => array(
                    'conditions' => array(
                        'empleado_id' => $id),
                    'limit' => 20,
                    'order' => array(
                        'Experiencia.FECHA_INI' => 'desc')
                )
            );
            $experiencias = $this->paginate('Experiencia');
            $empleado = $this->Experiencia->Empleado->find('first',array(
                'conditions'=>array(
                    'Empleado.id'=>$id
                ),
                'contain'=>array(
                    'Grupo'
                )
            ));            
            $this->set(compact('experiencias', 'empleado'));
        }
    }
    /**
     * Agregamos una nueva experiencia para el empleado (empleadoId)
     */
    function add() {
        $this->set("empleadoId",$this->params['named']['empleadoId']);
        if (!empty($this->data)) {
            if ($this->Experiencia->save($this->data['Experiencia'])) {
                $this->Session->setFlash('Experiencia agregado con exito', 'flash_success');
                $this->redirect('edit/' . $this->data['Experiencia']['empleado_id']);
            }
            if (!empty($this->Experiencia->errorMessage)) {
                $this->Session->setFlash($this->Experiencia->errorMessage, 'flash_error');
            } else {
                $this->Session->setFlash("Existen errores corrigalos antes de continuar", 'flash_error');
            }
        }
    }
}
?>