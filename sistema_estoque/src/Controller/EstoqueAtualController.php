<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EstoqueAtual Controller
 *
 * @property \App\Model\Table\EstoqueAtualTable $EstoqueAtual
 */
class EstoqueAtualController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->EstoqueAtual->find()
            ->contain(['Produtos']);
        $estoqueAtual = $this->paginate($query);

        $this->set(compact('estoqueAtual'));
    }

    /**
     * View method
     *
     * @param string|null $id Estoque Atual id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estoqueAtual = $this->EstoqueAtual->get($id, contain: ['Produtos']);
        $this->set(compact('estoqueAtual'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estoqueAtual = $this->EstoqueAtual->newEmptyEntity();
        if ($this->request->is('post')) {
            $estoqueAtual = $this->EstoqueAtual->patchEntity($estoqueAtual, $this->request->getData());
            if ($this->EstoqueAtual->save($estoqueAtual)) {
                $this->Flash->success(__('The estoque atual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estoque atual could not be saved. Please, try again.'));
        }
        $produtos = $this->EstoqueAtual->Produtos->find('list', limit: 200)->all();
        $this->set(compact('estoqueAtual', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estoque Atual id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estoqueAtual = $this->EstoqueAtual->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estoqueAtual = $this->EstoqueAtual->patchEntity($estoqueAtual, $this->request->getData());
            if ($this->EstoqueAtual->save($estoqueAtual)) {
                $this->Flash->success(__('The estoque atual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estoque atual could not be saved. Please, try again.'));
        }
        $produtos = $this->EstoqueAtual->Produtos->find('list', limit: 200)->all();
        $this->set(compact('estoqueAtual', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estoque Atual id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estoqueAtual = $this->EstoqueAtual->get($id);
        if ($this->EstoqueAtual->delete($estoqueAtual)) {
            $this->Flash->success(__('The estoque atual has been deleted.'));
        } else {
            $this->Flash->error(__('The estoque atual could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
