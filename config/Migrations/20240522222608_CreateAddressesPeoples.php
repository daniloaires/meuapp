<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAddressesPeoples extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('addresses_peoples');
        $table
            ->addColumn('cep', 'string', [
                'limit' => 50,
                'null' => false,
                'default' => null,
            ])        
            ->addColumn('tipo', 'string', [
                'limit' => 50,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('logradouro', 'string', [
                'limit' => 512,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('numero', 'string', [
                'limit' => 50,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('complemento', 'string', [
                'limit' => 80,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('bairro', 'string', [
                'limit' => 256,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('cidade', 'string', [
                'limit' => 256,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('uf', 'string', [
                'limit' => 2,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('people_id', 'integer', [
                'limit' => 3,
                'null' => false,
                'default' => null,
            ])
            ->addIndex(['cep'])
            ->addIndex(['uf'])
            ->addForeignKey('people_id', 'peoples', 'id')
            ->create();
    }
}
