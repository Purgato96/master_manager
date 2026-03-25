<template>
  <div class="space-y-3">
    <div v-for="api in apis" :key="api.id" class="flex items-center p-3 bg-gradient-to-r from-blue-50/50 to-indigo-50/50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl">
      <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-sm mr-3">{{ api.icon }}</div>
      <div class="flex-1 min-w-0">
        <p class="font-medium truncate">{{ api.name }}</p>
        <p class="text-xs text-slate-500 dark:text-slate-400">{{ api.status }}</p>
      </div>
      <span class="px-2 py-1 bg-green-100 dark:bg-green-900/50 text-xs font-medium text-green-800 dark:text-green-200 rounded-full">{{ api.requests }} req/h</span>
    </div>
  </div>
</template>

<script setup lang="ts">
const apis = [
  { id: 1, icon: 'G', name: 'GitHub API', status: '🟢 Online', requests: 245 },
  { id: 2, icon: 'W', name: 'Weather API', status: '🟢 Online', requests: 189 },
  { id: 3, icon: 'N', name: 'News API', status: '🟢 Online', requests: 156 },
  { id: 4, icon: 'C', name: 'Crypto API', status: '🟡 Warning', requests: 89 },
  { id: 5, icon: 'S', name: 'Stripe API', status: '🟢 Online', requests: 312 }
]
</script>
