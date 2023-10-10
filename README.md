## Laragon
- créer la base de donnée avant d'importer les tables via le fichier pendu.sql
- placer le dossier pendu-php-iut a la racine du dossier www
- dans le fichier config mettre $url = 'http://localhost/pendu-php-iut'
- dans le fichier config mettre $host = 'localhost'

## Docker
- executer `docker-compose up -d`
- dans le fichier config mettre $url = 'http://localhost'
- dans le fichier config mettre $host = 'db'