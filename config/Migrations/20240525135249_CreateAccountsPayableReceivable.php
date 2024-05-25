<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAccountsPayableReceivable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('accounts_payable_receivable');
        $table->addColumn('descricao', 'string', [
            'limit' => 255,
            'null' => false,
            'default' => null,
        ]);
        $table->addColumn('valor', 'double', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('tipo', 'integer', [
            'limit' => 2,
            'null' => false,
        ]);
        $table->addColumn('vencimento', 'date', [
            'null' => false,
        ]);
        $table->addColumn('status', 'integer', [
            'limit' => 2,
            'null' => false,
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
        ->addIndex('vencimento')
        ->addIndex('status')
        ->addIndex('created')
        ->addIndex('modified')
        ->addIndex('deleted')            
        ->create();
    }
}
