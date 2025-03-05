# Docker Static App Deployment
This is a local deployment to run server-side PHP using FastCGI Process Manager together with an nginx web-server

## Archetecture

- Requests to `http://localhost:8089` get handled by the `http-svc` 
- If it encounters php files, it executes them using the `php-svc` over the docker network on port `9000`
to the `fp-svc` which has a webserver on port `7901` 
    - for `http://fp-svc:7091/`, the container proxies to `http://hp-svc:6969/`
    - for `http://fp-svc:7091/ITP-Code/`, the container serves the pages site stored inside the image at `/usr/share/nginx/html` (this came from a Git repo)
- The `hp-svc` serves a landing page on port `6969/` that comes from a volume and has a link to `http://localhost:8081/ITP-Code/`


## Prerequisites
- Docker version (27.5.1, build 9f9e405)+
- sh shell with typical tools
## Testing Notes
- Tested on Windows 11 Home
- Tested with Docker version 27.5.1, build 9f9e405
- Tested with Git Bash

## Usage 
1. Intialize the file structure and volumes.
    ```bash
    chmod +x scripts/init.sh;
    ./scripts/init.sh;
    ```
2. To up the compose stack.
    ```bash
   docker compose up -d;
    ```
3. Visit the hompage by going to [localhost:8089](http://localhost:8089) in the browser.
4. Click the link you find on the hompage. 
You should see the PHP info with some purple coloring.
5. To down the compose stack.
    ```bash
    docker compose down;
    ```