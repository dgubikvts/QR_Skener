<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \DB::table('products')->insert([
            [
                'naziv' => "Vijak za ivericu ravna glava",
                'opis' => "Vijak za drvo-ivericu sa ravnom-cilindričnom glavom.<br><br>500kom",
                'cena' => 1716,
                'barcode' => "9535267511200"
            ],
            [
                'naziv' => "Vijak za lim Din 7504-K",
                'opis' => "Šraf višeg kvaliteta LIH LIN.<br><br>1000kom",
                'cena' => 2209,
                'barcode' => "9974742054571"
            ],
            [
                'naziv' => "Vijak za lim Din 7504-K sa podloškom",
                'opis' => "Šraf kome je podloška već namontirana. Cena šrafa je sa podloškom. Šraf višeg kvaliteta LIH LIN.<br><br>500kom",
                'cena' => 2920,
                'barcode' => "7610331318731"
            ],
            [
                'naziv' => "Vijak za lim Din 7976 bez burgije",
                'opis' => "Šraf za metal sa šestougaonom glavom bez burgije. Proizvođač Friulsider.<br><br>200kom",
                'cena' => 1372,
                'barcode' => "7114931643458"
            ],
            [
                'naziv' => "Vijak šraf za lim DIN 7504-N",
                'opis' => "Šraf je extra kvaliteta. Šraf samorezac sa cilindričnom-ravnom glavom. PH prihvat. Proizvođač Friulsiter.<br><br>500kom",
                'cena' => 730,
                'barcode' => "9432132234922"
            ],
            [
                'naziv' => "WF Vijak za lim široka glava KOELNER",
                'opis' => "Šraf sa širokom glavom, bez burgije za lim, plastiku. Proizvođač KOELNER.<br><br>1000kom",
                'cena' => 1176,
                'barcode' => "7878794044844"
            ],
            [
                'naziv' => "Mašinski vijak 053/933 kvalitet 5.6",
                'opis' => "Šraf-vijak sa navojem po celoj dužini, kvalitet čelika 5,6. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>500kom",
                'cena' => 1200,
                'barcode' => "8277705540366"
            ],
            [
                'naziv' => "Mašinski vijak 051/931 kvalitet 10.9",
                'opis' => "Šraf-vijak delimičan navoj, kvalitet čelika 10.9. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>200kom",
                'cena' => 4320,
                'barcode' => "7424729409013"
            ],
            [
                'naziv' => "Vijak 103/84 sa cilindričnom glavom za ravan prihvat",
                'opis' => "Vijak-šraf sa cilindričnom glavom. Dužina šrafa se meri bez glave. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>1000kom",
                'cena' => 564,
                'barcode' => "7146197004452"
            ],
            [
                'naziv' => "Mašinski vijak 051/931 kvalitet 5.6",
                'opis' => "Šraf-vijak delimičan navoj, kvalitet čelika 5,6. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>100kom",
                'cena' => 3300,
                'barcode' => "8853949432546"
            ],
            [
                'naziv' => "Vijak za raonik",
                'opis' => "Vijak sa ravnom glavom i četvrtkom ispo glave.Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>100kom",
                'cena' => 4166,
                'barcode' => "7646346251121"
            ],
            [
                'naziv' => "Kina Torban vijak",
                'opis' => "Torban vijak za drvo. Kvalitet čelika 4.6<br><br>500kom",
                'cena' => 1440,
                'barcode' => "5592000022540"
            ],
            [
                'naziv' => "Kina salonit-šraf sa šestougaonom glavom-Salonit vijak",
                'opis' => "Dužina navoja = dužina šrafa x0,6<br><br>200kom",
                'cena' => 2164,
                'barcode' => "7176659705320"
            ],
            [
                'naziv' => "Turbo vijak sa OK glavom R-LX",
                'opis' => "Turbo vijak ima slične nosivosti kao anker.Visoke perfomanse za male prečnike rupa. Male ekpenacione sile omogućavaju ugradnju blizu ivica betona i malo odstojanje susednih rupa. Može se koristiti za vizuelnu proveru, da bi se odredila precizan položaj onoga što želimo da fiksiramo.<br><br>100kom",
                'cena' => 2376,
                'barcode' => "5114953218605"
            ],
            [
                'naziv' => "Vijak 118/7985 sa cilindričnom glavom krstasti",
                'opis' => "Vijak-šraf sa cilindričnom glavom. Dužina šrafa se meri bez glave. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>1000kom",
                'cena' => 726,
                'barcode' => "1118211064977"
            ],
            [
                'naziv' => "Vijak 136 sa konusnom glavom krstasti",
                'opis' => "Vijak-šraf sa konusnom/upuštenom glavom. Dužina šrafa se meri sa glavom. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>1000kom",
                'cena' => 552,
                'barcode' => "5835482766145"
            ],
            [
                'naziv' => "Inbus Vijak 120/912 bruniran kvalitet 8.8",
                'opis' => "Inbus šrafovima je po standardu određena dužina navoja, pogledajte TEHNIČKI CRTEŽ. Mi u našoj ponudi imamo i van standardne dužine navoja i nazvali smo ih 'SKROZ-NAVOJ'<br><br>250kom",
                'cena' => 2434,
                'barcode' => "8088387398486"
            ],
            [
                'naziv' => "Inbus Vijak 120/912 Zn kvalitet 8.8",
                'opis' => "Inbus šrafovima je po standardu određena dužina navoja, pogledajte TEHNIČKI CRTEŽ.<br><br>200kom",
                'cena' => 2505,
                'barcode' => "9780201379624"
            ],
            [
                'naziv' => "Inbus Vijak 126/7991 bruniran kvalitet 10.9",
                'opis' => "inbus vijak-šraf sa konusnom glavom. Pogledajte Tehnički crtež<br><br>500kom",
                'cena' => 3576,
                'barcode' => "92200070903679"
            ],
            [
                'naziv' => "WFS Vijak sa širokom glavom i Burgijom KOELNER",
                'opis' => "Šraf samorezac za lim, plastiku sa širokom glavom plus burgija. Proizvođač KOELNER.<br><br>1000kom",
                'cena' => 1548,
                'barcode' => "6456704621494"
            ],
            [
                'naziv' => "Vijak šraf za lim DIN 750-P",
                'opis' => "Šraf je extra kvaliteta. Šraf samorezac, sa upuštenom glavom. PH prihvat. Proizvođač Friulsiter.<br><br>500kom",
                'cena' => 680,
                'barcode' => "9068774781731"
            ],
            [
                'naziv' => "Vijak šraf za lim DIN 7982 SRPS 465",
                'opis' => "Šraf je extra kvaliteta. Šraf bez burgije, sa upuštenom glavom. PH prihvat. Proizvođač Friulsiter.<br><br>1000kom",
                'cena' => 842,
                'barcode' => "7532282692602"
            ]
        ]);
    }
}
