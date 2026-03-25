<template>
  <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-slate-200/50 dark:border-slate-700/50">
    <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
    <div class="space-y-3 max-h-80 overflow-y-auto">
      <div v-for="log in logs" :key="log.id" class="flex items-start space-x-3 p-3 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-xl transition-colors">
        <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
        <div>
          <p class="font-medium">{{ log.message }}</p>
          <p class="text-xs text-slate-500 dark:text-slate-400">{{ log.time }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const logs = [
  { id: 1, message: 'Nova API agregada: OpenAI', time: '2 min ago' },
  { id: 2, message: 'Cache atualizado - 1.2k keys', time: '5 min ago' },
  { id: 3, message: 'Rate limit reset: GitHub', time: '12 min ago' },
  { id: 4, message: 'Backup PostgreSQL concluído', time: '1h ago' },
  { id: 5, message: 'Latency spike detectado em Weather API', time: '2h ago' }
]
</script>
