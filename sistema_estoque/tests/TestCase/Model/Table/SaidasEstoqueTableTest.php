<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaidasEstoqueTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaidasEstoqueTable Test Case
 */
class SaidasEstoqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaidasEstoqueTable
     */
    protected $SaidasEstoque;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.SaidasEstoque',
        'app.Produtos',
        'app.Clientes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SaidasEstoque') ? [] : ['className' => SaidasEstoqueTable::class];
        $this->SaidasEstoque = $this->getTableLocator()->get('SaidasEstoque', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SaidasEstoque);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SaidasEstoqueTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SaidasEstoqueTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
