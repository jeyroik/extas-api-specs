<?php
namespace extas\components\generators;

use extas\components\api\specs\RouteSpec;
use extas\components\Item;
use extas\components\routes\Route;
use extas\interfaces\api\IRouteGenerator;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\routes\IRoute;

/**
 * @method IRepository routes()
 * @method IRepository routesSpecs()
 */
class RouteGenerator extends Item implements IRouteGenerator
{
    protected array $hooks = [
        self::CODE__EXE_BEFORE,
        self::CODE__EXE_BEFORE_RESPONSE,
        self::CODE__EXE_AFTER,
        self::CODE__EXE_ERROR,
        self::CODE__HELP_BEFORE,
        self::CODE__HELP_AFTER,
        self::CODE__USE_HEAD,
        self::CODE__USE_CLASS,
        self::CODE__METHODS
    ];
    protected array $placeholders = [];
    protected string $defaultNS = 'extas\\components\\routes';

    public function __invoke(array $routeSpecs): array
    {
        $genenrated = [];

        foreach ($routeSpecs as $rSpec) {
            $genenrated[] = $this->generate($rSpec);
        }

        return $genenrated;
    }

    protected function generate(array $config)
    {
        $this->placeholders = [];

        $template          = file_get_contents($this->getPathTemplate() . '/dispatcher.template');
        $dispatcherContent = $this->prepareContent($template, $config[static::PROP__GENERATION]);
        $dispatcherClass   = $this->prepareClass($dispatcherContent, $config[static::PROP__GENERATION]);       
        $route             = $this->registerRoute($dispatcherClass, $config[static::PROP__ROUTE]);

        $this->registerSpecs($config[static::PROP__ROUTE], $config[static::PROP__SPECS]);

        return $route;
    }

    protected function prepareClass(string $dispatcherContent, array $config): string
    {
        $name = $config[static::GEN__NAME];
        $ns   = $config[static::GEN__NAMESPACE] ?? $this->defaultNS;

        $className = 'Route' . ucfirst($name);
        file_put_contents($this->getSavePath() . '/'.$className .'.php', $dispatcherContent);

        return $ns . '\\' . $className;
    }

    protected function prepareContent(string $template, array $config): string
    {
        $baseInfo  = $this->getCodeForBaseInfo($config);

        /**
         * There may be hook placeholders in the base info.
         * The first step  - input base info.
         * The second step - input hooks info.
         */
        $dispatcherContent = str_replace($this->placeholders, $baseInfo, $template);
        $this->placeholders = [];

        $codeInfo  = $this->getCodeForCode($config);
        $dispatcherContent = str_replace($this->placeholders, $codeInfo, $dispatcherContent);

        return $dispatcherContent;
    }

    protected function registerRoute($dispatcherClassName, $config): IRoute
    {
        return $this->routes()->create(new Route([
            Route::FIELD__NAME => $config[Route::FIELD__NAME],
            Route::FIELD__TITLE => $config[Route::FIELD__TITLE] ?? '',
            Route::FIELD__DESCRIPTION => $config[Route::FIELD__DESCRIPTION] ?? '',
            Route::FIELD__CLASS => $dispatcherClassName,
            Route::FIELD__METHOD => $config[Route::FIELD__METHOD]
        ]));
    }

    protected function registerSpecs(array $config, array $specs): void
    {
        $this->routesSpecs()->create(new RouteSpec([
            RouteSpec::FIELD__NAME => RouteSpec::constructName($config[Route::FIELD__METHOD], $config[Route::FIELD__NAME]),
            RouteSpec::FIELD__SPECS => $specs
        ]));
    }

    protected function getCodeForBaseInfo(array $config): array
    {
        $this->placeholders = array_merge($this->placeholders, [
            '{namespace}',
            '{uc-name}',
            '{name}',
            '{table}',
            '{execute}',
            '{help}',
            '{dispatcher}'
        ]);

        return [
            $config[static::GEN__NAMESPACE],
            ucfirst($config[static::GEN__NAME]),
            $config[static::GEN__NAME],
            $config[static::GEN__TABLE],
            $this->getExecute($config[static::GEN__OPERATION]),
            $this->getHelp(),
            $config[static::GEN__DISPATCHER]
        ];
    }

    protected function getCodeForCode(array $config): array
    {
        $code = [];

        foreach($this->hooks as $hook) {
            $this->placeholders[] = '{' . $hook . '}';
            $code[] = $this->createCode($hook, $config);
        }

        return $code;
    }

    protected function createCode(string $hookName, array $config): string
    {
        if (isset($config[static::GEN__CODE], $config[static::GEN__CODE][$hookName])) {
            $code = str_replace('$CWD', getcwd(), $config[static::GEN__CODE][$hookName]);

            return is_file($code) ? include $code : $code;
        }

        return '';
    }

    protected function getExecute(string $operation): string
    {
        return file_get_contents($this->getPathTemplate() . '/'.$operation.'.template');
    }

    protected function getHelp(): string
    {
        return file_get_contents($this->getPathTemplate() . '/help.template');
    }

    public function getSavePath(): string
    {
        return $this->config[static::FIELD__SAVE_PATH] ?? getcwd() . '/resources/routes';
    }

    public function getPathTemplate(): string
    {
        return $this->config[static::FIELD__TEMPLATE_PATH] ?? '';
    }

    protected function getSubjectForExtension(): string
    {
        return time();
    }
}
