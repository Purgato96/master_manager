# Master Manager System

![Laravel](https://img.shields.io/badge/Laravel-13+-red.svg?logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3-green.svg?logo=vuedotjs)
![TypeScript](https://img.shields.io/badge/TypeScript-strict-blue.svg?logo=typescript&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3+-cyan.svg?logo=tailwind-css)
![Docker](https://img.shields.io/badge/Docker-ready-2496ED.svg?logo=docker&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-4169E1.svg?logo=postgresql&logoColor=white)
![Redis](https://img.shields.io/badge/Redis-7-DC2626.svg?logo=redis&logoColor=white)

## 🚀 About The Project

**Master Manager** is a full-stack **API Aggregator** that collects data from multiple external APIs, stores it optimized in PostgreSQL, and provides a scalable RESTful API for your clients.

**Flow:** `External APIs` → `PostgreSQL (JSONB)` → `Your Professional API`

### 🎯 Key Features
- **Automated Collection** via Laravel Scheduler + Redis Queues
- **Optimized PostgreSQL** with JSONB + GIN indexes
- **Secure API Keys** with rate limiting and statistics
- **Admin Dashboard** built with Vue 3 + TailwindCSS
- **Complete Docker Compose** (PostgreSQL, Redis)
- **Scalable** for global production

## 🛠️ Tech Stack

```
Backend: Laravel 13 + PostgreSQL 16 + Redis 7
Frontend: Vue 3 + TypeScript + TailwindCSS + Axios
Infrastructure: Docker Compose + Laravel Sanctum
```

## 🚀 Quick Start (Docker)

```bash
# 1. Clone the project
git clone https://github.com/Purgato96/master_manager.git
cd master_manager

# 2. Configure docker-compose.yml
cp docker-compose.yml.example docker-compose.yml
nano docker-compose.yml
Adjust docker-compose.yml configuration

# 3. Configure .env in the backend/
cp .env.example .env
nano .env
Adjust database configuration equal to docker-composer.yml

# 4. Start everything!
docker compose up -d --build

# 5. Finish setup
docker compose exec backend php artisan key:generate
docker compose exec backend php artisan migrate
```

### 📱 Access Points
| Service | URL |
|---------|-----|
| **Frontend** | http://localhost:3000 |
| **Backend API** | http://localhost:8000 |
| **Admin Dashboard** | http://localhost:3000/admin |


## 🏗️ Architecture

```
┌─────────────────┐
│  External APIs  │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Laravel         │
│ Scheduler       │◄─────┐
└────────┬────────┘      │
         │               │ Cron
         ▼               │
┌─────────────────┐      │
│ Redis Queue     │──────┘
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Data Collector  │
│ Jobs            │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ PostgreSQL      │
│ JSONB Storage   │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ RESTful API     │
│ (Sanctum Auth)  │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Clients/        │
│ Frontend        │
└─────────────────┘
```

## 📁 Project Structure

```
master_manager/
├── backend/                      # Laravel 13 API
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/Api/
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── DataSourceController.php
│   │   │   │   ├── DataItemController.php
│   │   │   │   └── StatsController.php
│   │   │   └── Middleware/
│   │   │       └── VerifyApiKey.php
│   │   ├── Models/
│   │   │   ├── DataSource.php
│   │   │   ├── DataItem.php
│   │   │   └── ApiClient.php
│   │   └── Console/Commands/
│   │       └── FetchExternalData.php
│   ├── database/migrations/
│   ├── routes/
│   │   ├── api.php
│   │   └── web.php
│   ├── bootstrap/app.php
    └── .env
│
├── frontend/                     # Vue 3 + Tailwind
│   ├── src/
│   │   ├── views/
│   │   │   ├── Home.vue
│   │   │   └── admin/
│   │   ├── router/
│   │   │   └── index.ts
│   │   ├── components/
│   │   └── assets/
│   ├──.env
│   ├── tailwind.config.js
│   └── vite.config.ts
│
├── docker-compose.yml
└── README.md
```

## 🔌 Main API Endpoints

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `POST` | `/api/auth/register` | Create new API Key | ❌ |
| `POST` | `/api/auth/login` | Retrieve existing key | ❌ |
| `POST` | `/api/auth/refresh-key` | Rotate API Key | ✅ |
| `GET` | `/api/data-sources` | List data sources | ✅ |
| `GET` | `/api/data-items` | List collected data | ✅ |
| `GET` | `/api/data-items/{id}` | Get specific item | ✅ |
| `GET` | `/api/stats` | Get statistics | ✅ |
| `GET` | `/api/public/data-items` | Public data access | ❌ |


## ⚙️ Environment Configuration

### Backend `.env`
```env
APP_NAME="Master Manager"
APP_ENV=production
APP_KEY=base64:...
APP_DEBUG=false
APP_URL=https://api.yourcompany.com

DB_CONNECTION=pgsql
DB_HOST=database
DB_PORT=5432
DB_DATABASE=masterManager
DB_USERNAME=user
DB_PASSWORD=your_secure_password

REDIS_HOST=redis
REDIS_PORT=6379
QUEUE_CONNECTION=redis

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025

SANCTUM_STATEFUL_DOMAINS=yourcompany.com
SESSION_DOMAIN=.yourcompany.com
```

### Frontend `.env`
```env
VITE_API_URL=https://api.yourcompany.com/api
VITE_APP_URL=https://yourcompany.com
```

## 🚀 Production Deployment

### 1. Build Containers
```bash
docker compose -f docker-compose.prod.yml build
docker compose -f docker-compose.prod.yml up -d
```

### 2. Run Migrations
```bash
docker compose exec backend php artisan migrate --force
docker compose exec backend php artisan db:seed --force
docker compose exec backend php artisan optimize
```

### 3. Start Background Services
```bash
# Queue Worker (jobs)
docker compose exec backend php artisan queue:work --tries=3

# Scheduler (data collection)
docker compose exec backend php artisan schedule:work

# Or use Laravel Horizon for monitoring
docker compose exec backend php artisan horizon
```

### 4. Frontend Build
```bash
docker compose exec frontend npm run build
```

## 🔒 Security Features

- **API Key Authentication** with SHA-256 hashing
- **Rate Limiting** per client (configurable)
- **CORS Configuration** for cross-origin requests
- **Request Counting** for analytics
- **Key Rotation** endpoint for security
- **Active/Inactive Status** for key management

## 📈 Monitoring & Logs

### Check Logs
```bash
# Backend logs
docker compose logs backend --follow

# Queue logs
docker compose logs backend | grep "Processing:"

# Database queries (enable in .env)
DB_LOG_QUERIES=true
```

### Performance Metrics
- Track API requests per client
- Monitor data collection success rates
- PostgreSQL query performance via EXPLAIN
- Redis queue depth

## 🧪 Testing

```bash
# Backend tests
docker compose exec backend php artisan test

# Frontend tests
docker compose exec frontend npm run test

# E2E tests
docker compose exec frontend npm run test:e2e
```

## 🤝 Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'feat: add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Commit Convention
```
feat: new feature
fix: bug fix
docs: documentation changes
style: formatting changes
refactor: code refactoring
test: add tests
chore: maintenance tasks
```

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Matheus Purgato**
- **GitHub:** [@Purgato96](https://github.com/Purgato96)
- **LinkedIn:** [linkedin.com/in/purgato](https://linkedin.com/in/matheus-purgato)


**Full-Stack Developer** | Laravel + Vue.js Specialist
📍 Ribeirão Preto, SP - Brazil

**Stack:** Laravel, Vue.js, TailwindCSS, PostgreSQL, Docker
**Experience:** 6+ years in web development

## 🎯 Project Goals

This project was built as part of my portfolio for:
- **International Client Acquisition**
- **EB-2 NIW Immigration** demonstration
- **SaaS Product Development** showcase
- **Open Source Contribution** to the Laravel ecosystem

## 🙏 Acknowledgments

- Laravel Team for the amazing framework
- Vue.js Community for the reactive ecosystem
- Docker for containerization simplicity
- PostgreSQL for reliable data storage
- TailwindCSS for rapid UI development

---

<div align="center">
  <img src="https://img.shields.io/badge/version-1.0.0-blue.svg" alt="version">
  <img src="https://img.shields.io/badge/status-🚀%20Production%20Ready-green.svg" alt="status">
  <img src="https://img.shields.io/badge/maintained-yes-brightgreen.svg" alt="maintained">
</div>

<div align="center">
  <strong>Built with ❤️ for global clients and EB-2 NIW portfolio! 🌍</strong>
</div>

<div align="center">
  <sub>Star ⭐ this repository if you find it helpful!</sub>
</div>