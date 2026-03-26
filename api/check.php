<?php
// QMate - API validazione codici
// Endpoint: /api/check.php
// Metodo: POST JSON { "codes": ["QMXT","RMCS","WKPL","BNTZ","XVQR"] }

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit(0); }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Metodo non consentito']);
    exit;
}

$body = json_decode(file_get_contents('php://input'), true);
if (!$body || !isset($body['codes']) || !is_array($body['codes'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dati non validi']);
    exit;
}

// Carica i codici validi dal file JSON
$dataFile = __DIR__ . '/../data/codes.json';
$data = json_decode(file_get_contents($dataFile), true);

$validCodes = [];
foreach ($data['sets'] as $set) {
    foreach ($set['shirts'] as $shirt) {
        $validCodes[] = strtoupper($shirt['code']);
    }
}

// Controlla i codici ricevuti
$submitted = array_map('strtoupper', $body['codes']);
$found     = array_intersect($submitted, $validCodes);
$missing   = array_diff($validCodes, $submitted);
$invalid   = array_diff($submitted, $validCodes);
$allFound  = count($missing) === 0 && count($submitted) === count($validCodes);

if ($allFound) {
    echo json_encode([
        'success'  => true,
        'message'  => 'Tutti i codici sono corretti!',
        'redirect' => '/secret/index.html'
    ]);
} else {
    echo json_encode([
        'success'  => false,
        'found'    => count($found),
        'total'    => count($validCodes),
        'invalid'  => array_values($invalid),
        'message'  => 'Alcuni codici non sono corretti o mancanti.'
    ]);
}
