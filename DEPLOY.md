# Déployer le site Go Akademi en ligne

**Important** : GitHub sert à **stocker le code**, pas à **exécuter PHP**. Pour que le site soit en ligne et que Laravel fonctionne, il faut l’**héberger** sur une plateforme qui exécute PHP et se connecte à ton dépôt GitHub.

Ce dépôt est prêt pour un déploiement **automatique depuis GitHub** (à chaque `git push`).

---

## Option recommandée : Render (gratuit, connecté à GitHub)

[Render](https://render.com) propose un hébergement gratuit et se connecte directement à ton repo GitHub. À chaque push, le site est reconstruit et mis en ligne.

### 1. Créer un compte Render

- Va sur [render.com](https://render.com) et inscris-toi (gratuit).
- Connecte ton compte **GitHub** dans Render (Dashboard → Account → Connect GitHub).

### 2. Créer la base de données PostgreSQL

- Dans le Dashboard Render : **New +** → **PostgreSQL**.
- Choisis le plan **Free**.
- Donne un nom (ex. `go-akademi-db`).
- Crée la base et note l’**Internal Database URL** (tu en auras besoin pour le service web).

### 3. Créer le service Web (Laravel)

- **New +** → **Web Service**.
- Connecte le repo GitHub **ElliottDaens/site_go_akademi**.
- Configure :
  - **Runtime** : **Docker** (le projet contient un `Dockerfile`).
  - **Branch** : `master` (ou ta branche principale).
  - **Plan** : Free.

### 4. Variables d’environnement

Dans la fiche du Web Service, onglet **Environment** :

| Clé | Valeur |
|-----|--------|
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | Génère avec : `php artisan key:generate --show` (en local) |
| `DB_CONNECTION` | `pgsql` |
| `DATABASE_URL` | Colle l’**Internal Database URL** de ta base Render |
| `ADMIN_PASSWORD` | Le mot de passe que tu veux pour l’admin (ex. celui de ton `.env` local) |
| `SESSION_DRIVER` | `database` |
| `CACHE_STORE` | `database` |
| `QUEUE_CONNECTION` | `database` |

Ensuite, **Save Changes**. Render va (re)déployer.

### 5. Premier déploiement

- Clique sur **Manual Deploy** → **Deploy latest commit**.
- Attends la fin du build (quelques minutes). Une fois terminé, ton site est accessible à l’URL du type :  
  `https://go-akademi-xxxx.onrender.com`.

### 6. Après le premier déploiement

- Les **migrations** sont lancées au démarrage du conteneur (script `docker/start.sh`).
- Pour avoir des données de démo, tu peux lancer le seeder une fois en SSH (si disponible) ou en local avec la même base (en pointant temporairement ton `.env` vers la base Render).

---

## Alternative : déploiement avec le Blueprint (render.yaml)

Le fichier **render.yaml** à la racine du repo décrit un **Blueprint** Render (une base PostgreSQL + un service web). Tu peux l’utiliser pour tout créer d’un coup :

1. Dans Render : **New +** → **Blueprint**.
2. Connecte le repo **site_go_akademi**.
3. Render propose de créer la base et le service web à partir de **render.yaml**.
4. Il te demandera la valeur de **ADMIN_PASSWORD** (sync: false = saisie manuelle).
5. Valide ; après le déploiement, note l’URL du service web.

---

## Autres hébergeurs (code sur GitHub, site ailleurs)

- **IONOS Deploy Now** : [ionos.fr/hebergement/deploy-now](https://ionos.fr/hebergement/deploy-now) — déploiement depuis GitHub.
- **Hébergement mutualisé** (OVH, o2switch, etc.) : tu clones le repo sur le serveur, tu fais `composer install`, `npm run build`, tu pointes la racine web vers `public/` et tu configures `.env` + base de données.

---

## Récap

| Où | Rôle |
|----|------|
| **GitHub** | Stocke le code ; à chaque push, Render (ou autre) peut redéployer. |
| **Render** | Héberge l’app (Docker) + la base PostgreSQL ; le site Laravel est en ligne et fonctionne. |

Une fois Render configuré, **envoyer le lien** (ex. `https://go-akademi-xxxx.onrender.com`) suffit pour montrer le site à ton coach.
