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
3. Visit the hompage by going to [localhost:8081](http://localhost:8081) in the browser.
4. Click the link you find on the hompage. 
5. To monitor services, attach to the watchdog and curl different services.
    ```bash
   docker compose attach watchdog-svc;
    ```
    (From inside watchdog-svc)
    ```bash
   apk add curl;
   curl http://fp-svc:7901/; # proxied to http://hp-svc:6969/ (homepage)
   curl http://hp-svc:6969/; # hits http://hp-svc:6969/ (homepage)
   curl http://fp-svc:7901/about/ # hits the pages site (simple about, will leave in for this, but expect more soon!)
    ```
    Use `ctrl-d` to exit and restart that main shell process.
6. To down the compose stack.
    ```bash
    docker compose down;
    ```