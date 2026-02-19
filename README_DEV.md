# Go Akademi — Dev & CSS

## Si tes changements CSS ne s'affichent jamais

Laravel charge le CSS compilé depuis `public/build/`. Après chaque modif CSS/JS : lance `npm run build` puis Ctrl+F5, ou utilise `npm run dev` pour le hot reload.

---

## Si le CSS ne s’affiche pas

### Méthode 1 : Utiliser le build (sans `npm run dev`)

Pour voir le site **avec tout le CSS**, sans lancer le serveur Vite :

```bash
cd C:\Users\Ellie\OneDrive\Documents\go-akademi
npm run build
```

Ensuite ouvre ton site comme d’habitude (Herd → `http://go-akademi.test` ou `https://go-akademi.test`, ou `php artisan serve` → `http://127.0.0.1:8000`).  
Laravel utilisera les fichiers dans `public/build/` : le CSS doit s’afficher. Fais un **Ctrl+F5** (rafraîchissement forcé) si la page était déjà ouverte.

### Méthode 2 : Dev avec hot reload (`npm run dev`)

1. Lance Vite :
   ```bash
   cd C:\Users\Ellie\OneDrive\Documents\go-akademi
   npm run dev
   ```
2. Laisse ce terminal ouvert (tu dois voir `Local: http://localhost:5173/`).
3. Ouvre le site en **HTTP** (pas HTTPS) :
   - Herd : essaie **http://go-akademi.test** (sans `s`).
   - Ou : `php artisan serve` puis **http://127.0.0.1:8000**.

Si ton site est en **HTTPS** (ex. `https://go-akademi.test`), le navigateur peut bloquer les assets en HTTP (mixed content) et le CSS ne charge pas. Dans ce cas, utilise la **méthode 1** (build) pour travailler, ou configure Herd pour utiliser HTTP en local.

---

## Récap

| Objectif              | Commande        | Puis ouvre                    |
|-----------------------|-----------------|-------------------------------|
| Voir le site avec CSS | `npm run build` | Ton URL (Herd / artisan) + Ctrl+F5 |
| Dev + hot reload      | `npm run dev`   | **http://** ton URL (pas https)     |

---

## Vérifications

1. **CSS visible** : header, footer, sections, cartes et texte doivent être stylés.
2. **Hot reload** : avec `npm run dev` actif, modifie `resources/css/app.css` → la page se met à jour sans recharger.
3. **Dark mode** : bouton soleil/lune → mode clair = fond clair / texte sombre, mode sombre = fond sombre / texte clair.
