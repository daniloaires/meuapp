<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCashFlows extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('cash_flows');
        $table
            ->addColumn('descricao', 'string', [
                'limit' => 255,
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
