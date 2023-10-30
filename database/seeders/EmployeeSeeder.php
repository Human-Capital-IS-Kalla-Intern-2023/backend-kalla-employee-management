<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $faker = FakerFactory::create();


        // for ($i = 1; $i <= 50; $i++) {
        //     $employee = Employee::create([
        //         "nip" => $faker->numberBetween(1, 100),
        //         "fullname" => $faker->name(),
        //         "nickname" => $faker->firstName(),
        //         "hire_date" => $faker->date(),
        //         "company_email" => $faker->unique()->companyEmail(),
        //     ]);

        //     // Employee Details database
        //     $detail = EmployeeDetail::create([
        //         'employee_id' => $employee->id,
        //         'position_id' => rand(1, 6),
        //         'status' => rand(0, 1),
        //     ]);
        // }

        $employee = [
            [
                "nip" => "3164111169", "fullname" => "Willa Camm", "nickname" => "Willa", "hire_date" => "2020-08-17", "company_email" => "wcamm0@simplemachines.org", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "8722726373", "fullname" => "Dennis Peret", "nickname" => "Dennis", "hire_date" => "2024-02-03", "company_email" => "dperet1@domainmarket.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "0061383562", "fullname" => "Tybalt Camacke", "nickname" => "Tybalt", "hire_date" => "2023-07-08", "company_email" => "tcamacke2@auda.org.au", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "3631579713", "fullname" => "Darnell Vedyashkin", "nickname" => "Darnell", "hire_date" => "2024-01-27", "company_email" => "dvedyashkin3@webeden.co.uk", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1588558398", "fullname" => "Lizzie Del Dello", "nickname" => "Lizzie", "hire_date" => "2024-08-24", "company_email" => "ldel4@intel.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "4117140485", "fullname" => "Paula Gorgen", "nickname" => "Paula", "hire_date" => "2020-03-16", "company_email" => "pgorgen5@sciencedirect.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "3798753601", "fullname" => "Jaymie MacEveley", "nickname" => "Jaymie", "hire_date" => "2021-06-11", "company_email" => "jmaceveley6@tripadvisor.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "6351102634", "fullname" => "Quentin Edson", "nickname" => "Quentin", "hire_date" => "2024-11-25", "company_email" => "qedson7@fastcompany.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "6506452811", "fullname" => "Winifred O'Suaird", "nickname" => "Winifred", "hire_date" => "2022-04-11", "company_email" => "wosuaird8@google.com.br", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "4925549871", "fullname" => "Hortense Ionn", "nickname" => "Hortense", "hire_date" => "2024-07-14", "company_email" => "hionn9@statcounter.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "5139763869", "fullname" => "Carleton Fortin", "nickname" => "Carleton", "hire_date" => "2022-01-09", "company_email" => "cfortina@de.vu", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "2460586329", "fullname" => "Kathi Brozsset", "nickname" => "Kathi", "hire_date" => "2020-05-21", "company_email" => "kbrozssetb@statcounter.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9501758036", "fullname" => "Bruce Phripp", "nickname" => "Bruce", "hire_date" => "2023-08-31", "company_email" => "bphrippc@theatlantic.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9872630976", "fullname" => "Pammy Raoul", "nickname" => "Pammy", "hire_date" => "2021-09-16", "company_email" => "praould@instagram.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9216974303", "fullname" => "Morie Gurg", "nickname" => "Morie", "hire_date" => "2024-11-16", "company_email" => "mgurge@bloglovin.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "2253445193", "fullname" => "Rina Klaessen", "nickname" => "Rina", "hire_date" => "2021-02-24", "company_email" => "rklaessenf@tumblr.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "2082668509", "fullname" => "Augy January", "nickname" => "Augy", "hire_date" => "2021-08-21", "company_email" => "ajanuaryg@ftc.gov", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9621081629", "fullname" => "Aline Frankum", "nickname" => "Aline", "hire_date" => "2022-03-06", "company_email" => "afrankumh@ustream.tv", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "2610653956", "fullname" => "Pieter Leer", "nickname" => "Pieter", "hire_date" => "2023-12-07", "company_email" => "pleeri@sbwire.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9340257464", "fullname" => "Baxie Brickett", "nickname" => "Baxie", "hire_date" => "2024-09-08", "company_email" => "bbrickettj@timesonline.co.uk", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "7237411241", "fullname" => "Torie Oslar", "nickname" => "Torie", "hire_date" => "2020-10-21", "company_email" => "toslark@reference.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1163551147", "fullname" => "Ernestine Gregorio", "nickname" => "Ernestine", "hire_date" => "2022-03-11", "company_email" => "egregoriol@privacy.gov.au", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "6268727665", "fullname" => "Tiphanie Franzini", "nickname" => "Tiphanie", "hire_date" => "2023-07-05", "company_email" => "tfranzinim@who.int", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "5757305231", "fullname" => "Thia Keays", "nickname" => "Thia", "hire_date" => "2024-04-23", "company_email" => "tkeaysn@zdnet.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "2988771529", "fullname" => "Tallie Mousley", "nickname" => "Tallie", "hire_date" => "2022-04-23", "company_email" => "tmousleyo@epa.gov", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "5597355023", "fullname" => "Isa Bletcher", "nickname" => "Isa", "hire_date" => "2021-02-20", "company_email" => "ibletcherp@mozilla.org", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "2800718595", "fullname" => "Bobine Camillo", "nickname" => "Bobine", "hire_date" => "2023-05-25", "company_email" => "bcamilloq@ameblo.jp", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "8052930502", "fullname" => "Gil Menary", "nickname" => "Gil", "hire_date" => "2024-08-26", "company_email" => "gmenaryr@jigsy.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "5378188636", "fullname" => "Cecil Robker", "nickname" => "Cecil", "hire_date" => "2021-07-09", "company_email" => "crobkers@mac.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1904779891", "fullname" => "Terencio Surgen", "nickname" => "Terencio", "hire_date" => "2021-11-06", "company_email" => "tsurgent@nyu.edu", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1336063963", "fullname" => "Odelle Cuttelar", "nickname" => "Odelle", "hire_date" => "2021-03-19", "company_email" => "ocuttelaru@salon.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "8071627208", "fullname" => "Flor Allington", "nickname" => "Flor", "hire_date" => "2021-03-08", "company_email" => "fallingtonv@va.gov", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "7195725448", "fullname" => "Janet Nawton", "nickname" => "Janet", "hire_date" => "2023-10-18", "company_email" => "jnawtonw@phoca.cz", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9411158684", "fullname" => "Elly Arnoll", "nickname" => "Elly", "hire_date" => "2021-12-30", "company_email" => "earnollx@nasa.gov", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1102654272", "fullname" => "Auroora Trewman", "nickname" => "Auroora", "hire_date" => "2022-08-30", "company_email" => "atrewmany@360.cn", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "4877146830", "fullname" => "Cirillo Jessel", "nickname" => "Cirillo", "hire_date" => "2024-05-13", "company_email" => "cjesselz@com.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "3863796306", "fullname" => "Babette Dummer", "nickname" => "Babette", "hire_date" => "2020-03-01", "company_email" => "bdummer10@cargocollective.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "5048944771", "fullname" => "Jerrome McNysche", "nickname" => "Jerrome", "hire_date" => "2022-04-14", "company_email" => "jmcnysche11@smugmug.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "7330652709", "fullname" => "Che Selway", "nickname" => "Che", "hire_date" => "2022-11-27", "company_email" => "cselway12@bbb.org", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9949444330", "fullname" => "Rudolfo Rebanks", "nickname" => "Rudolfo", "hire_date" => "2024-03-02", "company_email" => "rrebanks13@devhub.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9364358139", "fullname" => "Crichton Blint", "nickname" => "Crichton", "hire_date" => "2020-07-31", "company_email" => "cblint14@bloglines.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9339418522", "fullname" => "Isis Asprey", "nickname" => "Isis", "hire_date" => "2022-11-20", "company_email" => "iasprey15@last.fm", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "6447376271", "fullname" => "Simonne Spacie", "nickname" => "Simonne", "hire_date" => "2023-08-24", "company_email" => "sspacie16@xing.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1514392275", "fullname" => "Kiri Sweeney", "nickname" => "Kiri", "hire_date" => "2023-01-08", "company_email" => "ksweeney17@usgs.gov", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1919993606", "fullname" => "Lotta Mayou", "nickname" => "Lotta", "hire_date" => "2020-09-17", "company_email" => "lmayou18@diigo.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9901065860", "fullname" => "Dulcie Nys", "nickname" => "Dulcie", "hire_date" => "2024-05-31", "company_email" => "dnys19@xinhuanet.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "8750858386", "fullname" => "Nester MacAiline", "nickname" => "Nester", "hire_date" => "2023-01-28", "company_email" => "nmacailine1a@boston.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "1841467995", "fullname" => "Jenny Sherwill", "nickname" => "Jenny", "hire_date" => "2024-08-26", "company_email" => "jsherwill1b@dropbox.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "9287213739", "fullname" => "Zilvia McGready", "nickname" => "Zilvia", "hire_date" => "2021-12-31", "company_email" => "zmcgready1c@princeton.edu", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "nip" => "7176525358", "fullname" => "Jeni Armfield", "nickname" => "Jeni", "hire_date" => "2020-08-01", "company_email" => "jarmfield1d@yolasite.com", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        Employee::insert($employee);


        $employee_details = [
            ["employee_id" => 1, "position_id" => 1, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 1, "position_id" => 2, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 1, "position_id" => 3, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 2, "position_id" => 1, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 2, "position_id" => 2, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 2, "position_id" => 3, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 3, "position_id" => 1, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 3, "position_id" => 2, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 3, "position_id" => 5, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 4, "position_id" => 1, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 4, "position_id" => 2, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 4, "position_id" => 5, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 5, "position_id" => 1, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 5, "position_id" => 2, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 5, "position_id" => 5, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 6, "position_id" => 1, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 6, "position_id" => 8, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 6, "position_id" => 9, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 7, "position_id" => 8, "status" => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 7, "position_id" => 9, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => 7, "position_id" => 10, "status" => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ["employee_id" => "8", "position_id" => "15", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "8", "position_id" => "47", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "8", "position_id" => "24", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "9", "position_id" => "46", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "9", "position_id" => "32", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "9", "position_id" => "47", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "10", "position_id" => "36", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "10", "position_id" => "28", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "10", "position_id" => "23", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "11", "position_id" => "3", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "11", "position_id" => "10", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "11", "position_id" => "50", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "12", "position_id" => "43", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "12", "position_id" => "41", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "12", "position_id" => "18", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "13", "position_id" => "8", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "13", "position_id" => "37", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "13", "position_id" => "6", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "14", "position_id" => "25", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "14", "position_id" => "13", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "14", "position_id" => "31", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "15", "position_id" => "15", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "15", "position_id" => "14", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "15", "position_id" => "27", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "16", "position_id" => "4", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "16", "position_id" => "40", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "16", "position_id" => "25", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "17", "position_id" => "26", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "17", "position_id" => "8", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "17", "position_id" => "30", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "18", "position_id" => "10", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "18", "position_id" => "31", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "18", "position_id" => "3", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "19", "position_id" => "6", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "19", "position_id" => "13", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "19", "position_id" => "40", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "20", "position_id" => "35", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "20", "position_id" => "18", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "20", "position_id" => "20", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "21", "position_id" => "36", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "21", "position_id" => "13", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "21", "position_id" => "6", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "22", "position_id" => "30", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "22", "position_id" => "35", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "22", "position_id" => "4", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "23", "position_id" => "37", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "23", "position_id" => "1", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "23", "position_id" => "19", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "24", "position_id" => "6", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "24", "position_id" => "46", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "24", "position_id" => "41", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "25", "position_id" => "47", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "25", "position_id" => "17", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "25", "position_id" => "5", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "26", "position_id" => "31", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "26", "position_id" => "21", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "26", "position_id" => "14", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "27", "position_id" => "4", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "27", "position_id" => "46", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "27", "position_id" => "12", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "28", "position_id" => "28", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "28", "position_id" => "14", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "28", "position_id" => "12", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "29", "position_id" => "30", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "29", "position_id" => "34", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "29", "position_id" => "7", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "30", "position_id" => "42", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "30", "position_id" => "50", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "30", "position_id" => "21", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "31", "position_id" => "47", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "31", "position_id" => "19", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "31", "position_id" => "18", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "32", "position_id" => "40", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "32", "position_id" => "40", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "32", "position_id" => "5", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "33", "position_id" => "10", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "33", "position_id" => "5", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "33", "position_id" => "22", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "34", "position_id" => "38", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "34", "position_id" => "30", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "34", "position_id" => "8", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "35", "position_id" => "22", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "35", "position_id" => "27", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "35", "position_id" => "40", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "36", "position_id" => "26", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "36", "position_id" => "24", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "36", "position_id" => "39", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "37", "position_id" => "49", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "37", "position_id" => "21", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "37", "position_id" => "30", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "38", "position_id" => "32", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "38", "position_id" => "36", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "38", "position_id" => "43", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "39", "position_id" => "37", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "39", "position_id" => "21", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "39", "position_id" => "46", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "40", "position_id" => "9", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "40", "position_id" => "12", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "40", "position_id" => "11", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "41", "position_id" => "18", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "41", "position_id" => "46", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "41", "position_id" => "6", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "42", "position_id" => "16", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "42", "position_id" => "43", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "42", "position_id" => "16", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "43", "position_id" => "19", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "43", "position_id" => "8", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "43", "position_id" => "44", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "44", "position_id" => "16", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "44", "position_id" => "39", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "44", "position_id" => "18", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "45", "position_id" => "40", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "45", "position_id" => "46", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "45", "position_id" => "19", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "46", "position_id" => "29", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "46", "position_id" => "6", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "46", "position_id" => "44", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "47", "position_id" => "39", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "47", "position_id" => "32", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "47", "position_id" => "36", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "48", "position_id" => "49", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "48", "position_id" => "21", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "48", "position_id" => "38", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "49", "position_id" => "38", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "49", "position_id" => "31", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "49", "position_id" => "38", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "50", "position_id" => "9", "status" => "1", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "50", "position_id" => "1", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
            ["employee_id" => "50", "position_id" => "38", "status" => "0", 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time()),],
        ];

        EmployeeDetail::insert($employee_details);
    }
}
