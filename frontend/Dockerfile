# ---- Stage 1: Build ----
# node:20-slim usa glibc (Debian) ao invés de musl (Alpine)
# Isso evita o bug do rollup: Cannot find module @rollup/rollup-linux-x64-musl
FROM node:20-slim AS builder

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

# ---- Stage 2: Produção ----
FROM nginx:1.27-alpine

# Remove config padrão do nginx
RUN rm /etc/nginx/conf.d/default.conf

# Copia o build do Vue
COPY --from=builder /app/dist /usr/share/nginx/html

# Config para SPA (Vue Router precisa de fallback para index.html)
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
