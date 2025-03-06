# ===== TUTORIAL ======
# 
# IMPORTANTE: troque PODMAN por DOCKER 
#				ex: docker create volume mangavel
#
# 1. Primeiramente insira o comando: make setup 
# 		Isso irá fazer o setup da: REDE, VOLUME e do BANCO DE DADOS (mongodb).
# 2. Toda vez que fizer uma alteração use o comando: make run
#		Ele funciona que nem o npm run dev ou composer run dev, possivelmente irá dar um erro mas isso não está influenciando no funcionanto do CRUD :D
# O comando make migrate, basicamente executa o comando php artisan migrate, que aplica as migrações do banco de dados do Laravel.

setup:
	podman create volume mangavel && \
	podman network create rede_mango && \
	podman run -d -p 27017:27017 --name mongodb --network rede_mango mongo

#Comando usando para rodar o projeto no container
run: 
	podman run -it --rm -p 8000:8000 -p 5173:5173 --network rede_mango -v mangavel:/app -w /app laravel12:with-mongodb sh -c "cd /app/manga && composer run dev -vv"

migrate:
	podman run -it --rm -p 8000:8000 -p 5173:5173 --network rede_mango -v mangavel:/app -w /app laravel12:with-mongodb sh -c "cd /app/manga && php artisan migrate"
