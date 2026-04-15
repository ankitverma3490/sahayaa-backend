# Subscription Plans Not Showing - Fix Documentation

## Problem
Plans were added in the backend database but not showing in the mobile app.

## Root Cause
The `role_id` column in the `subscriptions` table was defined as `string` type, but the application logic expected it to be an integer foreign key referencing the `roles` table.

## Changes Made

### 1. Database Migration Fix
**File:** `database/migrations/2026_02_11_151644_create_subscriptions_table.php`

Changed `role_id` from string to proper foreign key:
```php
// Before
$table->string('role_id')->nullable();

// After
$table->unsignedBigInteger('role_id')->nullable();
$table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
```

### 2. New Migration for Existing Data
**File:** `database/migrations/2026_04_15_000001_fix_subscriptions_role_id_type.php`

This migration:
- Cleans up any invalid string values in existing `role_id` column
- Drops the old string column
- Creates new integer foreign key column
- Preserves data integrity

### 3. Controller Improvements
**File:** `app/Http/Controllers/Api/SubscriptionController.php`

Improved `subscriptionByRole` method:
- Better error handling
- Filters out soft-deleted subscriptions
- Orders by price (ascending)
- Returns empty array with message when no subscriptions found

Added debug endpoint:
- `GET /api/subscriptions/debug` - Shows all subscriptions with their roles
- Useful for troubleshooting

### 4. Model Enhancement
**File:** `app/Models/Subscription.php`

Added relationship:
```php
public function role()
{
    return $this->belongsTo(Role::class, 'role_id');
}
```

## Deployment Steps

### Step 1: Backup Database
```bash
php artisan db:backup  # or your backup method
```

### Step 2: Run Migrations
```bash
php artisan migrate
```

This will:
1. Fix the `role_id` column type
2. Update existing data
3. Add foreign key constraint

### Step 3: Verify Roles Table
Make sure you have roles in the `roles` table:
```sql
SELECT * FROM roles;
```

Expected roles:
- id: 1, name: "Household Manager" (or similar)
- id: 2, name: "Staff" (or similar)

### Step 4: Update Existing Subscriptions
If you have existing subscriptions with NULL or invalid `role_id`, update them:

```sql
-- For Household Manager plans
UPDATE subscriptions 
SET role_id = 1 
WHERE subscription_name LIKE '%household%' 
  OR subscription_name LIKE '%manager%'
  OR type = 'household';

-- For Staff plans
UPDATE subscriptions 
SET role_id = 2 
WHERE subscription_name LIKE '%staff%' 
  OR type = 'staff';
```

### Step 5: Test the API

#### Test 1: Get all subscriptions
```bash
curl -X GET "https://sahayaa-backend-production.up.railway.app/api/subscriptions"
```

#### Test 2: Debug endpoint (check role_ids)
```bash
curl -X GET "https://sahayaa-backend-production.up.railway.app/api/subscriptions/debug"
```

#### Test 3: Get subscriptions by role
```bash
# For Household Manager (role_id = 1)
curl -X POST "https://sahayaa-backend-production.up.railway.app/api/subscriptions/role" \
  -H "Content-Type: application/json" \
  -d '{"role_id": 1}'

# For Staff (role_id = 2)
curl -X POST "https://sahayaa-backend-production.up.railway.app/api/subscriptions/role" \
  -H "Content-Type: application/json" \
  -d '{"role_id": 2}'
```

### Step 6: Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

### Step 7: Test in Mobile App
1. Open the app
2. Navigate to Membership/Plans screen
3. Plans should now appear based on user role

## Troubleshooting

### Issue: Plans still not showing

**Check 1: Verify role_id is set**
```sql
SELECT id, subscription_name, role_id FROM subscriptions;
```
All subscriptions should have a valid `role_id` (1, 2, etc.)

**Check 2: Verify user's role**
Check what `role_id` the mobile app is sending:
- Add logging in the app
- Check network requests in React Native Debugger
- Verify `userType` in Redux store

**Check 3: Check API response**
Use the debug endpoint to see all data:
```bash
curl -X GET "https://sahayaa-backend-production.up.railway.app/api/subscriptions/debug"
```

**Check 4: Soft deletes**
Make sure subscriptions are not soft-deleted:
```sql
SELECT id, subscription_name, role_id, deleted_at 
FROM subscriptions 
WHERE deleted_at IS NULL;
```

### Issue: Migration fails

If the migration fails due to existing foreign key:
```bash
# Rollback
php artisan migrate:rollback --step=1

# Fix data manually
# Then run again
php artisan migrate
```

## Frontend Verification

The frontend code in `sahayyamain` is already correct:
- Uses `SUBSCRIPTIONS_BY_ROLE` endpoint with `role_id` payload
- Falls back to `SUBSCRIPTIONS` if role-based fetch fails
- Properly handles empty arrays

No frontend changes needed.

## Security Note

**Remove debug endpoint in production:**

After fixing the issue, comment out or remove this line from `routes/api.php`:
```php
// Route::get('/subscriptions/debug', [SubscriptionController::class, 'debugSubscriptions']);
```

## Summary

The fix ensures:
1. ✅ `role_id` is proper integer foreign key
2. ✅ Subscriptions are filtered by role correctly
3. ✅ API returns appropriate data for each user type
4. ✅ Mobile app receives and displays plans

Plans will now show in the app based on user's role (Household Manager or Staff).
