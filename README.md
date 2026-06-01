# XML API projekt
Sidan går att besöka på https://wwwlab.webug.se/xmlapi/b23sebth/Projekt/index.php 

Projektet använder DOM samt [Github-service](https://wwwlab.webug.se/examples/XML/githubservice/)

## Uppgiftskrav (G):
1. Varje webbtjänst har ett antal endpoints (minst 3) Du ska använda 3 av de endpoints som din webbtjänst erbjuder. Man behöver inte ha använt alla sökvarianter (exv. alternativ för att visa allt (tex ALL) är mest nyttigt när man testar för hand i webbläsaren så de söktermerna behöver ej användas). Alla element och alla attribut behöver inte visas upp i applikationen men huvuddelen skall användas på något sätt.
2. Applikationen skall ha flera olika vyer i mera komplexa webb-sidor eller flera olika under-sidor. (Flera forms behövs men man kan lägga upp det på oändligt många sätt, en sida kan ha flera forms, och en svarssida kan ha forms blandat med tabeller, och vi kan ha separata formulär och svar eller låta formulären referera sig själva.
3. Sökning skall användas på minst ett ställe (se Using search endpoints)
4. Dropdown skall användas på minst ett ställe (Dom/SAX/XSLT select dropdown example)
5. Länkar \<a href='test.php?id=7243'> skall användas på minst ett ställe (lämpligt för att komma till detaljvy exv för en specifik författare -- SAX / DOM / XSLT Link Creation Examples).
6. Tabeller skall användas för att representera data på skärmen (välj rad eller kolumn-layout)
7. Styling skall användas på de flesta elementen

### 1.
De tre endpoints som används är: REPOS, FILES och COMMITS.

### 2. 
Flera vyer med olika resultat finns, exempelvis filsökning eller en sida med alla commits av en viss användare.

### 3.
Sökning används för att söka efter ett specifikt commit-meddelande. Se bilden **Search Page** längre ner.

### 4. 
Dropdown används för att välja vilket repo som ska visas.

### 5.
Länkar används bland annat för att visa commits av en viss användare. *Browse commits by author* på **Homepage** längre ner.

### 6.
Tabeller används bland annat för att visa repo-information (rad-layout).

### 7.
Styling används på flertalet ställen. Designen är svagt inspirerad av Github med exempelvis färgvalen.

## Exempelbilder:
### Homepage:
![Homepage](/example_pictures/homepage.png)

### Repo Page (row-layout):
![Repo Page](/example_pictures/repo_page.png)

### Search page:
![Search Page](/example_pictures/search_page.png)

### Author Page:
![Author Page](/example_pictures/author_page.png)

