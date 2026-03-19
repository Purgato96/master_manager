<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Manager API - Documentation</title>
    <link href="https://unpkg.com/swagger-ui-dist@5.17.14/swagger-ui.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .swagger-ui .topbar { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); }
    </style>
</head>
<body>
    <div id="swagger-ui" class="swagger-ui"></div>

    <script src="https://unpkg.com/swagger-ui-dist@5.17.14/swagger-ui-standalone-preset.js"></script>
    <script src="https://unpkg.com/swagger-ui-dist@5.17.14/swagger-ui-bundle.js"></script>
    <script>
        window.onload = function() {
            const ui = SwaggerUIBundle({
                spec: {
                    openapi: '3.0.0',
                    info: {
                        title: 'Master Manager API',
                        version: '1.0.0',
                        description: 'Production API Aggregator - api.basedopurga.com.br'
                    },
                    servers: [{ url: 'https://api.basedopurga.com.br/api' }],
                    paths: {
                        '/auth/register': {
                            post: {
                                summary: 'Register new API Client',
                                requestBody: {
                                    content: {
                                        'application/json': {
                                            schema: {
                                                type: 'object',
                                                properties: {
                                                    name: { type: 'string', example: 'My App' },
                                                    email: { type: 'string', example: 'app@company.com' }
                                                }
                                            }
                                        }
                                    }
                                },
                                responses: {
                                    '200': {
                                        description: 'API Key created',
                                        content: {
                                            'application/json': {
                                                schema: {
                                                    type: 'object',
                                                    properties: {
                                                        message: { type: 'string' },
                                                        api_key: { type: 'string' }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        '/data-items': {
                            get: {
                                summary: 'List collected data items',
                                parameters: [{
                                    name: 'X-API-KEY',
                                    in: 'header',
                                    required: true,
                                    schema: { type: 'string' }
                                }],
                                responses: { '200': { description: 'Success' } }
                            }
                        }
                    },
                    components: {
                        securitySchemes: {
                            'api_key': {
                                type: 'apiKey',
                                in: 'header',
                                name: 'X-API-KEY'
                            }
                        }
                    }
                },
                dom_id: '#swagger-ui',
                presets: [SwaggerUIBundle.presets.apis, SwaggerUIStandalonePreset],
                layout: 'StandaloneLayout'
            });
        };
    </script>
</body>
</html>
