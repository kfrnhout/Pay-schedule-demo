# Pay-schedule-demo

Een simpele demo van een betaling planner, alles is vrij simpel gehouden en gemaakt vanaf de grond op in een korte tijd.

Deze is gemaakt op Ubuntu 18.04 met php 7.2. Dit project zou moeten werken op andere versies maar dat weet ik niet zeker.

<h3>Project eisen:</h3>

- Het project maakt een overzicht voor de uitbetaling van de maand salaris en bonussen
- Maand salaris word uitbetaald op de laatste dag van de maand, tenzij dat een weekend is en word dan eerder betaald.
- Bonussen worden uitbetaald op de 15de, tenzij dat een weekend in en word dan op de volgende woensdag betaald.

<h3>Gebruik:</h3>

- Download het bestand.
- Instaleer php.
- via de terminal navigeer naar de map dat het bestand in staat.
- Roep het aan via “php Payprinter.php”.
- Een bestand “PayDates.csv” zal dan worden gemaakt in de zelfde map als het bestand met de data van het huidige jaar.
- Indien een ander jaar is gewenst kan je een jaartal achter het commando zetten ex. “php Payprinter.php 2020” voor het overzicht van 2020.
- Een tweede jaartal kan worden gegeven om meerdere jaren tegelijk te maken ex. “php Payprinter.php 2020 2022” voor het overzicht van 2020 t/m 2022.
