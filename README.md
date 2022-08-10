# Trabalho Imuniza_DB
## Site Imuniza 

*****
**login: admin@imuniza.com**

**senha: admin**
*****

### Passos para configurar seu ambiente:

##### Passo 1) Clonar o repositório com o comando:

>**git clone linkdorepositório **

##### Passo 2) Instalar o docker ce e o docker-compose mais atuais para seu sistema atual;

***

### Passos para hostear a aplicação no local host:

##### Passo 1) Iniciar os containers com o comando:
   > **docker-compose up -d**

###### ***Após esse passo, os seguintes containers devem estar rodando na sua máquina:***

	mysql -> container do banco de dados;
	app -> container da aplicação laravel.

###### ***Antes de executar o próximo passo, esperar no mínimo 1 minuto para garantir que o composer terminou de dar update.***

###### ***Caso esteja inseguro quanto ao tempo necessário, rode o docker-compose up sem o "-d" e poderá ver o progresso.***

##### Passo 2) Hostear a aplicação laravel com o comando:

>**docker exec -it -d app php artisan serve --host 0.0.0.0**

#### O site estará acessivel através do link:

>**http://172.17.0.1:8000/admin**;

### Para trabalhar no projeto e submeter pull requests:

- ***Você precisa de fazer um fork do projeto para seu repositório***

##### Depois, no terminal na pasta do seu projeto dê o comando: 

>git remote add **seunome** **linkdofork**

##### Criar uma branch

>git checkout -b **nomebranch**

##### Quando solicitado "Dar pull":

>git pull origin **nomebranch**

##### Ao concluir uma tarefa:

>git add .
git commit -m **nomedocommit**
git push **seunome** **nomebranch**
