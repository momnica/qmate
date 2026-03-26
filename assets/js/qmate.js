// QMate - Utility condivise

// Copia testo negli appunti
function copyToClipboard(text, btn) {
  navigator.clipboard.writeText(text).then(() => {
    const orig = btn.textContent;
    btn.textContent = 'copiato!';
    setTimeout(() => btn.textContent = orig, 1500);
  });
}

// Leggi/scrivi codici trovati nel localStorage
function getSavedCodes() {
  try { return JSON.parse(localStorage.getItem('qmate_codes') || '{}'); }
  catch(e) { return {}; }
}
function saveCode(slot, code) {
  const codes = getSavedCodes();
  codes[slot] = code;
  localStorage.setItem('qmate_codes', JSON.stringify(codes));
}
function countSavedCodes() {
  return Object.keys(getSavedCodes()).length;
}

// Aggiorna i progress dots
function updateDots(found) {
  for (let i = 1; i <= 5; i++) {
    const el = document.getElementById('pd' + i);
    if (!el) continue;
    if (i < found)      el.className = 'prog-dot pd-done';
    else if (i === found) el.className = 'prog-dot pd-active';
    else                  el.className = 'prog-dot pd-inactive';
  }
  const lbl = document.getElementById('prog-lbl');
  if (lbl) lbl.textContent = 'trovata ' + found + ' di 5';
}
