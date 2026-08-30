$baseUrl = "https://fonts.bunny.net/instrument-sans/files/"
$files = @(
    "instrument-sans-latin-400-normal.woff2", "instrument-sans-latin-400-normal.woff",
    "instrument-sans-latin-ext-400-normal.woff2", "instrument-sans-latin-ext-400-normal.woff",
    "instrument-sans-latin-500-normal.woff2", "instrument-sans-latin-500-normal.woff",
    "instrument-sans-latin-ext-500-normal.woff2", "instrument-sans-latin-ext-500-normal.woff",
    "instrument-sans-latin-600-normal.woff2", "instrument-sans-latin-600-normal.woff",
    "instrument-sans-latin-ext-600-normal.woff2", "instrument-sans-latin-ext-600-normal.woff"
)
foreach ($file in $files) {
    $outPath = "public/fonts/instrument-sans/" + $file
    Write-Host "Downloading $file to $outPath..."
    Invoke-WebRequest -Uri ($baseUrl + $file) -OutFile $outPath
}

$orbitronFiles = @{
    "orbitron-400.ttf" = "https://fonts.gstatic.com/s/orbitron/v35/yMJMMIlzdpvBhQQL_SC3X9yhF25-T1nyGy6xpg.ttf";
    "orbitron-500.ttf" = "https://fonts.gstatic.com/s/orbitron/v35/yMJMMIlzdpvBhQQL_SC3X9yhF25-T1nyKS6xpg.ttf";
    "orbitron-600.ttf" = "https://fonts.gstatic.com/s/orbitron/v35/yMJMMIlzdpvBhQQL_SC3X9yhF25-T1nyxSmxpg.ttf";
    "orbitron-700.ttf" = "https://fonts.gstatic.com/s/orbitron/v35/yMJMMIlzdpvBhQQL_SC3X9yhF25-T1ny_Cmxpg.ttf";
    "orbitron-800.ttf" = "https://fonts.gstatic.com/s/orbitron/v35/yMJMMIlzdpvBhQQL_SC3X9yhF25-T1nymymxpg.ttf";
    "orbitron-900.ttf" = "https://fonts.gstatic.com/s/orbitron/v35/yMJMMIlzdpvBhQQL_SC3X9yhF25-T1nysimxpg.ttf"
}
foreach ($name in $orbitronFiles.Keys) {
    $outPath = "public/fonts/orbitron/" + $name
    Write-Host "Downloading $name to $outPath..."
    Invoke-WebRequest -Uri $orbitronFiles[$name] -OutFile $outPath
}
