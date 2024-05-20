<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table
            ->addColumn('username', 'string', [
                'limit' => 255,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('password', 'string', [
                'limit' => 256,
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
            ->addPrimaryKey(['id'])
            ->create();

        // Inserção do usuário inicial com a senha '123456' criptografada
        $passwordHash = password_hash('123456', PASSWORD_DEFAULT);
        $data = [
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
