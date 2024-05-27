<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateOrderItems extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('order_items');
        $table
            ->addColumn('order_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('product_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('qtde', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('valor', 'double', [
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
            ->addIndex('created')
            ->addIndex('modified')
            ->addIndex('deleted')            
            ->addForeignKey('order_id', 'orders', 'id')
            ->addForeignKey('product_id', 'products', 'id')
            ->create();
    }
}
