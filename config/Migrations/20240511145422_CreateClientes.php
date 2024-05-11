<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateClientes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('clientes');
        $table
            ->addColumn('nome', 'string', [
                'limit' => 255,
                'default' => null,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'limit' => 255,
                'default' => null,
                'null' => true,
            ])
            ->addColumn('rg', 'string', [
                'limit' => 20,
                'default' => null,
                'null' => true,
            ])
            ->addColumn('cpf', 'string', [
                'limit' => 20,
                'default' => null,
                'null' => true,
            ])              
            ->addColumn('cnpj', 'string', [
                'limit' => 40,
                'default' => null,
                'null' => true,
            ])               
            ->addColumn('inscricao_municipal', 'string', [
                'limit' => 40,
                'default' => null,
                'null' => true,
            ])                                                       
            ->addColumn('inscricao_estadual', 'string', [
                'limit' => 40,
                'default' => null,
                'null' => true,
            ])            
            ->addColumn('telefone_fixo', 'string', [
                'limit' => 20,
                'default' => null,
                'null' => true,
            ])
            ->addColumn('telefone_celular', 'string', [
                'limit' => 20,
                'default' => null,
                'null' => true,
            ])
            ->addColumn('telefone_comercial', 'string', [
                'limit' => 20,
                'default' => null,
                'null' => true,
            ])            
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'null' => false,
            ])            
            ->addIndex(['nome'])
            ->addIndex(['email'])
            ->addIndex(['rg'])
            ->addIndex(['cpf'])
            ->addIndex(['cnpj'])
            ->addIndex(['inscricao_municipal'])
            ->addIndex(['inscricao_estadual'])
            ->addIndex(['created'])
            ->addIndex(['modified'])
            ->addIndex(['deleted'])
            ->create();
    }
}
