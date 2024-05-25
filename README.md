# MyMediaLib
- - -

### Beschrijving

Dit project is gemaakt met behulp van Laravel 11, Filament, Blueprint en TailwindCSS. Het is een simpele CRUD applicatie waarbij je images kan toevoegen, bewerken en verwijderen.
- - -

### Documentatie:

#### Installatie

1. `git clone https://github.com/Tjardo18/MyMediaLib`
2. Ga nu verder in de terminal van je VSCode.
3. `composer install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6.  Verander de database naam in het .env bestand
7.  `php artisan migrate`
8.  `yes`
9.  `php artisan storage:link`
10. `php artisan serve`
11. Ga naar `http://localhost:8000` in je browser.
12. Log in met de [inloggegevens](#inloggegevens).
13. Zelf een account aanmaken is ook mogelijk.

#### Hoe voeg ik één of meerdere foto's toe?

1. Log in met de [inloggegevens](#inloggegevens).
2. Klik op de knop `Photos` in de navigatiebalk.
3. Klik op `New photo`.
4. Sleep een afbeelding in het vak of klik op `Browser`.
5. Als je op browser hebt geklikt, selecteer een of meerdere afbeeldingen en klik op `Open`.
6. In het midden van de afbeelding die je zojuist hebt geupload zie je een potloodje. Klik hierop om de afbeelding eventueel te bewerken.
7. Voeg een beschrijving toe. **LET OP:** Deze beschrijving komt bij elke afbeelding te staan die je nu aan het uploaden bent.
8. Klik nu op `Create`. Die knop zal pas werken als de afbeelding(en) klaar zijn met uploaden.
9. Je ziet nu de afbeelding(en) die je zojuist hebt geupload.

#### Hoe bekijk ik de afbeeldingen die ik heb geupload?

1. Log in met de [inloggegevens](#inloggegevens).
2. Klik op de knop `Photos` in de navigatiebalk.
3. Klik op de record van de afbeelding die je wilt bekijken.
4. Of: Klik op de 3 puntjes bij de record van de afbeelding die je wilt bekijken en klik op `View`.

#### Hoe bewerk of verwijder ik de afbeeldingen die ik heb geupload?

1. Log in met de [inloggegevens](#inloggegevens).
2. Klik op de knop `Photos` in de navigatiebalk.
3. Klik op de 3 puntjes bij de record van de afbeelding die je wilt verwijderen/bewerken.
4. Klik nu op Edit of Delete.
5. In het geval van verwijderen zal er nog een bevestigings scherm komen. Klik op `Confirm` om de afbeelding te verwijderen.


# Inloggegevens:

- **Email:** `admin@user.com`
- **Password:** `password`