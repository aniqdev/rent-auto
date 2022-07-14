<?php

namespace Database\Seeders;

use App\Models\Tab;
use Illuminate\Database\Seeder;

class TabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = Tab::create([
            'name' => 'Čas předání a vrácení vozidla',
            'text' => 'Vozidlo se předává první den pronájmu vždy v 16,00. Může nastat případ, že v tento čas odjíždí více vozidel, pak systém sám posune čas převzetí na 16,30, 17,00, 17,30, atp., nejdéle však ve 20,00. Vozidlo vracíte poslední den pronájmu vždy do 12,00. (V případě Týdenního režimu do 10,00). V době mimo sezonu A lze „přikoupit“ jednotlivé hodiny navíc za 200 Kč/hodinu (vrátit později nebo vypůjčit dříve). V sezoně A lze „dokoupit“ pouze celý další den. Den vypůjčení a vrácení vozidla účtujeme za polovinu, neúčtujeme žádné další sevisní poplatky.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Dokumenty k pronájmu',
            'text' => 'Smlouva o pronájmu vozidla, Všeobecné smluvní podmínky a v případě právnické osoby Ručitelské prohlášení. Odkaz na stažení všech těchto dokumentů obdržíte mailem po přijetí rezervace. Dvě podepsaná vyhotovení každého dokumentu nám odešlete poštou, my připojíme naše podpisy a odešleme vám jedno vyhotovení zpět. Při převzetí a vrácení vozidla je podepsán Předávací protokol.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Domácí zvířata',
            'text' => 'Vaše mazlíčky si určitě můžete vzít s sebou. V tomto případě ale prosíme o důsledný úklid vnitřku vozidla (především od chlupů). Počítejte s tím, že při vrácení vozidlo uvnitř důkladněji prohlédneme.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Nájemce a řidič',
            'text' => 'Nájemcem může být fyzická nebo právnická osoba. Řidičem může být buď nájemce, nebo i další spolucestující, vždy starší 21 let.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Nájemné zahrnuje',
            'text' => 'Neomezené ujeté kilometry, plyn (propan) v přiměřeném množství, WC chemii, povinné pojištění odpovědnosti z provozu vozidla, havarijní pojištění ALL RISK na území celé Evropy se spoluúčastí 10%, asistenční služby, dálniční známku ČR, rozsáhlé vybavení nástavby pro každodenní běžnou činnost v průběhu pronájmu (seznam vybavení naleznete výše).',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Platba za pronájem',
            'text' => '30% záloha je splatná do 3 pracovních dnů od přijetí rezervace. Pokud nebude včas zaplacena, bude vozidlo uvolněno pro další klienty. Doplatek pronájmu je nutno uhradit 30 dnů před převzetím vozidla. Pokud máte v plánu odjet do 1 měsíce od rezervace, je do 3 pracovních dnů od rezervace splatná celá částka pronájmu.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Pojištění vozidel',
            'text' => 'Vozidla jsou havarijně pojištěna, včetně odcizení a vandalismu, na území celé Evropy se spoluúčastí 10%, min.však 10.000 Kč. Spoluúčast hradí vždy nájemce. Veškeré škody vzniklé na vozidle třetími osobami (odcizení, poškození, vandalismus, dopravní nehoda) musí být vždy a v každém státě šetřeny policií a nájemce je povinen dodat písemný a čitelný protokol o této události. Více o pojištění vozidel, viz. Všeobecné smluvní podmínky, čl.IX.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Povinnosti nájemce při vrácení',
            'text' => 'Vozidlo je nutné vrátit s plnou nádrží pohonných hmot, vypuštěnou nádrží odpadní vody, vypuštěnou a vypláchnutou WC nádrží, umytým nádobím, zběžně čisté a uklizené. Nemusíte doplňovat spotřebovanou vodu, plyn, chemii, převlékat povlečení ani čistit vozidlo zvenčí.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Přistavení vozidla',
            'text' => 'Při pronájmech delších než 14 dní vám na vyžádání obytný vůz přivezeme do 150 km (dále dle dohody) od naší provozovny zdarma a po pronájmu si pro něj zase přijedeme. Tuto službu je nutné zvolit již v průběhu rezervace. V ostatních případech je přistavení vozidla na vyžádání zpoplatněno sazbou 20 Kč/1 km. Přistavení vozidla není možné u pronájmu obytných přívěsů!',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Pronájem na dny nebo týdny',
            'text' => 'Pokud nejsou vozidla vyčleněna pro Týdenní režim, jsou pronajímána v Denním režimu. Pronájem vozidla v Denním režimu je možný kdykoli, vypůjčení a vrácení je volitelné podle vás. Některá vozidla v hlavní sezóně A jsou vyčleněna pro Týdenní režim, kde je pronájem možný pouze na jeden týden (či násobky týdnů) s vypůjčením a vrácením vždy v pátek.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Rezervace pronájmu',
            'text' => 'Vozidlo si zarezervujete on-line v záložce Rezervace. V průběhu první rezervace je nutná registrace do systému, která slouží mj. k přiřazení slev za budoucí opakované pronájmy. Po úspěšném ukončení rezervace vám na uvedený e-mail přijde potvrzení o provedené rezervaci. Vybrané vozidlo je v tuto chvíli zarezervováno a systém ho dalším klientům nenabízí. Jakmile náš zaměstnanec přijme Vaši rezervaci, obratem obdržíte mailem pokyny k platbě a odkaz na nutné dokumenty k pronájmu.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Slevy',
            'text' => 'Věrnostní slevy: při 1.opakování 5% z celkové ceny pronájmu, při 2.opakování 10% z celkové ceny pronájmu, při 3. a dalším opakování 15% z celkové ceny pronájmu. Sleva za pronájem delší než 14 dnů: 10% z celkové ceny pronájmu. Podmínkou pro načtení věrnostní slevy jsou pronájmy o minimální délce 5 dnů.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Smluvní pronajímatelé',
            'text' => 'Pronájem některých (modrým pruhem označených)  vozů je realizován smluvním pronajímatelem. Garantuje stejné standardy kvality a služeb, jako při našem vlastním pronájmu. Konkrétní místo předání a vrácení vozidla je uvedeno v modrém pruhu na fotografii vozu a dále ve všech dokumentech. Jedná se o vozy LMC naprosto stejné kvality, jako naše vlastní, totéž platí o doplňkové výbavě. Vozy jsou půjčovány podle našich (tedy stejných) Všeobecných smluvních podmínek. Vozy jsou pravidelně udržovány a opravovány v našem servisním středisku. Pokud máte zájem stát se naším smluvním pronajímatelem, kontaktujte nás.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Stornopoplatky',
            'text' => '90 a více dnů – 10%, nejméně však 1.000 Kč. 30 až 89 dnů – 30%. 15 až 29 dnů – 50%. 7 až 14 dnů – 80%. 0 až 6 dnů – 95%. V průběhu rezervace si můžete zvolit pojištění stornopoplatků. Pojistné činí 10% z celkové ceny pronájmu a stornopoplatek se vlivem tohoto pojištění sníží na jednu desetinu.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Volitelná výbava',
            'text' => 'Nadstandardní výbavu, jako je kempový nábytek, GPS, gril, ložní výbavu, vysílačky, atd, si můžete zvolit v průběhu rezervace. Její seznam najdete v záložce Ceník.',
            'sort' => 0,
        ]);

        $tab = Tab::create([
            'name' => 'Vratná kauce',
            'text' => 'Kauce činí 30.000 Kč (obytný vůz), resp. 15.000 Kč (obytný přívěs). Kauce je splatná v hotovosti nejpozději při převzetí vozidla nájemcem a vrací se ihned při vrácení vozidla po bezeškodním průběhu pronájmu.',
            'sort' => 0,
        ]);
    }
}
