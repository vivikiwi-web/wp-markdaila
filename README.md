# Kiwi Theme - WordPress Development with Docker & Gulp

This theme is built using modern development tools, including `SCSS`, `Gulp`, and Grid templates. Follow the steps below to install and run the theme in your local WordPress setup.

Let's get started.

## Clone the Repository

To get started, clone the repository to your local machine:

    git clone git@github.com:vivikiwi-web/wp-docker-starter-theme.git
    cd wp-docker-starter-theme

## Project Structure

Your project structure will look like this:

    project-root/
    │── .src/				# Docker configuration files
    │ ├── custom.ini			# Nginx settings for wordpress
    │ ├── database/				# Mysql database
    │ ├── wordpress/			# Wordpress Core
    │   ├── themes/kiwi-theme		# Mounted from 'theme' folder
    │   ├── plugins/kiwi-core		# Mounted from 'plugin' folder
    │── theme/				# Theme development folder (local)
    │── plugin/				# Plugin development folder (local)
    │── docker-compose.yml
    │── README.md

## Install

_Prerequisite:_ Before you begin, you need [Docker](https://www.docker.com) installed. On Linux, you might need to install [docker-compose](https://docs.docker.com/compose/install/#install-compose) separately.

Docker Compose builds and starts four containers by default: `mysql`, `wordpress` & `phpmyadmin`:

    docker-compose up -d

**This will:**  
✅ Create the WordPress environment  
✅ Mount the `theme/` folder as `wp-content/themes/kiwi-theme` inside the container  
✅ Mount the `plugin/` folder as `wp-content/plugins/kiwi-core` inside the container

**Wait a few minutes** for Docker to build the services for the first time. After the initial build, startup should only take a few seconds.

You can follow the Docker output to see build progress and logs:

    docker-compose logs -f

Once the containers are running, you can visit the React frontends and backend WordPress admin in your browser.

To stop the Docker environment:

    docker-compose down --volumes

## Install Dependencies (Theme Development)

Inside the theme folder, install the required dependencies:

    cd theme
    npm install

## Developing the Kiwi Plugin

If you are also working on the Kiwi Core plugin, navigate to the plugin/ folder and install dependencies if needed. Plugin files will be automatically mounted inside Docker under `wp-content/plugins/kiwi-core`.

## Accessing WordPress in Docker

After starting Docker, you can access your WordPress site at:

🔗 http://localhost:8000

If you are using BrowserSync, it may be available at:

🔗 http://localhost:3000 (if configured in gulpfile.js)
