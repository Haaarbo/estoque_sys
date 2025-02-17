<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstoqueAtualTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstoqueAtualTable Test Case
 */
class EstoqueAtualTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstoqueAtualTable
     */
    protected $EstoqueAtual;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.EstoqueAtual',
        'app.Produtos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EstoqueAtual') ? [] : ['className' => EstoqueAtualTable::class];
        $this->EstoqueAtual = $this->getTableLocator()->get('EstoqueAtual', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EstoqueAtual);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EstoqueAtualTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EstoqueAtualTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
