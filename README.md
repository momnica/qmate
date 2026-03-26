# QMate.fun — Guida al caricamento su Namecheap

## Struttura del progetto

```
qmate/
├── index.html              ← Homepage (con gestione ?t=N da QR code)
├── assets/
│   ├── css/qmate.css       ← Stili globali
│   └── js/qmate.js         ← Funzioni condivise
├── t/
│   ├── 1.html              ← Maglietta #1 (Logica)
│   ├── 2.html              ← Maglietta #2 (Cultura Nerd)
│   ├── 3.html              ← Maglietta #3 (HTML facile)
│   ├── 4.html              ← Maglietta #4 (Indovinello)
│   └── 5.html              ← Maglietta #5 (Finale)
├── unlock/
│   └── index.html          ← Pagina inserimento 5 codici
├── secret/
│   └── index.html          ← Pagina segreta anni 90 🎉
├── api/
│   └── check.php           ← Validazione codici (PHP)
└── data/
    └── codes.json          ← Codici e configurazione set
```

---

## Come caricare su Namecheap

### Via File Manager (più semplice)
1. Accedi al pannello Namecheap → **cPanel**
2. Vai su **File Manager**
3. Entra nella cartella **public_html**
4. Carica tutti i file mantenendo la struttura delle cartelle
5. Il sito sarà raggiungibile su `qmate.fun`

### Via FTP con FileZilla
1. Scarica FileZilla: https://filezilla-project.org
2. Dal cPanel di Namecheap copia le credenziali FTP
3. Connettiti e trascina la cartella dentro `public_html`

---

## QR Code da stampare sulle magliette

**IMPORTANTE:** tutti i QR code puntano alla homepage con un parametro.
I ragazzi vedono prima le istruzioni, poi cliccano "Iniziamo!".

Genera i QR code su https://www.qr-code-generator.com con questi URL:

| Maglietta | URL da usare              |
|-----------|---------------------------|
| #1        | `https://qmate.fun/?t=1`  |
| #2        | `https://qmate.fun/?t=2`  |
| #3        | `https://qmate.fun/?t=3`  |
| #4        | `https://qmate.fun/?t=4`  |
| #5        | `https://qmate.fun/?t=5`  |

---

## Le domande (e le risposte corrette)

| # | Tipo            | Domanda                                         | Risposta |
|---|-----------------|--------------------------------------------------|----------|
| 1 | Logica          | Quale scatola è più leggera? (rossa>blu>verde)  | Verde (C)|
| 2 | Cultura nerd    | Cosa fa Ctrl+Z?                                  | Annulla (B)|
| 3 | Coding facile   | Cosa significa il tag `<b>` in HTML?            | Grassetto (B)|
| 4 | Indovinello     | Da che parte cade l'uovo del gallo?             | I galli non depongono uova (C)|
| 5 | Cultura nerd    | Cosa significa "www"?                            | World Wide Web (A)|

---

## I codici segreti

| Maglietta | Codice |
|-----------|--------|
| #1        | QMXT   |
| #2        | RMCS   |
| #3        | WKPL   |
| #4        | BNTZ   |
| #5        | XVQR   |

Per cambiarli: aggiorna ogni file `t/N.html` (cerca `.secret-value`)
e la variabile `const VALID` in `unlock/index.html`.

---

## Come modificare una domanda

Apri `t/N.html` e modifica:
- Il testo nel tag `<p>` — la domanda
- I testi nei div `.option-text` — le 4 opzioni
- `const correct = 'x'` — la lettera corretta (a/b/c/d)
- Il testo nel blocco `if (chosen === correct)` — la spiegazione

---

Buona fortuna Monica! 🚀 — QMate.fun
