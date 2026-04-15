# Railway Deployment Steps - Subscription Fix

## Changes Made
Fixed the subscription plans not showing issue by converting `role_id` from string to integer foreign key.

## Automatic Deployment (If Railway Auto-Deploy is Enabled)

Railway will automatically:
1. Pull the latest code from GitHub
2. Build the application
3. Deploy the new version

**But migrations won't run automatically!** You need to run them manually.

## Manual Steps After Deployment

### Step 1: Access Railway Console
1. Go to https://railway.app
2. Open your `sahayaa-backend-production` project
3. Click on your service
4. Go to "Settings" tab

### Step 2: Run Migrations via Railway CLI

**Option A: Using Railway Dashboard**
1. Click on your service
2. Go to "Deployments" tab
3. Click on the latest deployment
4. Click "View Logs"
5. In the service settings, find "Variables" and add a one-time command

**Option B: Using Railway CLI (Recommended)**

Install Railway CLI:
```bash
npm install -g @railway/cli
```

Login:
```bash
railway login
```

Link to project:
```bash
railway link
```

Run migrations:
```bash
railway run php artisan migrate
```

### Step 3: Update Existing Subscriptions

Connect to your Railway database and run these SQL commands:

**Option A: Via Railway Dashboard**
1. Go to your Database service
2. Click "Data" tab
3. Run these queries:

```sql
-- Check current subscriptions
SELECT id, subscription_name, role_id, type FROM subscriptions;

-- Update Household Manager plans (role_id = 1)
UPDATE subscriptions 
SET role_id = 1 
WHERE (subscription_name LIKE '%household%' 
   OR subscription_name LIKE '%manager%'
   OR type = 'household')
  AND role_id IS NULL;

-- Update Staff plans (role_id = 2)
UPDATE subscriptions 
SET role_id = 2 
WHERE (subscription_name LIKE '%staff%' 
   OR type = 'staff')
  AND role_id IS NULL;

-- Verify the update
SELECT id, subscription_name, role_id, type FROM subscriptions;
```

**Option B: Via Railway CLI**
```bash
railway run php artisan tinker
```

Then in tinker:
```php
// Check roles
\App\Models\Role::all();

// Update subscriptions
\App\Models\Subscription::whereNull('role_id')
    ->where('type', 'household')
    ->update(['role_id' => 1]);

\App\Models\Subscription::whereNull('role_id')
    ->where('type', 'staff')
    ->update(['role_id' => 2]);

// Verify
\App\Models\Subscription::with('role')->get();
```

### Step 4: Clear Cache
```bash
railway run php artisan cache:clear
railway run php artisan config:clear
railway run php artisan route:clear
```

### Step 5: Test the API

Test the debug endpoint:
```bash
curl https://sahayaa-backend-production.up.railway.app/api/subscriptions/debug
```

Test role-based subscriptions:
```bash
# For Household Manager (role_id = 1)
curl -X POST https://sahayaa-backend-production.up.railway.app/api/subscriptions/role \
  -H "Content-Type: application/json" \
  -d '{"role_id": 1}'

# For Staff (role_id = 2)
curl -X POST https://sahayaa-backend-production.up.railway.app/api/subscriptions/role \
  -H "Content-Type: application/json" \
  -d '{"role_id": 2}'
```

### Step 6: Test in Mobile App
1. Open the Sahayya mobile app
2. Login as Household Manager
3. Go to Membership/Plans screen
4. Plans should now appear
5. Repeat for Staff user

## Troubleshooting

### Issue: Migrations not running
```bash
# Check migration status
railway run php artisan migrate:status

# Force run migrations
railway run php artisan migrate --force
```

### Issue: Database connection error
Check Railway environment variables:
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

### Issue: Plans still not showing

1. Check logs:
```bash
railway logs
```

2. Verify database:
```bash
railway run php artisan tinker
```
```php
\App\Models\Subscription::all();
\App\Models\Role::all();
```

3. Check API response:
```bash
curl https://sahayaa-backend-production.up.railway.app/api/subscriptions/debug
```

## Rollback (If Needed)

If something goes wrong:
```bash
# Rollback last migration
railway run php artisan migrate:rollback --step=1

# Or rollback to specific batch
railway run php artisan migrate:rollback --batch=X
```

## Security Note

After confirming everything works, remove the debug endpoint:

Edit `routes/api.php` and comment out:
```php
// Route::get('/subscriptions/debug', [SubscriptionController::class, 'debugSubscriptions']);
```

Then commit and push again.

## Quick Command Reference

```bash
# View logs
railway logs

# Run artisan commands
railway run php artisan [command]

# Access database
railway run php artisan tinker

# SSH into container (if needed)
railway shell
```

## Expected Result

After successful deployment:
- ✅ Migrations run successfully
- ✅ Subscriptions have valid role_id values
- ✅ API returns plans filtered by role
- ✅ Mobile app displays plans correctly
- ✅ Users can subscribe to plans

## Support

If you encounter issues:
1. Check Railway logs: `railway logs`
2. Check API response: Use the debug endpoint
3. Verify database: Use tinker to inspect data
4. Check mobile app network requests: Use React Native Debugger

---

**Note:** Railway auto-deploys when you push to the connected GitHub branch, but migrations must be run manually for safety.
