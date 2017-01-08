# Getting started
Go inside the server_env,
modify the host mount point for the volume with your right path:
```
    volumes:
      - ~/PhpstormProjects/Apigility/application:/var/www:rw
```

and run docker-compose up.

You can find the HTTP calls into the file:
```
Apigility_TTF.postman_collection.json
```