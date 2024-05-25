<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEmployees extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('employees');
        $table
            ->addColumn('nome', 'string', [
                'limit' => 255,
                'default' => null,
                'null' => false,
            ])
            ->addColumn('cpf', 'string', [
                'limit' => 14,
                'default' => null,
                'null' => false,
            ])
            ->addColumn('rg', 'string', [
                'limit' => 20,
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
            ->addColumn('estado_civil', 'integer', [
                'limit' => 2,
                'null' => true,
                'default' => null,
            ])
            ->addColumn('qtde_filhos', 'integer', [
                'null' => false,
                'default' => null,
            ])
            ->addColumn('sexo', 'integer', [
                'limit' => 2,
                'null' => false,
                'default' => null,
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
            ->addColumn('nacionalidade', 'integer', [
                'limit' => 2, 
                'null' => false,
                'default' => null,
            ])
            ->addColumn('dt_nascimento', 'date', [
                'null' => false,
                'default' => null,
            ])
            ->addColumn('funcao', 'string', [
                'limit' => 255,
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('sector_id', 'integer', [
                'limit' => 3,
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('modalidade_contrato', 'integer', [
                'limit' => 2,
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('remuneracao', 'double', [
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('obs', 'text', [
                'null' => true,
                'default' => null,
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
                'null' => true,
            ])            
            ->addIndex(['nome'])
            ->addIndex(['cpf'])
            ->addIndex(['rg'])
            ->addIndex(['funcao'])
            ->addIndex(['sector_id'])
            ->addIndex(['remuneracao'])
            ->addIndex(['modalidade_contrato'])
            ->addIndex(['created'])
            ->addIndex(['modified'])
            ->addIndex(['deleted'])
            ->addForeignKey('sector_id', 'sectors', 'id')
            ->create();
    }
}
