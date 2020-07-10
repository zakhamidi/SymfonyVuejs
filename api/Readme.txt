composer create-project symfony/skeleton api

composer require symfony/maker-bundle --dev

composer require doctrine/annotations

php bin/console make:controller  to creat a controller

composer require symfony/orm-pack

php bin/console doctrine:database:create   to create a DB i called apicommuniacs

php bin/console make:entity  to create the Entity i called beverage (type, image , status)

php bin/console make:migration

php bin/console doctrine:migration:migrate

I used the normalizer to tranform objects into table

I used Serialzer( Groups) to tell what we want to get from the Entity
>composer require symfony/serializer-pack

We can use SerializerInterface instead of normalizer

run the server php -S localhost:3000 -t public

And for teh reverse means deserialization

for testing I use Postman https://www.postman.com/

the database is beverage.sql