<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'valor_compra' => 1,
                'valor_venda' => 1,
                'valor_locacao' => 1,
                'estoque_min' => 1,
                'estoque' => 1,
                'unidade' => 1,
                'foto' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-05-26 17:24:56',
                'modified' => '2024-05-26 17:24:56',
                'deleted' => '2024-05-26 17:24:56',
            ],
        ];
        parent::init();
    }
}
