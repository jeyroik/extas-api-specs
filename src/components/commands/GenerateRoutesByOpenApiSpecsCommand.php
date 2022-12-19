<?php
namespace extas\components\commands;

use extas\components\crawlers\CrawlerSpecs;
use extas\components\crawlers\CrawlerStorage;
use extas\components\generators\RouteGenerator;
use extas\interfaces\commands\IHaveConfigOptions;
use extas\interfaces\routes\IRoute;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateRoutesByOpenApiSpecsCommand extends Command implements IHaveConfigOptions
{
    use THasConfigOptions;

    public const OPTION__SAVE_PATH = 'save_path';
    public const OPTION__TEMPLATE_PATH = 'template_path';

    public const FIELD__API_SPECS = 'open_api_specs';

    /**
     * Configure the current command.
     */
    protected function configure()
    {
        $this
            ->setName('generate-by-open-api')
            ->setAliases(['g'])
            ->setDescription('Generate routes dispatchers by Open Api specs')
            ->setHelp('This command allows you to generate classed for routes dispatchhers by Open Api Specs.')
            ->addOption(
                static::OPTION__SAVE_PATH,
                's',
                InputOption::VALUE_OPTIONAL,
                'Path to save generated dispatchers',
                getcwd() . '/resources/routes'
            )
            ->addOption(
                static::OPTION__TEMPLATE_PATH,
                't',
                InputOption::VALUE_OPTIONAL,
                'Path with templates',
                getcwd() . '/resources'
            )
        ;

        $this->attachConfigOptions();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|mixed
     * @throws
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start = time();

        $c = new CrawlerStorage(
            $input->getOption(static::OPTION__CFG_APP_FILENAME),
            $input->getOption(static::OPTION__CFG_PCKGS_FILENAME)
        );
        list($app, $packages) = $c(getcwd());

        $packages[] = $app;

        $g = new RouteGenerator([
            RouteGenerator::FIELD__SAVE_PATH => $input->getOption(static::OPTION__SAVE_PATH),
            RouteGenerator::FIELD__TEMPLATE_PATH => $input->getOption(static::OPTION__TEMPLATE_PATH)
        ]);

        $routes = [];

        foreach ($packages as $package) {
            if (!isset($package[static::FIELD__API_SPECS])) {
                continue;
            }
            $routeSpecs = $package[static::FIELD__API_SPECS];
            
            $routes = array_merge($routes, $g($routeSpecs));
        }

        /**
         * @var IRoute[] $routes
         */
        foreach ($routes as $r) {
            $output->writeln(['+ Generate dispatcher for route ' . $r->getName()]);
        }

        $end = time() - $start;
        $output->writeln(['Done in ' . $end . ' s.']);

        return 0;
    }
}
