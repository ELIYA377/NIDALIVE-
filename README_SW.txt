NIDA MASTER WEBAPP V4 - INFINITYFREE READY (PHP + MYSQL + PWA)

MUHIMU: Hii ni portal ya kupokea na kusimamia maombi. HAIJAUNGANISHWA na API ya NIDA wala payment gateway. Admin aweke matokeo tu baada ya kutumia chanzo rasmi kilichoidhinishwa na kupata idhini ya mhusika. Usitumie mfumo kupata taarifa binafsi bila ruhusa.

MAUDHUI
- Usajili: majina matatu, simu na PIN ya tarakimu 4-6.
- Login kwa simu + PIN.
- Maombi ya uhakiki na majibu ndani ya akaunti husika.
- Credits: ombi moja linatumia credits 5 (badilisha config/config.php).
- User anaomba top-up; Admin anathibitisha kwa mkono baada ya kuhakiki malipo.
- Admin anaweza kuongeza/kukata credits na kuona historia.
- PWA kwa kusakinisha kwenye Android kupitia Chrome.

KUWEKA INFINITYFREE
1. InfinityFree > Hosting Account > Control Panel > MySQL Databases.
2. Tengeneza database. Nakili MySQL Hostname, Database Name, Username na Password.
3. Fungua phpMyAdmin kutoka sehemu ya MySQL Databases. Chagua database uliyotengeneza.
4. Import database.sql. Faili hii haina CREATE DATABASE/USE; chagua database kwanza.
5. Upload faili zote za ZIP moja kwa moja ndani ya htdocs (si public_html). Baada ya Extract, index.php lazima iwe moja kwa moja ndani ya htdocs, na folders config, includes, admin, assets pia ziwe hapo.
6. Fungua htdocs/config/config.php na jaza DB_HOST, DB_NAME, DB_USER, DB_PASS kwa taarifa za InfinityFree. Usitumie localhost; tumia MySQL Hostname iliyoonyeshwa kwenye Control Panel.
7. Fungua domain yako kwa HTTPS.
8. Badilisha secret kwenye admin/create_admin.php kutoka CHANGE-THIS-TO-A-LONG-RANDOM-SECRET kwenda siri ndefu yako. Fungua https://DOMAIN-YAKO/admin/create_admin.php?key=SIRI-YAKO mara moja.
9. Admin ya mwanzo: simu 0000000000, PIN 739184. Ingia kisha badilisha PIN ya admin kwa hash kupitia SQL; kisha futa admin/create_admin.php mara moja.
10. User: https://DOMAIN-YAKO/ ; Admin: https://DOMAIN-YAKO/admin/

KAMA FILE MANAGER INASEMA UPLOAD FAILED
- Hilo si kosa la PHP. Jaribu FTP (FTP hostname/username/password kutoka InfinityFree Control Panel), au tumia File Manager kupakia mafaili yaliyotolewa kwenye ZIP badala ya ZIP nzima.
- Hakikisha unaingia folder htdocs.

KUMBUKA
- M-Pesa/Tigo Pesa/Airtel Money/HaloPesa ni maombi ya top-up yanayothibitishwa na Admin, si malipo ya moja kwa moja.
- Namba ya simu peke yake haiwezi kutoa NIDA.
- Washa HTTPS; usishiriki password za database au PIN.
