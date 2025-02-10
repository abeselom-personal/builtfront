### Instruction File (README.md)  

#### Setup and Running the Software  

1. **Start the Software**  
   - Using Docker:  
     ```sh
     docker-compose up -d
     ```  
   - Using XAMPP:  
     - Start Apache and MySQL in XAMPP  
     - Ensure the `.env` file is correctly set  

2. **Database Configuration**  
   - The system is **multi-tenant** with two databases:  
     - **Master Database** (root project)  
     - **Tenant Databases** (per client)  
   - Steps to configure:  
     - Import the **master database** or create it manually  
     - Update `.env` file with correct database credentials  
     - Run Laravel migrations:  
       ```sh
       php artisan migrate --database=landlord
       php artisan migrate --database=tenant
       ```

---

### Tasks to Implement  

#### 1. **Fix Sorting in Catalog Section**  
   - **Current Issue**: Sorting by name or other fields affects all categories instead of sorting within individual categories.  
   - **Expected Behavior**: Sorting should apply only within the selected category.  

#### 2. **Fix Budget Tab**  
   - **Database Changes**: Ensure budget data is stored in the `budgets` and `budget_items` tables.  
   - **Initial Load**: Fetch data from the database when loading.  
   - **UI Fixes**: Improve UI flow to match the rest of the application.  

#### 3. **Deployment**  
   - Ensure all fixes are applied before deployment.  
   - Use Docker or XAMPP for hosting.  
   - Verify database connections and run migrations.  
   - Final checks for UI consistency and seamless functionality.  

---

### Notes  
- The project is built using **Laravel**.  
- Uses **Dashboard Database Landlord** for multi-tenancy.  
- Ensure proper database migration before running the application.
