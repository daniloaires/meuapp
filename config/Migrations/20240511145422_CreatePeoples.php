<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePeoples extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('peoples');
        $table
            ->addColumn('tipo', 'integer', [
                'limit' => 2,
                'default' => null,
                'null' => false,
            ])        
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
            ->addColumn('email_sec', 'string', [
                'limit' => 255,
                'default' => null,
                'null' => true,
            ])   
            ->addColumn('email_terc', 'string', [
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
            ->addIndex(['email_sec'])
            ->addIndex(['email_terc'])
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
