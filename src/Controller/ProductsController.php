<?php
declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
    
        // Obtenha os parâmetros de pesquisa
        $nome = $this->request->getQuery('nome');
        $descricao = $this->request->getQuery('descricao');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
    
        // Configurar condições de busca
        $conditions = [];
        if (!empty($nome)) {
            $conditions['Products.nome LIKE'] = '%' . $nome . '%';
        }
        if (!empty($descricao)) {
            $conditions['Products.descricao LIKE'] = '%' . $descricao . '%';
        }        
        if (!empty($createdFrom)) {
            $conditions['Products.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['Products.created <='] = $createdTo . ' 23:59:59';
        }
    
        $products = $this->Paginator->paginate($this->Products->find('all', [
            'conditions' => $conditions,
        ]));
    
        $this->set(compact('products'));
    }

    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));
    }

    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
    
            // Processar o upload do arquivo
            $file = $this->request->getData('foto');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                // Definir o caminho de destino
                $uploadPath = WWW_ROOT . 'files' . DS . 'uploads' . DS;
                
                // Verificar se o diretório existe, se não, criar
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }
                
                // Verificar se o diretório é gravável
                if (!is_writable($uploadPath)) {
                    $this->Flash->error(__('O diretório de upload não tem permissões de escrita.'));
                    return $this->redirect(['action' => 'add']);
                }
                
                // Definir o caminho do arquivo
                $destination = $uploadPath . $file->getClientFilename();
                
                // Mover o arquivo para o destino
                $file->moveTo($destination);
                
                // Salvar o caminho relativo do arquivo no banco de dados
                $product->foto = 'uploads/' . $file->getClientFilename();
            }

            // Limpar o valor antes de salvar
            $product->valor_compra = str_replace(['R$', '.', ','], ['', '', '.'], 
                $this->request->getData('valor_compra'));
            $product->valor_venda = str_replace(['R$', '.', ','], ['', '', '.'], 
                $this->request->getData('valor_venda'));
            $product->valor_locacao = str_replace(['R$', '.', ','], ['', '', '.'], 
                $this->request->getData('valor_locacao'));                                
    
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
    
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
    
            // Processar o upload do arquivo
            $file = $this->request->getData('foto');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                // Definir o caminho de destino
                $uploadPath = WWW_ROOT . 'files' . DS . 'uploads' . DS;
                
                // Verificar se o diretório existe, se não, criar
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0775, true);
                }
                
                // Verificar se o diretório é gravável
                if (!is_writable($uploadPath)) {
                    $this->Flash->error(__('O diretório de upload não tem permissões de escrita.'));
                    return $this->redirect(['action' => 'edit', $id]);
                }
                
                // Definir o caminho do arquivo
                $destination = $uploadPath . $file->getClientFilename();
                
                // Remover o arquivo antigo se existir
                if (!empty($product->foto) && file_exists(WWW_ROOT . 'files' . DS . $product->foto)) {
                    unlink(WWW_ROOT . 'files' . DS . $product->foto);
                }
                
                // Mover o novo arquivo para o destino
                $file->moveTo($destination);
                
                // Salvar o caminho relativo do novo arquivo no banco de dados
                $product->foto = 'uploads/' . $file->getClientFilename();
            }

            // Limpar o valor antes de salvar
            $product->valor_compra = str_replace(['R$', '.', ','], ['', '', '.'], 
                $this->request->getData('valor_compra'));
            $product->valor_venda = str_replace(['R$', '.', ','], ['', '', '.'], 
                $this->request->getData('valor_venda'));
            $product->valor_locacao = str_replace(['R$', '.', ','], ['', '', '.'], 
                $this->request->getData('valor_locacao'));             
    
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
    
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        
        if (!$product->foto) {
            $filePath = WWW_ROOT . 'files' . DS . $product->foto;
        }
        
        // Verificar se o arquivo existe antes de tentar excluir
        if (file_exists($filePath)) {
            // Tentar excluir o arquivo
            if (!unlink($filePath)) {
                $this->Flash->error(__('The file could not be deleted. Please, try again.'));
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->Flash->error(__('The file does not exist.'));
        }
        
        // Excluir o produto do banco de dados
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    
}
