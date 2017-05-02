<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController
{

    public function index()
    {
        
    }

    public function edit()
    {
        if ( !$this->Settings->exists(0) ) {
            $setting = $this->Settings->newEntity();
        } else {
            $setting = $this->Settings->get(0, ['contain' => []]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {            
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());
            if ($this->Settings->save($setting)) {
                $this->Flash->success("Salvo com sucesso", ['plugin' => 'Template']);
            } else {
                $this->Flash->error('Não foi possível guardar a definição.', ['plugin' => 'Template']);                
            }
        }        
        $version = $this->Settings->checkUpdate();
        if($version){
            $this->Flash->error("Atualize para a última versão($version).", ['plugin' => 'Template']);
        }
        $this->set(compact('setting','version'));
        $this->set('_serialize', ['setting']);
        $this->render("Settings/edit");
    }


    public function update(){
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->update()){
                $this->Flash->success("Atualizado com sucesso!", ['plugin' => 'Template']);
            } else {
                $this->Flash->error("Não foi possivel atualizar!", ['plugin' => 'Template']);
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setting = $this->Settings->get($id);
        if ($this->Settings->delete($setting)) {
            $this->Flash->success(__('Deletado com sucesso.'), ['plugin' => 'Template']);
        } else {
            $this->Flash->error(__('Não foi apagar guardar a definição.'), ['plugin' => 'Template']);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function debug()
    {
        
    }
}
