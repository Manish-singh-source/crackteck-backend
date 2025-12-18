# Crackteck - Infrastructure, Security & Deployment Configuration

## Section 1: Environment Configuration (.env)

```env
# ============= APPLICATION SETTINGS =============
APP_NAME=Crackteck
APP_ENV=production
APP_DEBUG=false
APP_URL=https://crackteck.com
APP_TIMEZONE=Asia/Kolkata

# ============= SECURITY KEYS =============
APP_KEY=base64:YOUR_32_BYTE_BASE64_ENCODED_KEY
CIPHER=AES-256-CBC

# ============= DATABASE CONFIGURATION =============
DB_CONNECTION=mysql
DB_HOST=10.0.1.100
DB_PORT=3306
DB_DATABASE=crackteck_db
DB_USERNAME=app_user
DB_PASSWORD=STRONG_PASSWORD_MIN_32_CHAR
DB_READ_HOST_1=10.0.1.11
DB_READ_HOST_2=10.0.1.12

# Connection Pooling
DB_POOL_MIN=5
DB_POOL_MAX=20

# ============= CACHE CONFIGURATION =============
CACHE_DRIVER=redis
REDIS_HOST=10.0.1.20
REDIS_PASSWORD=REDIS_PASSWORD_MIN_32_CHAR
REDIS_PORT=6379
REDIS_DB=0

# Cache TTL (in seconds)
CACHE_TTL_PRODUCTS=86400
CACHE_TTL_CATEGORIES=86400
CACHE_TTL_ORDERS=3600
CACHE_TTL_SESSION=7200

# ============= SESSION CONFIGURATION =============
SESSION_DRIVER=redis
SESSION_LIFETIME=120
SESSION_ENCRYPT=true
SESSION_SECURE_COOKIES=true
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=lax

# ============= QUEUE CONFIGURATION =============
QUEUE_CONNECTION=redis
QUEUE_TIMEOUT=600
QUEUE_RETRY_ATTEMPTS=3

# ============= MAIL CONFIGURATION =============
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=noreply@crackteck.com
MAIL_PASSWORD=APP_SPECIFIC_PASSWORD
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@crackteck.com
MAIL_FROM_NAME="Crackteck"

# ============= STORAGE CONFIGURATION =============
FILESYSTEM_DISK=s3
FILESYSTEM_VISIBILITY=private

AWS_ACCESS_KEY_ID=YOUR_AWS_ACCESS_KEY
AWS_SECRET_ACCESS_KEY=YOUR_AWS_SECRET_KEY
AWS_DEFAULT_REGION=ap-south-1
AWS_BUCKET=crackteck-uploads
AWS_URL=https://cdn.crackteck.com
AWS_ENDPOINT=https://s3.ap-south-1.amazonaws.com

# ============= JWT AUTHENTICATION =============
JWT_SECRET=YOUR_JWT_SECRET_MIN_32_CHAR
JWT_ALGORITHM=HS256
JWT_EXPIRATION_HOURS=24
JWT_REFRESH_EXPIRATION_DAYS=30

# ============= SANCTUM TOKENS =============
SANCTUM_STATEFUL_DOMAINS=crackteck.com,app.crackteck.com,admin.crackteck.com

# ============= API RATE LIMITING =============
API_RATE_LIMIT_PER_MINUTE=60
API_RATE_LIMIT_PER_HOUR=1000
AUTH_RATE_LIMIT_PER_MINUTE=5
AUTH_RATE_LIMIT_PER_HOUR=50

# ============= THIRD-PARTY INTEGRATIONS =============

# PhonePe Payment Gateway
PHONEPE_MERCHANT_ID=YOUR_MERCHANT_ID
PHONEPE_API_KEY=YOUR_API_KEY
PHONEPE_API_ENDPOINT=https://api.phonepe.com/apis/secure/pay
PHONEPE_STATUS_CHECK_URL=https://api.phonepe.com/apis/secure/getTransactionStatus

# Fast2SMS
FAST2SMS_API_KEY=YOUR_FAST2SMS_API_KEY
FAST2SMS_ROUTE=p
FAST2SMS_SENDER_ID=CRACKTCK

# Google OAuth
GOOGLE_CLIENT_ID=YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=YOUR_GOOGLE_CLIENT_SECRET
GOOGLE_REDIRECT_URL=https://crackteck.com/auth/google/callback

# Facebook OAuth
FACEBOOK_CLIENT_ID=YOUR_FACEBOOK_CLIENT_ID
FACEBOOK_CLIENT_SECRET=YOUR_FACEBOOK_CLIENT_SECRET
FACEBOOK_REDIRECT_URL=https://crackteck.com/auth/facebook/callback

# LinkedIn OAuth
LINKEDIN_CLIENT_ID=YOUR_LINKEDIN_CLIENT_ID
LINKEDIN_CLIENT_SECRET=YOUR_LINKEDIN_CLIENT_SECRET
LINKEDIN_REDIRECT_URL=https://crackteck.com/auth/linkedin/callback

# ============= LOGGING =============
LOG_CHANNEL=stack
LOG_LEVEL=warning
LOG_MAX_FILES=14

# ELK Stack
ELASTICSEARCH_HOST=10.0.1.30
ELASTICSEARCH_PORT=9200
ELASTICSEARCH_INDEX=crackteck-logs

# ============= MONITORING =============
NEWRELIC_ENABLED=true
NEWRELIC_LICENSE_KEY=YOUR_NEWRELIC_LICENSE_KEY
NEWRELIC_APP_NAME=Crackteck-Production

# ============= FILE UPLOAD RESTRICTIONS =============
MAX_UPLOAD_SIZE=5242880
ALLOWED_IMAGE_TYPES=jpg,jpeg,png,gif
ALLOWED_DOCUMENT_TYPES=pdf,doc,docx,xls,xlsx
SCAN_UPLOADS=true

# ============= ENCRYPTION SETTINGS =============
HASH_DRIVER=bcrypt
HASH_COST=12

# Sensitive field encryption
ENCRYPT_AADHAR=true
ENCRYPT_PAN=true
ENCRYPT_BANK_ACCOUNT=true

# ============= BACKUP CONFIGURATION =============
BACKUP_ENABLED=true
BACKUP_FREQUENCY=daily
BACKUP_RETENTION_DAYS=30
BACKUP_S3_BUCKET=crackteck-backups
BACKUP_B2_ENABLED=true
BACKUP_B2_BUCKET=crackteck-backups-b2
```

---

## Section 2: Nginx Configuration

```nginx
# /etc/nginx/sites-available/crackteck

upstream app_backend {
    least_conn;
    server 10.0.1.10:8000 weight=5 max_fails=3 fail_timeout=30s;
    server 10.0.1.11:8000 weight=5 max_fails=3 fail_timeout=30s;
    server 10.0.1.12:8000 weight=5 max_fails=3 fail_timeout=30s;
    server 10.0.1.13:8000 weight=3 max_fails=3 fail_timeout=30s;
    keepalive 64;
}

# Rate limiting zones
limit_req_zone $binary_remote_addr zone=general:10m rate=10r/s;
limit_req_zone $binary_remote_addr zone=auth:10m rate=5r/m;
limit_req_zone $binary_remote_addr zone=api:10m rate=60r/m;

# HTTP redirect to HTTPS
server {
    listen 80;
    listen [::]:80;
    server_name _;
    
    return 301 https://$host$request_uri;
}

# HTTPS Server Block
server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name crackteck.com www.crackteck.com api.crackteck.com;
    
    # SSL Configuration
    ssl_certificate /etc/letsencrypt/live/crackteck.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/crackteck.com/privkey.pem;
    ssl_trusted_certificate /etc/letsencrypt/live/crackteck.com/chain.pem;
    
    ssl_protocols TLSv1.3 TLSv1.2;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers on;
    ssl_session_cache shared:SSL:50m;
    ssl_session_timeout 1d;
    ssl_session_tickets off;
    
    # HSTS
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;
    
    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;
    add_header Content-Security-Policy "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:; font-src 'self'; connect-src 'self' https:;" always;
    add_header Permissions-Policy "geolocation=(), microphone=(), camera=()" always;
    
    # Logging
    access_log /var/log/nginx/crackteck_access.log combined buffer=32k flush=5s;
    error_log /var/log/nginx/crackteck_error.log warn;
    
    # Root directory
    root /var/www/crackteck/public;
    
    # Static files caching
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        access_log off;
    }
    
    # Deny access to sensitive files
    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }
    
    location ~ ~$ {
        deny all;
        access_log off;
        log_not_found off;
    }
    
    # API Routes with rate limiting
    location ~ ^/api/ {
        limit_req zone=api burst=100 nodelay;
        
        try_files $uri $uri/ /index.php?$query_string;
        
        proxy_pass http://app_backend;
        proxy_http_version 1.1;
        proxy_set_header Connection "";
        
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        proxy_set_header X-Forwarded-Host $server_name;
        
        # Timeouts
        proxy_connect_timeout 60s;
        proxy_send_timeout 60s;
        proxy_read_timeout 60s;
        
        # Buffer settings
        proxy_buffering on;
        proxy_buffer_size 4k;
        proxy_buffers 8 4k;
        proxy_busy_buffers_size 8k;
    }
    
    # Authentication endpoints with stricter rate limiting
    location ~ ^/(auth|login|register) {
        limit_req zone=auth burst=5 nodelay;
        
        try_files $uri $uri/ /index.php?$query_string;
        proxy_pass http://app_backend;
        proxy_http_version 1.1;
        proxy_set_header Connection "";
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    }
    
    # Application routes
    location / {
        limit_req zone=general burst=20 nodelay;
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    # PHP processing
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        
        fastcgi_connect_timeout 60;
        fastcgi_send_timeout 60;
        fastcgi_read_timeout 60;
        
        fastcgi_buffer_size 128k;
        fastcgi_buffers 256 4k;
    }
}

# Admin panel
server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name admin.crackteck.com;
    
    # ... (similar SSL and security configuration)
    
    location / {
        proxy_pass http://app_backend;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    }
}
```

---

## Section 3: Database Security & Backup Script

```bash
#!/bin/bash
# File: /opt/crackteck/backups/backup.sh
# Backup script for production database

set -e

BACKUP_DIR="/backups/mysql"
LOG_FILE="/var/log/crackteck_backup.log"
DB_NAME="crackteck_db"
DB_USER="backup"
DB_PASSWORD="$BACKUP_DB_PASSWORD"  # From environment
DATE=$(date +%Y%m%d_%H%M%S)
WEEK=$(date +%V)
MONTH=$(date +%m)

# Functions
log_message() {
    echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1" >> "$LOG_FILE"
}

# Create backup directory
mkdir -p "$BACKUP_DIR/full" "$BACKUP_DIR/incremental" "$BACKUP_DIR/logs"

log_message "Starting backup process..."

# 1. Full Backup (Daily at 00:00 UTC)
if [ "$(date +%H:%M)" == "00:00" ]; then
    log_message "Creating full database backup..."
    
    mysqldump \
        --user="$DB_USER" \
        --password="$DB_PASSWORD" \
        --single-transaction \
        --lock-tables=false \
        --events \
        --routines \
        --triggers \
        --master-data=2 \
        --compress \
        "$DB_NAME" > "$BACKUP_DIR/full/full_backup_$DATE.sql.gz"
    
    BACKUP_SIZE=$(du -h "$BACKUP_DIR/full/full_backup_$DATE.sql.gz" | cut -f1)
    log_message "Full backup completed. Size: $BACKUP_SIZE"
    
    # Verify backup integrity
    gunzip -t "$BACKUP_DIR/full/full_backup_$DATE.sql.gz"
    if [ $? -eq 0 ]; then
        log_message "Backup integrity verified."
    else
        log_message "ERROR: Backup integrity check failed!"
        exit 1
    fi
fi

# 2. Upload to AWS S3
log_message "Uploading to AWS S3..."
aws s3 cp "$BACKUP_DIR/full/" s3://crackteck-backups/mysql/full/ \
    --recursive \
    --sse AES256 \
    --storage-class GLACIER_IR

# 3. Upload to Backblaze B2
log_message "Uploading to Backblaze B2..."
b2 sync "$BACKUP_DIR/" \
    "b2://crackteck-backups-b2/mysql/" \
    --compareVersions modTime

# 4. Binary Log Backup (for point-in-time recovery)
log_message "Backing up binary logs..."
mysqlbinlog /var/log/mysql/mysql-bin.* | gzip > "$BACKUP_DIR/logs/binlog_$DATE.gz"

# 5. Retention Cleanup
log_message "Cleaning up old backups (keeping last 30 days)..."
find "$BACKUP_DIR" -name "*.sql.gz" -mtime +30 -exec rm {} \;

# 6. Database Validation
log_message "Running database validation checks..."
mysql -u"$DB_USER" -p"$DB_PASSWORD" -e \
    "CHECK TABLE $(mysql -u'$DB_USER' -p'$DB_PASSWORD' -N -e \
    "SELECT GROUP_CONCAT(TABLE_NAME SEPARATOR ',') FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$DB_NAME'");"

# 7. Encryption
log_message "Encrypting backup with GPG..."
gpg --encrypt --recipient backup@crackteck.com "$BACKUP_DIR/full/full_backup_$DATE.sql.gz"

log_message "Backup process completed successfully!"
```

---

## Section 4: Database Configuration (MySQL)

```sql
-- MySQL Configuration (/etc/mysql/mysql.conf.d/mysqld.cnf)

[mysqld]

# Connection settings
max_connections=1000
max_allowed_packet=256M
default-storage-engine=InnoDB

# Replication settings
server-id=1
log_bin=/var/log/mysql/mysql-bin.log
binlog_format=ROW
binlog_retention_days=7
relay-log=/var/log/mysql/mysql-relay-bin
relay-log-index=/var/log/mysql/mysql-relay-bin.index

# InnoDB settings
innodb_buffer_pool_size=16G
innodb_log_file_size=1G
innodb_flush_log_at_trx_commit=1
innodb_flush_method=O_DIRECT
innodb_file_per_table=ON
innodb_lock_wait_timeout=50

# Query optimization
query_cache_type=OFF
query_cache_size=0
sort_buffer_size=1M
read_rnd_buffer_size=8M
bulk_insert_buffer_size=16M

# Slow query log
slow_query_log=1
slow_query_log_file=/var/log/mysql/slow-query.log
long_query_time=2
log_queries_not_using_indexes=ON

# Character set
character_set_server=utf8mb4
collation_server=utf8mb4_unicode_ci

# Permissions
sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'

-- Create database and users

CREATE DATABASE IF NOT EXISTS crackteck_db 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Application user
CREATE USER 'app_user'@'10.0.1.%' IDENTIFIED BY 'STRONG_PASSWORD_MIN_32_CHAR';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, INDEX, REFERENCES ON crackteck_db.* TO 'app_user'@'10.0.1.%';

-- Read replica user
CREATE USER 'replication'@'10.0.1.%' IDENTIFIED BY 'REPLICATION_PASSWORD';
GRANT REPLICATION SLAVE ON *.* TO 'replication'@'10.0.1.%';

-- Backup user (read-only)
CREATE USER 'backup'@'backup_host' IDENTIFIED BY 'BACKUP_PASSWORD';
GRANT SELECT, LOCK TABLES ON crackteck_db.* TO 'backup'@'backup_host';

-- Analytics user (read-only slave)
CREATE USER 'analytics'@'10.0.1.30' IDENTIFIED BY 'ANALYTICS_PASSWORD';
GRANT SELECT ON crackteck_db.* TO 'analytics'@'10.0.1.30';

FLUSH PRIVILEGES;
```

---

## Section 5: Docker Configuration

```dockerfile
# Dockerfile
FROM php:8.2-fpm-alpine

RUN apk update && apk add \
    mysql-client \
    redis \
    git \
    curl \
    zip \
    libpng-dev \
    libjpeg-turbo-dev \
    libfreetype6-dev \
    openssh-client

# PHP Extensions
RUN docker-php-ext-install \
    pdo_mysql \
    gd \
    zip \
    bcmath \
    mbstring \
    opcache \
    pcntl \
    sockets

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Application
WORKDIR /var/www/crackteck
COPY . .

# Permissions
RUN chown -R www-data:www-data /var/www/crackteck

EXPOSE 9000

CMD ["php-fpm"]
```

```yaml
# docker-compose.yml
version: '3.8'

services:
  app:
    build: .
    container_name: crackteck_app
    working_dir: /var/www/crackteck
    volumes:
      - ./:/var/www/crackteck
      - /var/www/crackteck/node_modules
    networks:
      - crackteck_network
    depends_on:
      - mysql
      - redis

  nginx:
    image: nginx:latest
    container_name: crackteck_nginx
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www/crackteck
      - ./docker/nginx/nginx.conf:/etc/nginx/nginx.conf
      - ./docker/nginx/conf.d:/etc/nginx/conf.d
      - /etc/letsencrypt:/etc/letsencrypt
    networks:
      - crackteck_network
    depends_on:
      - app

  mysql:
    image: mysql:8.0
    container_name: crackteck_mysql
    environment:
      MYSQL_DATABASE: crackteck_db
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_USER: app_user
      MYSQL_PASSWORD: app_password
    volumes:
      - mysql_data:/var/lib/mysql
      - ./docker/mysql/my.cnf:/etc/mysql/mysql.conf.d/mysqld.cnf
    networks:
      - crackteck_network

  redis:
    image: redis:7-alpine
    container_name: crackteck_redis
    ports:
      - "6379:6379"
    command: redis-server --requirepass redis_password
    volumes:
      - redis_data:/data
    networks:
      - crackteck_network

volumes:
  mysql_data:
  redis_data:

networks:
  crackteck_network:
    driver: bridge
```

---

## Section 6: Laravel Configuration Files

### config/auth.php
```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'api' => [
        'driver' => 'token',
        'provider' => 'users',
        'hash' => true,
    ],
    'api-jwt' => [
        'driver' => 'jwt',
        'provider' => 'users',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
],

'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
    ],
],
```

### config/database.php
```php
'mysql' => [
    'driver' => 'mysql',
    'read' => [
        'host' => [
            '10.0.1.11',
            '10.0.1.12',
        ],
    ],
    'write' => [
        'host' => [
            '10.0.1.100',
        ],
    ],
    'sticky' => true,
    'port' => env('DB_PORT', 3306),
    'database' => env('DB_DATABASE', 'crackteck_db'),
    'username' => env('DB_USERNAME', 'app_user'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => 'InnoDB',
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
],
```

---

## Section 7: Deployment Checklist

### Pre-deployment
- [ ] All tests passing (Unit, Integration, Feature)
- [ ] Code review approved
- [ ] Database migrations tested on staging
- [ ] Security scan completed (no vulnerabilities)
- [ ] Performance tests passed (< 200ms p95)
- [ ] Staging deployment verified
- [ ] Production backup created

### Deployment Steps
- [ ] Pull latest code
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Clear routes: `php artisan route:clear`
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed critical data if needed
- [ ] Rebuild config: `php artisan config:cache`
- [ ] Warm cache: `php artisan cache:warm`
- [ ] Restart queue: `php artisan queue:restart`
- [ ] Verify application health
- [ ] Check error rates in monitoring
- [ ] Notify users (if needed)

### Post-deployment
- [ ] Monitor error logs
- [ ] Check database connections
- [ ] Verify external integrations (PhonePe, SMS)
- [ ] Run smoke tests
- [ ] Check API response times
- [ ] Verify cache functionality
- [ ] Update documentation

---

**This configuration file covers all aspects of production deployment for Crackteck handling 1M+ users with enterprise-grade security, scalability, and reliability.**
