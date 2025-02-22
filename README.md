# Notes App

The **Notes** application is a simple note-taking app built using **Laravel** and running inside **Docker** containers.

## 📌 **Features**
- CRUD Notes
- User Authentication
- Runs with Docker

## 🚀 **Requirements**
Before running this application, make sure you have installed:
- **Docker** & **Docker Compose**
- **Git**

## 🔧 **Installation & Running the Application**
1. **Clone the repository**
   ```sh
   git clone https://github.com/ToufiqSenpai/notes-app.git
   cd notes-app
   ```

2. **Create the `.env` file**
   ```sh
   cp .env.example .env
   ```
   Adjust the database and application configuration in `.env` if necessary.

3. **Start the application with Docker Compose**
   ```sh
   docker compose up -d
   ```
   This command will run **Laravel**, **MySQL**, and **Vite** inside Docker containers.

4. **Run migrations and seeders**
   ```sh
   docker compose exec app php artisan migrate --seed --force
   ```

5. **Access the application**
   - Application: [http://localhost:80](http://localhost:80)
   - phpMyAdmin: [http://localhost:8080](http://localhost:8080) (optional if included)

## 🔄 **Useful Commands**
- **View container logs**:
  ```sh
  docker-compose logs -f app
  ```
- **Access the Laravel container**:
  ```sh
  docker-compose exec app bash
  ```
- **Run the queue worker**:
  ```sh
  docker-compose exec app php artisan queue:work
  ```
- **Stop the containers**:
  ```sh
  docker-compose down
  ```

## 📜 **License**
This project is licensed under the **MIT** license.

---

🔥 **Now, the Notes application is ready to use!** 🚀

