<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProducts extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('products');
        $table
            ->addColumn('nome', 'string', [
                'limit' => 255,
                'null' => false,
                'default' => null,
            ])        
            ->addColumn('descricao', 'text', [
                'null' => false,
                'default' => null,
            ])        
            ->addColumn('valor_compra', 'double', [
                'null' => false,
                'default' => null,
            ])
            ->addColumn('valor_venda', 'double', [
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('valor_locacao', 'double', [
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('estoque_min', 'double', [
                'null' => false,
                'default' => null,
            ])                                            
            ->addColumn('estoque', 'double', [
                'null' => false,
                'default' => null,
            ])   
            ->addColumn('unidade', 'double', [
                'null' => false,
                'default' => null,
            ])            
            ->addColumn('foto', 'string', [
                'limit' => 512,
                'null' => true,
                'default' => null,
            ])                     
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('deleted', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addIndex(['nome'])
            ->addIndex(['valor_compra'])
            ->addIndex(['valor_venda'])
            ->addIndex(['valor_locacao'])
            ->addIndex(['estoque'])
            ->addIndex(['created'])
            ->addIndex(['modified'])
            ->addIndex(['deleted'])            
            ->create();
    }
}
