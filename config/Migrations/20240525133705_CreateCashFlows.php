<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Phinx\Db\Action\AddIndex;

class CreateCashFlows extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('cash_flows');
        $table
            ->addColumn('descricao', 'string', [
                'limit' => 512,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('valor', 'double', [
                'null' => false,
                'default' => null,
            ]) 
            ->addColumn('tipo', 'integer', [
                'limit' => 2,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('forma_pagto', 'integer', [
                'limit' => 2,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('data', 'date', [
                'null' => false,
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
            ->addIndex('descricao')
            ->addIndex('valor')
            ->addIndex('tipo')
            ->addIndex('data')
            ->addIndex('forma_pagto')
            ->addIndex('created')
            ->addIndex('modified')
            ->addIndex('deleted')            
            ->create();
    }
}
