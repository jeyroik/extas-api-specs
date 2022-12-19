<?php

use extas\components\generators\RouteGenerator as i;
use extas\interfaces\routes\IRoute;

return [
    "tables" => [
        "routes_specs" => [
            "namespace" => "repositories",
            "item_class" => "\\extas\\components\\api\\scpecs\\OpenApiSpec",
            "pk" => "id",
            "aliases" => ["routesSpecs"],
            "code" => [
                "create-before" => '\\extas\\components\\UUID::setUuid($item, "id");'
            ]
        ]
    ],
    "open_api_specs" => [
        [
            i::PROP__GENERATION => [
                i::GEN__NAME => "test",
                i::GEN__OPERATION => "create",
                i::GEN__TABLE => "tests",
                i::GEN__NAMESPACE => "routes",
                i::GEN__DISPATCHER => "\\extas\\components\\routes\\dispatchers\\JsonDispatcher",
                i::GEN__CODE => [
                    i::CODE__EXE_BEFORE => "//execute-before",
                    i::CODE__EXE_BEFORE_RESPONSE => "//execute-before-response",
                    i::CODE__EXE_AFTER => "//execute-after",
                    i::CODE__EXE_ERROR => "//execute-error",
                    i::CODE__HELP_BEFORE => "//help-before",
                    i::CODE__HELP_AFTER => "//help-after",
                    i::CODE__USE_HEAD => "//use-head:\nuse \\extas\\interfaces\\api\\specs\\IRouteSpec;",
                    i::CODE__USE_CLASS => "//use-class",
                    i::CODE__METHODS => '$CWD/resources/where.php'
                ],
            ],
            i::PROP__ROUTE => [
                IRoute::FIELD__NAME => "/test/",
                IRoute::FIELD__TITLE => "Test route",
                IRoute::FIELD__DESCRIPTION => "Route for tests",
                IRoute::FIELD__METHOD => "post",
            ],
            i::PROP__SPECS => [
                i::SPECS__COMPONENTS => [
                    i::COMPONENTS__SCHEMAS => [
                        "Test" => [
                            i::SCHEMA__TYPE => i::TYPE__OBJECT,
                            i::SPECS__PROPERTIES => [
                                "id" => [
                                    i::SCHEMA__DESCRIPTION => "Identificator, UUID",
                                    i::SCHEMA__TYPE => i::TYPE__STRING,
                                    i::SCHEMA__SIZE => 36
                                ],
                                "name" => [
                                    i::SCHEMA__DESCRIPTION => "Test name",
                                    i::SCHEMA__TYPE => i::TYPE__STRING,
                                    i::SCHEMA__MIN => 1,
                                    i::SCHEMA__MAX => 64
                                ]
                            ]
                        ],
                        "ErrorBadRequest" => [
                            i::SCHEMA__TYPE => i::TYPE__OBJECT,
                            i::SPECS__PROPERTIES => [
                                "error" => [
                                    i::SCHEMA__DESCRIPTION => "Error information",
                                    i::SCHEMA__TYPE => i::TYPE__OBJECT,
                                    i::SPECS__PROPERTIES => [
                                        "code" => [
                                            i::SCHEMA__DESCRIPTION => "Error code",
                                            i::SCHEMA__TYPE => i::TYPE__INTEGER,
                                            i::SCHEMA__FORMAT => i::FORMAT__INT_32,
                                            i::SCHEMA__EXAMPLE => -4041
                                        ],
                                        "message" => [
                                            i::SCHEMA__DESCRIPTION => "Error message",
                                            i::SCHEMA__TYPE => i::TYPE__STRING,
                                            i::SCHEMA__EXAMPLE => "Invalid data"
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                i::SPECS__REQUEST => [
                    i::SCHEMA__DESCRIPTION => "Create Test",
                    i::SCHEMA__CONTENT => [
                        i::CONTENT__JSON => [
                            i::SPECS__SCHEMA => [
                                i::SCHEMA__TYPE => i::TYPE__OBJECT,
                                i::SPECS__PROPERTIES => [
                                    "name" => [
                                        i::SCHEMA__DESCRIPTION => "",
                                        i::SCHEMA__IN => i::IN__BODY,
                                        i::SCHEMA__REQUIRED => true,
                                        i::SPECS__SCHEMA => [
                                            i::SCHEMA__TYPE => i::TYPE__STRING,
                                            i::SCHEMA__MIN => 1,
                                            i::SCHEMA__MAX => 64
                                        ],
                                        i::SCHEMA__EXAMPLE => "any text"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                i::SPECS__RESPONSES => [
                    "200" => [
                        i::SCHEMA__DESCRIPTION => "Return Test object",
                        i::SCHEMA__CONTENT => [
                            i::CONTENT__JSON => [
                                i::SPECS__SCHEMA => [
                                    i::SCHEMA__REF => "#/components/schemas/Test"
                                ]
                            ]
                        ]                        
                    ],
                    "400" => [
                        i::SCHEMA__REF => "#/components/schemas/ErrorBadRequest"
                    ]
                ]
            ]
        ]
    ]
];
