<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEmployees extends AbstractMigration
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
            ->addColumn('estado_civil', 'integer', [
                'limit' => 2,
                'null' => true,
                'default' => null,
            ])
            ->addColumn('qtde_filhos', 'integer', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('sexo', 'integer', [
                'limit' => 2,
                'null' => true,
                'default' => null,
            ])
            ->addColumn('nacionalidade', 'integer', [
                'limit' => 2, 
                'null' => true,
                'default' => null,
            ])
            ->addColumn('dt_nascimento', 'date', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('modalidade_contrato', 'integer', [
                'limit' => 2,
                'null' => true,
                'default' => null,
            ])            
            ->addColumn('remuneracao', 'double', [
                'null' => true,
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
            ->addIndex(['remuneracao'])
            ->addIndex(['modalidade_contrato'])
            ->addIndex(['created'])
            ->addIndex(['modified'])
            ->addIndex(['deleted'])
            ->create();
    }
}
