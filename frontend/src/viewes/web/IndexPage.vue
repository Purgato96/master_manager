<template>
  <div class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 text-white overflow-x-hidden">
    <!-- Navbar -->
    <nav class="container mx-auto px-6 py-6 sticky top-0 z-50 backdrop-blur-md bg-white/5 border-b border-white/10">
      <div class="flex justify-between items-center">
        <div class="text-3xl font-black bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent drop-shadow-lg">
          Master Manager
        </div>
        <div class="hidden md:flex items-center space-x-8">
          <a href="/dashboard" class="text-lg font-semibold hover:text-blue-300 transition-all duration-300 group">
            Dashboard
            <span class="block h-0.5 bg-blue-400 w-0 group-hover:w-full transition-all duration-300 mt-1"></span>
          </a>
          <a href="http://localhost:8000/api/docs" target="_blank" 
            class="text-lg font-semibold hover:text-blue-300 transition-all duration-300 group">
            API Docs
            <span class="block h-0.5 bg-blue-400 w-0 group-hover:w-full transition-all duration-300 mt-1"></span>
          </a>
          <a href="https://github.com/Purgato96/master_manager" 
            target="_blank" 
            class="bg-white/10 backdrop-blur-md px-6 py-3 rounded-2xl font-semibold hover:bg-white/20 hover:shadow-2xl transition-all duration-300 border border-white/20 hover:border-white/30">
            ⭐ GitHub Repo
          </a>
        </div>
        <!-- Mobile menu -->
        <div class="md:hidden">
          <button class="text-2xl">☰</button>
        </div>
      </div>
    </nav>

    <!-- Hero -->
    <section class="container mx-auto px-6 py-24 text-center">
      <div class="inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-xl rounded-full border border-white/20 mb-12 shadow-2xl animate-pulse">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
        API Agregador de Dados - Em Desenvolvimento
      </div>
      
      <h1 class="text-6xl md:text-8xl font-black bg-gradient-to-r from-white via-blue-100 to-purple-200 bg-clip-text text-transparent mb-8 leading-none drop-shadow-2xl">
        <span>Dados de</span>
        <br>
        <span class="text-7xl">Múltiplas APIs
        </span>
      </h1>
      
      <p class="text-xl md:text-2xl text-white/90 max-w-4xl mx-auto mb-16 leading-relaxed opacity-95">
        Coleta automática → PostgreSQL otimizado → RESTful API escalável para seus clientes e integrações
      </p>
      
      <div class="flex flex-col lg:flex-row gap-6 justify-center items-center mb-24">
        <a href="/dashboard" 
          class="group relative inline-flex items-center px-12 py-6 bg-white text-indigo-900 font-black text-xl rounded-3xl hover:shadow-3xl hover:scale-[1.05] transition-all duration-500 shadow-2xl overflow-hidden">
          <span class="relative z-10 flex items-center">
            🚀 Acessar Dashboard
            <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </span>
          <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-xl -z-10"></div>
        </a>
        
        <a href="http://localhost:8000/api/docs" target="_blank"
          class="inline-flex items-center px-12 py-6 border-2 border-white/30 bg-white/10 backdrop-blur-xl rounded-3xl text-xl font-semibold hover:bg-white/20 hover:border-white/50 hover:shadow-2xl transition-all duration-300">
          📖 API Documentation
        </a>
      </div>

      <!-- Live Stats -->
      <div class="grid md:grid-cols-3 gap-8 max-w-3xl mx-auto mb-24">
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
          <div class="text-4xl font-black text-emerald-400 mb-2">🟢 100%</div>
          <div class="text-lg opacity-90">API Online</div>
        </div>
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
          <div class="text-4xl font-black text-blue-400 mb-2">12+</div>
          <div class="text-lg opacity-90">Fontes Conectadas</div>
        </div>
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
          <div class="text-4xl font-black text-purple-400 mb-2">150K+</div>
          <div class="text-lg opacity-90">Registros Armazenados</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="container mx-auto px-6 pb-32">
      <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-12 items-center">
          <div class="lg:col-span-1 text-center lg:text-left mb-16 lg:mb-0 order-2 lg:order-1">
            <h2 class="text-5xl font-black bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent mb-8 drop-shadow-xl">
              O futuro da<br> 
              <span class="text-transparent bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text">integração de APIs
              </span>
            </h2>
            <p class="text-2xl text-white/80 leading-relaxed max-w-lg">
              Uma única API. Múltiplas fontes. Zero complicação.
            </p>
          </div>
          
          <div class="lg:col-span-2 space-y-8 order-1 lg:order-2">
            <!-- Feature 1 -->
            <div class="group bg-white/5 backdrop-blur-xl rounded-4xl p-10 border border-white/10 hover:bg-white/10 hover:shadow-3xl hover:scale-[1.02] transition-all duration-500 cursor-pointer">
              <div class="flex items-start lg:items-center space-x-6">
                <div class="w-20 h-20 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 border-2 border-emerald-500/30 rounded-3xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                  <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                  </svg>
                </div>
                <div class="flex-1">
                  <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-blue-300 transition-colors">Coleta Automática</h3>
                  <p class="text-xl text-white/90 leading-relaxed">Scheduler inteligente com Redis queues. Deduplicação e validação automática de dados.</p>
                </div>
              </div>
            </div>

            <!-- Feature 2 -->
            <div class="group bg-white/5 backdrop-blur-xl rounded-4xl p-10 border border-white/10 hover:bg-white/10 hover:shadow-3xl hover:scale-[1.02] transition-all duration-500 cursor-pointer">
              <div class="flex items-start lg:items-center space-x-6">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border-2 border-blue-500/30 rounded-3xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                  <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4S17.21 3 16 3H8c-2.21 0-4 1.79-4 4z"/>
                  </svg>
                </div>
                <div class="flex-1">
                  <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-blue-300 transition-colors">PostgreSQL Turbo</h3>
                  <p class="text-xl text-white/90 leading-relaxed">JSONB nativo + índices GIN otimizados. Milhões de registros com queries em milissegundos.</p>
                </div>
              </div>
            </div>

            <!-- Feature 3 -->
            <div class="group bg-white/5 backdrop-blur-xl rounded-4xl p-10 border border-white/10 hover:bg-white/10 hover:shadow-3xl hover:scale-[1.02] transition-all duration-500 cursor-pointer">
              <div class="flex items-start lg:items-center space-x-6">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500/20 to-pink-500/20 border-2 border-purple-500/30 rounded-3xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                  <svg class="w-10 h-10 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="flex-1">
                  <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-blue-300 transition-colors">API Profissional</h3>
                  <p class="text-xl text-white/90 leading-relaxed">Sanctum auth, API Resources, Rate limiting, CORS global. Pronta pra produção internacional.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Footer -->
    <footer class="bg-white/3 backdrop-blur-xl border-t border-white/10 py-16">
      <div class="container mx-auto px-6 text-center">
        <h3 class="text-4xl font-black mb-8 bg-gradient-to-r from-emerald-400 to-teal-500 bg-clip-text text-transparent">
          Pronto para transformar suas APIs?
        </h3>
        <a href="/dashboard" 
          class="inline-flex items-center px-12 py-6 bg-gradient-to-r from-emerald-500 via-teal-500 to-emerald-600 text-white font-black text-xl rounded-3xl hover:shadow-3xl hover:scale-105 transition-all duration-500 shadow-2xl">
          🚀 Entrar no Dashboard
          <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
        <p class="mt-12 text-xl text-white/60">
          Feito com ❤️ por 
          <a href="https://github.com/Purgato96" class="hover:text-blue-300 font-semibold">@Purgato96</a> 
          | {{ new Date().getFullYear() }}
        </p>
        <p class="mt-4 text-white/40 text-lg">Laravel 12 • Vue 3 • PostgreSQL • Docker • Redis</p>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
// SEM SCRIPT! Zero dependências
</script>
