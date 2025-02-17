<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SaidasEstoque Controller
 *
 * @property \App\Model\Table\SaidasEstoqueTable $SaidasEstoque
 */
class SaidasEstoqueController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->SaidasEstoque->find()
            ->contain(['Produtos', 'Clientes']);
        $saidasEstoque = $this->paginate($query);

        $this->set(compact('saidasEstoque'));
    }

    /**
     * View method
     *
     * @param string|null $id Saidas Estoque id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saidasEstoque = $this->SaidasEstoque->get($id, contain: ['Produtos', 'Clientes']);
        $this->set(compact('saidasEstoque'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saida = $this->Saidas->newEmptyEntity();

        if ($this->request->is('post')) {
            $saida = $this->Saidas->patchEntity($saida, $this->request->getData());

            // Atualizar estoque
            $produto = $this->Produtos->get($saida->produto_id);
            $estoque = $this->EstoqueAtual->find()->where(['produto_id' => $saida->produto_id])->first();

            if ($estoque && $estoque->quantidade_atual >= $saida->quantidade) {
                $estoque->quantidade_atual -= $saida->quantidade;
                $this->EstoqueAtual->save($estoque);
            } else {
                $this->Flash->error(__('Estoque insuficiente para a saída.'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Saidas->save($saida)) {
                $this->Flash->success(__('Saída de estoque realizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao realizar a saída de estoque.'));
        }
        $fornecedores = $this->Saidas->Fornecedores->find('list');
        $this->set(compact('saida', 'fornecedores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Saidas Estoque id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saidasEstoque = $this->SaidasEstoque->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saidasEstoque = $this->SaidasEstoque->patchEntity($saidasEstoque, $this->request->getData());
            if ($this->SaidasEstoque->save($saidasEstoque)) {
                $this->Flash->success(__('The saidas estoque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saidas estoque could not be saved. Please, try again.'));
        }
        $produtos = $this->SaidasEstoque->Produtos->find('list', limit: 200)->all();
        $clientes = $this->SaidasEstoque->Clientes->find('list', limit: 200)->all();
        $this->set(compact('saidasEstoque', 'produtos', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Saidas Estoque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saidasEstoque = $this->SaidasEstoque->get($id);
        if ($this->SaidasEstoque->delete($saidasEstoque)) {
            $this->Flash->success(__('The saidas estoque has been deleted.'));
        } else {
            $this->Flash->error(__('The saidas estoque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
