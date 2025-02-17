<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstoqueAtualFixture
 */
class EstoqueAtualFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'estoque_atual';
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
                'quantidade_atual' => 1,
            ],
        ];
        parent::init();
    }
}
