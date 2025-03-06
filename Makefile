run: 
	podman run -it --rm -p 8000:8000 -p 5173:5173 --network rede_mango -v mangavel:/app -w /app laravel12:with-mongodb sh -c "cd /app/manga && composer run dev -vv"

mongover:
	podman run -it --rm -p 8000:8000 -p 5173:5173 --network rede_mango -v mangavel:/app -w /app laravel12:with-mongodb sh -c "cd /app/manga && composer require mongodb/laravel-mongodb:^5.2"

#Criar rede de Mongodb
create_mongo:
	podman run -d -p 27017:27017 --name mongodb --network rede_mango mongo

migrate:
	podman run -it --rm -p 8000:8000 -p 5173:5173 --network rede_mango -v mangavel:/app -w /app laravel12:with-mongodb sh -c "cd /app/manga && php artisan migrate"
