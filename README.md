Projet site e-commerce « The Game Store »

Le projet « The Game Store » consiste en un site e-commerce qui vend des jeux vidéo dématérialisés. 

Page d’accueil du site 
![image](https://github.com/TomP111/thegamestore/assets/97836360/83c3cb83-ebb6-410e-8a5e-e9f71c1b0a9d)
La page d’accueil du site est constituée d’un header (bandeau noir tout en haut de la page) comprenant une barre de recherche et les boutons panier et compte, dans cet ordre.

La barre de recherche questionne la base de données et affiche la liste des jeux dont le nom comprend la recherche de l’utilisateur, elle permet de trouver rapidement un jeu grâce à son nom.

Chaque image présente sur le site est stockée en base de données sous la forme blob.

Page de connexion

![image](https://github.com/TomP111/thegamestore/assets/97836360/f7e4a855-17fa-4e86-924c-acb3c158e8b8)

Par défaut, lorsqu’un utilisateur non-connecté clique sur le bouton compte du header, il est redirigé sur la page de connexion ci-dessous

Cette page de connexion, constituée des champs « Nom d’utilisateur » et « Mot de passe », questionne la base de données et vérifie si un compte existe bien avec le nom d’utilisateur entré, il vérifie ensuite si le hachage (méthode de chiffrement) du mot de passe entré correspond à celui en base de données.
 
Lorsque l’utilisateur se connecte, une session est alors lancée pour garder l’utilisateur connecté au travers des différentes pages du site.

Dans le cas où l’utilisateur ne dispose pas encore de compte, il peut cliquer sur le bouton « Pas encore de compte », qui le redirigera vers la page d’inscription.

Page d’inscription

![image](https://github.com/TomP111/thegamestore/assets/97836360/841a44ba-6d03-4deb-855a-5e1d347ab83b)
 
Une fois sur la page, l’utilisateur devra remplir les différents champs avec ses informations, le champ mail est soumis à un contrôle regex afin de vérifier le bon format du mail et le champ mot de passe impose différentes règles afin de respecter les recommandations de la CNIL.

Page catalogue

![image](https://github.com/TomP111/thegamestore/assets/97836360/4e6f49bc-bc43-4959-8c44-3004a197b247)

La page catalogue est accessible depuis la page d’accueil en cliquant sur « Voir le catalogue », elle permet de voir l’ensemble des jeux disponibles sur le site.

Page de description d’un jeu et d’ajout au panier

![image](https://github.com/TomP111/thegamestore/assets/97836360/61fd3fa3-949b-4bd9-9049-c6787dccc9f9)

Lorsqu’un utilisateur clique sur un jeu, celui-ci accède à la page décrivant le produit, les plateformes sur lesquelles il est disponible, son prix et l’option d’ajout au panier.

Page panier

![image](https://github.com/TomP111/thegamestore/assets/97836360/7bf1a0c5-f584-420c-b848-2cc892bdbe03)

La page panier affiche le panier de l’utilisateur, avec les différents produits qu’il a ajouté dedans. L’utilisateur peut augmenter et réduire la quantité d’un produit, consulter le prix total et procéder au paiement.

Le panier de l’utilisateur est stocké en base de données, assurant un accès à tout moment via le compte.
 

Présentation de la base de données du projet sous forme de MCD
La base de données a été réalisée via un MCD que nous avons réalisé au début du projet. Bien évidemment, celle-ci a été amené à évoluer depuis.

Voici les prémices de la base de données du projet :

![image](https://github.com/TomP111/thegamestore/assets/97836360/f24db905-926f-403f-9aac-cc04fe53a94e)

La table « articles » est le centre de cette base, elle regroupe l’ensemble des articles en s’appuyant sur différentes autres tables à l’aide de clés étrangères.
Ainsi, un article peut être écrit par plusieurs développeurs, être disponible sur plusieurs plateformes et disposer de plusieurs genres, il ne dispose néanmoins que d’un seul éditeur et d’une seule image.
Par la suite, la base de données à été amenée à ressembler à ceci :
 
En effet, trois tables (Accounts,Tickets et Panier) ont été ajoutées. Account permettant d’enregistrer les comptes utilisateurs, Panier de stocker les produits enregistrés dans leur panier et Tickets d’enregistrer les tickets utilisateurs, servant pour une application SAV reliée au site.


