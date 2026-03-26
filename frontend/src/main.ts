import { createApp } from 'vue'
import { createPinia } from 'pinia'

import '@/assets/main.css'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.component('MetricCard', () => import('./components/MetricCard.vue'))
app.component('ApiTable', () => import('./components/ApiTable.vue'))
app.component('ActivityLog', () => import('./components/ActivityLog.vue'))

app.use(createPinia())
app.use(router)

app.mount('#app')
