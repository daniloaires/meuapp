<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table
            ->addColumn('name', 'string', [
                'limit' => 255,
                'null' => false,
                'default' => null,
            ])        
            ->addColumn('username', 'string', [
                'limit' => 255,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('password', 'string', [
                'limit' => 512,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('role_id', 'integer', [
                'limit' => 11,
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
            ->addIndex(['username'])
            ->addIndex(['created'])
            ->addIndex(['modified'])
            ->addIndex(['deleted'])            
            ->create();

        // Inserção do usuário inicial com a senha '123456' criptografada
        $passwordHash = password_hash('123456', PASSWORD_DEFAULT);
        $data = [
            'name' => 'Administrador',
            'username' => 'admin',
            'password' => $passwordHash,
            'role_id' => 1,
        ];

        $this->table('users')->insert($data)->save();
    }
    
    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
