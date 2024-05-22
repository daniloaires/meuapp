<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSectors extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('sectors');
        $table
            ->addColumn('name', 'string', [
                'limit' => 255,
                'null' => false,
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
            ->addIndex(['name'])
            ->addIndex(['created'])
            ->addIndex(['modified'])
            ->addIndex(['deleted'])            
            ->create();
    }
}
