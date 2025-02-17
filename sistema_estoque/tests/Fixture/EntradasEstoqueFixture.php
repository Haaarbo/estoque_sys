<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EntradasEstoqueFixture
 */
class EntradasEstoqueFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'entradas_estoque';
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
                'produto_id' => 1,
                'quantidade' => 1,
                'data_entrada' => '2025-02-17',
                'valor_total' => 1.5,
                'fornecedor_id' => 1,
            ],
        ];
        parent::init();
    }
}
