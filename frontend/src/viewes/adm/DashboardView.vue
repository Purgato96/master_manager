<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-200 dark:from-slate-900 dark:to-slate-800 text-slate-900 dark:text-slate-100 transition-all duration-300">
    <!-- Header -->
    <header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm border-b border-slate-200/50 dark:border-slate-700/50 sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
          <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
            Master Manager
          </h1>
          <span class="px-3 py-1 bg-green-100 dark:bg-green-900/50 text-green-800 dark:text-green-200 text-xs font-medium rounded-full">
            API Aggregator Live
          </span>
        </div>
        <div class="flex items-center space-x-4">
          <button @click="toggleDarkMode" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
            <svg class="w-5 h-5" :class="darkMode ? 'text-yellow-400' : 'text-slate-600'" fill="currentColor" viewBox="0 0 20 20">
              <path :d="darkMode ? 'M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z' : 'M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zm-1 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM3 7a1 1 0 011-1h1a1 1 0 110 2H4a1 1 0 01-1-1zm12.95-.732a.993.993 0 00-.227-.242A5.002 5.002 0 0010 6.5c-.5 0-.997.074-1.47.217a.993.993 0 00-.242.228l-.74.74a.993.993 0 00-.228.242A5.002 5.002 0 005.5 10c0 .5.074.997.217 1.47a.993.993 0 00.228.242l.74.74c.078.078.172.146.282.204A5.002 5.002 0 0010 13.5c.5 0 .997-.074 1.47-.217a.993.993 0 00.242-.228l.74-.74c.078-.078.146-.172.204-.282A5.002 5.002 0 0014.5 10c0-.5-.074-.997-.217-1.47z'"/>
            </svg>
          </button>
        </div>
      </div>
    </header>

    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 lg:grid-cols-4 gap-8">
      <!-- Metrics Cards -->
      <div class="lg:col-span-3 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <MetricCard title="Total Requests" value="124.5k" change="+12.3%" color="green" icon="📊" />
          <MetricCard title="Uptime 24h" value="99.98%" change="+0.02%" color="emerald" icon="🟢" />
          <MetricCard title="Avg Latency" value="148ms" change="-4.2%" color="purple" icon="⚡" />
          <MetricCard title="Active APIs" value="47" change="+2" color="blue" icon="🔗" />
          <MetricCard title="Error Rate" value="0.12%" change="-0.05%" color="red" icon="❌" />
          <MetricCard title="Data Processed" value="2.4TB" change="+28%" color="indigo" icon="💾" />
        </div>

        <!-- Charts Row -->
        <!-- Charts Row - SVG NATIVO SEM COMPONENTS -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
          <!-- Requests Chart -->
          <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-slate-200/50 dark:border-slate-700/50">
            <h3 class="text-lg font-semibold mb-6 text-center">Requests Over Time</h3>
            <div class="h-[280px] flex flex-col justify-between">
              <svg viewBox="0 0 320 120" class="w-full h-64 mx-auto">
                <polyline points="20,85 92,60 164,35 236,55 308,40"
                          fill="none" stroke="#8b5cf6" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                          stroke-dasharray="800" stroke-dashoffset="800" class="animate-spark"/>
                <circle cx="308" cy="40" r="6" fill="#ec4899" class="animate-pulse"/>
              </svg>
              <div class="grid grid-cols-2 gap-4 text-sm mt-4">
                <div class="text-center"><span class="font-bold text-lg text-purple-600">170</span><br/><span class="text-xs text-slate-500">Peak</span></div>
                <div class="text-center"><span class="font-bold text-lg text-pink-600">160</span><br/><span class="text-xs text-slate-500">Atual</span></div>
              </div>
            </div>
          </div>

          <!-- Latency Chart -->
          <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-slate-200/50 dark:border-slate-700/50">
            <h3 class="text-lg font-semibold mb-6 text-center">Latency & Errors</h3>
            <div class="h-[280px] flex flex-col justify-between">
              <svg viewBox="0 0 320 120" class="w-full h-64 mx-auto">
                <polyline points="20,95 92,75 164,45 236,85 308,65"
                          fill="none" stroke="#10b981" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                          stroke-dasharray="800" stroke-dashoffset="800" class="animate-spark"/>
                <circle cx="308" cy="65" r="6" fill="#059669" class="animate-pulse"/>
              </svg>
              <div class="grid grid-cols-2 gap-4 text-sm mt-4">
                <div class="text-center"><span class="font-bold text-lg text-emerald-600">180ms</span><br/><span class="text-xs text-slate-500">Máx</span></div>
                <div class="text-center"><span class="font-bold text-lg text-emerald-600">148ms</span><br/><span class="text-xs text-slate-500">Atual</span></div>
              </div>
            </div>
          </div>
        </div>


        <!-- Activity Log -->
        <ActivityLog />
      </div>

      <!-- APIs Table Sidebar -->
      <div class="lg:col-span-1 space-y-6">
        <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-slate-200/50 dark:border-slate-700/50">
          <h3 class="text-lg font-semibold mb-4 flex items-center">
            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
            Top APIs Ativas
          </h3>
          <ApiTable />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import MetricCard from '@/components/MetricCard.vue'
import ApiTable from '@/components/ApiTable.vue'
import ActivityLog from '@/components/ActivityLog.vue'

// Dark mode
const darkMode = ref<boolean>(false)

const toggleDarkMode = (): void => {
  darkMode.value = !darkMode.value
  if (darkMode.value) {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }
  localStorage.setItem('darkMode', darkMode.value.toString())
}

onMounted(() => {
  const saved = localStorage.getItem('darkMode')
  darkMode.value = saved === 'true'
  if (darkMode.value) {
    document.documentElement.classList.add('dark')
  }
})
</script>

<style scoped>
.animate-spark {
  animation: draw 2s ease-out forwards;
}

@keyframes draw {
  to { stroke-dashoffset: 0; }
}
</style>
