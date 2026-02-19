# Go Akademi — Site vitrine

Site vitrine de **Go Akademi**, l’Académie Calaisienne de Jiu Jitsu Brésilien, Kosen Judo et Luta Livre.

## Stack

- **Backend** : Laravel (PHP)
- **Front** : Tailwind CSS v4, Vite 7
- **Contenu** : pages Accueil, L’Académie, Entraînements, Nous rejoindre, Actualités, Contact

## Démarrage rapide

```bash
# Cloner le dépôt
git clone https://github.com/ElliottDaens/site_go_akademi.git
cd site_go_akademi

# Dépendances PHP
composer install

# Environnement (copier .env.example en .env et configurer)
cp .env.example .env
php artisan key:generate

# Dépendances front
npm install
npm run build

# Lancer le site (avec Laravel Herd, ou :)
php artisan serve
# Puis ouvrir http://127.0.0.1:8000
```

En développement avec rechargement à chaud :

```bash
npm run dev
# Garder ce terminal ouvert, puis ouvrir le site en HTTP
```

Voir **[README_DEV.md](README_DEV.md)** pour le détail (build, mode sombre, dépannage).

## Mettre le site en ligne (hébergement)

GitHub héberge **le code**, pas l’exécution PHP. Pour que le site soit en ligne avec Laravel, il faut le déployer sur un hébergeur (Render, IONOS, etc.) qui se connecte à ce dépôt.

**Instructions détaillées** : voir **[DEPLOY.md](DEPLOY.md)** (Render gratuit, déploiement automatique à chaque push).

## Versioning

Les versions sont suivies dans **[CHANGELOG.md](CHANGELOG.md)** et par les [tags de release](https://github.com/ElliottDaens/site_go_akademi/releases) (ex. `v1.0.0`).

## Licence

Projet privé — Go Akademi.
