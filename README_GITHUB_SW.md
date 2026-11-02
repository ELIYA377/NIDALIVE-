# NIDA MASTER WEBAPP V4 — GitHub + InfinityFree

Huu ni mradi wa PHP + MySQL. **GitHub Pages haiendeshi PHP**; GitHub hapa hutunza code na GitHub Actions huipeleka kwenye InfinityFree kupitia FTP.

## Kabla ya kuanza
- InfinityFree hosting account inayofanya kazi.
- GitHub account na repository mpya (iwe Private inapowezekana).
- MySQL database tayari imeundwa kwenye InfinityFree.
- `database.sql` ime-importiwa mara moja kwenye database hiyo kupitia phpMyAdmin.

## 1. Weka mafaili GitHub
1. Pakua ZIP hii na ifungue.
2. GitHub > New repository. Ipe jina `nida-master-webapp`; chagua **Private**.
3. Upload mafaili yote ya ZIP yaliyotolewa (ikiwemo folder `.github`). Hakikisha `index.php` iko kwenye mzizi wa repository, si ndani ya folder jingine.
4. Commit kwenye branch `main`.

## 2. Weka GitHub Secrets
Repository > Settings > Secrets and variables > Actions > New repository secret. Ongeza secrets hizi kwa majina halisi:

- `FTP_SERVER` — FTP hostname kutoka InfinityFree (usiibuni).
- `FTP_USERNAME` — FTP username.
- `FTP_PASSWORD` — FTP password.
- `DB_HOST` — MySQL hostname kutoka InfinityFree Control Panel.
- `DB_NAME` — jina kamili la database.
- `DB_USER` — MySQL username.
- `DB_PASS` — MySQL password.

Usiweke password kwenye code, README, au ujumbe wa chat.

## 3. Deploy
1. Fungua repository > Actions.
2. Chagua workflow **Deploy PHP app to InfinityFree**.
3. Bonyeza **Run workflow** (au fanya commit mpya kwenye `main`).
4. Subiri mpaka hatua zote ziwe na alama ya kijani.
5. Fungua domain yako. Mafaili yatakuwa ndani ya `/htdocs/`.

Workflow inasawazisha mafaili ya mradi kwenye `htdocs`, lakini haitafuta mafaili mengine kwa kutumia `dangerous-clean-slate`.

## 4. Database
`database.sql` haipakuliwi na workflow. Import mara moja kupitia phpMyAdmin: chagua database yako > Import > chagua `database.sql` > Go.

## 5. Tahadhari za usalama
- Weka repository Private.
- Tumia HTTPS kwenye domain.
- Usichapishe FTP/MySQL secrets.
- Baada ya deploy ya kwanza, hakikisha akaunti ya admin ya mwanzo inabadilishwa kwa utaratibu salama na futa `admin/create_admin.php` kama setup yake imetumika.
- Huu ni mfumo wa kupokea na kusimamia maombi tu. Hauna NIDA API wala mobile-money API. Matokeo ya NIDA yawekwe tu baada ya uthibitisho kupitia njia rasmi iliyoidhinishwa na ridhaa ya mhusika. Top-up za simu zinathibitishwa na admin kwa mkono.

## Deploy ya mkono bila GitHub Actions
Kama hutaki kutumia Actions, tengeneza `config/config.php` kwa kunakili `config/config.php.example`, jaza MySQL details, kisha tumia FTP ku-upload mafaili yote kwenye `/htdocs/`. Usipakie faili ya mfano badala ya config halisi.
