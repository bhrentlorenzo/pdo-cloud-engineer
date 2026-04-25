I updated my MySQL configuration to use port 3307 instead of the default 3306. Because of this, I updated the PDO connection string in connection.php to include port=3307 so the database connection would work successfully.

Example: mysql:host=127.0.0.1;port=3307;dbname=dream_job_db;charset=utf8mb4
