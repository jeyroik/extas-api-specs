<?php
namespace extas\interfaces\api;

interface IRouteGenerator
{
    public const FIELD__SAVE_PATH = 'save_path';
    public const FIELD__TEMPLATE_PATH  = 'template_path';

    public const PROP__GENERATION = 'generation';
    public const GEN__NAMESPACE = 'namespace';
    public const GEN__NAME = 'name';
    public const GEN__TABLE = 'table';
    public const GEN__OPERATION = 'operation';
    public const GEN__DISPATCHER = 'dispatcher';
    public const GEN__CODE = 'code';
    public const CODE__EXE_BEFORE = 'execute-before';
    public const CODE__EXE_BEFORE_RESPONSE = 'execute-before-response';
    public const CODE__EXE_AFTER = 'execute-after';
    public const CODE__EXE_ERROR = 'execute-error';
    public const CODE__HELP_BEFORE = 'help-before';
    public const CODE__HELP_AFTER = 'help-after';
    public const CODE__USE_HEAD = 'use-head';
    public const CODE__USE_CLASS = 'use-class';
    public const CODE__METHODS = 'methods';

    public const PROP__ROUTE = 'route';

    public const PROP__SPECS = 'specs';
    public const SPECS__COMPONENTS = 'components';
    public const COMPONENTS__SCHEMAS = 'schemas';
    
    public const SPECS__PROPERTIES = 'properties';

    public const SPECS__SCHEMA = 'schema';
    public const SCHEMA__TYPE = 'type';
    public const TYPE__OBJECT = 'object';
    public const TYPE__STRING = 'string';
    public const TYPE__INTEGER = 'integer';

    public const SCHEMA__DESCRIPTION = 'description';
    public const SCHEMA__SIZE = 'size';
    public const SCHEMA__MIN = 'minimum';
    public const SCHEMA__MAX = 'maximum';

    public const SCHEMA__FORMAT = 'format';
    public const FORMAT__INT_32 = 'int32';
    public const FORMAT__INT_64 = 'int64';

    public const SCHEMA__EXAMPLE = 'example';

    public const SCHEMA__IN = 'in';
    public const IN__BODY = 'body';
    public const IN__QUERY = 'query';
    public const IN__HEADER = 'header';
    public const IN__PATH = 'path';

    public const SCHEMA__REQUIRED = 'required';
    public const SPECS__REQUEST = 'request';
    public const SPECS__RESPONSES = 'responses';

    public const SCHEMA__CONTENT = 'content';
    public const CONTENT__JSON = 'application/json';

    public const SCHEMA__REF = '$ref';

    public function __invoke(array $routeSpecs): array;
}
