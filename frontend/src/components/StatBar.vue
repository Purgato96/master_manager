<template>
  <div class="space-y-1">
    <div class="flex items-center text-xs font-medium text-slate-600 dark:text-slate-400">
      <div class="w-2 h-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mr-2"></div>
      {{ label }}
    </div>
    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2 overflow-hidden">
      <div class="h-full rounded-full transition-all duration-1000 bg-gradient-to-r from-purple-500 to-pink-600" :style="{ width: value + '%' }"></div>
    </div>
    <span class="text-xs font-bold text-slate-900 dark:text-white">{{ value }}</span>
  </div>
</template>

<script setup lang="ts">
interface Props {
  label: string
  value: number
  color?: string
}

defineProps<Props>()
</script>
