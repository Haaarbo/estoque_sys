<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntradasEstoqueTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntradasEstoqueTable Test Case
 */
class EntradasEstoqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EntradasEstoqueTable
     */
    protected $EntradasEstoque;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.EntradasEstoque',
        'app.Produtos',
        'app.Fornecedors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EntradasEstoque') ? [] : ['className' => EntradasEstoqueTable::class];
        $this->EntradasEstoque = $this->getTableLocator()->get('EntradasEstoque', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EntradasEstoque);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EntradasEstoqueTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EntradasEstoqueTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
