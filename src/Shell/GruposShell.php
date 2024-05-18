<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\Controller\ComponentRegistry;
use Acl\Controller\Component\AclComponent;

class GruposShell extends Shell
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Acl = new AclComponent(new ComponentRegistry());
    }

    public function main(): void
    {
        $this->out('Comando "acl" não especificado.');
    }

    public function acl()
    {
        $this->out('Definindo permissões do ACL...');

        // Inicializa nós de ACL
        $this->initializeAcos();

        // Permite aos admins fazer tudo
        $this->grantPermission(1, 'controllers'); // ID 1 para admin

        // Permite aos gerentes acessar posts e widgets
        $this->denyPermission(2, 'controllers'); // ID 2 para gerente
        $this->grantPermission(2, ['controllers/Clientes']);

        // Permite aos usuários apenas adicionar ou editar os posts e widgets
        $this->denyPermission(3, 'controllers'); // ID 3 para usuários
        $this->grantPermission(3, ['controllers/Clientes/index', 'controllers/Clientes/view']);

        $this->out('Permissões do ACL definidas com sucesso.');
    }

    private function grantPermission($roleId, $resources)
    {
        if (is_array($resources)) {
            foreach ($resources as $resource) {
                $this->Acl->allow(['model' => 'Roles', 'foreign_key' => $roleId], $resource);
            }
        } else {
            $this->Acl->allow(['model' => 'Roles', 'foreign_key' => $roleId], $resources);
        }
        $this->out("Permissões concedidas para o papel $roleId nos recursos: " . (is_array($resources) ? implode(', ', $resources) : $resources));
    }

    private function denyPermission($roleId, $resources)
    {
        if (is_array($resources)) {
            foreach ($resources as $resource) {
                $this->Acl->deny(['model' => 'Roles', 'foreign_key' => $roleId], $resource);
            }
        } else {
            $this->Acl->deny(['model' => 'Roles', 'foreign_key' => $roleId], $resources);
        }
        $this->out("Permissões negadas para o papel $roleId nos recursos: " . (is_array($resources) ? implode(', ', $resources) : $resources));
    }

    private function initializeAcos()
    {
        $this->out('Inicializando nós de ACL...');

        // Obtenha a tabela Acos
        $Acos = TableRegistry::getTableLocator()->get('Acos');

        // Crie nós de exemplo
        $controllers = ['Clientes'];
        foreach ($controllers as $controller) {
            $parent = $Acos->node('controllers');
            if (!$parent) {
                $parent = $Acos->newEntity(['parent_id' => null, 'alias' => 'controllers']);
                $Acos->save($parent);
            }
            $node = $Acos->node('controllers/' . $controller);
            if (!$node) {
                $node = $Acos->newEntity(['parent_id' => $parent->id, 'alias' => $controller]);
                $Acos->save($node);
            }

            $actions = ['index', 'view', 'add', 'edit', 'delete'];
            foreach ($actions as $action) {
                $actionNode = $Acos->node('controllers/' . $controller . '/' . $action);
                if (!$actionNode) {
                    $actionNode = $Acos->newEntity(['parent_id' => $node->id, 'alias' => $action]);
                    $Acos->save($actionNode);
                }
            }
        }
        $this->out('Nós de ACL inicializados.');
    }
}
