<template>
  <div class="group bg-white/70 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all border border-slate-200/50 dark:border-slate-700/50 hover:-translate-y-1">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">{{ title }}</p>
        <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ value }}</p>
        <p :class="['text-sm font-medium mt-1', change.startsWith('+') ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400']">
          {{ change }} desde ontem
        </p>
      </div>
      <div class="text-3xl">{{ icon }}</div>
    </div>
  </div>
</template>

<script setup lang="ts">
interface Props {
  title: string
  value: string
  change: string
  color?: string
  icon: string
}

defineProps<Props>()
</script>
