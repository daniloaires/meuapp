<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateOrders extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('orders');
        $table
            ->addColumn('nome', 'string', [
                'limit' => 512,
                'default' => null,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'limit' => 2,
                'default' => null,
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
            ->addIndex('nome')
            ->addIndex('status')
            ->addIndex('created')
            ->addIndex('modified')
            ->addIndex('deleted')            
            ->create();
    }
}
