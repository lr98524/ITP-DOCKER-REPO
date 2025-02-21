# Docker Static App Deployment
This is a local deployment to serve the Github Pages app of [lr98524.github.io/ITP-Code](https://lr98524.github.io/ITP-Code)

## Archetecture

- Requests to `http://localhost:8081` get routed to the `fp-svc` which has a webserver on port `7901` 
    - for `http://fp-svc:7091/`, the container proxies to `http://hp-svc:6969/`
    - for `http://fp-svc:7091/ITP-Code/`, the container serves the pages site stored inside the image at `/usr/share/nginx/html` (this came from a Git repo)
- The `hp-svc` serves a landing page on port `6969/` that comes from a volume and has a link to `http://localhost:8081/ITP-Code/`


## Prerequisites
- Docker version (27.5.1, build 9f9e405)+
- sh shell with typical tools and perl
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
3. TO down the compose stack.
    ```bash
    docker compose down;
    ```