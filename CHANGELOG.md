# Changelog — Portfolio Daens Elliott

Toutes les modifications notables du projet sont documentées ici.

---

## [Non versionné] — 2026-02

### Ajouté
- **Page Données admin** (`/admin/donnees`) : résumé des tables BDD (Projets, Contacts, Expériences, Formations) avec compteurs et liens Liste / Créer.
- **Footer** : section Réseaux (LinkedIn, GitHub) avec hover, section « Restez informé », barre basse Copyright + Admin.
- **Admin** : footer cohérent dans le layout (lien « Voir le site »), cartes dashboard avec animation au survol.

### Modifié
- **Mode sombre admin** : fonds forcés en `!important` (sidebar, header, main, footer, cartes, tableaux, formulaires) pour supprimer les carrés blancs.
- **Footer** : suppression de la navigation (Accueil, À propos, CV, etc.) ; grille en 3 colonnes (Logo, Réseaux, Restez informé).
- **Layout admin** : sidebar avec lien « Données », styles dark mode renforcés.

### Technique
- Stack : Laravel, Vite, Tailwind CSS.
- Dark mode : classe `dark` sur `<html>`, persistance `localStorage`.

---

## Historique

- **2026** : Refontes header (glassmorphism, menu mobile), footer, pages admin (sidebar, page Données), harmonisation CV/Contact/Accueil.
