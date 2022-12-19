<?php
namespace tests\api;

use extas\components\commands\GenerateRoutesByOpenApiSpecsCommand;
use extas\components\console\TSnuffConsole;
use extas\components\extensions\TExtendable;
use extas\components\repositories\TSnuffRepository;
use extas\interfaces\commands\IHaveConfigOptions;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * Class InstallCommandTest
 *
 * @author jeyroik <jeyroik@gmail.com>
 */
class RouteGeneratorTest extends TestCase
{
    use TSnuffConsole;
    use TSnuffRepository;
    use TExtendable;

    protected string $basePath = '';

    protected function setUp(): void
    {
        putenv("EXTAS__CONTAINER_PATH_STORAGE_LOCK=vendor/jeyroik/extas-foundation/resources/container.dist.json");
        $this->buildBasicRepos();
    }

    protected function tearDown(): void
    {
        $this->dropDatabase(__DIR__);
        $this->deleteRepo('plugins');
        $this->deleteRepo('extensions');
        $this->deleteRepo('routes');
        $this->deleteRepo('routesSpecs');
    }

    protected function getSubjectForExtension(): string
    {
        return time();
    }

    public function testSpecsInstall()
    {  
        $this->buildRepo(__DIR__ . '/../../vendor/jeyroik/extas-foundation/resources/', [
            'routes' => [
                'namespace' => 'tests\\tmp',
                'item_class' => 'extas\\components\\routes\\Route',
                'pk' => 'id',
                'aliases' => ['apiSpecs'],
                'code' => [
                    'create-before' => '\\extas\\components\\UUID::setUuid($item, "id");'
                ]
            ]
        ]);

        $this->buildRepo(__DIR__ . '/../../vendor/jeyroik/extas-foundation/resources/', [
            'routesSpecs' => [
                'namespace' => 'tests\\tmp',
                'item_class' => 'extas\\components\\api\\specs\\RouteSpec',
                'pk' => 'id',
                'aliases' => ['apiSpecs'],
                'code' => [
                    'create-before' => '\\extas\\components\\UUID::setUuid($item, "id");'
                ]
            ]
        ]);

        /**
         * @var BufferedOutput $output
         */
        $output = $this->getOutput(true);
        $input = $this->getInput([
            IHaveConfigOptions::OPTION__CFG_APP_FILENAME => 'extas.app.storage.test.json',
            IHaveConfigOptions::OPTION__CFG_PCKGS_FILENAME => 'extas.storage.test.json',
            GenerateRoutesByOpenApiSpecsCommand::OPTION__SAVE_PATH => __DIR__ . '/../tmp',
            GenerateRoutesByOpenApiSpecsCommand::OPTION__TEMPLATE_PATH => __DIR__ . '/../../resources',
        ]);

        $command = new GenerateRoutesByOpenApiSpecsCommand();

        $command->run($input, $output);
        $outputText = $output->fetch();

        $this->assertStringContainsString('/test/', $outputText, print_r($outputText, true));

        $specs = $this->apiSpecs()->all([]);

        $this->assertCount(1, $this->routes()->allAsArray([]));
        $this->assertCount(1, $specs);

        unlink(__DIR__ . '/../tmp/RouteOasexample.php');
    }
}
