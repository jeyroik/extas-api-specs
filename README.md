![tests](https://github.com/jeyroik/extas-api-specs/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-api-specs/coverage.svg?branch=master)
<a href="https://github.com/phpstan/phpstan"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat" alt="PHPStan Enabled"></a>

<a href="https://github.com/jeyroik/extas-installer/" title="Extas Installer v3"><img alt="Extas Installer v3" src="https://img.shields.io/badge/installer-v4-green"></a>
[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-api-specs/v)](//packagist.org/packages/jeyroik/extas-q-crawlers)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-api-specs/downloads)](//packagist.org/packages/jeyroik/extas-q-crawlers)
[![Dependents](https://poser.pugx.org/jeyroik/extas-api-specs/dependents)](//packagist.org/packages/jeyroik/extas-q-crawlers)


# description

Extas Open API specs package.

This package allow to generate route dispatchers by Open API Specifications for API, created with `extas-api` package.

# usage

- Define `open_api_specs` section in your `extas.app.storage.json`

```json
{
    "open_api_specs": {
        {
            "generation": {
                "name": "oasExample",    
                "operation": "create",
                "table": "oas_examples",
                "namespace": "routes",
                "dispatcher": "\\extas\\components\\routes\\dispatchers\\JsonDispatcher",
                "code": {
                    "execute-before": "//execute-before",
                    "execute-before-response": "//execute-before-response",
                    "execute-after": "//execute-after",
                    "execute-error": "//execute-error",
                    "help-before": "//help-before",
                    "help-after": "//help-after",
                    "use-head": "//use-head:\nuse \\extas\\interfaces\\api\\specs\\IRouteSpec;",
                    "use-class": "//use-class",
                    "methods": "$CWD/resources/where.php"
                }
            },
            "route": {
                "name": "/test/",
                "title": "Test route",
                "description": "Route for tests",
                "method": "post"
            },
            "specs": {
                "components": {
                    "schemas": {
                        "Test": {
                            "type": "object",
                            "properties": {
                                "id": {
                                    "description": "Identificator, UUID",
                                    "type": "string",
                                    "size": 36
                                },
                                "name": {
                                    "description": "Test name",
                                    "type": "string",
                                    "minimum": 1,
                                    "maximum": 64
                                }
                            }
                        },
                        "ErrorBadRequest": {
                            "type": "object",
                            "properties": {
                                "error": {
                                    "description": "Error information",
                                    "type": "object",
                                    "properties": {
                                        "code": {
                                            "description": "Error code",
                                            "type": "integer",
                                            "format": "int32",
                                            "example": -4041
                                        },
                                        "message": {
                                            "description": "Error message",
                                            "type": "string",
                                            "example": "Invalid data"
                                        }
                                    }
                                }
                            }
                        }
                    }
                },
                "request": {
                    "description": "Create Test",
                    "content": {
                        "application/json": {
                            "schema":{
                                "type": "object",
                                "properties": {
                                    "name": {
                                        "description": "",
                                        "in": "body",
                                        "required": true,                            
                                        "schema": {
                                            "type": "string",
                                            "minimum": 1,
                                            "maximum": 64
                                        },
                                        "example": "any text"
                                    }
                                }
                            }
                        }
                    }
                },
                "response": {
                    "200": {
                        "description": "Return Test object",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/Test"
                                }
                            }
                        }                        
                    },
                    "400": {
                        "$ref": "#/components/schemas/ErrorBadRequest"
                    }
                }
            }
        }
    }
}
```

- Describe dispatcher in the `generation` section.
- Describe your `IRoute` in the `route` section.
- Describe specs in the `specs` section.
- Install it.

```bash
# vendor/bin/extas-api-specs g -s save/path -t templates/path
```

- Use plugin `PluginSpecsCheck` for getting request auto-validation by specs.

// extas.app.storage.json
```json
{
    "plugins": [
        {
            "class": "\\extas\\components\\plugins\\PluginSpecsCheck",
            "stage": ["extas.api.before.create", "extas.api.before.update"]
        }
    ]
}
```