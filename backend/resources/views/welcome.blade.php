<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Manager API</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #7c3aed 50%, #ec4899 100%);
            min-height: 100vh;
            color: white;
            line-height: 1.6;
        }
        .container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; }
        .hero { text-align: center; padding: 4rem 0; }
        .badge {
            display: inline-flex; align-items: center; padding: 0.75rem 1.5rem;
            background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2); border-radius: 50px;
            font-weight: 500; margin-bottom: 2rem; animation: pulse 2s infinite;
        }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.7} }
        h1 {
            font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 800;
            background: linear-gradient(135deg, white, #bfdbfe); 
            -webkit-background-clip: text; background-clip: text;
            -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;
        }
        .subtitle {
            font-size: 1.25rem; max-width: 600px; margin: 0 auto 3rem;
            opacity: 0.9; font-weight: 300;
        }
        .btn {
            display: inline-flex; align-items: center; padding: 1rem 2rem;
            font-weight: 600; text-decoration: none; border-radius: 12px;
            transition: all 0.3s ease; margin: 0.5rem; min-height: 56px;
        }
        .btn-primary {
            background: white; color: #1e40af; box-shadow: 0 10px 30px rgba(255,255,255,0.3);
        }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 20px 40px rgba(255,255,255,0.4); }
        .btn-secondary {
            border: 2px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }
        .btn-secondary:hover { border-color: white; background: rgba(255,255,255,0.2); }
        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px,1fr)); gap: 2rem; margin: 5rem 0; }
        .feature-card {
            background: rgba(255,255,255,0.1); backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2); border-radius: 24px;
            padding: 2.5rem 2rem; text-align: center; transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px); background: rgba(255,255,255,0.2);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }
        .feature-icon {
            width: 64px; height: 64px; margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #10b981, #3b82f6); border-radius: 16px;
            display: flex; align-items: center; justify-content: center; font-size: 1.5rem;
        }
        .feature-title { font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; }
        .stats { 
            display: grid; grid-template-columns: repeat(auto-fit, minmax(150px,1fr));
            gap: 2rem; margin: 4rem 0; text-align: center; font-size: 1.25rem; font-weight: 700;
        }
        .footer { text-align: center; opacity: 0.8; font-size: 0.95rem; }
        @media (max-width: 768px) {
            .hero { padding: 2rem 0; }
            h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Hero -->
        <section class="hero">
            <div class="badge">
                🚀 API Agregador em Desenvolvimento
            </div>
            <h1>Master Manager</h1>
            <p class="subtitle">
                Coletor e fornecedor de dados via RESTful API. 
                APIs externas → PostgreSQL → Sua API pronta.
            </p>
            <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:1rem;">
                <a href="/api/docs" class="btn btn-primary">📖 API Docs</a>
                <a href="https://github.com/Purgato96/master_manager" target="_blank" class="btn btn-secondary">⭐ GitHub</a>
            </div>
        </section>

        <!-- Features -->
        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h2 class="feature-title">Coleta Automática</h2>
                <p>APIs externas via Scheduler + Redis Queues. Sempre atualizado.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🗄️</div>
                <h2 class="feature-title">PostgreSQL</h2>
                <p>JSONB + índices otimizados. Escala pra milhões de registros.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔗</div>
                <h2 class="feature-title">RESTful API</h2>
                <p>Sanctum auth, Resources JSON, Rate limiting incluso.</p>
            </div>
        </section>

        <!-- Stack -->
        <section class="stats">
            <div>Laravel 12</div>
            <div>Vue 3 + Tailwind</div>
            <div>Docker Compose</div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            Feito com ❤️ por <a href="https://github.com/Purgato96" style="color:#bfdbfe;">@Purgato96</a> | {{ date('Y') }}
        </footer>
    </div>
</body>
</html>
