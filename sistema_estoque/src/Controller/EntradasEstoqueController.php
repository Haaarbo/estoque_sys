<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EntradasEstoque Controller
 *
 * @property \App\Model\Table\EntradasEstoqueTable $EntradasEstoque
 */
class EntradasEstoqueController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->EntradasEstoque->find()
            ->contain(['Produtos', 'Fornecedors']);
        $entradasEstoque = $this->paginate($query);

        $this->set(compact('entradasEstoque'));
    }

    /**
     * View method
     *
     * @param string|null $id Entradas Estoque id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entradasEstoque = $this->EntradasEstoque->get($id, contain: ['Produtos', 'Fornecedors']);
        $this->set(compact('entradasEstoque'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entrada = $this->Entradas->newEmptyEntity();

        if ($this->request->is('post')) {
            $entrada = $this->Entradas->patchEntity($entrada, $this->request->getData());

            // Atualizar estoque
            $produto = $this->Produtos->get($entrada->produto_id);
            $estoque = $this->EstoqueAtual->find()->where(['produto_id' => $entrada->produto_id])->first();

            if ($estoque) {
                $estoque->quantidade_atual += $entrada->quantidade;
                $this->EstoqueAtual->save($estoque);
            } else {
                $this->EstoqueAtual->save(['produto_id' => $entrada->produto_id, 'quantidade_atual' => $entrada->quantidade]);
            }

            if ($this->Entradas->save($entrada)) {
                $this->Flash->success(__('Entrada de estoque realizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao realizar a entrada de estoque.'));
        }
        $clientes = $this->Entradas->Clientes->find('list');
        $this->set(compact('entrada', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Entradas Estoque id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entradasEstoque = $this->EntradasEstoque->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entradasEstoque = $this->EntradasEstoque->patchEntity($entradasEstoque, $this->request->getData());
            if ($this->EntradasEstoque->save($entradasEstoque)) {
                $this->Flash->success(__('The entradas estoque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entradas estoque could not be saved. Please, try again.'));
        }
        $produtos = $this->EntradasEstoque->Produtos->find('list', limit: 200)->all();
        $fornecedors = $this->EntradasEstoque->Fornecedors->find('list', limit: 200)->all();
        $this->set(compact('entradasEstoque', 'produtos', 'fornecedors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entradas Estoque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entradasEstoque = $this->EntradasEstoque->get($id);
        if ($this->EntradasEstoque->delete($entradasEstoque)) {
            $this->Flash->success(__('The entradas estoque has been deleted.'));
        } else {
            $this->Flash->error(__('The entradas estoque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
