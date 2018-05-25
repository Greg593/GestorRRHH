<?php

class HistorialesController extends AppController {

    var $name = 'Historiales';
    var $components = array('RequestHandler');
    var $helpers = array('Ajax', 'Javascript');

    function index() {
        $this->Historial->Cargo->Behaviors->attach('Containable');

        $this->paginate = array(
            'limit' => 20,
            'contain' => array(
                'Historial' => array(
                    'conditions' => array(
                        'FECHA_FIN' => NULL))
                ));

        $data = $this->paginate('Cargo');
        $this->set('cargos', $data);
    }

    function delete($id) {
        $cargoid = $this->Historial->find('first', array(
            'conditions' => array(
                'Historial.id' => $id),
            'fields' => array(
                'Historial.cargo_id')
                ));
        if ($this->Historial->delete($id)) {
            $this->Session->setFlash('Se ha eliminado con exito', 'flash_success');
            $this->redirect('edit/' . $cargoid['Historial']['cargo_id']);
        }
    }

    function edit($id = null) {
        if (empty($this->data)) {
            $this->paginate = array(
                'Historial' => array(
                    'recursive' => -1,
                    'conditions' => array(
                        'cargo_id' => $id),
                    'limit' => 20,
                    'order' => array(
                        'Historial.FECHA_INI' => 'asc')
                )
            );
            $this->Historial->Cargo->recursive = -1;
            $historiales = $this->paginate('Historial');
            $cargo = $this->Historial->Cargo->findById($id);
            $this->set(compact('historiales', 'cargo'));
        } else {
            if ($this->Historial->save($this->data)) {
                $this->Session->setFlash('Se ha agregado con exito', 'flash_success');
                $this->redirect('edit/' . $this->data['Historial']['cargo_id']);
            }
            $this->Session->setFlash($this->Historial->errorMessage, 'flash_error');
            $this->redirect('edit/' . $this->data['Historial']['cargo_id']);
        }
    }

    function add() {        
        $this->set("cargoId",$this->params['named']['cargoId']);        
        if (!empty($this->data)) {            
            if ($this->Historial->save($this->data['Historial'])) {
                $this->Session->setFlash('Historial agregado con exito', 'flash_success');
                $this->redirect('edit/' . $this->data['Historial']['cargo_id']);
            }
            if (!empty($this->Historial->errorMessage)) {
                $this->Session->setFlash($this->Historial->errorMessage, 'flash_error');
            } else {
                $this->Session->setFlash("Existen errores corrigalos antes de continuar", 'flash_error');
            }
        }        
    }

    function add_group($id) {
        $grupo = explode(',', $id);
        $this->set("grupo", $grupo);

        if (!empty($this->data)) {
            $error = false;
            $saves=0;
            foreach ($grupo as $value) {
                $this->Historial->create();
                $this->data['Historial']['cargo_id'] = $value;
                if ($this->Historial->save($this->data['Historial'])) {
                    $saves++;
                    //$this->Session->setFlash('Historial agregado con exito', 'flash_success');
                    //$this->redirect('edit/' . $this->data['Historial']['cargo_id']);
                } else {
                    $error=true;
                    if (!empty($this->Historial->errorMessage)) {
                        $this->Session->setFlash($this->Historial->errorMessage, 'flash_error');
                    } else {
                        $this->Session->setFlash("Existen errores corrigalos antes de continuar", 'flash_error');
                    }
                }
            }
            if($error && $saves!=0){
               $this->Session->setFlash("Ocurrio un error que impidio modificar uno o mas Cargos", 'flash_error'); 
            }
            if (!$error || $saves!=0) {               
               $this->redirect('/cargos/grupo/');
            }
        }
    }

}

?>