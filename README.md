# WooCommerce AS400 Sync Plugin

Plugin WordPress/WooCommerce per sincronizzazione automatica prodotti da gestionale AS400.

## Descrizione

Questo plugin sincronizza automaticamente i prodotti dal gestionale AS400 a WooCommerce, leggendo i file depositati via FTP due volte al giorno.

## Caratteristiche

- ✅ Sincronizzazione automatica prodotti (creazione, aggiornamento, rimozione)
- ✅ Gestione automatica categorie e famiglie merceologiche
- ✅ Gestione fornitori/marchi come attributi prodotto
- ✅ Sistema di log dettagliato
- ✅ Pannello di controllo in WordPress
- ✅ Cron job configurabile
- ✅ Sincronizzazione manuale disponibile

## File Sincronizzati

Il plugin legge questi file dalla cartella `/httpdocs/data/upload`:

- **Tab_art**: Anagrafica articoli
- **Tab_fr**: Fornitori/Produttori/Marchi
- **Tab_fm**: Famiglia merceologica
- **Tab_cm**: Categoria merceologica

## Struttura File

### tab_art.txt
```
Codice|Descrizione|Descrizione Estesa|ID_Categoria|ID_Famiglia|Campo_Vuoto|ID_Fornitore|Data_Aggiornamento
```

### tab_fr.txt
```
ID_Fornitore|Nome_Fornitore
```

### tab_fm.txt
```
ID_Famiglia|Nome_Famiglia
```

### tab_cm.txt
```
ID_Categoria|Nome_Categoria
```

## Installazione

1. Scarica il plugin
2. Carica la cartella `woocommerce-as400-sync` in `/wp-content/plugins/`
3. Attiva il plugin dal menu Plugin di WordPress
4. Vai su WooCommerce → AS400 Sync per configurare

## Configurazione

Nel pannello di amministrazione inserisci:

- Path della cartella file (default: `/httpdocs/data/upload`)
- Frequenza sincronizzazione (default: 2 volte al giorno)
- Opzioni di gestione prodotti rimossi

## Requisiti

- WordPress 5.0+
- WooCommerce 4.0+
- PHP 7.4+
- Accesso filesystem per leggere i file AS400

## Supporto

Per problemi o domande, apri una issue su GitHub.

## Licenza

GPL v2 o successiva