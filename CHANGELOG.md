# Changelog

Toutes les modifications notables du projet sont documentées ici.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/fr/1.0.0/), et le projet adhère au [Versioning Sémantique](https://semver.org/lang/fr/).

---

## [1.0.0] - 2026-02-19

### Ajouté

- **Site vitrine** Laravel pour Go Akademi (Académie Calaisienne de Jiu Jitsu Brésilien, Kosen Judo, Luta Livre).
- **Pages** : Accueil, L'Académie, Entraînements, Nous rejoindre, Actualités, Contact.
- **Layout pro** : navbar responsive avec menu hamburger sur mobile, footer avec coordonnées.
- **Mode sombre** : bascule au clic, persistance (localStorage), préférence système au premier chargement, transition 0,3 s.
- **Design Tailwind** : hero plein écran, bande rouge intro, cartes 3 colonnes (entraînements / rejoindre / contact), bande CTA image.
- **Accessibilité** : lien d’évitement, focus visible (ring), ARIA sur menu mobile et thème, attributs `width`/`height` sur les images.
- **Performance** : lazy loading des images hors hero, build Vite (CSS/JS).
- **Admin** : espace protégé (login), gestion des contenus (horaires, lieux, tarifs, encadrants, actualités, images).
- **Documentation** : README_DEV (build / hot reload), RESOLUTIONS_IMAGES (référence des images).

### Technique

- Laravel (PHP), Tailwind CSS v4, Vite 7.
- Thème visuel : variables CSS (light/dark), couleurs Go Akademi (rouge / noir).

---

## [Unreleased]

- Aucune modification en attente pour l’instant.

[1.0.0]: https://github.com/ElliottDaens/site_go_akademi/releases/tag/v1.0.0
