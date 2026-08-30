# LAVA ESPORTS

LAVA ESPORTS is a Laravel 12 platform for esports community management with:
- public game/event/team discovery
- authenticated user dashboards
- team applications and event registrations
- recruiter posts for talent scouting
- admin management for users, events, and teams

## Tech Stack
- Backend: Laravel 12, PHP 8.2+
- Frontend: Blade, Tailwind CSS v4, Alpine.js, Vite
- Database: PostgreSQL (primary)
- Optional realtime service: Node.js `game-server` (Express + Socket.IO)

## Project Structure
- `app/` application logic (controllers, models, middleware)
- `routes/web.php` main web routes
- `resources/views` Blade templates
- `database/migrations` schema and data migrations
- `game-server/` optional Node.js server
- `Lava_Esports_Documentation/` report sources and diagrams

## Local Setup
1. Install dependencies:
   ```bash
   composer install
   npm install
   ```
2. Create environment file:
   ```bash
   cp .env.example .env
   ```
   On Windows PowerShell:
   ```powershell
   Copy-Item .env.example .env
   ```
3. Generate app key:
   ```bash
   php artisan key:generate
   ```
4. Configure `.env` for PostgreSQL.
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Start development services:
   ```bash
   composer run dev
   ```
   This runs Laravel server, queue listener, and Vite.

## Build for Production
```bash
composer install --optimize-autoloader --no-dev
npm ci
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Optional Game Server
```bash
cd game-server
npm install
node index.js
```

## Testing
Run:
```bash
php artisan test
```

Current known issue:
- Feature tests fail on SQLite because one migration uses PostgreSQL-specific `ALTER TABLE ... DROP CONSTRAINT` SQL.
- Refactor migration `2026_01_26_113132_modify_role_enum_in_users_table.php` for database portability to fix local test suite reliability.

## Documentation
Detailed report source is in:
- `Lava_Esports_Documentation/main.tex`

Main diagrams currently used in the report:
- In-source TikZ diagrams in `Lava_Esports_Documentation/4_System_Design.tex`:
  - Use case model
  - Authentication and role routing flow
  - System architecture
