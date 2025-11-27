Here is your text rewritten in **clean, structured Markdown format**:

---

# 🎯 Objectif du Projet

L’objectif du projet est de réaliser un **module de gestion des articles** pour un site de type blog, avec :

* une **architecture en couches** : **Controller → Service → Modèle**,
* un **éditeur de texte riche** (type *Summernote*) pour le contenu des articles,
* **aucun système de connexion** : tous les articles sont automatiquement associés à un **utilisateur Admin** existant en base.

Ce module sert de **back-office simple**, utilisé uniquement par le formateur ou l’admin, mais **sans authentification technique**.

---

# 🔧 Architecture (couche Service)

L’application doit respecter une **séparation claire des responsabilités** :

## 🟦 Controller

* Gère les routes HTTP (liste, création, édition, suppression).
* Sert d’interface entre la requête, le **ArticleService** et les vues.
* **Ne contient aucune logique métier.**

## 🟩 Service : ArticleService

Contient toute la **logique métier** liée aux articles :

* création / mise à jour d’un article,
* application des recherches et filtres (catégorie, statut),
* préparation de la pagination.

Le Service doit aussi :

* récupérer l’**utilisateur Admin par défaut** (ex. `User::where('role', 'admin')->first()` ou ID fixé),
* attribuer cet Admin comme **auteur** de chaque nouvel article.

## 🟧 Modèles / Eloquent

Modèles utilisés :

* `Article`
* `Category`
* `User`

### Relations

* **Article ↔ Category** : *many-to-many*
* **Article ↔ User (auteur)** : *many-to-one*

---

# 📝 Fonctionnalités principales

## 🗂 CRUD des articles

* Créer un article
* Afficher la liste des articles
* Modifier un article
* Supprimer un article

### Attributs d’un article

* Titre
* Contenu (texte riche, HTML)
* Statut (ex. : *Brouillon*, *Publié*)
* Auteur (assigné automatiquement à l’Admin)
* Dates de création / mise à jour

---

# 🏷️ Catégories

* Gestion d’une liste de catégories (créées à l’avance ou via un CRUD séparé).
* Lors de l’ajout / édition d’un article :

  * possibilité de sélectionner **plusieurs catégories** (checkboxes ou multi-select).

---

# 🔍 Recherche & Filtres

* Recherche textuelle sur le **titre** (et éventuellement le contenu).
* Filtre par **catégorie** : afficher uniquement les articles correspondants.
* Optionnel : filtre par **statut** (Brouillon / Publié).
* Possibilité de **combiner** :

  * recherche + catégorie (+ statut).

---

# 📄 Pagination

* Liste paginée (ex. 5 ou 10 articles par page).
* Navigation classique : page suivante / précédente, etc.

---

# 🖊️ Édition en Texte Riche (Summernote)

Le formulaire de création / modification doit intégrer un **éditeur WYSIWYG** :

Fonctionnalités minimales :

* gras
* italique
* listes
* titres
* liens
* paragraphes

Le contenu HTML généré doit être **enregistré en base**, puis affiché dans les pages avec :

```php
{!! $article->content !!}
```

(important pour ne pas échapper le HTML)

---


