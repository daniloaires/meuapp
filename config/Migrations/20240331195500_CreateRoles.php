<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateRoles extends AbstractMigration
{
    public function up()
    {
        // Criação da tabela roles
        $this->table('roles')
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
        
        // Inserção dos dados iniciais
        $data = [
            ['id' => 1, 'name' => 'Administrador'],
            ['id' => 2, 'name' => 'Gerente'],
            ['id' => 3, 'name' => 'Usuário'],
        ];
        
        $this->table('roles')->insert($data)->save();
    }
    
    public function down()
    {
        // Exclusão da tabela roles
        $this->table('roles')->drop()->save();
    }
}
