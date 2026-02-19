# Résolutions des images – Go Akademi

Utilise ces dimensions pour préparer tes photos aux bons formats d’affichage.

---

## Logos

| Emplacement | Fichier | Résolution recommandée | Format | Notes |
|-------------|---------|------------------------|--------|-------|
| Header | Logo carré | **256 × 256** | PNG (fond transparent) | Carré, utilisé en 48×48px à 96×96px |
| Hero accueil / Footer | Logo carré blanc | **256 × 256** | PNG (fond transparent) | Carré, version blanche |

---

## Photos Hero (bannières pleine largeur)

| Page | Usage | Résolution recommandée | Ratio | Notes |
|------|-------|------------------------|-------|-------|
| Accueil | Hero principale (85vh) | **1920 × 1080** | 16:9 | Full HD, recadrée en object-cover |
| Présentation | Hero | **1920 × 720** | 2,67:1 | Hauteur 50vh |
| Entraînements | Hero | **1920 × 720** | 2,67:1 | Hauteur 45vh |
| Nous rejoindre | Hero | **1920 × 720** | 2,67:1 | Idem |
| Actualités | Hero | **1920 × 720** | 2,67:1 | Idem |
| Contact | Hero | **1920 × 720** | 2,67:1 | Idem |

> Pour les écrans Retina / 4K, tu peux préparer des versions **2560 × 1080** ou **3840 × 1080** et les servir en responsive.

---

## Cartes 3 colonnes (accueil)

| Emplacement | Usage | Résolution recommandée | Ratio |
|-------------|-------|------------------------|-------|
| Carte 1 | Entraînements | **800 × 600** | 4:3 |
| Carte 2 | Nous rejoindre | **800 × 600** | 4:3 |
| Carte 3 | Contact | **800 × 600** | 4:3 |

> Affichage en 4:3. Pour écrans haute résolution : **1200 × 900**.

---

## Bande CTA (accueil)

| Usage | Résolution recommandée | Ratio |
|-------|------------------------|-------|
| Image « Sur le tatami… » | **1920 × 600** | 3,2:1 |

> Hauteur ~50vh, largeur 100 %.

---

## Section JJB (page Présentation)

| Usage | Résolution recommandée | Ratio |
|-------|------------------------|-------|
| Photo JJB / Post club | **1024 × 768** | 4:3 |

> Image dans une colonne sur 2, largeur max ~512px en desktop.

---

## Section Programme (page Entraînements)

| Usage | Résolution recommandée | Ratio |
|-------|------------------------|-------|
| Photo BJJ à côté du texte | **800 × 600** | 4:3 |

---

## Encadrants (optionnel)

| Usage | Résolution recommandée | Format |
|-------|------------------------|--------|
| Photo encadrant | **400 × 400** | Carré |

> Pour l’instant, on affiche les initiales. Si tu ajoutes des photos, utilise ce format.

---

## Récapitulatif

| Type | Résolution | Quantité |
|------|------------|----------|
| Logo carré | 256 × 256 | 2 (version couleur + blanche) |
| Hero accueil | 1920 × 1080 | 1 |
| Hero pages | 1920 × 720 | 5 |
| Cartes accueil | 800 × 600 | 3 |
| Bande CTA | 1920 × 600 | 1 |
| Section JJB | 1024 × 768 | 1 |
| Section programme | 800 × 600 | 1 |
| Photos encadrants | 400 × 400 | 0 à 3 |

**Total : 10 à 13 images selon tes besoins.**

---

## Attributs HTML width/height

Les vues Blade utilisent des attributs `width` et `height` sur les images (hero, cartes, bande CTA, etc.) en cohérence avec ce tableau. Cela améliore les performances (réserve d’espace) et l’accessibilité. Si tu changes les résolutions recommandées ci‑dessus, mets à jour ces attributs dans les templates.

---

Les fichiers sont stockés dans `public/images/`. Tu peux remplacer les images existantes en gardant le même nom, ou mettre à jour les chemins dans la table `images` en base de données.
