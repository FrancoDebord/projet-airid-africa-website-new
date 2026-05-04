# Cree un depot PUBLIC sur TON compte GitHub et pousse la branche actuelle.
# Pre-requis (une seule fois) : gh auth login
# Usage : depuis la racine du projet :
#   .\scripts\publish-public-repo-2026.ps1
# Optionnel : .\scripts\publish-public-repo-2026.ps1 -RepoName "2026-airid-africa-website"

param(
    [string]$RepoName = "2026-airid-africa-website",
    [string]$RemoteName = "github2026"
)

$ErrorActionPreference = "Stop"
$gh = "C:\Program Files\GitHub CLI\gh.exe"
if (-not (Test-Path $gh)) {
    $gh = "gh"
}

$null = & $gh auth status 2>&1
if ($LASTEXITCODE -ne 0) {
    Write-Host "Connecte-toi a GitHub une fois avec : gh auth login" -ForegroundColor Yellow
    exit 1
}

$root = Split-Path -Parent (Split-Path -Parent $MyInvocation.MyCommand.Path)
Set-Location $root

$branch = (git rev-parse --abbrev-ref HEAD).Trim()
Write-Host "Branche courante : $branch" -ForegroundColor Cyan

if (git remote get-url $RemoteName 2>$null) {
    git remote remove $RemoteName
}

& $gh repo create $RepoName --public --source . -r $RemoteName --push -d "AIRID Africa website (Laravel) - snapshot 2026"
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

$user = (& $gh api user --jq .login).Trim()
Write-Host "OK : https://github.com/$user/$RepoName" -ForegroundColor Green
