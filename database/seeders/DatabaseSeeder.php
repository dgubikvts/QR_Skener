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
                'title' => "Vijak za ivericu ravna glava",
                'image' => '/images/Sraf1.jpg',
                'desc' => "Vijak za drvo-ivericu sa ravnom-cilindričnom glavom.<br><br>500kom",
                'price' => 1716,
                'barcode' => "9535267511200"
            ],
            [
                'title' => "Vijak za lim Din 7504-K",
                'image' => '/images/Sraf2.jpg',
                'desc' => "Šraf višeg kvaliteta LIH LIN.<br><br>1000kom",
                'price' => 2209,
                'barcode' => "9974742054571"
            ],
            [
                'title' => "Vijak za lim Din 7504-K sa podloškom",
                'image' => '/images/Sraf3.jpg',
                'desc' => "Šraf kome je podloška već namontirana. cena šrafa je sa podloškom. Šraf višeg kvaliteta LIH LIN.<br><br>500kom",
                'price' => 2920,
                'barcode' => "7610331318731"
            ],
            [
                'title' => "Vijak za lim Din 7976 bez burgije",
                'image' => '/images/Sraf4.jpg',
                'desc' => "Šraf za metal sa šestougaonom glavom bez burgije. Proizvođač Friulsider.<br><br>200kom",
                'price' => 1372,
                'barcode' => "7114931643458"
            ],
            [
                'title' => "Vijak šraf za lim DIN 7504-N",
                'image' => '/images/Sraf5.jpg',
                'desc' => "Šraf je extra kvaliteta. Šraf samorezac sa cilindričnom-ravnom glavom. PH prihvat. Proizvođač Friulsiter.<br><br>500kom",
                'price' => 730,
                'barcode' => "9432132234922"
            ],
            [
                'title' => "WF Vijak za lim široka glava KOELNER",
                'image' => '/images/Sraf6.jpg',
                'desc' => "Šraf sa širokom glavom, bez burgije za lim, plastiku. Proizvođač KOELNER.<br><br>1000kom",
                'price' => 1176,
                'barcode' => "7878794044844"
            ],
            [
                'title' => "Mašinski vijak 053/933 kvalitet 5.6",
                'image' => '/images/Sraf7.jpg',
                'desc' => "Šraf-vijak sa navojem po celoj dužini, kvalitet čelika 5,6. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>500kom",
                'price' => 1200,
                'barcode' => "8277705540366"
            ],
            [
                'title' => "Mašinski vijak 051/931 kvalitet 10.9",
                'image' => '/images/Sraf8.jpg',
                'desc' => "Šraf-vijak delimičan navoj, kvalitet čelika 10.9. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>200kom",
                'price' => 4320,
                'barcode' => "7424729409013"
            ],
            [
                'title' => "Vijak 103/84 sa cilindričnom glavom za ravan prihvat",
                'image' => '/images/Sraf9.jpg',
                'desc' => "Vijak-šraf sa cilindričnom glavom. Dužina šrafa se meri bez glave. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>1000kom",
                'price' => 564,
                'barcode' => "7146197004452"
            ],
            [
                'title' => "Mašinski vijak 051/931 kvalitet 5.6",
                'image' => '/images/Sraf10.jpg',
                'desc' => "Šraf-vijak delimičan navoj, kvalitet čelika 5,6. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>100kom",
                'price' => 3300,
                'barcode' => "8853949432546"
            ],
            [
                'title' => "Vijak za raonik",
                'image' => '/images/Sraf11.jpg',
                'desc' => "Vijak sa ravnom glavom i četvrtkom ispo glave.Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>100kom",
                'price' => 4166,
                'barcode' => "7646346251121"
            ],
            [
                'title' => "Kina Torban vijak",
                'image' => '/images/Sraf12.jpg',
                'desc' => "Torban vijak za drvo. Kvalitet čelika 4.6<br><br>500kom",
                'price' => 1440,
                'barcode' => "5592000022540"
            ],
            [
                'title' => "Kina salonit-šraf sa šestougaonom glavom-Salonit vijak",
                'image' => '/images/Sraf13.jpg',
                'desc' => "Dužina navoja = dužina šrafa x0,6<br><br>200kom",
                'price' => 2164,
                'barcode' => "7176659705320"
            ],
            [
                'title' => "Turbo vijak sa OK glavom R-LX",
                'image' => '/images/Sraf14.jpg',
                'desc' => "Turbo vijak ima slične nosivosti kao anker.Visoke perfomanse za male prečnike rupa. Male ekpenacione sile omogućavaju ugradnju blizu ivica betona i malo odstojanje susednih rupa. Može se koristiti za vizuelnu proveru, da bi se odredila precizan položaj onoga što želimo da fiksiramo.<br><br>100kom",
                'price' => 2376,
                'barcode' => "5114953218605"
            ],
            [
                'title' => "Vijak 118/7985 sa cilindričnom glavom krstasti",
                'image' => '/images/Sraf15.jpg',
                'desc' => "Vijak-šraf sa cilindričnom glavom. Dužina šrafa se meri bez glave. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>1000kom",
                'price' => 726,
                'barcode' => "1118211064977"
            ],
            [
                'title' => "Vijak 136 sa konusnom glavom krstasti",
                'image' => '/images/Sraf16.jpg',
                'desc' => "Vijak-šraf sa konusnom/upuštenom glavom. Dužina šrafa se meri sa glavom. Kod STANDARDA imate prilog tehničkog crteža šrafa.<br><br>1000kom",
                'price' => 552,
                'barcode' => "5835482766145"
            ],
            [
                'title' => "Inbus Vijak 120/912 bruniran kvalitet 8.8",
                'image' => '/images/Sraf17.jpg',
                'desc' => "Inbus šrafovima je po standardu određena dužina navoja, pogledajte TEHNIČKI CRTEŽ. Mi u našoj ponudi imamo i van standardne dužine navoja i nazvali smo ih 'SKROZ-NAVOJ'<br><br>250kom",
                'price' => 2434,
                'barcode' => "8088387398486"
            ],
            [
                'title' => "Inbus Vijak 120/912 Zn kvalitet 8.8",
                'image' => '/images/Sraf18.jpg',
                'desc' => "Inbus šrafovima je po standardu određena dužina navoja, pogledajte TEHNIČKI CRTEŽ.<br><br>200kom",
                'price' => 2505,
                'barcode' => "9780201379624"
            ],
            [
                'title' => "Inbus Vijak 126/7991 bruniran kvalitet 10.9",
                'image' => '/images/Sraf19.jpg',
                'desc' => "inbus vijak-šraf sa konusnom glavom. Pogledajte Tehnički crtež<br><br>500kom",
                'price' => 3576,
                'barcode' => "92200070903679"
            ],
            [
                'title' => "WFS Vijak sa širokom glavom i Burgijom KOELNER",
                'image' => '/images/Sraf20.jpg',
                'desc' => "Šraf samorezac za lim, plastiku sa širokom glavom plus burgija. Proizvođač KOELNER.<br><br>1000kom",
                'price' => 1548,
                'barcode' => "6456704621494"
            ],
            [
                'title' => "Vijak šraf za lim DIN 750-P",
                'image' => '/images/Sraf21.jpg',
                'desc' => "Šraf je extra kvaliteta. Šraf samorezac, sa upuštenom glavom. PH prihvat. Proizvođač Friulsiter.<br><br>500kom",
                'price' => 680,
                'barcode' => "9068774781731"
            ],
            [
                'title' => "Vijak šraf za lim DIN 7982 SRPS 465",
                'image' => '/images/Sraf22.jpg',
                'desc' => "Šraf je extra kvaliteta. Šraf bez burgije, sa upuštenom glavom. PH prihvat. Proizvođač Friulsiter.<br><br>1000kom",
                'price' => 842,
                'barcode' => "7532282692602"
            ]
        ]);
    }
}
