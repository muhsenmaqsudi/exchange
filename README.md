## Project Installation Guide

### Instruction for running the app with Docker

- Installing project & running the api 
```shell script
cp .env.example .env
docker-comopse up -d
docker-compose run --rm artisan migrate --seed
```

- Running the queue
```shell script
docker-compose run --rm artisan queue:work
```

- Running the task scheduler
```shell script
docker-compose run --rm artisan schedule:run
```

- You can access database on `127.0.0.1:13306`
- You can access redis on `127.0.0.1:16379`
- If your default nginx port 80 is already running change the source port binding in docker-compose.yml `source:destination`
