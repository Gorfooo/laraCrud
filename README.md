<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

    # Instalar dependências
<small>composer i && composer update && npm i && npm update</small>

    # Configurar .env com credenciais do mysql
<small>DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=<br>
DB_USERNAME=<br>
DB_PASSWORD=</small>

    #Criar chave
<small>php artisan key:generate</small>

    # Criar banco e populá-lo
<small>php artisan migrate:refresh --seed</small>

    # Criar link para storage
<small>php artisan storage:link</small>

    # Criar cron job para remover arquivos temporários (configurado com 15 minutos para testes)(opcional)
<small>crontab -e<br>
    * * * * * php /home/filipe/Área\ de\ Trabalho/Projetos/laraCrud/artisan schedule:run >> /dev/null 2>&1</small>
