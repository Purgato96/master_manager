<template>
  <div class="bg-white/70 dark:bg-slate-800/70 backdrop-blur-md rounded-2xl p-6 shadow-xl border border-slate-200/50 dark:border-slate-700/50">
    <h3 class="text-lg font-semibold mb-6">{{ title }}</h3>
    <div class="w-full h-[300px] relative"> <!-- Container com altura fixa -->
      <canvas ref="chartRef" class="w-full h-full"></canvas>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import Chart from 'chart.js/auto'

interface Props {
  title: string
  type: 'line' | 'bar'
}

const props = withDefaults(defineProps<Props>(), {
  title: 'Chart',
  type: 'line'
})

const chartRef = ref<HTMLCanvasElement>()
let chartInstance: Chart | null = null

onMounted(() => {
  if (!chartRef.value) return
  const ctx = chartRef.value.getContext('2d')
  if (!ctx) return

  chartInstance = new Chart(ctx, {
    type: props.type,
    data: {
      labels: ['00h', '04h', '08h', '12h', '16h', '20h', '24h'],
      datasets: [{
        label: props.title,
        data: props.type === 'line' ? [120, 135, 145, 130, 155, 170, 160] : [180, 165, 155, 170, 140, 135, 148],
        borderColor: '#8b5cf6',
        backgroundColor: 'rgba(139, 92, 246, 0.1)',
        tension: 0.4,
        borderWidth: 3,
        fill: true
      }]
    },
    options: {
      responsive: true,
    interaction: {
      intersect: false,
      mode: 'index'
    },
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: 'rgba(0,0,0,0.8)',
        titleColor: 'white',
        bodyColor: 'white'
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        grid: { color: 'rgba(0,0,0,0.05)' },
        ticks: { color: '#64748b' }
      },
      x: {
        grid: { display: false },
        ticks: { color: '#64748b' }
      }
    },
    animation: {
      duration: 1200
    }
  }
})
})

onUnmounted(() => {
  if (chartInstance) {
    chartInstance.destroy()
  }
})
</script>
