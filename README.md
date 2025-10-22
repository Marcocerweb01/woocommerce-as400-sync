# WooCommerce AS400 Sync

Plugin WordPress/WooCommerce per la sincronizzazione automatica dei prodotti dal gestionale AS400.

## Caratteristiche

- ✅ Sincronizzazione automatica prodotti 2 volte al giorno
- ✅ Lettura file da FTP (Tab_art, Tab_fr, Tab_fm, Tab_cm)
- ✅ Creazione, aggiornamento e rimozione prodotti
- ✅ Gestione automatica categorie e marchi
- ✅ Sistema di log completo
- ✅ Pannello di controllo WordPress
- ✅ Sincronizzazione manuale on-demand

## Struttura File AS400

### tab_art.txt - Articoli
```
Codice|Descrizione|Descrizione Estesa|ID_Categoria|ID_Famiglia|Campo6|ID_Fornitore|Data
```

### tab_fr.txt - Fornitori/Marchi
```
ID|Nome Fornitore
```

### tab_fm.txt - Famiglie Merceologiche
```
ID|Nome Famiglia
```

### tab_cm.txt - Categorie Merceologiche
```
ID|Nome Categoria
```

## Installazione

1. Scarica il plugin
2. Carica la cartella `woocommerce-as400-sync` in `/wp-content/plugins/`
3. Attiva il plugin dal pannello WordPress
4. Vai su **WooCommerce > AS400 Sync** per configurare
5. Inserisci le credenziali FTP
6. Esegui la prima sincronizzazione manuale di test

## Configurazione

Nel pannello di controllo inserisci:

- **FTP Host**: ftp.sciattella.net
- **FTP User**: sciattella.1
- **FTP Password**: [la tua password]
- **Percorso file**: /httpdocs/data/upload

## Utilizzo

### Sincronizzazione Manuale
Vai su **WooCommerce > AS400 Sync** e clicca su "Sincronizza Ora"

### Sincronizzazione Automatica
Il plugin esegue automaticamente la sincronizzazione 2 volte al giorno tramite WP Cron.

## Log

I log delle sincronizzazioni sono disponibili nel pannello di controllo.

## Requisiti

- WordPress 5.0+
- WooCommerce 4.0+
- PHP 7.4+
- Estensione PHP FTP abilitata

## Supporto

Per problemi o domande, apri una issue su GitHub.

## Licenza

GPL v2 or later